<?php
//echo __FILE__ . "<br>";
//echo __DIR__ . "<br>";
//echo $_SERVER['DOCUMENT_ROOT'] . "<br>";

$fileName="message.txt";

if(!empty($_POST['message']))
{
    $file=fopen($fileName, "a+");
    fwrite($file,$_POST['message'] . PHP_EOL);
    fclose($file);
}

$strMessage=file_get_contents($fileName);
$arrayMessage=explode(PHP_EOL,$strMessage);

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="file.css"></link>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"></link>
    <title>Work_with_files</title>
</head>

<body>

    <form method='POST' enctype="multipart/form-data">

        <div class="container">
            <div class="form-group">
                <label for="send"> Введите сообщение: </label>
                <textarea name="message" id="send" value=""></textarea>
                <input id="button" type="submit"/>
            </div>
        </div>
        <div class="comment">
            <ul>
                <?php if(!empty($arrayMessage)):?>
                <?php foreach ($arrayMessage as $message):?>
                <li><?=$message?></li>
                <?php endforeach?>
                <?php endif?>
            </ul>
        </div>
    </form>

</body>
</html>