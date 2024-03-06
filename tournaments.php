<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Tournaments</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            .w-100 {
                width: 100% ;
                height: 75vh;
              }
            .tournamenttext{
                display: flex;
              justify-content: center;
              align-items: center;
              height: 20vh;
              font-size: 10vh;
              margin: 0;
              font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif; /* Changing font */
              color: rgb(4, 20, 71); /* Example color */
              font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;  /* Different font for tournaments */

            }
            .tournament-items{
              padding: 10px 30px;
            }
        </style>
        <link rel="stylesheet" href="/css/style.css">
    </head>
<body>
 
<header>
    <nav class="navbar navbar-expand-lg bg-dark  border-bottom border-body" data-bs-theme="dark">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">
                <img src="img/agario.png" alt="Gaming Club" width="30" height="24" >
                Gaming Club
            </a>
            <div class="collapse navbar-collapse navbar-brand" id="navbar001">
                <ul class="navbar-nav mb-2 me-auto mb-lg-0 ">
                    <li class="nav-item">
                        <a href="index.html" aria-current="page" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="news.html" aria-current="page" class="nav-link ">News</a>
                    </li>
                    <li class="nav-item">
                        <a href="tournaments.html" aria-current="page" class="nav-link active">Tournaments</a>
                    <li class="nav-item">
                        <a href="contact.html" aria-current="page" class="nav-link">Contact Us</a>
                    </li>
                </ul>
            </div>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar001">Click me</button>
            
        </div>
    </nav>
</header>
<main >
<h1 class="tournamenttext title">Tournaments</h1>
<div class="row row-cols-1 row-cols-md-3 g-4 tournament-items">
    <div class="col-md-3">
      <div class="card h-100">
        <img src="img/FC24.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">The Apex #6</h5>
          <p class="card-text">Game: FC 24 </br>
            Location: Iberia, Tangier</br>
        Prizepool: 1000 DH</p>
          <a href="#" class="btn btn-primary">Visit Link</a>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card h-100">
        <img src="img/fortnite.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Moha Store Tournament #23</h5>
          <p class="card-text">Game: Fortnite </br>
            Location: FST Tangier, Boukhalef, Tangier</br>
        Prizepool: 1500 DH</p>
          <a href="#" class="btn btn-primary">Visit Link</a>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card h-100">
        <img src="img/LOL.jfif" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">FSTT GC Championship #2</h5>
          <p class="card-text">Game: League of Legends </br>
        Location: FST Tangier, Boukhalef, Tangier</br>
    Prizepool: 1000 DH</p>
          <a href="#" class="btn btn-primary">Visit Link</a>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card h-100">
        <img src="img/csgo.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Moroccan National Championship 2024</h5>
          <p class="card-text">Game: Counter-Strike Global Offensive </br>
            Location: Lmaarif, Casablanca</br>
        Prizepool: 5000 DH</p>
          <a href="#" class="btn btn-primary">Visit Link</a>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card h-100">
        <img src="img/rocket.jfif" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">FSTT GC Championship #1</h5>
          <p class="card-text">Game: Rocket League </br>
            Location: FST Tangier, Boukhalef, Tangier</br>
        Prizepool: 1000 DH</p>
          <a href="#" class="btn btn-primary">Visit Link</a>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card h-100">
        <img src="img/valorant.png" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Peak Fire #9</h5>
          <p class="card-text">Game: Valorant </br>
        Location: Iberia, Tangier</br>
    Prizepool: 2000 DH</p>
          <a href="#" class="btn btn-primary">Visit Link</a>
        </div>
        <div class="card-footer">
          <small class="text-muted">Last updated 3 mins ago</small>
        </div>
      </div>
    </div>

    
  </div>
  
</main>
</body>
</html>