#### Подключение XDebug к IDE Intellij Idea
Описание и разъяснения в картинках можно увидеть здесь:  
https://handynotes.ru/2020/12/phpstorm-php-8-docker-xdebug-3.html

1. Перейти в главное меню IDE: File > Settings
2. В появившемся окне найти пункт **Languages & Frameworks** и перейти по пути: PHP > Servers
3. В верхнем левом углу открывшегося окна нажать на "+". Откроется диалог создания сервера.  
   В файле .env проекта есть строка XDEBUG_STORM_SERVER_NAME=PayPhp, она необходима для настройки отладчика.  
   3.1 В поле name введите: PayPhp  
   3.2 В поле host: localhost  
   3.3 В поле порт: 8011 (или любой другой выше 8000 и не 9000,9003)  
   3.4 Установить флаг Use path mappings. Появится подраздел путей к файлам.  
   3.5 В поле File/Directory > Project files укажите абсолютный путь до проекта (пример): <Путь к проекту> . В Absolute path on server - рабочий католог php_fpm: /var/www  
   3.6 Нажать кнопку Apply

4. В левом меню перейти в раздел PHP. Откроется раздел CLI Interpreter.  
   4.1 Напротив поля ввода CLI Interceptor нажать на кнопку с точками "...". Появится диалог CLI Interpreter.  
   4.2 Нажать на "+" в левом верхнем углу, чтобы добавить перехватчик.  
   4.3 В открывшемся диалоге в поле name введите: PayPhp. Переключатель на Connection docker daemon with на: Unix socket. Нажать ОК.  
   4.4 В новом диалоге Configurer Remote PHP Interpreter указать: Docker-compose; Server > PayPhp; Configuration file(s) > ./docker-compose.yml; Service > php_fpm. Нажать ОК.  
   4.5 В окне CLI Interpreter вы должны увидеть версию php и xdebug. Если не увидели, то что-то настроено неправильно! Нажимаем Apply.  
   4.6 В разделе Settings также нажимаем Apply.

5. В левом меню окна Settings перейти в раздел PHP > Debug. В открывшемся разделе убедиться, что в поле Debug port стоит только 9003. Нажимаем Apply и OK.

Все. Настройка среды завершена!
Для активации отладчика, нужно установить точку останова слева от строки кода (жирная красная точка) и запустить отладчик: Главное меню Run > Start listening for PHP Debug connection. Далее вызываете ситуацию, при которой программа должна буддет пройти по данному участку кода и вы увидете останов со всеми данными, которые были получены до этой точки.  
После отладки не забудте отключить отладчик, он может мешать терминалу и PhpUnit: Главное меню Run > Stop listening for PHP Debug connection

Для VSCode есть отдельная статья: https://habr.com/ru/post/310708/  
