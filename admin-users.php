<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.js" ></script>

</head>
<body class="bg-info-subtle">
    <header>
        <?php
            include_once "./admin-navbar.php";
        ?>
    </header>
        <main >
            <?php
                $qry = 'SELECT * 
                FROM users LEFT JOIN login ON users.id_login = login.id_login;';
                $stmt  = $conn->prepare($qry);
            ?>
                
                <table class="table table-bordered  table-centered ">
                    <thead class="table-dark">
                        <td>user ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Username</td>
                        <td>#</td>
                    </thead>
                
            <form action="./delete.php" method="post">
            <?php
                if ($stmt->execute()):
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) :
                    ?>
                        <tbody>
                            <td><?= $row["id_user"] ?></td>
                            <td><?= $row["first_name"] ?></td>
                            <td><?= $row["last_name"] ?></td>
                            <td><?= $row["email"] ?></td>
                            <td><?= $row["username"] ?></td>
                            <td><button type="submit" class="btn btn-danger" name="user_remove" value="<?= $row["id_login"] ?>" >Delete</button></td>
                        </tbody>

                    <?php endforeach;?>
                   
                <?php endif;?>
                    <input type="hidden" name="data_type" value="admin-users-remove">
                    </form>
                    </table>
            
        </main>
    
    
</body>
</html>