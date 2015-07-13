					<?php
					include_once 'crud.class.php';
					include_once 'DbConfig.php';
					
					$id = $_GET['id'];
					//echo $id;exit;
					
					if(isset($_POST['register'])){
						$name = $_POST['name'];
						$email = $_POST['email'];
						$pass = $_POST['pass'];
																		
						if(!empty($name) || !empty($email) || !empty($pass))
						$objCrud->updateData($id, $name, $email, $pass);
						header("location:index.php");
					}
															
					?>
					<?php 
						$getData = new Crud($con);
						$getData->selectSpecificData($id);
											
					?>
					
					
					<form class="form form-horizontal" method="POST" action="index.php">
						 <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
						    <div class="col-sm-10">
						      <input type="text" value ="<?php echo $getData->name; ?>" name="name" class="form-control" id="inputName" placeholder="Name">
						    </div>
						  </div>
						 <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
						    <div class="col-sm-10">
						      <input type="email" value ="<?php echo $getData->email; ?>" name="email" class="form-control" id="inputName" placeholder="E-mail">
						    </div>
						  </div>
						  
						 <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
						    <div class="col-sm-10">
						      <input type="password" value ="<?php echo $getData->pass; ?>" name="pass" class="form-control" id="inputName" placeholder="Password">
						    </div>
						  </div>
						  
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button name="register" type="submit" class="btn btn-default btn-info">Registration</button>
						    </div>
						  </div>
					
					</form>