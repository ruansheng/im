<?php
set_time_limit(0);

//load common tools
include_once('./Tools/Utils.class.php');

//load cnofig file
$config=include_once('./Config/Config.class.php');

//load Core Class
autoload('./Core/Server.class.php');

Server::run();
