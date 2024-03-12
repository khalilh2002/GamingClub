<form enctype="multipart/form-data" action="upload.php" method="POST" class="p-2">
    <div class="row ">
        <div class="col-md-6">
            <div class="form-floating mb-3">
                <input type="text" name="card_title" class="form-control" placeholder="card_title"  id="cardtitleid">
                <label for="cardtitleid">Title</label>
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
                <textarea class="form-control" name="card_text" id="cardtextid" rows="5" placeholder="Description"></textarea>

                
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
                <label for="link">URL</label>
            </div>
            
        </div>

    </div>
    <input type="hidden" name="data_type" value="admin-tournaments-add">
    <button type="submit" name="submit" value="Send File" class="btn btn-outline-danger">ADD</button>   
</form>
    