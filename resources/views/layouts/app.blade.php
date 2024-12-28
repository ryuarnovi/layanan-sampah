<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Layanan Sampah')</title>
    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        /* Gaya untuk navbar transparan */
    </style>
</head>
<body class="bg-white">
    <!-- Navbar -->
    <nav class="bg-gray-800 text-white">
        <div class="container mx-auto flex justify-between items-center p-4">
            <a class="text-xl font-bold" href="#">Layanan Sampah</a>
            <button class="md:hidden text-white focus:outline-none" id="navbar-toggle">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                </svg>
            </button>
            <div class="hidden md:flex md:items-center md:space-x-4" id="navbar">
                <ul class="flex space-x-4">
                    <li><a class="hover:text-gray-300" href="{{ route('home') }}">Home</a></li>
                    <li><a class="hover:text-gray-300" href="{{ route('layanan-sampah.index') }}">Layanan Sampah</a></li>
                    <li><a class="hover:text-gray-300" href="#">About</a></li>
                    <li><a class="hover:text-gray-300" href="#">Services</a></li>
                    <li><a class="hover:text-gray-300" href="#">Contact</a></li>
                </ul>

                <!-- Search Form in the Center -->
                <form class="flex mx-auto" role="search">
                    <input class="form-input rounded-l-md border-gray-300" type="search" placeholder="Search" aria-label="Search">
                    <button class="bg-gray-600 text-white rounded-r-md px-4">Search</button>
                </form>

                <!-- Right Side Buttons -->
                <div class="flex items-center space-x-2">
                    <a href="#" class="bg-gray-600 text-white px-4 py-2 rounded">Register</a>
                    <img src="{{ asset('images/icon/user.png') }}" alt="Profile" class="rounded-full w-8 h-8">
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-5">
        @yield('content') <!-- Tempat untuk konten halaman -->
    </div>

    <footer class="bg-gray-200 text-center text-lg-start mt-5">
        <div class="text-center p-3">
            © 2023 Layanan Sampah. Semua hak dilindungi.
        </div>
    </footer>

    <!-- Tailwind JS (optional) -->
    <script>
        document.getElementById('navbar-toggle').addEventListener('click', function() {
            const navbar = document.getElementById('navbar');
            navbar.classList.toggle('hidden');
        });
    </script>
</body>
</html>