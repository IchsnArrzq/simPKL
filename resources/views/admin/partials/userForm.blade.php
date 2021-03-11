<div class="row">
    <div class="col s12 m8 l8 offset-m2 offset-l2">

        <div class="card hoverable">
            <div class="card-action">
            <a href="{{ route('menu.admin.account.index') }}">
                <button class="btn waves-effect waves-light blue darken-2" type="button" name="action">
                    <i class="material-icons right">keyboard_return</i>
                </button>
            </a>
            </div>
            <div class="card-content">

                <div class="input-field">
                    <i class="material-icons prefix">account_circle</i>
                    <input placeholder="John Doe" id="name2" value="{{ $user->name ?? ''}}" name="name" type="text">
                    <label for="first_name">Name</label>
                    @error('name')
                    <strong class="red-text">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">email</i>
                    <input placeholder="john@domainname.com" name="email" value="{{ $user->email ?? ''}}" id="email2" type="email">
                    <label for="email">Email</label>
                    @error('email')
                    <strong class="red-text">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">lock</i>
                    <input placeholder="YourPassword" id="password2" name="password" type="password">
                    <label for="password">Password</label>
                    @error('password')
                    <strong class="red-text">{{ $message }}</strong>
                    @enderror
                </div>
                @empty($user->email)
                <div class="input-field">
                    <i class="material-icons prefix">lock</i>
                    <input id="password-confirm" type="password" placeholder="ConfirmYourPassword" name="password_confirmation" required autocomplete="new-password">
                    <label for="password-confirm">{{ __('Confirm Password') }}</label>
                </div>
                @endempty
                <div class="input-field">
                    <i class="material-icons prefix">accessibility</i>
                    <select name="role" v-on:change="role">
                        @if(isset($user->email))
                        <option value="{{ $user->role }}" selected>{{ $user->role }}</option>
                        @else
                        <option value="" disabled selected>Choose your option</option>
                        @endif
                        <option value="siswa">Siswa</option>
                        <option value="kkk">Ketua Kompetensi Keahlian</option>
                        <option value="ppkl">Pembimbing PKL</option>
                    </select>
                    <label>Role</label>
                    @error('role')
                    <strong class="red-text">{{ $message }}</strong>
                    @enderror
                </div>
                <br>
                <br>

            </div>
            <div class="card-action">
                <button class="btn waves-effect waves-light red" type="submit" name="action">
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>

    </div>
</div>
