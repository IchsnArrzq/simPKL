<div class="row">
    <div class="col s12 m8 l8 offset-m2 offset-l2">
        <div class="card hoverable">
            <div class="card-action">
            <a href="{{ route('menu.admin.perusahaan.index') }}">
                <button class="btn waves-effect waves-light blue darken-2" type="button" name="action">
                    <i class="material-icons right">keyboard_return</i>
                </button>
            </a>
            </div>
            <div class="card-content">

                <div class="input-field">
                    <i class="material-icons prefix">location_city</i>
                    <input id="perusahaan" value="{{ $perusahaan->perusahaan ?? ''}}" name="perusahaan" type="text">
                    <label for="perusahaan">Perusahaan</label>
                    @error('perusahaan')
                    <strong class="red-text">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="input-field">
                    <i class="material-icons prefix">add_location</i>
                    <input id="kota" value="{{ $perusahaan->kota ?? ''}}" name="kota" type="text">
                    <label for="kota">kota</label>
                    @error('kota')
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

    </div>
</div>
