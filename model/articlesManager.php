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
