<form action="{{ route('register-student') }}" method="POST">
    {{ csrf_field() }}
    <div id="register-modal" class="flex justify-center text-center mb-8" style="display:none;">

        <div class=" bg-white w-1/2 shadow-lg py-4 border border-blue-lightest rounded ">

            <h2 class="text-blue-dark mb-6">Register</h2>

            <div class="flex-inline sm:mb-4">
                <input type="text" name="firstname" class="form-input sm:mb-0" placeholder="First name" autofocus required>
                <input type="text" name="lastname" class="form-input sm:mb-0" placeholder="Last name" required>
            </div>

            <div class="flex-inline sm:mb-4">
                <input type="email" name="email" class="form-input sm:mb-0" placeholder="E-mail address" required>
                <input type="tel" name="phone" class="form-input sm:mb-0" placeholder="Phone number">
            </div>

            <div class="flex-inline sm:mb-4">
                Group
                <select name="group" class="form-select-input sm:mb-0" required>
                    <option value="syborch">SyBOrCh</option>
                    <option value="grossmann">Grossmann</option>
                </select>

                <select name="role" class="form-select-input sm:mb-0" required>
                    <option value="student">Student</option>
                    <option value="staff">Staff</option>
                </select>
            </div>

            <div class="flex-inline sm:mb-4">
                Start Date
                <input type="date" name="start" value="{{ $date }}" class="form-select-input sm:mb-0">
            </div>
            <div class="flex-inline sm:mb-4">
                End Date
                <input type="date" name="end" class="form-select-input sm:mb-0">
            </div>

            <div class="flex-inline sm:mb-4">
                <p class="text-xs text-grey-dark mt-2 mb-2">Think of a new, easy to remember password</p>
                <input type="password" name="password" class="border border-blue-light mb-4 sm:mb-0 text-blue-dark text-center h-8
                                    bg-grey-lighter rounded" placeholder="Account password" required>
            </div>

            <div class="flex-inline sm:mb-4">
                <button type="submit" class="bg-white text-blue-dark border border-blue rounded py-2 px-4 ml-2 hover:bg-blue hover:text-white
                        shadow-md">Register</button>
            </div>

        </div>
    </div>
</form>