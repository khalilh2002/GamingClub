<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./bootstrap-5.3.3-dist/css/bootstrap.css">
    <script src="./bootstrap-5.3.3-dist/js/bootstrap.js" ></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-info">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./admin-tournaments.php">tournaments</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">News</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">the logins</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </header>
    <?php
        include "./connect.php";  
    ?> 
</body>
<form enctype="multipart/form-data" action="upload.php" method="POST">
    <div class="row">
        <div class="col-6">
            <div class="form-floating mb-3">
                <input type="text" name="card_title" class="form-control" placeholder="card_title"  id="cardtitleid">
                <label for="cardtitleid">title</label>
            </div>
        </div>
        <div class="col-6">
            <div class=" mb-3">
                <input type="hidden" name="MAX_FILE_SIZE" value="9999999999" />
                <label for="image" class="">Image File</label>
                <input name="image" type="file" />
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <label for="card_text" class="form-label">Description</label>
                <textarea class="form-control" name="card_text" id="cardtextid" rows="5"></textarea>
            </div> 
        </div>
        <div class="col-12">
            <div class="form-floating mb-3">
                <input
                    type="url"
                    class="form-control"
                    name="link"
                    id="linkid"
                    placeholder="url"
                />
                <label for="link">url</label>
            </div>
            
        </div>

    </div>
     <button type="submit" name="submit" value="Send File" class="btn btn-outline-danger">ADD</button>   
    
    
</form>
</html>