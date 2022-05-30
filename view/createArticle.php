<?php

/**
 * Contains the view to create an article
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-website
 * Created  : MAY. 09 2022
 * Info     : This file is directly adapted from the template at https://bootstrapmade.com/zenblog-bootstrap-blog-template/
 *
 * Source       :   https://github.com/LouisRichard/tpi-news-website
 */

ob_start();
$title = "TPI - Ajouter un article";
?>

<section id="contact" class="contact mb-5">
    <div class="container" data-aos="fade-up">
        <div class="form mt-5">
            <form action="index.php?action=addArticle" method="post" role="form" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group">
                        <textarea name="abstract" class="form-control" rows="3" placeholder="Abstrait" required></textarea>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="form-group">
                        <textarea class="form-control" name="article" rows="10" placeholder="Article" required></textarea>
                    </div>
                </div>
                <br/>
                <div clas="row">
                    <div class="form-group">
                        <input class="form-control" type="file" name="articleImage" id="image" required />
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="form-group">
                        <select name="category" class="form-control">
                            <option value="">Sélectionnez une catégorie</option>
                            <?php foreach ($categories as $category) { ?>
                                <option value=<?= $category[0] ?>><?= $category[1] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <br/>
                <div class="row">
                    <div class="form-group">
                        <select name="author" class="form-control">
                            <option value="">Sélectionnez un auteur</option>
                            <?php foreach ($authors as $author) { ?>
                                <option value=<?= $author[0] ?>><?= $author[2] . " " . $author[1] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <br />
                <div class="text-center"><button class="btn btn-outline-dark" type="submit">Créer l'article</button></div>
            </form>
        </div>
    </div>
</section>


<?php
$content = ob_get_clean();
require "gabarit.php";
