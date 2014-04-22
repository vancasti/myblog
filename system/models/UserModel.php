<?php 
/**
 * Generates output for the Home view
 *
 * @author Victor Castiñeira <vancasti86@gmail.com>
 * 
 */
 
 class UserModel extends Model 
 {
 	
	/**
     * Add a new user
     *
     * @return boolean true if success
     */
 	public function create($name, $email, $password)
	{
		$sql = "INSERT users (nombre, email, password, id_rol)
				VALUES (:nombre, :email, :password, :id_rol)";
		
        $rol = 0;
		$stmt = self::$db->prepare($sql);
		$stmt->bindParam(':nombre', $name);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
        $stmt->bindParam(':id_rol', $rol);
        
		return $stmt->execute();
	}
    
    /**
     * Add a new user
     *
     * @return boolean true if success
     */
    public function login($email, $password)
    {
        $sql = "SELECT * FROM users 
        WHERE email = :email AND password = :password";
        
        $stmt = self::$db->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_OBJ);
        $stmt->closeCursor();
        
        // var_dump($user);
        
        if(!empty($user)) {
            if(!isset($_SESSION))
                session_start(); 
            $_SESSION["id_usuario"] = $user->id;
            $_SESSION["nombre_usuario"] = $user->nombre;
        }
        
        return !empty($user);
    }
	
	/**
     * Add a new user
     *
     * @return boolean true if success
     */
	public function read()
	{
		
	}
	
	/**
     * Add a new user
     *
     * @return boolean true if success
     */
	public function update()
	{
		
	}
	
	/**
     * Add a new user
     *
     * @return boolean true if success
     */
	public function delete()
	{
		
	}
 }
?>