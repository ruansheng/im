<?php
set_time_limit(0);
date_default_timezone_set("Asia/Shanghai");

//load common tools
include_once('./Tools/Utils.class.php');

//load cnofig file
$config=include_once('./Config/Config.class.php');

//load Log File
include_once('./Core/Log.class.php');

//load Socket file
include_once('./Core/Socket.class.php');

//load Core Class
autoload('./Core/Server.class.php');

Server::run();
