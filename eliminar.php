<?php
include("header.html");
require("config.php");

if (isset($_GET['codigo'])) {
    foreach($conn->query("SELECT * FROM pedidos WHERE id = '".intval($_GET['codigo'])."'") as $row){
        //print_r($row);
        echo('<div class="card" style=width:18rem;">');

        echo('<div class="card-body">');
        echo('<h5 class="card-title">'.$row["producto"].'</h5>');
        echo('<p class="card-text">'.$row["unidades"].'</p>');
        echo('<p class="card-text">'.$row["fecha_pedido"].'</p>');

        echo('<form method="POST">');
        echo('<input type="hidden" name="codigo" value="' . $_GET['codigo'] . '">');
        echo('<button type="submit" class="btn btn-primary">Eliminar definitivamente</button>');
        echo('</form>');

        echo('</div>');
        echo('</div>');
    }
    echo("<h2>Eliminar pedidos - consultar</h2>");
} else {
    echo "No se ha proporcionado el código del pedido.";
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    $conn->query('delete from pedidos where id='.$_GET['codigo']);
    header('location:consultar.php');

}

?>



<?php
include("footer.html");

?>
