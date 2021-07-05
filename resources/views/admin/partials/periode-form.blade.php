<div class="card hoverable">
    <div class="card-action">
        <a href="{{ route('menu.admin.periode.index') }}">
            <button class="btn waves-effect waves-light blue darken-2" type="button" name="action">
                <i class="material-icons right">keyboard_return</i>
            </button>
        </a>
    </div>
    <div class="card-content">

        <div class="input-field">
                <strong for="mulai">Tanggal Mulai</strong>
                <input id="mulai" name="mulai" type="date" value="{{ $periode->mulai ?? '' }}">
            @error('mulai')
            <strong class="red-text">{{ $message }}</strong>
            @enderror
        </div>
        <div class="input-field">
        <strong for="selesai">Tanggal Selesai</strong>
            <input id="selesai" name="selesai" type="date" value="{{ $periode->selesai ?? '' }}">
            @error('selesai')
            <strong class="red-text">{{ $message }}</strong>
            @enderror
        </div>
        <div class="input-field">
            <input id="tahun_pelajaran" name="tahun_pelajaran" type="text" value="{{ $periode->tahun_pelajaran ?? '' }}">
            <label for="tahun_pelajaran">Tahun Pelajaran</label>
            @error('tahun_pelajaran')
            <strong class="red-text">{{ $message }}</strong>
            @enderror
        </div>
        <div class="input-field">
            <input id="angkatan" name="angkatan" type="text" value="{{ $periode->angkatan ?? '' }}">
            <label for="angkatan">Angkatan</label>
            @error('angkatan')
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
