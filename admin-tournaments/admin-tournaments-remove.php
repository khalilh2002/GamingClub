<div>
<?php


      include "./connect.php";
      
      $stmt = $conn->prepare("SELECT * FROM tournament_img");
      $stmt->execute();

      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      

      echo '<form action="delete.php" method="post">';
      echo '<div class="row row-cols-1 row-cols-md-3 g-4 tournament-items">      ';

      foreach ($result as $row) {
        echo'
            
                <div class="col-md-3">
                    <div class="card h-100">
                      <img src="'.$row["img_path"].'" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">'.$row["card_title"].'</h5>
                      <p class="card-text">'.$row["card_text"].'
                      <a href="'.$row["link"].'" class="btn btn-primary">Visit Link</a>
                      
                      <button type="submit" name = "btn" value="'.$row["id_tournament"].'" class="btn btn-danger">Delete</button>

                    </div>
                    <div class="card-footer">
                      <small class="text-muted">Last updated 3 mins ago</small>
                    </div>
                </div>
                </div>
            
          ';
      }
      echo '</div>';
      echo '</form>';
    ?>
</div>
