<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Case</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  </head>

  <body>
    <div class="container">
      <div class="jumbotron">
        <h1>Crud Operation</h1>      
      </div>
	  	<a input type ="btn" class="btn btn-success"  href="bs.php">Add</a> 

    </div>
	
      
 <?php
$user = 'root';
$pass ='';
$db ='bs';
$table='data';

     $con = mysqli_connect('localhost',$user,$pass,$db) or die("Unable to connect");
     $result=mysqli_query($con,"select *from data ORDER by Name");
	 

	    echo '<div class="container"><table align="center" class="table table-bordered table-stripted table-hover">
  <tr>
   <th>ID</th>
   <th> Name </th>
   <th>number</th>
   <th> Email </th>
   <th>Action </th>
  </tr>';
  
while($row = mysqli_fetch_array($result)){
	 echo "<tr>";
	 echo "<td class='primary'>" .  $row ['ID']    ."</td>";
	 echo "<td class='success'>" .  $row  ['Name']. "</td>";
	 echo "<td class='danger'>" .  $row ['Phone']."</td>";
	 echo "<td class='warning'>" .  $row['Email']. "</td>"; 
     echo '<td class="col-md-4">';
     echo '<a  href="deletephp.php?ID='.$row['ID'].'"><span class="glyphicon glyphicon-remove"></span></a> &nbsp &nbsp'; 
     echo '<a  href="update.php?ID='.$row['ID'].'"><span class="glyphicon glyphicon-pencil "></span></a>'; 


     echo "</td>";
	 echo "</tr>";
}
	  echo'</table></div>';
	  

	  
	if ($_SERVER["REQUEST_METHOD"]== "POST")  {

	   $ID ="";
	   $Name="";
	   $Phone="";
	   $Email="";

	 $ID =($_POST["ID"]);
	 $Name =  ($_POST["Name"]);
	 $Phone =  ($_POST["Phone"]);
	 $Email= ($_POST["Email"]);
	 
	 $con = mysqli_connect('localhost',$user,$pass,$db) or die("Unable to connect");
	 
     mysqli_query($con,"INSERT INTO data VALUES ('$ID', '$Name', '$Phone', '$Email')")or die("hhhhhh");
	
	
  }

	 // header('Location:bs.php');


?>
</body>
</html>		