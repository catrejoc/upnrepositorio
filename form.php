<?
session_start();
include 'conectar.php';
if (isset($_POST['conte'])){
    $consulta2="insert into nota(id_n,nombre,fecha,periodico,user,contenido)
values(id_n,'".$_POST['titulo']."','".$_POST['fecha']. "','".$_POST['selec']."','".$_SESSION['id_user']."','".$_POST['conte']."')";
                mysql_query($consulta2) or die (mysql_error());
//echo "Nota Agregada!!<br>";
  //  echo "del periodico".$_POST['titulo'];
echo '<script> alert("agregado"); </script>';
}

?>

    <div id="form_subir">
        Aqui podra subir un archivo a la base de datos UPN<br>
        <form action="#" method="post">
            
    Titulo: <input type="text" name="titulo" id="titulo" required/><br>
    Seleccione una fecha: <input type="date" name="fecha" id="fecha" required><br>
    Usuario actual: <i><b><u><? echo $_SESSION['user']; ?></u></b></i> <br>
    Periodico: <select name="selec">
         
       <?
       $s = "select * from periodico";
       $d = mysql_query($s) or die (mysql_error());
       while ($row=mysql_fetch_array($d)){
       echo "<option value=".$row['id'].">".$row['nombre'];
       echo "</option>";}
       ?>
         </select><br>
    Contenido:  <textarea cols="60" rows="15" name="conte" id="conte" required/>
            </textarea>
            <br>
        <input type="submit" value="guardar" name="guardar">
            </form>
    
    </div>
    <div id="contenido2">
    </div>
