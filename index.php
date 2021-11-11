<?php
require_once 'app/helpers.php';
session_start();

$page_title = 'Home';
require_once 'tpl/header.php';
?>
<!-- Top section -->
<section class="container text-center p-4">
    <h1 class="mt-4 display-3 text-primary">Welcome to <?= $site_logo ?></h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum accusamus molestiae provident? Quam qui
        recusandae aut laborum maiores ipsa libero a culpa deleniti! A sit in esse sequi totam voluptates.</p>
    <a class="btn btn-outline-primary btn-lg" href="signup.php" role="button">Join the iCar blog now</a>
</section>
<!-- Content section -->
<section class="container p-4">
    <div class="row">
        <div class="col-6">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iure vitae quo officiis repellat velit
                aliquam suscipit illum nostrum natus cumque hic asperiores harum totam eligendi at sapiente,
                alias dolore architecto recusandae. Autem maxime et sunt assumenda animi blanditiis sint
                voluptate voluptatem eos, recusandae sequi placeat.</p>
        </div>
        <div class="col-6">
            <img src="images/car-race.jpg" class="img-fluid" alt="Ferrari Race Car">
        </div>
    </div>
</section>
<?php
include 'tpl/footer.php';