<!doctype html>

<html>
    <head>
        <meta charset="utf-8">
        <title>Formulario Registro </title>
        <link rel="stylesheet" href="styles1.css">
    </head>

    <body>
        <div class= "group">
        <form method="POST" action=" ">
            <h2><em> Formulario Registro Php </em></h2>
            <label for="nombre"> Nombre <span><em>(obligatorio)</em></span></label>
            <input type="text" name="nombre" class="form-input" required/>

            <label for="apellido"> Apellido <span><em>(obligatorio)</em></span></label>
            <input type="text" name="apellido" class="form-input" required/>

            <label for="email"> Email <span><em>(obligatorio)</em></span></label>
            <input type="email" name="email" class="form-input" required/>

            <input class="form-btn" name="submit" type="submit" value="Registrate" />
            
            <?php
            
            if($_POST){
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $email = $_POST['email'];

                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "curso sql";

                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Conexion fallida: ". $conn->connect_error);
                }
                
                $sql = "INSERT INTO `usuario`(`nombre`, `apellido`, `email`) VALUES ('$nombre', '$apellido', '$email')";

                if ($conn->query($sql)===TRUE) {
                    echo "Nuevo registro se ha creado con exito";
                } else {
                    echo "Error: " . $sql . "<br>" .$conn->error;
                }
                $conn->close();
            }
            ?>
        </form>
    </body>
</html>