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
     * Add a new publication
     *
     * @return boolean true if success
     */
    public function create($object)
    {
        $sql = "INSERT publications (titulo, url, contenido, fcreacion, fpublicacion, id_autor, id_categoria)
                VALUES (:titulo, :url, :contenido, :fcreacion, :fpublicacion, :id_autor, :id_categoria)";
                
        $idInsertedRow = 0;
        
        try {    
            $stmt = self::$db->prepare($sql);
            $stmt->execute($object);
            $idInsertedRow = self::$db->lastInsertId(); 
        } catch (PDOExeption $e) {
            print "Error!: " . $e->getMessage() . "</br>"; 
        }
        
        return $idInsertedRow;
        
    }
    
      /**
     * Add associated tags to a publication
     *
     * @return boolean true if success
     */
    public function insertAssociatedTag($id_publication, $id_tag)
    {
        $sql = "INSERT publications_tags (id_publication, id_tag)
                VALUES (:id_publication, :id_tag)";
                
        try {    
            $stmt = self::$db->prepare($sql);
            $stmt->bindParam(':id_publication', $id_publication, PDO::PARAM_INT);
            $stmt->bindParam(':id_tag', $id_tag, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOExeption $e) {
            print "Error!: " . $e->getMessage() . "</br>"; 
        }
        
    }
    
      /**
     * Get associated tags to a publication
     *
     * @return boolean true if success
     */
    public function getAssociatedTags($array_ids)
    {
        $sql = "SELECT id_publication,tags.valor
                FROM publications_tags
                LEFT JOIN tags
                ON( publications_tags.id_tag = tags.id )";
                
        if(is_array($array_ids)) 
            $whereSQL = "WHERE id_publication IN (".implode(',', $array_ids).")";
        else 
            $whereSQL = "WHERE id_publication=" .$array_ids ;    
        
        $sql.=$whereSQL;
                
        try {    
            $stmt = self::$db->prepare($sql);
            $stmt->execute();
            $tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
        } catch (PDOExeption $e) {
            print "Error!: " . $e->getMessage() . "</br>"; 
        }
        
        return $tags;    
    }
    
    /**
     * Add a new user
     *
     * @return boolean true if success
     * Cambiar last_element por num_elements
     */
    public function getByPagination($first_element, $last_element)
    {
        $sql = "SELECT publications.id,titulo,url,contenido,fcreacion,fmodificacion,fpublicacion,categories.valor as categoria, nombre as autor
                FROM publications 
                LEFT JOIN categories
                    ON( publications.id_categoria = categories.id ) 
                LEFT JOIN users
                    ON( publications.id_autor = users.id )
                ORDER BY fpublicacion DESC
                LIMIT :first_element, :last_element";
        
        try {
            $stmt = self::$db->prepare($sql);
            $stmt->bindParam(':first_element', $first_element, PDO::PARAM_INT);
            $stmt->bindParam(':last_element', $last_element, PDO::PARAM_INT);
            $stmt->execute();
            $publications = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $stmt->closeCursor();
        } catch (PDOExeption $e) {
            print "Error!: " . $e->getMessage() . "</br>"; 
        }
        
        return $publications;
    }
    
     /**
     * Add a new user
     *
     * @return boolean true if success
     * Cambiar last_element por num_elements
     */
    public function getByID($id)
    {
        $sql = "SELECT * FROM publications 
                WHERE id=:id";
        
        $stmt = self::$db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $publication = $stmt->fetch();
        $stmt->closeCursor();
        
        return $publication;
    }
    
     /**
     * Add a new user
     *
     * @return boolean true if success
     * Cambiar last_element por num_elements
     */
    public function getByURL($url)
    {
        $sql =  "SELECT publications.id,titulo,url,contenido,fcreacion,fmodificacion,
                fpublicacion,categories.valor as categoria, nombre as autor,email
                FROM publications 
                LEFT JOIN categories
                    ON( publications.id_categoria = categories.id ) 
                LEFT JOIN users
                    ON( publications.id_autor = users.id )
                WHERE url=:url";
        
        $stmt = self::$db->prepare($sql);
        $stmt->bindParam(':url', $url);
        $stmt->execute();
        $publication = $stmt->fetch();
        $stmt->closeCursor();
        
        return $publication;
    }
    
    
    /**
     * Add a new user
     *
     * @return boolean true if success
     */
    public function getAll()
    {
        $sql = "SELECT * FROM publications";
        
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
     * Update a publication
     *
     * @return boolean true if success
     */
    public function update($object)
    {
        $sql = "UPDATE publications
                SET titulo=:titulo, url=:url, contenido=:contenido, fpublicacion=:fpublicacion, id_autor=:id_autor, id_categoria=:id_categoria
                WHERE id = :id";
                
        try {    
            $stmt = self::$db->prepare($sql);
            $output = $stmt->execute($object);
        } catch (PDOExeption $e) {
            print "Error!: " . $e->getMessage() . "</br>"; 
        }
        
        return $output;
        
    }
    
    /**
     * Delete a publication
     *
     * @return boolean true if success
     */
    public function delete($id)
    {
        $sql1 = "DELETE FROM publications_tags
                WHERE id_publication = :id";        
        
        $sql2 = "DELETE FROM publications
                WHERE id = :id";
        
        try{
            self::$db->beginTransaction();
            $stmt = self::$db->prepare($sql1);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            $stmt = self::$db->prepare($sql2);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            return self::$db->commit();
            
        } catch(PDOExeption $e) {
            self::$db->rollBack();
            print "Error!: " . $e->getMessage() . "</br>"; 
        }
    }
 }
?>