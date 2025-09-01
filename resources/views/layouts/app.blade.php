<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.2/tailwind.min.css" rel="stylesheet">
    <style>
        /* Dark mode styles */
        .dark body {
            background-color: #1a202c;
            color: #e2e8f0;
        }
        .dark .bg-gray-200 {
            background-color: #2d3748;
        }
        .dark .bg-blue-900 {
            background-color: #1a365d;
        }
        .dark .text-gray-300 {
            color: #cbd5e0;
        }
        .dark .hover\:underline:hover {
            text-decoration: underline;
        }
        
        /* Content area dark mode styles */
        .dark .text-gray-800 {
            color: #e2e8f0;
        }
        .dark .text-gray-600 {
            color: #cbd5e0;
        }
        .dark .text-black {
            color: #f7fafc;
        }
        .dark .border-gray-300 {
            border-color: #4a5568;
        }
        .dark .bg-blue-600 {
            background-color: #3182ce;
        }
        .dark .bg-blue-600:hover {
            background-color: #2c5aa0;
        }
        
        /* Dark mode toggle button styles */
        .dark-mode-toggle {
            transition: all 0.3s ease;
        }
        .dark-mode-toggle:hover {
            transform: scale(1.1);
        }
        
        /* Smooth transitions for all elements */
        * {
            transition: background-color 0.2s ease, color 0.2s ease, border-color 0.2s ease;
        }
    </style>
</head>
<body class="bg-gray-200 h-screen antialiased leading-none font-sans transition-colors duration-200">
    <div id="app">
        <header class="bg-blue-900 py-4 transition-colors duration-200">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <h1 class="text-white text-xl font-bold">Laravel Cart</h1>
                </div>
                <div class="flex items-center space-x-4">
                    <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                        <a class="no-underline hover:underline transition-colors duration-200" href="/">Home</a>
                        <a class="no-underline hover:underline transition-colors duration-200" href="/shop">Shop</a>
                        <a class="no-underline hover:underline transition-colors duration-200" href="/cart">Cart</a>
                    </nav>
                    <!-- Dark Mode Toggle Button -->
                    <button 
                        @click="darkMode = !darkMode" 
                        class="dark-mode-toggle p-2 rounded-lg bg-gray-700 hover:bg-gray-600 text-white transition-all duration-200"
                        :title="darkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode'"
                    >
                        <svg x-show="!darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg x-show="darkMode" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </header>
        @yield('content')

        <!-- Error Messages Only -->
        @if(session('error'))
            <div id="error-message" class="fixed top-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 transform transition-all duration-300 translate-x-full">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    {{ session('error') }}
                </div>
            </div>
        @endif

    </div>

    <script>
        // Auto-hide error messages after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const errorMessage = document.getElementById('error-message');
            
            if (errorMessage) {
                setTimeout(() => {
                    errorMessage.classList.remove('translate-x-full');
                    setTimeout(() => {
                        errorMessage.classList.add('translate-x-full');
                    }, 100);
                }, 100);
                
                setTimeout(() => {
                    errorMessage.classList.add('translate-x-full');
                }, 5000);
            }
        });
    </script>
</body>
</html>