<?php
$theme = $_POST['theme'];
$sender = $_POST['sender'];
$appeal = $_POST['appeal'];
// описание метода api telegram 
// https://core.telegram.org/bots/api#sendmessage
 
$tg_user = '977287114'; // id пользователя, которому отправиться сообщения
$bot_token = '6052229231:AAG0IE74Fm26MCSIzDYaEOcCR697K-2IDX4'; // токен бота
 
$text = "ПОСТУПИЛА НОВАЯ ЗАЯВКА \n\n<b>Отправитель:</b> $sender \n<b>Тема:</b> $theme \n<b>Текст обращения:</b> $appeal";
 
// параметры, которые отправятся в api телеграмм
$params = array(
    'chat_id' => $tg_user, // id получателя сообщения
    'text' => $text, // текст сообщения
    'parse_mode' => 'HTML', // режим отображения сообщения, не обязательный параметр
);
 
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://api.telegram.org/bot' . $bot_token . '/sendMessage'); // адрес api телеграмм
curl_setopt($curl, CURLOPT_POST, true); // отправка данных методом POST
curl_setopt($curl, CURLOPT_TIMEOUT, 10); // максимальное время выполнения запроса
curl_setopt($curl, CURLOPT_POSTFIELDS, $params); // параметры запроса
$result = curl_exec($curl); // запрос к api
curl_close($curl);
 
//var_dump(json_decode($result));
?>