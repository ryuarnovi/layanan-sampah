<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Add Font Awesome for the profile icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <title>@yield('title', 'Layanan Sampah')</title>
    <link rel="shortcut icon" href="{{ asset('logo.png') }}" type="image/x-icon">
    @yield('styles')
    <style>
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar relative">
        <div class="nav-content fixed top-0 left-0 right-0 z-50">
            <div class="container mx-auto flex justify-between items-center">
                <!-- Left side: Logo and nav links -->
                <div class="flex items-center space-x-8">
                    <img class="logo rounded-5" src="{{ asset('images/icon/daun10.png') }}" alt="Logo">
                    <div class="hidden md:flex items-center space-x-8">
                        <a class="text-white hover:text-gray-300 font-medium" href="{{ route('home') }}">Home</a>
                        <div class="relative group">
                            <a class="text-white hover:text-gray-300 font-medium" href="#" id="navbarDropdown" role="button" aria-expanded="false">
                                Info Layanan
                            </a>
                            <div class="absolute left-0 hidden bg-green-700 rounded-md mt-2 py-2 w-48 group-hover:block" id="infoLayananDropdown">
                                <a class="block text-white hover:bg-green-800 px-4 py-2" href="{{ route('layanan-sampah.create') }}">Feature 1</a>
                                <a class="block text-white hover:bg-green-800 px-4 py-2" href="#">Feature 2</a>
                                <a class="block text-white hover:bg-green-800 px-4 py-2" href="#">Feature 3</a>
                            </div>
                        </div>
                        <a class="text-white hover:text-gray-300 font-medium" href="#">Services</a>
                        <a class="text-white hover:text-gray-300 font-medium" href="#">Contact</a>
                    </div>
                </div>
                
                <!-- Right side: search and Profile -->
                <div class="flex items-center space-x-8">
                    <div class="relative items-center" role="search">
                        <div class="flex items-center bg-white bg-opacity-20 rounded-lg px-6 py-2 space-x-2">
                            <span class="text-white" aria-hidden="true">🔍</span>
                            <span class="text-white">Search</span>
                        </div>
                    </div>
                    <!-- Profile Button with Dropdown -->
                    <div class="relative group">
                        <button class="w-10 h-10 bg-opacity-20 flex items-center justify-center hover:bg-opacity-30 transition-colors">
                            <img src="{{asset('images/icon/user.png')}}" alt="" srcset="">
                        </button>
                        <!-- Dropdown Menu -->
                        <div class="absolute right-0 hidden group-hover:block mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                            <div class="border-t border-gray-100"></div>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Sign out</a>
                        </div>
                    </div>
                    <!-- Hamburger Menu for Mobile -->
                    <div class="md:hidden">
                        <button id="hamburger" class="text-white focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <img src="{{asset('images/icon/navbar.png')}}" class="navbarLine" alt="" srcset="">
        </div>
        <!-- Sidebar Menu -->
        <div id="sidebar" class="sidebar">
            <a class="block text-white hover:text-gray-300 font-medium py-2 px-4" href="#">Home</a>
            <a class="block text-white hover:text-gray-300 font-medium py-2 px-4" href="#">Features</a>
            <a class="block text-white hover:text-gray-300 font-medium py-2 px-4" href="#">Services</a>
            <a class="block text-white hover:text-gray-300 font-medium py-2 px-4" href="#">Contact</a>
        </div>
    </div>

    <!-- Rest of the content remains the same -->
    <div class="pt-16">

        @yield('content')
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="text-center md:text-left">
                    <h3 class="text-lg font-semibold mb-4">Contact</h3>
                    <address class="not-italic">
                        <p>metal5.0@gmail.com</p>
                        <p>+62 12345678</p>
                    </address>
                </div>
                <div class="text-center md:text-right">
                    <p class="text-sm text-gray-400">@copyright2024 metal 5.0</p>
                </div>
            </div>
        </div>
    </footer>

    @yield('scripts')

    <script>
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

        document.getElementById('hamburger').addEventListener('click', function() {
            var sidebar = document.getElementById('sidebar');
            if (sidebar.classList.contains('open')) {
                sidebar.classList.remove('open');
            } else {
                sidebar.classList.add('open');
            }
        });

        document.getElementById('navbarDropdown').addEventListener('click', function(event) {
            event.preventDefault();
            var dropdown = document.getElementById('infoLayananDropdown');
            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
            } else {
                dropdown.classList.add('hidden');
            }
        });
    </script>
</body>
</html>