<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <title>Форма обратной связи </title>
    <meta name="description" content=""/>
    <meta name="keywords" content=""/>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script type="text/javascript" src="./js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="./js/script.js"></script>
</head>
<body>
<div id="content">
    <a href="#" id="feedback" class="btn button">Напишите нам</a>
</div>
<div id="popup">
    <form id="contact_form" role="form" method="post" action="./php/feedback.php">
        <h3>Напишите нам</h3>
        <input type="text" name="name" placeholder="Как к вам обращаться?">
        <input type="text" name="email" placeholder="Email">
        <textarea name="comment" placeholder="Текст сообщения" rows="5"></textarea>
        <a href="#" class="btn button">Отправить</a>
    </form>
</div>
</body>
</html>