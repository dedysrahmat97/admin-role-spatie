<div class="menu min-h-full w-80 lg:w-96 p-4 bg-base-100">
    <!-- Sidebar header -->
    <div
        class="flex flex-col items-center justify-center py-6 bg-gradient-to-tr from-accent to-neutral  rounded-lg shadow-lg sm:flex-row">
        <span class="font-extrabold text-2xl sm:text-4xl text-center text-neutral-content">Sistem Manajemen</span>
    </div>
    <!-- Sidebar content here -->
    <ul class="mt-4 space-y-2">
        <li>
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-3 p-3 text-lg rounded-lg hover:bg-accent hover:text-white transition {{ request()->routeIs('dashboard.*') ? 'bg-accent text-white shadow-xl' : '' }}">
                <i class="fa-solid fa-house"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="font-bold text-lg text-base-content ml-4">Manajemen Peran User</li>
        <li>
            <a href="{{ route('user.index') }}"
                class="flex items-center gap-3 p-3 text-lg rounded-lg hover:bg-accent hover:text-white transition {{ request()->routeIs('user.*') ? 'bg-accent text-white shadow-xl' : '' }}">
                <i class="fa-solid fa-user"></i>
                <span>User</span>
            </a>
        </li>
        <li>
            <a href="{{ route('role.index') }}"
                class="flex items-center gap-3 p-3 text-lg rounded-lg hover:bg-accent hover:text-white transition {{ request()->routeIs('role.*') ? 'bg-accent text-white shadow-xl' : '' }}">
                <i class="fa-solid fa-user-shield"></i>
                <span>Peran</span>
            </a>
        </li>
        <li>
            <a class="flex items-center gap-3 p-3 text-lg rounded-lg hover:bg-accent hover:text-white transition">
                <i class="fa-solid fa-users"></i>
                <span>Peran User</span>
            </a>
        </li>

    </ul>
    <!-- Tambahkan footer sidebar dibagian paling bawah -->
    <div class="mt-auto p-4 text-left text-sm">
        <div class="card bg-opacity-60 backdrop-blur-md shadow-lg border border-gray-200">
            <div class="card-body items-left text-left">
                <h2 class="card-title">Sistem Manajemen</h2>
                <p>Mempermudah pengelolaan data dan informasi dengan efisiensi dan keandalan.</p>
                <p class="text-xs mt-2">© 2023 Yayasan ASAKITA. All rights reserved.</p>
            </div>
        </div>
    </div>

</div>
