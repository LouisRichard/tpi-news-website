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
                    <a href="single-post.html"><img src="assets/img/post-landscape-1.jpg" alt="" class="img-fluid"></a>
                    <div class="post-meta"><span class="date">Culture</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                    <h2><a href="single-post.html">11 Work From Home Part-Time Jobs You Can Do Now</a></h2>
                    <p class="mb-4 d-block">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vero temporibus repudiandae, inventore pariatur numquam cumque possimus exercitationem? Nihil tempore odit ab minus eveniet praesentium, similique blanditiis molestiae ut saepe perspiciatis officia nemo, eos quae cumque. Accusamus fugiat architecto rerum animi atque eveniet, quo, praesentium dignissimos</p>

                    <div class="d-flex align-items-center author">
                        <div class="photo"><img src="assets/img/person-1.jpg" alt="" class="img-fluid"></div>
                        <div class="name">
                            <h3 class="m-0 p-0">Cameron Williamson</h3>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-lg-8">
                <div class="row g-5">
                    <div class="col-lg-4 border-start custom-border">
                        <div class="post-entry-1">
                            <a href="single-post.html"><img src="assets/img/post-landscape-2.jpg" alt="" class="img-fluid"></a>
                            <div class="post-meta"><span class="date">Sport</span> <span class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                            <h2><a href="single-post.html">Let’s Get Back to Work, New York</a></h2>
                        </div>
                        <div class="post-entry-1">
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
                    </div>
                </div>
            </div>
            

        </div> <!-- End .row -->
    </div>
</section> <!-- End Post Grid Section -->

<?php
$content = ob_get_clean();
require "gabarit.php";
