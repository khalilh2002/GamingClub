<form enctype="multipart/form-data" action="upload.php" method="POST">
    <div class="row">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" name="news_title" class="form-control" placeholder="card_title"  id="cardtitleid">
                <label for="cardtitleid">News Title</label>
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <textarea class="form-control" name="news_body" id="cardtextid" rows="5" placeholder="News Body"></textarea>
            </div> 
        </div>

    </div>
    <input type="hidden" name="data_type" value="admin-news-add">
    <button type="submit" name="submit" value="Send File" class="btn btn-info btn-lg">ADD</button>   
</form>