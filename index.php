<?php
    
  include("menu.php");

?>
<h1> este es el inicio </h1>

<?php
    
  $db = new mysqli('localhost','root','','proyectoa');//codigo de conexion base de datos
  if($db->connect_errno)
  {
      die("Error al conectar : ".$db->connect_error); //si hay error muere la app  osea todo codigo nose realiza 
 // concatencion es el punto que puse 
  }
// crear una consulta 

$sql = "SELECT * FROM persona";
$result = $db->query($sql); 

if(!$result){
    die("Error al consultar: ".$db->error);
}

if($result->num_rows==0){
    echo "no hay registros";
    
}
else {
    echo "<table border=1";
    echo "<tr>";
    echo "<th>ID</th><th>NOMBRES</th><th>APELLIDOS</th><th>EDAD</th><th>OPCIONES</th>";
    echo "</tr>";
    while($reg = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$reg['id']."</td>";
        echo "<td>".$reg['nombres']."</td>";
        echo "<td>".$reg['apellidos']."</td>";
        echo "<td>".$reg['edad']."</td>";
        echo "<td><a href ='eliminar.php?id=".$reg['id']."'>Eliminar</a></td>";
        echo "</tr>";
    }
    echo "</table>";
}
?>