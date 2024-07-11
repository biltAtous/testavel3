<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>House Invest Patrimony</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <style>

        </style>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="p-8 mx-auto max-w-[1280px]">
        <nav class="w-full flex flex-row flex-wrap justify-between p-4 bg-gray-200 my-6">
            <div class="flex flex-row gap-4">
                <a href="/">Home</a>
                @if(Auth::user())
                    <a href="/posts">Posts</a>
                    <a href="/posts/create">Add Post</a>
                @endif
            </div>
            <div>
            @if(Auth::user())
                <a href="{{ route('admin.logout') }}">Logout</a>
            @else
                <a href="{{ route('admin.login') }}">Login</a>,   
                <a href="{{ route('admin.register') }}">Register</a>   
            </div>
            @endif

        </nav>
        @session('message')
        <div class="w-full p-2 bg-gray-400">
            <p class="text-center text-xl">
                {{ session('message') }}
            </p>
        </div>
        @endsession
        {{ $slot }}
    </body>
</html>
