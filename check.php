<?
include 'conectar.php';
session_start();

        
        if(isset($_POST['login'])){
				$usuario = $_POST['nombrex'];
				$pw = $_POST['passx'];
				$log = mysql_query("SELECT * FROM users WHERE correo='$usuario' AND pass='$pw'");
				if (mysql_num_rows($log)>0) {
					$row = mysql_fetch_array($log);
					$_SESSION["user"] = $row['nombre']; 
                    $_SESSION["id_user"] = $row['id']; 
				  	echo 'Iniciando sesion';
					echo '<script> window.location="index.php"; </script>';
				}
else{
    echo "<script language=javascript>alert('No estas registrado')";
    echo "</script>"; 
    //echo "<form action=resgistar.php>"; 
echo "Regresando al inicio"; 
   // echo "<input type=submit value=registrar>"; 
    //echo "</form>"; 
   echo '<script> window.location="index.php"; </script>';
}
        }
?>