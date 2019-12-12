<?php
// GAME-Datenbank
define('DB_GAME_SERVER', '');
define('DB_GAME_UNAME', '');
define('DB_GAME_PASS', '');
define('DB_GAME_DBNAME', '');
$db_game = mysqli_connect(DB_GAME_SERVER,DB_GAME_UNAME,DB_GAME_PASS,DB_GAME_DBNAME);
$db_game->set_charset( 'utf8' );
