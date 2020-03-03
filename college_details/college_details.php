<?php
session_start();
//echo $_SESSION['c_code'];
include '../user/head.php';
include '../user/database.php';
if(!isset($_SESSION['c_code']))
{
    $_SESSION['redirect']=$_SERVER['REQUEST_URI'];
    //header("Location:/user/log_in.php");
}


if($conn->error)
{
  die($conn->error);
}
if($stmt=$conn->prepare("select * from college_info where c_code=?"))
{
       $stmt->bind_param("s",$_SESSION['c_code']);
        $stmt->execute();
        $result=$stmt->get_result();
        $resultSet=$result->fetch_assoc();
}
else
{
       die("Something went wrong");
}
?>




<!doctype html>
<html lang="en">
  <head>
    <title>College Details</title>
    <!--  meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
   
      <link rel="stylesheet" href="bootstrap.min.css">
       <link rel="stylesheet" href="AdminLTE.min.css">
       <link rel="stylesheet" href="bootstrap.min.css">
       <link rel="stylesheet" href="loader.css">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js">

</script>
<script>
    $(document).ready(function(){
      $("#success").css("display","block");
      $("#failed").css("display","block");
      $("#success").hide();
      $("#failed").hide();
      $("#loader").hide();
      $("#btnSave").click(function(){
        $("#loader").show();
    $.post("update_details.php",
  {
   
      c_code:$("#collegecode").val(),
      college_name:$("#collegename").val(),
      principal_name:$("#principalname").val(),
      college_address:$("#collegeaddress").val(),
      taluk:$("#taluk").val(),
      district:$("#district").val(),
      pin_code:$("#pincode").val(),
      phone:$("#txtphone").val(),
      email:$("#emailid").val(),
      website:$("#website").val(),
      anti_ragging:$("#antiraggingcontactno").val(),
      bank_acc_no:$("#bankacno").val(),
      bank_name:$("#bankname").val(),
      minority_status:$("input[name='minoritystatus']:checked").val(),
      autonomous_status:$("input[name='autonomousstatus']:checked").val(),
      dist_from_dist_hq:$("#HQdistance").val(),
      nearest_rs:$("#nearestRS").val(),
      dist_from_rs:$("#RSdistance").val(),
      transport_facility:$("input[name='TransportFacility']:checked").val(),
      transport:$("input[name='Transport']:checked").val(),
      min_trans_charge:$("#MinTransportCharges").val(),
      max_trans_charge:$("#MaxTransportCharges").val(),
      b_acc:$("input[name='B_AccomodationAvailableforUG']:checked").val(),
      b_hostel_type:$("input[name='B_HostelStayType']:checked").val(),
      b_mess_type:$("input[name='B_TypeofMess']:checked").val(),
      b_mess_bill:$("#B_MessBill").val(),
      b_room_rent:$("#B_RoomRent").val(),
      b_elec_charge:$("#B_ElectricityCharges").val(),
      b_caution_deposit:$("#B_CautionDeposit").val(),
      b_establish_charge:$("#B_EstablishmentCharges").val(),
      b_admission_charge:$("#B_AdmissionFees").val(),
      g_acc:$("input[name='G_AccomodationAvailableforUG']:checked").val(),
      g_hostel_type:$("input[name='G_HostelStayType']:checked").val(),
      g_mess_type:$("input[name='G_TypeofMess']:checked").val(),
      g_mess_bill:$("#G_MessBill").val(),
      g_room_rent:$("#G_RoomRent").val(),
      g_elec_charge:$("#G_ElectricityCharges").val(),
      g_caution_deposit:$("#G_CautionDeposit").val(),
      g_establish_charge:$("#G_EstablishmentCharges").val(),
      g_admission_charge:$("#G_AdmissionFees").val()


  },
  function(data, status){
     $("#loader").hide();
    if(data=="success")
    {
      
       $("#success").show();
      
       $("html, body").animate({ scrollTop: 0 }, "slow");
      $('#success').delay(5000).fadeOut();
      
    }
    else
    {
      $("#failed").show();
      
      $("html, body").animate({ scrollTop: 0 }, "slow");
     $('#failed').delay(5000).fadeOut();
    }
  });
    });
    });
    </script>
     </head>
  
    <body>
    

<br />
<div class="alert alert-danger" id="failed" style="margin:0px auto;text-align:center;width:60%;display:none;">
<h5 >Failed to Update</h5>
</div>
<div class="alert alert-info" id="success" style="margin:0px auto;text-align:center;width:60%;display:none;">
<h5 >Updated Successfully</h5>
</div>
<br>
<div id="loader" ></div>
<div id="mainDiv" class="row">

  <div class="col-md-6">
       <!-- college info forms -->
         <div class="box box-primary">
         <h2  id="msg"></h2>
         <div class="box-header with-border">
           <h3 class="box-title">College Info</h3>
         </div>

         <div class="box-body">
                
          <div class="form-group">
            <label for="exampleInputPassword1">College Code</label>
             <input autocomplete="off" class="form-control" id="collegecode" name="collegecode" readonly="readonly" type="text" value="<?php  echo $resultSet['c_code']?>" />
             <span class="field-validation-valid" data-valmsg-for="collegecode" data-valmsg-replace="true"></span>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">College Name with District</label>
             <input autocomplete="off" class="form-control" data-val="true" data-val-="The collegename field is ." id="collegename" name="collegename" readonly="readonly" type="text" value="<?php  echo $resultSet['name_of_college']?>" />
             <span class="field-validation-valid error" data-valmsg-for="collegename" data-valmsg-replace="true" ="True"></span>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Name of the Principal/ Dean</label>
             <input autocomplete="off" class="form-control" data-val="true" data-val-="The principalname field is ." id="principalname" name="principalname" type="text" value="<?php  echo $resultSet['name_of_principal']?>" />
             <span class="field-validation-valid error" data-valmsg-for="principalname" data-valmsg-replace="true" ="True"></span>
         </div>

     </div>
    </div>
        <!--address details form-->
    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Address Details</h3>
        </div>
        <div class="box-body">

          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Address</label>
            <div class="col-sm-10">
              <input autocomplete="off" class="form-control" data-val="true" data-val-="The collegeaddress field is ." id="collegeaddress" name="collegeaddress" type="text" value="<?php  echo $resultSet['address']?>" />
              <span class="field-validation-valid error" data-valmsg-for="collegeaddress" data-valmsg-replace="true" ="True"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Taluk</label>
            <div class="col-sm-10">
              <!--auto completion options for districts-->
              <select class="form-control" id="taluk" name="taluk">
                <?php $taluks=$conn->query("select taluk from taluks");?>
                <?php while($taluk=$taluks->fetch_assoc()):?>
                    <option value="<?php echo $taluk['taluk'];?>"  <?php if($taluk['taluk']===$resultSet['taluk']) echo "selected"; ?>><?php echo $taluk['taluk'];?></option>
                  <?php endwhile ?>
              
            </select>
              <span class="field-validation-valid error" data-valmsg-for="taluk" data-valmsg-replace="true" ="True"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">District</label>
            <div class="col-sm-10">
              <!--auto completion options for districts-->
              <select class="form-control" id="district" name="district">
                <?php $districts=$conn->query("select district from districts");?>
                <?php while($district=$districts->fetch_assoc()):?>
                    <option value="<?php echo $district['district'];?>" <?php if($district['district']===$resultSet['district']) echo "selected"; ?>><?php echo $district['district'];?></option>
                  <?php endwhile ?>
              
            </select>
              <span class="field-validation-valid error" data-valmsg-for="taluk" data-valmsg-replace="true" ="True"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Pincode</label>
            <div class="col-sm-10">
              <input autocomplete="off" class="form-control" data-val="true" data-val-regex="Enter 6 digit Pincode." data-val-regex-pattern="^([0-9]{6})$" data-val-="The pincode field is ." id="pincode" name="pincode" type="number" value="<?php echo $resultSet['pin_code'];?>"  />
              <span class="field-validation-valid error" data-valmsg-for="pincode" data-valmsg-replace="true" ="True"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Phone/Fax</label>
            <div class="col-sm-10">
              <input autocomplete="off" class="form-control" data-val="true" data-val-="The phoneno field is ." id="txtphone" name="phoneno" type="text" value="<?php echo $resultSet['phone'];?>" />
              <span class="field-validation-valid error" data-valmsg-for="phoneno" data-valmsg-replace="true" ="True"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">EMailID</label>
            <div class="col-sm-10">
              <input autocomplete="off" class="form-control" data-val="true" data-val-regex="E-mail is not valid" data-val-regex-pattern="^[a-zA-Z0-9_\.-]+@([a-zA-Z0-9-]+\.)+[a-zA-Z]{2,6}$" data-val-="The emailid field is ." id="emailid" name="emailid" type="text" value="<?php echo $resultSet['email'];?>" />
              <span class="field-validation-valid error" data-valmsg-for="emailid" data-valmsg-replace="true" ="True"></span>
            </div>
          </div>

          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Website</label>
            <div class="col-sm-10">
              <input autocomplete="off" class="form-control" id="website" name="website" type="text" value="<?php echo $resultSet['website'];?>" />
              <span class="field-validation-valid" data-valmsg-for="website" data-valmsg-replace="true"></span>
            </div>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Anti-Ragging : ContactNo.</label>
                <input autocomplete="off" class="form-control" data-val="true" data-val-regex="Enter 8 or 10 digit Phone No." data-val-regex-pattern="^([0-9]{8,10})$" data-val-="The antiraggingcontactno field is ." id="antiraggingcontactno" name="antiraggingcontactno" type="text" value="<?php echo $resultSet['anti_ragging_contact_no'];?>" />
                <span class="field-validation-valid error" data-valmsg-for="antiraggingcontactno" data-valmsg-replace="true" ="True"></span>
            </div>
          </div>
         
       
    </div>
  <!-- /.box -->
</div>
<div class="col-md-6">
  <div class="box box-warning">
         <div class="box-header with-border">
           <h3 class="box-title">Basic Info</h3>
         </div>
         <!-- /.box-header -->
         <!-- form start -->
          
           <div class="box-body">

             <div class="form-group">
               <label class="col-sm-6 control-label">Bank A/C No.</label>
                 <div class="col-sm-6">
                 <input autocomplete="off" class="form-control" data-val="true" data-val-="The bankacno field is ." id="bankacno" name="bankacno" type="text" value="<?php echo $resultSet['bank_account_no']; ?>" />
                 <span class="field-validation-valid alert-error" data-valmsg-for="bankacno" data-valmsg-replace="true" ="True"></span>
                 </div>
             </div>
      
             <div class="form-group">
               <label class="col-sm-6 control-label">Bank Name</label>
                 <div class="col-sm-6">
                 <input autocomplete="off" class="form-control" data-val="true" data-val-="The bankname field is ." id="bankname" name="bankname" type="text" value="<?php echo $resultSet['bank_name']; ?>" />
                 <span class="field-validation-valid alert-error" data-valmsg-for="bankname" data-valmsg-replace="true" ="True"></span>
                 </div>
             </div>

             <div class="form-group">
                     <label class="col-sm-6 control-label">Minority Status</label>
                     <div class="col-sm-6">
                     <input  class="minimal" id="Yes" name="minoritystatus" type="radio" value="1" <?php if($resultSet['minority_status']===1) echo "checked"; ?>/>
                     <label for="yes">Yes</label>
                     <input  class="minimal" id="No" name="minoritystatus" type="radio" value="0" <?php if($resultSet['minority_status']===0) echo "checked"; ?>/>
                     <label for="no">No</label>
                     </div>
             </div>

             <div class="form-group">
                     <label class="col-sm-6 control-label">Autonomous Status</label>
                     <div class="col-sm-6">
                     <input  class="minimal" id="Yes" name="autonomousstatus" type="radio" value="1" <?php if($resultSet['autonomous_status']===1) echo "checked" ?>/>
                     <label for="yes">Yes</label>
                     <input  class="minimal" id="No" name="autonomousstatus" type="radio" value="0" <?php if($resultSet['autonomous_status']===0) echo "checked" ?>/>
                     <label for="no">No</label>
                     </div>
             </div>
             <br />
            
             <div class="form-group">
                 <label  class="col-sm-6 control-label">Distance in KMS from DistrictHQ.</label>
                  <div class="col-sm-6">
                 <input autocomplete="off" class="form-control" data-val="true" data-val-regex="Enter Distance value" data-val-regex-pattern="^([0-9]{1,50})$" data-val-="The HQdistance field is ." id="HQdistance" name="HQdistance" type="text" value="<?php  echo $resultSet['dist_from_district_hq']; ?>" />
                 <span class="field-validation-valid alert-error" data-valmsg-for="HQdistance" data-valmsg-replace="true" ="True"></span>
                       </div>
             </div>

             <div class="form-group">
                 <label  class="col-sm-6 control-label">Nearest Railway Station</label>
                    <div class="col-sm-6">
                <input autocomplete="off" class="form-control" data-val="true" data-val-="The nearestRS field is ." id="nearestRS" name="nearestRS" type="text" value="<?php echo $resultSet['nearest_railway']; ?>" />
                 <span class="field-validation-valid alert-error" data-valmsg-for="nearestRS" data-valmsg-replace="true" ="True"></span>
                         </div>
             </div>
             
             <div class="form-group">
               <label  class="col-sm-6 control-label">Distance in KMS from Railway Station</label>
                    <div class="col-sm-6">
               <input autocomplete="off" class="form-control" data-val="true" data-val-regex="Enter Distance value" data-val-regex-pattern="^([0-9]{1,50})$" data-val-="The RSdistance field is ." id="RSdistance" name="RSdistance" type="text" value="<?php echo $resultSet['dist_from_railway']; ?>" />
                 <span class="field-validation-valid alert-error" data-valmsg-for="RSdistance" data-valmsg-replace="true" ="True"></span>
                         </div>
             </div> 

           </div>
           <!-- /.box-body -->
        
        
     </div>
     <!-- Horizontal Form -->
     <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Transport Facilty</h3>
      </div>
        <div class="box-body">

           <div class="form-group" id="div_TransportFacility">
             <div class="col-sm-6">
                <label for="exampleInputEmail1" class="control-label">Transport Facility</label>
              </div>
              <div class="col-sm-6" >
                  <input class="minimal" id="Yes" name="TransportFacility" type="radio" value="1"  <?php if($resultSet['transport_facility']===1) echo "checked"; ?>/>
                  <label for="yes">Yes</label>
                  <input  class="minimal" id="No" name="TransportFacility" type="radio" value="0" <?php if($resultSet['transport_facility']===0) echo "checked"; ?>/>
                  <label for="no">No</label>
             </div>
          </div>

          <div class="form-group" id="div_TransOption">
               <div class="col-sm-6">
                   <label for="exampleInputEmail1" class="control-label">Transport</label>
               </div>
               <div class="col-sm-6" >
                  <input class="minimal" id="Optional" name="Transport" type="radio" value="Optional" <?php if($resultSet['transport']==='Optional') echo "checked";?> />
                  <label for="optional">Optional</label>
                  <input  class="minimal" id="Compulsory" name="Transport" type="radio" value="Compulsory" <?php if($resultSet['transport']==='Compulsory') echo "checked";?>/>
                  <label for="compulsory">Compulsory</label>
               </div>
          </div>

            
          <div class="form-group" id="div_MinTransCharges">
             
               <div class="col-sm-6">
                   <label for="exampleInputEmail1" class="control-label">Min. Transport Charges(Rs/Year)</label>
                     </div>
                  <div class="col-sm-6" >
                  <input autocomplete="off" class="form-control" id="MinTransportCharges" name="MinTransportCharges" type="text" value="<?php echo $resultSet['min_trans_cost']; ?>" />
                  <span class="field-validation-valid error" data-valmsg-for="MinTransportCharges" data-valmsg-replace="true" ="True"></span>
                </div>
              
          </div>

          <div class="form-group" id="div_MaxTransCharges">
             
               <div class="col-sm-6">
                   <label for="exampleInputEmail1" class="control-label">Max. Transport  Charges(Rs/Year)</label>
                     </div>
                  <div class="col-sm-6" >
                  <input autocomplete="off" class="form-control" id="MaxTransportCharges" name="MaxTransportCharges" type="text" value="<?php echo $resultSet['max_trans_cost']; ?>" />
                  <span class="field-validation-valid error" data-valmsg-for="MaxTransportCharges" data-valmsg-replace="true" ="True"></span>
                </div>
               
          </div>

      </div>
       
 
      </div>

     
 </div>

 <div class="col-md-12">
    <!-- Horizontal Form -->
      <div class="box box-info">
      <div class="box-header with-border">
        <h3 class="box-title">Hostel Facilities For Boys </h3>
      </div>
        <div class="box-body">

          <div class="form-group">
                      <div class="col-sm-6">
                          <label for="exampleInputPassword1"  class="control-label" >Accomodation Available</label>
                      </div>
                      <div class="col-sm-6" >
                         
                          <input  class="minimal" id="Yes" name="B_AccomodationAvailableforUG" type="radio" value="1" <?php if($resultSet['b_accomodation']===1) echo "checked"; ?>/>
                          <label for="yes">Yes</label>
                          <input  class="minimal" id="No" name="B_AccomodationAvailableforUG" type="radio" value="0" <?php if($resultSet['b_accomodation']===0) echo "checked"; ?>/>
                          <label for="no">No</label>
                      </div>
          </div>

          <div class="form-group" id="div_B_HostelStayType" >
                         <div class="col-sm-6" >
                              <label for="exampleInputPassword1"   class="control-label" >Hostel StayType</label>
                         </div>
                          <div class="col-sm-6" >
                          
                              <input  class="minimal"  name="B_HostelStayType" type="radio" value="Permanent" <?php if(strcmp($resultSet['b_hostel_stay_type'],'Permanent')===0) echo "checked"; ?>/>
                              <label for="permanent">Permanent</label>
                              <input  class="minimal"  name="B_HostelStayType" type="radio" value="Rental" <?php if(!strcmp($resultSet['b_hostel_stay_type'],"Rental")) echo "checked"; ?>/>
                              <label for="rental">Rental</label>
                          </div>
          </div>


          <div class="form-group" id="div_B_TypeofMess">
                      <div class="col-sm-6" >
                           <label for="exampleInputEmail1"  class="control-label">Type of Mess</label>
                           </div>
                          <div class="col-sm-6" >
                      <input  class="minimal" id="Veg" name="B_TypeofMess" type="radio" value="Veg" <?php if($resultSet['b_type_of_mess']=='Veg') echo "checked"; ?>/>
                      <label for="veg">Veg</label>
                      <input  class="minimal" id="Non-Veg" name="B_TypeofMess" type="radio" value="Non-Veg" <?php if($resultSet['b_type_of_mess']=='Non-Veg') echo "checked"; ?>/>
                      <label for="nonveg">Non-Veg</label>
                      <input class="minimal" id="Both" name="B_TypeofMess" type="radio" value="Both" <?php if($resultSet['b_type_of_mess']=='Both') echo "checked"; ?> />
                      <label for="both">Both</label>
              </div>
          </div>

            
          <div class="form-group" id="div_B_MessBill">
               <div class="col-sm-6" >
                   <label for="exampleInputEmail1"  class="control-label">Mess Bill(Rs/Month)</label>
                    </div>
                  <div class="col-sm-6" >
                  <input autocomplete="off" class="form-control" id="B_MessBill" name="B_MessBill" type="text" value="<?php echo $resultSet['b_mess_bill']; ?>" />
                  <span class="field-validation-valid error" data-valmsg-for="B_MessBill" data-valmsg-replace="true" ="True"></span>
                </div>
          </div>

            
          <div class="form-group" id="div_B_RoomRent">
                  <div class="col-sm-6" >
                  <label for="exampleInputEmail1" class="control-label">Room Rent(Rs/Month)</label>
                  </div>
                  <div class="col-sm-6" >
                  <input autocomplete="off" class="form-control" id="B_RoomRent" name="B_RoomRent" type="number" value="<?php echo $resultSet['b_room_rent']; ?>" />
                  <span class="field-validation-valid error" data-valmsg-for="B_RoomRent" data-valmsg-replace="true" ="True"></span>
                </div>
          </div>


          <div class="form-group"  id="div_B_ElectricityCharges">
                  <div class="col-sm-6" >
                  <label for="exampleInputEmail1" class="control-label">Electricity Charges(Rs/Month)</label>
                  </div>
                  <div class="col-sm-6" >
                  <input autocomplete="off" class="form-control" id="B_ElectricityCharges" name="B_ElectricityCharges" type="number" value="<?php echo $resultSet['b_electricity_charges']; ?>" />
                  <span class="field-validation-valid error" data-valmsg-for="B_ElectricityCharges" data-valmsg-replace="true" ="True"></span>
                 </div>
          </div>


          <div class="form-group"  id="div_B_CautionDeposit">
                  <div class="col-sm-6" >
                  <label for="exampleInputEmail1" class="control-label">Caution Deposit(Rs.)</label>
                  </div>
                  <div class="col-sm-6" >
                  <input autocomplete="off" class="form-control" id="B_CautionDeposit" name="B_CautionDeposit" type="number" value="<?php echo $resultSet['b_caution_deposit']; ?>" />
                  <span class="field-validation-valid error" data-valmsg-for="B_CautionDeposit" data-valmsg-replace="true" ="True"></span>
                </div>
          </div>


          <div class="form-group"  id="div_B_EstablishmentCharges">
                  <div class="col-sm-6" >
                  <label for="exampleInputEmail1" class="control-label">Establishment Charges(Rs/Year)</label>
                  </div>
                  <div class="col-sm-6" >
                  <input autocomplete="off" class="form-control" id="B_EstablishmentCharges" name="B_EstablishmentCharges" type="number" value="<?php echo $resultSet['b_establishment_charges'];?>" />
                  <span class="field-validation-valid error" data-valmsg-for="B_EstablishmentCharges" data-valmsg-replace="true" ="True"></span>
                </div>
          </div>

         <div class="form-group"  id="div_B_AdmissionFees">
                  <div class="col-sm-6">
                  <label for="exampleInputEmail1" class="control-label">Admission Fees(Rs/Year)</label>
                  </div>
                  <div class="col-sm-6" >
                  <input autocomplete="off" class="form-control" id="B_AdmissionFees" name="B_AdmissionFees" type="number" value="<?php echo $resultSet['b_addmission_fees']; ?>" />
                  <span class="field-validation-valid error" data-valmsg-for="B_AdmissionFees" data-valmsg-replace="true" ="True"></span>
                  </div>
          </div>
      </div>
</div>
 
    <!-- Horizontal Form -->
      <div class="box box-warning">
      <div class="box-header with-border">
        <h3 class="box-title">Hostel Facilities For Girls </h3>
      </div>

        <div class="box-body">

          <div class="form-group">
                      <div class="col-sm-6">
                          <label for="exampleInputPassword1"  class="control-label" >Accomodation Available</label>
                      </div>

                      <div class="col-sm-6" >
                          <input  class="minimal" id="Yes" name="G_AccomodationAvailableforUG" type="radio" value="1" <?php if($resultSet['g_accomodation']===1) echo "checked" ?>/>
                          <label for="yes">Yes</label>
                          <input  class="minimal" id="No" name="G_AccomodationAvailableforUG" type="radio" value="0" <?php if($resultSet['g_accomodation']===0) echo "checked" ?>/>
                          <label for="no">No</label>
                      </div>
          </div>

          <div class="form-group" id="div_G_HostelStayType" >
                         <div class="col-sm-6" >
                              <label for="exampleInputPassword1"   class="control-label" >Hostel StayType</label>
                         </div>
                          <div class="col-sm-6" >
                              <input  class="minimal" id="Permanent" name="G_HostelStayType" type="radio" value="Permanent" <?php if($resultSet['g_hostel_stay_type']==='Permanent') echo "checked"; ?>/>
                              <label for="permanent">Permanent</label>
                              <input class="minimal" id="Rental" name="G_HostelStayType" type="radio" value="Rental" <?php if($resultSet['g_hostel_stay_type']==='Rental') echo "checked"; ?>/>
                              <label for="rental">Rental</label>
                          </div>
          </div>


          <div class="form-group" id="div_G_TypeofMess">
                      <div class="col-sm-6" >
                           <label for="exampleInputEmail1"  class="control-label">Type of Mess</label>
                           </div>
                          <div class="col-sm-6" >
                      <input class="minimal" id="Veg" name="G_TypeofMess" type="radio" value="Veg"  <?php if($resultSet['g_type_of_mess']==='Veg') echo "checked"; ?>/>
                      <label for="veg">Veg</label>
                      <input class="minimal" id="Non-Veg" name="G_TypeofMess" type="radio" value="Non-Veg" <?php if($resultSet['g_type_of_mess']==='Non-Veg') echo "checked"; ?>/>
                      <label for="nonveg">Non-Veg</label>
                      <input  class="minimal" id="Both" name="G_TypeofMess" type="radio" value="Both" <?php if($resultSet['g_type_of_mess']==='Both') echo "checked"; ?>/>
                      <label for="both">Both</label>
              </div>
          </div>

            
          <div class="form-group" id="div_G_MessBill">
               <div class="col-sm-6" >
                   <label for="exampleInputEmail1"  class="control-label">Mess Bill(Rs/Month)</label>
                    </div>
                  <div class="col-sm-6" >
                  <input autocomplete="off" class="form-control" id="G_MessBill" name="G_MessBill" type="text" value="<?php echo $resultSet['g_mess_bill'];?>" />
                  <span class="field-validation-valid error" data-valmsg-for="G_MessBill" data-valmsg-replace="true" ="True"></span>
                </div>
          </div>

            
          <div class="form-group" id="div_G_RoomRent">
                  <div class="col-sm-6" >
                  <label for="exampleInputEmail1" class="control-label">Room Rent(Rs/Month)</label>
                  </div>
                  <div class="col-sm-6" >
                  <input autocomplete="off" class="form-control" id="G_RoomRent" name="G_RoomRent" type="number" value="<?php echo $resultSet['g_room_rent']; ?>" />
                  <span class="field-validation-valid error" data-valmsg-for="G_RoomRent" data-valmsg-replace="true" ="True"></span>
                </div>
          </div>


          <div class="form-group"  id="div_G_ElectricityCharges">
                  <div class="col-sm-6" >
                  <label for="exampleInputEmail1" class="control-label">Electricity Charges(Rs/Month)</label>
                  </div>
                  <div class="col-sm-6" >
                  <input autocomplete="off" class="form-control" id="G_ElectricityCharges" name="G_ElectricityCharges" type="number" value="<?php echo $resultSet['g_electricity_charges']; ?>" />
                  <span class="field-validation-valid error" data-valmsg-for="G_ElectricityCharges" data-valmsg-replace="true" ="True"></span>
                 </div>
          </div>


          <div class="form-group"  id="div_G_CautionDeposit">
                  <div class="col-sm-6" >
                  <label for="exampleInputEmail1" class="control-label">Caution Deposit(Rs.)</label>
                  </div>
                  <div class="col-sm-6" >
                  <input autocomplete="off" class="form-control" id="G_CautionDeposit" name="G_CautionDeposit" type="number" value="<?php echo $resultSet['g_caution_deposit']; ?>" />
                  <span class="field-validation-valid error" data-valmsg-for="G_CautionDeposit" data-valmsg-replace="true" ="True"></span>
                </div>
          </div>


          <div class="form-group"  id="div_G_EstablishmentCharges">
                  <div class="col-sm-6" >
                  <label for="exampleInputEmail1" class="control-label">Establishment Charges(Rs/Year)</label>
                  </div>
                  <div class="col-sm-6" >
                  <input autocomplete="off" class="form-control" id="G_EstablishmentCharges" name="G_EstablishmentCharges" type="number" value="<?php echo $resultSet['g_establishment_charges']; ?>" />
                  <span class="field-validation-valid error" data-valmsg-for="G_EstablishmentCharges" data-valmsg-replace="true" ="True"></span>
                </div>
          </div>

         <div class="form-group"  id="div_G_AdmissionFees">
                  <div class="col-sm-6">
                  <label for="exampleInputEmail1" class="control-label">Admission Fees(Rs/Year)</label>
                  </div>
                  <div class="col-sm-6" >
                  <input autocomplete="off" class="form-control" id="G_AdmissionFees" name="G_AdmissionFees" type="number" value="<?php echo $resultSet['g_addmission_fees']; ?>" />
                  <span class="field-validation-valid error" data-valmsg-for="G_AdmissionFees" data-valmsg-replace="true" ="True"></span>
                  </div>
          </div>
      </div>
      </div>
 </div>
</div>
</div>
<!--save button code-->
<div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
  <div class="box-header with-border text-center">
  <button id="btnSave" class="btn btn-primary waves-effect waves-light" type="submit"
  value="Submit" name="actionType" >
  Submit
  </button>
  <button class="btn btn-inverse waves-effect waves-light">
  Cancel
  </button>
  </div>
  </div>
  </div>
  </div>

  </body>
</html>
<?php $conn->close(); ?>