<div>
    @include('partials.backend.navbar', ['title' => $title])

    <div>
        <div class="my-4 flex justify-end">
            <a href="{{ route('role.create') }}" class="btn btn-outline btn-lg btn-primary shadow-lg">
                <i class="fas fa-user-plus"></i> Tambah Role
            </a>
        </div>
        <livewire:backend.role.role-table />
    </div>
    <div>
        <x-confirm-delete />
    </div>
</div>
