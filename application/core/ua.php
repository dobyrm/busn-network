<?php

define('WS_LANG_EMPTY_PASSWORD', 	'Введіть пароль');
define('WS_LANG_SHORT_PASSWORD', 	'Пароль ненадійний. Мінімум 4 символа' );

define('WS_LANG_EMPTY_EMAIL',		'Введіть E-mail' );
define('WS_LANG_INVALID_EMAIL',     'E-mail не коректний' );

define('WS_USERS_NOT_DB',     		'Не зареєстровані данні' );

define('WS_LANG_EMPTY_TEXT',     	'Поле пусте' );

define('WS_LANG_EMPTY_FORM',     	'Заповніть форму' );

define('WS_LANG_FATAL_ERROR',     	'Фатальна помилка' );

$lang_file_error = array( 
					UPLOAD_ERR_INI_SIZE   => 'Размер файла больше разрешенного', 
					UPLOAD_ERR_FORM_SIZE  => 'Размер файла превышает указанное значение в MAX_FILE_SIZE', 
					UPLOAD_ERR_PARTIAL    => 'Файл был загружен только частично', 
					UPLOAD_ERR_NO_FILE    => 'Не был выбран файл для загрузки', 
					UPLOAD_ERR_NO_TMP_DIR => 'Не найдена папка для временных файлов', 
					UPLOAD_ERR_CANT_WRITE => 'Ошибка записи файла на диск',
					'UPLOAD_ERR_EXTENTION' => 'Файл имеет недопустимое расширение',
					'UPLOAD_ERR_WIDTH'     => 'Ширина изображения имеет недопустимый размер',
					'UPLOAD_ERR_HEIGHT'    => 'Высота изображения имеет недопустимый размер',
					'UPLOAD_ERR_UPLOAD'    => 'Не удалось загрузить файл'
					        );