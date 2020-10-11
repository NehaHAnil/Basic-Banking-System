<?php
	ini_set('error_reporting',E_ALL & ~E_NOTICE );
		$sel=$_POST['status1'];
		$num=$_POST['amount'];
		$ID = $_POST['from'];
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
		$result =mysqli_query($conn, "SELECT amount FROM customer WHERE name='". $sel ."' ");
		$res=mysqli_fetch_array($result);
		$num=(int)$num;
		if($num <= 0){
			echo "<script>alert(\"INVALID AMOUNT \");window.location.href=\"transfer1.php\";</script> ";
					}
		else if($num > $res['amount']){
			echo "<script>alert(\"INSUFFICIENT amount!!\");window.location.href=\"transfer1.php\";</script>";
				}
		else if(strcmp($sel,$ID)==0){
			echo "<script>alert(\"CANNOT TRANSFER TO SELF \");window.location.href=\"transfer1.php\";</script> ";
					}
		if($num <= $res['amount'] && $num>0 ){
			$result1=mysqli_query($conn, "UPDATE customer SET amount= amount+$num  WHERE name='".$sel."' ");
			$result2=mysqli_query($conn, "UPDATE `customer` SET `amount`=amount-$num WHERE name= '".$ID."' ");
			if($result1 ==1){
			echo "<script>alert(\"TRANSACTION SUCCESFULL\");window.location.href=\"transfer1.php\";</script>";
			}
		}
		

?>