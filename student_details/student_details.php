<?php
session_start();
include '../user/head.php';
include '../user/database.php';
if(!isset($_SESSION['c_code']))
{
    $_SESSION['redirect']=$_SERVER['REQUEST_URI'];
    header("Location:/user/log_in.php");
}


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
      $("#scholarship").hide();
      $("#branch_name").hide();
      $("#category").on('change',function(){
            if($("#category").val()=="GOVERNMENT")
            {
                $("#scholarship").show();
            }
            else
            {
                $("#annual_income").val(null);
                $("#scholarship").hide();
            }
      });
      $("#delete").click(function(){
          //alert("HEllo");
          showLoading();
          $.post("delete_records.php",{
                a_no:$("#a_no").val()
          },function(data,status){
                //alert(data);
                if(data=="success")
                {
                    $("#msg").show();
                    $("#details").text("Deleted Successfully");
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    $('#msg').delay(5000).fadeOut();
                    $("#mainDiv").hide();
                    
                }
                else
                {
                    $("#msg-e").show();
                    $("#details-e").text(data);
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    $('#msg-e').delay(5000).fadeOut();
                }
                hideLoading();
          });
      });
      
      $("#update").click(function(){
        if(!validateForm())
            {
                return ;
            }
           // $("html, body").animate({ scrollTop: 0 }, "slow");
            showLoading();
        $.post("update_records.php",{
             a_no:$("#a_no").val(),
             category:$("#category").val(),
             b_code:$("#b_codeII").val(),
             name:$("#name").val(),
             dob:$("#dob").val(),
             gender:$("input[name='gender']:checked").val(),
             mobile:$("#mobile").val(),
             email:$("#email").val(),
             nationality:$("input[name='nationality']:checked").val(),
             nativity:$("input[name='nativity']:checked").val(),
             religion:$("#input").val(),
             community:$("#output").val(),
             caste_name:$("#casteop").val(),
             parent_occupation:$("#parent_occupation").val(),
             state:$("#state").val(),
             district:$("#district").val(),
             hsc_tn:$("input[name='hsc_tn']:checked").val(),
             qualifying_exam:$("#qualifying_exam").val(),
             name_of_board:$("#name_of_board").val(),
             year_of_passing:$("#year_of_passing").val(),
             hsc_reg_no:$("#hsc_reg_no").val(),
             hsc_group:$("input[name='hsc_group']:checked").val(),
             eleventh_pass:$("input[name='eleventh_pass']:checked").val(),
             physics_m:$("#physics_m").val(),
             physics_t:$("#physics_t").val(),
             chemistry_m:$("#chemistry_m").val(),
             chemistry_t:$("#chemistry_t").val(),
             maths_m:$("#maths_m").val(),
             maths_t:$("#maths_t").val(),
             optional_m:$("#optional_m").val(),
             optional_t:$("#optional_t").val(),
             annual_income:$("#category").val()=="GOVERNMENT"?$("#annual_income").val():null,
                aicte_tfw:$("#category").val()=="GOVERNMENT"?$("input[name='aicte_tfw']:checked").val():null,
                pms:$("#category").val()=="GOVERNMENT"?$("input[name='pms']:checked").val():null,
                fg:$("#category").val()=="GOVERNMENT"?$("input[name='fg']:checked").val():null,
                fg_district:$("#category").val()=="GOVERNMENT"?$("#fg_district").val():null,
                availed_fg:$("#category").val()=="GOVERNMENT"?$("input[name='availed_fg']:checked").val():null
         },function(data,status){
            //alert(data);
                hideLoading();
                if(data=="success")
                {
                    $("#msg").show();
                    $("#details").text("Updated Successfully");
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    $('#msg').delay(5000).fadeOut();
                    $("#mainDiv").hide();
                    $("#a_no").val(null);
                }
                else{
                    $("#msg-e").show();
                    $("#details-e").text(data);
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    $('#msg-e').delay(5000).fadeOut();
                }
         });
     });
     $("input[type=radio][name=hsc_group]").change(function(){
            if($("input[name=hsc_group]:checked").val()=="Vocational")
            {
                changeTOSubject();
            }
            else
            changeFROMSubject();
     });
     function changeFROMSubject(){
        //alert("JJ");
            $("#s1").text("Physics");
            $("#s2").text("Chemistry")
            $("#s3").text("Maths");
            $("#s4").text("Optional");
          //  $("#hsc_reg_no").val()
     }
     function changeTOSubject(){
        //alert("JJ");
            $("#s1").text("Maths/Physics/Chemistry");
            $("#s2").text("Theory")
            $("#s3").text("Practical I");
            $("#s4").text("Practical II");
          //  $("#hsc_reg_no").val()
     }
     $("#clear").click(function(){
            clearme(true);
     });
      function clearme(isTrue=false){
          $("#scholarship").hide();
          //$("#b_code").prop("disabled",false);
         // $("#a_no").val(null);
            if(isTrue)
            $("#a_no").val(null);
            $("input[type=number][name=a_no]").prop("disabled",false);
            $("input:radio").prop("checked", false);
            $("#branch_name").hide();
             $("#category").val(1);
            $("#name").val(null);
            $("#dob").val(null);
            //$("#gender").removeAttr("checked");
            $("#mobile").val(null);
            $("#email").val(null);
            //$("#nationality").removeAttr("checked");
            //$("#nativity").removeAttr("checked");
            $("#input").val(1);
            $("#output").val(1);
            $("#casteop").val(1);
            $("#parent_occupation").val(1);
            $("#state").val(1);
            $("#district").val(1);
            //$("#hsc_tn").removeAttr("checked");
            $("#qualifying_exam").val(1);
            $("#name_of_board").val(1);
            $("#year_of_passing").val(1);
            $("#hsc_reg_no").val(null);
            //$("#hsc_group").removeAttr("checked");
            //$("#eleventh_pass").removeAttr("checked");
            $("#physics_m").val(null);
            $("#physics_t").val(1);
            $("#chemistry_m").val(null);
            $("#chemistry_t").val(1);
            $("#maths_m").val(null);
            $("#maths_t").val(1);
            $("#optional_m").val(null);
            $("#optional_t").val(1);
            $("#annual_income").val(null);
            //$("#aicte_tfw").removeAttr("checked");
            //$("#pms").removeAttr("checked");
            //$("#fg").removeAttr("checked");
            $("#fg_district").val(1);
            //$("#availed_fg").removeAttr("checked");
            $("#mainDiv").hide();
      }
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
         clearme(false);
         $("#a_no").val($(this).val());
         $("#editBtn").click();
     });
     $("#editBtn").click(function(){
         
        if($("#a_no").val()!=="")
         {
            showLoading();
            clearme(false);
            $("#branch_name").show();
            $("#delete").show();
            $("#submit").hide();
            $("#update").show();
            $.post("get_records_ano.php",{
                a_no:$("#a_no").val()
            },function(data,status){
                hideLoading();
                if(data=="no_data")
                {
                    
                    $("#msg-e").show();
                    $("#details-e").text("Invalid App no");
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    $('#msg-e').delay(5000).fadeOut();
                    return;
                }
               // alert(data);
              //$("#b_code").prop("disabled",true);
                 $("input[type=number][name=a_no]").prop("disabled",true);
                var result= $.parseJSON(data);
                $("#mainDiv").show();
                $("#submit").hide();
                $("#update").show();
                $("#b_codeII").show();
                $.each( result, function( key, value ) { 
                    //$("#b_code").val(value['']),
                        //$("#a_no").val(value['']),
                        //console.log(value['annual_income']);
                        $("#category").val(value['catogory']),
                        $("#b_codeII").val(value['b_code']),
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
                        $("input[name='availed_fg'][value="+value['Availed_fg']+"]").prop("checked",true)
                 }); 
                 if($("#category").val()=="GOVERNMENT")
                 {
                     $("#scholarship").show();
                 }
                 if($("input[name=hsc_group]:checked").val()=="Vocational")
                 {
                     changeTOSubject();
                 }
                 else
                 changeFROMSubject();
                
            });
           
         }
         else
         {
             $("#msg-e").show();
             $("#details-e").text("Fill the Application number");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
         }
        
     });
     $("#addBtn").click(function(){
        //if(!validateForm())
        //return;
        if($("#a_no").val()=="")
        {
            $("#msg-e").show();
             $("#details-e").text("Fill the Application number");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return;
        }
        //console.log($("#b_code").val());
        if($("#b_code").val()=="")
        {
            $("#msg-e").show();
             $("#details-e").text("Select Branch");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return;
        }
        clearme(false);
        $("#mainDiv").show();
        $("#submit").show();
        $("#delete").hide();
        $("#update").hide();
        //$("#branch_name").hide();
        
     });
     function validateForm()
      {
          if($("#b_code").val()=="" || $("#b_code").val()==null)
          {
             $("#msg-e").show();
             $("#details-e").text("Select a Branch");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#a_no").val()=="")
          {
             $("#msg-e").show();
             $("#details-e").text("Fill the Application Number");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#a_no").val().length!=6)
          {
            $("#msg-e").show();
             $("#details-e").text("Wrong Application Number");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#category").val()=="" || $("#category").val()==null)
          {
            $("#msg-e").show();
             $("#details-e").text("Please Select Category");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#name").val()=="")
          {
            $("#msg-e").show();
             $("#details-e").text("Name is Required");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if(!Date.parse($("#dob").val()))
          {
            $("#msg-e").show();
             $("#details-e").text("Enter a valid Date Of Birth");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($('input[name=gender]:checked').length <=0)
          {
            $("#msg-e").show();
             $("#details-e").text("Gender is Required");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#mobile").val()=="" || ($("#mobile").val().length!=10))
          {
              console.log($("#mobile").val().length);
            $("#msg-e").show();
             $("#details-e").text("Enter a valid Mobile Number");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
          if($("#email").val()=="" || !regex.test($("#email").val()))
          {
            $("#msg-e").show();
             $("#details-e").text("Enter a Valid Email");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($('input[name=nationality]:checked').length <=0)
          {
            $("#msg-e").show();
             $("#details-e").text("Nationality is Required");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($('input[name=nativity]:checked').length <=0)
          {
            $("#msg-e").show();
             $("#details-e").text("Nativity is Required");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#input").val()=="" || $("#input").val()==null)
          {
            $("#msg-e").show();
             $("#details-e").text("Religion is Required");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#output").val()=="" ||  $("#output").val()==null)
          {
            $("#msg-e").show();
             $("#details-e").text("Community is Required");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          
          
          if($("#parent_occupation").val()=="" ||  $("#parent_occupation").val()==null)
          {
            $("#msg-e").show();
             $("#details-e").text("Parent's Occupation is Required");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#state").val()=="" ||  $("#state").val()==null)
          {
            $("#msg-e").show();
             $("#details-e").text("State is required");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#district").val()=="" ||  $("#district").val()==null)
          {
            $("#msg-e").show();
             $("#details-e").text("District is Required");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($('input[name=hsc_tn]:checked').length <=0)
          {
            $("#msg-e").show();
             $("#details-e").text("Fill Eligibility Details Fully");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#qualifying_exam").val()=="" ||  $("#qualifying_exam").val()==null)
          {
            $("#msg-e").show();
             $("#details-e").text("Qualifying exam is required");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#name_of_board").val()=="" ||  $("#name_of_board").val()==null)
          {
            $("#msg-e").show();
             $("#details-e").text("Name of the board is Required");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#year_of_passing").val()=="" ||  $("#year_of_passing").val()==null)
          {
            $("#msg-e").show();
             $("#details-e").text("Year of Passing is Required");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#hsc_reg_no").val()=="")
          {
            $("#msg-e").show();
             $("#details-e").text("HSC Reg Number is required");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#hsc_reg_no").val().length!=6)
          {
            $("#msg-e").show();
             $("#details-e").text("Wrong HSC Register Number");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($('input[name=hsc_group]:checked').length <=0)
          {
            $("#msg-e").show();
             $("#details-e").text("HSC Group is required");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($('input[name=eleventh_pass]:checked').length <=0)
          {
            $("#msg-e").show();
             $("#details-e").text("+1 Passed  is required");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#physics_m").val()=="")
          {
            $("#msg-e").show();
             $("#details-e").text("Please Fill Marks");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#physics_t").val()=="" ||  $("#physics_t").val()==null)
          {
            $("#msg-e").show();
             $("#details-e").text("Please Fill Marks");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#chemistry_m").val()=="")
          {
            $("#msg-e").show();
             $("#details-e").text("Please Fill Marks");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#chemistry_t").val()=="" ||  $("#chemistry_t").val()==null)
          {
            $("#msg-e").show();
             $("#details-e").text("Please Fill Marks");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#maths_m").val()=="")
          {
            $("#msg-e").show();
             $("#details-e").text("Please Fill Marks");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#maths_t").val()==""||  $("#maths_t").val()==null)
          {
            $("#msg-e").show();
             $("#details-e").text("Please Fill Marks");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#optional_m").val()=="")
          {
            $("#msg-e").show();
             $("#details-e").text("Please Fill Marks");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#optional_t").val()=="" ||  $("#optional_t").val()==null)
          {
            $("#msg-e").show();
             $("#details-e").text("Please Fill Marks");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if(parseInt($("#physics_m").val())>parseInt($("#physics_t").val()))
          {
              console.log($("#physics_m").val());
              console.log($("#physics_t").val());
              $("#msg-e").show();
             $("#details-e").text("Marks and Total is Wrong");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if(parseInt($("#chemistry_m").val())>parseInt($("#chemistry_t").val()))
          {
            $("#msg-e").show();
             $("#details-e").text("Marks and Total is Wrong");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if(parseInt($("#maths_m").val())>parseInt($("#maths_t").val()))
          {
            $("#msg-e").show();
             $("#details-e").text("Marks and Total is Wrong");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if(parseInt($("#optional_m").val())>parseInt($("#optional_t").val()))
          {
            $("#msg-e").show();
             $("#details-e").text("Marks and Total is Wrong");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#category").val()=="GOVERNMENT" && $("#annual_income").val()=="")
          {
            $("#msg-e").show();
             $("#details-e").text("Annual Income is Required");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#category").val()=="GOVERNMENT" && $('input[name=aicte_tfw]:checked').length <=0)
          {
            $("#msg-e").show();
             $("#details-e").text("Aicte Tution Fee waiver  is Empty");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#category").val()=="GOVERNMENT" && $('input[name=pms]:checked').length <=0)
          {
            $("#msg-e").show();
             $("#details-e").text("Post Metric Schoolarship field  is Empty");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#category").val()=="GOVERNMENT" && $('input[name=fg]:checked').length <=0)
          {
            $("#msg-e").show();
             $("#details-e").text("First Graduate Field is Empty");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#category").val()=="GOVERNMENT" && $('input[name=availed_fg]:checked').length <=0)
          {
            $("#msg-e").show();
             $("#details-e").text("Availed FG  is Empty");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          if($("#category").val()=="GOVERNMENT" && $("#fg_district").val()=="")
          {
            $("#msg-e").show();
             $("#details-e").text("Optional Total is Required");
             $("html, body").animate({ scrollTop: 0 }, "slow");
             $('#msg-e').delay(5000).fadeOut();
             return false;
          }
          return true;
          
      }
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
     $("#submit").click(function(){
            if(!validateForm())
            {
                return ;
            }
            showLoading();
             $.post("put_records.php",{
                b_code:$("#b_code").val(),
                a_no:$("#a_no").val(),
                category:$("#category").val(),
                name:$("#name").val(),
                dob:$("#dob").val(),
                gender:$("input[name='gender']:checked").val(),
                mobile:$("#mobile").val(),
                email:$("#email").val(),
                nationality:$("input[name='nationality']:checked").val(),
                nativity:$("input[name='nativity']:checked").val(),
                religion:$("#input").val(),
                community:$("#output").val(),
                caste_name:$("#casteop").val(),
                parent_occupation:$("#parent_occupation").val(),
                state:$("#state").val(),
                district:$("#district").val(),
                hsc_tn:$("input[name='hsc_tn']:checked").val(),
                qualifying_exam:$("#qualifying_exam").val(),
                name_of_board:$("#name_of_board").val(),
                year_of_passing:$("#year_of_passing").val(),
                hsc_reg_no:$("#hsc_reg_no").val(),
                hsc_group:$("input[name='hsc_group']:checked").val(),
                eleventh_pass:$("input[name='eleventh_pass']:checked").val(),
                physics_m:$("#physics_m").val(),
                physics_t:$("#physics_t").val(),
                chemistry_m:$("#chemistry_m").val(),
                chemistry_t:$("#chemistry_t").val(),
                maths_m:$("#maths_m").val(),
                maths_t:$("#maths_t").val(),
                optional_m:$("#optional_m").val(),
                optional_t:$("#optional_t").val(),
                annual_income:$("#category").val()=="GOVERNMENT"?$("#annual_income").val():null,
                aicte_tfw:$("#category").val()=="GOVERNMENT"?$("input[name='aicte_tfw']:checked").val():null,
                pms:$("#category").val()=="GOVERNMENT"?$("input[name='pms']:checked").val():null,
                fg:$("#category").val()=="GOVERNMENT"?$("input[name='fg']:checked").val():null,
                fg_district:$("#category").val()=="GOVERNMENT"?$("#fg_district").val():null,
                availed_fg:$("#category").val()=="GOVERNMENT"?$("input[name='availed_fg']:checked").val():null
         },function(data,status){
                hideLoading();
                //console.log(data);
                if(data=="success")
                {
                    if($(".tabulator-table").length==0)
                    {
                        $("#table_details").empty();
                    }
                    
                    var html="";                 
                    html+="<div class='tabulator-table' style='min-width: 480px; min-height: 1px; '>";
                    html+="<div class='tabulator-row tabulator-selectable tabular-row-odd' role='row' style='padding-left:0px;'>";
                    html+="<div class='tabulator-cell' role='gridcell' tabulator-field='SNO' title style='width:70px;text-align:center;height:32px;'>"+($(".tabulator-table").length+1)+"</div>";
                    html+="<div class='tabulator-cell' role='gridcell' tabulator-field='APP_NO' title style='width:84px;text-align:center;height:32px;'>"+$("#a_no").val()+"</div>";
                    html+="<div class='tabulator-cell' role='gridcell' tabulator-field='NAME' title style='width:174px;text-align:center;height:32px;'>"+$("#name").val()+"</div>";
                    html+="<div class='tabulator-cell' role='gridcell' tabulator-field='Status' title style='width:94px;text-align:center;height:32px;'>";
                    html+="<button class='btn btn-success' value='"+$("#a_no").val()+"' style='font-size:12px;padding:15px;height:24px;padding:0px;width:70px'>View/Edit</button></div></div></div><br>";
                    $("#table_details").append(html);
                    $("#msg").show();
                    $("#details").text("Saved Successfully");
                    $("html, body").animate({ scrollTop: 0 }, "fast");
                    $('#msg').delay(10000).fadeOut();
                    $("#mainDiv").hide();
                    $("#scholarship").hide();
                    $("#a_no").val(null);
                    
                }
                else
                {
                    $("#msg-e").show();
                    $("#details-e").text(data);
                    $("html, body").animate({ scrollTop: 0 }, "fast");
                    $('#msg-e').delay(10000).fadeOut();
                }
         });
     });
     
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
                                    
                                    $stmt->bind_param("s",$_SESSION['c_code']);
                                    if($stmt->execute())
                                    {
                                        $result=$stmt->get_result();
                                        $results=$stmt->get_result();
                                    }
                                    else
                                    die("something went wrong");    
                                }
                               else
                                {
                                    die("Something went wrong");
                                }
                          ?>
                       <select class="form-control" id="b_code" name="b_code" >
                            <option value="" disabled selected>------Select Branch------</option>
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
                       <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="SNO" title="" style="min-width: 40px; width: 70px; height: 28px;">
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
                   <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="NAME" title="" style="min-width: 40px; width: 170px; height: 28px;">
                       <div class="tabulator-col-content">
                           <div class="tabulator-col-title">NAME</div>
                           <div class="tabulator-arrow">

                           </div>
                       </div>
                   </div>
                   
                   <div class="tabulator-col tabulator-sortable" role="columnheader" aria-sort="none" tabulator-field="Status" title="" style="min-width: 40px; width: 90px; height: 28px;">
                       <div class="tabulator-col-content">
                           <div class="tabulator-col-title">
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


       <div class="col-md-8 md-whiteframe-24dp" style="border: 1px solid rgb(186, 186, 186); min-height: 100px;">

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
                       <input id="a_no" name="a_no"  type="number" class="text-center form-control" >
                   </div>
               </div>

               <div style="margin-left:20%;margin-top:1%;">
                   <button id="addBtn" class="btn btn-primary">
                       Add
                  </button>
                  <button id="editBtn" class="btn btn-primary">
                       Edit
                  </button>
                  <button id="clear" class="btn btn-danger">
                       Clear
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
           <div class="col-md-2 text-right" style="margin-left: 7%;">
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

               <div id="branch_name" class="row top5">
                <div class="col-md-2 text-right" style="margin-left: 9%;">
                        <div class="gap15">
                            <span size="4" style="margin-left:-31px"><strong>BRANCH</strong></span>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="gap5">
                        <?php 
                                if($stmt=$conn->prepare("select b_code,branch_name from branch_info where c_code=?"))
                                {
                                    
                                    $stmt->bind_param("s",$_SESSION['c_code']);
                                    if($stmt->execute())
                                    {
                                        $result=$stmt->get_result();
                                        //$results=$stmt->get_result();
                                    }
                                    else
                                    die("something went wrong");    
                                }
                               else
                                {
                                    die("Some thing went wrong");
                                }
                          ?>
                            <select id="b_codeII" class="form-control"  style="width:261px">
                            
                            <?php while($row=$result->fetch_assoc()):?>
                                <option value="<?php echo $row['b_code'] ;?>"><?php echo $row['b_code']."-".$row['branch_name'];?></option>
                            <?php endwhile ?>
                            </select>
                           
                        </div>
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
                           <div class="form-group">
                               <label>Gender</label><br>
                               <label><input id="gender"  name="gender"  type="radio" value="MALE"   >Male</label>
                               <label><input id="gender" name="gender"  type="radio" value="FEMALE"   >Female</label>
                               <label><input id="gender" name="gender"  type="radio" value="TRANSGENDER"  >Transgender</label>

                             
                           </div>
                       </div>
                   </div>

                   <div class="row">

                       <div class="col-md-4">
                           <div class="form-group">
                               <label>Mobile </label><br>
                               <input id="mobile" class="form-control" name="txtMobile" type="number">
                           
                           </div>
                       </div>
                       <div class="col-md-4">
                           <div class="form-group">
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
                           <label><input  id="nationality" type="radio" name="nationality" value="SRILANKAN_REFUGEE"  >Srilankan Refugee</label>
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
                           <select class="form-control" name="religion" id="input"  >
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
                   
                           <label>Community</label> <span color="red">*</span>
                         
                           <select  id="output" class="form-control"  name="community">
                               
                               <option value=""></option>
                               <option value="OC">OC</option>
                               <option value="BC">BC</option>
                               <option value="BCM" >BCM</option>
                               <option value="MBC/DNC">MBC/DNC</option>
                               <option value="SC">SC</option>
                               <option value="SCA">SCA</option>
                               <option value="ST">ST</option>
                               
                            </select>
                       
                       </div>
                   </div>

                   <div class="col-md-4">
                       <div class="form-group">
                           <label>Caste Name</label>
                           <select id="casteop" class="form-control"   name="caste"  >
                            
                                
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
                           <label>State</label> <span color="red">*</span>
                           <select id="state"  class="form-control" name="ddState">
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
                               <option value="2020">2020</option>
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
                               <input id="hsc_group" type="radio" name="hsc_group"  value="General"  >
                               HSC Academic
                           </label>
                           <label>
                               
                               <input id="hsc_group" type="radio" name="hsc_group"  value="Vocational"  >
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
                                               <label  id="s1"></label>
                                             
                        
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="w50p">
                                           <div style="text-align: center;">
                                               <input id="physics_m"  type="number" style="width:90px;"   maxlength="3" name="txtSubj1"   class="form-control text-center txtMarkSize">
                                              
                                             
                                           </div>
                                       </td>
                                       <td>
                                           
                                       </td>
                                       <td class="w50p">
                                           <div style="text-align: center;">
                                            
                                               <select id="physics_t"  name="ddSubj1MaxMark" class="form-control text-center txtMarkSize "  >
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
                                               <label  id="s2"></label>
            
                                           </span>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="w50p ">
                                           <div style="text-align: center;">
                                               <input id="chemistry_m" type="number" maxlength="3" name="chemistry_m"   class="form-control text-center txtMarkSize" style="width:90px;">
                                          
                                           </div>
                                       </td>
                                       <td>/</td>
                                       <td class="w50p">
                                           <div style="text-align: center;">
                                              
                                               <select  id="chemistry_t" name="chemistry_t" class="form-control text-center txtMarkSize">
                                                
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
                                               <label  id="s3"></label>
                                           
                                           </div>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td class="w50p">
                                           <div style="text-align: center;">
                                               <input id="maths_m" style="width:90px;" type="number"  maxlength="3" name="maths_m"   class="form-control text-center txtMarkSize ">
                                        
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
                                               <label id="s4" ></label>
                                        
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


               <div id="scholarship"  aria-hidden="true">
                   <div class="row studHdrBg top10">
                       <div class="col-md-12">
                           <div class="gap2">
                               <span size="2" color="white"><strong>SCHOLARSHIP DETAILS</strong></span>
                           </div>
                       </div>
                   </div>
                   <div class="row top15">
                       <div class="col-md-4">
                           <div class="form-group">
                               <label>Annual Income</label>
                               <select id="annual_income" class="form-control" name="ddIncome"   >
                                   <option value="" selected"></option>
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
             
               <div class="row top15">
                   <div class="col-md-2">&nbsp;</div>
                  
<?php $res= $conn->query("select last_date from time_limit where name='first_year_submission'"); $result=$res->fetch_assoc();?>
<?php if(strtotime($result['last_date'])>=strtotime(date("Y/m/d"))): ?>
       <button id="submit" type="submit" value="submit" style="background-color:seagreen;color:white;border-radius: 6px;
       margin-bottom: 24px;margin-top: 14px;width: 12%;padding: 5px;margin-left: 5%;">Save</button>

      <button id="update" style="background-color:rgba(6, 228, 6, 0.925);color:white;border-radius: 6px;
      margin-bottom: 24px;margin-top: 14px;width: 12%;padding: 5px;margin-left: 10%;">Update</button>

       <button id="delete" style="background-color:rgb(185, 12, 12);color:white;border-radius: 6px;
       margin-bottom: 24px;margin-top: 14px;width: 12%;padding: 5px;margin-left: 10%;">Delete</button>
       <?php endif ?>
       
    </div>
</div>
    

    <script>
        function submitFunction(){
        alert("Form has been Submitted successfully");
        }
        function updateFunction(){
        alert("Form has been updated Successfully");
       }
        function deleteFunction(){
         alert("Form has been deleted Successfully");
       }
       </script>

    <script type="text/javascript"> 
      function random(s1,s2)
      {

          var s1 = document.getElementById(s1);
          var s2 = document.getElementById(s2);
          s2.options.length = 0;
          var newOption;
          var option;
          var optionArray;
          s2.innerHtml = "";
           
          if(s1.value == "Hindu" || s1.value == "Christian" || s1.value == "Sikhism" || s1.value == "Buddhism" || s1.value =="Jainism" || s1.value=="Others"){
              optionArray = ["|","OC|OC","BC|BC","SC|SC","ST|ST","SCA|SCA","MBC/DNC|MBC/DNC"];
          }
        
          else{
              optionArray = [];
          }

          for(option in optionArray){
                var pair = optionArray[option].split("|");
                newOption = document.createElement("option");
                newOption.value = pair[0];
                newOption.innerHTML = pair[1];
                s2.options.add(newOption);        
          }
         

        // var a=document.getElementById('input').value;
        //   if(a=="Hindu")
        //   {
        //       var array=["OC","BC","SC","ST","SCA","MBC/DNC"];
        //   }
        //   else if(a=="Christian"){
        //       var array=["OC","BC","SC","ST","SCA","MBC/DNC"];
        //   }
        //   else if(a=="Muslim")
        //   {
        //       var array=[];
        //   }

        //   var "";
        //   for(i=0;i<array.length;i++){
        //       = "<option>"+"</option>";
        //   }
        //   = "<select name='ddCommunity'>"+"</select>";
        //   document.getElementById('output').innerHTML = 


      }
    </script>  
    
    <script type="text/javascript">
       function populate(s1,s2){
           var s1 = document.getElementById(s1);
           var s2 = document.getElementById(s2); 
           s2.options.length = 0;
           var newOption;
           var option;
           var optionArray;   
           s2.innerHTML = "";

           if(s1.value=="OC"){
               optionArray = ["Others-539|Others-539"];
           }  
           else if(s1.value == "BC"){
               optionArray = ["|","Adhaviyar-470|Adhaviyar-470","Agamudayar-279|Agamudayar-279","Agaram Vellan Chettiar-281|Agaram Vellan Chettiar-281","Alavar-284|Alavar-284","Alwar-282|Alwar-282","Anuppa Gounder-325|Anuppa Gounder-325",
               "Archakarai Vellala-287|Archakarai Vellala-287","Aryavathi-288|Aryavathi-288","Asthanthra Golla-525|Asthanthra Golla-525","Ayira Vaisyar-289|Ayira Vaisyar-289","Azhavar-283|Azhavar-283","Badagar-290|Badagar-290","Billava-291|Billava-291",
               "Bondil-292|Bondil-292","Boyas-293|Boyas-293","C.S.I. formerly S.I.U.C.-308|C.S.I. formerly S.I.U.C.-308","Chakkala-298|Chakkala-298",
               "Chavalakarar-299|Chavalakarar-299","Chekkalar-503|Chekkalar-503","Chendalai Gounder-396|Chendalai Gounder-396","Chettu or Chetty-300|Chettu or Chetty-300","Chowdry.-306|Chowdry.-306",
               "Christian Gramani-428|Christian Gramani-428","Christian Nadar-426|Christian Nadar-426","Christian Shanar-430|Christian Shanar-430","Converts to Christianity from any Hindu BC or MBC or DC-528|Converts to Christianity from any Hindu BC or MBC or DC-528",
               "Converts to Christianity from Scheduled Castes-307|Converts to Christianity from Scheduled Castes-307","Dasapalanjika-367|Dasapalanjika-367","Devangar, Sedar-310|Devangar, Sedar-310","Dombs-312|Dombs-312","Donga Dasaris-309|Donga Dasaris-309","Easanattu Kallar-342|Easanattu Kallar-342",
               "Elur Chetty-302|Elur Chetty-302","Enadi-313|Enadi-313","Ezhavathy-314|Ezhavathy-314","Ezhuthachar-315|Ezhuthachar-315","Ezhuva-316|Ezhuva-316","Ezhuvar-330|Ezhuvar-330","Gammala-323|Gammala-323","Gandarvakottai Kallars-343|Gandarvakottai Kallars-343","Gandla-500|Gandla-500","Gangavar-317|Gangavar-317","Ganika-501|Ganika-501","Gavara-318|Gavara-318","Gavarai-319|Gavarai-319","Golla-524|Golla-524",
               "Gounder-321|Gounder-321","Gowda-322|Gowda-322","Gowda-517|Gowda-517","Gramani-427|Gramani-427","Hegde-326|Hegde-326","Idaiyar-521|Idaiyar-521","Idiga-327|Idiga-327","Illathar-331|Illathar-331","Illathu Pillaimar-328|Illathu Pillaimar-328","Illuvar-329|Illuvar-329","including Sozha Vellalar-476|including Sozha Vellalar-476","Jhetty-332|Jhetty-332","Jogis-333|Jogis-333","Kabbera-334|Kabbera-334","Kaikatti Karuneegar-374|Kaikatti Karuneegar-374",
               "Kaikolar-335|Kaikolar-335","Kal Thacher-358|Kal Thacher-358","Kaladi-337|Kaladi-337","Kalali-324|Kalali-324","Kalari Kurup-338|Kalari Kurup-338","Kalari Panicker-339|Kalari Panicker-339","Kalingi-340|Kalingi-340","Kallar Kula Thondaman-347|Kallar Kula Thondaman-347","Kallar-341|Kallar-341","Kaloddars-296|Kaloddars-296","Kalveli Gounder-348|Kalveli Gounder-348","Kammalar or Viswakarma-350|Kammalar or Viswakarma-350","Kamsala-359|Kamsala-359","Kani-361|Kani-361",
               "Kanisu-362|Kanisu-362","Kaniyala Vellalar-364|Kaniyala Vellalar-364","Kaniyar  Panicker-363|Kaniyar  Panicker-363","Kannada Saineegar-365|Kannada Saineegar-365","Kannadiya Naidu-368|Kannadiya Naidu-368","Kannadiyar-366|Kannadiyar-366","Kannar-354|Kannar-354","Kappiliya-514|Kappiliya-514","Kappiliyar-513|Kappiliyar-513","Karpoora Chettiar-369|Karpoora Chettiar-369",
               "Karumar-355|Karumar-355","Karumaravars Appanad Kondayam Kottai Maravars-417|Karumaravars Appanad Kondayam Kottai Maravars-417","Karuneegar-370|Karuneegar-370","Kasukkara Chettiar-378|Kasukkara Chettiar-378","Katesar-379|Katesar-379","Kathikarar in Kanniyakumari District-444|Kathikarar in Kanniyakumari District-444","Kavuthiyar-381|Kavuthiyar-381","Keeraikarar-479|Keeraikarar-479","Kerala Mudali-382|Kerala Mudali-382","Kharvi-383|Kharvi-383","Khatri-384|Khatri-384","Kodikalkarar-478|Kodikalkarar-478","Kollar-356|Kollar-356","Kongu Vaishnava-385|Kongu Vaishnava-385",
               "Kongu Vellalars-386|Kongu Vellalars-386","Kootappal Kallars-344|Kootappal Kallars-344","Koppala Velama-401|Koppala Velama-401","Koteyar-402|Koteyar-402","Kottar Chetty-301|Kottar Chetty-301","Krishnanvaka-403|Krishnanvaka-403","Kudikara Vellalar-404|Kudikara Vellalar-404","Kudumbi-405|Kudumbi-405","Kuga Vellalar-406|Kuga Vellalar-406","Kunchidigar-407|Kunchidigar-407","Lambadi-410|Lambadi-410","Latin Catholics-409|Latin Catholics-409","Latin Catholics  except Latin Catholic Vannar-408|Latin Catholics  except Latin Catholic Vannar-408","Lingayat (Jangama)-411|Lingayat (Jangama)-411","Mahratta (Non-Brahmin)-412|Mahratta (Non-Brahmin)-412","Malayamar-449|Malayamar-449","Malayar-413|Malayar-413","Male-414|Male-414","Maniagar-415|Maniagar-415","Maravars-416|Maravars-416","Mathuvazhi Kanakkar-375|Mathuvazhi Kanakkar-375","Moondrumandai Enbathunalu (84) Ur. Sozhia Vellalar-419|Moondrumandai Enbathunalu (84) Ur. Sozhia Vellalar-419",
               "Moopanar-450|Moopanar-450","Mooppan-420|Mooppan-420","Mutharaiyar-424|Mutharaiyar-424","Muthuracha-422|Muthuracha-422","Muthuraja-421|Muthuraja-421","Muttiriyar-423|Muttiriyar-423","Nadar-425|Nadar-425","Nagaram-431|Nagaram-431","Naikkar-432|Naikkar-432","Nainar-451|Nainar-451","Nangudi Vellalar-433|Nangudi Vellalar-433","Nanjil Mudali-434|Nanjil Mudali-434","Narambukkatti Gounder-389|Narambukkatti Gounder-389","Nathamar-448|Nathamar-448","Nattu Gounder-388|Nattu Gounder-388","Nellorepet Oddars-297|Nellorepet Oddars-297","Nulayar-286|Nulayar-286","O.P.S. Vellalar-438|O.P.S. Vellalar-438","Odar-435|Odar-435","Oddars-295|Oddars-295","Odiya-436|Odiya-436","Okkaliga Gowda-515|Okkaliga Gowda-515","Okkaligar-512|Okkaligar-512","Okkaliya Gowda-516|Okkaliya Gowda-516","Okkaliya Gowder-518|Okkaliya Gowder-518","Oottruvalanattu Vellalar-437|Oottruvalanattu Vellalar-437","Orphans and destitute Children-529|Orphans and destitute Children-529","Orudaya Gounder or Oorudaya  Gounder-492|Orudaya Gounder or Oorudaya  Gounder-492","Ovachar-439|Ovachar-439","Padaithalai Gounder-395|Padaithalai Gounder-395","Padmasaliyar-467|Padmasaliyar-467","Paiyur Kotta Vellalar-440|Paiyur Kotta Vellalar-440",
               "Pala Gounder-392|Pala Gounder-392","Pala Vellala Gounder-398|Pala Vellala Gounder-398","Pamulu-441|Pamulu-441","Panar-442|Panar-442","Pandiya Vellalar-443|Pandiya Vellalar-443","Pannirandam Chettiar or Uthama Chettiar-445|Pannirandam Chettiar or Uthama Chettiar-445","Parkavakulam-446|Parkavakulam-446","Pathira Chetty-303|Pathira Chetty-303","Pattamkatti-380|Pattamkatti-380","Pattariyar-469|Pattariyar-469","Pattusaliyar-468|Pattusaliyar-468","Pavalankatti Vellala Gounder-397|Pavalankatti Vellala Gounder-397","Pedda Boyar-294|Pedda Boyar-294","Perike-452|Perike-452","Periya Sooriyur Kallars-346|Periya Sooriyur Kallars-346","Perumkollar-453|Perumkollar-453","Piramalai Kallars-345|Piramalai Kallars-345","Podikara Vellalar-454|Podikara Vellalar-454","Pooluva Gounder-455|Pooluva Gounder-455","Poosari Gounder-393|Poosari Gounder-393","Poraya-456|Poraya-456","Porkollar-353|Porkollar-353","Pudukadai Chetty-305|Pudukadai Chetty-305","Pulavar-457|Pulavar-457","Pulluvar or Pooluvar-458|Pulluvar or Pooluvar-458","Pusala-459|Pusala-459","Rathinagiri Gounder-400|Rathinagiri Gounder-400","Reddy-460|Reddy-460","Sadhu Chetty-461|Sadhu Chetty-461","Sagara-490|Sagara-490","Sakkaravar or Kavathi-464|Sakkaravar or Kavathi-464","Salivagana-465|Salivagana-465","Saliyar-466|Saliyar-466","Sanku Vellala Gounder-399|Sanku Vellala Gounder-399","Sarattu Karuneegar-373|Sarattu Karuneegar-373","Savalakkarar-471|Savalakkarar-471","Sedar-311|Sedar-311","Seer Karuneegar-371|Seer Karuneegar-371","Sembanad Maravars-418|Sembanad Maravars-418","Senaithalaivar, Senaikudiyar and Illaivaniar-472|Senaithalaivar, Senaikudiyar and Illaivaniar-472","Sengunthar-336|Sengunthar-336","Serakula Vellalar-473|Serakula Vellalar-473","Servai-285|Servai-285","Shanar-429|Shanar-429","Sourashtra (Patnulkarar)-474|Sourashtra (Patnulkarar)-474",
               "Sozhi Kanakkar-376|Sozhi Kanakkar-376","Sozhiavellalar-475|Sozhiavellalar-475","Sri Karuneegar-372|Sri Karuneegar-372","Srisayar-480|Srisayar-480","Sundaram Chetty-481|Sundaram Chetty-481","Sunnambu Karuneegar-377|Sunnambu Karuneegar-377","Surithimar-447|Surithimar-447","Telikula-502|Telikula-502","Telugu Chetty-462|Telugu Chetty-462","Thacher-357|Thacher-357","Thattar-352|Thattar-352","Thogatta Veerakshatriya-482|Thogatta Veerakshatriya-482","Tholkollar-483|Tholkollar-483","Tholuva Naicker-484|Tholuva Naicker-484","Thondu Vellalar-391|Thondu Vellalar-391","Thoriyar-486|Thoriyar-486","Thozhu or Thuluva Vellala-280|Thozhu or Thuluva Vellala-280","Tirumudi Vellalar-390|Tirumudi Vellalar-390","Twenty four Manai Telugu Chetty-463|Twenty four Manai Telugu Chetty-463","Ukkirakula Kshatriya Naicker-487|Ukkirakula Kshatriya Naicker-487","Uppara-488|Uppara-488","Uppillia-489|Uppillia-489","Urali Gounder-491|Urali Gounder-491","Urikkara Nayakkar-493|Urikkara Nayakkar-493","Vaduga Ayar-522|Vaduga Ayar-522","Vaduga Idaiyar-523|Vaduga Idaiyar-523","Vadugar-320|Vadugar-320","Vakkaligar-511|Vakkaligar-511","Valayalchetty-304|Valayalchetty-304","Vallambar-495|Vallambar-495","Vallanattu Chettiar-496|Vallanattu Chettiar-496","Valmiki-497|Valmiki-497","Vania Chettiar-499|Vania Chettiar-499","Vaniyar-498|Vaniyar-498","Vedar-505|Vedar-505","Veduvar-504|Veduvar-504","Veerasaiva-506|Veerasaiva-506","Velar-507|Velar-507",
               "Vellala Gounder-387|Vellala Gounder-387","Vellan Chettiar-508|Vellan Chettiar-508","Veluthodathu Nair-509|Veluthodathu Nair-509","Vetalakara Naicker-485|Vetalakara Naicker-485","Vetrilaikarar-477|Vetrilaikarar-477","Virakodi Vellala-494|Virakodi Vellala-494","Viswabrahmin-360|Viswabrahmin-360","Viswakarmala-351|Viswakarmala-351","Vokkaligar-510|Vokkaligar-510","Wynad Chetty-519|Wynad Chetty-519","Yadhava-520|Yadhava-520","Yavana-526|Yavana-526","Yerukula-527|Yerukula-527"];
           }
           else if(s1.value == "MBC/DNC"){
               optionArray = ["|","Agasa-202|Agasa-202","Agnikula Kshatriya-174|Agnikula Kshatriya-174","Ambalakarar-126|Ambalakarar-126","Ambalakarar (DNC)-214|Ambalakarar (DNC)-214","Ambalakarar (Suriyanur, Tiruchirapalli District).(DNC)-215|Ambalakarar (Suriyanur, Tiruchirapalli District).(DNC)-215","Andipandaram-127|Andipandaram-127","Appanad Kondayam Kottai Maravar (DNC)-213|Appanad Kondayam Kottai Maravar (DNC)-213","Arayar-128|Arayar-128","Attur Kilnad Koravars (DNC)-211|Attur Kilnad Koravars (DNC)-211","Attur Melnad Koravars (DNC)-212|Attur Melnad Koravars (DNC)-212","Battu Turkas (DNC)-217|Battu Turkas (DNC)-217","Bestha-129|Bestha-129","Bhatraju (Other than Kshatriya Raju)-131|Bhatraju (Other than Kshatriya Raju)-131","Boyar-132|Boyar-132","Boyas (DNC)-216|Boyas (DNC)-216","C.K. Koravars (DNC)-218|C.K. Koravars (DNC)-218","Chakkala (DNC)-219|Chakkala (DNC)-219","Changayampudi Koravars (DNC)-220|Changayampudi Koravars (DNC)-220",
               "Chattadi-186|Chattadi-186","Chettinad Valayars-200|Chettinad Valayars-200","Chettinad Valayars (DNC)-221|Chettinad Valayars (DNC)-221","Dabi Koravars (DNC)-229|Dabi Koravars (DNC)-229","Dasari-134|Dasari-134","Devagudi Talayaris (DNC)-227|Devagudi Talayaris (DNC)-227","Dobba Koravars (DNC)-223|Dobba Koravars (DNC)-223","Dobbai Korachas (DNC)-228|Dobbai Korachas (DNC)-228","Dombs (DNC)-222|Dombs (DNC)-222","Dommara-135|Dommara-135","Dommars (DNC)-224|Dommars (DNC)-224","Donga Boya (DNC)-225|Donga Boya (DNC)-225","Donga Dasaris (DNC)-230|Donga Dasaris (DNC)-230","Donga Ur.Korachas (DNC)-226|Donga Ur.Korachas (DNC)-226","Ekali-204|Ekali-204","Eravallar-136|Eravallar-136","Erragalor-195|Erragalor-195","Gandarvakottai Kallars (DNC)-234|Gandarvakottai Kallars (DNC)-234","Gandarvakottai Koravars (DNC)-233|Gandarvakottai Koravars (DNC)-233","Gollavar-192|Gollavar-192","Gorrela Dodda Boya (DNC)-231|Gorrela Dodda Boya (DNC)-231","Gounder-170|Gounder-170","Gudu Dasaris (DNC)-232|Gudu Dasaris (DNC)-232",
               "Inji Koravars (DNC)-235|Inji Koravars (DNC)-235","Isaivellalar-137|Isaivellalar-137","Jambavanodai (DNC)-237|Jambavanodai (DNC)-237","Jambuvanodai-138|Jambuvanodai-138","Jangam-139|Jangam-139","Jogi-140|Jogi-140","Jogis (DNC)-236|Jogis (DNC)-236","Kal Oddars (DNC)-239|Kal Oddars (DNC)-239","Kala Koravars (DNC)-243|Kala Koravars (DNC)-243","Kaladis (DNC)-238|Kaladis (DNC)-238","Kalavathila Boyas (DNC)-244|Kalavathila Boyas (DNC)-244","Kalinji Dabikoravars (DNC)-241|Kalinji Dabikoravars (DNC)-241","Kander-171|Kander-171","Kepmaris (DNC)-245|Kepmaris (DNC)-245","Kongu Chettiar-141|Kongu Chettiar-141","Kootappal Kallars (DNC)-242|Kootappal Kallars (DNC)-242","Koracha-142|Koracha-142","Koravars (DNC)-240|Koravars (DNC)-240","Kulala-143|Kulala-143","Kumbarar-145|Kumbarar-145","Kunnuvar Mannadi-146|Kunnuvar Mannadi-146","Kuruhini Chetty-148|Kuruhini Chetty-148","Kurumba Gounder-147|Kurumba Gounder-147","Kuyavar-144|Kuyavar-144","Latin catholics christian vannar-149|Latin catholics christian vannar-149",
               "Madivala-203|Madivala-203","Mahendra-158|Mahendra-158","Mangala-152|Mangala-152","Maravars (DNC)-246|Maravars (DNC)-246","Maruthuvar-150|Maruthuvar-150","Medara-159|Medara-159","Meenavar-177|Meenavar-177","Mond Golla-156|Mond Golla-156","Monda Golla (DNC)-248|Monda Golla (DNC)-248","Monda Koravars (DNC)-247|Monda Koravars (DNC)-247","Moundadan Chetty-157|Moundadan Chetty-157","Mukkuvar or Mukayar-181|Mukkuvar or Mukayar-181","Mutlakampatti (DNC)-249|Mutlakampatti (DNC)-249","Mutlakampatti-161|Mutlakampatti-161","Narikoravar(Kuruvikars)-162|Narikoravar(Kuruvikars)-162","Navithar-151|Navithar-151","Nellorepet Oddars (DNC)-251|Nellorepet Oddars (DNC)-251","Nokkar-163|Nokkar-163","Nokkars (DNC)-250|Nokkars (DNC)-250","Oddar-133|Oddar-133","Oddars (DNC)-252|Oddars (DNC)-252","Padayachi-172|Padayachi-172","Padayachi (DNC)-257|Padayachi (DNC)-257","Palli-173|Palli-173","Panisaivan-164|Panisaivan-164","Panisivan-165|Panisivan-165","Pannayar-183|Pannayar-183","Paravar-175|Paravar-175","Paravar converts to Christianity-176|Paravar converts to Christianity-176","Parvatharajakulam-178|Parvatharajakulam-178","Pattanavar-179|Pattanavar-179","Pedda Boyas (DNC)-253|Pedda Boyas (DNC)-253","Peria Suriyur Kallars (DNC)-256|Peria Suriyur Kallars (DNC)-256","Piramalai Kallars (DNC)-255|Piramalai Kallars (DNC)-255",
               "Ponnai Koravars-254|Ponnai Koravars-254","Pronopakari-155|Pronopakari-155","Punnan Vettuva Gounder (DNC)-258|Punnan Vettuva Gounder (DNC)-258","Punnan Vettuva Gounder-182|Punnan Vettuva Gounder-182","Rajaka-207|Rajaka-207","Rajakambalam-191|Rajakambalam-191","Rajakula-205|Rajakula-205","Sakkaraithamadai Koravars (DNC)-262|Sakkaraithamadai Koravars (DNC)-262","Salem Melnad Koravars (DNC)-260|Salem Melnad Koravars (DNC)-260","Salem Uppu Koravars (DNC)-261|Salem Uppu Koravars (DNC)-261","Saranga Palli Koravars (DNC)-263|Saranga Palli Koravars (DNC)-263","Sathani-185|Sathani-185","Sathatha Srivaishnava-184|Sathatha Srivaishnava-184","Sembadavar-180|Sembadavar-180","Sembanad Maravars (DNC)-265|Sembanad Maravars (DNC)-265","Servai (DNC)-259|Servai (DNC)-259","Sillavar-193|Sillavar-193","Siviar-130|Siviar-130","Sooramari Oddars (DNC)-264|Sooramari Oddars (DNC)-264","Sozhia Chetty-188|Sozhia Chetty-188","Srivaishnava-187|Srivaishnava-187","Telugupatty Chetty-189|Telugupatty Chetty-189","Thalli Koravars (DNC)-266|Thalli Koravars (DNC)-266","Thelungapatti Chettis (DNC)-267|Thelungapatti Chettis (DNC)-267","Thockalavar Thozhuva Naicker-194|Thockalavar Thozhuva Naicker-194","Thogamalai Koravars or Kepmaris (DNC)-269|Thogamalai Koravars or Kepmaris (DNC)-269","Thondaman-196|Thondaman-196","Thoraiyar(Nilgris)-197|Thoraiyar(Nilgris)-197","Thoraiyar(Plains)-198|Thoraiyar(Plains)-198","Thottia Naicker-190|Thottia Naicker-190","Thottia Naickers (DNC)-268|Thottia Naickers (DNC)-268","Transgender-160|Transgender-160","Uppukoravars or Settipalli Koravars (DNC)-270|Uppukoravars or Settipalli Koravars (DNC)-270","Urali Gounders (DNC)-271|Urali Gounders (DNC)-271","Vaduvarpatti Koravars (DNC)-273|Vaduvarpatti Koravars (DNC)-273","Valaiyar-199|Valaiyar-199","Valayars-274|Valayars-274",
               "Vannar (Salavai Thozhilalar)-201|Vannar (Salavai Thozhilalar)-201","Vannia Gounder-169|Vannia Gounder-169","Vanniya-168|Vanniya-168","Vanniyakula Kshatriya-166|Vanniyakula Kshatriya-166","Vanniyar-167|Vanniyar-167","Varaganeri Koravars-277|Varaganeri Koravars-277","Velakatalanair-154|Velakatalanair-154","Velakattalavar-153|Velakattalavar-153","Veluthadar-206|Veluthadar-206","Vetta Koravars-276|Vetta Koravars-276","Vettaikarar-275|Vettaikarar-275","Vettaikarar-208|Vettaikarar-208","Vettuva Gounder-278|Vettuva Gounder-278","Vettuva Gounder-209|Vettuva Gounder-209","Wayalpad or Nawalpeta Korachas (DNC)-272|Wayalpad or Nawalpeta Korachas (DNC)-272","Yogeeswarar-210|Yogeeswarar-210"];
           }
           else if(s1.value == "SC"){
                optionArray = ["|","Adi-Dravida-41|Adi-Dravida-41","Adi-Karnataka-42|Adi-Karnataka-42","Ajila-43|Ajila-43","Ayyanavar-44|Ayyanavar-44","Baira-45|Baira-45","Bakuda-46|Bakuda-46","Bandi-47|Bandi-47","Bellara-48|Bellara-48","Bharatar-49|Bharatar-49","Chalavadi-50|Chalavadi-50","Chamar, Muchi-51|Chamar, Muchi-51","Chandala-52|Chandala-52","Cheramar-101|Cheramar-101","Cheruman-53|Cheruman-53","Devendrakulathan-54|Devendrakulathan-54","Dom-55|Dom-55","Domban-59|Domban-59","Dombara-56|Dombara-56","Godagali-60|Godagali-60","Godda-61|Godda-61","Gosangi-62|Gosangi-62","Holeya-63|Holeya-63","Jaggali-64|Jaggali-64","Jambuvulu-65|Jambuvulu-65","Kadaiyan-66|Kadaiyan-66","Kakkalan-67|Kakkalan-67","Kalladi-68|Kalladi-68","Kanakkan-69|Kanakkan-69","Karimpalan-71|Karimpalan-71","Kavara-72|Kavara-72","Koliyan-73|Koliyan-73","Koodan-76|Koodan-76","Koosa-74|Koosa-74","Kootan-75|Kootan-75","Kudumban-77|Kudumban-77","Kuravan, Sidhanar-78|Kuravan, Sidhanar-78","Maila-79|Maila-79","Mala-80|Mala-80","Mannan-81|Mannan-81","Mavilan-82|Mavilan-82","Moger-83|Moger-83",
                "Mundala-84|Mundala-84","Nalakeyava-85|Nalakeyava-85","Nayadi-86|Nayadi-86","Padanna-70|Padanna-70","Padannan-87|Padannan-87","Paidi-57|Paidi-57","Pallan-88|Pallan-88","Pambada-90|Pambada-90","Panan-91|Panan-91","Panchama-92|Panchama-92","Pannadi-93|Pannadi-93","Panniandi-94|Panniandi-94","Pano-58|Pano-58","Paraiyan,-95|Paraiyan,-95","Paravan-98|Paravan-98","Parayan-96|Parayan-96","Pathiyan-99|Pathiyan-99","Pulayan-100|Pulayan-100","Pulluvan-89|Pulluvan-89","Puthirai Vannan-102|Puthirai Vannan-102","Raneyar-103|Raneyar-103","Samagara-104|Samagara-104","Samban-105|Samban-105","Sambavar-97|Sambavar-97","Sapari-106|Sapari-106","Semman-107|Semman-107","Thandan-108|Thandan-108","Tiruvalluvar-109|Tiruvalluvar-109","Vallon-110|Vallon-110","Valluvan-111|Valluvan-111","Vannan-112|Vannan-112","Vathiriyan-113|Vathiriyan-113","Velan-114|Velan-114","Venganur Adi- Dravidar-40|Venganur Adi- Dravidar-40","Veppur Parayan-118|Veppur Parayan-118","Vetan-115|Vetan-115","Vettiyan-116|Vettiyan-116","Vettuvan-117|Vettuvan-117"];
           }
           else if(s1.value == "SCA"){
               optionArray = ["|","Adi-Andhra-119|Adi-Andhra-119","Arunthathiyar-120|Arunthathiyar-120","Chakkiliyan-121|Chakkiliyan-121","Madari-122|Madari-122","Madiga-123|Madiga-123","Pagadai-124|Pagadai-124","Thoti-125|Thoti-125"];
           }
           else if(s1.value == "ST"){
               optionArray = ["|","Adiyan-1|Adiyan-1","Aranadan-2|Aranadan-2","Eravallan-3|Eravallan-3","Irular-4|Irular-4","Kadar-5|Kadar-5","Kammara-6|Kammara-6","Kanikaran-7|Kanikaran-7","Kanikkar-8|Kanikkar-8","Kaniyan-9|Kaniyan-9","Kanyan-10|Kanyan-10","Kattunayakan-11|Kattunayakan-11","Kochu Velan-12|Kochu Velan-12","Konda Kapus-13|Konda Kapus-13","Kondareddis-14|Kondareddis-14","Koraga-15|Koraga-15",
               "Kota-16|Kota-16","Kudiya, Melakudi-17|Kudiya, Melakudi-17","Kurichchan-18|Kurichchan-18","Kurumans-20|Kurumans-20","Kurumbas-19|Kurumbas-19","Maha Malasar-21|Maha Malasar-21","Malai Arayan-22|Malai Arayan-22","Malai Pandaram-23|Malai Pandaram-23","Malai Vedan-24|Malai Vedan-24","Malakuravan-25|Malakuravan-25","Malasar-26|Malasar-26","Malayakandi-28|Malayakandi-28","Malayali-27|Malayali-27","Mannan-29|Mannan-29","Mudugar-30|Mudugar-30","Muduvan-31|Muduvan-31","Muthuvan-32|Muthuvan-32","Pallayan-33|Pallayan-33","Palliyan-34|Palliyan-34","Palliyar-35|Palliyar-35","Paniyan-36|Paniyan-36","Sholaga-37|Sholaga-37","Toda -38|Toda -38","Uraly-39|Uraly-39"];
           }

           for(option in optionArray)
           {
               var pair = optionArray[option].split("|");
               newOption = document.createElement("option");
               newOption.value = pair[0];
               newOption.innerHTML = pair[1];
               s2.options.add(newOption);
           }
          }
    </script>


<!-- <script src="AppScripts/Student.js?v=null"></script>
</script>> -->
<link href="tabulator-master\dist\css\tabulator.css" rel="stylesheet">
<script type="text/javascript" src="tabulator-master\dist\js\tabulator.js"></script>



        </div>  

    </div>

    </div>

        
    </body>


</html>