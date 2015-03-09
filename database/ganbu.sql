-- phpMyAdmin SQL Dump
-- version 2.11.2.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2012 年 06 月 05 日 16:31
-- 服务器版本: 5.0.45
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `ganbu`
--

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL auto_increment,
  `admin_name` varchar(50) default NULL COMMENT '管理员帐号',
  `admin_psw` varchar(50) default NULL COMMENT '管理员密码',
  `Levels` varchar(10) NOT NULL COMMENT '权限标识',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=4 ;

--
-- 导出表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_psw`, `Levels`) VALUES
(1, 'admin', 'admin', ''),
(3, '123', '123', '0');

-- --------------------------------------------------------

--
-- 表的结构 `bumen`
--

CREATE TABLE `bumen` (
  `id` int(10) NOT NULL auto_increment COMMENT '主键id',
  `name` varchar(50) NOT NULL COMMENT '部门名称',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=5 ;

--
-- 导出表中的数据 `bumen`
--

INSERT INTO `bumen` (`id`, `name`) VALUES
(1, '测试22'),
(2, '213部'),
(3, '测试');

-- --------------------------------------------------------

--
-- 表的结构 `cunmin`
--

CREATE TABLE `cunmin` (
  `id` int(11) NOT NULL auto_increment,
  `uname` varchar(50) NOT NULL COMMENT '登陆账号',
  `pwd` varchar(50) NOT NULL COMMENT '登录密码',
  `dizhi` varchar(50) NOT NULL COMMENT '家庭住址',
  `tel` varchar(20) NOT NULL COMMENT '联系电话',
  `sex` varchar(20) NOT NULL COMMENT '性别',
  `cname` varchar(50) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=3 ;

--
-- 导出表中的数据 `cunmin`
--

INSERT INTO `cunmin` (`id`, `uname`, `pwd`, `dizhi`, `tel`, `sex`, `cname`) VALUES
(1, 'ctest', '123456', '4441', '18899912', '男', '长大祝'),
(2, 'z001', '123456', '撒打算的', '874111', '男', '张光磊');

-- --------------------------------------------------------

--
-- 表的结构 `minyi`
--

CREATE TABLE `minyi` (
  `id` int(10) NOT NULL auto_increment COMMENT '主键id',
  `name` varchar(50) NOT NULL COMMENT '名称',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=5 ;

--
-- 导出表中的数据 `minyi`
--

INSERT INTO `minyi` (`id`, `name`) VALUES
(1, '近些年城乡变化'),
(2, '城乡居民收入改善'),
(3, '城市绿化情况'),
(4, '环境整治情况');

-- --------------------------------------------------------

--
-- 表的结构 `minyi_cheping`
--

CREATE TABLE `minyi_cheping` (
  `id` int(11) NOT NULL auto_increment COMMENT '主键id',
  `mid` int(11) NOT NULL COMMENT '民意id(外键)',
  `userid` varchar(50) NOT NULL COMMENT '用户id',
  `fenshu` int(11) NOT NULL COMMENT '分数',
  `utype` varchar(10) NOT NULL COMMENT '用户类型',
  `addtime` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT '添加时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=9 ;

--
-- 导出表中的数据 `minyi_cheping`
--

INSERT INTO `minyi_cheping` (`id`, `mid`, `userid`, `fenshu`, `utype`, `addtime`) VALUES
(1, 1, 'ctest', 8, '村民', '2012-05-30 08:13:47'),
(2, 2, 'ctest', 9, '村民', '2012-05-30 08:13:47'),
(3, 3, 'ctest', 9, '村民', '2012-05-30 08:13:47'),
(4, 4, 'ctest', 9, '村民', '2012-05-30 08:13:47'),
(5, 1, 'z001', 9, '村民', '2012-05-30 09:17:19'),
(6, 2, 'z001', 9, '村民', '2012-05-30 09:17:19'),
(7, 3, 'z001', 8, '村民', '2012-05-30 09:17:19'),
(8, 4, 'z001', 8, '村民', '2012-05-30 09:17:19');

-- --------------------------------------------------------

--
-- 表的结构 `minzhu`
--

CREATE TABLE `minzhu` (
  `id` int(10) NOT NULL auto_increment COMMENT '主键id',
  `name` varchar(50) NOT NULL COMMENT '名称',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=5 ;

--
-- 导出表中的数据 `minzhu`
--

INSERT INTO `minzhu` (`id`, `name`) VALUES
(1, '学习风气'),
(2, '决策能力'),
(3, '创新能力'),
(4, '依法行政');

-- --------------------------------------------------------

--
-- 表的结构 `minzhu_cheping`
--

CREATE TABLE `minzhu_cheping` (
  `id` int(11) NOT NULL auto_increment COMMENT '主键',
  `wid` int(11) NOT NULL COMMENT '项目id',
  `mid` int(11) NOT NULL COMMENT '民意id',
  `userid` varchar(50) NOT NULL COMMENT '用户帐号',
  `fenshu` int(11) NOT NULL COMMENT '分数',
  `utype` varchar(10) NOT NULL COMMENT '用户类型',
  `addtime` timestamp NOT NULL default CURRENT_TIMESTAMP COMMENT '添加时间',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=gbk AUTO_INCREMENT=25 ;

--
-- 导出表中的数据 `minzhu_cheping`
--

INSERT INTO `minzhu_cheping` (`id`, `wid`, `mid`, `userid`, `fenshu`, `utype`, `addtime`) VALUES
(1, 3, 1, 'test', 10, '干部', '2012-05-30 08:32:56'),
(2, 3, 2, 'test', 10, '干部', '2012-05-30 08:32:56'),
(3, 3, 3, 'test', 10, '干部', '2012-05-30 08:32:56'),
(4, 3, 4, 'test', 10, '干部', '2012-05-30 08:32:56'),
(5, 3, 1, 'ctest', 10, '村民', '2012-05-30 08:34:28'),
(6, 3, 2, 'ctest', 9, '村民', '2012-05-30 08:34:28'),
(7, 3, 3, 'ctest', 8, '村民', '2012-05-30 08:34:28'),
(8, 3, 4, 'ctest', 8, '村民', '2012-05-30 08:34:28'),
(9, 2, 1, 'ctest', 10, '村民', '2012-05-30 08:34:45'),
(10, 2, 2, 'ctest', 10, '村民', '2012-05-30 08:34:45'),
(11, 2, 3, 'ctest', 9, '村民', '2012-05-30 08:34:45'),
(12, 2, 4, 'ctest', 9, '村民', '2012-05-30 08:34:45'),
(13, 3, 1, 'z001', 8, '村民', '2012-05-30 09:16:56'),
(14, 3, 2, 'z001', 8, '村民', '2012-05-30 09:16:56'),
(15, 3, 3, 'z001', 8, '村民', '2012-05-30 09:16:56'),
(16, 3, 4, 'z001', 9, '村民', '2012-05-30 09:16:56'),
(17, 2, 1, 'z001', 8, '村民', '2012-05-30 09:17:05'),
(18, 2, 2, 'z001', 9, '村民', '2012-05-30 09:17:05'),
(19, 2, 3, 'z001', 8, '村民', '2012-05-30 09:17:05'),
(20, 2, 4, 'z001', 8, '村民', '2012-05-30 09:17:05'),
(21, 2, 1, 'test1', 10, '干部', '2012-05-30 09:18:45'),
(22, 2, 2, 'test1', 10, '干部', '2012-05-30 09:18:45'),
(23, 2, 3, 'test1', 10, '干部', '2012-05-30 09:18:45'),
(24, 2, 4, 'test1', 10, '干部', '2012-05-30 09:18:45');

-- --------------------------------------------------------

--
-- 表的结构 `workers`
--

CREATE TABLE `workers` (
  `id` int(11) NOT NULL auto_increment,
  `wname` varchar(50) NOT NULL COMMENT '员工姓名',
  `uname` varchar(50) NOT NULL COMMENT '登陆账号',
  `pwd` varchar(50) NOT NULL COMMENT '登录密码',
  `bumen` varchar(50) NOT NULL COMMENT '所属部门',
  `tel` varchar(20) NOT NULL COMMENT '联系电话',
  `sex` varchar(20) NOT NULL COMMENT '性别',
  `pic` varchar(50) NOT NULL COMMENT '工资',
  `xueli` varchar(50) NOT NULL COMMENT '干部学历',
  `zhiwu` varchar(50) NOT NULL COMMENT '职务',
  `birth` date NOT NULL COMMENT '生日',
  `minzhu` varchar(50) NOT NULL COMMENT '民族',
  `mianmao` varchar(50) NOT NULL COMMENT '政治面貌',
  `renzhi` varchar(50) NOT NULL COMMENT '现任职务',
  `fenshu` float NOT NULL COMMENT '测评分数',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=gbk AUTO_INCREMENT=4 ;

--
-- 导出表中的数据 `workers`
--

INSERT INTO `workers` (`id`, `wname`, `uname`, `pwd`, `bumen`, `tel`, `sex`, `pic`, `xueli`, `zhiwu`, `birth`, `minzhu`, `mianmao`, `renzhi`, `fenshu`) VALUES
(2, '胡锦涛', 'test', '123', '3', '18999', '男', '2012/0529/13382590542505.jpg', '本科', '主席', '1970-10-20', '', '党员', '', 0),
(3, '习近平', 'test1', '123', '3', '18799999', '男', '2012/0529/13382592346537.jpg', '本科', '村长', '1980-10-20', '', '党员', '', 0);
