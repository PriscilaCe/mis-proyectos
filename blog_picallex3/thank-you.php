<?php
$client = new SoapClient("https://www.picallex.net/apiv2/api_lead_4.php?wsdl");

//Definir PRODUCTO aqui
$producto = 'PRODUCTO';
if (isset($_POST['producto'])) {
    $producto = $_POST['producto'];
}
//Definir MEDIO aqui
$medio = 'FACEBOOK';
if (isset($_POST['medio']) && $_POST['medio'] == 'gg') {
    $medio = 'GOOGLE';
}
//NOMBRE
$name = 'NN';
if (isset($_POST['name']) && $_POST['name'] != "") {
    $name = $_POST['name'];
}
//TELEFONO
$phone = '';
if (isset($_POST['phone'])) {
    $phone = $_POST['phone'];
}
//EMAIL
$email = '';
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
//ESTADO EJ: AR
$state = '';
if (isset($_POST['state'])) {
    $state = $_POST['state'];
}
//MENSAJE
$message = '';
if (isset($_POST['message'])) {
    $message = $_POST['message'];
}

//COMPROBACION PARA LEADS DE PRUEBAS
$testing = 'no';

$api_username = '';
$api_password = '';

if (strpos($name, 'clic2ring') !== false || strpos($name, 'CLIC2RING') !== false || strpos($email, '@CLIC2RING') !== false || strpos($email, '@clic2ring') !== false) {
    $testing = 'si';
}

if (preg_match('(0{7,}|1{7,}|2{7,}|3{7,}|4{7,}|5{7,}|6{7,}|7{7,}|8{7,}|9{7,})', $phone)) {
    $testing = 'si';
}

if ($testing == "si") {
    //Acceso para PRUEBAS
    $api_username = "cristian";
    $api_password = "password";
} else {
    //Definir acceso del cliente aqui
    $api_username = "";
    $api_password = "";
}
if (isset($_POST['email']) || isset($_POST['phone'])) {

    $ordenWs = array(
        'username' => $api_username,
        'password' => $api_password,
        'phone' => $phone,
        'nombre' => $name,
        'notas' => $message,
        'email' => $email,
        'direccion' => '',
        'ciudad' => '',
        'direccion_estado' => '',
        'zip' => '',
        'medio_nombre' => $medio,
        'medio_producto' => $producto,
        'tipo_medio' => '',
        'estrategia_id' => '',
        'url_origen' => 'http://clic2ring.com/producto',
        'codigo_pais' => $state,
        'region' => '',
        'telefono_2' => ''
    );

    $res = $client->insertarLead($ordenWs);
    $mensaje = 'Gracias por registrarse.';
    if ($res->codigo == -1) {
        $mensaje = 'Ha ocurrido un error en la registracion.';
        var_dump($res);
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>TITULO</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style2.css" rel="stylesheet">
        <link href="css/responsive2.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">         
                </div>
            </div>
        </div>
        <script src="js/jquery-2.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script>
            //Analytics
        </script>
    </body>
</html>