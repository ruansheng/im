<?php
//ȷ�������ӿͻ���ʱ���ᳬʱ
set_time_limit(0);

//���ع�������
include_once('./Tools/Utils.class.php');

//���������ļ�
$config=include_once('./Config/Config.class.php');

//���غ�����Core
autoload('./Core/Server.class.php');

Server::run();
