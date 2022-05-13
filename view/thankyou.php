<?php

/**
 * Contains everything "dynamic" in the about page
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-website
 * Created  : MAY. 09 2022
 * Info     : This file is directly adapted from the template at https://bootstrapmade.com/zenblog-bootstrap-blog-template/
 *
 * Source       :   https://github.com/LouisRichard/tpi-news-website
 */

ob_start();
$title = "TPI - Merci!";
?>

<section>
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h1 class="page-title">Merci !</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2 align-self-center">
                    <h3 class="text-center">Votre compte a bien été activé !</h3>
                    <h4 class="text-center">Vous pouvez maintenant vous connecter pour poster des commentaires et noter les articles</h4>
                    <br/>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
require "gabarit.php";
