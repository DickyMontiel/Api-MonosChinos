<?php
    require "app/controller/api.monoschinos.easyprojects.php";

    if(isset($_POST['url'])){
        $api = new ApiMonosChinos;
    
        $api->setLinkAMC($_POST['url']);

        $api->sourceCodeAMC();

        if($api->errorVerifyAMC()){
            $api->iframeAMC();

            $video = $api->getVideoAMC();
            
            echo $video;
        }

    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- https://www.monoschinos.com/ver/nanatsu-no-taizai-imashime-no-fukkatsu-latino-episodio-1 -->
    <form method="post">
        <input type="url" name="url" id="">
        <button type="submit">Enviar</button>
    </form>
</body>
</html>