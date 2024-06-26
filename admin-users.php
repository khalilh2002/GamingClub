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
        <div class="d-flex justify-content-center m-3 ">
            <form class="d-flex" role="search" method="get" action="admin-users.php">
                <input class="form-control me-2" type="search" placeholder="Search" name="search_text" aria-label="Search">
                <button class="btn btn-success" type="submit" name="search" value="search" >Search</button>
            </form>
            <?php
                if (isset($_GET["search"] ,$_GET["search_text"] )&& $_GET["search"]=='search' ) {
                    $search_text = $_GET["search_text"];
                    $search=true;
                }else {
                    $search = false;
                }
            ?>
        </div>
        
        <main >
            <?php
            if (!$search) {
                $qry = 'SELECT * FROM users 
                LEFT JOIN login ON users.id_login = login.id_login;';
            }else{
                $qry = "SELECT * FROM users 
                LEFT JOIN login ON users.id_login = login.id_login
                WHERE username LIKE '%$search_text%' or first_name LIKE '%$search_text%' or last_name LIKE '%$search_text%' ";
            }
                
                $stmt  = $conn->prepare($qry);
            ?>
                
                <table class="table table-bordered  table-centered ">
                    <thead class="table-dark text-center mt-5">
                        <td>user ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Username</td>
                        <td>super</td>
                        <td>#</td>
                        <td>#</td>
                    </thead>
                
            <form action="./delete.php" method="post">
            <?php
                if ($stmt->execute()):
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    foreach ($result as $row) :
                    ?>
                        <tbody class="text-center mt-5">
                            <td><?= $row["id_user"] ?></td>
                            <td><?= $row["first_name"] ?></td>
                            <td><?= $row["last_name"] ?></td>
                            <td><?= $row["email"] ?></td>
                            <td><?= $row["username"] ?></td>
                            <td><?php echo ($row["super_user"] == 1) ? "admin" : "user"; ?></td>
                            <td><button type="submit" class="btn btn-success  <?php if($row["super_user"]==1): echo "disabled" ; endif ?>" name="user_super" value="<?= $row["id_login"] ?>" >Admin</button></td>
                            <td><button type="submit" class="btn btn-danger <?php if($row["super_user"]==1): echo "disabled" ; endif ?>" name="user_remove" value="<?= $row["id_login"] ?>" >Delete</button></td>
                        </tbody>

                    <?php endforeach;?>
                   
                <?php endif;?>
                    <input type="hidden" name="data_type" value="admin-users-remove">
                    </form>
                    </table>
            
        </main>
    
    
</body>
</html>