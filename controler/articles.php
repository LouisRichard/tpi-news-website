<?php

/**
 * This php file is designed to manage all operation regarding articles management
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-websiter
 * Created  : MAY. 17 2022
 *
 * Source       :   https://github.com/tpi-news-website
 */



function getCategories()
{
    require_once "model/articlesManager.php";
    return pullCategories();
}

function getAuthors()
{
    require_once "model/articlesManager.php";
    return pullAuthors();
}

/**
 * This function is designed to add an article to the site
 * @param array $request
 */
function addArticle($request)
{
    if ($_SESSION['admin'] == 1) {
        $imageDir = "assets/img/articles/";
        $imageFile = $imageDir . basename($_FILES['articleImage']['name']);

        $abstract = $request['abstract'];
        $article = $request['article'];
        $categoryID = $request['category'];
        //no checks for now, I just want it to work
        if(move_uploaded_file($_FILES['articleImage']['tmp_name'], $imageFile)) {
            require_once "model/articlesManager.php";
            if(addArticleInDB($abstract, $article, $categoryID, $imageFile)){
                header('Location: index.php?action=home');
            }
        }
    }
}
