
    <?php
    session_start();
    if ( md5($_POST['code']) != $_SESSION['key'] ) {
    ?>
    <script> alert("Error: No has introducido el código correcto.");</script>
    <?php
        header("Location:index.php");
    } else {
    ?> <script> alert('Correcto, parece que eres un humano.'); </script>
    <?php
        header("Location:imagenPantalla.php");
    }
?>



