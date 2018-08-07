<!DOCTYPE html>
<html>
    <head>
        <title>INFORMACION DEL USUARIO</title>
        <meta charset= "UTF-8">
        <link rel="stylesheet" href="css/style2.css">
    </head>
    <body>
        <section class="content">
            <div class="datos">
                <h2>SUS DATOS SON:</h2> 
                    <?php

                        $name = 'NN';
                        if (isset($_POST['name']) && $_POST['name'] != "") {
                            $name = $_POST['name'];
                        }
                        $email = '';
                        if (isset($_POST['email'])) {
                            $email = $_POST['email'];
                        }
                        $phone = '';
                        if (isset($_POST['phone'])) {
                            $phone = $_POST['phone'];
                        }

                        $nombre = $_POST['name'];
                        $email = $_POST['email'];
                        $phone = $_POST['phone'];
                        $message = $_POST['message'];

                        echo "<br/> El nombre del usuario es: " . $name;
                        echo "<br/> El mail del usuario es: " . $email;
                        echo "<br/> El telefono del usuario es: " . $phone;
                        echo "<br/> Su mensaje es: " . $message;
                    ?>
            </div> 
        </section>  
    </body>
</html>





