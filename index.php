<!DOCTYPE html>
<?
session_start();
include 'conectar.php';
if (isset($_POST['conte'])){
    $consulta2="insert into nota(id_n,nombre,fecha,periodico,user,contenido)
values(id_n,'".$_POST['titulo']."','".$_POST['fecha']."','".$_POST['selec']."','".$_SESSION['id_user']."','".$_POST['conte']."')";
                mysql_query($consulta2) or die (mysql_error());
//echo "Nota Agregada!!<br>";
  //  echo "del periodico".$_POST['titulo'];
echo '<script> alert("agregado"); </script>';
}
?>
<html>
<head>
    <title> UPN-Repositorio    </title>
    <link rel="stylesheet" type="text/css" href="sty.css" />
    <meta charset="utf-8">
     
        <script src="jquery.min.js"></script>
<script src="slides.min.jquery.js"></script>
		<script>
            $(function(){
                $("#slideshow").slides({
        effect: 'slide,' ,
                    play: 5000,
                   effect: 'fade' ;
                    
      });
            });
        </script>
    <script type="text/javascript">
			$(document).ready(function() {
                $("#contenido").load("inicio.html");
				$("#biblio").click(function(event) {
					$("#contenido").load("consul.php");
                });
                $("#contacto").click(function(event) {
					$("#contenido").load("contacto.html");         
				   });
                  $("#subir").click(function(event) {
					$("#contenido").load("form.php");         
				   });
                $("#login").click(function(event) {
					$("#contenido").load("index2.php");         
				   });
			 });			
		</script>
    </head>
    <body>
        <div class="contenedor">
            <header>
			<div id="subheader">
				<div id="logotipo"><a href="index.php"><img src="logoupn.png" width="100" height="100"/></a>
                    </div>
            <div id="buscador" class="texto"> <form id="crd" method="post" action="buscar.php">
                <input name="buscar" id="buscar" required><input type="submit" value="buscar">
                </form>
                
                </div>
                <ul class="nav">
				<li><a href="index.php"> Inicio </a></li>
				<li><a href=""> Periodicos </a>
					<ul>
                        <li><a name="b" id="b" style=cursor:pointer; href="http://www.jornada.unam.mx/" target="_blank"> La Jornada </a></li>
						<li><a href="http://suracapulco.mx/" target="_blank"> El Sur </a></li>
						<li><a href="http://www.lajornadaguerrero.com.mx/" target="_blank"> La Jornada Guerrero </a></li>
                        <li><a href="http://www.diario21.com.mx/" target="_blank"> Diario 21 </a></li>     
					</ul>
				</li>
				<li><a name="biblio" id="biblio" style=cursor:pointer;> Biblioteca </a>
				</li>
                <li><a id="contacto" name="contacto" style=cursor:pointer;> Contactanos </a></li>
                    
                    <? 
                    if(isset($_SESSION['id_user'])){
                    echo "<li><a href=perfil.php style=cursor:pointer;>Perfil</a></li>
                        <li><a id=subir name=subir style=cursor:pointer;>Subir</a></li>
                        <li><a href=salir.php style=cursor:pointer;> Salir </a></li>";
                        }
                    else{
                    echo "<li><a style=cursor:pointer; id=login >Ingresar</a></li>";
                        }
                    ?>
                    
			</ul>
			</div>
		</header>
            <section id="wrap">

		<section id="main">
			<section id="contenido">
				<?
                if(isset($_POST['buscar'])){
                    $buscar = "select * from nota where titulo,contenido LIKE '%".$_POST['buscar']."%'";
                    $b=mysql_query($buscar);

while ($row2=mysql_fetch_assoc($b))
{
    
echo "<form action=consul2.php method=post>";
    
    $var = $row2['id'];
echo "<input type=hidden name=variable value=".$var.">";
    echo "<input type=submit value=ver mas>";
    echo "</form>";
    echo "<br><br>";
    
}
                }
                
                ?>
			</section>

			<section id="contenidoooo">
				<article>
				
				</article>

			</section>

			<aside>
				<section class="widget">
					<h3>Articulos Recientes</h3>
					<ul>
                        <?
                        $max="select * from nota order by id_n desc limit 5";
                        $max2=mysql_query($max) or die (mysql_error());
                        while ($max3=mysql_fetch_assoc($max2)){
                            echo "<li><a href=consul311.php?var2=".$max3['id_n']." target=_blank>".$max3['nombre']."</a></li>" ;
                        }                      
                        ?>
					</ul>
                    
                    
				</section>

			</aside>

		</section>

		<footer>
            <section id="acerca-de">
		Todos los derechos reservados a grupo de desarroladores.
            <p> Slides efectos Slides.jquery by Nathan Searles, http://nathansearles.com
* Version: 1.2</p>
            </section>

		</footer>

		<div id="copyright"><p> © 2016 UPEG-Victor, Cristian, Ma. de la Luz, Karina, Abraham </p></div>

	</section>

            </div>
    </body>
</html>