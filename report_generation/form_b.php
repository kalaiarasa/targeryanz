<?php
session_start();
include '../user/database.php';
if(!isset($_SESSION['c_code']))
{
    $_SESSION['redirect']=$_SERVER['REQUEST_URI'];
    header("Location:/user/log_in.php");
}
require('fpdf/fpdf.php');

class PDF extends FPDF{
    function setcol_name($w,$h,$t,$x,$y,$size,$Bold="B"){
        $this->SetFont('Arial',$Bold,$size);
        $this->Cell($w,$h,$t,$x,$y,'C');
    }
    function setbr_name($w,$h,$t,$x,$y){
        $this->SetFont('Arial','B',10);
        $this->Cell(280,$h,$t,$x,$y,'L');
       
    }
    function set_records($n,$bn,$san,$swc,$gov,$mgt,$min,$lap,$o1,$m1,$o2,$m2,$o3,$m3,$o4,$m4,$goi,$for,$tot){
        $this->SetFont('Arial','',10);
        $this->Cell(10,10,$n,1,0);
        $this->Cell(15,10,$bn,1,0);
        $this->Cell(18,10,$san,1,0);
        $this->Cell(18,10,$swc,1,0);
        $this->Cell(51,10,$gov,1,0);
        $this->Cell(13,10,$mgt,1,0);
        $this->Cell(14,10,$min,1,0);
        $this->Cell(20,10,$lap,1,0);
        $this->Cell(11,10,$o1,1,0);
        $this->Cell(11,10,$m1,1,0);
        $this->Cell(11,10,$o2,1,0);
        $this->Cell(11,10,$m2,1,0);
        $this->Cell(11,10,$o3,1,0);
        $this->Cell(11,10,$m3,1,0);
        $this->Cell(11,10,$o4,1,0);
        $this->Cell(11,10,$m4,1,0);
        $this->Cell(11,10,$goi,1,0);
        $this->Cell(11,10,$for,1,0);
        $this->Cell(11,10,$tot,1,1);
    }

    

}

$pdf = new PDF('l','mm','A4');
$pdf->AliasNbPages('{pages}');
$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();
$pdf->SetFont('Arial','',17);
$pdf->Cell(0,10,'FORM-B',0,1,'C');
$coll=$conn->query("select name_of_college,address from college_info where c_code=".$_SESSION['c_code']);
$collegeRes=$coll->fetch_assoc();
$pdf->setcol_name(0,20,$_SESSION['c_code']." - ".$collegeRes['name_of_college'],0,1,20);
//$pdf->ln();
$pdf->SetFont('Arial','',8);
$pdf->setcol_name(0,5,$collegeRes['address'] ,0,1,10,'');

$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,20,'S.no',1,0,'C');
$pdf->Cell(15,20,'Appl no',1,0,'C');
$pdf->Cell(18,20,'+2 Reg no',1,0,'C');
$pdf->Cell(18,20,'Quota',1,0,'C');
$pdf->Cell(51,20,'Name',1,0,'C');
$pdf->Cell(13,20,'Nati',1,0,'C');
$pdf->Cell(14,20,'Comm',1,0,'C');
$pdf->Cell(20,20,'Statebord',1,0,'C');
$pdf->Cell(22,10,'Maths',1,0,'C');
$pdf->Cell(22,10,'Physics',1,0,'C');
$pdf->Cell(22,10,'Chemistry',1,0,'C');
$pdf->Cell(22,10,'Total',1,0,'C');
$pdf->Cell(11,20,'%',1,0,'C');
$pdf->Cell(11,20,'FG',1,0,'C');
$pdf->Cell(11,20,'AFW',1,0,'C');
$pdf->Cell(0,10,'',0,1,'C');

$pdf->Cell(159,10,'',0,0);
$pdf->Cell(11,10,'OBT',1,0);
$pdf->Cell(11,10,'MAX',1,0);
$pdf->Cell(11,10,'OBT',1,0);
$pdf->Cell(11,10,'MAX',1,0);
$pdf->Cell(11,10,'OBT',1,0);
$pdf->Cell(11,10,'MAX',1,0);
$pdf->Cell(11,10,'OBT',1,0);
$pdf->Cell(11,10,'MAX',1,1);



$Dept_res=$conn->query("select b_code,branch_name from branch_info where c_code=".$_SESSION['c_code']);
while($row=$Dept_res->fetch_assoc())
{
    $pdf->setbr_name(162,10,$row['branch_name'],1,1);
    $counter=1;
    $stu_res=$conn->query("select a_no,hsc_reg_no,catogory,name,nativity,community,hsc_group,maths_m,maths_t,physics_m,physics_t,chemistry_m,chemistry_t,fg,aicte_tfw from student_info where c_code='".$_SESSION['c_code']."' and b_code='".$row['b_code']."'");
    while($stu_row=$stu_res->fetch_assoc())
    {
        $stud=array();
        if($stu_row['catogory']=="GOVERNMENT")
        $stud['quota']="GOVT";
        else if($stu_row['catogory']=="MANAGEMENT")
        $stud['quota']="MNGT";
        else
        $stud['quota']=$stu_row['catogory'];
        if($stu_row['nativity']=="OTHERS")
        $stud['nativity']="OTH";
        else 
        $stud['nativity']=$stu_row['nativity'];
        if($stu_row['hsc_group']=="General")
        {
            $stud['hsc_group']="TN ACA";
        }
        else
        {
            $stud['hsc_group']="TN VOC";
        }
        $pdf->set_records($counter,$stu_row['a_no'],$stu_row['hsc_reg_no'],$stud['quota'],$stu_row['name'],$stud['nativity'],$stu_row['community'],$stud['hsc_group'],$stu_row['maths_m'],$stu_row['maths_t'],$stu_row['physics_m'],$stu_row['physics_t'],$stu_row['chemistry_m'],$stu_row['chemistry_t'],$stu_row['maths_m']+$stu_row['physics_m']+$stu_row['chemistry_m'],$stu_row['maths_t']+$stu_row['physics_t']+$stu_row['chemistry_t'],round(($stu_row['maths_m']+$stu_row['physics_m']+$stu_row['chemistry_m'])/($stu_row['maths_t']+$stu_row['physics_t']+$stu_row['chemistry_t'])*100,2),$stu_row['fg']==1?"YES":"NO",$stu_row['aicte_tfw']==1?"YES":"NO");
        $counter+=1;
    }
}


//$pdf->set_records('1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1','1');


$pdf->SetFont('Arial','B',15);
$pdf->Cell(0,60,'College Seal',0,0,'L');
$pdf->Cell(0,60,'Signature of principal',0,0,'R');


$pdf->output('','form_b.pdf');

?>
<?php $conn->close(); ?>
