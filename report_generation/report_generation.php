<?php
session_start();
$_SESSION['c_code']='1234';
require('fpdf/fpdf.php');
include '../db_connect.php';
ob_start();
class PDF extends FPDF{
    function setcol_name($w,$h,$t,$x,$y){
        $this->Cell($w,$h,$t,$x,$y,'C');

    }
    function setbr_name($w,$h,$t,$x,$y){
        $this->SetFont('Arial','B',17);
        $this->Cell($w,$h,$t,$x,$y,'C');

    }
    function set_records($n,$an,$nm,$co,$q,$nt,$r){
        $this->Cell(10,10,$n,1,0);
        $this->Cell(29,10,$an,1,0);
        $this->Cell(40,10,$nm,1,0);
        $this->Cell(25,10,$co,1,0);
        $this->Cell(29,10,$q,1,0);
        $this->Cell(28,10,$nt,1,0);
        $this->Cell(29,10,$r,1,1);
    }

}
$pdf = new PDF('p','mm','A4');
$pdf->AliasNbPages('{pages}');
$pdf->SetAutoPageBreak(true,15);
$pdf->AddPage();
$pdf->SetFont('Arial','B',22);
if($stmt=$conn->prepare("select name_of_college from college_info where c_code=?"))
{
    $stmt->bind_param("s",$_SESSION['c_code']);
    if($stmt->execute())
    {
        $result=$stmt->get_result();
        $pdf->setcol_name(190,20,$result->fetch_assoc()['name_of_college'],1,1);
    }
}

//$pdf->SetFont('Arial','B',17);

if($stmt=$conn->prepare("select b_code,branch_name from branch_info where c_code=?"))
{
    $stmt->bind_param("s",$_SESSION['c_code']);
    if($stmt->execute())
    {
        $deptR=$stmt->get_result();
        while($dept=$deptR->fetch_assoc())
        {
            $pdf->setbr_name(190,10,$dept['branch_name'],1,1);
            $pdf->SetFont('Arial','',11);
            $pdf->Cell(10,10,'S.no',1,0);
            $pdf->Cell(29,10,'Application no',1,0);
            $pdf->Cell(40,10,'Name',1,0);
            $pdf->Cell(25,10,'Gender',1,0);
            $pdf->Cell(29,10,'Religion',1,0);
            $pdf->Cell(28,10,'Community',1,0);
            $pdf->Cell(29,10,'Nationnality',1,1);
            $count=1;
            $stmt1=$conn->prepare("select * from student_info where c_code=? and b_code=?");
            $stmt1->bind_param("ss",$_SESSION['c_code'],$dept['b_code']);
            $stmt1->execute();
            $stmt2=$stmt1->get_result();
            if($stmt2->num_rows>0)
            while($row=$stmt2->fetch_assoc())
            {
                $pdf->set_records($count,$row['a_no'],$row['name'],$row['gender'],$row['religion'],$row['community'],$row['nationality']);

                $count=$count+1;
            }
        }
    }
}






$pdf->Output();
ob_end_flush(); 

?>