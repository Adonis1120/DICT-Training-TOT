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
    if (isset($_POST['selected_id'])) {
        $developer->developer_id = $_POST['selected_id'];
        $selected_developer = $developer->selectDeveloper();
        $developer_title = $selected_developer['title'];
        $developer_rate = $selected_developer['hourly_rate'];
        echo $developer_title . '|' . $developer_rate;
    }

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