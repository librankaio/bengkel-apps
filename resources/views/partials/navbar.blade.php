<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="/upload"><img src="{{ asset('img/benindo.jpeg') }}" alt="Logo"
                style="width: 300px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ 'upload' == request()->path() ? 'active' : '' }}" aria-current="page"
                        href="{{ 'upload' }}">Upload Photo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ 'updatestats' == request()->path() ? 'active' : '' }}" href="{{ 'updatestats'
                        }}">Update Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ 'reports' == request()->path() ? 'active' : '' }}"
                        href="{{ 'reports' }}">Laporan Status</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ 'galery' == request()->path() ? 'active' : '' }}"
                        href="{{ 'galery' }}">Gallery</a>
                </li>
            </ul>
            <form class="d-flex">
                <button type="submit" formaction="{{ 'logout' }}" class="btn btn-danger"><span>Logout</span></button>
            </form>
        </div>
    </div>
</nav>