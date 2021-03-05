<main id="app">
<div class="card-panel">

    <h4 class="header2">New User</h4>
    <div class="row">
        <form class="col s12">
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="John Doe" id="name2" value="{{ $user->name ?? ''}}" name="name" type="text">
                    <label for="first_name">Name</label>
                    @error('name')
                    <strong class="red-text">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input placeholder="john@domainname.com" name="email" value="{{ $user->email ?? ''}}" id="email2" type="email">
                    <label for="email">Email</label>
                    @error('email')
                    <strong class="red-text">{{ $message }}</strong>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6">
                    <input placeholder="YourPassword" id="password2" value="{{ $user->password ?? ''}}" name="password" type="password">
                    <label for="password">Password</label>
                    @error('password')
                    <strong class="red-text">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="input-field col s6">
                    <input id="password-confirm" type="password" placeholder="ConfirmYourPassword" name="password_confirmation" required autocomplete="new-password">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <select name="role" v-on:change="role">
                        <option value="" disabled selected>Choose your option</option>
                        <option value="Siswa">Siswa</option>
                        <option value="PembimbingPKL">Pembimbing PKL</option>
                        <option value="PembimbingIndustri">Pembimbing Industri</option>
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

</main>
