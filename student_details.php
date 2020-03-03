<?php
session_start();
$_SESSION['c_code']='1234';

$conn=new MySQLi('remotemysql.com:3306','MNRJtXeAK9','YMPEuxDHE9','MNRJtXeAK9');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="google" content="notranslate">
        <title>Student_Registration</title>
        <link rel="stylesheet" href="student_details.css">
        <link rel="stylesheet" href="jQuery-ui\jquery-ui.css">
        <link rel="stylesheet" type="text/javascript"  href="jQuery-ui\jquery-ui.min.js">
        <link rel="stylesheet"  href="css\bootstrap.min.css">
        <link rel="stylesheet" type="text/javascript" href="js\bootstrap.min.js">
        <link rel="stylesheet" type="text/javascript" href="js\bootstrap.bundle.min.js">
        <link rel="stylesheet" href="loader.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <script>
  $(document).ready(function(){
      //Executes after loading
      $("#msg").css("display","block");
      $("#msg-e").css("display","block");
      $("#mainDiv").css("display","block");
      $("#mainDiv").hide();
      $("#msg").hide();
      $("#msg-e").hide();
      $("#loader").hide();
      $("#viewBtn").click(function(){
          if($("#a_no").val()=="" || $("#a_no").val().length!=6)
          {
                    $("#msg-e").show();
                    $("#details-e").text("Please Enter App Number");
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    $('#msg-e').delay(5000).fadeOut();
                    $("input").prop("disabled",false);
                     $("select").prop("disabled",false);
                    return;
          }
          //$("#mainDiv").show();
          $("#submit").show();
          $("#update").hide();
          $("#delete").hide();
          $("#save").hide();
          
          //
          showLoading();
            //$("#clear").click();
            //$("#delete").show();
           // $("#submit").hide();
           // $("#update").show();
            $.post("get_records_ano.php",{
                a_no:$("#a_no").val()
            },function(data,status){
                hideLoading();
                $("input").prop("disabled",true);
                $("select").prop("disabled",true);
                $("input[name=approve]").prop("disabled",false);
                if(data=="no_data")
                {
                    $("#msg-e").show();
                    $("#details-e").text("Invalid App no");
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    $('#msg-e').delay(5000).fadeOut();
                    return;
                }
               // alert(data);
                var result= $.parseJSON(data);
                $("#mainDiv").show();
                //$("#submit").hide();
                //$("#update").show();
                $.each( result, function( key, value ) { 
                    //$("#b_code").val(value['']),
                        //$("#a_no").val(value['']),
                        //console.log(value['annual_income']);
                        $("#category").val(value['catogory']),
                        $("#name").val(value['name']),
                        $("#dob").val(value['dob']),
                        $("input[name='gender'][value="+value['gender']+"]").prop("checked",true),
                        $("#mobile").val(value['mobile']),
                        $("#email").val(value['email']),
                        $("input[name='nationality'][value="+value['nationality']+"]").prop("checked",true),
                        $("input[name='nativity'][value="+value['nativity']+"]").prop("checked",true),
                        $("#input").val(value['religion']),
                        $("#output").val(value['community']),
                        $("#casteop").val(value['caste_name']),
                        $("#parent_occupation").val(value['parent_occupation']),
                        $("#state").val(value['state']),
                        $("#district").val(value['district']),
                        $("input[name='hsc_tn'][value="+value['hsc_tn']+"]").prop("checked",true),
                        $("#qualifying_exam").val(value['qualifying_exam']),
                        $("#name_of_board").val(value['name_of_board']),
                        $("#year_of_passing").val(value['year_of_passing']),
                        $("#hsc_reg_no").val(value['hsc_reg_no']),
                        $("input[name='hsc_group'][value="+value['hsc_group']+"]").prop("checked",true),
                        $("input[name='eleventh_pass'][value="+value['eleventh_pass']+"]").prop("checked",true),
                        $("#physics_m").val(value['physics_m']),
                        $("#physics_t").val(value['physics_t']),
                        $("#chemistry_m").val(value['chemistry_m']),
                        $("#chemistry_t").val(value['chemistry_t']),
                        $("#maths_m").val(value['maths_m']),
                        $("#maths_t").val(value['maths_t']),
                        $("#optional_m").val(value['optional_m']),
                        $("#optional_t").val(value['optional_t']),
                        $("#annual_income").val(value['annual_income']),
                        $("input[name='aicte_tfw'][value="+value['aicte_tfw']+"]").prop("checked",true),
                        $("input[name='pms'][value="+value['pms']+"]").prop("checked",true),
                        $("input[name='fg'][value="+value['fg']+"]").prop("checked",true),
                        $("#fg_district").val(value['fg_district']),
                        $("input[name='availed_fg'][value="+value['Availed_fg']+"]").prop("checked",true),
                        $("input[name='approve'][value="+value['approved']+"]").prop("checked",true),
                        $("#rejection_reason").val(value['reason']);
                 }); 
                
            });
           
      });
      
      $("#submit").click(function(){
            if($('input[name=approve]:checked').length <=0)
            {
                    $("#msg-e").show();
                    $("#details-e").text("Please Select Approval Details");
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    $('#msg-e').delay(5000).fadeOut();
                    return;
            }
            if($("input[name='approve']:checked").val()=="2" && $("#rejection_reason").val()=="")
            {
                 $("#msg-e").show();
                    $("#details-e").text("Please Enter the Reason for Rejection");
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    $('#msg-e').delay(5000).fadeOut();
                    return;
            }
            showLoading();
            $.post("approval.php",{
                a_no:$("#a_no").val(),
                approved:$("input[name=approve]:checked").val(),
                reason:$("#rejection_reason").val()
            },function(data,status){
                hideLoading();
                alert(data);
                if(data=="success")
                {
                    var acc="R";
                    if($("input[name=approve]:checked").val()=="1")
                    {
                        acc="A"
                    }
                    $("#"+$("#a_no").val()).text(acc);
                    $("#"+$("#a_no").val()).css("background-color","grey");
                    $("#msg").show();
                    $("#details").text("Submitted Successfully");
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    $('#msg').delay(5000).fadeOut();
                    $("#mainDiv").hide();
                }
                else{
                   
                    $("#msg-e").show();
                    $("#details-e").text("Failed to Approve");
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    $('#msg-e').delay(5000).fadeOut();
                }
                $("input").prop("disabled",false);
                $("select").prop("disabled",false);
            });
      });
      

      
     //Executes when changed
     $("#b_code").change(function(){
        showLoading();
        $.post("get_records.php",{
          b_code:$("#b_code").val()
     },function(data,status)
     {
        hideLoading();
         $("#table_details").html(data);
     });
     });
     $("#table_details").on('click','button',function(){
         //alert("hhhh");
         $("#clear").click();
         $("#a_no").val($(this).val());
         $("#viewBtn").click();
     });
     
     
     
      function showLoading()
      {
          $("#loader").show();
          $("input").prop("disabled",true);
          $("button").prop("disabled",true);
      }
      function hideLoading()
      {
          $("#loader").hide();
          $("input").prop("disabled",false);
          $("button").prop("disabled",false);
      }
     
     
  });
</script>

<style type="text/css">
            #secCheckList .table > tbody > tr > td, .table > tbody > tr > th, .table > tfoot > tr > td, .table > tfoot > tr > th, .table > thead > tr > td, .table > thead > tr > th {
            padding: 2px !important;
         }
    
         #secCheckList > .modal-header, .modal-body, .modal-footer {
            padding: 5px !important;
         }
         </style>
    </head>
    <body style="background-color: #f2f2f2e0;">
        
        
        <div>
            <div style="min-height: 500px; margin-top: 10px;">
                <div style="margin-top: 10px;">

                    
          <!-- <div ng-app="TFC_VerifApp">
            <div ng-controller="StudentPage">
                 ngInclude: 'AppFolder/Student.html?v=200129060957' -->
                <!-- <div ng-include="'AppFolder/Student.html?v=200129060957'">  -->
         
<div id="msg" class="alert alert-info" style="display:none;text-align:center;margin:0px auto;width:50%;"><h5 id="details"></h5></div>
<div id="msg-e" class="alert alert-danger" style="display:none;text-align:center;margin:0px auto;width:50%;"><h5 id="details-e"></h5></div>
<div id="loader"></div>
    <div class="row" style="margin-top:4px;">
       
       <div class="col-md-12" style="background-color:palegreen;color:white;">
           <div class="row">

               
               <div class="col-md-2 text-right" style="margin-left: 18%;">
                   <div class="gap15">
                       <span size="4"><strong>BRANCH NAME</strong></span>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="gap5">
                   <?php 
                                if($stmt=$conn->prepare("select b_code,branch_name from branch_info where c_code=?"))
                                {
                                    
                                    $stmt->bind_param("s",$_POST['c_code']);
                                    if($stmt->execute())
                                    {
                                        $result=$stmt->get_result();
                                    }
                                    else
                                    die("something went wrong");    
                                }
                               else
                                {
                                    die("Some thing went wrong");
                                }
                          ?>
                       <select class="form-control" id="b_code" name="b_code" required>
                            <option value="" selected>Select Branch</option>
                          <?php while($row=$result->fetch_assoc()):?>
                                <option value="<?php echo $row['b_code'] ;?>"><?php echo $row['b_code']."-".$row['branch_name'];?></option>
                            <?php endwhile ?>
                       </select>
                   
                   </div>
               </div>

          
            
           </div>
       </div>
       
       <div class="col-md-4 md-whiteframe-24dp" style="border:1px solid #bababa; min-height:600px;">
           <div id="tblStud" class="tabulator" role="grid" tabulator-layout="fitColumns">
               <div class="tabulator-header" style="padding-right: 0px;">
                   <div class="tabulator-headers" style="margin-left: 0px;">
                       <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="SNO" title="" style="min-width: 40px; width: 50px; height: 28px;">
                           <div class="tabulator-col-content">
                               <div class="tabulator-col-title">
                               S.NO
                           </div>
                           <div class="tabulator-arrow">
                                
                           </div>
                       </div>
                   </div>
                   <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="APP_NO" title="" style="min-width: 40px; width: 80px; height: 28px;">
                       <div class="tabulator-col-content">
                           <div class="tabulator-col-title">A.No</div>
                           <div class="tabulator-arrow">

                           </div>
                       </div>
                   </div>
                   <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="NAME" title="" style="min-width: 40px; width: 160px; height: 28px;">
                       <div class="tabulator-col-content">
                           <div class="tabulator-col-title">NAME</div>
                           <div class="tabulator-arrow">

                           </div>
                       </div>
                   </div>
                   <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="Status" title="" style="min-width: 40px; width: 40px; height: 28px;">
                       <div class="tabulator-col-content">
                           <div class="tabulator-col-title">Status</div>
                           <div class="tabulator-arrow">

                           </div>
                       </div>
                   </div>
                   <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="Status" title="" style="min-width: 40px; width: 90px; height: 28px;">
                       <div class="tabulator-col-content">
                           <div class="tabulator-col-title">Actions
                               &nbsp;
                            </div>
                       <div class="tabulator-arrow">

                       </div>
                   </div>
               </div>
           </div>
                </div>

                   <div id="table_details" class="tabulator-tableHolder" tabindex="0">
                       <!-- Table Contents Goes Here -->
                </div>
                
       </div>
 </div>


       <div class="col-md-8 md-whiteframe-24dp" style="border: 1px solid rgb(186, 186, 186); min-height: 100px;"  aria-hidden="false">

           <div class="row top5">
               <div class="col-md-1">
                   &nbsp;
                </div>
               <div class="col-md-3 text-right" style="margin-left:-8%;">
                   <div class="gap15">
                       <span size="4"><strong>APPLICATION NUMBER</strong></span>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="gap5">
                       <input style="width: 130%;margin-top: 8px;" id="a_no"  type="number" class="text-center form-control input-lg" >
                   </div>
               </div>

               <div style="margin-left:20%;margin-top:1%;">
                <button id="viewBtn" class="btn btn-info">
                       View
                  </button>
                   
                  
               </div>    

         </div>



           <div id="mainDiv" style="display:none;" >
           <div class="row studHdrBg top10">
                   <div class="col-md-12">
                       <div class="gap2">
                           <span size="2"><strong style="color:white;font-size: 14px;">CATEGORY DETAILS</strong></span>
                       </div>
                   </div>
               </div>

           <div class="row top5">

        

           <div class="col-md-2 text-right" style="margin-left: 29%;">
                   <div class="gap15">
                       <span size="4"><strong>CATEGORY</strong></span>
                   </div>
               </div>
               <div class="col-md-3">
                   <div class="gap5">
                       <select id="category" class="form-control" name="ddBranch"   style="margin-left:-9%" >
                         
                           <option value="" selected></option>
                           <option  value="GOVERNMENT">
                               GOVERNMENT
                           </option>
                           <option   value="MANAGEMENT">
                               MANAGEMENT
                           </option>
                           <option   value="MIN">
                               MIN
                           </option>
                           <option   value="LAP">
                               LAP
                           </option>
                           <option   value="NRI">
                               NRI
                           </option>
                           <option   value="GOI">
                               GOI
                           </option>
                           <option   value="FOR">
                               FOR
                           </option>
                       </select>
                       
                   </div>
               </div>
            </div>
           

               <div class="row studHdrBg top10">
                   <div class="col-md-12">
                       <div class="gap2">
                           <span size="2"><strong style="color:white;font-size: 14px;">PERSONAL DETAILS</strong></span>
                       </div>
                   </div>
               </div>
               <div class="row top15">
                   <div class="row">
                       <div class="col-md-4">
                           <div class="form-group">
                               <label>Candidate's Name</label>
                               <input id="name" name="txtName"  type="text" class="form-control">
                            
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group">
                               <label>Date of Birth</label>
                               <input id="dob"  name="txtDOB" id="txtDOB" type="date" placeholder="dd-mm-yyyy" class="form-control" >
                            
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group" style="width: 130%">
                               <label>Gender</label><br>
                               <label><input id="gender"  name="gender"  type="radio" value="MALE"   >Male</label>
                               <label><input id="gender" name="gender"  type="radio" value="FEMALE"   >Female</label>
                               <label><input id="gender" name="gender"  type="radio" value="TRANSGENDER"  >Transgender</label>

                           </div>
                       </div>
                   </div>

                   <div class="row">

                       <div class="col-md-4">
                           <div class="form-group" style="width: 170%">
                               <label>Mobile </label><br>
                               <input id="mobile" class="form-control" name="txtMobile" type="number">
                           
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group" style="width: 170%;margin-left:71%;">
                               <label>Email</label><br>
                               <input id="email" class="form-control"  name="txtEmail" type="email">

                             
                           </div>
                       </div>

                   </div>
               </div>

               <div class="row studHdrBg">
                   <div class="col-md-12">
                       <div class="gap2">
                           <span size="2"><strong style="color:white;font-size: 14px;">ELIGIBILITY DETAILS</strong></span>
                       </div>
                   </div>
               </div>
               <div class="row top15">
                   <div class="col-md-4">
                       <div class="form-group">
                           <label>Nationality</label> <span color="red">*</span><br>
                           <label><input  id="nationality" type="radio" name="nationality" value="INDIAN"   >Indian</label>
                           <label><input id="nationality" type="radio" name="nationality" value="SRILANKAN_REFUGEE"  >Srilankan Refugee</label>
                           <label><input  id="nationality" type="radio" name="nationality"  value="OTHERS" >Others</label>

                        
                       </div>
                   </div>

                   <div class="col-md-4">
                       <div class="form-group">
                           <label>Nativity</label> <br>
                           <label><input id="nativity"   type="radio" name="nativity"  value="TN" >Tamil Nadu</label>
                           <label><input id="nativity"  type="radio" name="nativity"  value="OTHERS" >Others</label>
                         
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="form-group">
                           <label>Religion</label> <span color="red">*</span>
                           <select class="form-control" name="religion" id="input" onchange="random(this.id,'output')" >
                               <option value=""></option>
                               <option value="Hindu">Hindu</option>
                               <option value="Christian">Christian</option>
                               <option value="Muslim">Muslim</option>
                               <option value="Jainism">Jainism</option>
                               <option value="Buddhism">Buddhism</option>
                               <option value="Sikhism">Sikhism</option>
                               <option value="Others">Others</option>
                           </select>
                        
                       </div>
                   </div>
               </div>
               <div class="row ">
                   <div class="col-md-4">

                       <div class="form-group">
                        <!-- <div id="output"> -->
                           <label>Community</label> <span color="red">*</span>
                         
                           <select onchange="populate(this.id,'casteop')" id="output" class="form-control"  name="community">
                               
                               <!-- <option value=""></option>
                               <option value="OC">OC</option>
                               <option value="BC">BC</option>
                               <option value="BCM" aria-hidden="true">BCM</option>
                               <option value="MBC/DNC">MBC/DNC</option>
                               <option value="SC">SC</option>
                               <option value="SCA">SCA</option>
                               <option value="ST">ST</option> -->
                               
                            </select>
                           <!-- </div> -->
                          
                       </div>
                   </div>

                   <div class="col-md-4">
                       <div class="form-group">
                           <label>Caste Name</label>
                           <select id="casteop" class="form-control"   name="caste"  >
                               <!-- <option value="?" selected="selected"> -->
                                
                               </option>
                            </select>
                         
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="form-group">
                           <label>Parent Occupation</label>
                           <select id="parent_occupation" class="form-control" name="ddParentOccup">
                               <option value="" selected></option>
                               <option value="State Govt.">State Govt.</option>
                               <option value="Central Govt.">Central Govt.</option>
                               <option value="Professional">Professional</option>
                               <option value="Industry">Industry</option>
                               <option value="Business">Business</option>
                               <option value="Agriculture">Agriculture</option>
                               <option value="Private Organization">Private Organization</option>
                               <option value="Small Trade">Small Trade</option>
                               <option value="Others">Others</option>
                           </select>
                     
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-md-4">
                       <div class="form-group">
                           <label>State</label> 
                           <span color="red">*</span>
                           <select id="state"  class="form-control" name="ddState"   >
                               <option value="" selected></option>
                               <option value="Others">Others</option>
                              
                               <option    value="ANDAMAN AND NICOBAR ISLANDS">
                                   ANDAMAN AND NICOBAR ISLANDS
                               </option>
                               <option    value="ANDHRA PRADESH">
                                   ANDHRA PRADESH
                               </option>
                               <option    value="ARUNACHAL PRADESH">
                                   ARUNACHAL PRADESH
                               </option>
                               <option    value="ASSAM">
                                   ASSAM
                               </option>
                               <option    value="BIHAR">
                                   BIHAR
                               </option>
                               <option    value="CHANDIGARH">
                                   CHANDIGARH
                               </option>
                               <option    value="CHHATTISGARH">
                                   CHHATTISGARH
                               </option>
                               <option    value="DADRA AND NAGAR HAVELI">
                                   DADRA AND NAGAR HAVELI
                               </option>
                               <option    value="DAMAN AND DIU">
                                   DAMAN AND DIU
                               </option>
                               <option    value="DELHI">
                                   DELHI
                               </option>
                               <option    value="GOA">
                                   GOA
                               </option>
                               <option    value="GUJARAT">
                                   GUJARAT
                               </option>
                               <option    value="HARYANA">
                                   HARYANA
                               </option>
                               <option    value="HIMACHAL PRADESH">
                                   HIMACHAL PRADESH
                               </option>
                               <option    value="JAMMU AND KASHMIR">
                                   JAMMU AND KASHMIR
                               </option>
                               <option    value="JHARKHAND">
                                   JHARKHAND
                               </option>
                               <option    value="KARNATAKA">
                                   KARNATAKA
                               </option>
                               <option    value="KERALA">
                                   KERALA
                               </option>
                               <option    value="LAKSHADWEEP">
                                   LAKSHADWEEP
                               </option>
                               <option    value="MADHYA PRADESH">
                                   MADHYA PRADESH
                               </option>
                               <option    value="MAHARASHTRA">
                                   MAHARASHTRA
                               </option>
                               <option    value="MANIPUR">
                                   MANIPUR
                               </option>
                               <option    value="MEGHALAYA">
                                   MEGHALAYA
                               </option>
                                   <option    value="MIZORAM">
                                   MIZORAM
                               </option>
                               <option    value="NAGALAND">
                                   NAGALAND
                               </option>
                               <option    value="ODISHA">
                                   ODISHA
                               </option>
                               <option    value="PUDUCHERRY">
                                   PUDUCHERRY
                               </option>
                               <option    value="PUNJAB">
                                   PUNJAB
                               </option>
                               <option    value="RAJASTHAN">
                                   RAJASTHAN
                               </option>
                               <option    value="SIKKIM">
                                   SIKKIM
                               </option>
                               <option    value="TAMIL NADU">
                                   TAMIL NADU
                               </option>
                               <option    value="Telangana">
                                   Telangana
                               </option>
                               <option    value="TRIPURA">
                                   TRIPURA
                               </option>
                               <option    value="UTTAR PRADESH">
                                   UTTAR PRADESH
                               </option>
                               <option    value="UTTARAKHAND">
                                   UTTARAKHAND
                               </option>
                               <option    value="WEST BENGAL">
                                   WEST BENGAL
                               </option>
                           </select>
                      
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="form-group">
                           <label>District</label>
                           <select id="district" class="form-control" name="ddDistrict">
                               <option value="" selected="selected">

                               </option>
                             <option    value="ARIYALUR">
                                   ARIYALUR
                               </option><option    value="CHENNAI">
                                   CHENNAI
                               </option><option    value="COIMBATORE">
                                   COIMBATORE
                               </option><option    value="CUDDALORE">
                                   CUDDALORE
                               </option><option    value="DHARMAPURI">
                                   DHARMAPURI
                               </option><option    value="DINDIGUL">
                                   DINDIGUL
                               </option><option    value="ERODE">
                                   ERODE
                               </option><option    value="KANCHIPURAM">
                                   KANCHIPURAM
                               </option><option    value="KANNIYAKUMARI">
                                   KANNIYAKUMARI
                               </option><option    value="KARUR">
                                   KARUR
                               </option><option    value="KRISHNAGIRI">
                                   KRISHNAGIRI
                               </option><option    value="MADURAI">
                                   MADURAI
                               </option><option    value="NAGAPATTINAM">
                                   NAGAPATTINAM
                               </option><option    value="NAMAKKAL">
                                   NAMAKKAL
                               </option><option    value="PERAMBALUR">
                                   PERAMBALUR
                               </option><option    value="PUDUKOTTAI">
                                   PUDUKOTTAI
                               </option><option    value="RAMANATHAPURAM">
                                   RAMANATHAPURAM
                               </option><option    value="SALEM">
                                   SALEM
                               </option><option    value="SIVAGANGAI">
                                   SIVAGANGAI
                               </option><option    value="THANJAVUR">
                                   THANJAVUR
                               </option><option    value="THENI">
                                   THENI
                               </option><option    value="THE NILGIRIS">
                                   THE NILGIRIS
                               </option><option    value="THIRUNELVELI">
                                   THIRUNELVELI
                               </option><option    value="THIRUVALLUR">
                                   THIRUVALLUR
                               </option><option    value="THIRUVANNAMALAI">
                                   THIRUVANNAMALAI
                               </option><option    value="THIRUVARUR">
                                   THIRUVARUR
                               </option><option    value="THOOTHUKUDI">
                                   THOOTHUKUDI
                               </option><option    value="TIRUCHIRAPALLI">
                                   TIRUCHIRAPALLI
                               </option><option    value="TIRUPPUR">
                                   TIRUPPUR
                               </option><option    value="VELLORE">
                                   VELLORE
                               </option><option    value="VILLUPURAM">
                                   VILLUPURAM
                               </option><option    value="VIRUDHUNAGAR">
                                   VIRUDHUNAGAR
                               </option><option    value="OTHERS">
                                   OTHERS
                               </option>
                           </select>
                       
                       </div>
                   </div>
               </div>
               <div class="row ">
                   <div class="col-md-8">
                       <div class="form-group">
                           <label>Studied VIII, IX, X, XI &amp; XII Std. in Tamil Nadu ?</label><br>
                           <label><input id="hsc_tn" name="hsc_tn"  type="radio" value="1"  >Yes</label>
                           <label><input id="hsc_tn"  name="hsc_tn"  type="radio" value="0"  >No</label>
                         
                       </div>
                   </div>


                   <div class="col-md-4">
                       &nbsp;
                   </div>
               </div>
           
               <div class="row studHdrBg">
                   <div class="col-md-12">
                       <div class="gap2">
                           <span size="2"><strong style="color:white;font-size: 14px;">ACADEMIC DETAILS</strong></span>
                       </div>
                   </div>
               </div>
             
               <div class="row top15">
                   <div class="col-md-3">
                       <div class="form-group">
                           <label>Qualifying Examination</label>
                           <select id="qualifying_exam" class="form-control" name="rbQE">
                               <option value="" selected></option>
                               <option value="HSC">HSC</option>
                               <option value="SSCE/CBSE">SSCE/CBSE</option>
                               <option value="ISCE">ISCE</option>
                               <option value="OTHERS">OTHERS</option>
                           </select>
                       </div>
                   </div>
                   <div class="col-md-5">
                       <div class="form-group">
                           <label>Name of the Board of Examination</label>
                           <select id="name_of_board" class="form-control" name="ddBoard">
                               <option value="" selected></option>
                              <option   value="Tamilnadu-Tamilnadu Board of Higher Secondary Education">
                                   Tamilnadu-Tamilnadu Board of Higher Secondary Education
                               </option><option   value="All-India Board-Central Board of Secondary Education">
                                   All-India Board-Central Board of Secondary Education
                               </option><option   value="All-India Board-Council for Indian School Certificate Examinations">
                                   All-India Board-Council for Indian School Certificate Examinations
                               </option><option   value="Andhra Pradesh-Andhra Pradesh Board of Intermediate Education">
                                   Andhra Pradesh-Andhra Pradesh Board of Intermediate Education
                               </option><option   value="Assam-Assam Higher Secondary Education Council">
                                   Assam-Assam Higher Secondary Education Council
                               </option><option   value="Bihar-Bihar Intermediate Education Council">
                                   Bihar-Bihar Intermediate Education Council
                               </option><option   value="Goa-Goa Board of Secondary &amp; Higher Secondary Education">
                                   Goa-Goa Board of Secondary &amp; Higher Secondary Education
                               </option><option   value="Gujarat-Gujarat Secondary &amp; Higher Education Board">
                                   Gujarat-Gujarat Secondary &amp; Higher Education Board
                               </option><option   value="Haryana-Haryana Board of Education">
                                   Haryana-Haryana Board of Education
                               </option><option   value="Himachal Pradesh-Himachal Pradesh Board of School Education">
                                   Himachal Pradesh-Himachal Pradesh Board of School Education
                               </option><option   value="Jammu &amp; Kashmir-J &amp; K State Board of School Education">
                                   Jammu &amp; Kashmir-J &amp; K State Board of School Education
                               </option><option   value="Karnataka-Karnataka Board of the pre-University Education">
                                   Karnataka-Karnataka Board of the pre-University Education
                               </option><option   value="Kerala-Kerala Board of Higher Secondary Examination">
                                   Kerala-Kerala Board of Higher Secondary Examination
                               </option><option   value="Maharashtra-Maharashtra State Board of Secondary and Higher Secondary Education">
                                   Maharashtra-Maharashtra State Board of Secondary and Higher Secondary Education
                               </option><option   value="Madhya Pradesh-Madhya Pradesh Board of Secondary Education">
                                   Madhya Pradesh-Madhya Pradesh Board of Secondary Education
                               </option><option   value="Manipur-Manipur Council of Higher Secondary Education">
                                   Manipur-Manipur Council of Higher Secondary Education
                               </option><option   value="Meghalaya-Meghalaya Board of School Education">
                                   Meghalaya-Meghalaya Board of School Education
                               </option><option   value="Mizoram-Mizoram Board of School Education">
                                   Mizoram-Mizoram Board of School Education
                               </option><option   value="Nagaland-Nagaland Board of School Education">
                                   Nagaland-Nagaland Board of School Education
                               </option><option   value="Orissa-Orissa Council of Higher Secondary Education">
                                   Orissa-Orissa Council of Higher Secondary Education
                               </option><option   value="Punjab-Punjab School Education Board">
                                   Punjab-Punjab School Education Board
                               </option><option   value="Rajasthan-Rajasthan Board of Secondary Education">
                                   Rajasthan-Rajasthan Board of Secondary Education
                               </option><option   value="Tripura-Tripura Board of Secondary Education">
                                   Tripura-Tripura Board of Secondary Education
                               </option><option   value="Uttar Pradesh-U.P. Board of High School &amp; Intermediate Education">
                                   Uttar Pradesh-U.P. Board of High School &amp; Intermediate Education
                               </option><option   value="West Bengal-West Bengal Council of Higher Secondary Education">
                                   West Bengal-West Bengal Council of Higher Secondary Education
                               </option><option   value="Others-Other Boards if any">
                                   Others-Other Boards if any
                               </option>
                           </select>
                        
                       </div>
                   </div>
                  
                   <div class="col-md-2">
                       <div class="form-group">
                           <label>Year of Passing</label><br>
                           <select id="year_of_passing" class="form-control">
                               <option value=""></option>
                               <option  value="2019">
                                   2019
                               </option><option  value="2018">
                                   2018
                               </option><option  value="2017">
                                   2017
                               </option><option  value="2016">
                                   2016
                               </option><option  value="2015">
                                   2015
                               </option><option  value="2014">
                                   2014
                               </option><option  value="2013">
                                   2013
                               </option><option  value="2012">
                                   2012
                               </option><option  value="2011">
                                   2011
                               </option><option  value="2010">
                                   2010
                               </option><option  value="2009">
                                   2009
                               </option><option  value="2008">
                                   2008
                               </option><option  value="2007">
                                   2007
                               </option><option  value="2006">
                                   2006
                               </option><option  value="2005">
                                   2005
                               </option><option  value="2004">
                                   2004
                               </option><option  value="2003">
                                   2003
                               </option><option  value="2002">
                                   2002
                               </option><option  value="2001">
                                   2001
                               </option><option  value="2000">
                                   2000
                               </option><option  value="1999">
                                   1999
                               </option><option  value="1998">
                                   1998
                               </option><option  value="1997">
                                   1997
                               </option><option  value="1996">
                                   1996
                               </option><option  value="1995">
                                   1995
                               </option><option  value="1994">
                                   1994
                               </option><option  value="1993">
                                   1993
                               </option><option  value="1992">
                                   1992
                               </option><option  value="1991">
                                   1991
                               </option><option  value="1990">
                                   1990
                               </option><option  value="1989">
                                   1989
                               </option><option  value="1988">
                                   1988
                               </option><option  value="1987">
                                   1987
                               </option><option  value="1986">
                                   1986
                               </option><option  value="1985">
                                   1985
                               </option><option  value="1984">
                                   1984
                               </option><option  value="1983">
                                   1983
                               </option><option  value="1982">
                                   1982
                               </option><option  value="1981">
                                   1981
                               </option><option  value="1980">
                                   1980
                               </option>
                           </select>
                       
                       </div>
                   </div>
               </div>
               <div class="row">
                   <div class="col-md-4">
                       <div class="form-group">
                         
                           <label>HSC Register Number</label>
                           <input id="hsc_reg_no" class="form-control"  type="number">
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="form-group">
                           <label>HSC Group</label><br>
                           <label>
                               <input id="hsc_group" type="radio" name="hsc_group"  value="General">
                               HSC Academic
                           </label>
                           <label>
                               
                               <input id="hsc_group" type="radio" name="hsc_group"  value="Vocational" >
                             <label >HSC Vocational</label>
                             
                           </label>
                          
                       </div>
                   </div>
                   <div class="col-md-4">
                       <div class="form-group">
                           <label>Whether +1 Passed</label><br>
                           <label><input id="eleventh_pass" type="radio" name="eleventh_pass"  value="1"  >Yes</label>
                           <label><input id="eleventh_pass" type="radio" name="eleventh_pass"  value="0"  >No</label>

                         
                       </div>
                   </div>
               </div>

               <table class="w100p" border="1" cellpadding="0" cellspacing="0">
    
                   <tbody>
                   <tr>
                       
                       
                       <td class="w25p">
                           <div class="form-group text-center">
                               <table class="w100p" cellspacing="0">
                                   <tbody><tr>
                                       <td colspan="3">
                                           <div style="text-align: center;">
                                               <label  >Physics</label>
                                             
                                            
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="w50p">
                                           <div style="text-align: center;">
                                               <input id="physics_m"  type="number" style="width:90px;"   maxlength="3" name="txtSubj1"  class="form-control text-center txtMarkSize">
                                              
                                             
                                           </div>
                                       </td>
                                       <td>
                                           
                                       </td>
                                       <td class="w50p">
                                           <div style="text-align: center;">
                                              
                                               <select id="physics_t"  name="ddSubj1MaxMark" class="form-control text-center txtMarkSize " >
                                                   <option value="100"  selected>100</option>
                                                   <option value="150" >150</option>
                                                   <option value="200" >200</option>
                                                   <option value="300" >300</option>
                                                   <option value="400" >400</option>
                                               </select>

                                          

                                           </div>
                                       </td>
                                   </tr>
                               </tbody></table>

                           </div>

                       </td>
                       <td class="w25p">
                           <div class="form-group text-center">
                               <table cellspacing="0" class="w100p">
                                   <tbody><tr>
                                       <td colspan="3">
                                           <span>
                                               <label  >Chemistry</label>
                                           
                                           </span>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="w50p ">
                                           <div style="text-align: center;">
                                               <input id="chemistry_m" type="number" maxlength="3" name="chemistry_m"  class="form-control text-center txtMarkSize" style="width:90px;">
                                            
                                           </div>
                                       </td>
                                       <td>/</td>
                                       <td class="w50p">
                                           <div style="text-align: center;">
                                            
                                               <select  id="chemistry_t" name="chemistry_t" class="form-control text-center txtMarkSize "   >
                                                
                                                   <option value="100" selected>100</option>
                                                   <option value="150" >150</option>
                                                   <option value="200" >200</option>
                                                   <option value="300" >300</option>
                                                   <option value="400" >400</option>
                                               </select>
                                             
                                           </div>
                                       </td>
                                   </tr>

                               </tbody></table>



                           </div>
                       </td>
                       <td class="w25p">
                           <div class="form-group">
                               <table class="w100p">
                                   <tbody><tr>
                                       <td colspan="3">
                                           <div style="text-align: center;">
                                               <label  >Maths</label>
                
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="w50p">
                                           <div style="text-align: center;">
                                               <input id="maths_m" style="width:90px;" type="number"  maxlength="3" name="maths_m"  class="form-control text-center txtMarkSize ">
                                            
                                           </div>
                                       </td>
                                       <td>/</td>
                                       <td class="w50p">
                                           <div style="text-align: center;">
                                          
                                               <select id="maths_t"  name="maths_t" class="form-control text-center txtMarkSize "   >
                                        
                                                <option value="100"  selected>100</option>
                                                   <option value="150" >150</option>
                                                   <option value="200" >200</option>
                                                   <option value="300" >300</option>
                                                   <option value="400" >400</option>
                                               </select>
                                              
                                           </div>
                                       </td>
                                   </tr>
                               </tbody></table>


                           </div>
                       </td>
                       <td class="w25p">
                           <div class="form-group text-center">

                               <table class="w100p" cellspacing="0">
                                   <tbody><tr>
                                       <td colspan="3">
                                           <div style="text-align: center;">
                                               <label  >Optional</label>
                                             
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="w50p">
                                           <div style="text-align: center;">
                                               
                                               <input id="optional_m" style="width:90px;" type="number" maxlength="3" name="optional_m"  class="form-control text-center txtMarkSize">
                                             
                                           </div>
                                       </td>
                                       <td>/</td>
                                       <td class="w50p">
                                           <div style="text-align: center;">
                                            
                                               <select id="optional_t"  name="optional_t" class="form-control text-center txtMarkSize">
                                                
                                                   <option value="100"  selected>100</option>
                                                   <option value="150" >150</option>
                                                   <option value="200" >200</option>
                                                   <option value="300" >300</option>
                                                   <option value="400" >400</option>
                                               </select>
                                              
                                           </div>
                                       </td>
                                   </tr>
                               </tbody></table>




                           </div>
                       </td>
                   </tr>
               </tbody>
            </table>


               <div  aria-hidden="true">
                   <div class="row studHdrBg top10">
                       <div class="col-md-12">
                           <div class="gap2">
                               <span size="2" style="color:white;"><strong>SCHOLARSHIP DETAILS</strong></span>
                           </div>
                       </div>
                   </div>
                   <div class="row top15">
                       <div class="col-md-4">
                           <div class="form-group">
                               <label>Annual Income</label>
                               <select id="annual_income" class="form-control" name="ddIncome"   >
                                   <option value="" selected></option>
                                   <option value="1">Below Rs. 1,00,000</option>
                                   <option value="2">Rs. 1,00,001 - 2,50,000</option>
                                   <option value="3">Rs. 2,50,001 - 6,00,000</option>
                                   <option value="4">Above Rs. 6,00,000</option>
                               </select>
                           
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group">
                               <label>AICTE Tuition Fee Waiver (TFW) Scheme</label> <br>
                               <label><input id="aicte_tfw" type="radio"  name="aicte_tfw"  value="1">Yes</label>
                               <label><input id="aicte_tfw" type="radio"  name="aicte_tfw"  value="0">No</label>
                             
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group">
                               <label>Post Matric Scholarship (SC/ST/SCA/Converted Christians)</label><br>
                               <label><input id="pms" type="radio"  name="pms"  value="1" >Yes</label>
                               <label><input id="pms" type="radio"  name="pms"  value="0">No</label>
                             
                           </div>

                       </div>
                   </div>
                   <div class="row">
                       <div class="col-md-4">
                           <div class="form-group">
                               <label>First Graduate</label>
                               <label><input id="fg" type="radio" name="fg"  value="1">Yes</label>
                               <label><input id="fg" type="radio" name="fg"  value="0">No</label>
                       
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group">
                               <label>FG Cert Issued District</label>
                               <select id="fg_district" class="form-control" name="ddFGDistrict"  >
                                   <option value="" selected></option>
                                   <option    value="ARIYALUR">
                                       ARIYALUR
                                   </option><option    value="CHENNAI">
                                       CHENNAI
                                   </option><option    value="COIMBATORE">
                                       COIMBATORE
                                   </option><option    value="CUDDALORE">
                                       CUDDALORE
                                   </option><option    value="DHARMAPURI">
                                       DHARMAPURI
                                   </option><option    value="DINDIGUL">
                                       DINDIGUL
                                   </option><option    value="ERODE">
                                       ERODE
                                   </option><option    value="KANCHIPURAM">
                                       KANCHIPURAM
                                   </option><option    value="KANNIYAKUMARI">
                                       KANNIYAKUMARI
                                   </option><option    value="KARUR">
                                       KARUR
                                   </option><option    value="KRISHNAGIRI">
                                       KRISHNAGIRI
                                   </option><option    value="MADURAI">
                                       MADURAI
                                   </option><option    value="NAGAPATTINAM">
                                       NAGAPATTINAM
                                   </option><option    value="NAMAKKAL">
                                       NAMAKKAL
                                   </option><option    value="PERAMBALUR">
                                       PERAMBALUR
                                   </option><option    value="PUDUKOTTAI">
                                       PUDUKOTTAI
                                   </option><option    value="RAMANATHAPURAM">
                                       RAMANATHAPURAM
                                   </option><option    value="SALEM">
                                       SALEM
                                   </option><option    value="SIVAGANGAI">
                                       SIVAGANGAI
                                   </option><option    value="THANJAVUR">
                                       THANJAVUR
                                   </option><option    value="THENI">
                                       THENI
                                   </option><option    value="THE NILGIRIS">
                                       THE NILGIRIS
                                   </option><option    value="THIRUNELVELI">
                                       THIRUNELVELI
                                   </option><option    value="THIRUVALLUR">
                                       THIRUVALLUR
                                   </option><option    value="THIRUVANNAMALAI">
                                       THIRUVANNAMALAI
                                   </option><option    value="THIRUVARUR">
                                       THIRUVARUR
                                   </option><option    value="THOOTHUKUDI">
                                       THOOTHUKUDI
                                   </option><option    value="TIRUCHIRAPALLI">
                                       TIRUCHIRAPALLI
                                   </option><option    value="TIRUPPUR">
                                       TIRUPPUR
                                   </option><option    value="VELLORE">
                                       VELLORE
                                   </option><option    value="VILLUPURAM">
                                       VILLUPURAM
                                   </option><option    value="VIRUDHUNAGAR">
                                       VIRUDHUNAGAR
                                   </option><option    value="OTHERS">
                                       OTHERS
                                   </option>
                               </select>
                             
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group">
                               <label>Availed First Graduate</label>
                               <label><input id="availed_fg"  type="radio" name="availed_fg"  value="1">Yes</label>
                               <label><input id="availed_fg" type="radio" name="availed_fg"  value="0">No</label>
                              
                           </div>
                       </div>
                   </div>
               </div>
               <md-divider></md-divider>

               <div class="row studHdrBg top10">
                   <div class="col-md-12">
                       <div class="gap2">
                           <span size="2"><strong style="color:white;font-size: 14px;">APPROVAL DETAILS</strong></span>
                       </div>
                   </div>
               </div>

               <div class="col-md-5" style="margin-top:1%;">
                           <div class="form-group">
                               <label>Approve</label>
                               <label><input id="approve"  type="radio" name="approve" style="margin-left:5px;" value="1">Yes</label>
                               <label><input id="approve" type="radio" name="approve"  value="2">No</label>
                            
                           </div>
                       </div>
                      <div style="margin-left:1%;"> 
                        <label>Reason If rejected</label><br>
                        <textarea name="rejection" id="rejection_reason" style="text-indent:0px;" cols="120" rows="5"></textarea>
                        
                      </div>
             
               <div class="row top15">
                   <div class="col-md-2">&nbsp;</div>
                  
        <div style="margin:0px auto;text-align:center;">
       <button id="submit" class="btn btn-success">Submit</button>
       
       </div>
    </div>
</div>
    

    

    


<!-- <script src="AppScripts/Student.js?v=null"></script>
</script>> -->




        </div>  

    </div>

    </div>

        
    </body>


</html>