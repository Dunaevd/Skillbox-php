<?php
 $userEmail = ""; // логин пользователя
 $userPassword = ""; // пароль пользователя
    if (! empty($_GET['form'])) {
        if ($_GET['form'] == 'active') {
            include($_SERVER['DOCUMENT_ROOT'] . '/data/users.php');
            include($_SERVER['DOCUMENT_ROOT'] . '/data/passwords.php');
            $userEmail = $_POST['login'];
            $userPassword = $_POST['password'];
        }
    }

    $success = false; // успешная авторизация.
    $error = false;   // ошибка, пароль или логин не правильные.
    $userLogin = false; // логин определен, проверка на ссответствие паролю.
    $idUser; // индекс логина.
    $isSuccess = false;

    if (! empty($_POST['submit'])) {
        if ($_POST['submit'] == 'send') {
            if (in_array($userEmail, $users)) {
                $userLogin = true; 
                foreach ($users as $key => $value) {
                   if ($userEmail == $value) {
                       $idUser = $key;
                   }
                }
            } else {
                $error = true;
            }   
        }
    }

    if ($userLogin) {
        if ($userEmail == $users[$idUser] && $userPassword == $passwords[$idUser]) {
            $success = true;
        } else {
            $error = true;
        }   
        
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="styles.css" rel="stylesheet">
    <title>Project - ведение списков/Сайт в разработке</title>
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
</head>

<body>

    <div class="header">
    	<a class="logo" href="/"><img src="i/logo.png" alt="Project"></a>
    	<div class="author">Автор: <span class="author__name">***</span></div>
	    <div class="author"><span class="author__name">+++</span></div>
    </div>

    <div class="clear">
        <ul class="main-menu">
            <li><a href="/">Главная</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Контакты</a></li>
            <li><a href="#">Новости</a></li>
            <li><a href="#">Каталог</a></li>
            <li><a href="#">Товары</a></li>
        </ul>
    </div>

	<table width="100%" border="0" cellspacing="0" cellpadding="0">
    	<tr>
        	<td class="left-collum-index">
			
				<h1>Возможности проекта —</h1>
				<p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.</p>
				
			
			</td>
            <td class="right-collum-index">
				
				<div class="project-folders-menu">
					<ul class="project-folders-v">
    					<li class="project-folders-v-active"><a href="/?login=yes">Авторизация</a></li>
    					<li><a href="#">Регистрация</a></li>
    					<li><a href="#">Забыли пароль?</a></li>
					</ul>
				    <div class="clearfix"></div>
				</div>
                
				<div class="index-auth">
        <?php
        
            if (! empty($_GET['login'])) {
                do {?>
                <form action="/?form=active" method="post">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="iat">
                                    <label for="login_id">Ваш e-mail:</label>
                                    <input id="login_id" size="30" name="login" value="<?=$success ? "" : $userEmail?>" >
                                </td>
                            </tr>
                            <tr>
                                <td class="iat">
                                    <label for="password_id">Ваш пароль:</label>
                                    <input id="password_id" size="30" name="password" type="password" value="<?=$success ? "" : $userPassword?>">
                                </td>
                            </tr>
                                 <tr>
                                    <td><input type="submit" value="Войти"></td>
                                </tr>
                                <tr>
                                    <td><input type="hidden" name="submit" value="<?= 'send'?>"></td>
                                </tr>
                                <tr>
    
                                </tr>
                        </table>
                    </form>
               <?php }
                while (empty($_GET['login']));  
        } else {
            if (! empty($_POST['submit'])) {
                if ($_POST['submit'] == 'send' && $success)
                include($_SERVER['DOCUMENT_ROOT'] . '/include/success_message.php');
            } if ($error) {
                include($_SERVER['DOCUMENT_ROOT'] . '/include/error_message.php');?>
                    <form action="/?form=active" method="post">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="iat">
                                    <label for="login_id">Ваш e-mail:</label>
                                    <input id="login_id" size="30" name="login" value="<?=$success ? "" : $userEmail?>" >
                                </td>
                            </tr>
                            <tr>
                                <td class="iat">
                                    <label for="password_id">Ваш пароль:</label>
                                    <input id="password_id" size="30" name="password" type="password" value="<?=$success ? "" : $userPassword?>">
                                </td>
                            </tr>
                                 <tr>
                                    <td><input type="submit" value="Войти"></td>
                                </tr>
                                <tr>
                                    <td><input type="hidden" name="submit" value="<?= 'send'?>"></td>
                                </tr>
                                <tr>
    
                                </tr>
                        </table>
                    </form>
          <?php  }
        }
    
        ?>
                    
				</div>
			
			</td>
        </tr>
    </table>

    
    <div class="clearfix">
        <ul class="main-menu bottom">
            <li><a href="#">Главная</a></li>
            <li><a href="#">О нас</a></li>
            <li><a href="#">Контакты</a></li>
            <li><a href="#">Новости</a></li>
            <li><a href="#">Каталог</a></li>
        </ul>
    </div>

    <div class="footer">&copy;&nbsp;<nobr>2018</nobr> Project.</div>

</body>
<pre>
<?php /*
var_dump($_GET);
var_dump($_POST);
var_dump($passwords); 
var_dump($users);
var_dump($userEmail);
var_dump($userPassword);
var_dump($success);
var_dump($userLogin);
var_dump($error);
var_dump($idUser); */
?> 
</pre>

</html>
