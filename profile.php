<?php
    
require "./connect.php";
session_start();

if (isset($_SESSION['id_user'], $_SESSION['username_user'])) {
    $qry = "SELECT id_login, username FROM login WHERE id_login = ".$_SESSION['id_user']." and  username = \"".$_SESSION["username_user"]."\" ";
    
    $stmt = $conn->prepare($qry);
    if ($stmt->execute()) {
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) == 0) {
            header("location: ./login.php");
            exit; // Terminate script execution after redirection
        } else {
            $qry = "SELECT * FROM users WHERE id_login = ".$_SESSION['id_user']." ";
            
            $stmt = $conn->prepare($qry);
            if ($stmt->execute()) {
                $result2 = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                header("location: ./login.php");
                exit; // Terminate script execution after redirection
            }
        }
    }
} else {
    header("location: ./login.php");
    exit; // Terminate script execution after redirection
}

// Handle profile picture upload
if (isset($_FILES['profile_picture']) && !empty($_FILES['profile_picture']['name'])) {
    $targetDir = __DIR__ . "/profile_pictures/";
    $targetFile = $targetDir . basename($_FILES["profile_picture"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["profile_picture"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["profile_picture"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (!in_array($imageFileType, array("jpg", "png", "jpeg", "gif"))) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $targetFile)) {
            // Update the database with the file path
            $filePath = "/profile_pictures/" . basename($_FILES["profile_picture"]["name"]);
            // Assuming you have a column named profile_picture in your users table
            $updateQry = "UPDATE users SET profile_picture = :profile_picture WHERE id_login = ".$_SESSION['id_user'];
            $updateStmt = $conn->prepare($updateQry);
            $updateStmt->bindParam(':profile_picture', $filePath);
            $updateStmt->execute();
            echo "The file ". htmlspecialchars(basename($_FILES["profile_picture"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
            // Get more information about the error
            print_r(error_get_last());
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.js"></script>
    <style>
        .profile-picture {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0 auto;
        }

        .profile-image {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
        }
         /* Adjust width and height of file input */
    #profile_picture {
        width: 240px; /* Adjust width according to content */
        height: 40px; /* Increase height */
    }
    .form-label {
            font-weight: bold;
            margin-bottom: 0.5rem;
        }
    </style>
</head>

<body>
    <header>
        <?php
        include "./navbar.php";
        ?>
    </header>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="profile-picture">
                        <?php if (isset($result2[0]['profile_picture']) && !empty($result2[0]['profile_picture'])): ?>
                            <div class="profile-image" style="background-image: url('.<?= $result2[0]['profile_picture'] ?>');"></div>
                        <?php else: ?>
                            <div class="profile-image" style="background-image: url('./img/profile.png');"></div>
                        <?php endif; ?>
                    </div>
                    <div class="card-header">
                        <h3 class="text-center">My Profile</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username:</label>
                                <label name="username" class="form-label"><?= $result[0]["username"] ?></label>
                            </div>
                            <div class="mb-3">
                                <label for="firstName" class="form-label">First Name:</label>
                                <label name="username" class="form-label"><?= $result2[0]["first_name"] ?></label>
                            </div>
                            <div class="mb-3">
                                <label for="lastName" class="form-label">Last Name:</label>
                                <label name="username" class="form-label"><?= $result2[0]["last_name"] ?></label>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email:</label>
                                <label name="username" class="form-label"><?= $result2[0]["email"] ?></label>
                            </div>
                            <div class="mb-3 d-flex align-items-center">
                                <label for="profile_picture" class="form-label me-3">Profile Picture:</label>
                                <input type="file" class="form-control me-3" id="profile_picture" name="profile_picture">
                                <button type="submit" class="btn btn-primary">Upload Picture</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
