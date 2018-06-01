-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Apr 08, 2015, 09:11 AM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `studentdb`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `score`
-- 

CREATE TABLE `score` (
  `studno` int(11) NOT NULL default '0',
  `examno` tinyint(4) NOT NULL default '0',
  `chi` tinyint(4) NOT NULL,
  `eng` tinyint(4) NOT NULL,
  `math` tinyint(4) NOT NULL,
  PRIMARY KEY  (`studno`,`examno`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `score`
-- 

INSERT INTO `score` VALUES (850301, 1, 90, 76, 98);
INSERT INTO `score` VALUES (850302, 1, 58, 77, 75);
INSERT INTO `score` VALUES (850303, 1, 41, 14, 33);
INSERT INTO `score` VALUES (850304, 1, 95, 97, 87);
INSERT INTO `score` VALUES (850305, 1, 59, 66, 57);
INSERT INTO `score` VALUES (850306, 1, 28, 11, 33);
INSERT INTO `score` VALUES (850307, 1, 98, 100, 100);
INSERT INTO `score` VALUES (850308, 1, 0, 0, 10);
INSERT INTO `score` VALUES (850309, 1, 95, 74, 89);
INSERT INTO `score` VALUES (850310, 1, 41, 46, 49);
INSERT INTO `score` VALUES (850311, 1, 91, 99, 84);
INSERT INTO `score` VALUES (850312, 1, 0, 10, 0);
INSERT INTO `score` VALUES (850313, 1, 92, 92, 88);
INSERT INTO `score` VALUES (850314, 1, 35, 19, 29);
INSERT INTO `score` VALUES (850315, 1, 98, 90, 91);
INSERT INTO `score` VALUES (850316, 1, 47, 50, 55);
INSERT INTO `score` VALUES (850317, 1, 94, 94, 100);
INSERT INTO `score` VALUES (850318, 1, 79, 85, 77);
INSERT INTO `score` VALUES (850319, 1, 84, 74, 58);
INSERT INTO `score` VALUES (850320, 1, 54, 57, 64);
INSERT INTO `score` VALUES (850321, 1, 83, 80, 94);
INSERT INTO `score` VALUES (850322, 1, 71, 65, 73);
INSERT INTO `score` VALUES (850323, 1, 20, 25, 10);
INSERT INTO `score` VALUES (850324, 1, 93, 100, 90);
INSERT INTO `score` VALUES (850325, 1, 68, 56, 39);
INSERT INTO `score` VALUES (850326, 1, 25, 24, 0);
INSERT INTO `score` VALUES (850327, 1, 87, 77, 92);
INSERT INTO `score` VALUES (850328, 1, 64, 90, 59);
INSERT INTO `score` VALUES (850329, 1, 0, 0, 20);
INSERT INTO `score` VALUES (850330, 1, 77, 88, 99);
INSERT INTO `score` VALUES (850330, 2, 90, 76, 98);
INSERT INTO `score` VALUES (850329, 2, 58, 77, 75);
INSERT INTO `score` VALUES (850328, 2, 41, 14, 33);
INSERT INTO `score` VALUES (850327, 2, 95, 97, 87);
INSERT INTO `score` VALUES (850326, 2, 59, 66, 57);
INSERT INTO `score` VALUES (850325, 2, 28, 11, 33);
INSERT INTO `score` VALUES (850324, 2, 98, 100, 100);
INSERT INTO `score` VALUES (850323, 2, 0, 0, 10);
INSERT INTO `score` VALUES (850322, 2, 95, 74, 89);
INSERT INTO `score` VALUES (850321, 2, 41, 46, 49);
INSERT INTO `score` VALUES (850320, 2, 91, 99, 84);
INSERT INTO `score` VALUES (850319, 2, 0, 10, 0);
INSERT INTO `score` VALUES (850318, 2, 92, 92, 88);
INSERT INTO `score` VALUES (850317, 2, 35, 19, 29);
INSERT INTO `score` VALUES (850316, 2, 98, 90, 91);
INSERT INTO `score` VALUES (850315, 2, 47, 50, 55);
INSERT INTO `score` VALUES (850314, 2, 94, 94, 100);
INSERT INTO `score` VALUES (850313, 2, 79, 85, 77);
INSERT INTO `score` VALUES (850312, 2, 84, 74, 58);
INSERT INTO `score` VALUES (850311, 2, 54, 57, 64);
INSERT INTO `score` VALUES (850310, 2, 83, 80, 94);
INSERT INTO `score` VALUES (850309, 2, 71, 65, 73);
INSERT INTO `score` VALUES (850308, 2, 20, 25, 10);
INSERT INTO `score` VALUES (850307, 2, 93, 100, 90);
INSERT INTO `score` VALUES (850306, 2, 68, 56, 39);
INSERT INTO `score` VALUES (850305, 2, 25, 24, 0);
INSERT INTO `score` VALUES (850304, 2, 87, 77, 92);
INSERT INTO `score` VALUES (850303, 2, 64, 90, 59);
INSERT INTO `score` VALUES (850302, 2, 0, 0, 20);
INSERT INTO `score` VALUES (850301, 2, 77, 88, 99);

-- --------------------------------------------------------

-- 
-- 資料表格式： `student`
-- 

CREATE TABLE `student` (
  `studno` int(11) NOT NULL,
  `name` char(10) default NULL,
  `phone` char(13) default NULL,
  `address` varchar(60) default NULL,
  PRIMARY KEY  (`studno`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- 列出以下資料庫的數據： `student`
-- 

INSERT INTO `student` VALUES (850301, '陳桶一', '02-24310667', '基隆市安樂區安和一街4巷4-3號4F');
INSERT INTO `student` VALUES (850302, '黃光權', '02-24971835', '台北縣瑞芳鎮一坑路426號');
INSERT INTO `student` VALUES (850303, '胡生妙', '02-24570828', '基隆市暖暖區源遠路292巷1-5號1F');
INSERT INTO `student` VALUES (850304, '王為全', '02-24970773', '台北縣瑞芳鎮逢甲路337號');
INSERT INTO `student` VALUES (850305, '李日正', '02-24322272', '基隆市安樂區安和一街6巷43之1號2F');
INSERT INTO `student` VALUES (850306, '劉德菖', '02-24518685', '基隆市七堵區百六街53號3F');
INSERT INTO `student` VALUES (850307, '方正一', '02-24974327', '台北縣瑞芳鎮三爪子坑路106 巷11號3');
INSERT INTO `student` VALUES (850308, '劉康寶', '02-24318360', '基隆市獅球路111巷39號2F');
INSERT INTO `student` VALUES (850309, '謝掬花', '02-24275530', '基隆市信義區義六路36-34 號3F');
INSERT INTO `student` VALUES (850310, '王美蘭', '02-24693021', '基隆市中正區調和街80巷63號');
INSERT INTO `student` VALUES (850311, '徐小噹', '02-24287732', '基隆市中正區正義路74巷30弄40號');
INSERT INTO `student` VALUES (850312, '葉小毛', '02-24969168', '台北縣瑞芳鎮大寮路49巷1 號');
INSERT INTO `student` VALUES (850313, '林東海', '02-24977208', '台北縣瑞芳鎮東和路84號');
INSERT INTO `student` VALUES (850314, '林大陽', '02-24582284', '基隆市暖暖區金山街74號');
INSERT INTO `student` VALUES (850315, '鍾德級', '02-24327347', '基隆市安樂區麥金路11巷40號');
INSERT INTO `student` VALUES (850316, '劉力錦', '02-24974586', '台北縣瑞芳鎮中山路246巷11號2F');
INSERT INTO `student` VALUES (850317, '方小坊', '02-24941334', '台北縣貢寮鄉龍崗村泮宮路17號');
INSERT INTO `student` VALUES (850318, '劉記成', '02-24979021', '台北縣瑞芳鎮三爪子坑路民享新村11');
INSERT INTO `student` VALUES (850319, '李普三', '02-24230092', '基隆市中山區中華路135-3 號4F');
INSERT INTO `student` VALUES (850320, '劉一心', '02-24514121', '基隆市七堵區泰安路91號');
INSERT INTO `student` VALUES (850321, '方日通', '02-24654770', '基隆市信義區東峰街11巷2 號');
INSERT INTO `student` VALUES (850322, '劉順成', '02-24579700', '台北縣瑞芳鎮大埔路48號3F');
INSERT INTO `student` VALUES (850323, '謝利利', '02-24564111', '基隆市七堵區東新街4巷66 號');
INSERT INTO `student` VALUES (850324, '王涵合', '02-24288344', '基隆市中山區協和街192-1 號');
INSERT INTO `student` VALUES (850325, '徐佳佳', '02-24983355', '台北縣萬里鄉員潭路6號');
INSERT INTO `student` VALUES (850326, '李宏仁', '02-24286086', '基隆市中正區中正路182巷33-1號');
INSERT INTO `student` VALUES (850327, '林大鈺', '02-24651306', '基隆市信義區深澳路226-1 號');
INSERT INTO `student` VALUES (850328, '林玉成', '02-24331399', '基隆市安樂區武嶺街274之2號3F');
INSERT INTO `student` VALUES (850329, '鍾百達', '02-24231258', '基隆市中山區通明街53巷7 號');
INSERT INTO `student` VALUES (850330, '小巨人', '02-24573928', '基隆市暖暖區國安路30巷6 號1F');
