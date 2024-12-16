<?php 
    include_once "salary_calculator_data.php"; 
    include_once "header.php";
?>

<div class="container mt-4">
    <div class="row justify-content-center text-center">
        <h1>Salary Calculator</h1>
        <h3>Advance Calculator (Database Connected)</h3>
    </div>
    
    <div class="row justify-content-center g-2 mt-3">
        <div class="col-md-8">
            <form method="POST" action="salary_calculator.php">
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-md-6 mb-3">
                        <label for="" class="form_label">Name</label>
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
                    <p class="card-text fw-bold">Hours Worked: <?php echo $hours_worked?></p>
                    <p class="card-text fw-bold">Regular Pay: <?php echo $regular_pay?></p>
                    <p class="card-text fw-bold">Overtime Pay: <?php echo $overtime_pay?></p>
                    <p class="card-text fw-bold">Total Pay: <?php echo $total_pay?></p>
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
            success: function (data) {
                // Assuming data is returned as title and hourly rate in a single string, separated by a space or new line
                // Split data based on newlines or spaces
                var dataArray = data.trim().split('|');

                // Update the title and hourly rate fields if data is valid
                if (dataArray.length >= 2) {
                    $('#title').val(dataArray[0]);
                    $('#hourly_rate').val(dataArray[1]);
                } else {
                    console.error('Unexpected data format:', data);
                }
            },
            error: function () {
                console.error('An error occurred while fetching the developer data.');
            }
        });
    }

    // Run liveSearch when the document is fully loaded
    $(document).ready(function() {
        liveSearch();
    });
</script>

<!-- Passed to DICT 
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
-->