<?php $site_logo = 'i<i class="bi bi-truck">Car</i>' ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title><?= $page_title ?> - iCar</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <header>
        <nav class="navbar navbar-expand-sm navbar-dark bg-primary shadow-lg">
            <div class="container">
                <!-- Site Logo -->
                <a class="navbar-brand" href="./"><?= $site_logo ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                    <!-- Site LEFT Navigation-->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.php">Blog</a>
                        </li>
                    </ul>
                    <!-- Site Right Navigation -->
                    <?php if (empty($_SESSION['user_name'])) : ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="signin.php">Signin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="signup.php">Signup</a>
                        </li>
                    </ul>

                    <?php else : ?>

                    <!-- Site Right Navigation -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <span class="nav-link"><?= $_SESSION['user_name'] ?>
                            </span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logOut.php">Logout</a>
                        </li>
                    </ul>
                    <?php endif ?>

                </div>
            </div>
        </nav>
    </header>
    <main class="flex-fill">