<?php 
/**
 * Generates output for the Home view
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
 
 class TagModel extends Model 
 {
    
    /**
     * Add a new user
     *
     * @return boolean true if success
     */
    public function create($valor)
    {
        $sql = "INSERT tags (valor)
                VALUES (:valor)";
        
        $stmt = self::$db->prepare($sql);
        $stmt->bindParam(':valor', $valor);
        
        return $stmt->execute();
    }
    
    /**
     * Add a new user
     *
     * @return boolean true if success
     */
    public function getByPagination($first_element, $last_element)
    {
        $sql = "SELECT * FROM tags 
                LIMIT :first_element, :last_element";
        
        $stmt = self::$db->prepare($sql);
        $stmt->bindParam(':first_element', $first_element, PDO::PARAM_INT);
        $stmt->bindParam(':last_element', $last_element, PDO::PARAM_INT);
        $stmt->execute();
        $tags = $stmt->fetchAll();
        $stmt->closeCursor();
        
        // var_dump($tags);
        
        return $tags;
    }
    
    /**
     * Add a new user
     *
     * @return boolean true if success
     */
    public function getAll()
    {
        $sql = "SELECT * FROM tags";
        
        // $db = DataBase::instance();
        // $db->connect();
        // $stmt = $db->prepare($sql);
        
        $stmt = self::$db->prepare($sql);
        $stmt->execute();
        $tags = $stmt->fetchAll();
        $stmt->closeCursor();
        
        return $tags;
    }
    
    /**
     * Add a new user
     *
     * @return boolean true if success
     */
    public function numFindElements()
    {
        $sql = "SELECT COUNT(*) FROM tags";
        
        $stmt = self::$db->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchColumn();
        $stmt->closeCursor();
        
        return $row;
    }
    
    /**
     * Update a category
     *
     * @return boolean true if success
     */
    public function update($id,$valor)
    {
        $sql = "UPDATE tags 
                SET valor = :valor
                WHERE id = :id";
        
        $stmt = self::$db->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':valor', $valor);
        
        return $stmt->execute();
    }
    
    /**
     * Delete a category
     *
     * @return boolean true if success
     */
    public function delete($id)
    {
        $sql = "DELETE FROM tags
                WHERE id = :id";
        
        $stmt = self::$db->prepare($sql);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }
 }
?>