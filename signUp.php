<?php
require_once 'app/helpers.php';
session_start();

if (isset($_POST['submit'])) {
    $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $name = trim($name);
    $name = mysqli_real_escape_string($link, $name);

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $email = trim($email);
    $email = mysqli_real_escape_string($link, $email);

    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $password = trim($_POST['password']);

    $is_form_valid = true;

    if (!$name || mb_strlen($name) < 2 || mb_strlen($name) > 50) {
        $is_form_valid = false;
        $errors['name'] = '* A valid name is required with minimum 2 chrecters and maximum 50.';
    }

    if (!$email) {
        $is_form_valid = false;
        $errors['email'] = '* A valid email is required.';
    } else {
        $query = "SELECT email FROM users WHERE email='$email'";
        $result = mysqli_query($link, $query);

        if (!$result) {
            $is_form_valid = false;
            $errors['submit'] = '* Error.';
        }
        if ($result && mysqli_num_rows($result) > 0) {
            $is_form_valid = false;
            $errors['email'] = '* Email allredy exists. Try another account.';
        }
    }

    if (!$password || mb_strlen($password) < 6 || mb_strlen($password) > 20) {
        $is_form_valid = false;
        $errors['password'] = '* Must choose a password with minimum 6 charecters and 20 the most.';
    } elseif (!preg_match("/(?=.*[a-z])(?=.*[A-Z])/", $password)) {
        $is_form_valid = false;
        $errors['password'] = '* Please use minimum 1 Uper case letter and 1 lower case letter.';
    }

    if ($is_form_valid) {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $currentDate = date('Y-m-d');
        $query = "INSERT INTO users VALUES(NULL, '$email', '$password', '$name' , '$currentDate')";

        $result = mysqli_query($link, $query);

        if ($result && mysqli_affected_rows($link) === 1) { // Was the Post added to the DB?

            $uid = (string) mysqli_insert_id($link);
            $_SESSION['user_id'] = $uid;
            $_SESSION['user_name'] = $name;

            header('location: ./blog.php');
            exit();
        } else {

            exit('DB ERROR.');
        }
    }
}

$page_title = 'Signup';
require_once 'tpl/header.php';
?>
<section class="container p-4">
    <div class="col-md-6">
        <h1 class="mt-4 display-6">Sign up for a new account</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
        <form method="post">


            <input type="hidden" name="token" value="<?= md5(time()) ?>">

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" value="<?= posted_value('name') ?>" class="form-control" id="name">
                <?= field_errors('name') ?>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" value="<?= posted_value('email') ?>" class="form-control" id="email"
                    aria-describedby="emailHelp">
                <?= field_errors('email') ?>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                <?= field_errors('password') ?>
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Profile image</label>
                <input class="form-control" type="file" id="formFile">
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Sign-Up</button>
            <?= field_errors('submit') ?>
        </form>
    </div>
</section>

<?php
include 'tpl/footer.php';