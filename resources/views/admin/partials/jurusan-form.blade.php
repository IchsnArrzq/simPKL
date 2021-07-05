        <div class="card hoverable">
            <div class="card-action">
                <a href="{{ route('menu.admin.jurusan.index') }}">
                    <button class="btn waves-effect waves-light blue darken-2" type="button" name="action">
                        <i class="material-icons right">keyboard_return</i>
                    </button>
                </a>
            </div>
            <div class="card-content">
                <div class="input-field">
                    <i class="material-icons prefix">info</i>
                    <input id="nama" name="nama" type="text">
                    <label for="nama">nama</label>
                    @error('nama')
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
