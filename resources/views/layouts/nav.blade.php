<nav class="mb-4 rounded-lg">
    <div class="flex p-2 items-center">
        <div class="w-1/4"></div>
        <div class="w-1/2 text-center">
            <div class="sm:text-5xl text-3xl font-hairline tracking-wide">
                <img height="100" src="logo.jpg">
            </div>
        </div>

        <div class="w-1/4 text-right mr-8">
            @auth
            <span class="tracking-wide">Hi there, <span class="font-medium text-blue-dark">{{ ucfirst(auth()->user()->name) }}</span>!
            </span> <br><a class="no-underline text-grey hover:text-red-light" href="/logout">(log out)</a> @else
            <auth-buttons></auth-buttons> @endauth
        </div>
    </div>
</nav>