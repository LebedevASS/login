// Получаем ссылки на элементы формы регистрации и формы логина
const registerForm = document.querySelector('.register form');
const loginForm = document.querySelector('.login form');

// Добавляем обработчик события "submit" на форму регистрации
registerForm.addEventListener('submit', function(event) {
  // Отменяем стандартное поведение формы
  event.preventDefault();
  
  // Получаем данные формы
  const username = registerForm.querySelector('#username').value;
  const password = registerForm.querySelector('#password').value;
  
  // Отправляем данные на сервер для регистрации
  register(username, password);
});

// Добавляем обработчик события "submit" на форму логина
loginForm.addEventListener('submit', function(event) { 
    // Отменяем стандартное поведение формы 
    event.preventDefault();
    // Получаем данные формы 
    const username = loginForm.querySelector('#username').value; 
    const password = loginForm.querySelector('#password').value;
    // Отправляем данные на сервер для аутентификации
     authenticate(username, password); 
});

// Функция для отправки данных на сервер для регистрации 
function register(username, password) { 
    // Создаем объект FormData для отправки данных на сервер
    const formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);
    // Отправляем данные на сервер с помощью AJAX-запроса 
    
    fetch('server.php?action=register', { method: 'POST', body: formData }) .then(response => response.json()) .then(result => { 
    // Выводим сообщение об успешной регистрации 
    alert(result.message);
    // Очищаем форму регистрации
    registerForm.reset();
    // Отображаем форму логина
    registerForm.style.display = 'none';
    loginForm.style.display = 'block';}) .catch(error => { 
        // Выводим сообщение об ошибке регистрации 
        alert(error.message); 
    }); 
}
// Функция для отправки данных на сервер для аутентификации 
function authenticate(username, password) { 
    // Создаем объект FormData для отправки данных на сервер 
    const formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);
    // Отправляем данные на сервер с помощью AJAX-запроса 
    fetch('server.php?action=authenticate', { method: 'POST', body: formData }) .then(response => response.json()) .then(result => { 
    // Выводим сообщение об успешной аутентификации 
    alert(result.message);
    // Очищаем форму логина
    loginForm.reset();
    
    // Скрываем форму логина и форму регистрации
    registerForm.style.display = 'none';
    loginForm.style.display = 'none';}) .catch(error => { 
        // Выводим сообщение об ошибке аутентификации
         alert(error.message);
        }); 
}
    