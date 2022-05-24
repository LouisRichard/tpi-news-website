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
 * @throws CouldNotSaveFileException::ArticleException
 * @throws InvalidFileExtensionException::ArticleException
 * @throws FileTooHeavyException::ArticleException
 * @throws EmptyArticleFormException::ArticleException
 * @throws UserIsNotAdminException::LoginException
 */
function addArticle($request)
{
    if ($_SESSION['admin'] == 1) {
        $imageDir = "assets/img/articles/";
        $imageFile = $imageDir . basename($_FILES['articleImage']['name']) . date('ymdhis');

        $abstract = str_replace("'", "\'", $request['abstract']);
        $abstract = str_replace('"', '\"', $request['abstract']);
        $article = str_replace("'", "\'", $request['article']);
        $article = str_replace('"', '\"', $request['article']);
        $article = str_replace("\n", "<br/>", $article);
        $categoryID = $request['category'];
        $author = $request['author'];
        if (!empty($abstract) && !empty($article) && !empty($categoryID) && !empty($author) && !empty(basename($_FILES['articleImage']['name']))) {
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
            require_once "model/exceptions/ArticleException.php";
            throw new EmptyArticleFormException("Un ou plusieurs des champs requis sont vides.");
        }
    } else {
        require_once "model/exceptions/LoginException.php";
        throw new UserIsNotAdminException("Vous devez être connecté en tant qu'administrateur pour acceder à cette feature");
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

/**
 * This function is designed to return a single article
 * @param int $articleID
 * @return array arr[] articles data
 */
function getOneArticle($articleID)
{
    require_once "model/articlesManager.php";
    return fetchOneArticle($articleID);
}

/**
 * This function is designed to increase the reaction on an article
 * @param int $articleID article's id
 * @throws UserIsNotLoggedInException::LoginException
 */
function likeArticle($articleID)
{
    if (isset($_SESSION['name'])) {
        require_once "model/articlesManager.php";
        increaseImpression($articleID);
    } else {
        require_once "model/exceptions/LoginException.php";
        throw new UserIsNotLoggedInException("Vous devez vous connecter pour acceder a cette fonctionnalité");
    }
}

/**
 * This function is designed to decrease the reaction on an article
 * @param int $articleID article's id
 * @throws UserIsNotLoggedInException::LoginException
 */
function dislikeArticle($articleID)
{
    if (isset($_SESSION['name'])) {
        require_once "model/articlesManager.php";
        decreaseImpression($articleID);
    } else {
        require_once "model/exceptions/LoginException.php";
        throw new UserIsNotLoggedInException("Vous devez vous connecter pour acceder a cette fonctionnalité");
    }
}

/**
 * this function designed to add a category to the website
 * @param string $name Category name
 * @throws UserIsNotAdminException::LoginException
 */
function addCategory($name)
{
    if ($_SESSION['admin']) {
        require_once "model/articlesManager.php";
        newCategory($name);
    } else {
        require_once "model/exceptions/LoginException.php";
        throw new UserIsNotAdminException("Vous devez être administrateur pour utiliser cette feature");
    }
}

/**
 * This function is designed to delete a category from the website in case you created it by accident or if no articles have been written for it
 * @param int $catID category's id
 * @throws UserIsNotAdminException::LoginException
 */
function delCategory($catID)
{
    if ($_SESSION['admin']) {
        require_once "model/articlesManager.php";
        deleteCategory($catID);
    } else {
        require_once "model/exceptions/LoginException.php";
        throw new UserIsNotAdminException("Vous devez être administrateur pour utiliser cette feature");
    }
}

/**
 * this function is designed to add a new user the the website
 * @param array author's infos (first name, name)
 * @throws UserIsNotAdminException::LoginException
 */
function addAuthor($authorInfos)
{
    $firstname = $authorInfos['authorFirstName'];
    $name = $authorInfos['authorName'];

    if ($_SESSION['admin']) {
        require_once "model/articlesManager.php";
        createAuthor($firstname, $name);
    } else {
        throw new UserIsNotAdminException("Vous devez être administrateur pour utiliser cette feature");
    }
}

/**
 * This function is designed to remove an author from the website
 * @param int $authorID author's id
 * @throws UserIsNotAdminException::LoginException
 */
function delAuthor($authorID)
{
    if ($_SESSION['admin']) {
        require_once "model/articlesManager.php";
        deleteAuthor($authorID);
    } else {
        require_once "model/exceptions/LoginException.php";
        throw new UserIsNotAdminException("Vous devez être administrateur pour utiliser cette feature");
    }
}

/**
 * This function is designed to post a comment to the website
 * @param string $content - comment content
 * @param int $article article's ID
 * @param int $user user's ID
 * @throws UserIsNotLoggedInException::LoginException
 */
function postComment($content, $article, $user)
{
    if ($_SESSION['name']) {
        $content = str_replace("'", "\'", $content);
        $content = str_replace('"', '\"', $content);
        $content = str_replace("\n", "<br/>", $content);
        require_once "model/articlesManager.php";
        addComment($content, $article, $user);
    } else {
        require_once "model/exceptions/LoginException.php";
        throw new UserIsNotLoggedInException("Vous devez vous connecter pour poster des commentaires");
    }
}

/**
 * This function is designed to return all comments under a single article
 * @param int $articleID
 */
function getComments($articleID)
{
    require_once "model/articlesManager.php";
    return getArticleComments($articleID);
}
