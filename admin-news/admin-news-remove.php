<div>

<?php
include "./connect.php";

$stmt = $conn->prepare("SELECT * FROM news");
if (!$stmt->execute()) {
    print_r($stmt->errorInfo());
    exit;
}
?>

<form action="delete.php" method="post">

<div class="accordion-container">
    <div class="accordion accordion-flush" id="accordionFlushExample">

    <?php
    $result = array_reverse($result);
    foreach ($result as $row):
    ?>

        <div class="accordion-item">
            
          <h2 class="accordion-header" id="element<?= $row["id_news"] ?>">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#element_collapse<?= $row["id_news"] ?>" aria-expanded="false" aria-controls="flush-collapseOne">
              <?= $row["news_title"] ?> 
            </button>
            
          </h2>
        <div class="d-flex justify-content-end p-3">
            <button class="btn btn-danger accordion-header" type="submit" name="id_news" value="<?= $row["id_news"] ?>">
                delete            
            </button>
        </div>
          <div id="element_collapse<?= $row["id_news"] ?>" class="accordion-collapse collapse" aria-labelledby="element<?= $row["id_news"] ?>" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">

              <?= $row["news_body"] ?>

              <div class="small">
                <br>Current time in Casablanca: <?= $row["news_date"] ?>"
              </div>
            </div>
          </div>

        </div>
    <?php endforeach; ?>
    
 
</div>
    <input type="hidden" name="data_type" value="admin-news-remove">

</form>
</div>
