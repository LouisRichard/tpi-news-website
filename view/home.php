<?php

/**
 * Contains everything "dynamic" in the home page
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-website
 * Created  : MAY. 09 2022
 * Info     : This file is directly adapted from the template at https://bootstrapmade.com/zenblog-bootstrap-blog-template/
 *
 * Source       :   https://github.com/LouisRichard/tpi-news-website
 */

ob_start();
$title = "TPI - Acceuil";
?>

<!-- ======= Hero Slider Section ======= -->
<section id="hero-slider" class="hero-slider">
    <div class="container-md" data-aos="fade-in">
        <div class="row">
            <div class="col-12">
                <div class="swiper sliderFeaturedPosts">
                    <div class="swiper-wrapper">
                        <?php for ($i = 0; $i < 4; $i++) { ?>
                            <div class="swiper-slide">
                                <a href="index.php?action=showArticle&aid=<?= $homeArticles[$i][0] ?>" class="img-bg d-flex align-items-end" style="background-image: url('<?= $homeArticles[$i][2] ?>');">
                                    <div class="img-bg-inner">
                                        <h2><?= $homeArticles[$i][1] ?></h2>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                        <div class="custom-swiper-button-next">
                            <span class="bi-chevron-right"></span>
                        </div>
                        <div class="custom-swiper-button-prev">
                            <span class="bi-chevron-left"></span>
                        </div>

                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
</section><!-- End Hero Slider Section -->

<!-- ======= Post Grid Section ======= -->
<section id="posts" class="posts">
    <div class="container" data-aos="fade-up">
        <div class="row g-5">
            <div class="col-lg-4">
                <div class="post-entry-1 lg">
                    <a href="index.php?action=showArticle&aid=<?= $random['id'] ?>"><img src="<?= $random['image'] ?>" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date"><?= $random['category'] ?></span> <span class="mx-1">&bullet;</span> <span><?= $random['date'] ?></span></div>
                    <h2><a href="single-post.html"><?= $random['abstract'] ?></a></h2>
                    <div class="d-flex align-items-center author">
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="row g-5">
                    <?php foreach ($postGrid as $col) {; ?>
                        <div class="col-lg-4 border-start custom-border">
                            <?php foreach ($col as $ind) { ?>
                                <div class="post-entry-1">
                                    <a href="index.php?action=showArticle&aid=<?= $ind['id'] ?>"><img src="<?= $ind['image'] ?>" alt="" class="img-fluid"></a>
                                    <div class="post-meta"><span class="date"><?= $ind['category'] ?></span> <span class="mx-1">&bullet;</span> <span><?= $ind['date'] ?></span></div>
                                    <h2><a href="index.php?action=showArticle&aid=<?= $ind['id'] ?>"><?= $ind['abstract'] ?></a></h2>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
            </div>


        </div> <!-- End .row -->
    </div>
</section> <!-- End Post Grid Section -->

<?php
$content = ob_get_clean();
require "gabarit.php";
