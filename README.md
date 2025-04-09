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

5. Настройки для spatie/laravel-query-builder
   
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

8. Установите npm.

   ```bash
   npm install
   ```

9. Запустите cервер artisan и npm, а также воркер для очередей:

   ```
   php artisan serve
   ```
   ```
   npm run dev
   ```
   ```
   php artisan queue:work
   ```

## Использование

### При открытии страницы в браузере будет отображен удобный интерфейс для работы с таблицей пользователей.
### Имеется возможность добавлять, редактировать, удалять пользователя.
### При добавлении пользователя и правильной настройке SMTP, на указанную почту приходит пароль.

## Функционал авторизации пока не добавлен. Приложение работает только для отображения работы CRUD. Так же будут добавлены роли и пермишены.






