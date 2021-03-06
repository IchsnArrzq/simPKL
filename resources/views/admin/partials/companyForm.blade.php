<main id="app">
    <div class="card-panel">

        <h4 class="header2">New User</h4>
        <div class="row">
            <form class="col s12">
                <div class="row">
                    <div class="input-field col s6">
                        <input placeholder="Cyberlabs" id="company" value="{{ $company->company ?? ''}}" name="company" type="text">
                        <label for="company">Company</label>
                        @error('company')
                        <strong class="red-text">{{ $message }}</strong>
                        @enderror

                    </div>
                    <div class="input-field col s6">
                        <input placeholder="Bandung" id="region" value="{{ $company->region ?? ''}}" name="region" type="text">
                        <label for="region">Region</label>
                        @error('region')
                        <strong class="red-text">{{ $message }}</strong>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input type="date" value="{{ $company->start_date ?? ''  }}" name="start_date" id="start_date2">
                        @error('start_date')
                        <strong class="red-text">{{ $message }}</strong>
                        @enderror
                    </div>
                    <div class="input-field col s6">
                        <input type="date" value="{{ $company->finish_date ?? '' }}" name="finish_date" id="start_date2">
                        @error('finish_date')
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
    <script>
        var elems = document.querySelectorAll('.datepicker');
        var instances = M.Datepicker.init(elems);
    </script>
</main>
