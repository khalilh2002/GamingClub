<?php
if (!session_status() === PHP_SESSION_ACTIVE) {
    session_start();
}

// Include your database connection file here

if (file_exists("./connect.php")) {
    require_once "./connect.php"; 
}else{
    require_once "../connect.php"; 
}

?>
<style>
    .profile-picture-container {
    height: 13%;
    width: 13%;
    border-radius: 50%; /* Makes it circular */
    overflow: hidden; /* Ensures image stays within circular container */
}

.top_pfp {
    border-radius: 50%;
}
</style>

<nav class="navbar navbar-expand-lg bg-black border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
        <a href="index.php" class="navbar-brand">
            <img src="img/logoclub.png" alt="Gaming Club" width="24" height="24" id="logoimg" onerror="loadimg()">
            Gaming Club
        </a>
        <div class="collapse navbar-collapse navbar-brand" id="navbar001">
            <ul class="navbar-nav mb-2 me-auto mb-lg-0 ">
                <li class="nav-item">
                    <a href="./index.php" aria-current="page" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'index.php') echo 'active'; ?>">Home</a>
                </li>
                <li class="nav-item">
                    <a href="./news.php" aria-current="page" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'news.php') echo 'active'; ?>">News</a>
                </li>
                <li class="nav-item">
                    <a href="./tournaments.php" aria-current="page" class="nav-link <?php if (basename($_SERVER['PHP_SELF']) == 'tournaments.php') echo 'active'; ?>">Tournaments</a>
                </li>
            </ul>
        </div>
        <div class="navbar-brand d-flex gap-3">
            <?php
            if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
                echo '<span>Welcome, ' . $_SESSION['username_user'] . '</span>';
                // Fetch and display profile picture
                $profile_picture = ""; // Default profile picture path
                $qry = "SELECT profile_picture FROM users WHERE id_login = :id_login";
                $stmt = $conn->prepare($qry);
                $stmt->bindParam(':id_login', $_SESSION['id_user']);
                if ($stmt->execute()) {
                    $result_nav = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($result_nav && !empty($result_nav['profile_picture'])) {
                        $profile_picture = $result_nav['profile_picture'];
                        // Add ./ prefix to the relative path
                        if (strpos($profile_picture, './') !== 0) {
                            $profile_picture = './' . $profile_picture;
                        }
                        echo '<a href="profile.php">';
                        echo '<img src="' . $profile_picture . '" alt="Profile Picture" class="top_pfp" width="32" height="32">';
                        echo '</a>';
                    } else {
                        echo '<a href="profile.php">';
                        echo '<img src="./img/profile.png" id="top_pfp" alt="Default Profile Picture" width="28" height="30">';
                        echo '</a>';
                    }
                } else {
                    echo '<a href="profile.php">';
                    echo '<img src="./img/profile.png" id="top_pfp" alt="Default Profile Picture" width="28" height="30">';
                    echo '</a>';
                }
                echo '<a href="profile.php" aria-current="page" class="nav-link">My Profile</a>';
                echo '<a href="logout.php" class="dropdown-item">Log Out</a>';
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
    function loadimg() {
        document.getElementById('logoimg').src = "../img/logoclub.png";
    }
</script>
