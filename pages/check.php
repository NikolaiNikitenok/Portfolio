<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['name']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);
    
    if(mb_strlen($login) < 4 || mb_strlen > 16) {
        echo "Недопустимая длина логина";
        exit();
    } else if(mb_strlen($name) < 2 || mb_strlen > 16) {
        echo "Недопустимая длина имени";
        exit();
    } else if(mb_strlen($pass) < 6 || mb_strlen > 32) {
        echo "Недопустимая длина пароля (от 6 до 32 символов)";
        exit();
    }

    $pass = md5($pass."sdfghwerytuxcvn12345");

    $mysql = new mysqli('localhost', 'root', 'root', 'portfolio');
    $mysql->query("INSERT INTO `users` (`login`, `name`, `pass`) VALUES('$login', '$name', '$pass')");
    
    $mysql->close();

    header('Location: /Portfolio/pages/register.html');
    
    
?>
    