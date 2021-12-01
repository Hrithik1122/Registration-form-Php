<?php 
require('connection.php');
if(isset($_POST['submit_it'])){
// 	// $servername = "localhost";
// 	// $username = "root";
// 	// $password = ""; 



	
// 	echo "Secussfully connected";

	$studentname = $_POST["myname"];
	$grade = $_POST["mygrade"];
	$section = $_POST["mysection"];
	$classtecher = $_POST["myclassteacher"];
	$enquiry = $_POST["myenquiry"];
	$country = $_POST["country"];
	$state = $_POST["state"];
	$city = $_POST['city'];

	$sql = "INSERT INTO form (myname, mygrade, mysection, myclassteacher, myenquiry,country,state,city) VALUES ('$studentname', '$grade', '$section', '$classtecher','$enquiry','$country','$state','$city')";
	echo $sql;

	if($db->query($sql) == true){
			echo "successfuly inserted";
		}
		else{
			echo "ERROR: $sql <br> $db->error"; 
		}
}

if(isset($_POST['get_state'])){
	$country_id=$_POST['country_id'];

	$sql = "SELECT id,name FROM states WHERE country_id=$country_id order by name";
	$sql2 = $db->query($sql);
	while($rows= $sql2->fetch_array())
	{
		echo "<option value='".$rows['id']."'>".$rows['name']."</option>";
	}
}



if (isset($_POST['get_city'])){
	$states_id=$_POST['state_id'];
	$sql = "SELECT id,name FROM cities WHERE state_id=$states_id order by name";
	$sql2 = $db->query($sql);
	 while($rows=$sql2->fetch_array())
	{
		echo "<option value='".$rows['id']."'>".$rows['name']."</option>";
	}
}

if (isset($_POST['edit_it'])){
	$update = "UPDATE form SET myname='".$_POST['myname']."', mygrade='".$_POST['mygrade']."', mysection='".$_POST['mysection']."', myclassteacher='".$_POST['myclassteacher']."', myenquiry='".$_POST['myenquiry']."',country='".$_POST['country']."', state='".$_POST['state']."', city='".$_POST['city']."' WHERE id='".$_POST['user_id']."'";

$sql = $db->query($update);

// var_dump($sql);
echo "Your data submitted";
// // echo "<pre>";
print_r($rows);
// echo "</pre>";
}

$db->close();

?>