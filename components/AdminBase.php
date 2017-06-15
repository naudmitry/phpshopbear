<?php
/**
 * Абстрактный класс AdminBase содержит общую логику для контроллеров, которые 
 * используются в панели администратора
 */
abstract class AdminBase
{
    /**
     * Метод, который проверяет пользователя на то, является ли он администратором
     * @return boolean
     */
    public static function checkAdmin()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        
        if ($user['role'] == 'admin') {
            return true;
        }
        
        die('У вас нет достаточных прав для входа в панель администрирования.');
    }

    public static function getPanelUrl()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        
        if ($user['role'] == 'admin') {
            return true;
        }
        
        return false;
    }
}