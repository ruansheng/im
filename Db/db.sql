/*创建数据库*/
DROP DATABASE IF EXISTS `im`;
create database im;

DROP TABLE IF EXISTS `im_user`;
CREATE TABLE `im_user`(
	`user_id` int(11) unsigned NOT NULL COMMENT '主键id',
	`user_name` varchar(30) NOT NULL DEFAULT '' COMMENT '用户名',
	`password` varchar(32) NOT NULL DEFAULT '' COMMENT '密码',
	`create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
	`update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '修改时间',
	`last_login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后一次登录时间',
	`is_del` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '是否禁用',
	`login_status` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '登录状态',
);