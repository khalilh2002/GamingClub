<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        <?php
            include "./css/style.css";
        ?>
    </style>
    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.js" ></script>
</head>
<body>
    <header>
        <?php
            include "./navbar.php";
        ?>
    </header>
    <main>
        <br>
        <h1 class="title">inscription</h1>

        <form action="inscription.php" method="post" class="">
            <div class="row g-3">
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="text"  class="form-control" placeholder="First Name" id="firstId1">
                        <label for="firstId1">First Name</label>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="text"  class="form-control" placeholder="Last Name" id="lastId1">
                        <label for="lastId1">First Name</label>
                    </div>
                </div>   
            </div>
            <div class="row">
                <div class="col-10">
                    <div class="form-floating mb-3">
                        <input type="email"  class="form-control" placeholder="Email" id="emailID">
                        <label for="emailID">email</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="password"  class="form-control" placeholder="Password" id="pasID">
                        <label for="passID">Password</label>
                    </div>
                </div> 
                <div class="col-6">
                    <div class="form-floating mb-3">
                        <input type="password"  class="form-control" placeholder="Password" id="pasID2">
                        <label for="passID2">Verifier Password</label>
                    </div>
                </div> 
            </div>
        </form>
    </main>
    
</body>
</html>