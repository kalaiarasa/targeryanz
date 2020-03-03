<?php
session_start();

include '../user/database.php';
if(!isset($_SESSION['c_code']))
{
    //$_SESSION['redirect']=$_SERVER['REQUEST_URI'];
    header("Location:/user/log_in.php");
}


if(isset($_POST['c_code']))
{

    $SQL="UPDATE college_info SET  name_of_principal=?,address=?,taluk=?,district=?,pin_code=?,phone=?,email=?,website=?,anti_ragging_contact_no=?,bank_account_no=?,bank_name=?,minority_status=?,autonomous_status=?,dist_from_district_hq=?,nearest_railway=?,dist_from_railway=?,transport_facility=?,transport=?,min_trans_cost=?,max_trans_cost=?,b_accomodation=?,b_hostel_stay_type=?,b_type_of_mess=?,b_mess_bill=?,b_room_rent=?,b_electricity_charges=?,b_caution_deposit=?,b_establishment_charges=?,b_addmission_fees=?,g_accomodation=?,g_hostel_stay_type=?,g_type_of_mess=?,g_mess_bill=?,g_room_rent= ?,g_electricity_charges=?,g_caution_deposit=?,g_establishment_charges=?,g_addmission_fees=? WHERE c_code =?";
    if($stmt=$conn->prepare($SQL))
    {
        $stmt->bind_param("sssssssssssiiisiisiiissiiiiiiissiiiiiii",$_POST['principal_name'],$_POST['college_address'],$_POST['taluk'],$_POST['district'],$_POST['pin_code'],$_POST['phone'],$_POST['email'],$_POST['website'],$_POST['anti_ragging'],$_POST['bank_acc_no'],$_POST['bank_name'],$_POST['minority_status'],$_POST['autonomous_status'],$_POST['dist_from_dist_hq'],$_POST['nearest_rs'],$_POST['dist_from_rs'],$_POST['transport_facility'],$_POST['transport'],$_POST['min_trans_charge'],$_POST['max_trans_charge'],$_POST['b_acc'],$_POST['b_hostel_type'],$_POST['b_mess_type'],$_POST['b_mess_bill'],$_POST['b_room_rent'],$_POST['b_elec_charge'],$_POST['b_establish_charge'],$_POST['b_caution_deposit'],$_POST['b_admission_charge'],$_POST['g_acc'],$_POST['g_hostel_type'],$_POST['g_mess_type'],$_POST['g_mess_bill'],$_POST['g_room_rent'],$_POST['g_elec_charge'],$_POST['g_establish_charge'],$_POST['g_caution_deposit'],$_POST['g_admission_charge'],$_POST['c_code']);
        if($stmt->execute())
        {
            echo "success";
        }
        else
        {
            echo $conn->error;
        }
    }
    else
    {
        echo $conn->error;
    }
}
?>
<?php $conn->close(); ?>