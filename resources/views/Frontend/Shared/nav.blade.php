<nav class="navbar navbar-expand-lg bg-body-tertiary animate__animated animate__fadeInDown">
    <div class="container-fluid">
        <img src="{{ asset('assets/images/Logo.png') }}" alt="Logo" class="navbar-brand ms-5" />
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-5 ms-auto">
                <li class=" nav-item na ">
                    <a class="nav-link fa fa-home" aria-current="page" href="/home"> Home</a>
                </li>
                <li class="nav-item na">
                    <a class="nav-link fa fa-bars" href="/projects"> Projects</a>
                </li>
                <li class="nav-item na">
                    <a class="nav-link fa fa-users" href="/Engineers"> Engineers</a>
                </li>
                <li class="nav-item na">
                    <a class="nav-link fa fa-book" href="/about-us"> About Us</a>
                </li>
                <li class="nav-item na">
                    <a class="nav-link fa fa-phone" href="/contact-us"> Contact Us</a>
                </li>
                <li class="nav-item na">
                    <a class="nav-link" href="{{ route('lang', ['locale' => 'en']) }}">
                        <span>en</span></a>
                    <a class="nav-link" href="{{ route('lang', ['locale' => 'ar']) }}">
                        <span>ar</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>

