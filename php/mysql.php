<?php

	function connect_to_db(){
		#Yo use MariaDB, que usamos con sergio
		$servername = "localhost:3307";
		$username = "root";
		$password = "root";
		$db = "actividad_8";
		// Create connection
		$conn = new mysqli($servername, $username, $password, $db);
		// Check connection
		if ($conn->connect_error) {
			die("Connection failed: " . $conn->connect_error);
		}
		return $conn;
	}

	function find_duplicates($conn, $user_data){
		$sql = "
			SELECT * FROM registered_users 
			WHERE nickname = '".$user_data[0]."' 
			OR dni = '".$user_data[2]."'
			OR phone = '".$user_data[4]."';";
		$data = $conn->query($sql);
		
		if ($data->num_rows > 0) {
			while($row = $data->fetch_assoc()) {
				if ($row["nickname"] == $user_data[0] OR $row["dni"] == $user_data[2] OR $row["phone"] == $user_data[4]) {
					return -1;
				}
			}
		} 
		else {
		   	return 0;
		}

		$conn->close();	
	}

	function insert_into_db($conn,$data){

		
		

		$sql = "

			INSERT INTO registered_users (nickname, passW, dni, email, phone, address)
			VALUES ('".$data[0]."', '".$data[1]."','".$data[2]."', '".$data[3]."','".$data[4]."', '".$data[5]."');
		";

		
		if (find_duplicates($conn, $data) == 0) {

			if ($conn->query($sql) === TRUE) {
				echo '
					
                		
        	
							<div class="alert alert-info alert-dismissible fade show" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							  <strong>New user created successfully</strong>
							</div>
        				
                	
				';
				return 0;
			} 
			else {

				echo '

					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					  <strong>Error to register new user</strong>
					</div>
				';
				return -1;
			}
		}
		else{
			echo '
				
        	
					<div class="alert alert-danger alert-dismissible fade show" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					  <strong>Error: Some data may have already been registered</strong>
					</div>
				';
			
			return -2;
		}

		$conn->close();
	}

	function login($conn, $username, $password){
		$sql = "
			SELECT * FROM registered_users 
			WHERE nickname LIKE '".$username."' 
			AND passW = '".$password."';";
		$data = $conn->query($sql);
		
		if ($data->num_rows > 0) {
			while($row = $data->fetch_assoc()) {
				if ($row["nickname"] == $username AND $row["passW"] == $password) {
					return $row;
				}
			}
		} 
		else {

		   	return -1;
		}

		$conn->close();	
	}

?>