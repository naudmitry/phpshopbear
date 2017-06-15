<?php
	class User {
		public static function getUsersListAll() {
			$db = Db::getConnection();
			
			$result = $db->query("SELECT * FROM user ORDER BY id ASC");

			$usersList = array();

			$i = 0;
			while ($row = $result->fetch()) {
				$usersList[$i]['id'] = $row['id'];
				$usersList[$i]['name'] = $row['name'];
				$usersList[$i]['email'] = $row['email'];
				$usersList[$i]['address'] = $row['address'];
				$usersList[$i]['role'] = $row['role'];
				$usersList[$i]['password'] = $row['password'];
				$i++;
			}

			return $usersList;
		}

		public static function createUser($options)
	    {
	        // Соединение с БД
	        $db = Db::getConnection();
	        // Текст запроса к БД
	        $sql = 'INSERT INTO user '
	                . '(name, email, password, address, role)'
	                . 'VALUES (:name, :email, :password, :address, :role)';
	        // Получение и возврат результатов. Используется подготовленный запрос
	        $result = $db->prepare($sql);
	        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
	        $result->bindParam(':email', $options['email'], PDO::PARAM_STR);
	        $result->bindParam(':password', $options['password'], PDO::PARAM_STR);
	        $result->bindParam(':address', $options['address'], PDO::PARAM_STR);
	        $result->bindParam(':role', $options['role'], PDO::PARAM_STR);
	        
	        if ($result->execute()) {
	            // Если запрос выполенен успешно, возвращаем id добавленной записи
	            return $db->lastInsertId();
	        }
	        else {
	        // Иначе возвращаем 0
	        	return 0;
	    	}
	    }

	    public static function deleteUserById($id) {
	        // Соединение с БД
	        $db = Db::getConnection();
	        // Текст запроса к БД
	        $sql = 'DELETE FROM user WHERE id = :id';
	        // Получение и возврат результатов. Используется подготовленный запрос
	        $result = $db->prepare($sql);
	        $result->bindParam(':id', $id, PDO::PARAM_INT);
	        return $result->execute();
	    }

		public static function register($name, $email, $password, $address) {
			$db = Db::getConnection();
			
			$sql = 'INSERT INTO user (name, email, password, role, address) VALUES (:name, :email, :password, :role, :address)';
			
			$role = 'Пользователь';

			$result = $db->prepare($sql);
			$result->bindParam(':name', $name, PDO::PARAM_STR);
			$result->bindParam(':email', $email, PDO::PARAM_STR);
			$result->bindParam(':password', $password, PDO::PARAM_STR);
			$result->bindParam(':role', $role, PDO::PARAM_STR);
			$result->bindParam(':address', $address, PDO::PARAM_STR);
			
			return $result->execute();
		}

		public static function checkName($name) {
			if (strlen($name) >= 2) {
				return true;
			}

			return false;
		}

		public static function checkPassword($password) {
			if (strlen($password) >= 6) {
				return true;
			}

			return false;
		}

		public static function checkEmail($email) {
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				return true;
			}

			return false;
		}

		public static function checkEmailExists($email) {
			$db = Db::getConnection();
			
			$sql = 'SELECT COUNT(*) FROM user WHERE email = :email';
			
			$result = $db->prepare($sql);
			$result->bindParam(':email', $email, PDO::PARAM_STR);
			$result->execute();
			
			if($result->fetchColumn())
				return true;
			
			return false;
		}

		public static function checkUserData($email, $password) {
			$db = Db::getConnection();

			$sql = 'SELECT * FROM user WHERE email = :email AND password = :password';

			$result = $db->prepare($sql);
			$result->bindParam(':email', $email, PDO::PARAM_INT);
			$result->bindParam(':password', $password, PDO::PARAM_INT);
			$result->execute();

			$user = $result->fetch();
			if ($user) {
				return $user['id'];
			}

			return false;
		}

		public static function auth($userId) {
			$_SESSION['user'] = $userId;
		}

		public static function checkLogged() {
			if (isset($_SESSION['user'])) {
				return $_SESSION['user'];
			}

			header("Location: /user/login");
		}

		public static function isGuest() {
			if (isset($_SESSION['user'])) {
				return false;
			}

			return true;
		}

		public static function getUserById($id) {
			if ($id) {
				$db = Db::getConnection();
				$sql = 'SELECT * FROM user WHERE id = :id';

				$result = $db->prepare($sql);
				$result->bindParam(':id', $id, PDO::PARAM_INT);

				$result->setFetchMode(PDO::FETCH_ASSOC);
				$result->execute();

				return $result->fetch();
			}
		}

		public static function updateUserById($id, $name, $email, $address, $role, $password)
	    {
	        // Соединение с БД
	        $db = Db::getConnection();
	        // Текст запроса к БД
	        $sql = "UPDATE user
	            SET 
	                name = :name, 
	                email = :email, 
	                address = :address, 
	                role = :role, 
	                password = :password 
	            WHERE id = :id";
	        // Получение и возврат результатов. Используется подготовленный запрос
	        $result = $db->prepare($sql);
	        $result->bindParam(':id', $id, PDO::PARAM_INT);
	        $result->bindParam(':name', $name, PDO::PARAM_STR);
	        $result->bindParam(':email', $email, PDO::PARAM_STR);
	        $result->bindParam(':address', $address, PDO::PARAM_STR);
	        $result->bindParam(':role', $role, PDO::PARAM_STR);
	        $result->bindParam(':password', $password, PDO::PARAM_STR);
	        return $result->execute();
	    }

		public static function edit($id, $name, $password, $address) {
			$db = Db::getConnection();

			$sql = "UPDATE user SET name = :name, password = :password, address = :address WHERE id = :id";

			$result = $db->prepare($sql);
			$result->bindParam(':id', $id, PDO::PARAM_INT);
			$result->bindParam(':name', $name, PDO::PARAM_STR);
			$result->bindParam(':password', $password, PDO::PARAM_STR);
			$result->bindParam(':address', $address, PDO::PARAM_STR);

			return $result->execute();
		}

		public static function checkPhone($phone) {
			if (strlen($phone) >= 10) {
				return true;
			}
			
			return false;
		}
	}
?>