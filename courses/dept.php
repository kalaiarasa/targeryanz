<?php
session_start();

include '../user/head.php';
include '../user/database.php';
if(!isset($_SESSION['c_code']))
{
    $_SESSION['redirect']=$_SERVER['REQUEST_URI'];
    header("Location:/user/log_in.php");
}


if($conn->error)
{
  die($conn->error);
}
$sql="SELECT b_code,branch_name,approved_in_take,year_of_start,accredition_valid_upto,NBA_2020 FROM branch_info WHERE c_code=?";
if($stmt=$conn->prepare($sql))
{
        $ccode=$_SESSION['c_code'];
        $stmt->bind_param("i",$ccode);
        $stmt->execute();
        $result=$stmt->get_result();
}
else
{
       die("Something went wrong");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Branch Details</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Department</title>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
        <!--<nav class="navbar navbar-expand-lg navbar-nav">
            <a class="navbar-brand" href="/">TNEA Header</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item active">
                  <a class="nav-link" href="/">Home<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/admission.php">Admission</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/logout.php">Logout</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/mydetails.php">My Details</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="/changepassword.php">Change Password</a>
                  </li>
               
              </ul>
            </div>
          </nav>
        </br>
-->
          <div >
              <h2 style="text-align: center;">Branch Details</h2>
          </div>
          <div class="container">
          <a href="add_branch.php" class="btn btn-primary ">Add Branch</button></a>
        <br>
          <table class="table table-light table-bordered" style="margin-top:10px;">
            <thead class="thead-light">
              <tr>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
                <th scope="col">Branch Code</th>
                <th scope="col">Branch Name</th>
                <th scope="col">Approved In Take</th>
                <th scope="col">Year of Starting the Course</th>
                <th scope="col">Accredition ValidUpto</th>
                <th scope="col">NBA_2020</th>
              </tr>
            </thead>
            <tbody>
                <?php while($resultSet=$result->fetch_assoc())
                { ?>
              <tr>
               
                <td><a href="edit_branch.php?b_code=<?php echo $resultSet['b_code']?>" class="btn btn-success">Edit</a></td>
                <td><a href="delete_branch.php?b_code=<?php echo $resultSet['b_code']?>" class="btn btn-danger">Delete</a></td>
                <td><?php echo $resultSet['b_code'];?></td>
                <td><?php echo $resultSet['branch_name'];?></td>
                <td><?php echo $resultSet['approved_in_take'];?></td>
                <td><?php echo $resultSet['year_of_start'];?></td>
                <td><?php echo $resultSet['accredition_valid_upto'];?></td>
                <td><?php echo $resultSet['NBA_2020'];?></td>
              </tr>
              <?php }?>
            </tbody>
          </table>
        
    </div>
   
    
</body>
</html>