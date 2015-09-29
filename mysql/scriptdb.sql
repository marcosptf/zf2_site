/******************************************************************************
*
*
*******************************************************************************/

titulo/ texto / imagem/ logo cliente

drop database if exists software4you;
create database software4you;

CREATE TABLE IF NOT EXISTS `software4you`.`category` (
`id` INT(4) NOT NULL auto_increment,
`category` VARCHAR(100) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE = MyISAM DEFAULT CHARACTER SET = utf8;

insert into `software4you`.`category`
(category)
values
('home'),
('clientes'),
('servicos'),
('produtos'),
('sobrenos'),
('carreira');

drop table post;
CREATE TABLE IF NOT EXISTS `software4you`.`post` (
`id` INT(4) NOT NULL auto_increment,
`title` VARCHAR(100) NOT NULL,
`text_post` text,
`category` int(1) not NULL ,
`active` int(1) not NULL DEFAULT 1,
PRIMARY KEY (`id`)
) ENGINE = MyISAM DEFAULT CHARACTER SET = utf8;
insert into post(title,text_post,category)values('texto de la muestra','texto del post muestra',1);
insert into post(title,text_post,category)values('texto de la muestra','texto del post muestra',2);
insert into post(title,text_post,category)values('texto de la muestra','texto del post muestra',3);
insert into post(title,text_post,category)values('texto de la muestra','texto del post muestra',4);
insert into post(title,text_post,category)values('texto de la muestra','texto del post muestra',5);
insert into post(title,text_post,category)values('texto de la muestra','texto del post muestra',6);



select * from post;



CREATE TABLE `software4you`.`user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(45) NOT NULL,
  `status` int(11) NOT NULL default '1',
  `role_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM  DEFAULT CHARACTER SET = utf8;
insert into `software4you`.user
(email,password)
values
('admin@software4you.com.br','123456');
select * from `software4you`.user;

CREATE TABLE `software4you`.`role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM  DEFAULT CHARACTER SET = utf8;

CREATE TABLE `software4you`.`profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_profile_user1_idx` (`user_id`),
  CONSTRAINT `fk_profile_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = MyISAM  DEFAULT CHARACTER SET = utf8;

CREATE TABLE `software4you`.`phinxlog` (
  `version` bigint(20) NOT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`version`)
) ENGINE = MyISAM  DEFAULT CHARACTER SET = utf8;

CREATE TABLE `software4you`.`field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `value` text,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM  DEFAULT CHARACTER SET = utf8;

CREATE TABLE `software4you`.`collection` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `label` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM  DEFAULT CHARACTER SET = utf8;

CREATE TABLE `software4you`.`collectionfield` (
  `collection_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`,`collection_id`,`field_id`),
  KEY `fk_collection_has_field_field1_idx` (`field_id`),
  KEY `fk_collection_has_field_collection1_idx` (`collection_id`),
  CONSTRAINT `fk_collection_has_field_collection1` FOREIGN KEY (`collection_id`) REFERENCES `collection` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_collection_has_field_field1` FOREIGN KEY (`field_id`) REFERENCES `field` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE = MyISAM  DEFAULT CHARACTER SET = utf8;

/*********************************************************************************/
