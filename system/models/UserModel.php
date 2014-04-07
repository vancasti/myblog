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
 	public function create($username, $email, $password)
	{
		$sql = "INSERT users (user_id, email, password)
				VALUES (:username, :email, :password)";
		
		$stmt = self::$db->prepare($sql);
		$stmt->bindParam(':username', $username);
		$stmt->bindParam(':email', $email);
		$stmt->bindParam(':password', $password);
		$stmt->execute();
		$stmt->closeCursor();	
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