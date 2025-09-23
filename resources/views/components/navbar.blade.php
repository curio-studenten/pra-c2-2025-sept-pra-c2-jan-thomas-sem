<nav class="navbar navbar-expand navbar-dark bg-dark">
    <div class="container">
        <div class="navbar-header mr-auto d-flex align-items-center">
            <a class="navbar-brand mr-3" href="/" title="{{ __('misc.home_alt') }}">
                {{ __('misc.homepage_title') }}
            </a>


            <a class="nav-link text-light" href="{{ route('contact') }}">Contact</a>
        </div>

        <div id="navbar" class="form-inline">
            <script>
                (function () {
                    var cx = 'partner-pub-6236044096491918:8149652050';
                    var gcse = document.createElement('script');
                    gcse.type = 'text/javascript';
                    gcse.async = true;
                    gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(gcse, s);
                })();
            </script>
            <gcse:searchbox-only></gcse:searchbox-only>
            
                <a href="{{ route('language.change', 'nl') }}" class="btn btn-sm btn-outline-light">NL</a>
                <a href="{{ route('language.change', 'en') }}" class="btn btn-sm btn-outline-light">EN</a>
            

        </div>
    </div>
</nav>
