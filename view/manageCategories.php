<?php

/**
 * Contains the page to add or delete categories
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-website
 * Created  : MAY. 23 2022
 * Info     : This file is directly adapted from the template at https://bootstrapmade.com/zenblog-bootstrap-blog-template/
 *
 * Source       :   https://github.com/LouisRichard/tpi-news-website
 */

ob_start();
$title = "TPI - Gérer les catégories";
?>

<section>
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h1 class="page-title">Catégories</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 align-self-center">
                <table class='table'>
                    <thead>
                        <tr>
                            <th scope="col">Catégorie</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categories as $category) { ?>
                            <tr>
                                <td><?= $category[1] ?></td>
                                <td><a href="index.php?action=deleteCategory&cat=<?= $category[0] ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h4>Nouvelle catégorie :</h4>
                <form class='form' method="POST" action="index.php?action=addCategory">
                    <div class="form-group">
                        <label for="categoryName">Nom</label>
                        <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Nom de la catégorie">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark">Créer la catégorie</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
require "gabarit.php";
