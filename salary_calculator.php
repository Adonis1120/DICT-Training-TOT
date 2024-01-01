<?php 
    include_once "salary_calculator_data.php"; 
    include_once "header.php";
?>

<div class="container mt-4">
    <div class="row justify-content-center text-center">
        <h1>Salary Database</h1>
        <h2>Salary Data Entry</h2>
    </div>
    
    <div class="row justify-content-center g-2">
        <div class="col-md-8">
            <form method="POST" action="calculate_salary.php">
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form_label">Developer ID</label>
                        <select class="form-select form-select-md" onchange="liveSearch()" name="developer_id" id="developer_id">
                            <?php
                                while($row = $view_developer->fetchAll()) {
                                    foreach ($row as $developer_data) {
                                        echo '<option value=' . $developer_data["developer_id"] . '>' . $developer_data["first_name"] . ' ' . $developer_data["last_name"] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form_label">Title</label>
                            <input type="text" class="form-control" name="title" id="title">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="" class="form_label">Hourly Rate</label>
                            <input type="text" class="form-control" name="hourly_rate" id="hourly_rate">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="" class="form_label">Hours Worked</label>
                            <input type="text" class="form-control" name="hours_worked" id="">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col">
                        <button type="submit" name="compute" class="btn btn-primary">Compute</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    ...
                </div>
            </div>
        </div>
    </div>
</div>

<ul id="searchResults"></ul>

<script>
    function liveSearch() {
        var selected_id = document.getElementById('developer_id').value;
        $.ajax({
            url: 'salary_calculator_data.php',
            type: 'POST',
            data: { selected_id: selected_id },
            /*success: function (data) {
                $('#title').val(data);
                $('#hourly_rate').val(data);
            }*/
        });
        $(document).ready(function(){
            $('#title').val($('developer_title'));
            $('#hourly_rate').val($('developer_rate'));
        });
    };
</script>

<!--
<script>
    var selected_id = document.getElementById('developer_id').value;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("title").value = this.responseText;
        }
    };
    xhttp.open("GET", "salary_calculator.php?selected_id="+selected_id, true);
    xhttp.send(); 
</script>
-->