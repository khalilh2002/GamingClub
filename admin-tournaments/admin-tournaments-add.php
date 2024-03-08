<form enctype="multipart/form-data" action="admin-tournaments/upload.php" method="POST">
    <div class="row">
        <div class="col-md-6">
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
    