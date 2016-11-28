CREATE DATABASE  IF NOT EXISTS `blog`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '����ID',
  `username` varchar(255) NOT NULL COMMENT '�û���',
  `auth_key` varchar(32) NOT NULL COMMENT '�Զ���¼key',
  `password_hash` varchar(255) NOT NULL COMMENT '��������',
  `password_reset_token` varchar(255) DEFAULT NULL COMMENT '��������token',
  `email_validate_token` varchar(255) DEFAULT NULL COMMENT '������֤token',
  `email` varchar(255) NOT NULL COMMENT '����',
  `role` smallint(6) NOT NULL DEFAULT '10' COMMENT '��ɫ�ȼ�',
  `status` smallint(6) NOT NULL DEFAULT '10' COMMENT '״̬',
  `avatar` varchar(255) DEFAULT NULL COMMENT 'ͷ��',
  `vip_lv` int(11) DEFAULT '0' COMMENT 'vip�ȼ�',
  `created_at` int(11) NOT NULL COMMENT '����ʱ��',
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=560 DEFAULT CHARSET=utf8 COMMENT='��Ա��';

CREATE TABLE `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '����ID',
  `title` varchar(255) DEFAULT NULL COMMENT '����',
  `summary` varchar(255) DEFAULT NULL COMMENT 'ժҪ',
  `content` text COMMENT '����',
  `label_img` varchar(255) DEFAULT NULL COMMENT '��ǩͼ',
  `cat_id` int(11) DEFAULT NULL COMMENT '����id',
  `user_id` int(11) DEFAULT NULL COMMENT '�û�id',
  `user_name` varchar(255) DEFAULT NULL COMMENT '�û���',
  `is_valid` tinyint(1) DEFAULT '0' COMMENT '�Ƿ���Ч��0-δ���� 1-�ѷ���',
  `created_at` int(11) DEFAULT NULL COMMENT '����ʱ��',
  `updated_at` int(11) DEFAULT NULL COMMENT '����ʱ��',
  PRIMARY KEY (`id`),
  KEY `idx_cat_valid` (`cat_id`,`is_valid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8 COMMENT='��������';



CREATE TABLE `cats` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '����ID',
  `cat_name` varchar(255) DEFAULT NULL COMMENT '��������',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='�����';


CREATE TABLE `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '����ID',
  `tag_name` varchar(255) DEFAULT NULL COMMENT '��ǩ����',
  `post_num` int(11) DEFAULT '0' COMMENT '����������',
  PRIMARY KEY (`id`),
  UNIQUE KEY `tag_name` (`tag_name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COMMENT='��ǩ��';


CREATE TABLE `relation_post_tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '����ID',
  `post_id` int(11) DEFAULT NULL COMMENT '����ID',
  `tag_id` int(11) DEFAULT NULL COMMENT '��ǩID',
  PRIMARY KEY (`id`),
  UNIQUE KEY `post_id` (`post_id`,`tag_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8 COMMENT='���ºͱ�ǩ��ϵ��';

CREATE TABLE `post_extends` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '����ID',
  `post_id` int(11) DEFAULT NULL COMMENT '����id',
  `browser` int(11) DEFAULT '0' COMMENT '�����',
  `collect` int(11) DEFAULT '0' COMMENT '�ղ���',
  `praise` int(11) DEFAULT '0' COMMENT '����',
  `comment` int(11) DEFAULT '0' COMMENT '����',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8 COMMENT='������չ��';

CREATE TABLE `feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '�û�id',
  `content` varchar(255) NOT NULL COMMENT '����',
  `created_at` int(11) NOT NULL COMMENT '����ʱ��',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='������Ϣ��';