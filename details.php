<?php

//including the database connection file
    $host="localhost";
    $dbUsername="root";
    $dbpassword="";
    $dbname="bank";
/// Create a connection
    $conn= new mysqli($host,$dbUsername,$dbpassword,$dbname);
/// for error occurs in connection
    
    if (mysqli_connect_error()) {
      die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
    }
?>
<!DOCTYPE HTML>
<HTML>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <style type="text/css">
body{
  background-color:lightgrey;
  background-repeat:no-repeat;
  background-size:cover;
 }
 table{
	 position:"center";
	 left:800%;
	 width:100%;
	 color:black;
 }
 @media screen and (max-width:500px) {
 body{
	 background-color:lightgrey;
  background-repeat:no-repeat;
  background-size:cover;
  text-align:center;
 }
 table{
	 position:"center";
	 left:800%;
	 width:100%;
	 color:black;
 }
 

 
 }
 </style>
 </head>
 </html>

<body>
			<?php
			ini_set('error_reporting',E_ALL & ~E_NOTICE );
				$ID = $_GET['ID'];
				$result=mysqli_query($conn,"SELECT name,id,email,amount FROM customer WHERE name='". $ID ."' ");
			?>
	<div class="data">
		<table class="table" >
			<thead>	
			<tr>
			<th style="text-align: center;font-size: 20px;">CUSTOMER DETAILS<br><br><br></th>	
			</tr>
			</thead>
			<tbody>
				<?php
				while($res = mysqli_fetch_array($result)) {     
    				echo "<tr>";
    				echo "<td style=\"text-align:center;\"><b>CUSTOMER NAME</b><br><br>".$res['name']."<br><br><br></td>";
    				echo "<br>";
    				echo "</tr>";
					echo "<tr>";
    				echo "<td style=\"text-align:center;\"><b>CUSTOMER ID</b><br><br>".$res['id']."<br><br><br></td>";
    				echo "<br>";
    				echo "</tr>";
					echo "<tr>";
    				echo "<td style=\"text-align:center;\"><b>CUSTOMER EMAIL</b><br><br>".$res['email']."<br><br><br></td>";
    				echo "<br>";
    				echo "</tr>";
					echo "<tr>";
    				echo "<td style=\"text-align:center;\"><b>TOTAL AMOUNT AVAILABLE</b><br><br>".$res['amount']."<br><br><br></td>";
    				echo "<br>";
					echo "</tr>";
					
      			}
				  ?>
			</tbody>
		</table>
	</div>
			<a href="view_customer1.php" style="color:black"><center><button>!!Back!!</button></center></a>
	
</body>