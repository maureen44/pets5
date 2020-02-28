<?php
require_once ("config-pets.php");

class Pets5Database
{
    //Connection object or PDO object
    private $_dbh;

    function __construct()
    {
        try {
            //Create a new PDO connection
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //echo "Connected!";

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function allPets()
    {
        //1. Define the query
        $sql = "SELECT * FROM pets5
                ORDER BY name, color, type";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameter

        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    function writePet($pets5) {
        //1. Define the query
        $sql = "INSERT INTO pets5(name, color, type)
                VALUES (:name, :color, :type)";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameter
        $statement->bindParam(':name', $pets5->getName());
        $statement->bindParam(':color', $pets5->getColor());
        $statement->bindParam(':type', $pets5->getType());


        //4. Execute the statement
        $statement->execute();

        //5. Get the result
        $id = $this->_dbh->lastInsertId();
    }
}