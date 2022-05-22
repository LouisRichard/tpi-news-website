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
 */
function increaseImpression($articleID)
{
    $query = "UPDATE articles SET reactions = reactions+1 WHERE id = " . $articleID;
    require_once "model/dbConnector.php";
    return (executeQueryUpdate($query));
}

/**
 * This function is designed to decrease the Reaction counter in the database
 */
function decreaseImpression($articleID)
{
    $query = "UPDATE articles SET reactions = reactions-1 WHERE id = " . $articleID;
    require_once "model/dbConnector.php";
    return (executeQueryUpdate($query));
}
