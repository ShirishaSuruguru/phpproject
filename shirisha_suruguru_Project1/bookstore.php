<?php 
//connecting to mysqli
require('mysqli_connect.php');
//Selecting all fields from books
$Query = $dbc->query("SELECT * FROM books");
session_start();
// $result = $conn->query($sql);
if(isset($_GET['book']))
{
   echo $id = $_GET['book'];
    //Query for fetching the fields from sqli
    $Query1 = $dbc->query("SELECT * FROM books WHERE Book_ID = '$id' ");
    if($Query1->num_rows > 0)
    {
      $row1 = $Query1->fetch_assoc();
      $_SESSION["id"] = $row1['Book_Id'];
      $_SESSION["name"] = $row1['Book_Name'];
      $_SESSION["Cost"] = $row1['Book_Cost'];
      $_SESSION["image"] = $row1['Book_Image'];
      //showing path checkout
     header("Location: checkout.php");
    }
    else
    {
      echo "Wrong Selection";
    }

}
?>
      
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Shop Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
   a {
    color: #000;
    text-decoration: none;
}
a:hover {
    color: #4CAF50;
    text-decoration: none;
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
      <li><a href="index.php">Home</a></li>
      <li class="active"><a href="books.php">Books</a></li>
    </ul>
  </div>
</nav>
  
<div class="container">
  <h3>Shop</h3>
  <div>
  <table class="table table-hover">
    <thead>
      <tr>
      	<th>Image</th>
        <th>Name</th>
        <th>Cost</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
    <?php 
    if($Query->num_rows > 0)
    {
        while($row = $Query->fetch_assoc()) {
    ?>
    
      <tr>
      	<td><a href="?book=<?php echo $row['Book_Id']; ?>"><img src="images/<?php echo $row['Book_Image']; ?>" class='Img' style='height:30%; width:30%'></a></td>
        <td><a href="?book=<?php echo $row['Book_Id']; ?>"><?php echo $row['Book_Name']; ?></a></td>
        <td><a href="?book=<?php echo $row['Book_Id']; ?>">$<?php echo $row['Book_Cost']; ?></a></td>
        <td><a href="?book=<?php echo $row['Book_Id']; ?>"><?php echo $row['Book_Description']; ?></a></td>
      </tr>
    
      <?php 
       }
    }
      ?>
    </tbody>
  </table>
  </div>

</div>

</body>
</html>
