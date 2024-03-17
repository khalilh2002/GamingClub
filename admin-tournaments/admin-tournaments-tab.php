
<ul class="nav nav-pills nav-fill p-3 fw-bold " id="myTab" role="tablist">
    
    <li class="nav-item" role="presentation">
        <button
            class="nav-link active"
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
</ul>

<!-- Tab panes -->
<div class="tab-content">
        
    <div
        class="tab-pane active"
        id="remove"
        role="tabpanel"
        aria-labelledby="remove-tab"
    >
        
         <?php
            include "./admin-tournaments/admin-tournaments-remove.php";
        ?>
    </div>

    <div
        class="tab-pane p-3"
        id="add"
        role="tabpanel"
        aria-labelledby="add-tab"
    >
        <?php
            include "./admin-tournaments/admin-tournaments-add.php";
        ?>
    </div>
</div>

