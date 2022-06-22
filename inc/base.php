<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finance Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style>
    .form-container {
        max-width: 33%;
    }

    .sort-btn:hover {
        cursor: pointer;
        text-decoration: underline;
    }

    @media screen and (max-width:1000px) {
        .form-container {
            max-width: 100%;
        }
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container">
            <a href="/index.php" class="navbar-brand fs-2 fw-bold">Finance Manager</a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="navbar-item">
                        <a class="nav-link" href="/login-form.php">Log in</a>
                    </li>
                    <li class="navbar-item">
                        <a class="nav-link" href="/register-form.php">Register</a>
                    </li>

                </ul>
            </div>
        </div>

    </nav>
    <div class="container d-flex flex-column align-items-center">


        <?php

        session_start();


        ?>