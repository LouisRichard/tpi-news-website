<?php

/**
 * This php file is designed to manage SQL connexion with the database
 * Author   : louis.richard@tutanota.com
 * Project  : tpi-news-website
 * Created  : MAY. 10 2022
 * Info     : This file has been adapted from another project : https://github.com/Havachi/ProjetWEB-DB-LJACorp
 *
 * Source       :   https://github.com/LouisRichard/tpi-news-website
 */

#region Query management

/**
 * This function is designed to execute a query received as parameter
 * @param string $query : SQL command starting with SELECT
 * @return array|null : Query result (can be null)
 */
function executeQuerySelect($query)
{
    $queryResult = null;

    $dbConnexion = openDBConnexion(); //open database connexion
    if ($dbConnexion != null) {
        $statement = $dbConnexion->prepare($query);
        $statement->execute(); //execute query
        $queryResult = $statement->fetchAll(); //prepare result for client
    }
    $dbConnexion = null; //close database connexion
    return $queryResult;
}


/**
 * this function is designed to execute a query received as parameter
 * @param string $query : SQL command starting with UPDATE
 * @return array|null : result after update
 */
function executeQueryUpdate($query)
{
    $queryResult = null;

    $dbConnexion = openDBConnexion(); //open database connexion
    if ($dbConnexion != null) {
        $statement = $dbConnexion->prepare($query); //prepare query
        $statement->execute(); //execute query
        $queryResult = $statement->fetchAll(); //prepare result for client
    }
    $dbConnexion = null; //close database connexion
    return $queryResult;
}

/**
 * this function is designed to execute a query received as parameter
 * @param string $query : SQL command starting with INSERT
 * @return bool|null : $statement->execute() returns true if the insert was successfull
 */
function executeQueryInsert($query)
{
    $queryResult = null;

    $dbConnexion = openDBConnexion(); //open database connexion
    if ($dbConnexion != null) {
        $statement = $dbConnexion->prepare($query); //prepare query
        $queryResult = $statement->execute(); //execute query
    }
    $dbConnexion = null; //close database connexion
    return $queryResult;
}

/**
 * this function is designed to execute a query received as parameter
 * @param string $query : SQL command starting with DELETE
 * @return bool|null : $statemement->execute() returns true if the delete was successfull 
 */
function executeQueryDelete($query)
{
    $queryResult = null;

    $dbConnexion = openDBConnexion();
    if ($dbConnexion != null) {
        $statement = $dbConnexion->prepare($query);
        $queryResult = $statement->execute();
    }
    $dbConnexion = null;
    return $queryResult;
}
#endregion


/**
 * this function is design to open a database connexion with the SQL server
 * @return PDO
 * @throws DatabaseException
 */
function openDBConnexion()
{
    $tempDbConnexion = null;

    $sqlDriver = 'mysql';
    $hostname = 'localhost';
    $port = 3306;
    $charset = 'utf8';
    $dbName = 'news';
    $userName = 'root';
    $userPwd = '';
    $dsn = $sqlDriver . ':host=' . $hostname . ';dbname=' . $dbName . ';port=' . $port . ';charset=' . $charset;


    //if it's not like that, everything crashes, rly...
    try {
        $tempDbConnexion = new PDO($dsn, $userName, $userPwd);
    } catch (PDOException $exception) {
        require_once "model/exceptions/DatabaseException.php";
        throw new FailedToReachDatabaseException();
    }

    return $tempDbConnexion;
}
