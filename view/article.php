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
                    <h5 class="comment-title py-4"><?= count($comments) ?> Commentaires</h5>
                    <?php foreach ($comments as $comment) { ?>
                        <div class="comment d-flex mb-4">
                            <div class="flex-grow-1 ms-2 ms-sm-3">
                                <div class="comment-meta d-flex align-items-baseline">
                                    <h6 class="me-2"><?=$comment[1]?></h6>
                                </div>
                                <div class="comment-body">
                                    <?=$comment[0]?>
                                </div>
                            </div>
                        </div>
                    <?php } ?><!-- End Comments -->
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
require "gabarit.php";
