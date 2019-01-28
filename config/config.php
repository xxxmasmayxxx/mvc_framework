<?php

Config::set('siteName', 'Your Site Name');

Config::set('languages', ['en','fr']);

Config::set('routes',[
    'default' => '',
    'admin' => 'admin_',

]);

Config::set('defaultRoute', 'default');
Config::set('defaultLanguage', 'en');
Config::set('defaultController', 'pages');
Config::set('defaultAction', 'index');