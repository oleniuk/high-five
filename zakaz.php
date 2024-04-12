﻿<?php
$nameFieldset = "Ім'я: ";
$name_tgFieldset = "Нік в тг: ";
$phoneFieldset = "Телефон: ";
$messageFieldset = "Повідомлення: ";

// Ваш токен ідентифікатора бота Telegram
$botToken = "7034406178:AAGmr8zTwd7DnQKT6usoCx7A8q9sFEPaKEE";
// Ваш чат ID
$chatID = "-4182211841";

// URL для перенаправлення після відправки заявки
$redirectURL = "form.php";


// Отримати дані з форми
$name = $_POST['name'];
$name_tg = $_POST['name_tg'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Формуємо повідомлення для відправки в Telegram
$message = urlencode(
    "$nameFieldset $name\n" .
    "$name_tgFieldset $name_tg\n" .
    "$phoneFieldset $phone\n" .
    "$messageFieldset $message"
);

// URL для відправки повідомлення в Telegram
$telegramURL = "https://api.telegram.org/bot$botToken/sendMessage?chat_id=$chatID&text=$message";

// Відправка запиту до Telegram API
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $telegramURL);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);

// Перевірка на успішність відправки повідомлення
if ($result) {
    // Перенаправлення на іншу сторінку
    header("Location: $redirectURL");
    exit();
} else {
    echo "An error occurred while sending the application.";
}



if ($sendToTelegram) {
    header("Location: form.php?name=$name&phone=$phone");
    echo '<p class="success">Thank you for sending your message!</p>';
    return true;
} else {
    echo '<p class="fail"><b>Error. Message not sent!</b></p>';
}

?>