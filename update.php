<?php
require("connection.php");

$query = "SELECT f.id, f.myname,f.mygrade,f.mysection,f.myclassteacher,f.myenquiry, c.name as country, s.name as states,  ci.name as city FROM form f 
    LEFT JOIN countries c
    ON f.country = c.id
    LEFT JOIN states s 
    ON f.state = s.id
    LEFT JOIN cities ci 
    ON f.city = ci.id
    WHERE f.id = '".$_GET['id']."' "; 

    

    $records = $db->query($query);
    $array = $records->fetch_array();
?>
<!DOCTYPE html>  
<html> 
	<head> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<title> edit delete </title> 
	
	</head> 
	<body> 

	<form action="query.php" method="POST">
<div align="center">
     Student Name: 
     <input type="text" name="myname" value="<?php echo $array['myname'] ?>">
     </div> </br>

     <div align="center">
     Grade: <input type="text" name="mygrade" value="<?php echo $array['mygrade'] ?>">
     </div> </br>

     <div align="center">
     Section 
     <input type="text" name="mysection" value="<?php echo $array['mysection'] ?>">
     </div></br>

     <div align="center">
     Class Teacher <input type="text" name="myclassteacher" value="<?php echo $array['myclassteacher'] ?>">
     </div></br>

     <div align="center">
     Enquiry <input type="text" name="myenquiry" value="<?php echo $array['myenquiry'] ?>">
     </div></br>

     <div align="center">
        <select name="country">
            <option>Select Country</option>
            
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
     <div align="center" >
        <select name="state" id="state">
        <option>Select States</option>
        </select>
    </div>
    </br>
     <div align="center">
        <select name="city">
             <option>Select city</option>
        </select>
     </div></br>

<div align="center" style="padding: 2px 50px; margin:50px;">
  <button type="submit" name="edit_it" name="update" style="font-size: 1.5rem; background-color: grey; border: 2px solid white; border-radius: 10px; cursor: pointer; color: white;">Update</button>
<input type="hidden" name="user_id" value="<?php echo $_GET['id'] ?>">
</div>
</form>
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
});
</script>

</body>
</html>

