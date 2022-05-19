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
                    <a href="index.php?action=showArticle&aid=<?= $homeArticles[4][0] ?>"><img src="<?= $homeArticles[4][2] ?>" alt="" class="img-fluid"></a>
                    <h2><a href="index.php?action=showArticle&aid=<?= $homeArticles[4][0] ?>"><?= $homeArticles[4][1] ?></a></h2>
                </div>

            </div>
            <div class="col-lg-8">
                <div class="row g-5">
                        <div class="col-lg-12 border-start custom-border">
                                <div class="post-entry-1">
                                    <a href="index.php?action=showArticle&aid=<?=$homeArticles[5][0]?>"><img src="<?=$homeArticles[5][2]?>" alt="" class="img-fluid"></a>
                                    <h2><a href="index.php?action=showArticle&aid=<?=$homeArticles[5][0]?>"><?=$homeArticles[5][1]?></a></h2>
                                </div>
                        </div>
                    <!-- <div class="post-entry-1">
                            <a href="single-post.html"><img src="assets/img/post-landscape-5.jpg" alt="" class="img-fluid"></a>
                            <div class="post-meta"><span class="date">Food</span> <span class="mx-1">&bullet;</span> <span>Jul 17th '22</span></div>
                            <h2><a href="single-post.html">How to Avoid Distraction and Stay Focused During Video Calls?</a></h2>
                        </div>
                        <div class="post-entry-1">
                            <a href="single-post.html"><img src="assets/img/post-landscape-7.jpg" alt="" class="img-fluid"></a>
                            <div class="post-meta"><span class="date">Design</span> <span class="mx-1">&bullet;</span> <span>Mar 15th '22</span></div>
                            <h2><a href="single-post.html">Why Craigslist Tampa Is One of The Most Interesting Places On the Web?</a></h2>
                        </div>
                    </div>
                    <div class="col-lg-4 border-start custom-border">
                        <div class="post-entry-1">
                            <a href="single-post.html"><img src="assets/img/post-landscape-3.jpg" alt="" class="img-fluid"></a>
                            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                            <h2><a href="single-post.html">6 Easy Steps To Create Your Own Cute Merch For Instagram</a></h2>
                        </div>
                        
                        <div class="post-entry-1">
                            <a href="single-post.html"><img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid"></a>
                            <div class="post-meta"><span class="date">Tech</span> <span class="mx-1">&bullet;</span> <span>Mar 1st '22</span></div>
                            <h2><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                        </div>
                        <div class="post-entry-1">
                            <a href="single-post.html"><img src="assets/img/post-landscape-8.jpg" alt="" class="img-fluid"></a>
                            <div class="post-meta"><span class="date">Travel</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                            <h2><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
                        </div>
                    </div>
                    <div class="col-lg-4 border-start custom-border">
                        <div class="post-entry-1">
                            <a href="single-post.html"><img src="assets/img/post-landscape-3.jpg" alt="" class="img-fluid"></a>
                            <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                            <h2><a href="single-post.html">6 Easy Steps To Create Your Own Cute Merch For Instagram</a></h2>
                        </div>
                        
                        <div class="post-entry-1">
                            <a href="single-post.html"><img src="assets/img/post-landscape-6.jpg" alt="" class="img-fluid"></a>
                            <div class="post-meta"><span class="date">Tech</span> <span class="mx-1">&bullet;</span> <span>Mar 1st '22</span></div>
                            <h2><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should Know</a></h2>
                        </div>
                        <div class="post-entry-1">
                            <a href="single-post.html"><img src="assets/img/post-landscape-8.jpg" alt="" class="img-fluid"></a>
                            <div class="post-meta"><span class="date">Travel</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                            <h2><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
                        </div>
                    </div> -->
                </div>
            </div>

        </div> <!-- End .row -->
    </div>
</section> <!-- End Post Grid Section -->

<?php
$content = ob_get_clean();
require "gabarit.php";
