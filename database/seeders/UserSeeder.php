<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::beginTransaction();
        try {
            
            $user = User::factory()->create([
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'password' => Hash::make('123'),
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();
            // Beri tahu kesalaham di terminal
            $this->command->error('Gagal membuat user admin: ' . $th->getMessage());
        }
    }
}