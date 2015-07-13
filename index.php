<?php 
	include_once 'DbConfig.php';
	include_once 'test.class.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="keyword" content="ooop oop CRUD app">
	<meta name="viewport" content="width=device-width, initial-scale=1">
		
	<!--  	***** Style Sheet Linking 	*****	 -->
	
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css.map"> 
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css"> 
	
</head>	
<body>
	<div class="container well-lg">
		<header class="row alert alert-warning text-center">
			<h2>OOP CRUD IMPLEMENTATION</h2>
			<?php 
				$helloObj = new Test();
				$helloObj->testMale();
			?>	
		</header>
		
		 
 		<!-- Main Dropdown Menu  -->
		
		<nav class="navbar">
			<ul class="nav nav-pills">
				<li class="active"><a href="#createForm">Create Form</a></li>
				<li><a href="#">Data Manipulation</a></li>
				
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown"  aria-haspopup="true" aria-expanded="false">ETC<span class="caret"></span></a>
					<ul class="dropdown-menu">
			            <li><a href="#">Action</a></li>
			            <li><a href="#">Setting</a></li>
			            
			        </ul>
				</li>
			</ul>
		</nav>
		
		<!-- Main Container  -->
		
		<div class="mainContainer">
			<div class="bannerImg">
				<img src="img/banner.jpg" alt="Banner Images" class="img-responsive img-thumbnail" style="height:174px; width:900px; ">
			</div>
			<br/>
			<hr/>
			<div class="container contentArea row">
				<div class="leftSide col-sm-8" id="createForm">
					<!--  Registration Form Here -->
					<form class="form form-horizontal" method="POST" action="index.php">
						 <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Name</label>
						    <div class="col-sm-10">
						      <input type="text" name="name" class="form-control" id="inputName" placeholder="Name">
						    </div>
						  </div>
						 <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
						    <div class="col-sm-10">
						      <input type="email" name="email" class="form-control" id="inputName" placeholder="E-mail">
						    </div>
						  </div>
						  
						 <div class="form-group">
						    <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
						    <div class="col-sm-10">
						      <input type="password" name="pass" class="form-control" id="inputName" placeholder="Password">
						    </div>
						  </div>
						  
						  <div class="form-group">
						    <div class="col-sm-offset-2 col-sm-10">
						      <button name="register" type="submit" class="btn btn-default btn-info">Registration</button>
						    </div>
						  </div>
					
					</form>
									
				</div>
			
			</div>		
		</div>
		
		<!-- Registration Action  -->
			<?php 
				if(isset($_POST['register'])){
							
					$name  = $_POST['name'];
					$email = $_POST['email'];
					$pass  = $_POST['pass'];
					if(!empty($name) || !empty($email) || !empty($pass))
					$objCrud->insertData($name,$email,$pass);
					header("location:index.php");
					
				}
						
			?>
		
		<!-- Data Visualization  -->
		<div class="dataVisulize">
			<table class="table table-hover table-bordered">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Password</th>
						<th>Action</th>
					</tr>	
				</thead>
				<tbody>
					
					<?php 
					
						$objCrud->selectData();
					?>	
					 
				</tbody>
				<tfoot>
				
				</tfoot>			
			</table>
		</div>
		
		
		<!--  Footer Area -->
		<footer class="footerCustomize alert alert-info row">
			<div class="leftSide col-sm-4">
				Subscribe Letter
			</div>
			<div class="center col-sm-4">
				&copy;All rights Reserved 
			</div>
			<div class="rightSide col-sm-4">
				Blah Blah Blah
			</div>
		</ >
	
	</div>
	
	
	<!--  Adding Jquery and Bootstrap Library -->
	
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<script>
		function alertConfirm(){
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
	
</body>
</html>	


