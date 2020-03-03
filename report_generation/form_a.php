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
    function set_records($n,$bn,$san,$swc,$gov,$mgt,$min,$lap,$nri,$goi,$for,$tot,$fgo,$fgs,$fgt){
        $this->SetFont('Arial','',10);
        $this->Cell(10,10,$n,1,0,"C");
        $this->Cell(90,10,$bn,1,0,"C");
        $this->Cell(13,10,$san,1,0,"C");
        $this->Cell(12,10,$swc,1,0,"C");
        $this->Cell(12,10,$gov,1,0,"C");
        $this->Cell(12,10,$mgt,1,0,"C");
        $this->Cell(12,10,$min,1,0,"C");
        $this->Cell(12,10,$lap,1,0,"C");
        $this->Cell(12,10,$nri,1,0,"C");
        $this->Cell(12,10,$goi,1,0,"C");
        $this->Cell(12,10,$for,1,0,"C");
        $this->Cell(13,10,$tot,1,0,"C");
        $this->Cell(16,10,$fgo,1,0,"C");
        $this->Cell(25,10,$fgs,1,0,"C");
        $this->Cell(15,10,$fgt,1,1,"C");
    }
    function set_total($san,$swc,$gov,$mgt,$min,$lap,$nri,$goi,$for,$tot,$fgo,$fgs,$fgt){
        $this->SetFont('Arial','B',10);
        $this->Cell(10,10,'',1,0,"C");
        $this->Cell(90,10,'TOTAL',1,0,"C");
        $this->Cell(13,10,$san,1,0,"C");
        $this->Cell(12,10,$swc,1,0,"C");
        $this->Cell(12,10,$gov,1,0,"C");
        $this->Cell(12,10,$mgt,1,0,"C");
        $this->Cell(12,10,$min,1,0,"C");
        $this->Cell(12,10,$lap,1,0,"C");
        $this->Cell(12,10,$nri,1,0,"C");
        $this->Cell(12,10,$goi,1,0,"C");
        $this->Cell(12,10,$for,1,0,"C");
        $this->Cell(13,10,$tot,1,0,"C");
        $this->Cell(16,10,$fgo,1,0,"C");
        $this->Cell(25,10,$fgs,1,0,"C");
        $this->Cell(15,10,$fgt,1,1,"C");

    }

}
$pdf = new PDF('l','mm','A4');
$pdf->AliasNbPages('{pages}');
$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();
$pdf->SetFont('Arial','',15);
$pdf->Cell(0,10,'FORM-A',0,1,'C');
$coll=$conn->query("select name_of_college,address from college_info where c_code=".$_SESSION['c_code']);
$collegeRes=$coll->fetch_assoc();
$pdf->setcol_name(0,20,$_SESSION['c_code']." - ".$collegeRes['name_of_college'],0,1,20);
//$pdf->ln();
$pdf->SetFont('Arial','',8);
$pdf->setcol_name(0,5,$collegeRes['address'] ,0,1,10,'');
$pdf->SetFont('Arial','',15);
$pdf->Cell(130,10,'FIRST YEAR : 2020 - 2021',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,20,'S.no',1,0,"C");
$pdf->Cell(90,20,'Branch Name',1,0,"C");
$pdf->Cell(13,20,'SAN 20',1,0,"C");
$pdf->Cell(12,20,'SWC',1,0,"C");
$pdf->Cell(12,20,'GOV',1,0,"C");
$pdf->Cell(12,20,'MGT',1,0,"C");
$pdf->Cell(12,20,'MIN',1,0,"C");
$pdf->Cell(12,20,'LAP',1,0,"C");
$pdf->Cell(12,20,'NRI',1,0,"C");
$pdf->Cell(12,20,'GOI',1,0,"C");
$pdf->Cell(12,20,'FOR',1,0,"C");
$pdf->Cell(13,20,'TOTAL',1,0,"C");
$pdf->Cell(16,20,'FG(OTH)',1,0,"C");
$pdf->Cell(25,20,'FG(SC/SCA)',1,0,"C");
$pdf->Cell(15,20,'FG(ST)',1,1,"C");
$result=$conn->query("select b_code,branch_name,approved_in_take from branch_info where c_code='".$_SESSION['c_code']."'");
$counter=1;
//echo $result->num_rows;
$tot=array('fg_st'=>0,'fg_sc_sca'=>0,'fg_oth'=>0,'total'=>0,'approved_in_take'=>0,'swf'=>0,'GOVERNMENT'=>0,'MANAGEMENT'=>0,'MIN'=>0,'LAP'=>0,'NRI'=>0,'GOI'=>0,'FOR'=>0,);
while($result->num_rows>0 && $row=$result->fetch_assoc())
{
    $tot['approved_in_take']+=$row['approved_in_take'];
    $tot['swf']+=$row['approved_in_take'];
    $resultSet=$conn->query("select catogory,count(catogory)'count' from student_info where c_code='".$_SESSION['c_code']."' and b_code='".$row['b_code']."' group by catogory");
    $temp=array('GOVERNMENT'=>0,'MANAGEMENT'=>0,'MIN'=>0,'LAP'=>0,'NRI'=>0,'GOI'=>0,'FOR'=>0,);
    while($rows=$resultSet->fetch_assoc())
    {
        $temp[$rows['catogory']]=$rows['count'];
        $tot[$rows['catogory']]+=$rows['count'];
    }
    $comm=array('BC'=>0,'MBC/DNC'=>0,'OC'=>0,'SCA'=>0,'ST'=>0,'SC'=>0,'BCM'=>0);
    $fg_fetch=$conn->query("select community,count(community)'count' from student_info where c_code='".$_SESSION['c_code']."' and b_code='".$row['b_code']."' and fg=1 group by community");
    while($comm_row=$fg_fetch->fetch_assoc())
    {
        $comm[$comm_row['community']]=$comm_row['count'];
    }
    $tot['fg_st']+=$comm['ST'];
    $tot['fg_sc_sca']+=$comm['SCA']+$comm['SC'];
    $tot['fg_oth']+=$comm['BC']+$comm['MBC/DNC']+$comm['OC']+$comm['BCM'];
    $tot['total']+=$temp['GOVERNMENT']+$temp['MANAGEMENT']+$temp['MIN']+$temp['LAP']+$temp['NRI']+$temp['GOI']+$temp['FOR'];
    
    $pdf->set_records($counter,$row['branch_name'],$row['approved_in_take'],$row['approved_in_take'],$temp['GOVERNMENT'],$temp['MANAGEMENT'],$temp['MIN'],$temp['LAP'],$temp['NRI'],$temp['GOI'],$temp['FOR'],$temp['GOVERNMENT']+$temp['MANAGEMENT']+$temp['MIN']+$temp['LAP']+$temp['NRI']+$temp['GOI']+$temp['FOR'],$comm['BC']+$comm['MBC/DNC']+$comm['OC']+$comm['BCM'],$comm['SCA']+$comm['SC'],$comm['ST']);
    $counter+=1;
}
//$pdf->set_records('10','Computer Science and Engineering (AI and Machine Learning)','2300','0000','0000','0000','0000','1000','0000','2300','2000','2000','2000','2000','2000');





$pdf->set_total($tot['approved_in_take'],$tot['swf'],$tot['GOVERNMENT'],$tot['MANAGEMENT'],$tot['MIN'],$tot['LAP'],$tot['NRI'],$tot['GOI'],$tot['FOR'],$tot['total'],$tot['fg_oth'],$tot['fg_sc_sca'],$tot['fg_st']);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(100,50,'College Seal',0,0,'L');
$pdf->Cell(180,50,'Signature of principal',0,0,'R');






$pdf->Output();
?>
<?php $conn->close(); ?>
