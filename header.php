<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Imperial Bootstrap Project</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-secondary">
        <div class="container menu">
            <a class="navbar-brand" href="#">Web Dev TOT</a>
            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <!-- Right Side Of Navbar ms-auto, use me-auto to align to the left-->
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php" aria-current="page">Home<span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="skill_calculator.php">Calculator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="salary_calculator.php">Salary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="developer_crud.php">Database</a>
                    </li>
                </ul>
                <span class="ms-1"><button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalSignin">Sign In</button></span>
                <span class="ms-1"></span><button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#modalSignup">Sign Up</button></span>
            </div>
        </div>
    </nav>