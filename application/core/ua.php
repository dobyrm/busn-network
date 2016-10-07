<?php

define('WS_LANG_EMPTY_PASSWORD', 				'Введіть пароль');
define('WS_LANG_EMPTY_PASSWORD_NEW', 			'Введіть новий пароль');
define('WS_LANG_SHORT_PASSWORD', 				'Пароль не надійний. Мінімум 4 символа' );

define('WS_LANG_EMPTY_EMAIL',					'Введіть E-mail' );
define('WS_LANG_INVALID_EMAIL',     			'E-mail не коректний' );

define('WS_USERS_NOT_DB',     					'Не зареєстровані данні' );

define('WS_LANG_INVALID_SAME_LOGINS',     		'Не можливо однакові логіни у користувачів' );

define('WS_LANG_EMPTY_TEXT',     				'Поле пусте' );

define('WS_LANG_SUCCES',     					'Зміни пройшли успішно' );

define('WS_LANG_SUCCES_ADD_USER',     			'Користувача додано' );

define('WS_LANG_EMPTY_NAME',     				'Введіть імя' );
define('WS_LANG_EMPTY_POSADA',     				'Введіть посаду' );
define('WS_LANG_EMPTY_POSITION',     			'Виберіть позицію' );

define('WS_LANG_EMPTY_SERFAC',     				'Введіть Факультет' );
define('WS_LANG_EMPTY_SERKAF',     				'Введіть Кафедру' );

define('WS_LANG_EMPTY_FORM',     				'Заповніть форму' );

define('WS_LANG_FATAL_ERROR',     				'Фатальна помилка' );

define('WS_LANG_EMPTY_OLD_PASSWORD_INVALID',	'Старий пароль не вірний' );

define('WS_LANG_EMPTY_PASSWORD_DO_NOT_MATCH',	'Паролі не співпадають' );

define('WS_LANG_EMPTY_USERREAD',     			'Виберіть користувача' );
define('WS_LANG_EMPTY_DECLARED',     			'Введіть текст оголошення' );
define('WS_LANG_EMPTY_CREATEFROM',     			'Введіть дату публікації' );
define('WS_LANG_EMPTY_CREATETO',     			'Введіть дату закінчення публікації' );

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