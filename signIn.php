<?php

require_once 'app/helpers.php';
session_start();
redirect_auth(true, './');

//$errors = ['email' => '', 'password' => ''];
if (isset($_POST['submit'])) {

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $is_form_valid = true;
    if (!$email) {
        $is_form_valid = false;
        $errors['email'] = '<div class="text-danger form-text">A Valid Email Is Required</div>';
    }
    if (!$password) {
        $is_form_valid = false;
        $errors['password'] = '<div class="text-danger form-text">Please enter your Password</div>';
    }
    if ($is_form_valid) {
        $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

        $query = "SELECT * FROM users WHERE email='$email'";

        $result = mysqli_query($link, $query);

        if ($result && mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);

            if ($user['password'] === $password) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];

                header('Location: ./');
                die;
            } else {
                echo 'wrong Password';
            }
        } else {
            echo 'User not found or wrong Password!';
        }
    }
}
$page_title = 'Sigh-In';
require_once 'tpl/header.php';
?>

<section class="container p-4">
    <h1 class="display-6 mt-4">Enter Email and Password to Sing-In:</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam, corrupti.</p>
    <div class="col-md-6">
        <form method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">

                <?= field_errors('email'); ?>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                <?= field_errors('password');  ?>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Sign-In</button>
            <?= field_errors('submit'); ?>
        </form>
    </div>

</section>



<?php
include 'tpl/footer.php';
?>