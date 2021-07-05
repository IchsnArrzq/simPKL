<div class="card hoverable">
    <div class="card-action">
        <a href="{{ route('menu.admin.user.index') }}">
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
        <div class="input-field">
            <i class="material-icons prefix">accessibility</i>
            <select name="role" v-on:change="role">
                <option value="admin">Admin</option>
                <option value="kakomli">Ketua Kompetensi Keahlian</option>
                <option value="pembimbing_industri">Pembimbing Industri</option>
                <option value="pembimbing_sekolah">Pembimbing Sekolah</option>
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
