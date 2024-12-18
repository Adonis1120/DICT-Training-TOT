<?php
    include_once "config/database.php";
    include_once "classes/Developer.php";

    // Header
    include_once "header.php";

    // Database Data
    $database = new Database();
    $db = $database->getConnection();

    $developer = new Developer($db);

    if (isset($_POST['btnSearch']) && !empty($_POST['search_query'])) {
        $search_query = $_POST['search_query']; // You can also use "%" . $_POST['search_query'] . "%" here to directly include the % so that no need to declare again or change it in the class function.
        $view_developer = $developer->searchDeveloper($search_query);
        /* Search Alternative Approach
        $search_query = "%" . $_POST['search_query'] . "%";
        $view_developer = $developer->searchDeveloper($search_query);
        */
    } else {
        $view_developer = $developer->readDeveloper();
    }    

    if (isset($_POST['btnAdd'])) {
        $developer->first_name = $_POST['first_name'];
        $developer->last_name = $_POST['last_name'];
        $developer->title = $_POST['title'];
        $developer->hourly_rate = $_POST['hourly_rate'];

        $developer->createDeveloper();
    }

    if (isset($_POST['btnUpdate'])) {
        $developer->developer_id = $_POST['update_developer_id'];
        $developer->first_name = $_POST['update_first_name'];
        $developer->last_name = $_POST['update_last_name'];
        $developer->title = $_POST['update_title'];
        $developer->hourly_rate = $_POST['update_hourly_rate'];

        $developer->updateDeveloper();
    }

    if (isset($_POST["btnDelete"])) {
        $developer->developer_id = $_POST["delete_developer_id"];

        $developer->deleteDeveloper();
    }
?>

<div class="container mt-4">
    <div class="row justify-content-center text-center">
        <h1>Developer Database</h1>
        <h3>Data Entry</h3>
    </div>
    
    <div class="row mt-3">
        <form method="POST">
            <div class="mb-3 row">
                <div class="col-md-3 mb-3">
                    <label class="col-4 col-form-label">First Name</label>
                    <input type="text" class="form-control" name="first_name" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="col-4 col-form-label">Last Name</label>
                    <input type="text" class="form-control" name="last_name" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label class="col-4 col-form-label">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="col-md-3 mb-3">
                    <label class="col-4 col-form-label">Hourly Rate</label>
                    <input type="text" class="form-control" name="hourly_rate">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary" name="btnAdd">Submit</button>
                </div>
            </div>
        </form>
    </div>

    <div class="row justify-content-center text-center">
        <h3>Data List</h3>
    </div>

    <div class="row justify-content-center align-items-center g-2 mt-3">
        <form method="POST" class="row justify-content-end align-items-center">
            <div class="col col-md-4">
                <input type="text" class="form-control" name="search_query" placeholder="Search by Name or Title">
            </div>
            <div class="col-auto mt-md-auto">
                <button type="submit" class="btn btn-primary" name="btnSearch">Search</button>
            </div>
        </form>
    </div>

    <div class="row g-2 mt-3">    
        <?php
            // Check if the search term is empty and display the appropriate message
            if (empty($_POST['search_query'])) {
                echo "Showing all results";
            } else {
                // Check if the search query returns any results
                if ($view_developer->rowCount() > 0) {
                    echo "Search results for: " . htmlspecialchars($_POST['search_query']);
                } else {
                    echo "No results found!";
                }
            }     
        ?>
        <?php if ($view_developer->rowCount() > 0) { ?>
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle">
                    <thead>
                        <tr class="table-primary">
                            <th>No.</th>
                            <th>Full Name</th>
                            <th>Title</th>
                            <th>Rate</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <?php
                            //while($row = $view_developer->fetchAll()) {
                                foreach ($view_developer as $key => $developer_data) {
                                    echo
                                    "<tr>
                                        <td>" . $key + 1 . "</td>
                                        <td>" . $developer_data["first_name"] . " " . $developer_data["last_name"] . "</td>
                                        <td>" . $developer_data["title"] . "</td>
                                        <td>" . $developer_data["hourly_rate"] . "</td>
                                        <td>
                                            <a href='#' type='button' class='btn btn-sm btn-outline-primary' data-bs-toggle='modal' data-bs-target='#updateDeveloper'
                                            data-id='" . $developer_data["developer_id"] . "'
                                            data-desc1='" . $developer_data["first_name"] . "'
                                            data-desc2='" . $developer_data["last_name"] . "'
                                            data-desc3='" . $developer_data["title"] . "'
                                            data-desc4='" . $developer_data["hourly_rate"] . "'>Update
                                            </a>
                                            <a href='#' type='button' class='btn btn-sm btn-outline-danger' data-bs-toggle='modal' data-bs-target='#deleteDeveloper'
                                            data-id='". $developer_data["developer_id"] ."'
                                            data-desc1='" . $developer_data["first_name"] . "'
                                            data-desc2='" . $developer_data["last_name"] . "'>Delete
                                            </a>
                                        </td>
                                    </tr>";
                                }
                            //}
                        ?>
                    </tbody>
                    <tfoot>
                        
                    </tfoot>
                </table>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Footer -->
<?php include_once "footer.php"; ?>

<script>
    $(document).ready(function(){
        $('#updateDeveloper').on('show.bs.modal', function (e){
            var update_developer_id = $(e.relatedTarget).data('id');
            var update_first_name = $(e.relatedTarget).data('desc1');
            var update_last_name = $(e.relatedTarget).data('desc2');
            var update_title = $(e.relatedTarget).data('desc3');
            var update_hourly_rate = $(e.relatedTarget).data('desc4');

            $("#update_developer_id").val(update_developer_id);
            $("#update_first_name").val(update_first_name);
            $("#update_last_name").val(update_last_name);
            $("#update_title").val(update_title);
            $("#update_hourly_rate").val(update_hourly_rate);
        });

        $('#deleteDeveloper').on('show.bs.modal', function (e){
            var delete_developer_id = $(e.relatedTarget).data('id');
            var delete_first_name = $(e.relatedTarget).data('desc1');
            var delete_last_name = $(e.relatedTarget).data('desc2');

            $("#delete_developer_id").val(delete_developer_id);
            document.getElementById("p1").innerHTML = delete_first_name.concat(" ", delete_last_name);
        }); 
    });  
</script>

<!-- Modal Update -->
<div class="modal fade" id="updateDeveloper" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Developer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form method="POST" autocomplete="false">
                    <div class="modal-body">
                        <div class="row" hidden>
                            <div class="form-group col-md-12">
                                <small class="font-weight-bold mt-1">Developer ID</small>
                                <input type="text" class="form-control form-control-sm" id="update_developer_id" name="update_developer_id">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <small class="font-weight-bold mt-1">First Name</small>
                                <input type="text" class="form-control form-control-sm" id="update_first_name" name="update_first_name">
                            </div>
                            <div class="form-group col-md-6">
                                <small class="font-weight-bold mt-1">Last Name</small>
                                <input type="text" class="form-control form-control-sm" id="update_last_name" name="update_last_name">
                            </div>
                            <div class="form-group col-md-6">
                                <small class="font-weight-bold mt-1">Developer Title</small>
                                <input type="text" class="form-control form-control-sm" id="update_title" name="update_title">
                            </div>
                            <div class="form-group col-md-6">
                                <small class="font-weight-bold mt-1">Hourly Rate</small>
                                <input type="text" class="form-control form-control-sm" id="update_hourly_rate" name="update_hourly_rate">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="btnUpdate">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="deleteDeveloper" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Developer</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <form method="POST" autocomplete="false">
                    <div class="modal-body">
                        <div class="row" hidden>
                            <div class="form-group col-md-12">
                                <small class="font-weight-bold mt-1">ID</small>
                                <input type="text" class="form-control form-control-sm" id="delete_developer_id" name="delete_developer_id">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-12">
                                <p class="font-weight-bold mt-1">You are about to delete 
                                    <span id="p1" name="p1"></span>. Please confirm to continue.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" name="btnDelete">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>