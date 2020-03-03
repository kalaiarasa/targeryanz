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

        function set_records($i,$an,$n,$c,$fg,$fc,$aicte,$aggr,$allot){
            $this->SetFont('Arial','',10);
            $this->Cell(10,10,$i,1,0,'C');
            $this->Cell(18,10,$an,1,0,'C');
            $this->Cell(35,10,$n,1,0);
            $this->Cell(20,10,$c,1,0,'C');
            $this->Cell(15,10,$fg,1,0,'C');
            $this->Cell(32,10,$fc,1,0,'C');
            $this->Cell(20,10,$aicte,1,0,'C');
            $this->Cell(20,10,$aggr,1,0,'C');
            $this->Cell(25,10,$allot,1,1,'C');
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
            $this->row(195,10,'FORM - TNEA',0,1,16);
            $this->row(195,10,$_SESSION['c_name'],0,1,26);
            $this->row(195,10,$_SESSION['address'],0,1,16);
            $this->Ln();
            $this->SetFont('Arial','B',10);
            $this->Cell(10,10,'S.no',1,0);
            $this->Cell(18,10,'Applno:',1,0);
            $this->Cell(35,10,'Name',1,0);
            $this->Cell(20,10,'Community',1,0,'C');
            $this->Cell(15,10,'FG',1,0,'C');
            $this->Cell(32,10,'Fee Offer(Brother)',1,0,'C');
            $this->Cell(20,10,'AICTETFW',1,0,'C');
            $this->Cell(20,10,'AGGR',1,0,'C');
            $this->Cell(25,10,'CATEGORY',1,1,'C');
        }
        
        function aggr($p_m,$p_t,$c_m,$c_t,$m_m,$m_t)
        {
            $x=(($p_m+$c_m)/($p_t+$c_t))*100;
            //$this->Cell(0,10,$x,0,1,'C');
            $y=($m_m/$m_t)*100;
            //$this->Cell(0,10,$y,0,1,'C');
            $z=$x+$y;
            //$this->Cell(0,10,$z,0,1,'C');
            return round($z,2);
        }
    }
    $pdf = new PDF('p','mm','A4');
    $pdf->AliasNbPages('{pages}');
    $pdf->SetAutoPageBreak(true,15);
    $pdf->AddPage();
     
        //table records  
        $sql="SELECT branch_name,a_no,name,community,fg,Availed_fg,aicte_tfw,physics_m,physics_t,chemistry_m,chemistry_t,maths_m,maths_t,hsc_group from branch_info,(select b_code,a_no,name,community,fg,Availed_fg,aicte_tfw,physics_m,physics_t,chemistry_m,chemistry_t,maths_m,maths_t,hsc_group from student_info where c_code=?) as student_info where student_info.b_code=branch_info.b_code order by branch_name";
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
                    $pdf->setbr(195,10,$b_name,1,1,);
                }
                  if($b_name!=$row['branch_name'])
                  {
                    $b_name=$row['branch_name'];
                    $pdf->setbr(195,10,$b_name,1,1,);
                  }
                  $i++;
                  $x=$pdf->aggr($row['physics_m'],$row['physics_t'],$row['chemistry_m'],$row['chemistry_t'],$row['maths_m'],$row['maths_t']);
                  $pdf->set_records($i,$row['a_no'],$row['name'],$row['community'],$row['fg'],$row['Availed_fg'],$row['aicte_tfw'],$x,$row['hsc_group']);
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