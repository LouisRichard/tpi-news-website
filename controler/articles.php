<?php

/**
 * This php file is designed to manage all operation regarding articles management
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-websiter
 * Created  : MAY. 17 2022
 *
 * Source       :   https://github.com/tpi-news-website
 */



/**
 * This function is designed to return all categories 
 * @return array categories[][] id and name
 */
function getCategories()
{
    require_once "model/articlesManager.php";
    return pullCategories();
}

/**
 * This function is designed to get all authors
 * @return array authors[][] id and name
 */
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

        $abstract = str_replace("'", "\'", $request['abstract']);
        $article = str_replace("'", "\'", $request['article']);
        $article = str_replace("\n", "<br/>", $article);
        $categoryID = $request['category'];
        $author = $request['author'];
        if ($_FILES['articleImage']['size'] < 5000000) { //check if file size is below 5MB
            $mimeType = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $_FILES['articleImage']['tmp_name']);
            $allowedFileTypes = ['image/png', 'image/jpeg', 'image/jpg'];
            if (in_array($mimeType, $allowedFileTypes)) {
                if (is_uploaded_file($_FILES["articleImage"]["tmp_name"])) {
                    if (move_uploaded_file($_FILES['articleImage']['tmp_name'], $imageFile)) {
                        require_once "model/articlesManager.php";
                        if (addArticleInDB($abstract, $article, $categoryID, $imageFile, $author)) {
                            header('Location: index.php?action=home');
                        }
                    } else {
                        require_once "model/exceptions/ArticleException.php";
                        throw new CouldNotSaveFileException("Le fichier n'a pas pu être sauvé. Son nom est peut-être invalide");
                    }
                } else {
                    require_once "model/exceptions/ArticleException.php";
                    throw new CouldNotSaveFileException("Le fichier n'a pas pu être sauvé. Son nom est peut-être invalide");
                }
            } else {
                require_once "model/exceptions/ArticleException.php";
                throw new InvalidFileExtensionException("Seulement les fichiers PNG, JPG et JPEG sont supportés");
            }
        } else {
            require_once "model/exceptions/ArticleException.php";
            throw new FileTooHeavyException("Le fichier ne peut faire qu'un maximum de 5Mo");
        }
    } else {
        require_once "model/exceptions/LoginException.php";
        throw new UserIsNotAdminException("Vous devez être un administrateur pour acceder à cette feature");
    }
}

/**
 * This function is designed to return articles 
 * @return array arr[][] articles infos 
 */
function getHomeArticles()
{
    require_once "model/articlesManager.php";
    return fetchHomeArticles();
}

function getOneArticle($articleID)
{
    require_once "model/articlesManager.php";
    return fetchOneArticle($articleID);
}
