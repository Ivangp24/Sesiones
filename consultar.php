<?php
include("header.html");
require("config.php");
echo"<br>";
echo"<br>";
?>

<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Fecha Pedidos</th>
        <th scope="col">Pedido</th>
        <th scope="col">Unidades</th>
        <th scope="col">Editar</th>
    </tr>
    </thead>

<?php
echo "<h2>Listado de pedidos - consultar</h2>";
try {

    foreach($conn->query('SELECT * from pedidos') as $row) {
        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['fecha_pedido']."</td>";
        echo "<td>".$row['producto']."</td>";
        echo "<td>".$row['unidades']."</td>";
        echo '<td><a href="eliminar.php?codigo='.$row["id"].'"><ion-icon name="trash-bin-outline" style= "width: 40px; height: 40px; background-color: red; border-radius: 15px "></ion-icon></a></td>';
        echo "</tr>";
        //mostrar en una tabla.
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

echo"<br>";
echo"<br>";

?>
</table>


<?php
include("footer.html");

?>
