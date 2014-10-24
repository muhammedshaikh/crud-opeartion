
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale="">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	

</head> 
      <div class="col-md-2">
<body>	 

<?php
$user = 'root';
$pass ='';
$db ='bs';
$table='data';

	   $ID ="";
	   $Name="";
	   $Phone="";
	   $Email=""; 
	   
	if ($_SERVER["REQUEST_METHOD"]== "GET")  {
		$id = ($_GET['ID']);
		$con = mysqli_connect('localhost',$user,$pass,$db) or die("Unable to connect");
	 	$record = mysqli_query($con,"SELECT * from data where ID = '$id' ORDER by Name");
		          
		 	
				
	while($row = mysqli_fetch_array($record)){
		$ID    = $row['ID'];
		$Name  = $row['Name'];
		$Phone = $row['Phone'];
		$Email = $row['Email'];
				
			
			   mysqli_close($con);
	
			}
		
	}

     if ($_SERVER["REQUEST_METHOD"]== "POST")  {
           $ID    = ($_POST['ID']);
		   $Name  = ($_POST['Name']);
		   $Phone = ($_POST['Phone']);
		   $Email = ($_POST['Email']);

			   $con = mysqli_connect('localhost',$user,$pass,$db) or die("Unable to connect");
			   mysqli_query($con,"UPDATE data SET Name='$Name',Phone='$Phone',Email='$Email' WHERE ID='$ID'");
			   $result=mysqli_query($con,"select *from data");
			   
			   header('Location:main.php');
			   mysqli_close($con);

	}
?>


  
	<form method="post" action="<?php echo
htmlspecialchars($_SERVER["PHP_SELF"]);?>" name="form" onsubmit="return validateForm()">
          <input type="hidden" class="form-control" name="ID"  value='<?php echo $ID ?>' id="myform">
       <br>
          <label for="Name">Name:</label>
          <input type="text" class="form-control" name="Name"  value='<?php echo $Name; ?>' id="myform1">
       <br>
          <label for="Phone number"> Phone number: </label> 
          <input type="text" class="form-control" name="Phone" value='<?php echo $Phone; ?>' id="myform2">
       <br>
          <label for="Email"> E-mail: </label>
          <input type="text" class="form-control" name="Email"   value='<?php echo $Email; ?>' id= "myform3">
       <br>
        <button type="submit" class="btn btn-success">Update</button>
    </form></div>
	   <br>
     
	 
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	





</body>
</html>