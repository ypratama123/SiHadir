<nav x-data="{ open: false }" class="fixed top-0 left-0 w-full z-50 backdrop-blur bg-white/70 shadow-lg" style="box-shadow: 0 4px 24px 0 rgba(255,152,0,0.08);">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between h-20 items-center">
            <div class="flex items-center gap-4">
                <a href="{{ route('dashboard') }}" class="flex items-center gap-3">
                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="22" cy="22" r="22" fill="#ff9800"/>
                        <text x="50%" y="58%" text-anchor="middle" fill="#fffde7" font-size="26" font-family="'Figtree', 'Segoe UI', Arial, sans-serif" font-weight="bold" dy=".3em" letter-spacing="2" style="font-style: italic;">S</text>
                    </svg>
                    <span class="text-2xl font-extrabold text-orange-600 tracking-wide drop-shadow">SiHadir</span>
                </a>
            </div>
            <div class="flex items-center gap-8">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-transparent text-base leading-4 font-medium rounded-full text-gray-600 bg-white hover:text-orange-600 focus:outline-none transition ease-in-out duration-150 shadow">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
