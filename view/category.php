<?php

/**
 * Contains the categories and some articles for said category
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-website
 * Created  : MAY. 09 2022
 * Info     : This file is directly adapted from the template at https://bootstrapmade.com/zenblog-bootstrap-blog-template/
 *
 * Source       :   https://github.com/LouisRichard/tpi-news-website
 */

ob_start();
$title = "TPI - Categorie";
?>

<section>
  <div class="container">
    <div class="row">

      <div class="col-md-12" data-aos="fade-up">
        <?php foreach ($category as $singleArticle) { ?>
          <div class="d-md-flex post-entry-2 half">
            <a href="single-post.html" class="me-4 thumbnail">
              <img src="<?=$singleArticle['image']?>" alt="" class="img-fluid">
            </a>
            <div>
              <div class="post-meta"><span class="mx-1">&bullet;</span> <span><?= $singleArticle['date'] ?></span></div>
              <h3><a href="single-post.html"><?= $singleArticle['abstract'] ?></a></h3>
              <p><?=substr($singleArticle['article'], 0, 255)?>...</p>
              <div class="d-flex align-items-center author">
                <div class="name">
                  <h3 class="m-0 p-0"><?= $singleArticle['firstname'] . " " . $singleArticle['name'] ?></h3>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>

    </div>
  </div>
</section>

<?php
$content = ob_get_clean();
require "gabarit.php";
