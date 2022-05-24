<?php

/**
 * Contains a single article
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-website
 * Created  : MAY. 09 2022
 * Info     : This file is directly adapted from the template at https://bootstrapmade.com/zenblog-bootstrap-blog-template/
 *
 * Source       :   https://github.com/LouisRichard/tpi-news-website
 */

ob_start();
$title = "TPI - Article";
?>


<section class="single-post-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12 post-content" data-aos="fade-up">

                <!-- ======= Single Post Content ======= -->
                <div class="single-post">
                    <div class="post-meta"><span class="date"><?= $article[6] ?></span> <span class="mx-1">&bullet;</span> <span><?= $article[3] ?></span></div>
                    <h2><?= $article[0] ?></h2>
                    <figure class="figure-img img-fluid rounded">
                        <img src="<?= $article[2] ?>" alt="" class="img-fluid">
                    </figure>
                    <p><?= $article[1] ?></p>
                    <br /><br />
                    <div class="post-meta"><span><?= $article[5] . " " . $article[4] ?></span></div>
                    <a href="index.php?action=like&aid=<?= $_GET['aid'] ?>"><i class="bi bi-hand-thumbs-up"></i></a> / <a href="index.php?action=dislike&aid=<?= $_GET['aid'] ?>"><i class="bi bi-hand-thumbs-down"></i></a> - Score : <?= $article[7] ?>
                </div><!-- End Single Post Content -->

                <!-- ======= Comments Form ======= -->
                <div class="row justify-content-center mt-5">
                    <div class="col-lg-12">
                        <form action="index.php?action=postComment&aid=<?= $_GET['aid'] ?>" method="POST">
                            <h5 class="comment-title">Laisser un commentaire</h5>
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <label for="comment-message">Commentaire</label>
                                    <textarea class="form-control" name="comment-message" id="comment-message" placeholder="Commentaire" cols="30" rows="3"></textarea>
                                </div>
                                <div class="col-12">
                                    <input type="submit" class="btn btn-primary" value="Post comment">
                                </div>
                            </div>
                        </form>
                    </div>
                </div><!-- End Comments Form -->

                <!-- ======= Comments ======= -->
                <div class="comments">
                    <h5 class="comment-title py-4">2 Comments</h5>
                    <div class="comment d-flex mb-4">
                        <div class="flex-shrink-0">
                            <div class="avatar avatar-sm rounded-circle">
                                <img class="avatar-img" src="assets/img/person-5.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="flex-grow-1 ms-2 ms-sm-3">
                            <div class="comment-meta d-flex align-items-baseline">
                                <h6 class="me-2">Jordan Singer</h6>
                                <span class="text-muted">2d</span>
                            </div>
                            <div class="comment-body">
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non minima ipsum at amet doloremque qui magni, placeat deserunt pariatur itaque laudantium impedit aliquam eligendi repellendus excepturi quibusdam nobis esse accusantium.
                            </div>

                            <div class="comment-replies bg-light p-3 mt-3 rounded">
                                <h6 class="comment-replies-title mb-4 text-muted text-uppercase">2 replies</h6>

                                <div class="reply d-flex mb-4">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm rounded-circle">
                                            <img class="avatar-img" src="assets/img/person-4.jpg" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-2 ms-sm-3">
                                        <div class="reply-meta d-flex align-items-baseline">
                                            <h6 class="mb-0 me-2">Brandon Smith</h6>
                                            <span class="text-muted">2d</span>
                                        </div>
                                        <div class="reply-body">
                                            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                        </div>
                                    </div>
                                </div>
                                <div class="reply d-flex">
                                    <div class="flex-shrink-0">
                                        <div class="avatar avatar-sm rounded-circle">
                                            <img class="avatar-img" src="assets/img/person-3.jpg" alt="" class="img-fluid">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-2 ms-sm-3">
                                        <div class="reply-meta d-flex align-items-baseline">
                                            <h6 class="mb-0 me-2">James Parsons</h6>
                                            <span class="text-muted">1d</span>
                                        </div>
                                        <div class="reply-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio dolore sed eos sapiente, praesentium.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="comment d-flex">
                        <div class="flex-shrink-0">
                            <div class="avatar avatar-sm rounded-circle">
                                <img class="avatar-img" src="assets/img/person-2.jpg" alt="" class="img-fluid">
                            </div>
                        </div>
                        <div class="flex-shrink-1 ms-2 ms-sm-3">
                            <div class="comment-meta d-flex">
                                <h6 class="me-2">Santiago Roberts</h6>
                                <span class="text-muted">4d</span>
                            </div>
                            <div class="comment-body">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto laborum in corrupti dolorum, quas delectus nobis porro accusantium molestias sequi.
                            </div>
                        </div>
                    </div>
                </div><!-- End Comments -->
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
require "gabarit.php";
