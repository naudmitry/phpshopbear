<?php
/**
 * Контроллер AdminNewsController
 * Управление новостями в админпанели
 */
class AdminTidingsController extends AdminBase
{
    /**
     * Action для страницы "Управление новостями"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();
        // Получаем список новостей
        $newsList = News::getNewsListAll();
        // Подключаем вид
        require_once(ROOT . '/views/admin_tidings/index.php');
        return true;
    }
    /**
     * Action для страницы "Добавить новость"
     */
    public function actionCreate()
    {
        // Проверка доступа
        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы
            $options['title'] = $_POST['title'];
            $options['date'] = $_POST['date'];
            $options['short_content'] = $_POST['short_content'];
            $options['content'] = $_POST['content'];
            $options['author_name'] = $_POST['author_name'];
            $options['type'] = $_POST['type'];
            
            // Флаг ошибок в форме
            $errors = false;
            // При необходимости можно валидировать значения нужным образом
            if (!isset($options['title']) || empty($options['title'])) {
                $errors[] = 'Заполните название';
            }
            if (!isset($options['date']) || empty($options['date'])) {
                $errors[] = 'Заполните дату';
            }
            if (!isset($options['short_content']) || empty($options['short_content'])) {
                $errors[] = 'Заполните короткое описание';
            }
            if (!isset($options['content']) || empty($options['content'])) {
                $errors[] = 'Заполните полное описание';
            }
            if (!isset($options['author_name']) || empty($options['author_name'])) {
                $errors[] = 'Заполните автора';
            }
            if (!isset($options['type']) || empty($options['type'])) {
                $errors[] = 'Заполните тип';
            }
            if ($errors == false) {
                // Если ошибок нет
                // Добавляем новую новость
                $id = News::createNews($options);
                // Если запись добавлена
                if ($id) {
                    // Проверим, загружалось ли через форму изображение
                    if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                        // Если загружалось, переместим его в нужную папке, дадим новое имя
                        move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/news/{$id}.jpg");
                    }  
                };
                // Перенаправляем пользователя на страницу управлениями новостями
                header("Location: /admin/tidings");
            }
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_tidings/create.php');
        return true;
    }

    /**
     * Action для страницы "Удалить новость"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем новость
            News::deleteNewsById($id);
            // Перенаправляем пользователя на страницу управлениями новостями
            header("Location: /admin/tidings");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_tidings/delete.php');
        return true;
    }
    /**
     * Action для страницы "Редактировать новость"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();
        // Получаем данные о конкретном заказе
        $news = News::getNewsItemById($id);
        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы редактирования. При необходимости можно валидировать значения
            $options['title'] = $_POST['title'];
            $options['date'] = $_POST['date'];
            $options['short_content'] = $_POST['short_content'];
            $options['content'] = $_POST['content'];
            $options['author_name'] = $_POST['author_name'];
            $options['type'] = $_POST['type'];
            
            // Сохраняем изменения
            if (News::updateNewsById($id, $options)) {
                // Если запись сохранена
                // Проверим, загружалось ли через форму изображение
                if (is_uploaded_file($_FILES["image"]["tmp_name"])) {
                    // Если загружалось, переместим его в нужную папке, дадим новое имя
                   move_uploaded_file($_FILES["image"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . "/upload/images/news/{$id}.jpg");
                }
            }
            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/tidings");
        }
        // Подключаем вид
        require_once(ROOT . '/views/admin_tidings/update.php');
        return true;
    }
}

