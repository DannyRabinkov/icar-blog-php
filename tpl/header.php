<?php $site_logo = 'i <i class="bi bi-truck"></i> Car'; ?>

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

    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" href="images/truck.svg" sizes="any" type="image/svg+xml">
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
                            <a class="nav-link<?= active_nav_item('About') ?>" href="about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link<?= active_nav_item('Blog') ?>" href="blog.php">Blog</a>
                        </li>
                    </ul>
                    <!-- Site Right Navigation -->
                    <?php if (!empty($_SESSION['user_name'])) : ?>
                    <ul class="navbar-nav">
                        <li c lass="nav-item">
                            <span class="nav-link text-light"><?= $_SESSION['user_name'] ?></span>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                    <?php else : ?>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link<?= active_nav_item('Signin') ?>" href="sign-in.php">Signin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link<?= active_nav_item('Signup') ?>" href="signUp.php">Signup</a>
                        </li>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
    </header>
    <main class="flex-fill">