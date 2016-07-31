<?php

class AdminConfigController extends AdminBase
{
    
public function actionConfig()
    {
        // Проверяем авторизирован ли пользователь и получаем его данные. Если нет, он будет переадресован
        $user = self::checkAdmin();
        
        $config = User::getUserConfig();
        //var_dump($config);
       return $this->render('admin/config', ['title' => 'Конфигурация',
                                                  'config' => $config,
                                                  'user' => $user['username']]);
    }
    }