<?php

/**
 * Creates a set of generic database interaction methods
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
class DataBase
{
    private static $instance = null;
    public static $db;

    static function instance() {
        if(is_null(self::$instance)) { self::$instance = new self(); } 
            return self::$instance;
    }
	
    /**
     * Creates a PDO connection to MySQL
     *
     * @return boolean Returns TRUE on success (dies on failure)
     */
    public function connect ( ) {
        $dsn = 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST;
        
        try {
            self::$db = new PDO($dsn, DB_USER, DB_PASS);
        } catch (PDOExeption $e) {
            die("Couldn't connect to the database.");
        }

        return TRUE;
    }
    
    public function prepare ($sql) {
        return self::$db->prepare($sql);
    }
    
}
?>
