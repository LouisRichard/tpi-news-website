<?php

/**
 * This php file is designed to manage all operation regarding articles management
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-websiter
 * Created  : MAY. 11 2022
 *
 * Source       :   https://github.com/tpi-news-website
 */

/**
 * This function is designed to return all categories present in the database
 * @return array categories[][] -> array with two values -> category ID and name
 */
function pullCategories()
{
    $categoriesQuery = "SELECT * FROM Category";

    require_once "model/dbConnector.php";
    return executeQuerySelect($categoriesQuery);
}

/**
 * This function is designed to return all categories present in the database
 * @return array categories[][] -> array with two values -> category ID and name
 */
function pullAuthors()
{
    $authorQuery = "SELECT * FROM authors";

    require_once "model/dbConnector.php";
    return executeQuerySelect($authorQuery);
}

/**
 * This function is designed to add an article to the database
 * @param string $abstract article abstract
 * @param string $article the article itself
 * @param int $category the article category's id
 * @param string $filePath path to the image
 * @param int $author Author's id
 * @return array the new article
 */
function addArticleInDB($abstract, $article, $category, $filePath, $author)
{
    $str = '\'';
    $query = "INSERT INTO articles (abstract, article, image, date, Category_id, Authors_id) VALUES (" . $str . $abstract . $str . "," . $str . $article . $str . "," . $str . $filePath . $str . "," . $str . date('Y-m-d H:i:s') . $str . "," . $category . "," . $str . $author . $str . ")";

    require_once "model/dbConnector.php";
    return executeQueryInsert($query);
}

/**
 * This function is designed to get the 20 latest articles for the home page
 * @return array arr[][] 20 articles 
 */
function fetchHomeArticles()
{
    $articleQuery = "SELECT id, abstract, image FROM Articles ORDER BY date DESC LIMIT 6";

    require_once "model/dbConnector.php";
    return executeQuerySelect($articleQuery);
}

/**
 * This function is designed to return the informations about one article
 * @param int $articleID ID of the article
 * @return array arr[]
 */
function fetchOneArticle($articleID)
{
    $articleQuery = "SELECT abstract, article, image, date, authors.name, authors.firstname, category.name, reactions
                    FROM articles INNER JOIN authors on articles.Authors_id = authors.id
                    INNER JOIN category on articles.Category_id = category.id
                    WHERE articles.id = " . $articleID;
    require_once "model/dbConnector.php";
    return executeQuerySelect($articleQuery)[0];
}

/**
 * This function is designed to increase de Reaction counter in the database
 * @param int $articleID ID of the article
 * @return array the article with the updated value
 */
function increaseImpression($articleID)
{
    $query = "UPDATE articles SET reactions = reactions+1 WHERE id = " . $articleID;
    require_once "model/dbConnector.php";
    return (executeQueryUpdate($query));
}

/**
 * This function is designed to decrease the Reaction counter in the database
 * @param int $articleID ID of the article
 * @return array the new article with the updated value
 */
function decreaseImpression($articleID)
{
    $query = "UPDATE articles SET reactions = reactions-1 WHERE id = " . $articleID;
    require_once "model/dbConnector.php";
    return (executeQueryUpdate($query));
}

/**
 * This function is designed to add a category to the database
 * @param string $name Category name
 * @return array the new category
 */
function newCategory($name)
{
    $query = "INSERT INTO category (name) VALUES ('" . $name . "')";
    require_once "model/dbConnector.php";
    return executeQueryInsert($query);
}

/**
 * this function is designed to delete a specific category from the database
 * @param int $catID category id
 * @return bool|null returns true if the delete was successfull
 */
function deleteCategory($catID)
{
    $query = "DELETE FROM category WHERE id=" . $catID;
    require_once "model/dbConnector.php";
    return executeQueryDelete($query);
}

/**
 * this function is designed to add a new author to the database
 * @param string $firstname author's first name
 * @param string $name author's last name 
 * @return array new author's infos
 */
function createAuthor($firstname, $name)
{
    $query = "INSERT INTO authors (name, firstname) VALUES ('" . $name . "', '" . $firstname . "')";
    require_once "model/dbConnector.php";
    return executeQueryInsert($query);
}

/**
 * This function is designed to delete a specific author from the database
 * @param int $authorID author's id
 */
function deleteAuthor($authorID)
{
    //die(var_dump($authorID));
    $query = "DELETE FROM authors WHERE id = " . $authorID;
    require_once "model/dbConnector.php";
    return executeQueryDelete($query);
}
