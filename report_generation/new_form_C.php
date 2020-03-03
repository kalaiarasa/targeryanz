<?php
session_start();
$_SESSION['c_code']='1234';
include '../user/database.php';
require('fpdf/fpdf.php');
class PDF extends FPDF{
    function setcol_name($w,$h,$t,$x,$y,$size,$Bold="B"){
        $this->SetFont('Arial',$Bold,$size);
        $this->Cell($w,$h,$t,$x,$y,'C');
    }
    function set_records($n,$bn,$san,$swc,$gov,$mgt,$min,$lap,$nri,$goi,$for,$tot,$fgo,$fgs,$fgt,$t1,$t2,$t3){
        $this->SetFont('Arial','',10);
        $this->Cell(10,10,$n,1,0);
        $this->Cell(45,10,$bn,1,0);
        $this->Cell(14,10,$san,1,0);
        $this->Cell(14,10,$swc,1,0);
        $this->Cell(14,10,$gov,1,0);
        $this->Cell(14,10,$mgt,1,0);
        $this->Cell(14,10,$min,1,0);
        $this->Cell(14,10,$lap,1,0);
        $this->Cell(14,10,$nri,1,0);
        $this->Cell(14,10,$goi,1,0);
        $this->Cell(14,10,$for,1,0);
        $this->Cell(14,10,$tot,1,0);
        $this->Cell(14,10,$fgo,1,0);
        $this->Cell(14,10,$fgs,1,0);
        $this->Cell(14,10,$fgt,1,0);
        $this->Cell(14,10,$t1,1,0);
        $this->Cell(14,10,$t2,1,0);
        $this->Cell(16,10,$t3,1,1);
    }

    function set_total($san,$swc,$gov,$mgt,$min,$lap,$nri,$goi,$for,$tot,$fgo,$fgs,$fgt,$t1,$t2,$t3){
        $this->SetFont('Arial','B',10);
        $this->Cell(10,10,'',1,0);
        $this->Cell(45,10,'TOTAL',1,0);
        $this->Cell(14,10,$san,1,0);
        $this->Cell(14,10,$swc,1,0);
        $this->Cell(14,10,$gov,1,0);
        $this->Cell(14,10,$mgt,1,0);
        $this->Cell(14,10,$min,1,0);
        $this->Cell(14,10,$lap,1,0);
        $this->Cell(14,10,$nri,1,0);
        $this->Cell(14,10,$goi,1,0);
        $this->Cell(14,10,$for,1,0);
        $this->Cell(14,10,$tot,1,0);
        $this->Cell(14,10,$fgo,1,0);
        $this->Cell(14,10,$fgs,1,0);
        $this->Cell(14,10,$fgt,1,0);
        $this->Cell(14,10,$t1,1,0);
        $this->Cell(14,10,$t2,1,0);
        $this->Cell(16,10,$t3,1,1);

    }


}


$pdf = new PDF('l','mm','A4');
$pdf->AliasNbPages('{pages}');
$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();
$pdf->SetFont('Arial','',17);
$pdf->Cell(280,10,'FORM_C',0,1,'C');
$coll=$conn->query("select name_of_college,address from college_info where c_code=".$_SESSION['c_code']);
$collegeRes=$coll->fetch_assoc();
$pdf->setcol_name(0,20,$_SESSION['c_code']." - ".$collegeRes['name_of_college'],0,1,20);
//$pdf->ln();
$pdf->SetFont('Arial','',8);
$pdf->setcol_name(0,5,$collegeRes['address'] ,0,1,10,'');
$pdf->SetFont('Arial','',15);
$pdf->Cell(130,20,'FIRST YEAR : ',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(10,10,'S.no',1,0);
$pdf->Cell(45,10,'Branch Name',1,0);
$pdf->Cell(14,10,'SAN',1,0);
$pdf->Cell(14,10,'OC-M',1,0);
$pdf->Cell(14,10,'OC-F',1,0);
$pdf->Cell(14,10,'BC-M',1,0);
$pdf->Cell(14,10,'BC-F',1,0);
$pdf->Cell(14,10,'BCM-M',1,0);
$pdf->Cell(14,10,'BCM_F',1,0);
$pdf->Cell(14,10,'MBC-M',1,0);
$pdf->Cell(14,10,'MBC-F',1,0);
$pdf->Cell(14,10,'SC-M',1,0);
$pdf->Cell(14,10,'SC-F',1,0);
$pdf->Cell(14,10,'SCA-M',1,0);
$pdf->Cell(14,10,'SCA_F',1,0);
$pdf->Cell(14,10,'ST-M',1,0);
$pdf->Cell(14,10,'ST-F',1,0);
$pdf->Cell(16,10,'Total',1,1);


$dept=$conn->query("select b_code,branch_name,approved_in_take from branch_info where c_code='".$_SESSION['c_code']."'");
$tot=array('total'=>0,'approved_in_take'=>0,'OC'=>array('MALE'=>0,'FEMALE'=>0),'BC'=>array('MALE'=>0,'FEMALE'=>0),'MBC/DNC'=>array('MALE'=>0,'FEMALE'=>0),'ST'=>array('MALE'=>0,'FEMALE'=>0),'SC'=>array('MALE'=>0,'FEMALE'=>0),'SCA'=>array('MALE'=>0,'FEMALE'=>0),'BCM'=>array('MALE'=>0,'FEMALE'=>0));
$counter=1;
while($row=$dept->fetch_assoc())
{
    $stu=$conn->query("select community,gender,COUNT(gender)'count' from student_info where c_code='".$_SESSION['c_code']."' and b_code='".$row['b_code']."'  group by community,gender");
    $temp=array('OC'=>array('MALE'=>0,'FEMALE'=>0),'BC'=>array('MALE'=>0,'FEMALE'=>0),'MBC/DNC'=>array('MALE'=>0,'FEMALE'=>0),'ST'=>array('MALE'=>0,'FEMALE'=>0),'SC'=>array('MALE'=>0,'FEMALE'=>0),'SCA'=>array('MALE'=>0,'FEMALE'=>0),'BCM'=>array('MALE'=>0,'FEMALE'=>0));
    //echo $temp['SC']['FEMALE'];
    echo $conn->error;
    while($s_row=$stu->fetch_assoc())
    {
        if($s_row['gender']=="TRANSGENDER" || $s_row['gender']=="" || $s_row['gender']==null|| !isset($s_row['gender']))
        continue;
        //echo $s_row['community']." ".$s_row['gender']."\n";
        $temp[$s_row['community']][$s_row['gender']]=$s_row['count'];
        $tot[$s_row['community']][$s_row['gender']]+=$s_row['count'];
        
    }
   // echo $temp['SC']['FEMALE'];
    $pdf->set_records($counter,$row['branch_name'],$row['approved_in_take'],$temp['OC']['MALE'],$temp['OC']['FEMALE'],$temp['BC']['MALE'],$temp['BC']['FEMALE'],$temp['BCM']['MALE'],$temp['BCM']['FEMALE'],$temp['MBC/DNC']['MALE'],$temp['MBC/DNC']['FEMALE'],$temp['SC']['MALE'],$temp['SC']['FEMALE'],$temp['SCA']['MALE'],$temp['SCA']['FEMALE'],$temp['ST']['MALE'],$temp['ST']['MALE'],$temp['OC']['MALE']+$temp['OC']['FEMALE']+$temp['BC']['MALE']+$temp['BC']['FEMALE']+$temp['BCM']['MALE']+$temp['BCM']['FEMALE']+$temp['MBC/DNC']['MALE']+$temp['MBC/DNC']['FEMALE']+$temp['SC']['MALE']+$temp['SC']['FEMALE']+$temp['SCA']['MALE']+$temp['SCA']['FEMALE']+$temp['ST']['MALE']+$temp['ST']['MALE']);
    $counter+=1;
    $tot['approved_in_take']+=$row['approved_in_take'];
    $tot['total']+=$temp['OC']['MALE']+$temp['OC']['FEMALE']+$temp['BC']['MALE']+$temp['BC']['FEMALE']+$temp['BCM']['MALE']+$temp['BCM']['FEMALE']+$temp['MBC/DNC']['MALE']+$temp['MBC/DNC']['FEMALE']+$temp['SC']['MALE']+$temp['SC']['FEMALE']+$temp['SCA']['MALE']+$temp['SCA']['FEMALE']+$temp['ST']['MALE']+$temp['ST']['MALE'];
}
//$pdf->set_records('1','csc','23','0','0','0','0','1','0','23','0','0','0','0','0','0','0','');



$pdf->set_total($tot['approved_in_take'],$tot['OC']['MALE'],$tot['OC']['FEMALE'],$tot['BC']['MALE'],$tot['BC']['FEMALE'],$tot['BCM']['MALE'],$tot['BCM']['FEMALE'],$tot['MBC/DNC']['MALE'],$tot['MBC/DNC']['FEMALE'],$tot['SC']['MALE'],$tot['SC']['FEMALE'],$tot['SCA']['MALE'],$tot['SCA']['FEMALE'],$tot['ST']['MALE'],$tot['ST']['MALE'],$tot['total']);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(100,100,'College Seal',0,0,'L');
$pdf->Cell(180,100,'Signature of principal',0,0,'R');


$pdf->output();

?>