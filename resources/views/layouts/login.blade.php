<form action="{{ route('login') }}" method="POST">
    <div id="login-modal" class="flex justify-center text-center mb-8" style="display:none;">
        {{ csrf_field() }}
        <div class=" bg-white w-1/2 shadow-lg py-4 border border-blue-lightest rounded ">
            <h2 class="text-blue-dark mb-2 ">Log in</h2>
            <div class="flex-inline ">
                <input type="text" name="email" class="border border-blue-light mb-4 sm:mb-0 text-blue-dark text-center h-8
        bg-grey-lighter rounded" placeholder="E-mail address" autofocus required>
                <input type="password" name="password" class="border border-blue-light mb-4 sm:mb-0 text-blue-dark text-center
        h-8 bg-grey-lighter rounded" placeholder="Password" required>
                <input type="checkbox" name="remember" {{ old( 'remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                <button type="submit" class="bg-white text-blue-dark border border-blue rounded py-2 px-4 ml-2 hover:bg-blue hover:text-white
        shadow-md">Log in</button>
            </div>
        </div>
    </div>
</form>