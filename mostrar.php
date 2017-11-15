<?php
include("conexion.php");
//session_start();
if (is_null($_SESSION['username'])) {
    header("location: index.php"); /* Redirect browser */
}
else {

    $q = "SELECT * FROM recursos";
    echo "$q";
    $consulta = mysqli_query($conexion, $q);
    if (mysqli_num_rows($consulta)>0) {
        echo "<div class='uno'>";
        echo "<div class='tres'>"; 
        while ($recursos=mysqli_fetch_array($consulta)){
            $foto=$recursos["fotos_recursos"];
            $boton=$recursos["estado_recursos"];
            echo "<div class='fichaG'>";
            echo "<div class='imageG'>";
            echo "<img src='$foto'/>";
            echo "</div>";                 
            echo "</br><h3>". utf8_encode($recursos["nombre_recursos"])."</h3>";
            echo "<h4>".utf8_encode($recursos["descripcion_recursos"])."</h4>";
            echo "<button type='button'"." class='btn btn-success'>$boton</button>";
            echo "</div>";
        }
        echo "</div>";
        echo "</div>";

    } 
    else{
        echo "<h1>No hemos encontrado resultados, modifica la busqueda o intentalo mas tarde!</h1>";
    }


}

?>

