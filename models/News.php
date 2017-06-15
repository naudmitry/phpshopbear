<?php

class News {
	/**
	 * Returns single news item with specified id
	 * @param integer $id
	 */
	public static function getNewsItemById($id) {
		$id = intval($id);

		if ($id) {
			$db = Db::getConnection();

			$result = $db->query('SELECT * from news WHERE id='.$id);
			$result->setFetchMode(PDO::FETCH_ASSOC);

			$newsItem = $result->fetch();

			return $newsItem;
		}
	}
	/**
	 * Returns an array of news items
	 */
	public static function getNewsList(){
		$db = Db::getConnection();
		$newsList = array();

		$result = $db->query('SELECT id, title, date, short_content, author_name, preview '
			.'FROM news '
			.'ORDER BY date DESC '
			.'LIMIT 10');

		$i = 0;
		while ($row = $result->fetch()){
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['date'] = $row['date'];
			$newsList[$i]['short_content'] = $row['short_content'];
			$newsList[$i]['author_name'] = $row['author_name'];
			$newsList[$i]['preview'] = $row['preview'];
			$i++;
		}

		return $newsList;
	}

	public static function getNewsListAll() {
		$db = Db::getConnection();
		
		$result = $db->query("SELECT * FROM news ORDER BY id ASC");

		$newsList = array();

		$i = 0;
		while ($row = $result->fetch()) {
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['date'] = $row['date'];
			$newsList[$i]['short_content'] = $row['short_content'];
			$newsList[$i]['content'] = $row['content'];
			$newsList[$i]['author_name'] = $row['author_name'];
			$newsList[$i]['type'] = $row['type'];
			$newsList[$i]['preview'] = $row['preview'];
			$i++;
		}

		return $newsList;
	}

	public static function createNews($options)
    {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'INSERT INTO news '
                . '(title, date, short_content, content, author_name, type)'
                . 'VALUES (:title, :date, :short_content, :content, :author_name, :type)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
        $result->bindParam(':date', $options['date'], PDO::PARAM_STR);
        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
        $result->bindParam(':author_name', $options['author_name'], PDO::PARAM_STR);
        $result->bindParam(':type', $options['type'], PDO::PARAM_STR);
        
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        else {
        // Иначе возвращаем 0
        	return 0;
    	}
    }

    public static function deleteNewsById($id) {
        // Соединение с БД
        $db = Db::getConnection();
        // Текст запроса к БД
        $sql = 'DELETE FROM news WHERE id = :id';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getImage($id) {
        // Название изображения-пустышки
        $noImage = 'no-image.jpg';
        // Путь к папке с товарами
        $path = '/upload/images/news/';
        // Путь к изображению товара
        $pathToNewsImage = $path . $id . '.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToNewsImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToNewsImage;
        }
        // Возвращаем путь изображения-пустышки
        return $path . $noImage;
    }

    public static function updateNewsById($id, $options)
	    {
	        // Соединение с БД
	        $db = Db::getConnection();
	        // Текст запроса к БД
	        $sql = "UPDATE news
	            SET 
	                title = :title, 
	                date = :date, 
	                short_content = :short_content, 
	                content = :content, 
	                author_name = :author_name, 
	                type = :type 
	            WHERE id = :id";
	        // Получение и возврат результатов. Используется подготовленный запрос
	        $result = $db->prepare($sql);
	        $result->bindParam(':id', $id, PDO::PARAM_INT);
	        $result->bindParam(':title', $options['title'], PDO::PARAM_STR);
	        $result->bindParam(':date', $options['date'], PDO::PARAM_STR);
	        $result->bindParam(':short_content', $options['short_content'], PDO::PARAM_STR);
	        $result->bindParam(':content', $options['content'], PDO::PARAM_STR);
	        $result->bindParam(':author_name', $options['author_name'], PDO::PARAM_STR);
	        $result->bindParam(':type', $options['type'], PDO::PARAM_STR);
	        return $result->execute();
	    }
}
?>