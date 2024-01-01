<?php
    include_once "config/database.php";
    include_once "classes/Developer.php";
    
    // Database Data
    $database = new Database();
    $db = $database->getConnection();

    $developer = new Developer($db);
    $view_developer = $developer->readDeveloper();

    if (isset($_POST['selected_id'])) {
        $developer->developer_id = $_POST['selected_id'];
        $selected_developer = $developer->selectDeveloper();
        $developer_title = $selected_developer['title'];
        $developer_rate = $selected_developer['hourly_rate'];
        echo $developer_title;
        echo $developer_rate;
        /*foreach($selected_developer as $selected){
            $selected_title = $selected['title'];
            $selected_salary = $selected['hourly_rate'];
        }*/
    }
?>