<div class="overflow-x-auto overflow-y-hidden rounded-box border border-base-content/5 bg-base-100 shadow-md py-10">
    <table class="table w-full border-separate border-spacing-2">
        <!-- head -->
        <thead class="bg-base-200">
            <tr class="shadow">
                <th>
                    <label>
                        <input type="checkbox" class="checkbox" />
                    </label>
                </th>
                <th>Nama</th>
                <th>Email</th>
                <th>Role</th>
                <th class="sticky right-0 bg-base-200 z-10">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dataUser as $user)
                <tr class="shadow">
                    <th class="w-1">
                        <label>
                            <input type="checkbox" class="checkbox" />
                        </label>
                    </th>
                    <td>
                        <div class="font-bold">{{ $user->name }}</div>
                    </td>
                    <td>
                        <div class="text-sm opacity-50">{{ $user->email }}</div>
                    <td>
                        <div class="flex flex-wrap gap-1">
                            @foreach ($user->roles as $role)
                                <span class="badge badge-primary h-fit">{{ $role->name }}</span>
                            @endforeach
                        </div>
                    </td>
                    <td class="sticky right-0 bg-base-300 z-10">
                        <div class="dropdown dropdown-left dropdown-center">
                            <label tabindex="0" class="btn btn-ghost btn-xs">
                                <i class="fas fa-ellipsis-v"></i> <!-- Ikon titik tiga ke bawah -->
                            </label>
                            <ul tabindex="0"
                                class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52 right-0 transform translate-x-full -translate-y-1/2 top-1/2 absolute">
                                <li>
                                    <a href="#" class="text-blue-500">Lihat</a>
                                </li>
                                <li>
                                    <a href="{{ route('user.edit', $user->id) }}" class="text-yellow-500">Edit</a>
                                </li>
                                <li>
                                    <button class="text-red-500 hover:text-red-700 focus:outline-none"
                                        @click="$dispatch('confirm-delete', { get_id: '{{ $user->id }}', data: '{{ $user->name }}' })">
                                        Hapus
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-gray-500">
                        Tidak ada data pengguna ditemukan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>
