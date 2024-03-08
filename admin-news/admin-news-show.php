<?php
      
      include "./connect.php";
      
      $stmt = $conn->prepare("SELECT * FROM news");
      $stmt->execute();

      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      echo '
        <div class="accordion-container">
        <div class="accordion accordion-flush" id="accordionFlushExample">
      ';
    $result = array_reverse($result);
      foreach ($result as $row) {
        echo'
            
        <div class="accordion-item">
            <h2 class="accordion-header" id="element'.$row["id_news"].'">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#element_collapse'.$row["id_news"].'" aria-expanded="false" aria-controls="flush-collapseOne">
                    '.$row["news_title"].'
                </button>
            </h2>
            <div id="element_collapse'.$row["id_news"].'" class="accordion-collapse collapse" aria-labelledby="element'.$row["id_news"].'" data-bs-parent="#accordionFlushExample">
                <div class="accordion-body">
                    '.$row["news_body"].'
                    <div class="small">
                        
                        <br>Current time in Casablanca: '.$row["news_date"].'"
                        
                    </div>
                    

                </div>
            </div>
        </div>
            
          ';
      }
      echo '</div>';
      echo '</div>';

    ?>