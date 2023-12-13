<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Chess Game Site</title>
</head>

<body class="bg-gray-200 text-gray-700">
    @if (Route::has('login'))
    <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
        @auth
        <a href="{{ route('profile.edit') }}"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Profile</a>
        <form method="POST" action="{{ route('logout') }}" class="inline">
            @csrf
            <button type="submit"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Logout</button>
        </form>
        @else
        <a href="{{ route('login') }}"
            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log
            in</a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}"
            class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
        @endif
        @endauth
    </div>
    @endif
    <div class="min-h-screen flex items-center justify-center">
        <div class="max-w-md w-full px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <h1 class="mb-4 text-xl font-bold text-center">Welcome</h1>
            <div class="space-y-6">
                <a href="{{ route('game') }}"
                    class="block w-full px-6 py-2 text-center text-white bg-gray-900 hover:bg-gray-800 rounded">게임</a>
                <a href="{{route('posts.index')}}"
                    class="block w-full px-6 py-2 text-center text-white bg-gray-500 hover:bg-gray-600 rounded">게시판</a>
            </div>
        </div>
    </div>
</body>

</html>