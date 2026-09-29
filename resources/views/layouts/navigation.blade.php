<nav x-data="{ open: false }"
    class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="flex justify-between h-16">

            <!-- Left Side -->
            <div class="flex items-center">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo
                            class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200"
                        />
                    </a>
                </div>

                <!-- Navigation -->
                <div class="hidden sm:flex sm:items-center sm:ms-10 space-x-2">

                    <x-nav-link
                        :href="route('dashboard')"
                        :active="request()->routeIs('dashboard')"
                    >
                        Dashboard
                    </x-nav-link>

                    <x-nav-link
                        :href="route('datasets.index')"
                        :active="request()->routeIs('datasets.*')"
                    >
                        Datasets
                    </x-nav-link>

                    <x-nav-link
                        :href="route('questions.index')"
                        :active="request()->routeIs('questions.*')"
                    >
                        Question Bank
                    </x-nav-link>

                    <x-nav-link
                        :href="route('playground.index')"
                        :active="request()->routeIs('playground.*')"
                    >
                        SQL Playground
                    </x-nav-link>

                </div>

            </div>


            <!-- Right Side -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-3">

                <!-- Dark Mode Button -->
                <button
                    type="button"
                    onclick="toggleDarkMode()"
                    class="inline-flex items-center gap-2 px-3 py-2 rounded-lg
                           border border-gray-300 dark:border-gray-700
                           text-gray-700 dark:text-gray-200
                           bg-white dark:bg-gray-900
                           hover:bg-gray-100 dark:hover:bg-gray-800
                           transition"
                >

                    <span id="theme-icon">🌙</span>

                    <span id="theme-text">
                        Dark Mode
                    </span>

                </button>


                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <button
                            class="inline-flex items-center px-3 py-2
                                   border border-transparent
                                   text-sm leading-4 font-medium
                                   rounded-lg
                                   text-gray-600 dark:text-gray-300
                                   bg-white dark:bg-gray-900
                                   hover:bg-gray-100 dark:hover:bg-gray-800
                                   transition"
                        >

                            <div>
                                {{ Auth::user()->name }}
                            </div>

                            <div class="ms-2">

                                <svg
                                    class="fill-current h-4 w-4"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20"
                                >
                                    <path
                                        fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"
                                    />
                                </svg>

                            </div>

                        </button>

                    </x-slot>


                    <x-slot name="content">

                        <x-dropdown-link :href="route('profile.edit')">
                            Profile
                        </x-dropdown-link>


                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">

                            @csrf

                            <x-dropdown-link
                                :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();"
                            >
                                Log Out
                            </x-dropdown-link>

                        </form>

                    </x-slot>

                </x-dropdown>

            </div>


            <!-- Mobile Menu Button -->
            <div class="-me-2 flex items-center sm:hidden">

                <button
                    @click="open = ! open"
                    class="inline-flex items-center justify-center
                           p-2 rounded-md
                           text-gray-500 dark:text-gray-400
                           hover:bg-gray-100 dark:hover:bg-gray-800"
                >

                    <svg
                        class="h-6 w-6"
                        stroke="currentColor"
                        fill="none"
                        viewBox="0 0 24 24"
                    >

                        <path
                            :class="{'hidden': open, 'inline-flex': ! open}"
                            class="inline-flex"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />

                        <path
                            :class="{'hidden': ! open, 'inline-flex': open}"
                            class="hidden"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />

                    </svg>

                </button>

            </div>

        </div>

    </div>


    <!-- Mobile Navigation -->
    <div
        :class="{'block': open, 'hidden': ! open}"
        class="hidden sm:hidden border-t border-gray-200 dark:border-gray-800"
    >

        <div class="pt-2 pb-3 space-y-1">

            <x-responsive-nav-link
                :href="route('dashboard')"
                :active="request()->routeIs('dashboard')"
            >
                Dashboard
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('datasets.index')"
                :active="request()->routeIs('datasets.*')"
            >
                Datasets
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('questions.index')"
                :active="request()->routeIs('questions.*')"
            >
                Question Bank
            </x-responsive-nav-link>

            <x-responsive-nav-link
                :href="route('playground.index')"
                :active="request()->routeIs('playground.*')"
            >
                SQL Playground
            </x-responsive-nav-link>

        </div>


        <!-- Mobile User -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-700">

            <div class="px-4">

                <div class="font-medium text-base text-gray-800 dark:text-gray-200">
                    {{ Auth::user()->name }}
                </div>

                <div class="font-medium text-sm text-gray-500 dark:text-gray-400">
                    {{ Auth::user()->email }}
                </div>

            </div>


            <div class="mt-3 space-y-1">

                <!-- Mobile Dark Mode -->
                <button
                    type="button"
                    onclick="toggleDarkMode()"
                    class="w-full text-left px-4 py-2
                           text-gray-700 dark:text-gray-300
                           hover:bg-gray-100 dark:hover:bg-gray-800"
                >

                    <span id="mobile-theme-icon">🌙</span>

                    <span id="mobile-theme-text">
                        Dark Mode
                    </span>

                </button>


                <x-responsive-nav-link
                    :href="route('profile.edit')"
                >
                    Profile
                </x-responsive-nav-link>


                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">

                    @csrf

                    <x-responsive-nav-link
                        :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();"
                    >
                        Log Out
                    </x-responsive-nav-link>

                </form>

            </div>

        </div>

    </div>

</nav>


<script>

    function updateThemeButton() {

        const isDark =
            document.documentElement.classList.contains('dark');

        const icon =
            document.getElementById('theme-icon');

        const text =
            document.getElementById('theme-text');

        const mobileIcon =
            document.getElementById('mobile-theme-icon');

        const mobileText =
            document.getElementById('mobile-theme-text');


        if (isDark) {

            if (icon) {
                icon.textContent = '☀️';
            }

            if (text) {
                text.textContent = 'Light Mode';
            }

            if (mobileIcon) {
                mobileIcon.textContent = '☀️';
            }

            if (mobileText) {
                mobileText.textContent = 'Light Mode';
            }

        } else {

            if (icon) {
                icon.textContent = '🌙';
            }

            if (text) {
                text.textContent = 'Dark Mode';
            }

            if (mobileIcon) {
                mobileIcon.textContent = '🌙';
            }

            if (mobileText) {
                mobileText.textContent = 'Dark Mode';
            }

        }

    }


    function toggleDarkMode() {

        const isDark =
            document.documentElement.classList.toggle('dark');

        localStorage.setItem(
            'theme',
            isDark ? 'dark' : 'light'
        );

        updateThemeButton();

    }


    document.addEventListener('DOMContentLoaded', function () {

        const savedTheme =
            localStorage.getItem('theme');

        if (savedTheme === 'dark') {

            document.documentElement.classList.add('dark');

        } else if (savedTheme === 'light') {

            document.documentElement.classList.remove('dark');

        }

        updateThemeButton();

    });

</script>