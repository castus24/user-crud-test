# Laravel User Crud + Vue on Vuetify

## Установка

### Требования

- PHP 8.0^
- Laravel 10
- MySQL 5.7 (или другой поддерживаемый драйвер базы данных)
- vue 3.5^
- vue-router 4.4^
- vuetify 3.7^
- @vitejs/plugin-vue 4.6^
- @mdi/font 7.0^

### Установка

1. Клонируйте репозиторий:

   ```
   git clone https://github.com/castus24/user-crud-test.git

2. Установите зависимости с помощью Composer:

   ```bash
   composer install

3. Скопируйте файл .env.example в .env и настройте параметры подключения к базе данных:
    В .env установите настройки Mail для получения по почте пароля пользователя.
    Работать он будет используя очереди. Установите QUEUE_CONNECTION=database.

   ```
   .env.example .env
   ```

4. Сгенерируйте ключ приложения:

   ```bash
    php artisan key:generate
   ```

5. Установите библиотеку spatie/laravel-query-builder

   ```bash
   composer require spatie/laravel-query-builder
   ```
   
   ```bash
   php artisan vendor:publish --provider="Spatie\QueryBuilder\QueryBuilderServiceProvider" --tag="query-builder-config"
   ```

6. Создайте миграцию для таблицы очередей.

   ```bash
   php artisan queue:table
   ```
   
7. Запустите миграции для создания таблиц:

   ```bash
   php artisan migrate
   ```

8. Установите npm, vue, vuetify, vue-router.

   ```bash
   npm install
   ```

   ```bash
   npm isntall vue
   ```

   ```bash
   npm isntall vuetify
   ```

   ```bash
   npm isntall vue-router
   ```

   ```bash
   npm isntall @vitejs/plugin-vue
   ```
   ```bash
   php artisan @mdi/font
   ```

9. Запустите cервер artisan и npm, а также воркер для очередей:

   ```
   php artisan serve
   ```
   ```
   npm install
   ```
   ```
   php artisan queue:work
   ```

## Использование

### При открытие старнрицы в браузере будет отображен удобный интерфей для работы с таблией пользователей.
### Имеется возможность добавлять, редактировать, удалять пользователя.
### При добавлении пользователя , при правильной настройке SMTP на указанную почту приходит пароль.

## Функионал авторизации пока не добавлен. Приложение работает только для отображения работы CRUD. Так же будут добавлены роли и пермишены.






