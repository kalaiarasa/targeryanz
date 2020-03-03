<?php
session_start();

include '../user/database.php';
if(!isset($_SESSION['c_code']))
{
   // $_SESSION['redirect']=$_SERVER['REQUEST_URI'];
    header("Location:/user/log_in.php");
}

$valr=0;
$strr="";
$sql="insert into student_info values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
if($stmt=$conn->prepare($sql))
{
    $stmt->bind_param("sssssssssssssssssississiiiiiiiiiiiiisiis",$_SESSION['c_code'],$_POST['b_code'],$_POST['a_no'],$_POST['category'],$_POST['name'],$_POST['dob'],$_POST['gender'],$_POST['mobile'],$_POST['email'],$_POST['nationality'],$_POST['nativity'],$_POST['religion'],$_POST['community'],$_POST['caste_name'],$_POST['parent_occupation'],$_POST['state'],$_POST['district'],$_POST['hsc_tn'],$_POST['qualifying_exam'],$_POST['name_of_board'],$_POST['year_of_passing'],$_POST['hsc_reg_no'],$_POST['hsc_group'],$_POST['eleventh_pass'],$_POST['physics_m'],$_POST['physics_t'],$_POST['chemistry_m'],$_POST['chemistry_t'],$_POST['maths_m'],$_POST['maths_t'],$_POST['optional_m'],$_POST['optional_t'],$_POST['annual_income'],$_POST['aicte_tfw'],$_POST['pms'],$_POST['fg'],$_POST['fg_district'],$_POST['availed_fg'],$valr,$strr);
    if($stmt->execute())
    {
        echo "success";
    }
    else
    {
        if($conn->errno==1062)
        {
            echo "The Record with same Application Number Already Exists";
        }
        else
        {
            echo $conn->error;
        }
    }
}
else
{
    echo $conn->error."you";
}

?>
<?php $conn->close(); ?>