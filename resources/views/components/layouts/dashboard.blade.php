<div>
    <!DOCTYPE html>
    <html lang="fa" dir="rtl">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> پنل مدیریت | سامانه فرایند شیمی نوین آسیا </title>
        <script src="https://cdn.tailwindcss.com"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            'dark-primary': '#0f0f23',
                            'dark-secondary': '#1a1a2e',
                            'dark-tertiary': '#16213e',
                            'yellow-primary': '#ffd700',
                            'yellow-secondary': '#ffed4e',
                            'yellow-dark': '#b7791f'
                        }
                    }
                }
            }
        </script>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Vazirmatn:wght@300;400;500;600;700&display=swap');

            * {
                font-family: 'Vazirmatn', sans-serif;
            }

            .gradient-bg {
                background: linear-gradient(135deg, #0f0f23 0%, #1a1a2e 50%, #16213e 100%);
            }

            .glow-effect {
                box-shadow: 0 0 20px rgba(255, 215, 0, 0.3);
            }

            .card-hover {
                transition: all 0.3s ease;
            }

            .card-hover:hover {
                transform: translateY(-5px);
                box-shadow: 0 10px 30px rgba(255, 215, 0, 0.2);
            }

            .sidebar-item {
                transition: all 0.3s ease;
            }

            .sidebar-item:hover {
                background: linear-gradient(90deg, rgba(255, 215, 0, 0.1) 0%, transparent 100%);
                border-right: 3px solid #ffd700;
            }

            /* Mobile sidebar overlay */
            .sidebar-overlay {
                transition: all 0.3s ease;
            }

            /* Table responsive styles */
            .table-container {
                scrollbar-width: thin;
                scrollbar-color: #ffd700 #1a1a2e;
            }

            .table-container::-webkit-scrollbar {
                height: 6px;
            }

            .table-container::-webkit-scrollbar-track {
                background: #1a1a2e;
            }

            .table-container::-webkit-scrollbar-thumb {
                background: #ffd700;
                border-radius: 3px;
            }
        </style>
        <link rel="stylesheet" href="{{ asset('styles/style.css') }}">
        <title>داشبورد</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

        <style>
            a {
                text-decoration: none !important;
                color: white !important;
            }

            .sidebar-item {
                color: white !important;
            }

            .table-responsive {
                width: 100%;
                overflow-x: auto !important;
                overflow-y: hidden;
                display: block;
                -webkit-overflow-scrolling: touch;
            }

            .table-responsive table {
                min-width: 900px;
                width: max-content;
                border-collapse: collapse;
            }

            .table-responsive::-webkit-scrollbar {
                height: 8px;
            }

            .table-responsive::-webkit-scrollbar-thumb {
                background: #ffd700;
                border-radius: 20px;
            }

            .table-responsive::-webkit-scrollbar-track {
                background: #1a1a2e;
            }

            @media all and (min-width:100px) and (max-width:800px) {

                td,
                th {
                    width: 10% !important;
                }

                span.bg-green-600,
                span.bg-red-600 {
                    display: inline-block;
                    width: 80px !important;
                    height: 50px !important;
                    text-align: center;
                }
            }

            #header span {
                background: linear-gradient(180deg, rgba(255, 255, 255, .12) 0%, rgba(255, 255, 255, .05) 45%, rgba(255, 255, 255, .02) 100%) !important;
            }

            .lang-menu {
                position: absolute;
                top: 35px;
                right: 0;
                min-width: 150px;
                background: #fff;
                border-radius: 12px;
                overflow: hidden;
                box-shadow: 0 10px 30px rgba(0, 0, 0, .15);
                opacity: 0;
                visibility: hidden;
                transform: translateY(10px);
                transition: .25s;
                z-index: 9999;
            }

            .lang-menu.show {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }

            .lang-menu a {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 12px 15px;
                color: #333;
                text-decoration: none;
                transition: .2s;
            }

            .lang-menu a:hover {
                background: #f5f5f5;
            }

            .lang-menu img {
                border-radius: 3px;
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css" rel="stylesheet">

        <link rel="icon" href="{{ asset('assets/images/logo-avg.gif') }}">
        <link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet">
        @livewireStyles
    </head>

    <body class="gradient-bg min-h-screen">
        <!-- Mobile Menu Button -->
        <button class="fixed top-4 left-4 z-50 lg:hidden bg-yellow-primary text-dark-primary p-3 rounded-full shadow-lg"
            onclick="toggleMobileSidebar()">
            <i class="fas fa-bars"></i>
        </button>

        <!-- Sidebar Overlay for Mobile -->
        <div class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden hidden" id="sidebar-overlay"
            onclick="toggleMobileSidebar()"></div>

        <!-- Sidebar -->
        <div class="fixed right-0 top-0 h-full w-64 bg-dark-secondary shadow-2xl z-50 transform translate-x-full lg:translate-x-0 transition-transform duration-300"
            id="sidebar">
            <div class="p-4 lg:p-6 border-b border-yellow-primary/20">
                <div class="flex items-center space-x-3 space-x-reverse">
                    <div class="">
                        <span>
                            <div class="position-relative ms-2" id="langDropdown">

                                {{-- Current Language --}}
                                <button type="button" id="langBtn"
                                    style="background:none;border:none;padding:0;cursor:pointer;">

                                    @if (app()->getLocale() == 'fa')
                                        <img src="https://flagcdn.com/w20/ir.png" width="22" alt="فارسی">
                                    @else
                                        <img src="https://flagcdn.com/w20/gb.png" width="22" alt="English">
                                    @endif

                                </button>

                                {{-- Dropdown --}}
                                <div id="langMenu" class="lang-menu">

                                    <a href="{{ url('/fa/dashboard') }}">
                                        <img src="https://flagcdn.com/w20/ir.png" width="20">
                                        <span class="text-black">فارسی</span>
                                    </a>

                                    <a href="{{ url('/en/dashboard') }}">
                                        <img src="https://flagcdn.com/w20/gb.png" width="20">
                                        <span class="text-black">English</span>
                                    </a>

                                </div>

                            </div>
                        </span>
                    </div>
                    <div>
                        <h2 class="text-yellow-primary font-bold text-base lg:text-lg">
                            {{ __('messages.admin_dashboard') }}
                        </h2>
                        <p class="text-gray-400 text-xs lg:text-sm">{{ auth()->user()->first_name }}
                            {{ auth()->user()->last_name }}</p>
                    </div>
                </div>
            </div>

            <nav class="mt-6 overflow-y-auto h-[calc(100vh-200px)]">

                {{-- داشبورد --}}
                <a wire:navigate href="{{ route(app()->getLocale() . '.dashboard.index') }}"
                    class="sidebar-item flex items-center px-6 py-3
        {{ request()->routeIs(app()->getLocale() . '.dashboard.index') ? 'text-yellow-primary bg-dark-tertiary border-r-4 border-yellow-primary' : 'text-gray-300' }}">
                    <i class="fas fa-home ml-3"></i>
                    <span>{{ __('messages.dashboard') }}</span>
                </a>

                {{-- کاربران --}}
                <a wire:navigate href="{{ route(app()->getLocale() . '.dashboard.users') }}"
                    class="sidebar-item flex items-center px-6 py-3
        {{ request()->routeIs(app()->getLocale() . '.dashboard.users') ? 'text-yellow-primary bg-dark-tertiary border-r-4 border-yellow-primary' : 'text-gray-300' }}">
                    <i class="fas fa-users ml-3"></i>
                    <span>{{ __('messages.users') }}</span>
                </a>

                {{-- محصولات --}}
                <div class="sidebar-item">

                    <div class="px-6 py-3 flex justify-between items-center cursor-pointer"
                        onclick="toggleDropdown('products')">

                        <div class="flex items-center">
                            <i class="fas fa-box ml-3"></i>
                            <span>{{ __('messages.products') }}</span>
                        </div>

                        <i class="fas fa-chevron-down transition-all" id="products-arrow"></i>

                    </div>

                    <div id="products-dropdown"
                        class="{{ request()->routeIs(app()->getLocale() . '.dashboard.products', app()->getLocale() . '.dashboard.category', app()->getLocale() . '.dashboard.packages') ? '' : 'hidden' }} bg-dark-tertiary">

                        <a wire:navigate href="{{ route(app()->getLocale() . '.dashboard.products') }}"
                            class="block px-12 py-2 {{ request()->routeIs(app()->getLocale() . '.dashboard.products') ? 'text-yellow-primary' : 'text-gray-300 hover:text-yellow-primary' }}">
                            {{ __('messages.products') }}
                        </a>

                        <a wire:navigate href="{{ route(app()->getLocale() . '.dashboard.category') }}"
                            class="block px-12 py-2 {{ request()->routeIs(app()->getLocale() . '.dashboard.category') ? 'text-yellow-primary' : 'text-gray-300 hover:text-yellow-primary' }}">
                            {{ __('messages.category') }}
                        </a>

                        <a wire:navigate href="{{ route(app()->getLocale() . '.dashboard.packages') }}"
                            class="block px-12 py-2 {{ request()->routeIs(app()->getLocale() . '.dashboard.packages') ? 'text-yellow-primary' : 'text-gray-300 hover:text-yellow-primary' }}">
                            {{ __('messages.packages') }}
                        </a>

                    </div>

                </div>

                {{-- مقالات --}}
                <div class="sidebar-item">

                    <div class="px-6 py-3 flex justify-between items-center cursor-pointer"
                        onclick="toggleDropdown('articles')">

                        <div class="flex items-center">
                            <i class="fas fa-newspaper ml-3"></i>
                            <span>{{ __('messages.articles') }}</span>
                        </div>

                        <i class="fas fa-chevron-down transition-all" id="articles-arrow"></i>

                    </div>

                    <div id="articles-dropdown"
                        class="{{ request()->routeIs(app()->getLocale() . '.dashboard.articleCategories', app()->getLocale() . '.dashboard.articles') ? '' : 'hidden' }} bg-dark-tertiary">

                        <a wire:navigate href="{{ route(app()->getLocale() . '.dashboard.articleCategories') }}"
                            class="block px-12 py-2 {{ request()->routeIs(app()->getLocale() . '.dashboard.articleCategories') ? 'text-yellow-primary' : 'text-gray-300 hover:text-yellow-primary' }}">
                            {{ __('messages.article_categories') }}
                        </a>

                        <a wire:navigate href="{{ route(app()->getLocale() . '.dashboard.articles') }}"
                            class="block px-12 py-2 {{ request()->routeIs(app()->getLocale() . '.dashboard.articles') ? 'text-yellow-primary' : 'text-gray-300 hover:text-yellow-primary' }}">
                            {{ __('messages.articles') }}
                        </a>

                    </div>

                </div>

                {{-- صنایع --}}
                <a wire:navigate href="{{ route(app()->getLocale() . '.dashboard.industries') }}"
                    class="sidebar-item flex items-center px-6 py-3
        {{ request()->routeIs(app()->getLocale() . '.dashboard.industries') ? 'text-yellow-primary bg-dark-tertiary border-r-4 border-yellow-primary' : 'text-gray-300' }}">
                    <i class="fas fa-industry ml-3"></i>
                    <span>{{ __('messages.industries') }}</span>
                </a>

                {{-- همکاری با ما --}}
                <a wire:navigate href="{{ route(app()->getLocale() . '.dashboard.collaborations') }}"
                    class="sidebar-item flex items-center px-6 py-3
        {{ request()->routeIs(app()->getLocale() . '.dashboard.collaborations') ? 'text-yellow-primary bg-dark-tertiary border-r-4 border-yellow-primary' : 'text-gray-300' }}">
                    <i class="fas fa-handshake ml-3"></i>
                    <span>{{ __('messages.collaborations') }}</span>
                </a>

                {{-- پیام ها --}}
                <a wire:navigate href="{{ route(app()->getLocale() . '.dashboard.contactMessages') }}"
                    class="sidebar-item flex items-center px-6 py-3
        {{ request()->routeIs(app()->getLocale() . '.dashboard.contactMessages') ? 'text-yellow-primary bg-dark-tertiary border-r-4 border-yellow-primary' : 'text-gray-300' }}">
                    <i class="fas fa-envelope ml-3"></i>
                    <span>{{ __('messages.contact_messages') }}</span>
                </a>

                {{-- منوها --}}
                <a wire:navigate href="{{ route(app()->getLocale() . '.dashboard.menus') }}"
                    class="sidebar-item flex items-center px-6 py-3
        {{ request()->routeIs(app()->getLocale() . '.dashboard.menus') ? 'text-yellow-primary bg-dark-tertiary border-r-4 border-yellow-primary' : 'text-gray-300' }}">
                    <i class="fas fa-bars ml-3"></i>
                    <span>{{ __('messages.menus') }}</span>
                </a>

                {{-- درباره ما --}}
                <a wire:navigate href="{{ route(app()->getLocale() . '.dashboard.aboutUs') }}"
                    class="sidebar-item flex items-center px-6 py-3
        {{ request()->routeIs(app()->getLocale() . '.dashboard.aboutUs') ? 'text-yellow-primary bg-dark-tertiary border-r-4 border-yellow-primary' : 'text-gray-300' }}">
                    <i class="fas fa-info-circle ml-3"></i>
                    <span>{{ __('messages.about_us') }}</span>
                </a>

                {{-- تنظیمات --}}
                <a wire:navigate href="{{ route(app()->getLocale() . '.dashboard.settings') }}"
                    class="sidebar-item flex items-center px-6 py-3
        {{ request()->routeIs(app()->getLocale() . '.dashboard.settings') ? 'text-yellow-primary bg-dark-tertiary border-r-4 border-yellow-primary' : 'text-gray-300' }}">
                    <i class="fas fa-cog ml-3"></i>
                    <span>{{ __('messages.settings') }}</span>
                </a>

                {{-- پروژه ها --}}
                <a wire:navigate href="{{ route(app()->getLocale() . '.dashboard.projects') }}"
                    class="sidebar-item flex items-center px-6 py-3
        {{ request()->routeIs(app()->getLocale() . '.dashboard.projects') ? 'text-yellow-primary bg-dark-tertiary border-r-4 border-yellow-primary' : 'text-gray-300' }}">
                    <i class="fas fa-diagram-project ml-3"></i>
                    <span>{{ __('messages.projects') }}</span>
                </a>
                <a wire:navigate href="{{ route(app()->getLocale() . '.dashboard.gallery') }}"
                    class="sidebar-item flex items-center px-6 py-3
        {{ request()->routeIs(app()->getLocale() . '.dashboard.gallery') ? 'text-yellow-primary bg-dark-tertiary border-r-4 border-yellow-primary' : 'text-gray-300' }}">
                    <i class="fa-regular fa-image ml-3"></i>
                    <span>{{ __('messages.gallery') }}</span>
                </a>
                {{-- خروج --}}
                <a wire:navigate href="{{ route('logout') }}"
                    class="sidebar-item flex items-center px-6 py-3
        {{ request()->routeIs(app()->getLocale() . '.logout') ? 'text-yellow-primary bg-dark-tertiary border-r-4 border-yellow-primary' : 'text-gray-300' }}">
                    <i class="fa fa-sign-out ml-3"></i>
                    <span>{{ __('messages.logout') }}</span>
                </a>

            </nav>


        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>

        {{ $slot }}


        <script>
            function toggleDropdown(id) {
                const dropdown = document.getElementById(`${id}-dropdown`);
                const arrow = document.getElementById(`${id}-arrow`);

                dropdown.classList.toggle('hidden');
                arrow.classList.toggle('rotate-180');
            }

            function toggleMobileSidebar() {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');

                sidebar.classList.toggle('translate-x-full');
                overlay.classList.toggle('hidden');
            }

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(event) {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');
                const menuButton = event.target.closest('button');

                if (window.innerWidth < 1024 && !sidebar.contains(event.target) && !menuButton?.onclick?.toString()
                    .includes('toggleMobileSidebar')) {
                    if (!sidebar.classList.contains('translate-x-full')) {
                        toggleMobileSidebar();
                    }
                }
            });

            // Handle window resize
            window.addEventListener('resize', function() {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebar-overlay');

                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('translate-x-full');
                    overlay.classList.add('hidden');
                } else {
                    sidebar.classList.add('translate-x-full');
                    overlay.classList.add('hidden');
                }
            });

            // Animate cards on load
            document.addEventListener('DOMContentLoaded', function() {
                const cards = document.querySelectorAll('.card-hover');
                cards.forEach((card, index) => {
                    setTimeout(() => {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';
                        card.style.transition = 'all 0.5s ease';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 100);
                    }, index * 100);
                });
            });
        </script>
    </body>
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const btn = document.getElementById("langBtn");
            const menu = document.getElementById("langMenu");

            btn.addEventListener("click", function(e) {
                e.stopPropagation();
                menu.classList.toggle("show");
            });

            document.addEventListener("click", function(e) {
                if (!document.getElementById("langDropdown").contains(e.target)) {
                    menu.classList.remove("show");
                }
            });

        });
    </script>

    </html>
</div>
