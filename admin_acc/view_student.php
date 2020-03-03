<?php
session_start();

if(!isset($_SESSION['admin_login']))
{
  die("Invalid access");
}
include '../user/database.php';
$sql="select student_info.c_code,name_of_college,branch_name,catogory,community,name,gender,dob from student_info,college_info,branch_info where  a_no=".$_POST['a_no']." and student_info.c_code=college_info.c_code and student_info.b_code=branch_info.b_code and student_info.c_code=branch_info.c_code";
if($res=$conn->query($sql))
{
    if($res->num_rows==0)
    die("No Data Exist");
	$result=$res->fetch_assoc();
}
else
{
    die($conn->error);
}
?>
<table>
    <tr>
        <td>Application Number</td>
        <td><?php echo $_POST['a_no'];?></td>
    </tr>
    <tr>
        <td>Name</td>
        <td><?php echo $result['name'];?></td>
    </tr>
    <tr>
        <td>Category</td>
        <td><?php echo $result['catogory'];?></td>
    </tr>
    <tr>
        <td>Community</td>
        <td><?php echo $result['community'];?></td>
    </tr>
    <tr>
        <td>Gender</td>
        <td><?php echo $result['gender'];?></td>
    </tr>
    <tr>
        <td>College Name</td>
        <td><?php echo $result['name_of_college'];?></td>
    </tr>
    <tr>
        <td>Branch Name</td>
        <td><?php echo $result['branch_name'];?></td>
    </tr>
    <tr>
        <td>Councelling Code</td>
        <td><?php echo $result['c_code'];?></td>
    </tr>
</table>
