<?php
	class Product {
		const SHOW_BY_DEFAULT = 9;

		public static function getProductById($id) {
			// Соединение с БД
	        $db = Db::getConnection();
	        // Текст запроса к БД
	        $sql = 'SELECT * FROM product WHERE id = :id';
	        // Используется подготовленный запрос
	        $result = $db->prepare($sql);
	        $result->bindParam(':id', $id, PDO::PARAM_INT);
	        // Указываем, что хотим получить данные в виде массива
	        $result->setFetchMode(PDO::FETCH_ASSOC);
	        // Выполнение коменды
	        $result->execute();
	        // Получение и возврат результатов
	        return $result->fetch();
		}

		public static function getLatestProducts($count = self::SHOW_BY_DEFAULT) {
			$count = intval($count);
			$db = Db::getConnection();
			$productList = array();

			$result = $db->query('SELECT id, name, price, is_new, preview, brand FROM product '
				.'WHERE status = "1"'
				.'ORDER BY id DESC '
				.'LIMIT '.$count);

			$i = 0;
			while($row = $result->fetch()) {
				$productList[$i]['id'] = $row['id'];
				$productList[$i]['name'] = $row['name'];
				$productList[$i]['price'] = $row['price'];
				$productList[$i]['is_new'] = $row['is_new'];
				$productList[$i]['preview'] = $row['preview'];
				$productList[$i]['brand'] = $row['brand'];
				$i++;
			}

			return $productList;
		}

		public static function getProductsListByCategory($categoryId = false, $page = 1) {
			if ($categoryId) {
				$page = intval($page);
				$offset = ($page - 1) * self::SHOW_BY_DEFAULT;

				$db = Db::getConnection();
				$products = array();
				$result = $db->query("SELECT id, name, price, is_new, preview FROM product "
					."WHERE status = '1' AND category_id = '$categoryId' "
					."ORDER BY id ASC "
					."LIMIT ".self::SHOW_BY_DEFAULT
					.' OFFSET '.$offset);

				$i = 0;
				while ($row = $result->fetch()) {
					$products[$i]['id'] = $row['id'];
					$products[$i]['name'] = $row['name'];
					$products[$i]['price'] = $row['price'];
					$products[$i]['is_new'] = $row['is_new'];
					$products[$i]['preview'] = $row['preview'];
					$i++;
				}

				return $products;
			}
		}

		public static function getProductsList($page = 1) {
			$page = intval($page);
			$offset = ($page - 1) * self::SHOW_BY_DEFAULT;

			$db = Db::getConnection();
			$products = array();
			$result = $db->query("SELECT id, name, price, is_new, preview, brand, code FROM product "
				."WHERE status = '1' "
				."ORDER BY id ASC "
				."LIMIT ".self::SHOW_BY_DEFAULT
				.' OFFSET '.$offset);

			$i = 0;
			while ($row = $result->fetch()) {
				$products[$i]['id'] = $row['id'];
				$products[$i]['name'] = $row['name'];
				$products[$i]['price'] = $row['price'];
				$products[$i]['is_new'] = $row['is_new'];
				$products[$i]['preview'] = $row['preview'];
				$products[$i]['brand'] = $row['brand'];
				$products[$i]['code'] = $row['code'];
				$i++;
			}

			return $products;
		}

		public static function getProductsListAll() {
			
			$db = Db::getConnection();
			
			$result = $db->query("SELECT id, name, price, code FROM product "
				."ORDER BY id ASC");

			$productsList = array();

			$i = 0;
			while ($row = $result->fetch()) {
				$productsList[$i]['id'] = $row['id'];
				$productsList[$i]['name'] = $row['name'];
				$productsList[$i]['price'] = $row['price'];
				$productsList[$i]['code'] = $row['code'];
				$i++;
			}

			return $productsList;
		}

		public static function getTotalProductsInCategory($categoryId) {
			$db = Db::getConnection();

			$result = $db->query('SELECT count(id) AS count FROM product '
				.'WHERE status = "1" AND category_id="'.$categoryId.'"');
			$result->setFetchMode(PDO::FETCH_ASSOC);

			$row = $result->fetch();

			return $row['count'];
		}

		public static function getTotalProducts() {
			$db = Db::getConnection();

			$result = $db->query('SELECT count(id) AS count FROM product '
				.'WHERE status = "1"');
			$result->setFetchMode(PDO::FETCH_ASSOC);

			$row = $result->fetch();

			return $row['count'];
		}

		public static function getProductsByIds($idsArray) {
			$products = array();

			$db = Db::getConnection();

			$idsString = implode(',', $idsArray);

			$sql = "SELECT * FROM product WHERE status='1' AND id IN ($idsString)";

			$result = $db->query($sql);
			$result->setFetchMode(PDO::FETCH_ASSOC);

			$i = 0;
			while ($row = $result->fetch()) {
				$products[$i]['id'] = $row['id'];
				$products[$i]['code'] = $row['code'];
				$products[$i]['name'] = $row['name'];
				$products[$i]['price'] = $row['price'];
				$products[$i]['preview'] = $row['preview'];
				$products[$i]['brand'] = $row['brand'];
				$i++;
			}

			return $products;
		}

		public static function deleteProductById($id) {
	        // Соединение с БД
	        $db = Db::getConnection();
	        // Текст запроса к БД
	        $sql = 'DELETE FROM product WHERE id = :id';
	        // Получение и возврат результатов. Используется подготовленный запрос
	        $result = $db->prepare($sql);
	        $result->bindParam(':id', $id, PDO::PARAM_INT);
	        return $result->execute();
	    }

	    public static function createProduct($options)
	    {
	        // Соединение с БД
	        $db = Db::getConnection();
	        // Текст запроса к БД
	        $sql = 'INSERT INTO product '
	                . '(name, code, price, category_id, brand, availability,'
	                . 'description, is_new, is_recommended, status, preview)'
	                . 'VALUES '
	                . '(:name, :code, :price, :category_id, :brand, :availability,'
	                . ':description, :is_new, :is_recommended, :status, :preview)';
	        // Получение и возврат результатов. Используется подготовленный запрос
	        $result = $db->prepare($sql);
	        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
	        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
	        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
	        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
	        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
	        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
	        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
	        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
	        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
	        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
	        $result->bindParam(':preview', $options['name'], PDO::PARAM_STR);
	        
	        if ($result->execute()) {
	            // Если запрос выполенен успешно, возвращаем id добавленной записи
	            return $db->lastInsertId();
	        }
	        else {
	        // Иначе возвращаем 0
	        	return 0;
	    	}
	    }

		public static function getImage($id) {
	        // Название изображения-пустышки
	        $noImage = 'no-image.jpg';
	        // Путь к папке с товарами
	        $path = '/upload/images/products/';
	        // Путь к изображению товара
	        $pathToProductImage = $path . $id . '.jpg';
	        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
	            // Если изображение для товара существует
	            // Возвращаем путь изображения товара
	            return $pathToProductImage;
	        }
	        // Возвращаем путь изображения-пустышки
	        return $path . $noImage;
	    }

	    public static function updateProductById($id, $options)
	    {
	        // Соединение с БД
	        $db = Db::getConnection();
	        // Текст запроса к БД
	        $sql = "UPDATE product
	            SET 
	                name = :name, 
	                code = :code, 
	                price = :price, 
	                category_id = :category_id, 
	                brand = :brand, 
	                availability = :availability, 
	                description = :description, 
	                is_new = :is_new, 
	                is_recommended = :is_recommended, 
	                status = :status
	            WHERE id = :id";
	        // Получение и возврат результатов. Используется подготовленный запрос
	        $result = $db->prepare($sql);
	        $result->bindParam(':id', $id, PDO::PARAM_INT);
	        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
	        $result->bindParam(':code', $options['code'], PDO::PARAM_STR);
	        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
	        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
	        $result->bindParam(':brand', $options['brand'], PDO::PARAM_STR);
	        $result->bindParam(':availability', $options['availability'], PDO::PARAM_INT);
	        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
	        $result->bindParam(':is_new', $options['is_new'], PDO::PARAM_INT);
	        $result->bindParam(':is_recommended', $options['is_recommended'], PDO::PARAM_INT);
	        $result->bindParam(':status', $options['status'], PDO::PARAM_INT);
	        return $result->execute();
	    }

	}
?>