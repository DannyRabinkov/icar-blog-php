<?php

session_start();

$page_title = 'Home';
require_once 'tpl/header.php'
?>

<section class="container text-center p-4">
    <h1 class="mt-4 text-primary display-3">Welcome to iCar</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo sit voluptas libero. Ducimus veritatis
        alias velit autem, earum ipsum odio.</p>
    <a class="btn btn-outline-primary btn-lg" href="signUp.php" role="button">Join the iCar blog NOW!</a>
</section>
<section class="container p-4">
    <div class="row">
        <div class="col-6">
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ut doloremque velit exercitationem
                molestiae quaerat sequi possimus tempore aliquid ducimus aut earum perferendis eaque nobis
                beatae, atque mollitia alias! Alias vero voluptates libero, doloribus vitae adipisci. Optio
                reiciendis sunt neque vitae suscipit libero! Ea, perferendis aperiam!</p>
        </div>
        <div class="col-6">
            <img class="img-fluid" src="./images/car-race.jpg" alt="ferarri race car">
        </div>
    </div>
</section>

<?php
include 'tpl/footer.php'
?>