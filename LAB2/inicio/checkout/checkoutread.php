<!DOCTYPE html>
<html lang="en">
<body>   
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if($_POST["rut"] == ""){
        $mess = urldecode("No hay Rut");
        header("Location: checkout.php ?message=".$mess);
    }
    $rut = $_POST["rut"];

    try {
        require_once "../dbh.inc.php";

        $connect = mysqli_connect("localhost","root","","lab2");

        $sql = "SELECT * FROM view_reserva WHERE RUT = $rut;";

        $result = mysqli_query($connect, $sql);

        $pdo = null;
        $stmt = null;
        
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else if (isset($_GET['rut'])) {
    $rut = $_GET['rut'];
    try {
        require_once "../dbh.inc.php";

        $connect = mysqli_connect("localhost","root","","lab2");

        $sql = "SELECT * FROM view_reserva WHERE RUT = $rut;";

        $result = mysqli_query($connect, $sql);

        $pdo = null;
        $stmt = null;
        
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}
else {
    header("Location: checkout.php");
}
?>
<br />  
    <div class="container" style="width:500px;">  
    <h3 align="">Lista de Huespedes: </h3><br />                 
        <div class="table-responsive">  
            <table class="table table-striped">  
                <tr>  
                    <th>Rut</th>  
                    <th>N° de Habitación</th>  
                    <th>Fecha CHECK IN</th>  
                    <th>Fecha CHECK OUT</th>  
                    <th>Tipo de Habitación</th>  
                    <th>Valor Dolares</th>  
                </tr>  
                <?php  
                while($row = mysqli_fetch_array($result))  
                {  
                ?>  
                <tr>  
                    <td><?php echo $row["RUT"]; ?></td>
                    <td><?php echo $row["N_HABITACION"]; ?></td>    
                    <td><?php echo $row["CHECK_IN"];?></td>  
                    <td><?php echo $row["CHECK_OUT"];?></td>  
                    <td><?php echo $row["Type"];?></td>  
                    <td><?php echo $row["Price"]; ?></td>  
                </tr>  
                <?php  
                }  
                ?>  
            </table>  
        </div>  
    </div>  
    <br>
    <form method="post" action="checkout.inc.php">
    <input type="hidden" name="rut" value="<?php echo $rut ?>" />
    N° Habitación: <input type="text" name="num_habitacion">
    <br>
    Fecha check in: <input type="text" name="fecha_check_in">
    <br>
    <h3>Retiro:</h3>
    Fecha check out: <input type="text" name="fecha_check_out">
    <br>
    Puntuación: <input type="text" name="stars">
    <br>
    <button> Chech Out </button>
    <?php
    if (isset($_GET['message'])){
        echo $_GET['message'];
    }
    ?>
</form>
<br>
<br>
<?php
if(isset($_GET['message2'])){
    echo $_GET['message2'] . $_GET['total'];
}
?>
<br>
<br>
<form method="post" action="checkout.php">
    <button> Volver </button>
</form>
<br />
</body>
</html>