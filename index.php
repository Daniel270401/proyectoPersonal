<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <div id="cajaAgrupadora">
        <header id="cabecera">
            <h1>PROYECTO</h1>
        </header>
        <nav id="menu">
            <ul>
                <a href="index.php">Ingresar</a>
                <a href="registrar.php">Registrar</a>
            </ul>
        </nav>
        <br>
        <main>
            <section>
                <form method="post" action="<?php
                echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <h1>Inicar Sesión</h1>
                    <p>Usuario:</p>
                        <input type="text" placeholder="Ingrese usuario y/o email" name="usuario">
                    <p>Contraseña:</p>
                        <input type="text" placeholder="Ingrese contraseña" name="contraseña">
                    <p><input type="submit" value="Ingresar" formaction="home.php"></p>
                    <p>¿No tienes cuenta? Registrate <a href="registrarUsuario.php">aquí</a></p>
                </form>
            </section>
        </main>
    </div>
</body>
</html>

<?php
if (!empty($_POST))
{
    $usuario = $_POST["usuario"];
    $contra = $_POST["contraseña"];
    require_once "Conexion.php";

    try
    {
        $conn = new Conexion();
        $sql = "SELECT * FROM usuario WHERE usuario = :usuario || contra = :contraseña ";
        $resultados = $conn->conectar->exec($sql);
        $conn->Desconectar();

        if ($resultados!=1)
        {
            echo "No se guardó";
        }
        else
        {
            echo "Se guardó correctamente";
        }
    }
    catch(PDOException $e)
    {
        return $e->getMessage();
    }
}