<nav class="mb-4 rounded-lg">
    <div class="flex p-2 items-center">
        <div class="w-1/4"></div>
        <div class="w-1/2 text-center">
            <div class="sm:text-5xl text-3xl font-hairline tracking-wide">
                <img src="logo.jpg">
            </div>
        </div>

        <div class="w-1/4 text-right mr-8">
            @auth
            <a href="{{ url('/home') }}">Home</a> @else
            <a class="no-underline text-xs sm:text-base text-grey tracking-wide font-thin hover:text-blue mr-4" href="{{ route('login') }}">Login</a>
            <a class="no-underline text-xs sm:text-base text-grey tracking-wide font-thin hover:text-blue" href="{{ route('register') }}">Register</a>            @endauth
        </div>
    </div>
</nav>