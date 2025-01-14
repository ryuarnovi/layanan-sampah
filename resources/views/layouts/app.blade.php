<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/theme.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>@yield('title', 'Layanan Sampah')</title>
    <link rel="icon" href="{{asset('images/icon/logo.png')}}">
    <link rel="shortcut icon" href="{{ asset('images/icon/logo.png') }}" type="image/x-icon">
    <style>
        .nav-content {
            transition: background-color 0.3s ease;
        }
        .dropdown-transition {
            transition: opacity 0.2s ease-in-out, transform 0.2s ease-in-out;
        }
        .nav-link {
            position: relative;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: -4px;
            left: 0;
            background-color: white;
            transition: width 0.3s ease;
        }
        .nav-link:hover::after {
            width: 100%;
        }
    </style>
    @yield('styles')
</head>
<body class="{{ session('theme', 'light') }}-theme">
    <div class="navbar relative">
        <div class="nav-content fixed top-0 left-0 right-0 z-50">
<<<<<<< HEAD
            <div class="container mx-auto flex justify-between items-center">
                <!-- Left side: Logo and nav links -->
                <div class="flex items-center space-x-8">
                    <img class="logo rounded-5" src="{{ asset('images/icon/logo.png') }}" alt="Logo">
                    <div class="hidden md:flex items-center space-x-8">
                        <a class="text-white hover:text-gray-300 font-medium" href="{{ route('home') }}">
                            <i class="fas fa-home mr-3"></i>
                            Home</a>
                        <div class="relative group">
                            <a class="text-white hover:text-gray-300 font-medium" href="#" id="navbarDropdown" role="button" aria-expanded="false">
                                <i class="fas fa-info-circle mr-3"></i>
                                Info Layanan
                                <i class="fas fa-chevron-down ml-auto transform transition-transform duration-100"></i>
                            </a>
                            <div class="absolute left-0 hidden bg-green-700 rounded-md mt-2 py-2 w-48 group-hover:block" id="infoLayananDropdown">
                                <a class="block text-white hover:bg-green-800 px-4 py-2" href="{{ route('donasi.donasi') }}">                                <i class="fas fa-hand-holding-heart mr-2"></i>
                                    Donasi</a>
                                <a class="block text-white hover:bg-green-800 px-4 py-2" href="{{route ('posts.index')}}">                                <i class="fas fa-newspaper mr-2"></i>
                                    News</a>
                            </div>
                        </div>
                        <a class="text-white hover:text-gray-300 font-medium" href="{{route('relawan.register')}}">                        <i class="fas fa-user-plus mr-3"></i>
                            Registrasi</a>
                        <a class="text-white hover:text-gray-300 font-medium" href="{{route('contact.index')}}">                        <i class="fas fa-envelope mr-3"></i>
                            Contact</a>
                    </div>
                </div>
                
                <!-- Right side: search and Profile -->
                <div class="flex items-center space-x-8">
                    <div class="relative items-center" role="search">
                        <form action="{{ route('posts.search') }}" method="GET" class="relative items-center" role="search">
                            <div class="flex items-center bg-white bg-opacity-20 rounded-lg px-6 py-2 space-x-2">
                                <span class="text-white" aria-hidden="true">🔍</span>
                                <input 
                                    type="text" 
                                    name="query" 
                                    placeholder="Search posts..." 
                                    class="bg-transparent text-white placeholder-white focus:outline-none"
                                >
                            </div>
                        </form>
                    </div>
                    <!-- Profile Button with Dropdown -->
                    <div class="relative group">
                        <button class="w-10 h-10 bg-opacity-20 flex items-center justify-center hover:bg-opacity-30 transition-colors">
                            <a href="{{ route('profile') }}"><img src="{{ asset('images/icon/profile-user.png') }}" alt="Profile"></a>
                        </button>
                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 hidden group-hover:block mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                            <a href="{{ route('profile') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                            <div class="border-t border-gray-100"></div>
                            <form action="{{ route('logout') }}" method="POST" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                @csrf
                                <button type="submit" class="w-full text-left">Sign out</button>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Hamburger Menu for Mobile -->
                    <div class="md:hidden">
                        <button id="hamburger" class="text-white focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0  24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
=======
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center h-16">
                    <!-- Left side: Logo and nav links -->
                    <div class="flex items-center space-x-8">
                        <a href="{{ route('home') }}" class="flex-shrink-0">
                            <img class="h-12 w-auto rounded-5" src="{{ asset('images/icon/logo.png') }}" alt="Logo">
                        </a>
                        
                        <!-- Desktop Navigation -->
                        <div class="hidden md:flex items-center space-x-8">
                            <a class="nav-link text-white hover:text-gray-200 font-medium transition-colors" 
                               href="{{ route('home') }}">Home</a>
                            
                            <!-- Info Layanan Dropdown -->
                            <div class="relative group">
                                <button 
                                    class="nav-link text-white hover:text-gray-200 font-medium flex items-center space-x-1 focus:outline-none"
                                    id="infoLayananButton"
                                    aria-expanded="false"
                                    aria-haspopup="true"
                                    aria-controls="infoLayananDropdown">
                                    <span>Info Layanan</span>
                                    <svg class="w-4 h-4 transition-transform duration-200" 
                                         fill="none" 
                                         stroke="currentColor" 
                                         viewBox="0 0 24 24">
                                        <path stroke-linecap="round" 
                                              stroke-linejoin="round" 
                                              stroke-width="2" 
                                              d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div 
                                    id="infoLayananDropdown"
                                    class="absolute left-0 hidden bg-green-700 rounded-md mt-2 py-2 w-48 shadow-lg transform opacity-0 transition-all duration-200 ease-in-out"
                                    role="menu"
                                    aria-orientation="vertical"
                                    aria-labelledby="infoLayananButton">
                                    <a class="block text-white hover:bg-green-800 px-4 py-2 transition-colors duration-150" 
                                       href="{{ route('donasi.donasi') }}"
                                       role="menuitem">Donasi</a>
                                    <a class="block text-white hover:bg-green-800 px-4 py-2 transition-colors duration-150" 
                                       href="{{route ('posts.index')}}"
                                       role="menuitem">News</a>
                                </div>
                            </div>
                            
                            <a class="nav-link text-white hover:text-gray-200 font-medium transition-colors" 
                               href="{{route('relawan.register')}}">Registrasi</a>
                            <a class="nav-link text-white hover:text-gray-200 font-medium transition-colors" 
                               href="{{route('contact.index')}}">Contact</a>
                        </div>
                    </div>

                    <!-- Right side: Search and Profile -->
                    <div class="flex items-center space-x-6">
                        <!-- Search Component -->
                        <div class="relative hidden md:block">
                            <form action="{{ route('search') }}" method="GET" class="flex items-center">
                                <div class="flex items-center bg-white bg-opacity-20 rounded-lg px-4 py-2 space-x-2">
                                    <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" 
                                              stroke-linejoin="round" 
                                              stroke-width="2" 
                                              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                    </svg>
                                    <input 
                                        type="text" 
                                        name="query" 
                                        placeholder="Search..." 
                                        class="bg-transparent text-white placeholder-white border-none focus:outline-none w-40 lg:w-60"
                                        value="{{ request('query') }}"
                                    >
                                </div>
                            </form>
                            <div id="searchResults" 
                                 class="absolute w-full mt-2 bg-white rounded-lg shadow-lg hidden z-50">
                            </div>
                        </div>

                        <!-- Profile Dropdown -->
                        <div class="relative group">
                            <button class="w-10 h-10 rounded-full bg-white bg-opacity-20 flex items-center justify-center hover:bg-opacity-30 transition-colors focus:outline-none">
                                <a href="{{ route('profile') }}">
                                    <img src="{{ asset('images/icon/user.png') }}" 
                                         alt="Profile"
                                         class="w-8 h-8 rounded-full">
                                </a>
                            </button>
                            <div class="absolute right-0 hidden group-hover:block mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                <a href="{{ route('profile') }}" 
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                <a href="{{ route('profile.edit') }}" 
                                   class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                <div class="border-t border-gray-100"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" 
                                            class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-gray-100">
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Mobile Menu Button -->
                        <button 
                            id="hamburger"
                            class="md:hidden text-white focus:outline-none"
                            aria-label="Menu">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" 
                                      stroke-linejoin="round" 
                                      stroke-width="2" 
                                      d="M4 6h16M4 12h16m-7 6h7" />
>>>>>>> fc4e0ccd5667e53ce76d972d2ec3eabdf8196b5e
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Navbar Line -->
            <img src="{{ asset('images/icon/navbar.png') }}" 
                 class="navbarLine w-full" 
                 alt="Navbar Line"
                 aria-hidden="true">
        </div>
<<<<<<< HEAD
        <!-- Sidebar Menu -->
                <!-- Sidebar Overlay -->
                <div id="sidebarOverlay" class="sidebar-overlay"></div>

                <!-- Enhanced Sidebar -->
                <div id="sidebar" class="sidebar">
                    <button class="absolute top-4 right-4 text-white hover:text-gray-300 transition-transform duration-300 hover:rotate-90" id="sidebarClose">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
        
                    <a href="{{ route('home') }}" class="sidebar-menu-item">
                        <i class="fas fa-home mr-3"></i>
                        Home
                    </a>
        
                    <div class="relative">
                        <button class="sidebar-menu-item w-full text-left" id="sidebarDropdown">
                            <i class="fas fa-info-circle mr-3"></i>
                            Info Layanan
                            <i class="fas fa-chevron-down ml-auto transform transition-transform duration-300"></i>
                        </button>
                        <div class="sidebar-dropdown" id="sidebarDropdownMenu">
                            <a href="{{ route('donasi.donasi') }}">
                                <i class="fas fa-hand-holding-heart mr-2"></i>
                                Donasi
                            </a>
                            <a href="{{route ('posts.index')}}">
                                <i class="fas fa-newspaper mr-2"></i>
                                News
                            </a>
                        </div>
                    </div>
        
                    <a href="{{route('relawan.register')}}" class="sidebar-menu-item">
                        <i class="fas fa-user-plus mr-3"></i>
                        Registrasi
                    </a>
        
                    <a href="{{route('contact.index')}}" class="sidebar-menu-item">
                        <i class="fas fa-envelope mr-3"></i>
                        Contact
                    </a>
                </div>
=======

        <!-- Mobile Sidebar -->
        <div id="sidebar" 
             class="fixed top-0 right-0 h-full w-64 bg-green-700 transform translate-x-full transition-transform duration-300 ease-in-out z-50">
            <div class="p-6">
                <div class="flex justify-end">
                    <button id="closeSidebar" 
                            class="text-white focus:outline-none"
                            aria-label="Close menu">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" 
                                  stroke-linejoin="round" 
                                  stroke-width="2" 
                                  d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <!-- Mobile Search -->
                <div class="mt-6">
                    <form action="{{ route('search') }}" method="GET">
                        <div class="flex items-center bg-white bg-opacity-20 rounded-lg px-4 py-2 space-x-2">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" 
                                      stroke-linejoin="round" 
                                      stroke-width="2" 
                                      d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                            <input 
                                type="text" 
                                name="query" 
                                placeholder="Search..." 
                                class="bg-transparent text-white placeholder-white border-none focus:outline-none w-full"
                                value="{{ request('query') }}"
                            >
                        </div>
                    </form>
                </div>

                <!-- Mobile Navigation Links -->
                <nav class="mt-8 space-y-4">
                    <a class="block text-white hover:text-gray-300 font-medium" 
                       href="{{ route('home') }}">Home</a>
                    
                    <!-- Mobile Info Layanan Dropdown -->
                    <div>
                        <button 
                            class="text-white hover:text-gray-300 font-medium w-full text-left flex items-center justify-between"
                            id="mobileInfoLayanan">
                            <span>Info Layanan</span>
                            <svg class="w-4 h-4 transition-transform duration-200" 
                                 fill="none" 
                                 stroke="currentColor" 
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" 
                                      stroke-linejoin="round" 
                                      stroke-width="2" 
                                      d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="hidden pl-4 mt-2 space-y-2" id="mobileInfoLayananDropdown">
                            <a class="block text-white hover:text-gray-300 py-2" 
                               href="{{ route('donasi.donasi') }}">Donasi</a>
                            <a class="block text-white hover:text-gray-300 py-2" 
                               href="{{route ('posts.index')}}">News</a>
                        </div>
                    </div>
                    
                    <a class="block text-white hover:text-gray-300 font-medium" 
                       href="{{route('relawan.register')}}">Registrasi</a>
                    <a class="block text-white hover:text-gray-300 font-medium" 
                       href="{{route('contact.index')}}">Contact</a>
                </nav>
            </div>
        </div>
>>>>>>> fc4e0ccd5667e53ce76d972d2ec3eabdf8196b5e
    </div>

    <!-- Main Content -->
    <div class="pt-16">
        @yield('content')
    </div>
    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="text-center md:text-left">
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <address class="not-italic">
                        <p>rizki.ardiansyah.noviatno123@gmail.com</p>
                        <p>+62 12345678</p>
                    </address>
                </div>
                <div class="text-center md:text-right">
                    <h3 class="text-lg font-semibold mb-4">Follow Us</h3>
                    <div class="flex justify-center md:justify-end space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <p class="text-sm text-gray-400 mt-4">&copy; 2024 Layanan Sampah</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Navbar scroll effect
            const navbar = document.querySelector('.nav-content');
            const navbarImage = document.querySelector('.navbar img');
            const navbarLine = document.querySelector('.navbarLine');

            function updateNavbar() {
                if (window.scrollY > 0) {
                    navbar.style.backgroundColor = '#328F25';
                    navbarImage?.classList.add('scrolled');
                    navbarLine?.classList.add('scrolled');
                } else {
                    navbar.style.backgroundColor = 'transparent';
                    navbarImage?.classList.remove('scrolled');
                    navbarLine?.classList.remove('scrolled');
                }
            }

            window.addEventListener('scroll', updateNavbar);
            updateNavbar(); // Initial check

            // Desktop dropdown functionality
            const dropdownButton = document.getElementById('infoLayananButton');
            const dropdownMenu = document.getElementById('infoLayananDropdown');
            let isDropdownOpen = false;

            function showDropdown() {
                dropdownMenu.classList.remove('hidden', 'opacity-0');
                dropdownMenu.classList.add('opacity-100');
                dropdownButton.setAttribute('aria-expanded', 'true');
                dropdownButton.querySelector('svg').classList.add('rotate-180');
                isDropdownOpen = true;
            }

            function hideDropdown() {
                dropdownMenu.classList.add('opacity-0');
                dropdownButton.setAttribute('aria-expanded', 'false');
                dropdownButton.querySelector('svg').classList.remove('rotate-180');
                isDropdownOpen = false;
                
                setTimeout(() => {
                    if (!isDropdownOpen) {
                        dropdownMenu.classList.add('hidden');
                    }
                }, 200);
            }

            if (dropdownButton && dropdownMenu) {
                dropdownButton.addEventListener('click', (e) => {
                    e.stopPropagation();
                    if (dropdownMenu.classList.contains('hidden')) {
                        showDropdown();
                    } else {
                        hideDropdown();
                    }
                });

                // Keyboard navigation
                dropdownButton.addEventListener('keydown', (e) => {if (e.key === 'Enter' || e.key === ' ') {
                        e.preventDefault();
                        if (dropdownMenu.classList.contains('hidden')) {
                            showDropdown();
                        } else {
                            hideDropdown();
                        }
                    } else if (e.key === 'Escape') {
                        hideDropdown();
                    }
                });

                // Close dropdown when clicking outside
                document.addEventListener('click', (e) => {
                    if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                        hideDropdown();
                    }
                });
            }

            // Mobile menu functionality
            const hamburger = document.getElementById('hamburger');
            const sidebar = document.getElementById('sidebar');
            const closeSidebar = document.getElementById('closeSidebar');
            
            if (hamburger && sidebar && closeSidebar) {
                function toggleSidebar(show) {
                    sidebar.classList.toggle('translate-x-full', !show);
                    document.body.style.overflow = show ? 'hidden' : '';
                }

                hamburger.addEventListener('click', () => toggleSidebar(true));
                closeSidebar.addEventListener('click', () => toggleSidebar(false));

                // Close sidebar when clicking outside
                document.addEventListener('click', (e) => {
                    if (!sidebar.contains(e.target) && !hamburger.contains(e.target) && !sidebar.classList.contains('translate-x-full')) {
                        toggleSidebar(false);
                    }
                });
            }

            // Mobile Info Layanan dropdown
            const mobileInfoLayanan = document.getElementById('mobileInfoLayanan');
            const mobileInfoLayananDropdown = document.getElementById('mobileInfoLayananDropdown');
            const mobileDropdownArrow = mobileInfoLayanan?.querySelector('svg');
            
            if (mobileInfoLayanan && mobileInfoLayananDropdown) {
                mobileInfoLayanan.addEventListener('click', () => {
                    const isHidden = mobileInfoLayananDropdown.classList.contains('hidden');
                    mobileInfoLayananDropdown.classList.toggle('hidden');
                    mobileDropdownArrow?.classList.toggle('rotate-180', isHidden);
                });
            }

            // Search functionality
            const searchInput = document.querySelector('input[name="query"]');
            const searchResults = document.getElementById('searchResults');
            let searchTimeout;

            if (searchInput && searchResults) {
                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    const query = this.value;

                    if (query.length < 2) {
                        searchResults.classList.add('hidden');
                        return;
                    }

                    searchTimeout = setTimeout(() => {
                        fetch(`/api/search?query=${encodeURIComponent(query)}`)
                            .then(response => response.json())
                            .then(data => {
                                if (data.results && data.results.length > 0) {
                                    searchResults.innerHTML = data.results.map(result => `
                                        <a href="${result.url}" class="block p-3 hover:bg-gray-100">
                                            <div class="font-medium text-gray-900">${result.title}</div>
                                            <div class="text-sm text-gray-600">${result.excerpt}</div>
                                        </a>
                                    `).join('');
                                    searchResults.classList.remove('hidden');
                                } else {
                                    searchResults.innerHTML = `
                                        <div class="p-3 text-gray-600">No results found</div>
                                    `;
                                    searchResults.classList.remove('hidden');
                                }
                            })
                            .catch(error => {
                                console.error('Search error:', error);
                                searchResults.innerHTML = `
                                    <div class="p-3 text-gray-600">An error occurred while searching</div>
                                `;
                                searchResults.classList.remove('hidden');
                            });
                    }, 300);
                });

                // Hide search results when clicking outside
                document.addEventListener('click', (e) => {
                    if (!searchResults.contains(e.target) && !searchInput.contains(e.target)) {
                        searchResults.classList.add('hidden');
                    }
                });

                // Close search results on escape key
                document.addEventListener('keydown', (e) => {
                    if (e.key === 'Escape' && !searchResults.classList.contains('hidden')) {
                        searchResults.classList.add('hidden');
                    }
                });
            }
        });
<<<<<<< HEAD

        // Wait for DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function() {
    // Navbar scroll effect (keeping existing functionality)
    window.addEventListener('scroll', function() {
        var navbar = document.querySelector('.nav-content');
        var navbarImage = document.querySelector('.navbar img');
        var navbarLine = document.querySelector('.navbarLine');
        if (window.scrollY > 0) {
            navbar.style.backgroundColor = '#328F25';
            navbarImage.classList.add('scrolled');
            navbarLine.classList.add('scrolled');
        } else {
            navbar.style.backgroundColor = 'transparent';
            navbarImage.classList.remove('scrolled');
            navbarLine.classList.remove('scrolled');
        }
    });

    // Sidebar toggle functionality
    const hamburger = document.getElementById('hamburger');
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const sidebarClose = document.getElementById('sidebarClose');
    
    // Toggle sidebar
    hamburger.addEventListener('click', function() {
        sidebar.classList.add('open');
        sidebarOverlay.classList.add('active');
        document.body.style.overflow = 'hidden'; // Prevent body scroll
    });

    // Close sidebar functions
    function closeSidebar() {
        sidebar.classList.remove('open');
        sidebarOverlay.classList.remove('active');
        document.body.style.overflow = ''; // Restore body scroll
    }

    sidebarClose.addEventListener('click', closeSidebar);
    sidebarOverlay.addEventListener('click', closeSidebar);

    // Sidebar dropdown functionality
    const sidebarDropdown = document.getElementById('sidebarDropdown');
    const sidebarDropdownMenu = document.getElementById('sidebarDropdownMenu');
    const dropdownIcon = sidebarDropdown.querySelector('.fa-chevron-down');

    sidebarDropdown.addEventListener('click', function() {
        sidebarDropdownMenu.classList.toggle('open');
        dropdownIcon.style.transform = sidebarDropdownMenu.classList.contains('open') 
            ? 'rotate(180deg)' 
            : 'rotate(0deg)';
    });
});
        </script>
        <script src="{{ asset('js/theme.js') }}"></script>
=======
    </script>
    <script src="{{ asset('js/theme.js') }}"></script>
>>>>>>> fc4e0ccd5667e53ce76d972d2ec3eabdf8196b5e
</body>
</html>