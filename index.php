<?php
	require_once("php/mysql.php");
   	session_start();
   	
  
   	
  

   	$_SESSION["login_status"] = -1;
	if (($_SESSION["login_status"] != 0)) {
      	$_SESSION["username"] = '';
   		$_SESSION["password"] = '';
   		$_SESSION["dni"] = '';
	    $_SESSION["email"] = '';
	    $_SESSION["phone"] = '';
	    $_SESSION["address"] = '';
	}
    
?>
    <!DOCTYPE>
    <html>

    <head>
        <!-- 
         Silverio Cardona Rodríguez
         ICSE 2019 Técnico Superior en Administración de Sistemas Informáticos en red 
         -->
        <title>Register</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <link type="text/css" rel="stylesheet" href="style/main.css">
        <script type="text/javascript" src="js/main.js"></script>
    </head>

    <body class="bg-light">
        <div class="jumbotron bg-info text-light">
            <i class="fa fa-desktop">MySQL Injection</i>
            <h1>Social Network</h1>
            Eres un crema colega
        </div>

        <div class="container">
	        <div class="row">
	            <div class="offset-md-2 col-md-4">
	                <div class="card border-info">
	                    <div class="card-header">Login</div>
	                    <form method="post" action="index.php">
		                    <div class="card-body text-info">
	                            		
	                            <label for="username"> Nickname: </label>
	                        
	                            <input name="username" type="text" required>
		                                     
		                    </div>
		                    <div class="card-body text-info">
		                    	<label for="password"> Password: </label>
		                    	<input name="password" type="password" required>
		                    	
		                    </div>

		                    <div class="card-footer">
		                        
		                        <button class="btn btn-info" type="submit" name="login"> Login </button>      
		                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">Register</button>
		                            
		                        
		                    </div>
	                    </form>
	                </div>
	               
	            </div>
	            
	            <div class="col-md-6">
	            
		            <?php
		                if (isset($_POST["login"])) {
		                    $_SESSION["username"] = strtolower($_POST["username"]);
		                    $_SESSION["password"] = $_POST["password"];
		                    $username = $_SESSION["username"];
		                    $password = sha1($_SESSION["password"]);
		                    $mysql_session = connect_to_db();
		                    $user = login($mysql_session,$username, $password);
		                    if ($user != -1) {
		                    	$_SESSION["login_status"] = 0;
		                    }
		                    else{
			                		echo 
			                		'
								   		<div class=" alert alert-danger alert-dismissible fade show" role="alert">
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										  <strong>User not found</strong>
										</div>
					                	
					                
							   		';
			                }
			                
		                }
		                if ($_SESSION["login_status"] == 0) {

			                    echo '

				                    <table class="table table-bordered text-secondary table-info">
									  <thead>
									    <tr>
									      	<th scope="col">Nickname</th>
									      	<th scope="col">Session</th>
									    </tr>
									  </thead>
									  <tbody>
									    <tr>
									      	<td>'.$_SESSION["username"].'</td>
									      
											<td>
												<button class="btn btn-info" type="submit">
													<a class = "text-decoration-none text-light" href="php/main.php">Enter</a>
												</button>
												<button class="btn btn-info" type="submit">
													<a class = "text-decoration-none text-light" href="php/logout.php">Logout</a>
												</button>
											</td>

									      
									    </tr>
									  </tbody>
									</table>

			                    ';
			                }
			                
		                 
		            ?>
		            			
	            </div>  
	        </div>
            <div class="row">
            	<div class="offset-md-2 col-md-6">
            		
		            <?php
						if ((isset($_POST["submit"])) /*and ()*/) {
							
						    $_SESSION["username"] = strtolower($_POST["username"]);
						    $_SESSION["password"] = sha1($_POST["password"]);
						    $_SESSION["dni"] = strval($_POST["dni"]);
						    $_SESSION["email"] = strtolower($_POST["email"]);
						    $_SESSION["phone"] = strval($_POST["phone"]);
						    $_SESSION["address"] = $_POST["address"];
						    $username = $_SESSION["username"];
						    $password = $_SESSION["password"];
						    $dni = $_SESSION["dni"];
						    $dni[8] = strtolower($dni[8]);
						    $email = $_SESSION["email"];
						    $phone = $_SESSION["phone"];
						    $address = $_SESSION["address"];
						    $input_data = [$username, $password, $dni, $email, $phone, $address];

						    $mysql_session = connect_to_db();
						    $_SESSION["register_status"] = insert_into_db($mysql_session, $input_data);
						    
							
							
						   		
						    

						}
				    ?>
				</div>
            </div>  
        </div>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
            	<form name="register" onsubmit="return checkPass();" onsubmit="return validateForm()" method="post" action="index.php">
                    <div class="modal-content border-primary text-secondary">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Create user</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body container text-primary">
                            

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="username"> Nickname: </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="username" type="text" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="password"> Password: </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="password" id="password1" minlength=8 onkeyup="return checkPass();" type="password" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="password"> Confirm password: </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="confirm" id="confirm1" onkeyup="return checkPass();" type="password" required>
                                    <span id="confirm-message"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="password"> DNI: </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" name="dni" 
                                    pattern="[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[0-9]{1}[a-z|A-Z]{1}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="password"> Email: </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="email" type="email" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="password"> Phone: </label>
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" name="phone" pattern="[0-9]{3} [0-9]{2} [0-9]{2} [0-9]{2}" placeholder = "600 00 00 00" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="password"> Address: </label>
                                </div>
                                <div class="col-md-6">
                                    <input name="address" type="address" required>
                                </div>
                            </div>
                            
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="submit"> Submit </button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                   
                </form>
            </div>
        </div>


    </body>

    </html>

    