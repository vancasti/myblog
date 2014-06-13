<?php

/**
 * Creates a set of generic database interaction methods
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
abstract class Model
{
    public static $db;

    /**
     * Creates a PDO connection to MySQL
     *
     * @return boolean Returns TRUE on success (dies on failure)
     */
    public function __construct( ) {
        $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;
        
        try {
            $driver_options = array(
               PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
               PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
               PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            );
            
            self::$db = new PDO($dsn, DB_USER, DB_PASS, $driver_options);
            
        } catch (PDOExeption $e) {
            die("Couldn't connect to the database.");
        }

        return TRUE;
    }
	
}
?>