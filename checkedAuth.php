<?php

if (isset($_POST['emailUser']) && isset($_POST['passwUser']) && isset($_POST['passwUser2']))
{

    //htmlspecialchars преобразование введённых спецсимволов в html сущности,
    //нужна при обращении к базе данных, но опять-таки в сочетании с подготовленным запросом
    $email = htmlspecialchars($_POST['emailUser']);
    $passw = strlen($_POST['passwUser']);

    $passw1 = $_POST['passwUser'];
    $passw2 = $_POST['passwUser2'];

    $error_name = [1 => 'введёный email некорректен', 
                   2 => 'пароли не сопадают', 
                   3 => 'слишком коротки пароль'];

            //регулярка для проверки email на корректность, использую в с своей работы regex101.com
    $pattern = '/^([a-zA-Z0-9._-]+)@([a-zA-Z0-9_-]+)\.([a-zA-Z]{2,5})$/';

           //метод выполняющий проверку на соответствие регулярному выражению
    preg_match($pattern, $email, $matches, PREG_OFFSET_CAPTURE);

 
    if (!$matches) { 
        echo $error_name[1];
    } else {
    if ($passw < 8) {
        echo $error_name[3];
    } else {
    if ($passw1 != $passw2) {
        echo $error_name[2];
    } else {
        echo 'Всё ок!';
    }
    }
    
}

}

?>
