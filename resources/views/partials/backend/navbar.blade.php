<div class="flex items-center justify-between mb-14 sm:mb-2 mx-4 mt-3">
    <h1 class="text-5xl font-bold hidden sm:block">{{ $title ?? 'Sistem Manajemen' }}</h1>

    <!-- Top navigation bar -->
    <div class="navbar bg-base-100 justify-end w-fit self-end rounded-lg shadow-lg px-2 fixed top-4 right-4 z-20">
        <ul class="menu menu-horizontal rounded-box">
            <li>
                <a class="tooltip tooltip-bottom" data-tip="Ganti Tema">
                    <label class="swap swap-rotate" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', value => {
                        localStorage.setItem('darkMode', value);
                        document.documentElement.setAttribute('data-theme', value ? 'luxury' : 'corporate');
                    })"
                        @click="darkMode = !darkMode">
                        <i x-show="darkMode" x-cloak
                            class="fas fa-moon text-lg transition-transform duration-300 ease-in-out transform rotate-180"></i>
                        <i x-show="!darkMode" x-cloak
                            class="fas fa-sun text-lg transition-transform duration-300 ease-in-out transform rotate-0"></i>
                    </label>
                </a>
            </li>
            <li>
                <a class="tooltip tooltip-bottom" data-tip="Home">
                    <i class="fas fa-home text-lg"></i>
                </a>
            </li>
            <li>
                <a class="tooltip tooltip-bottom" data-tip="Details">
                    <i class="fas fa-info-circle text-lg"></i>
                </a>
            </li>
            <li>
                <a class="tooltip tooltip-bottom" data-tip="Logout" href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt text-lg"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
</div>

<!-- Page content here -->
<div class="flex flex-col items-start justify-center">
    <label for="my-drawer-2" class="drawer-button lg:hidden absolute top-8 left-4">
        <i class="fas fa-bars text-2xl"></i>
    </label>
</div>
