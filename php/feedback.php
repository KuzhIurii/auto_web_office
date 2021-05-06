<?php

error_reporting(1);

/*
 * Параметры подключения к бд
 */
$db_host = 'localhost';
$db_login = 'app';
$db_passwd = 'app';
$db_name = 'app';

/*
 *  Подключаемся к бд
 */
$db = new mysqli($db_host, $db_login, $db_passwd, $db_name);
/*
 * Проверяем наличие таблицы, если нет то создаем
 */

// запрос
$query = "CREATE TABLE IF NOT EXISTS feedbacks
(
     	id int,
     	name tinytext null,
     	email tinytext null,
     	comment text null
);

create unique index feedbacks_id_uindex
	on feedbacks (id);

alter table feedbacks
	add constraint feedbacks_pk
		primary key (id);

alter table feedbacks modify id int auto_increment;";

//Обращение к базе
$db->multi_query($query);

//Очищаем результаты запроса
while ($db->next_result()) $db->store_result();

/*
 * Заполняем базу, отправляем ответ
 */

if (!empty($_POST['name'])) {
//Преобразум пользовательские данные и обрезаем
    $name = substr(htmlspecialchars(trim($_POST['name'])), 0, 250);
    $email = substr(htmlspecialchars(trim($_POST['email'])), 0, 250);
    $comment = substr(htmlspecialchars(trim($_POST['comment'])), 0, 2000);

//Подготавливаем запрос
    $query = "INSERT INTO feedbacks (name, email, comment) VALUES (?,?,?)";
    $prepared = $db->prepare($query);
    $prepared->bind_param("sss", $name, $email, $comment);

//Выполняем запрос

    if ($prepared->execute() === TRUE) {
        echo "<p>Спасибо " . $name . ".</p>";

    } else {
        echo "<p>К сожалению произошла ошибка, попробуйте позже</p>";

    }
    /*
 * Закрываем соединения
 */
    $prepared->close();


} else {

    echo "<p>Заполните форму пожалуйста</p>";

}
$db->close();