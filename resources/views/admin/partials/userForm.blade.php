<div class="card-panel">
    <h4 class="header2">New User</h4>
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="John Doe" id="name2" name="name" type="text">
                    <label for="first_name">Name</label>
                    @error('name')
                    <strong class="red-text">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="john@domainname.com" name="email" id="email2" type="email">
                    <label for="email">Email</label>
                    @error('email')
                    <strong class="red-text">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="YourPassword" id="password2" name="password" type="password">
                    <label for="password">Password</label>
                    @error('password')
                    <strong class="red-text">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input id="password-confirm" type="password" placeholder="ConfirmYourPassword" name="password_confirmation" required autocomplete="new-password">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="role">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="siswa">Siswa</option>
                        <option value="instruktur">Instruktur</option>
                        <option value="admin">Admin</option>
                    </select>
                    <label>Role</label>
                    @error('role')
                    <strong class="red-text">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button class="btn waves-effect waves-light right" type="submit" name="action">Submit
                        <i class="material-icons right">send</i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
