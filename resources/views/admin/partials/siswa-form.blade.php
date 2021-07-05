<div class="card hoverable">
    <div class="card-action">
        <a href="{{ route('menu.admin.siswa.index') }}">
            <button class="btn waves-effect waves-light blue darken-2" type="button" name="action">
                <i class="material-icons right">keyboard_return</i>
            </button>
        </a>
    </div>
    <div class="card-content">

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

    </div>
    <div class="card-action">
        <button class="btn waves-effect waves-light red" type="submit" name="action">
            <i class="material-icons right">send</i>
        </button>
    </div>
</div>
