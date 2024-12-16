<!--employee_salary_data include here-->
<?php include_once "skill_calculator_data.php" ?>

<!--header include here-->
<?php include_once "header.php" ?>

<div class="container mt-4">
    <div class="row justify-content-center text-center">
        <h1>Skill Calculator</h1>
        <h3>Basic Calculator</h3>
    </div>
    
    <div class="row justify-content-center g-2 mt-3">
        <div class="col-md-8">
            <form method="POST" action="skill_calculator.php">
                <div class="row justify-content-center align-items-center g-2">
                    <div class="col-md-4 mb-3">
                        <label for="" class="form_label">Name</label>
                        <select class="form-select form-select-md" onchange="this.form.submit()" name="developer_id" id="developer_id">
                            <?php
                                while($row = $view_developer->fetchAll()) {
                                    foreach ($row as $developer_data) {
                                        echo '<option value=' . $developer_data["developer_id"] . '>' . $developer_data["first_name"] . ' ' . $developer_data["last_name"] . '</option>';
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="" class="form_label">Skill</label>
                        <select class="form-select form-select-md" name="skill_level" id="">
                            <option selected>--Select Skill--</option>
                            <option value="1">Level 1</option>
                            <option value="2">Level 2</option>
                            <option value="3">Level 3</option>
                        </select>
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
                    <p class="card-text fw-bold">Name: <?php echo $developer_id?></p>
                    <p class="card-text fw-bold">Skill Level: <?php echo $skill_level?></p>
                    <p class="card-text fw-bold">Rate: <?php echo $rate?></p>
                    <p class="card-text fw-bold">Hours Worked: <?php echo $hours_worked?></p>
                    <p class="card-text fw-bold">Regular Pay: <?php echo $regular_pay?></p>
                    <p class="card-text fw-bold">Overtime Pay: <?php echo $overtime_pay?></p>
                    <p class="card-text fw-bold">Total Pay: <?php echo $total_pay?></p>
                </div>
            </div>
        </div>
    </div>
</div>

<!--footer include here-->
<?php include_once "footer.php" ?>