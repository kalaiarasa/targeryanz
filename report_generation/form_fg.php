
<?php
require('fpdf/fpdf.php');
$_SESSION['c_code']='1234';
include 'database.php';
$sql="SELECT name_of_college,address from college_info where c_code=? LIMIT 1"; 
    if($stmt=$conn->prepare($sql))
    {
          $stmt->bind_param("s",$_SESSION['c_code']);
          $stmt->execute();
          $result=$stmt->get_result();
          $row=$result->fetch_assoc();
          $_SESSION['c_name']=$row['name_of_college'];
          $_SESSION['address']=$row['address'];
    }
class PDF extends FPDF
{
        function setbr($w,$h,$t,$x,$y){
            $this->SetFont('Arial','B',10);
            $this->Cell($w,$h,$t,$x,$y,'L');
        }

        function row($w,$h,$t,$x,$y,$size,$Bold="B")
        {
            $this->SetFont('Arial',$Bold,$size);
            $this->Cell($w,$h,$t,$x,$y,'C');
        }

        function set_records($i,$an,$n,$q,$c,$am){
            $this->SetFont('Arial','',10);
            $this->Cell(10,10,$i,1,0,'C');
            $this->Cell(20,10,$an,1,0,'C');
            $this->Cell(65,10,$n,1,0);
            $this->Cell(30,10,$q,1,0,'C');
            $this->Cell(30,10,$c,1,0,'C');
            $this->Cell(30,10,$am,1,1,'R');
        }

        function Footer()
        {
          // Position at 1.5 cm from bottom
          $this->SetY(-15);
          $this->SetFont('Arial','I',8);
            // Page number
          $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
         }
        function Header()
        {
            $this->row(195,10,'FORM - FG',0,1,16);
            $this->row(195,10,$_SESSION['c_name'],0,1,26);
            $this->row(195,10,$_SESSION['address'],0,1,16);
            $this->Ln();
            $this->SetFont('Arial','B',10);
            $this->Cell(10,10,'S.no',1,0,'C');
            $this->Cell(20,10,'Applno:',1,0,'C');
            $this->Cell(65,10,'Name',1,0,'C');
            $this->Cell(30,10,'Quota',1,0,'C');
            $this->Cell(30,10,'Community',1,0,'C');
            $this->Cell(30,10,'Amount',1,1,'C');
        }
        
    }
    $pdf = new PDF('p','mm','A4');
    $pdf->AliasNbPages('{pages}');
    $pdf->SetAutoPageBreak(true,15);
    $pdf->AddPage();
        $sql="SELECT branch_name,a_no,name,catogory,community from branch_info,(select b_code,a_no,name,catogory,community from student_info where c_code=? and fg=1) as student_info where student_info.b_code=branch_info.b_code order by branch_name";
        if($stmt=$conn->prepare($sql))
        {
              $stmt->bind_param("s",$_SESSION['c_code']);
              $stmt->execute();
              $result=$stmt->get_result();
              $i=0;
              while($row=$result->fetch_assoc()) 
              {
                  if($i==0)
                  {$b_name=$row['branch_name'];
                    $pdf->setbr(185,10,$b_name,1,1,);
                }
                  if($b_name!=$row['branch_name'])
                  {
                    $b_name=$row['branch_name'];
                    $pdf->setbr(185,10,$b_name,1,1,);
                  }
                  $i++;
                  $x=2000;
                  $pdf->set_records($i,$row['a_no'],$row['name'],$row['catogory'],$row['community'],$x);
             }
        }
        
        else
        {
            echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>selection failure</strong>
            </div>";
        }    
    
     $pdf->SetFont('Arial','B',15);
     $pdf->Cell(0,70,'College Seal',0,0,'L');
     $pdf->Cell(0,70,'Signature of principal',0,0,'R');
    $pdf->output();
?>

    