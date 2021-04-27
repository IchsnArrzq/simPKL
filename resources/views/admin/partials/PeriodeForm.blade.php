<div class="row">
    <div class="col s12 m8 l8 offset-m2 offset-l2">

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
                    <i class="material-icons prefix">event</i>
                    <input id="mulai" name="mulai" type="date" value="{{ $periode->mulai ?? '' }}">
                    @error('mulai')
                    <strong class="red-text">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">event</i>
                    <input id="selesai" name="selesai" type="date" value="{{ $periode->selesai ?? '' }}">
                    @error('selesai')
                    <strong class="red-text">{{ $message }}</strong>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="material-icons prefix">info</i>
                    <input id="status" name="status" type="text" value="{{ $periode->status ?? '' }}">
                    <label for="status">status</label>
                    @error('status')
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
