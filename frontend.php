<!DOCTYPE html>  
<html> 
	<head> 
		<title> Fetch Data From Database </title> 
	</head> 
	<body bgcolor="#a3a3c2"> 
	<table align="center" border="2px"> 
	<tr> 
		<th colspan="9" height="100%" width="110%">
		<h2 style="color: red; background-color: lightpink; font-family: cursive;" >Student Records..🪄</h2>
		</th> 
		</tr>
			  <th width="10.22%"> Students Name </th> 
			  <th width="8.22%"> Grade </th> 
			  <th width="6%"> Section </th> 
			  <th width="9%"> Class Teacher </th> 
			  <th width="12.22%"> Enquiry </th> 
			  <th width="12.22%"> Country </th> 
			  <th width="12.22%"> States </th> 
			  <th width="12.22%"> Cities </th> 
			  <th width="12.22%">Operations</th>
			  
		

	<?php
	include "connection.php"; // Using database connection file here

	$lj = "SELECT f.id, f.myname,f.mygrade,f.mysection,f.myclassteacher,f.myenquiry, c.name as country, s.name as states, ci.name as city FROM form f 
		LEFT JOIN countries c
		ON f.country = c.id
		LEFT JOIN states s 
		ON f.state = s.id
		LEFT JOIN cities ci 
		ON f.city = ci.id"; 

	$records = $db->query($lj);
	 // fetch data from database
	while($studentname = $records->fetch_array())

	{
	?>
		<tr> 
		<td><?php echo $studentname['myname']; ?></td> 
		<td><?php echo $studentname['mygrade']; ?></td> 
		<td><?php echo $studentname['mysection']; ?></td> 
		<td><?php echo $studentname['myclassteacher']; ?></td>
		<td><?php echo $studentname['myenquiry']; ?></td>
		<td><?php echo $studentname['country']; ?></td>
		<td><?php echo $studentname['states']; ?></td>
		<td><?php echo $studentname['city']; ?></td> 
		<td><a href="update.php?id=<?php echo $studentname['id'];?>" type="button" style="cursor: pointer;">Edit</a><button type="button" style="cursor: pointer;">Delete</button></td>
		</tr> 

		
		<?php
	}
		?>



</table>
<?php mysqli_close($db); // Close connection ?>
</body>
</html>