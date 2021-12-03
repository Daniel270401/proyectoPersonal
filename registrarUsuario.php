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
                <form method="post" action="home.php">
                    <h1>Registrarse</h1>
                    <p>Nombres:</p>
                        <input type="text" name="nombres" placeholder="Ingrese nombres">
                    <p>Apellidos:</p>
                        <input type="text" name="apellidos" placeholder="Ingrese apellidos">
                    <p>DNI:</p>
                        <input type="text" name="dni" placeholder="Ingrese DNI">
                    <p>Fecha de Nacimiento:</p>
                        <input type="text" name="fechNaci" placeholder="Ingrese fecha de nacimiento">
                    <p>Contraseña:</p>
                        <input type="text" name="contra" placeholder="Ingrese contraseña">
                    <p>Repetir contraseña:</p>
                        <input type="text" name="repContra" placeholder="Ingrese contraseña">
                    <p>Usuario:</p>
                        <input type="text" name="usuario" placeholder="Ingrese usuario">
                    <p>Email:</p>
                        <input type="text" name="email" placeholder="Ingrese email">
                    <p><input type="submit" name="submit" value="Guardar" formaction="home.php"></p>
                </form>
            </section>
        </main>
    </div>
</body>
</html>
<?php
if (!empty($_POST))
{
    require_once "Conexion.php";
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $dni = $_POST["dni"];
    $fechNaci = $_POST["fechNaci"];
    $contra = $_POST["contraseña"];
    $repContra = $_POST["repContra"];
    $usuario = $_POST["usuario"];
    $email = $_POST["email"];

    try
    {
        $conn = new Conexion();
        $sql = "INSERT INTO usuario(nombres,apellidos,dni,fechNaci,contra,repContra,usuario,email) 
                VALUES('$nombres','$apellidos',$dni,$fechNaci,'$contra','$repContra','$usuario','$email')";
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