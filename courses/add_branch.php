<?php
session_start();
include '../user/database.php';
include '../user/head.php';
if(!isset($_SESSION['c_code']))
{
    $_SESSION['redirect']=$_SERVER['REQUEST_URI'];
    header("Location:/user/log_in.php");
}
if(isset($_SESSION['c_code']))
  { //echo "in session";
  //echo $_POST['b_code'];
    if(isset($_POST['save_details']))
    {
      //echo"in post";
    $SQL="INSERT INTO branch_info(c_code, b_code, branch_name, approved_in_take, year_of_start, accredition_valid_upto, NBA_2020) VALUES (?,?,?,?,?,?,?)";
    if($stmt=$conn->prepare($SQL))
    {
        $stmt->bind_param("issiiii",$_SESSION['c_code'],$_POST['b_code'],$_POST['branch_name'],$_POST['approved_in_take'],$_POST['year_of_start'],$_POST['accredition_valid_upto'],$_POST['NBA_2020']);
        if($stmt->execute())
        {
            echo "<div class='alert alert-info' style='width:60%;margin:0px auto;text-align:center;'>Added Successfully Added</div>";
        }
        else
        {
          echo "<div class='alert alert-danger' style='width:60%;margin:0px auto;text-align:center;'>".$conn->error."</div>";
        }
    }
    else
    {
      echo "<div class='alert alert-danger' style='width:60%;margin:0px auto;text-align:center;'>".$conn->error."</div>";
    }
}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Add Branch</title>
    <link rel="stylesheet" href="bootstrap.min.css" />
    <link rel="stylesheet" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  </head>
  <body>
    <div >
      <h2 style="text-align: center;">Branch Details</h2>
    </div>
    <div class="container">
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" style="margin-top:30px;">
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-4 col-form-label"
            >Branch Name</label>
          <div class="col-sm-6">
            <select required name="branch_name" class="form-control">
           <option value="Aeronautical Engineering-AE">Aeronautical Engineering-AE</option>
           <option value="Architecture-AR">Architecture-AR</option>
           <option value="Agriculture & Irrigation Engineering-AI">Agriculture & Irrigation Engineering-AI</option>
           <option value="Apparel Technology-AP">Apparel Technology-AP</option>
           <option value="Automobile Engineering-AU">Automobile Engineering-AU</option>
           <option value="Bio-Medical Engineering-BM">Bio-Medical Engineering-BM</option>
           <option value="Ceramic Technology-CR">Ceramic Technology-CR</option>
           <option value="Chemical Engineering-CH">Chemical Engineering-CH</option>
           <option value="Civil Engineering-CE">Civil Engineering-CE</option>
           <option value="Computer Science and Engg.-CS">Computer Science and Engg.-CS</option>
           <option value="Electrical and Electronics-EE">Electrical and Electronics-EE</option>
           <option value="Electronics & Communication-EC">Electronics & Communication-EC</option>
           <option value="Electronics & Instrumentation-EI">Electronics & Instrumentation-EI</option>
           <option value="Food Technology-FT">Food Technology-FT</option>
           <option value="Geo-Informatics-GI">Geo-Informatics-GI</option>
           <option value="Industrial Bio-Technology-IB">Industrial Bio-Technology-IB</option>
           <option value="Industrial Engineering-IE">Industrial Engineering-IE</option>
           <option value="Information Technology-IT">Information Technology-IT</option>
           <option value="Leather Technology-LE">Leather Technology-LE</option>
           <option value="Manufacturing Engineering-MN">Manufacturing Engineering-MN</option>
           <option value="Material Science & Engineering-MS">Material Science & Engineering-MS</option>
           <option value="Mechanical Engineering-ME">Mechanical Engineering-ME</option>
           <option value="Mining Engineering-MI">Mining Engineering-MI</option>
           <option value="Pharmaceutical Technology-PH">Pharmaceutical Technology-PH</option>
           <option value="Printing Technology-PT">Printing Technology-PT</option>
           <option value="Petroleum Engineering & Technology-PET">Petroleum Engineering & Technology-PET</option>
           <option value="Production Engineering-PE">Production Engineering-PE</option>
           <option value="Rubber and Plastics Technology-RP">Rubber and Plastics Technology-RP</option>
           <option value="Textile Technology-TX">Textile Technology-TX</option>
            </select>
          </div>
        </div>
        
        <div style="display:none;" class="form-group row">
          <label for="New Branch" class="col-sm-4 col-form-label">Branch Code</label>
          <div class="col-sm-6">
            <input class="" id="branchcode" name="b_code"  type="text" />
          </div>
        </div>
        <script>
$('select').on('change', function()
{
    var x=this.value ;
    i=0;
    while(x[i]!='-')
    {i++;}
    x=x.slice(i+1);
    $("#branchcode").val(x);
});
</script>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-4 col-form-label"
            >Approved In Take</label
          >
          <div class="col-sm-6">
            <input required type="number" name="approved_in_take" class="form-control" />
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-4 col-form-label"
            >Year of Start</label
          >
          <div class="col-sm-6">
            <input required type="number" name="year_of_start" class="form-control" />
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-4 col-form-label"
            >Accredition Valid Upto</label
          >
          <div class="col-sm-6">
            <input required type="number" name="accredition_valid_upto" class="form-control" />
          </div>
        </div>
        <div class="form-group row">
          <label for="inputPassword" class="col-sm-4 col-form-label"
            > NBA 2020</label
          >
          <div class="col-sm-6">
            <input  type="radio" name="NBA_2020" value="1" required />Yes
            <input type="radio" name="NBA_2020" value="0" required />No
          </div>
        </div>
        <button
          class="btn btn-success btn-lg "
          type="sumbit"
          name="save_details"
          id="savebutton" 
          style="margin-left:50%;"
        >
          Save
        </button>
      </form>

      <!--
                <form action="" method="POST" >
                    <div class="form-row">
                        <div class="col-md-4">
                            <label for="New Branch">Branch Code</label><br>
                           
                            <label for="New Branch">Branch Name</label><br>
                            
                            <label for="Approved_in_take">Approved In Take</label><br>
                            <label for="year_of_start">Year of Strat</label><br>
                            <label for="accrediation_valid_upto">Accrediation Valid Upto</label><br>
                            <label for="NBA_2020">Is NBA 2020</label><br>
                        </div>
                        <div class="col-md-6">
                            <select name="b_code">
                                <option value="AeE">AeE</option>
                                <option value="AI">AIE</option>
                                <option value="BY">BME</option>    
                            </select><br>
                            <select name="branch_name">
                                <option value="AE">Aeronautical Engineering</option>
                                <option value="AI">Agricultural and Irrigation Engineering</option>
                                <option value="BY">Bio- Medical Engineering</option>    
                            </select><br>
                            <input type="text"  name="approved_in_take"  required><br>
                            <input type="text" name="year_of_start" required><br>
                            <input type="text"  name="accrediation_valid_upto"required><br>
                            <input type="radio" name="NBA_2020" value="1"   required>Yes
                            <input type="radio" name="NBA_2020" value="2"   required>No
                            <br>


                        </div>
                        
                      </div>
                      <div class="row">
                          <div class="col">
                            <button class="btn btn-primary"  type="sumbit" name="save_details">Save</button>         
                          </div>
                      </div>
                     
                    </div>
                    
                
                
            </form>
            -->
    </div>
  </body>
</html>

