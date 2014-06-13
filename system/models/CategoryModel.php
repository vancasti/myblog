<?php 
/**
 * Generates output for the Home view
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
 
 class CategoryModel extends Model 
 {
 	
	/**
     * Add a new user
     *
     * @return boolean true if success
     */
 	public function create($valor)
	{
		$sql = "INSERT categories (valor)
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
        $sql = "SELECT * FROM categories 
                LIMIT :first_element, :last_element";
        
        $stmt = self::$db->prepare($sql);
        $stmt->bindParam(':first_element', $first_element, PDO::PARAM_INT);
        $stmt->bindParam(':last_element', $last_element, PDO::PARAM_INT);
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        
        // var_dump($categories);
        
        return $categories;
    }
    
    /**
     * Add a new user
     *
     * @return boolean true if success
     */
    public function getAll()
    {
        $sql = "SELECT * FROM categories";
        
        $stmt = self::$db->prepare($sql);
        $stmt->execute();
        $categories = $stmt->fetchAll();
        $stmt->closeCursor();
        
        return $categories;
    }
	
	/**
     * Add a new user
     *
     * @return boolean true if success
     */
	public function numFindElements()
	{
		$sql = "SELECT COUNT(*) FROM categories";
        
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
	public function update($object)
	{
		$sql = "UPDATE categories 
		        SET valor = :valor
		        WHERE id = :id";
        
        $stmt = self::$db->prepare($sql);
        
        return $stmt->execute($object);
	}
	
	/**
     * Delete a category
     *
     * @return boolean true if success
     */
	public function delete($id)
	{
		$sql = "DELETE FROM categories
                WHERE id = :id";
        
        $stmt = self::$db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        
        return $stmt->execute();
	}
 }
?>