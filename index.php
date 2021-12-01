<!DOCTYPE html>
<html>
<head>
<?php
require('connection.php');
?>
	<meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<title>Trip Form</title>
</head>
<body>

<img src="abc.jpg"          
style="width: 100%; height: 100%; position:absolute; z-index: -1; top: 0%; left: 0%;">

<form action="query.php" method="post">

    <!-- HTML+PHP basic method to implement it! 
        And we will learn how to store data in Server
        
        Filename:- basic2.php  ,  db.php
        
        To open server on browser http://localhost:8080/phpmyadmin/-->
    </br>
	<h3 align="center" style="font-family: fantasy;"><font size="6"> Summer Trip to New York🗽</font></h3>

	<div align="center">
     Student Name: 
     <input type="text" name="myname">
     <!-- <input type="Name" name="myname"> -->
     </div> </br>

     <div align="center">
     Grade: <input type="text" name="mygrade">
     </div> </br>

     <div align="center">
     Section 
     <input type="number" name="mysection" >
     <!-- oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="2" -->
     </div></br>

     <div align="center">
     Class Teacher <input type="text" name="myclassteacher">
     </div></br>

     <div align="center">
     Enquiry <input type="text" name="myenquiry">
     </div></br>

     
<div align="center"><font color="black">Country:</font>
<select name="country" id="country">
<option value="">Select country</option>
<?php
$sql = " SELECT * FROM countries";
$sql2 = mysqli_query($db,$sql);
while ($rows=mysqli_fetch_array($sql2))
 {
    echo "<option value='".$rows['id']."'>".$rows['name']."</option>"; 
}
?>
</select>
</div>
<br><br>

<div align="center"><font color="black">State:</font>
<select id="state" name="state">
<option value="">Select State</option>
</select>
</div>
<br><br>

<div align="center"><font color="black">City:</font>
<select id="city" name="city">
<option value="">Select City</option>
</select>

</div>
<div align="center" style="padding: 2px 50px; margin:50px;">
  <input type="submit" id="unique" value="Submit Now" name="submit_it" style="font-size: 1.5rem; background-color: grey;
    border: 2px solid white; border-radius: 10px; 
    cursor: pointer; color: white;">
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script>

$(document).ready(function() {
    $("#country").change(function(){

        var country_id=$(this).val();
        // alert(country_id);
        $.ajax({
            url:"query.php",
            method:"post",
            data:{"get_state":true,"country_id":country_id},
            datatype:"html",
            success:function(res){
                $("#state").html(res);
            }
        });
    });

$('#state').change(function() {
    var state_id=$(this).val();
    // alert (state_id);
    $.ajax({
        url:"query.php",
        method:"post",
        data:{"get_city":true,"state_id":state_id},
        datatype:"html",
        success:function(res){
            console.log(res);
            $("#city").html(res);
        }
    });


});
swal ("Welcome🙏🏻", "Please fill the details!", "success");
});


</script>
     
</table>
</form>
</body>
</html>