<?php
// Определяем путь до файла с пользователями
$usersFile = 'users.json';

// Проверяем, что файл существует и доступен для чтения и записи
if (!file_exists($usersFile) || !is_readable($usersFile) || !is_writable($usersFile)) {
  die('Error: unable to access users file');
}

// Определяем действие, которое нужно выполнить
$action = $_GET['action'] ?? '';

// Проверяем, что действие задано и является допустимым
if ($action !== 'register' && $action !== 'authenticate') {
  die('Error: invalid action');
}

// Получаем данные из POST-запроса
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Проверяем, что данные заданы и не являются пустыми
if (empty($username) || empty($password)) {
  die('Error: invalid data');
}

// Читаем данные из файла с пользователями
$usersData = file_get_contents($usersFile);
// Преобразуем данные из формата JSON в массив PHP
$users = json_decode($usersData, true);

// Проверяем, что файл удалось прочитать и декодировать
if ($users === null) {
  die('Error: unable to read users file');
}

// Выполняем действие в зависимости от типа запроса
if ($action === 'register') {
    // Проверяем, что пользователь с таким именем еще не зарегистрирован
    if (isset($users[$username])) {
        die('Error: user already exists');
    }
    
    // Добавляем нового пользователя в массив и записываем данные в файл
    $users[$username] = array('password' => $password);
    $result = file_put_contents($usersFile, json_encode($users));
    // Проверяем, что запись в файл удалась
    if ($result === false) { die('Error: unable to write to users file'); }
    // Возвращаем результат в формате JSON 
    header('Content-Type: application/json');
    echo json_encode(['message' => 'Registration successful']);
} 

 elseif ($action === 'authenticate') { 
    // Проверяем, что пользователь с таким именем существует
    if (!isset($users[$username])) { die('Error: user not found'); } 
    //Проверяем, что пароль совпадает 
    if ($users[$username]['password'] !== $password) { die('Error: incorrect password'); }
    // Возвращаем результат в формате JSON 
    header('Content-Type: application/json');
    echo json_encode(['message' => 'Authentication successful']);
}?> 
