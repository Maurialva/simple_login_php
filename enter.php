<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter the Dragon</title>
</head>
<body>
      
<?php  


$ciphering ="AES-128-CTR"; //contiene el metodo de cifrado
$option=0; //contiene el bitwise de los flags
$encryption_iv='1234567890123456';//contiene el inicio del vector para que no sea nulo
$encryption_key="mauri";//llave de encriptado;
//$encryption[]=openssl_encrypt($user[$clave],$ciphering,$encryption_key,$option,$encryption_iv);
//$decryptation[]=openssl_decrypt($user[$clave],$ciphering,$encryption_key,$option,$encryption_iv);

$useraux;
$passaux;
$users;
$passs;
$users=file_get_contents("user.txt");
$user=unserialize($users);
$passs=file_get_contents("pass.txt");
$pass=unserialize($passs);
$enter=false;

foreach ($user as $c =>$value ) {
    $user[$c]=openssl_decrypt($user[$c],$ciphering,$encryption_key,$option,$encryption_iv);
}
foreach ($pass as $c  =>$value) {
    $pass[$c]=openssl_decrypt($pass[$c],$ciphering,$encryption_key,$option,$encryption_iv);
}


if (isset($_POST["boton"]))
{
    $useraux=$_POST["user"];
    $passaux=$_POST["password"];

    echo $useraux;
    foreach ($user as $clave => $valor)
    {
        
        
        if( $user[$clave] == $useraux  and $pass[$clave]==$passaux)
        {
            $enter=true;
        }
    }

} else {}

foreach ($user as $c =>$value) {
    $user[$c]=openssl_encrypt($user[$c],$ciphering,$encryption_key,$option,$encryption_iv);
}
foreach ($pass as $c =>$value) {
    $pass[$c]=openssl_encrypt($pass[$c],$ciphering,$encryption_key,$option,$encryption_iv);
}
$users_r = serialize($user);
file_put_contents("user.txt",$users_r);
$pass_r = serialize($pass);
file_put_contents("pass.txt",$pass_r);
if ($enter) 
{
    header("Location: atroden.html");
    exit();
}else
{
    header("Location: error.html");
    exit();
}

?>
</body>
</html>