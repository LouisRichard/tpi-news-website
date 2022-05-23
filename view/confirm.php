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
$title = "TPI - Confirmation";
?>

<section>
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h1 class="page-title"><?=$username?></h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 offset-md-2 align-self-center">
                    <h3 class="text-center">Votre compte <b><?=$email?> </b>a bien été créé!</h3>
                    <h4 class="text-center">Il ne vous reste plus qu'a vérifier votre adresse email avant de pouvoir vous conncter</h4>
                    <p class="text-center">Un mail vous a été envoyé. Si vous ne l'avez pas reçu, vérifiez votre dossier 'Spam'</p>
                    <br/>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
require "gabarit.php";
