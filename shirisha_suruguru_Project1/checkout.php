<?php
//connecting to mysqli 
require('mysqli_connect.php');
//Selecting all fields from books
$Query = $dbc->query("SELECT * FROM books ");
//Starting the session
session_start();

if(isset($_SESSION['id']) && isset($_SESSION['name']))
{
	 $id = $_SESSION['id'];
	 $bname = $_SESSION['name'];
	 $Cost = $_SESSION['Cost'];
	 $error = array();
	 //Requesting information from server
	 if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$First_Name = filter_var($_POST['First_Name'], FILTER_SANITIZE_STRING);
		$Last_Name = filter_var($_POST['Last_Name'], FILTER_SANITIZE_STRING);
		$Payment = filter_var($_POST['Payment'], FILTER_SANITIZE_STRING);

		if(empty($First_Name) || strlen($First_Name) < 1)
		{
			array_push($error,"Kindly enter your First Name");
		}
		if(empty($Last_Name) || strlen($Last_Name) < 1)
		{
			array_push($error,"Kindly enter your Last Name");
		}
		if(empty($Payment) || strlen($Payment) < 1)
		{
			array_push($error,"Kindly choose a payment method");
		}

		if(empty($error))
		{
			$cinfo = "INSERT INTO buyers SET First_Name='$First_Name',Last_Name='$Last_Name',Payment_Options='$Payment',Book_Id='$id' ";
			echo $order = mysqli_query($dbc,$cinfo);
            // Query for inventory
			$query1 = mysqli_query($dbc, "SELECT * FROM book_inventory WHERE Book_Id = '$id' ");
	 		$details = mysqli_fetch_array($query1);
	 		$qnty = $details['Number_Of_Copies'];

	 		$nQty = $qnty -1;
	 		echo $QuantityUp = mysqli_query($dbc, "UPDATE book_inventory SET Number_Of_Copies='$nQty' WHERE Book_Id = '$id' ");
            //link for sucess page
	 		if($order && $QuantityUp)
	 		{
	 			$_SESSION['cname'] = $First_Name;
	 			header("Location: sucess.php");
	 		}
	 		else
	 		{
	 			echo "error";
	 		}

		}
		else
		{
			foreach ($error as $error) {
				echo "<b>".$error."</b><br>";
			}
			//print_r($error);
		}
	}

}
else
{
	echo "hello";
	// header("Location: index.php");
}
//html for checkout page
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Checkout Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
	div#bookInfo {
    width: 80%;
    margin: auto;
    box-shadow: 2px 2px 7px;
    padding: 10px;
    margin-bottom: 16px;
    font-size: 14px;
    font-weight: bold;
}
</style>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">BookStore</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="bookstore.php">Shop</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <div id="bookInfo">
  	<span>Book Name- </span> <?php echo $_SESSION['name']; ?><br>
  	<span>Book Cost- $</span><?php echo $_SESSION['Cost']; ?><br>
  </div>
  
<div class="col-md-8 col-md-offset-2">
	<form action="" method="POST">
    <div class="form-group">
      <label for="First Name">First Name:</label>
      <input type="text" class="form-control" id="First_Name" placeholder="Enter First Name" name="First_Name">
    </div>
    <div class="form-group">
      <label for="Last_Name">Last Name:</label>
      <input type="text" class="form-control" id="Last_Name" placeholder="Enter Last Name" name="Last_Name">
    </div>
    <div class="form-group">
	  <label for="Payment">Payment Type:</label>
	  <select class="form-control" id="Payment" name="Payment">
	    <option value="credit">Credit</option>
	    <option value="debit">Debit</option>
	    <option value="cod">Cash On Delivery</option>
	  </select>
	</div>
    
    <button type="submit" class="btn btn-default btn-block btn-success">Order</button>
  </form>
</div>

</div>

</body>
</html>
