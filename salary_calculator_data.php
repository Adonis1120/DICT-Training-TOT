<?php
    include_once "config/database.php";
    include_once "classes/Developer.php";
    include_once "classes/Salary.php";
    
    // Database Data
    $database = new Database();
    $db = $database->getConnection();

    $developer = new Developer($db);
    $view_developer = $developer->readDeveloper();

    // Update Selected Developer: Drop-down box
    $developer_title = '';
    $developer_rate = '';

    if ($view_developer->rowCount() > 0) {
        if (isset($_POST['developer_id']) && !empty($_POST['developer_id'])) {
            $developer->developer_id = $_POST['developer_id'];
        } else {
            $developer->developer_id = $view_developer->fetch(PDO::FETCH_ASSOC)['developer_id'];
        }

        $selected_developer = $developer->selectDeveloper();

        if (empty($_POST['developer_id'])) { // In pair with the fetch() for $view_developer in the else statement above
            $view_developer->execute(); // Rewind the cursor to the beginning; need this not to affect the starting point in populating the select option
        }

        if ($selected_developer) {
            $developer_title = $selected_developer['title'];
            $developer_rate = $selected_developer['hourly_rate'];
        }
    }

    /* Same with the preceding condition above
    if ($view_developer->rowCount() > 0 && empty($_POST['developer_id'])) {
        $developer->developer_id = $view_developer->fetch(PDO::FETCH_ASSOC)['developer_id'];
        $selected_developer = $developer->selectDeveloper();
        $view_developer->execute(); // Rewind the cursor to the beginning; need this not to affect the starting point in populating the select option

        if ($selected_developer) {
            $developer_title = $selected_developer['title'];
            $developer_rate = $selected_developer['hourly_rate'];
        }
    }

    if (isset($_POST['developer_id']) && !empty($_POST['developer_id'])) {
        $developer->developer_id = $_POST['developer_id'];
        $selected_developer = $developer->selectDeveloper();

        if ($selected_developer) {
            $developer_title = $selected_developer['title'];
            $developer_rate = $selected_developer['hourly_rate'];
        }
    }
    */

    /* For the Update Selected Developer JS version
    if (isset($_POST['selected_id'])) {
        $developer->developer_id = $_POST['selected_id'];
        $selected_developer = $developer->selectDeveloper();
        $developer_title = $selected_developer['title'];
        $developer_rate = $selected_developer['hourly_rate'];
        echo $developer_title . '|' . $developer_rate;
    }
    */

    // Calculator Data
    $hours_worked = 0;
    $hourly_rate = 0.0;
    $regular_pay = 0.0;
    $overtime_pay = 0.0;
    $total_pay = 0.0;

    if(isset($_POST['compute'])) {
        if($_POST['hours_worked'] <> ""){
            $hours_worked = $_POST['hours_worked'];
            $hourly_rate = $_POST['hourly_rate'];
        }
        else{
            $hours_worked = 0.0;
            $hourly_rate = 0.0;
        }

        //instantiate
        $salary = new Salary();
        $salary->hourly_rate = $hourly_rate;

        $salary->hours_worked = $hours_worked;
        $regular_pay = $salary->CalculateRegularPay();

        $overtime_pay = $salary->CalculateOvertimePay();

        $total_pay = $salary->CalculateTotalPay();
    }
?>