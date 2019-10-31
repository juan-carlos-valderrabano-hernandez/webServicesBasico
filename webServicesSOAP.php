<?php
            require_once "lib/nusoap.php";

            function muestraPlanetas(){
                $planetas = "Un planeta es un objeto astronómico que orbita una estrella que es lo suficientemente masivo como para ser redondeado por su propia gravedad, no es lo suficientemente masivo como para causar fusión termonuclear, y ha despejado su región vecina de planetesimales.";
                return $planetas;
            }

            function muestraImagen(){
                $img='img/planeta.jpg';

                return $img;
            }

            if (!isset($HTTP_RAW_POST_DATA)){
                $HTTP_RAW_POST_DATA = file_get_contents("php://input");
            }
            $server = new soap_server();
            $server->configureWSDL("Informacion Planetaria","urn:infoPlanetaria");
            $server->register("muestraPlanetas");
            $server->register("muestraImagen");
            $server->service($HTTP_RAW_POST_DATA);
        ?>