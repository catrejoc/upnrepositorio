   <script type="text/javascript">
			$(document).ready(function() {
				$("#link").click(function(event){
					$("'#").load("consul2.php");
				});
			 });			
		</script>

<?
include 'conectar.php';
?>
    <div id="contenido1">
    <!--form action="consul.php" target="_parent" target="_blank" target="_self" target="_top"></form-->
        <?        
$con2="select * from periodico";
$s2=mysql_query($con2);
/*echo "<tr>";
while ($row=mysql_fetch_array($s))
{
echo "<td>".$row['Field']."</td>";
    }
echo "</tr>";*/
Periodicos:
while ($row2=mysql_fetch_assoc($s2))
{
    //echo "<form action=consul2.php method=post target=_parent>";
  //echo "<td>".$row2['id']."</td>";
        echo "<li>".$row2['nombre']."<a href=consul2.php?variable=".$row2['id']."> ver mas </a></li>";
    //echo "<a href=consul2.php?variable=".$row2['id'].">ver mas</a>";

    $var = $row2['id'];
//echo "<input type=hidden name=variable value=".$var.">";
   // echo "<input type=submit value=ver_mas..>";
    //echo "</form>";
    echo "<br><br>";
    
}


?>
       
   
    </div>
