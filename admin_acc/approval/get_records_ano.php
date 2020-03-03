<?php
session_start();
include 'database.php';
$record=array();
$sql="SELECT   name,catogory, dob, gender, mobile,email,nationality, nativity, religion, community, caste_name, parent_occupation, state, district, hsc_tn, qualifying_exam, name_of_board, year_of_passing, hsc_reg_no, hsc_group, eleventh_pass, physics_m, physics_t, chemistry_m, chemistry_t, maths_m, maths_t, optional_m, optional_t, annual_income, aicte_tfw, pms, fg, fg_district, Availed_fg, approved,reason FROM student_info WHERE a_no=? and c_code=?";
if($stmt=$conn->prepare($sql))
{
    //echo $_POST['a_no'];
    $stmt->bind_param("ss",$_POST['a_no'],$_SESSION['c_code']);
    if($stmt->execute())
    {
        $result=$stmt->get_result();
        if($result->num_rows==0)
        die("no_data");

        array_push($record,$result->fetch_assoc());
        //header('Content-type: application/json');
        echo json_encode($record);
    }
    else
    {
        echo $conn->error;
    }
}
else{
    echo $conn->error;
}

?>
