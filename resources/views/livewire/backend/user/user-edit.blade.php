<div class="overflow-scroll">
    @include('partials.backend.navbar', ['title' => $title])

    <div class="bg-base-100 rounded-xl shadow-md overflow-hidden p-6">
        <h2 class="text-2xl font-bold text-base-content mb-6">Edit User</h2>

        <form wire:submit.prevent="edit" class="space-y-6">
            <!-- Basic Information Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control">
                    <label for="name" class="label">
                        <span class="label-text text-base-content">Nama Lengkap <span class="text-error">*</span></span>
                    </label>
                    <x-text-input type="text" id="name" wire:model="form.name"
                        class="input input-bordered w-full text-gray-500" />
                    @error('form.name')
                        <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-control">
                    <label for="email" class="label">
                        <span class="label-text text-base-content">Email <span class="text-error">*</span></span>
                    </label>
                    <x-text-input type="email" id="email" wire:model="form.email"
                        class="input input-bordered w-full text-gray-500" />
                    @error('form.email')
                        <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="form-control">
                    <label for="password" class="label">
                        <span class="label-text text-base-content">Password</span>
                    </label>
                    <div class="relative">
                        <x-text-input type="{{ $showPassword ? 'text' : 'password' }}" id="password"
                            wire:model="form.password" placeholder="Kosongkan jika tidak ingin mengubah password"
                            class="input input-bordered w-full text-gray-500 pr-10" />
                        <button type="button" wire:click="$toggle('showPassword')"
                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-neutral-content hover:text-neutral">
                            <i class="{{ $showPassword ? 'fas fa-eye-slash' : 'fas fa-eye' }}"></i>
                        </button>
                    </div>
                    @error('form.password')
                        <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                    <div class="mt-2 text-xs text-neutral-content">
                        Kosongkan jika tidak ingin mengubah password.
                    </div>
                </div>

                <div class="form-control">
                    <label for="roles" class="label">
                        <span class="label-text text-base-content">Roles <span class="text-error">*</span></span>
                    </label>
                    <div class="flex space-x-2 items-center">
                        <div class="w-full">
                            <x-tom x-init="$el.roles = new Tom($el, {
                                sortField: {
                                    field: 'roles',
                                    direction: 'asc',
                                },
                                valueField: 'name',
                                labelField: 'name',
                                searchField: 'name',
                                load: function(query, callback) {
                                    $wire.getRoles(query).then(results => {
                                        callback(results);
                                    }).catch(() => {
                                        callback();
                                    });
                                },
                                render: {
                                    input: function(data, escape) {
                                        return `<input autocomplete='off' />`;
                                    },
                                    option: function(item, escape) {
                                        return `
                                                                                                                                                                                                                                                                                                                <div class='flex items-center p-2 hover:bg-primary hover:text-primary-content'>
                                                                                                                                                                                                                                                                                                                    <span>${escape(item.name)}</span>
                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                            `;
                                    },
                                    item: function(item, escape) {
                                        return `
                                                                                                                                                                                                                                                                                                                <div>
                                                                                                                                                                                                                                                                                                                    <span>${escape(item.name)}</span>
                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                            `;
                                    }
                                }
                            });" @set-reset.window="$el.roles.clear()" id="form.roles"
                                type="text" class="w-full relative" multiple wire:model="form.roles">
                                <option></option>
                                @foreach ($dataRole as $jabatan)
                                    <option>{{ $jabatan->name }}</option>
                                @endforeach
                            </x-tom>
                        </div>
                        <button type="button" onclick="document.getElementById('create_role_modal').showModal()"
                            class="btn btn-outline btn-base-content tooltip tooltip-top" data-tip="Tambah Role Baru">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>

                    @error('form.roles')
                        <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="mt-8 flex justify-end space-x-3">
                <a href="{{ route('user.index') }}" class="btn btn-outline btn-error">
                    Batal
                </a>
                <button type="submit" class="btn btn-primary flex items-center">
                    <i class="fas fa-save mr-2"></i> Perbarui Data
                </button>
            </div>
        </form>
    </div>

    <!-- Create New Role Modal -->
    <dialog id="create_role_modal" class="modal">
        <div class="modal-box max-w-2xl">
            <div class="flex justify-between items-center mb-4">
                <h3 class="font-bold text-xl">Buat Role Baru</h3>
                <button onclick="document.getElementById('create_role_modal').close()" class="btn btn-sm btn-circle">
                    ✕
                </button>
            </div>

            <form wire:submit.prevent="createRole">
                <div class="space-y-4">
                    <div class="form-control">
                        <label for="new_role_name" class="label">
                            <span class="label-text text-base-content">Nama Role <span
                                    class="text-error">*</span></span>
                        </label>
                        <x-text-input type="text" id="new_role_name" wire:model="createRoleForm.name"
                            placeholder="Masukkan nama role" class="input input-bordered w-full text-gray-500" />
                        @error('createRoleForm.name')
                            <span class="text-error text-sm mt-1 block">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="modal-action">
                    <button type="button" onclick="document.getElementById('create_role_modal').close()"
                        class="btn btn-outline">
                        Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-2"></i> Simpan Role
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
            document.getElementById('create_role_modal').close();
        });
    </script>
@endscript
