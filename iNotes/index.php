
<?php
$insert=false;

// connection to database includes three variables....
$servername="localhost";
$username="root";
$password="";
$database="crud";

$conn=mysqli_connect($servername,$username,$password,$database);

if(!$conn){
    die("Sorry we failed to connect ". mysqli_connect_error());
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $title=$_POST['title'];
    $desc=$_POST['desc'];
    


$sql="INSERT INTO `notes` (`S.no`, `title`, `description`, `Date and Time`) VALUES (NULL, '$title', '$desc', current_timestamp())";

$result=mysqli_query($conn,$sql);


if($result){
    $insert=true;
}

}


?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
   
   
    <title>Comments</title>
  </head>

  <body>

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Comments</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
    </ul>
    <form class="form-inline my-2 my-lg-0">
      
      
    </form>
  </div>
</nav>


<?php
if($insert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>SUCCESS!</strong> Your Comment added Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}

?>

<div class="container my-3">
    <form action="/iNotes/index.php" method="post">
    <h2>Comment Here..!</h2>
    <div class="form-group">
        <label for="title">Product Name</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp">
    </div>
    <div class="form-group">
        <label for="desc">Comment</label>
        <textarea name="desc" id="desc" cols="30" class="form-control" rows="10"></textarea>
    </div>
    
    <button type="submit" class="btn btn-primary">Add Comment</button>
    </form>
</div>

<div class="container my-5" >
<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Product Name</th>
      <th scope="col">Comments</th>
     
    </tr>
  </thead>
  <tbody>
<?php
  $sql="SELECT * FROM `notes`";
  $result=mysqli_query($conn,$sql);
  $num=mysqli_num_rows($result); //Fing the no. of rows in data  
$sno=0;
  //Display rows return by the query
  if($num>0){
      while( $row=mysqli_fetch_assoc($result))
      {
          $sno=$sno+1;
     echo "<tr>
        <th scope='row'>". $sno ."</th>
        <td>".$row['title']."</td>
        <td>".$row['description']."</td>
        
      </tr>";
     
      }
  
  }
    
?>    
  </tbody>
</table>
<hr>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  
   
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
   
    <script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );
    </script>
  </body>
</html>