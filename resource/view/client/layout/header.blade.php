
<button class="btn btn-primary" id="sidebarToggle">Menu</button>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
        <li class="nav-item active"><a class="nav-link" href="#!">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#!">Link</a></li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Chọn nền</a>
            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#!" onclick="setTheme('light')">Sáng</a>
                <a class="dropdown-item" href="#!" onclick="setTheme('dark')">Tối</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#!">Something else here</a>
            </div>
        </li>
    </ul>
</div>