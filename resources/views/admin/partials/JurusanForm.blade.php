<div class="row">
    <div class="col s12 m8 l8 offset-m2 offset-l2">

        <div class="card hoverable">
            <div class="card-action">
                <a href="{{ route('menu.admin.jurusan.index') }}">
                    <button class="btn waves-effect waves-light blue darken-2" type="button" name="action">
                        <i class="material-icons right">keyboard_return</i>
                    </button>
                </a>
            </div>
            <div class="card-content">

                <p>
                    <input id="rpl" name="nama" value="RPL" type="radio">
                    <label for="rpl">
                        <span>RPL</span>
                    </label>
                </p>
                <p>
                    <input id="tkj" name="nama" value="TKJ" type="radio">
                    <label for="tkj">
                        <span>TKJ</span>
                    </label>
                </p>
                <p>
                    <input id="mmd" name="nama" value="MMD" type="radio">
                    <label for="mmd">
                        <span>MMD</span>
                    </label>
                </p>
                <p>
                    <input id="otkp" name="nama" value="OTKP" type="radio">
                    <label for="otkp">
                        <span>OTKP</span>
                    </label>
                </p>
                <p>
                    <input id="bdp" name="nama" value="BDP" type="radio">
                    <label for="bdp">
                        <span>BDP</span>
                    </label>
                </p>
                <p>
                    <input id="htl" name="nama" value="HTL" type="radio" />
                    <label for="htl">
                        <span>HTL</span>
                    </label>
                </p>
                <p>
                    <input id="tbg" name="nama" value="TBG" type="radio" />
                    <label for="tbg">
                        <span>TBG</span>
                    </label>
                </p>

                @error('nama')
                <strong class="red-text">{{ $message }}</strong>
                @enderror
            </div>
            <div class="card-action">
                <button class="btn waves-effect waves-light red" type="submit" name="action">
                    <i class="material-icons right">send</i>
                </button>
            </div>
        </div>

    </div>
</div>
