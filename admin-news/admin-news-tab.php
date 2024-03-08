
<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button
            class="nav-link active"
            id="show-tab"
            data-bs-toggle="tab"
            data-bs-target="#show"
            type="button"
            role="tab"
            aria-controls="home"
            aria-selected="true"
        >
            Show
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button
            class="nav-link"
            id="add-tab"
            data-bs-toggle="tab"
            data-bs-target="#add"
            type="button"
            role="tab"
            aria-controls="profile"
            aria-selected="false"
        >
            Add
        </button>
    </li>
    <li class="nav-item" role="presentation">
        <button
            class="nav-link"
            id="remove-tab"
            data-bs-toggle="tab"
            data-bs-target="#remove"
            type="button"
            role="tab"
            aria-controls="messages"
            aria-selected="false"
        >
            Remove
        </button>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div
        class="tab-pane active"
        id="show"
        role="tabpanel"
        aria-labelledby="show-tab"
    >
        <?php
            include "./admin-news/admin-news-show.php";
        ?>
        
    </div>
    <div
        class="tab-pane p-3"
        id="add"
        role="tabpanel"
        aria-labelledby="add-tab"
    >
        
        <?php
            include "./admin-news/admin-news-add.php";
        ?>
    </div>
        
    <div
        class="tab-pane"
        id="remove"
        role="tabpanel"
        aria-labelledby="remove-tab"
    >
        
          
         <?php
            include "./admin-news/admin-news-remove.php";
        ?>
    </div>
</div>