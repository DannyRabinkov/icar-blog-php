<?php
require_once 'app/helpers.php';
session_start();

redirect_auth();

if (isset($_POST['submit'])) {
    $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_URL);
    $email = trim($email);
    $email = mysqli_real_escape_string($link, $email);

    $password = filter_input(INPUT_POST, 'passwrord', FILTER_SANITIZE_STRING);
    $password = trim($password);
    $password = mysqli_real_escape_string($link, $password);


    $email = !empty($_POST['email']) ? trim($_POST['email']) : '';
    $password = !empty($_POST['password']) ? trim($_POST['password']) : '';

    $is_form_valid = true;
    if (!$email) {
        $is_form_valid = false;
        $errors['email'] = '* A Valid Email is required.';
    }
    if (!$password) {
        $is_form_valid = false;
        $errors['password'] = '* Please enter your password.';
    }
    if ($is_form_valid) {
        $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
        $query = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($link, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);

            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['name'];
                header('location: ./blog.php');
                die;
            } else {
                $errors['submit'] = '* Password is incorrect';
            }
        } else {
            $errors['submit'] = '* User not found';
        }
    }
}
$page_title = 'Signin';
require_once 'tpl/header.php';
?>
<section class="container p-4">
    <div class="col-md-6">
        <h1 class="mt-4 display-6">Enter Email and Password to Signin:</h1>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
        <form action="sign-in.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" value="<?= htmlentities(posted_value('email')) ?>" class="form-control"
                    id="email" aria-describedby="emailHelp">
                <?= field_errors('email') ?>
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
                <?= field_errors('password') ?>
            </div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">Signin</button>
            <?= field_errors('submit') ?>
        </form>
    </div>
</section>
<?php
include 'tpl/footer.php';