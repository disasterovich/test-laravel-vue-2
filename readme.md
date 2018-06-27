Тестовое задание. laravel+vue

## Установка

1. клонируем проект с github

```
git clone https://github.com/disasterovich/test-laravel-vue-2.git
```

2. Создаем БД, прописываем свои логин, пароль, имя бд. (в файле .env). 
Если файла нет, можно взять за основу - https://github.com/laravel/laravel/blob/master/.env.example скопировав его в корень локального репозитория и переименовав в .env

3. Переходим в папку и устанавливаем composer и npm пакеты

```
composer install
npm install
```

4. Выполняем миграции:

```
php artisan migrate
```

5. запускаем встроенный web-сервер

```
php artisan serve
```

6. открываем браузер ( http://localhost:8000/ )