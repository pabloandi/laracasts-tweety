<x-layout>
    <div class="flex flex-1 flex-col justify-center items-center h-screen">
        <div class="title m-b-md">
            Tweety
        </div>

        <div class="links">
            <a href="https://laracasts.com">Laracasts</a>

            @auth
                <a href="{{ route('home') }}">Home</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </div>
    </div>
</x-layout>
