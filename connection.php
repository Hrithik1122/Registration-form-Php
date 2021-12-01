<?php

$db = new mysqli("localhost","root","root","student_form");

if(!$db)
{
    die("Connection failed: " .$db->connect_error);
}
else{
	// echo "successsfully connected";
}

?>