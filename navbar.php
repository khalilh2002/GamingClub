<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a href="./admin.php" class="navbar-brand">
            <img src="img/logoclub.png" alt="Gaming Club" width="24" height="24">
            Gaming Club
        </a>
        <div class="collapse navbar-collapse navbar-brand" id="navbar001">
            <ul class="navbar-nav mb-2 me-auto mb-lg-0 ">
                <li class="nav-item">
                    <a href="index.php" aria-current="page" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active'; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a href="news.php" aria-current="page" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'news.php') echo 'active'; ?>">News</a>
                </li>
                <li class="nav-item">
                    <a href="tournaments.php" aria-current="page" class="nav-link <?php if(basename($_SERVER['PHP_SELF']) == 'tournaments.php') echo 'active'; ?>">Tournaments</a>
                </li>
               
            </ul>
        </div>
        <div class="navbar-brand d-flex gap-3" >
            <a href="login.php" class="dropdown-item">Login</a>
            <a href="register.php" class="dropdown-item">Register</a>
            
        </div>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar001">
            <i class="fa-solid fa-bars"></i>
        </button>
        <script src="https://kit.fontawesome.com/90297b3c39.js" crossorigin="anonymous"></script>
    </div>
</nav>
