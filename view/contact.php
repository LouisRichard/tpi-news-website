<?php

/**
 * Contains the contact form
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-website
 * Created  : MAY. 09 2022
 * Info     : This file is directly adapted from the template at https://bootstrapmade.com/zenblog-bootstrap-blog-template/
 *
 * Source       :   https://github.com/LouisRichard/tpi-news-website
 */

ob_start();
$title = "TPI - Contacte";
?>

<section id="contact" class="contact mb-5">
    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h1 class="page-title">Contactez-nous</h1>
            </div>
        </div>

        <div class="row gy-4">

            <div class="col-md-4">
                <div class="info-item">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Adresse</h3>
                    <address>A108 Adam Street, NY 535022, USA</address>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-4">
                <div class="info-item info-item-borders">
                    <i class="bi bi-phone"></i>
                    <h3>Téléphone</h3>
                    <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
                </div>
            </div><!-- End Info Item -->

            <div class="col-md-4">
                <div class="info-item">
                    <i class="bi bi-envelope"></i>
                    <h3>Email</h3>
                    <p><a href="mailto:info@example.com">contact@wewfamily.ch</a></p>
                </div>
            </div><!-- End Info Item -->

        </div>

    </div>
</section>


<?php
$content = ob_get_clean();
require "gabarit.php";
