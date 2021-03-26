<?php
	session_start();
	require_once('security.php');
?> 
<!DOCTYPE html>
<html>
<head>
	<title>La puerta se abre</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Bilbo&display=swap" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="../style/main.css">
	<link rel="stylesheet" type="text/css" href="../style/test.css">
</head>
<body>

	<div class="jumbotron bg-info text-light">
		
		<?php
			echo '
				<h1>Welcome '.$_SESSION["username"].'</h1>
				
				<div class="float-left">
			
					<button class=" btn btn-info border border-light">
						<a class="text-decoration-none text-light" href="../index.php">Home</a>
					</button>

					<button class=" btn btn-info border border-light">
						<a class="text-decoration-none text-light" href="logout.php">Log out</a>
					</button>
				</div>


				';

		?>
			
		
		

		
	</div>
	<div class="container">
		
		
		
		
	</div>
	

</body>
</html>