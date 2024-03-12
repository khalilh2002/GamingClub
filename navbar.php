<?php
if (!session_status()=== PHP_SESSION_ACTIVE) {
    session_start();
}

?>
<nav class="navbar navbar-expand-lg bg-black border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a href="./admin.php" class="navbar-brand">
            <img src="img/logoclub.png" alt="Gaming Club" width="24" height="24" id="logoimg" onerror="loadimg()">
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
            <?php
            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                echo '<span>Welcome, ' . $_SESSION['username_user'] . '</span>';
                echo '<a href="logout.php" class="dropdown-item">Log Off</a>';
            } else {
                echo '<a href="login.php" class="dropdown-item">Login</a>';
                echo '<a href="register.php" class="dropdown-item">Register</a>';
            }
            session_write_close();
            ?>
        </div>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar001">
            <i class="fa-solid fa-bars"></i>
        </button>
        <script src="https://kit.fontawesome.com/90297b3c39.js" crossorigin="anonymous"></script>
    </div>
</nav>

<script>
    function loadimg(){
        document.getElementById('logoimg').src = "../img/logoclub.png";
    }
</script>
<?php

// Close the session

?>
