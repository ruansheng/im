<?php
//确保在连接客户端时不会超时
set_time_limit(0);

//加载公共方法
include_once('./Tools/Utils.class.php');

//加载配置文件
$config=include_once('./Config/Config.class.php');

//加载核心类Core
autoload('./Core/Server.class.php');

Server::run();
