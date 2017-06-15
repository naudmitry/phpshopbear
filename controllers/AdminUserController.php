<?php
/**
 * Контроллер AdminUserController
 * Управление пользователями в админпанели
 */
class AdminUserController extends AdminBase
{
    /**
     * Action для страницы "Управление пользователями"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список пользователей
        $usersList = User::getUsersListAll();
        // Подключаем вид
        require_once(ROOT . '/views/admin_user/index.php');
        return true;
    }
    /**
     * Action для страницы "Добавить пользователя"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['name'] = $_POST['name'];
            $options['email'] = $_POST['email'];
            $options['password'] = $_POST['password'];
            $options['address'] = $_POST['address'];
            $options['role'] = $_POST['role'];
            // Флаг ошибок в форме
            $errors = false;
            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['name']) || empty($options['name'])) {
                $errors[] = 'Заполните имя';
            }
            if (!isset($options['email']) || empty($options['email'])) {
                $errors[] = 'Заполните email';
            }
            if (!isset($options['password']) || empty($options['password'])) {
                $errors[] = 'Заполните пароль';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем нового пользователя
                $id = User::createUser($options);
                // Перенаправляем пользователя на страницу управлениями пользователями
                header("Location: /admin/user");
            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_user/create.php');
        return true;
    }
    /**
     * Action для страницы "Удалить пользователя"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем пользователя
            User::deleteUserById($id);
            // Перенаправляем пользователя на страницу управлениями пользователями
            header("Location: /admin/user");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_user/delete.php');
        return true;
    }
    /**
     * Action для страницы "Редактирование пользователя"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();
        // Получаем данные о конкретном пользователе
        $user = User::getUserById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $address = $_POST['address'];
            $role = $_POST['role'];
            // Сохраняем изменения
            User::updateUserById($id, $name, $email, $address, $role, $password);
            // Перенаправляем пользователя на страницу управлениями пользователями
            header("Location: /admin/user/view/$id");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_user/update.php');
        return true;
    }
}