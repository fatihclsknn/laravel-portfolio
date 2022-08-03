<!-- MENU -->
<nav class="navbar navbar-expand-sm navbar-light">
    <div class="container">
        <a class="navbar-brand" href="{{ route('front.homepage') }}"><i class='uil uil-user'></i> FATIH CALISKAN</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a href="{{ route('front.homepage') }}" class="nav-link"><span data-hover="About">Ana Sayfa</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('front.project') }}" class="nav-link"><span data-hover="Projects">Projeler</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('front.resume') }}" class="nav-link"><span data-hover="Resume">Öz geçmiş</span></a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('front.contact')}}" class="nav-link"><span data-hover="Contact">İletişim</span></a>
                </li>
            </ul>

        </div>
    </div>
</nav>
