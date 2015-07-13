<script type="text/javascript">
	function confDelete(){
		$val = window.confirm("Are Your Sure: ");
		if($val){
			return true;
		}
		else 
		{
			return false;
		}
	}
</script>


<?php
class Crud {
	
	private $connection;
	
	public $name;
	public $email;
	public $pass;
	
	public function __construct($con){
		$this->connection = $con;
	}
	
	public function insertData($name,$email,$pass){
		
		try {
			$query = "INSERT INTO registration(name,email,pass) VALUES(:name,:email,:pass)";
			$statement = $this->connection->prepare($query);
			
			$statement->bindparam(":name",$name);
			$statement->bindparam(":email",$email);
			$statement->bindparam(":pass",$pass);
								
			$statement->execute();
			return true;
			
			
		}catch (PDOException $ee){
			
			echo $ee->getMessage();
			return false;
		}
		
		
	}  /* End Insert Data Method  */
	
	
	public function emailCheck($email){

		$query = "SELECT * FROM registration WHERE email=:email";
		$stmt = $this->connection->prepare($query);
		$stmt->bindparam(":email",$email);
		$stmt->execute();
		
		return true;
		
	}
		
	public function selectData(){
		
	 try{	
			
	 		$query = "SELECT * FROM registration";
			$statement = $this->connection->prepare($query);
			$statement->execute();
			
			if($statement->rowCount() > 0){
				while($takingRow = $statement->fetch(PDO::FETCH_ASSOC)){
?>		
					<tr>
						<td><?php echo $takingRow['id']; ?></td>
						<td><?php echo $takingRow['name']; ?></td>
						<td><?php echo $takingRow['email']; ?></td>
						<td><?php echo $takingRow['pass']; ?></td>
						<td><a href="Edit.php?id=<?php echo $takingRow['id'] ?>">Edit</a> || <a href="Delete.php?id=<?php echo $takingRow['id'] ?>" onclick="confDelete(this)">Delete</a> </td>
						
					</tr>	

<?php 					
				}
				
			}else {

				echo "Nothind Found !!";				
			
			}
			
			
	   }catch(PDOException $e){
	   		
	   		echo $e->getMessage();
	   }
	   
	}/* End SelectData() method  */	 
	
	
	
	public function selectSpecificData($id){
		$query = "SELECT
                name, email, pass
            FROM
                registration
            WHERE
                id = ?
            LIMIT
                0,1";

		$stmt = $this->connection->prepare( $query );
		$stmt->bindParam(1, $id);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		
		$this->name = $row['name'];
		$this->email = $row['email'];
		$this->pass = $row['pass'];
			
	}
	
		
	public function updateData($id, $name, $email, $pass){
		$query = "UPDATE 'registration'
		SET 'name' = ?,
			'email'= ?,
			'pass' = ?,
		
		WHERE 'id' = ?";


	  /*
		$query = "UPDATE
                registration
            SET
                name = :name,
                email = :email,
                pass = :pass,
                
            WHERE
                
				id = :id";
		*/
		
		
		$stmt = $this->connection->prepare($query);
		
		$stmt->bindParam(2, $name);
		$stmt->bindParam(3, $email);
		$stmt->bindParam(4, $pass);
		
		$stmt->bindParam(1, $id);
		
		// execute the query
		if($stmt->execute()){
			return true;
		}else{
			return false;
		} 
	}

	public function deleteData($id){
		$query = "DELETE FROM registration WHERE id = ?";
		$stmt = $this->connection->prepare($query);
		$stmt->bindParam(1, $id);
	
		if($result = $stmt->execute()){
			return true;
		}else{
			return false;
		}
	
	}

}	/* End Class  */
