<!doctype html>
<html>
<head>
       <meta name="viewport" content="width=device-width, initial-scale="">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head> 
  
		 <body>
    <div class="col-md-2">
     
                <div class="span10 offset1">
                    <div class="row">
                    </div>
                     
                    <form class="form-horizontal" action="deletephp.php" method="post">
                      <input type="hidden" name="ID" value="<?php echo $ID;?>"/>
                      
 </form></div> 
</body>
</html>
<?php 

	$user = 'root';
	$pass ='';
	$db = 'bs';
	$table='data';

	  if ($_SERVER["REQUEST_METHOD"] == "GET") {
					
					$id = ($_GET['ID']);
		
						
		     $con = mysqli_connect('localhost',$user,$pass,$db) or die(mysql_error());
					mysqli_query($con,"delete from data where ID = '$id'") or die ('error querying database');
		//		     echo "product has been Deleted";
			 $result=mysqli_query($con,"select * from data");

	   

		mysqli_close($con);

         header('Location:main.php');
 }
?>