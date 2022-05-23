<?php

/**
 * Contains the page to add or delete authors
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-website
 * Created  : MAY. 23 2022
 * Info     : This file is directly adapted from the template at https://bootstrapmade.com/zenblog-bootstrap-blog-template/
 *
 * Source       :   https://github.com/LouisRichard/tpi-news-website
 */

ob_start();
$title = "TPI - Gérer les auteurs";
?>

<section>
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h1 class="page-title">Auteurs</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 align-self-center">
                <table class='table'>
                    <thead>
                        <tr>
                            <th scope="col">Nom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Supprimer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($authors as $author) { ?>
                            <tr>
                                <td><?= $author[1] ?></td>
                                <td><?= $author[2] ?></td>
                                <td><a href="index.php?action=deleteCategory&cat=<?= $author[0] ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h4>Nouvel Auteur :</h4>
                <form class='form' method="POST" action="index.php?action=addAuthor">
                    <div class="form-group">
                        <label for="authorName">Nom</label>
                        <input type="text" class="form-control" id="authorName" name="authorName" placeholder="Nom de l'auteur">
                    </div>
                    <div class="form-group">
                        <label for="authorFirstName">Prénom</label>
                        <input type="text" class="form-control" id="authorFirstName" name="authorFirstName" placeholder="Prénom de l'auteur">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-dark">Créer l'auteur</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
require "gabarit.php";
