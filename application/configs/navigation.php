<?php
//$this->translate = Zend_Registry::get('translate');
return $pages = array(
            array(
                'controller' => 'index',
                'label'         => 'Главная страница',
            ),
            array(
                'controller' => 'users',
                'action'        => 'index',
                // Я обворачиваю текст в _(), чтобы потом вытянуть его парсером gettext'а
                'label'         => 'Поиск',
                'pages' => array (
                    array (
                        'controller' => 'picture',
                        'action'        => 'last',
                        'label'         => 'Последние фото',
                    ),
                )
            ),
            array (
                'controller' => 'picture',
                'action'        => 'random',
                'label'         => 'Случайные фото',
            ),
            array (
                'controller' => 'users',
                'action'        => 'login',
                'label'         => 'Авторизация',
            ),
            array (
                'controller' => 'users',
                'action'        => 'logout',
                'label'         => 'Выход',
            )
        );