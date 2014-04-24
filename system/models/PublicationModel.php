<?php 
/**
 * Generates output for the Home view
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
 
 class PublicationModel extends Model 
 {
    
    /**
     * Add a new user
     *
     * @return boolean true if success
     */
    public function create($titulo, $contenido, $fpublicacion, $id_categoria)
    {
        $sql = "INSERT publications (titulo, url, contenido, fcreacion, fmodificacion, fpublicacion, id_autor, id_categoria)
                VALUES (:titulo, :url, :contenido, :fcreacion, :fmodificacion, :fpublicacion, :id_autor, :id_categoria)";
        
        $stmt = self::$db->prepare($sql);
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':contenido', $contenido);
        $stmt->bindParam(':fpublicacion', $fpublicacion);
        $stmt->bindParam(':id_categoria', $id_categoria);
        
        return $stmt->execute();
    }
    
    /**
     * Add a new user
     *
     * @return boolean true if success
     */
    public function getByPagination($first_element, $last_element)
    {
        $sql = "SELECT * FROM publications 
                LIMIT :first_element, :last_element";
        
        $stmt = self::$db->prepare($sql);
        $stmt->bindParam(':first_element', $first_element, PDO::PARAM_INT);
        $stmt->bindParam(':last_element', $last_element, PDO::PARAM_INT);
        $stmt->execute();
        $publications = $stmt->fetchAll();
        $stmt->closeCursor();
        
        // var_dump($publications);
        
        return $publications;
    }
    
    /**
     * Add a new user
     *
     * @return boolean true if success
     */
    public function getAll()
    {
        $sql = "SELECT * FROM publications";
        
        // $db = DataBase::instance();
        // $db->connect();
        // $stmt = $db->prepare($sql);
        
        $stmt = self::$db->prepare($sql);
        $stmt->execute();
        $publications = $stmt->fetchAll();
        $stmt->closeCursor();
        
        return $publications;
    }
    
    /**
     * Add a new user
     *
     * @return boolean true if success
     */
    public function numFindElements()
    {
        $sql = "SELECT COUNT(*) FROM publications";
        
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
        $sql = "UPDATE publications 
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
        $sql = "DELETE FROM publications
                WHERE id = :id";
        
        $stmt = self::$db->prepare($sql);
        $stmt->bindParam(':id', $id);
        
        return $stmt->execute();
    }
 }
?>