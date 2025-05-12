<div class="overflow-scroll">
    @include('partials.backend.navbar', ['title' => $title])

    <div class="bg-base-100 rounded-xl shadow-md overflow-hidden p-4 sm:p-6">
        <h2 class="text-xl sm:text-2xl font-bold text-base-content mb-4 sm:mb-6">Edit User</h2>

        <form wire:submit.prevent="edit" class="space-y-4 sm:space-y-6">
            <div class="grid grid-cols-1 sm:grid-cols-8 gap-4 items-start">

                <div class="col-span-1 sm:col-span-4 space-y-4">

                    {{-- Input Nama Role --}}
                    <div class="form-control">
                        <label for="name" class="label">
                            <span class="label-text">Nama Role <span class="text-error">*</span></span>
                        </label>
                        <x-text-input type="text" id="name" wire:model="form.name"
                            placeholder="Masukkan nama role" class="input input-bordered w-full" />
                        @error('form.name')
                            <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Tombol Pilih Permission --}}
                    <div class="sm:col-span-1 flex items-end">
                        <button type="button" class="btn btn-primary w-full" wire:click="openCardPermissions()">
                            Pilih Permission
                        </button>
                    </div>

                </div>

                {{-- Card Permissions --}}
                @if ($cardPermissions)
                    <div class="col-span-1 sm:col-span-4 h-full">
                        <div class="card bg-base-100 shadow-xl">
                            <div class="card-body">
                                <div class="flex justify-between items-center">
                                    <h2 class="card-title">Pilih Permission</h2>
                                    <button type="button"
                                        onclick="document.getElementById('create_permissions_modal').showModal()"
                                        class="btn btn-outline btn-base-content tooltip tooltip-bottom mt-2"
                                        data-tip="Buat Permissions Baru">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <div class="form-control">
                                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-2 max-h-64 overflow-y-auto pr-2">
                                        @forelse ($dataPermissions as $permission)
                                            <label class="flex items-center space-x-2">
                                                <input type="checkbox" value="{{ $permission->name }}"
                                                    wire:model="form.permissions" class="checkbox checkbox-primary" />
                                                <span>{{ $permission->name }}</span>
                                            </label>
                                        @empty
                                            <p class="text-sm text-base-content/50 col-span-2">
                                                Tidak ada permission yang tersedia.
                                            </p>
                                        @endforelse
                                    </div>

                                    @error('form.permissions')
                                        <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>

            <!-- Submit Button -->
            <div class="mt-6 sm:mt-8 flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-3">
                <a href="{{ route('role.index') }}" class="btn btn-outline btn-error w-full sm:w-auto">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary flex items-center w-full sm:w-auto">
                    <i class="fas fa-save mr-2"></i> Perbarui Data
                </button>
            </div>
        </form>
    </div>

    <!-- Create New permissions Modal -->
    <dialog id="create_permissions_modal" class="modal">
        <div class="modal-box max-w-lg sm:max-w-2xl">
            <div class="flex justify-between items-center mb-4 pb-2 border-b">
                <h3 class="font-bold text-lg sm:text-xl">Buat Permissions Baru</h3>
                <button onclick="document.getElementById('create_permissions_modal').close()"
                    class="btn btn-sm btn-circle">
                    ✕
                </button>
            </div>

            <form wire:submit.prevent="createPermissions">
                <div class="space-y-4">
                    <div class="form-control">
                        <label for="new_permissions_name" class="label">
                            <span class="label-text">Nama Permissions <span class="text-error">*</span></span>
                        </label>
                        <x-text-input type="text" id="new_permissions_name" wire:model="createPermissionForm.name"
                            placeholder="Masukkan nama permissions" class="input input-bordered w-full" />
                        @error('createPermissionForm.name')
                            <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="modal-action mt-6">
                    <button type="button" onclick="document.getElementById('create_permissions_modal').close()"
                        class="btn btn-outline">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-2"></i> Simpan Permissions
                    </button>
                </div>
            </form>
        </div>
        <form method="dialog" class="modal-backdrop">
            <button>Tutup</button>
        </form>
    </dialog>

    <!-- Success Notification -->
    <div>
        <x-sweet-alert />
        <x-modal-sweet-alert />
    </div>
</div>
@script
    <script>
        Livewire.on('refresh', function() {
            document.getElementById('create_permissions_modal').close();
        });
    </script>
@endscript
