<?php
session_start();
require_once 'app/helpers.php';

$link = mysqli_connect(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB);
$query = "SELECT users.name, posts.*
FROM posts JOIN users ON users.id = posts.user_id
ORDER BY posts.created_at DESC
";

$result = mysqli_query($link, $query);



$page_title = 'Blog';
require_once 'tpl/header.php';
?>

<section class="container p-4">
    <h1 class="mt-4 mb-4 text-primary display-3"><?= $site_logo ?>Blog</h1>

    <?php if (is_Logged_in()) : ?>
    <a class="btn btn-primary" href="add-post.php" role="button"><i class="bi bi-plus-circle"></i> Add New Post!</a>
    <?php endif; ?>

    <?php if ($result && mysqli_num_rows($result) > 0) : ?>

    <h2 class="mt-2 mb-2 display-3"><?= $site_logo ?> Posts</h2>


    <?php while ($post = mysqli_fetch_assoc($result)) : ?>
    <div>
        <div class="card mb-3 mt-3">

            <div class="card-header d-flex justify-content-between">

                <span><?= $post['name'] ?></span>
                <span><?= $post['created_at'] ?></span>

            </div>
            <div class="card-body">
                <h3 class="card-title"><?= $post['title'] ?></h3>
                <p class="card-text"><?= $post['article'] ?></p>

            </div>
        </div>
    </div>
    <?php endwhile; ?>

    <?php else : ?>
    <h2>No posts yet. Be the First One!</h2>
    <?php endif; ?>
</section>



<?php
include 'tpl/footer.php';
?>