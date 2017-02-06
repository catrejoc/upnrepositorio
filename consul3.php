<?
include 'conectar.php';
include('ppp/fpdf.php');
$s1 = "select * from nota where id_n='".$_POST['variable2']."'";
$s2 = mysql_query($s1) or die(mysql_error());
                while($s3=mysql_fetch_assoc($s2)){
                    $nom = $s3['nombre'];
                    $con = $s3['contenido'];
                    $fecha = $s3['fecha'];
$n1="select users.nombre,users.a_pa,users.a_ma from users,nota where nota.user=users.id and users.id='".$s3['user']."' limit 1";
$n2= mysql_query($n1) or die (mysql_error());
while ($n3 = mysql_fetch_assoc($n2)){
                    $nom_user = $n3['nombre']." ". $n3['a_pa']." ".$n3['a_ma'];
                       // $nomm = $n3['nombre'];
                        //echo "<scrip>alert ('".$nom_user."')</script>";
                    }
$p1 = "select periodico.nombre from periodico,nota where nota.periodico=periodico.id and periodico.id='".$s3['periodico']."' limit 1";
$p2= mysql_query($p1) or die (mysql_error());
while ($p3 = mysql_fetch_assoc($p2)){
                    $nom_per = $p3['nombre'];
                       // $nomm = $n3['nombre'];
                        //echo "<scrip>alert ('".$nom_user."')</script>";
                    }
                }
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Write (7,$nom);
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Write (7,"Publicado el: " . $fecha." por ".$nom_user );
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Write (7,$con);
$pdf->Ln();
$pdf->Ln();
$pdf->Write (7,"publicado por el periodico ".$nom_per);
$pdf->Output();

?>

