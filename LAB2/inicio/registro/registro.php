<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1> Bienvenido, a continuacion reserve al huesped: </h1>
    <form method="post" action="create.inc.php">
        Rut: <input type="text" name="rut">
        <br>
        N° Habitación: <input type="text" name="num_habitacion">
        <br>
        Fecha check in: <input type="text" name="fecha_check_in">
        <br>
        Fecha check out: <input type="text" name="fecha_check_out">
        <br>
        <button> Crear </button>
        <?php
        if(isset($_GET['message1'])){
            echo $_GET['message1'];
        }
        ?>
    </form>
    <br>
    <h2> Barra de búsqueda habitación: </h2>
    <form method="post" action="read.php">
        N° Habitación: <input type="text" name="num_habitacion">
        <button> Buscar </button>
    </form>
    <br>
    <h2> Modificar Reserva: </h2>
    <form method="post" action="updateread.php">
        Rut: <input type="text" name="rut">
        <button> Revisar </button>
    </form>
    <br>
    <?php
    if (isset($_GET['message'])){
        echo $_GET['message'];
    }
    ?>
    <form method="post" action="../main.php">
        <button> Volver </button>
    </form>
</body>
</html>