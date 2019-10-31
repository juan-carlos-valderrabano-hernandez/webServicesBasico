<html>
    <head>
    </head>
    <body>
    <h1>Web Services Ultra Mega Básico</h1>
    <hr>
    <br/>
    
    <?php
    $curl = curl_init("http://localhost/WebServicesBasico/datos.txt");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    $info = curl_getinfo($curl);

    if ($info['http_code']==200){
        $datos = explode(",", $respuesta);
        echo "<h1>Frutas en mi tienda<h1>";
        foreach($datos as $fruta){
            echo $fruta."<br>";
        }

    }else if ($info['http_code']==404){
        echo "No existe";
    }else{
        echo "error: ".curl_error($curl);
    }

?>      
<br/>

<br/>
        
<br/>
        <h1>Ejemplo básico de SOAP</h1>
        <hr/>
        <br/>
        <?php
            require_once "lib/nusoap.php";
            $cliente = new nusoap_client("http://localhost/WebServicesBasico/webServicesSOAP.php");
            $planetas = $cliente->call("muestraPlanetas");
            $image = $cliente->call("muestraImagen");

        ?>
        <h3><?=$planetas?></h3>
        <h3></h3>
        <img src="<?=$image?>" alt="">
    </body>
</html>

