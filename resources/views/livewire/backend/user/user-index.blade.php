<div>
    @include('partials.backend.navbar', ['title' => $title])

    <div>
        <div class="my-4 flex justify-end">
            <a href="{{ route('user.create') }}" class="btn btn-outline btn-lg btn-primary shadow-lg">
                <i class="fas fa-user-plus"></i> Tambah User
            </a>
        </div>
        <livewire:backend.user.user-table />
    </div>
    <div>
        <x-confirm-delete />
    </div>
</div>
