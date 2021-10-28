<?php
require_once 'app/helpers.php';
session_start();
redirect_auth(false, './signIn.php');

if (isset($_POST['submit'])) {

    $title = !empty($_POST['title']) ? trim(($_POST['title'])) :  '';
    $article = !empty($_POST['article']) ? trim(($_POST['article'])) :  '';

    $is_form_valid = true;

    if (!$title || mb_strlen($title) < 2) {
        $is_form_valid = false;
        $errors['title'] = 'Title is a required with min 2 characters.';
    }
    if (!$article || mb_strlen($article) < 2) {
        $is_form_valid = false;
        $errors['article'] = 'Article is a required with min 2 characters.';
    }
    if ($is_form_valid) {
        $uid = $_SESSION['user_id'];
        $link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
        $query = "INSERT INTO posts VALUES(NULL,$uid ,'$title','$article', NOW())";

        $result = mysqli_query($link, $query);

        if ($result && mysqli_affected_rows($link) === 1) {

            header('location: ./blog.php');
            exit();
        }
    }
}



$page_title = 'Add-Post';
require_once 'tpl/header.php';
?>

<section class="container p-4">
    <h1 class="mt-4 mb-4 text-primary display-3">Add You'r Post HERE!</h1>
    <div class="col-md-6">

        <form method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" value="<?= posted_value('title') ?>" class="form-control" id="title">
                <?= field_errors('title'); ?>
            </div>
            <div class="form-floating mb-3">
                <textarea name="article" value="<?= posted_value('title') ?>" class="form-control"
                    placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                <label for="floatingTextarea2">Post</label><?= field_errors('article'); ?>
            </div>

    </div>
    <div class="d-flex">
        <button type="submit" name="submit" value="submit" class="btn btn-primary">Publish Post</button>&nbsp;
        <a class="btn btn-secondary" href="./blog.php">Cancel</a>
    </div>
    </form>
    </div>
</section>



<?php
include 'tpl/footer.php';
?>