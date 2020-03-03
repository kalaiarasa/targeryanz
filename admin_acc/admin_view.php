<?php
session_start();

if(!isset($_SESSION['admin_login']))
{
   header("Location:/admin_acc/user/login.php");
}
include '../user/database.php';
$res=$conn->query("select last_date from time_limit where name='first_year_submission'");
$result=$res->fetch_assoc();

?>

<html>
  <head>
    <title>Add College</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="loader.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <style>
    #application {
      font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }
    
    #application td, #application th {
      border: 1px solid #ddd;
      padding: 8px;
    }
    
    #application tr:nth-child(even){background-color: #f2f2f2;}
    
    #application tr:hover {background-color: #ddd;}
    
    #application th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }
    </style>
    <script>
      $(document).ready(function() {
        $("#msg").hide();
        $("#loader").hide();
        $("#lastdate").click(function() {
          if (!Date.parse($("#last_date").val())) {
            $("#msg").show();
            $("#msg")
              .removeClass("alert alert-success")
              .addClass("alert alert-danger");
            $("#msg").text("Fill the Last Date");
            $("#msg")
              .delay(5000)
              .fadeOut();
            return;
          }
          $("#loader").show();
          $.post(
            "last_date.php",
            {
              last_date: $("#last_date").val()
            },
            function(data, status) {
              $("#loader").hide();
              if (data == "success") {
                $("#msg").show();
                $("#msg")
                  .removeClass("alert alert-danger")
                  .addClass("alert alert-success");
                $("#msg").text("Updated Successfully");
                $("#msg")
                  .delay(5000)
                  .fadeOut();
              } else {
                $("#msg").show();
                $("#msg")
                  .removeClass("alert alert-success")
                  .addClass("alert alert-danger");
                $("#msg").text(data);
                $("#msg")
                  .delay(5000)
                  .fadeOut();
              }
            }
          );
        });
        $("#create_college").click(function() {
          if (
            $("#c_code").val() == "" ||
            $("#c_name").val() == "" ||
            $("#pass").val() == ""
          ) {
            $("#msg").show();
            $("#msg")
              .removeClass("alert alert-success")
              .addClass("alert alert-danger");
            $("#msg").text("Fill All Fields");
            $("#msg")
              .delay(5000)
              .fadeOut();
            return;
          }
          $("#loader").show();
          $.post(
            "create_college.php",
            {
              c_code: $("#c_code").val(),
              c_name: $("#c_name").val(),
              pass: $("#pass").val()
            },
            function(data, status) {
              $("#loader").hide();
              if (data == "success") {
                $("#msg").show();
                $("#msg")
                  .removeClass("alert alert-danger")
                  .addClass("alert alert-success");
                $("#msg").text("Added Successfully");
                $("#msg")
                  .delay(5000)
                  .fadeOut();
              } else {
                $("#msg").show();
                $("#msg")
                  .removeClass("alert alert-success")
                  .addClass("alert alert-danger");
                $("#msg").text(data);
                $("#msg")
                  .delay(5000)
                  .fadeOut();
              }
            }
          );
        });
        $("#view_student").click(function() {
          if ($("#a_no").val() == "") {
            $("#msg").show();
            $("#msg")
              .removeClass("alert alert-success")
              .addClass("alert alert-danger");
            $("#msg").text("Please fill application number");
            $("#msg")
              .delay(5000)
              .fadeOut();
            return;
          }
          $("#loader").show();
          $.post(
            "view_student.php",
            {
              a_no: $("#a_no").val()
            },
            function(data, status) {
              $("#loader").hide();
              $("#application").html(data);
            }
          );
        });
	$("#delete_student").click(function(){
		if($("#a_no").val()==""){

			$("#msg").show();
            $("#msg")
              .removeClass("alert alert-success")
              .addClass("alert alert-danger");
            $("#msg").text("Please fill application number");
            $("#msg")
              .delay(5000)
              .fadeOut();
            return;
		}
    $("#loader").show();
    $.post("delete_records.php",{
        a_no:$("#a_no").val()
    },function(data,status){
      $("#loader").hide();
        if(data=="success")
        {
          $("#msg").show();
            $("#msg")
              .removeClass("alert alert-danger")
              .addClass("alert alert-success");
            $("#msg").text("Deleted Successfully");
            $("#msg")
              .delay(5000)
              .fadeOut();
            return;
        }
    });
	
	});
      });
    </script>
  </head>
  <body>
    <div id="msg" class="alert alert-success" style="text-align:center;"></div>
    <div id="loader"></div>
    <!--This is For New College-->
    <div>
      <br />
      Councelling code
      <input type="number" id="c_code" />
      <br />College Name
      <input type="text" id="c_name" />
      <br />Password
      <input type="text" id="pass" />
      <button id="create_college">Create</button>
    </div>
    <!--This is For Date Change-->
    <div>
      <br />
      Last Date For Submission
      <input type="date" id="last_date"  value="<?php echo $result['last_date']; ?>"/>
      <button id="lastdate">Update</button>
    </div>
    <!--This is For Viewing individual students by Application Num-->
    <div>
      <br />
      Search Application Number
      <input type="number" id="a_no" />
      <button id="view_student">View</button>
	<button id="delete_student">Delete</button>
    </div>
    <div>
      <form action="approval/student_details.php" method="POST">
      <br />Councelling Code for Editing Data
      <input type="number" name="c_code" id="c_code_v" />
      <button id="view_college" formactiom="/approval/student_details.php">View</button>
      <button id="validate_college">Validate</button>
    </form>
    </div>

    <div
      id="application"
      
    ></div>
  </body>
</html>
