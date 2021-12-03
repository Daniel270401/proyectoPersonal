<?php
require_once "Conexion.php";

try
{
    $conn = new Conexion();
    $sql = "SELECT * FROM usuario";
    $resultados = $conn->conectar->query($sql);
    $conn->Desconectar();
}
catch(PDOException $e)
{
    return $e->getMessage();
}
?>

<table border="1" cellspacing="0">
    <thead>
        <tr>
            <th>id</th>
            <th>nombre</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach ($resultados as $usuario)
        {
            echo
            "<tr>
                <td>".$usuario["id"]."</td>
                <td>".$usuario["nombre"]."</td>
            </tr>";
        }
    ?>
    </tbody>
</table>
