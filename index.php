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