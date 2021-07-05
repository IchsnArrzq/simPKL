<section id="content">
    <div id="breadcrumbs-wrapper">
        <!-- Search for small screen -->
        <div class="header-search-wrapper grey lighten-2 hide-on-large-only">
            <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize">
        </div>
        <div class="container">
            <div class="row">
                <div class="col s10 m6 l6">
                    <blockquote>
                        <h5 class="breadcrumbs-title">@yield('bread')</h5>
                        <ol class="breadcrumbs">
                            <li><a href="{{ route('home') }}">Dashboard</a></li>
                            @stack('bread')
                        </ol>
                    </blockquote>
                </div>
                <div class="col s2 m6 l6">

                </div>
            </div>
        </div>
    </div>
</section>
