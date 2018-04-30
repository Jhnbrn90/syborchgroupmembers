<form action="{{ route('register-student') }}" method="POST">
    {{ csrf_field() }}
    <div id="register-modal" class="flex justify-center text-center mb-8" style="display:none;">
        <div class=" bg-white w-1/2 shadow-lg py-4 border border-blue-lightest rounded ">
            <h2 class="text-blue-dark mb-2 ">Register</h2>
            <div class="flex-inline sm:mb-4">
                <input type="text" name="firstname" class="border border-blue-light mb-4 sm:mb-0 text-blue-dark text-center h-8
                        bg-grey-lighter rounded" placeholder="First name" autofocus required>
                <input type="text" name="lastname" class="border border-blue-light mb-4 sm:mb-0 text-blue-dark text-center h-8
                        bg-grey-lighter rounded" placeholder="Last name" required>
            </div>

            <div class="flex-inline sm:mb-4">
                <input type="email" name="email" class="border border-blue-light mb-4 sm:mb-0 text-blue-dark text-center h-8
        bg-grey-lighter rounded" placeholder="E-mail address" required>
                <input type="tel" name="phone" class="border border-blue-light mb-4 sm:mb-0 text-blue-dark text-center
        h-8 bg-grey-lighter rounded" placeholder="Phone number">
            </div>

            <div class="flex-inline sm:mb-4">

                <select name="group" class="px-4 py-2 border border-blue-light mb-4 sm:mb-0 text-blue-light text-center h-8 bg-grey-lighter rounded">
                    <option value="syborch">SyBOrCh</option>
                    <option value="grossmann">Grossmann</option>
                </select>

                <select name="role" class="px-4 py-2 border border-blue-light mb-4 sm:mb-0 text-blue-light text-center h-8 bg-grey-lighter rounded">
                    <option value="student">Student</option>
                    <option value="phd">PhD</option>
                </select>
            </div>

            <div class="flex-inline sm:mb-4">
                <input type="password" name="password" class="border border-blue-light mb-4 sm:mb-0 text-blue-dark text-center h-8
                                    bg-grey-lighter rounded" placeholder="Account password" required>
                <p class="text-xs text-grey-dark mt-2">Think of a new, easy to remember password</p>
            </div>

            <div class="flex-inline sm:mb-4">
                <button type="submit" class="bg-white text-blue-dark border border-blue rounded py-2 px-4 ml-2 hover:bg-blue hover:text-white
                        shadow-md">Register</button>
            </div>

        </div>
    </div>
</form>