-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- 主機: localhost
-- 產生時間： 2018-06-13 11:17:47
-- 伺服器版本: 5.7.17-log
-- PHP 版本： 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `shop`
--

-- --------------------------------------------------------

--
-- 資料表結構 `count`
--

CREATE TABLE `count` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '頁面編號',
  `counter` int(10) UNSIGNED NOT NULL COMMENT '計數值'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `count`
--

INSERT INTO `count` (`id`, `counter`) VALUES
(1, 25);

-- --------------------------------------------------------

--
-- 資料表結構 `details`
--

CREATE TABLE `details` (
  `titleid` int(11) NOT NULL COMMENT '討論主題編號',
  `detailsid` int(11) NOT NULL COMMENT '討論內容編號',
  `email` varchar(100) DEFAULT NULL COMMENT '電子郵件',
  `name` varchar(50) NOT NULL COMMENT '作者姓名',
  `subject` varchar(255) NOT NULL COMMENT '回應主題',
  `memo` text NOT NULL COMMENT '回應內容',
  `newsDate` datetime DEFAULT NULL COMMENT '回應內容建立日'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `details`
--

INSERT INTO `details` (`titleid`, `detailsid`, `email`, `name`, `subject`, `memo`, `newsDate`) VALUES
(1, 1, 'aaron@ms11.url.com.tw', '王太太', 'FW:PHP好書推薦', '嗯！\r\n我也覺得這是一本不錯的書籍，\r\n歡迎大家一起分享心得', '2009-06-09 08:39:40'),
(2, 2, 'test@msa.hinet.net', '好好', 'FW:PHP好書推薦', '我也覺得不錯喔！', '2009-06-09 08:53:03'),
(6, 3, '444@444.444', '444', 'FW:444', '5555', '2018-06-11 19:31:09'),
(6, 4, '444@444.444', '444', 'FW:444', '6666', '2018-06-11 19:31:17'),
(6, 5, '444@444.444', '444', 'FW:444', '555\r\n5\r\n5\r\n5\r\n', '2018-06-11 19:56:06'),
(6, 6, '888', '888', 'FW:444', '8888', '2018-06-11 19:58:52'),
(7, 7, 'aaa@444.444', 'aaa', 'FW:aaaa', '1\r\n1\r\n1\r\n1', '2018-06-11 20:03:00'),
(7, 8, '888', '444', 'FW:aaaa', '1\r\n1\r\n1\r\n', '2018-06-11 20:03:21'),
(7, 9, 'aaa@444.444', 'ㄎㄨㄠ', 'FW:aaaa', '123\r\n123\r\n123', '2018-06-11 20:18:37');

-- --------------------------------------------------------

--
-- 資料表結構 `guestbook`
--

CREATE TABLE `guestbook` (
  `serial` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` varchar(255) NOT NULL,
  `memo` text NOT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `guestbook`
--

INSERT INTO `guestbook` (`serial`, `name`, `email`, `subject`, `memo`, `date`) VALUES
(1, '陳巨匠', 'gjun@yahoo.com.tw', 'Dreamweaver真好用', 'Dreamweaver搭配PHP連結至MySQL就是這麼的簡單\r\n您一定要試試看喔！', '2009-06-06 17:26:52'),
(2, '方大明', 'fun.show@gmail.com', '我覺得巨匠很不錯喔', '很開心新的套課推出了，期待您跟我一起加入巨匠的大家庭喔！', '2009-06-06 17:56:33'),
(3, '方大明', 'fun.show@gmail.com', '我覺得巨匠很不錯喔', '很開心新的套課推出了，期待您跟我一起加入巨匠的大家庭喔！', '2009-06-06 17:56:33'),
(4, '方大明', 'fun.show@gmail.com', '我覺得巨匠很不錯喔', '很開心新的套課推出了，期待您跟我一起加入巨匠的大家庭喔！', '2009-06-06 17:56:33'),
(5, '方大明', 'fun.show@gmail.com', '我覺得巨匠很不錯喔', '很開心新的套課推出了，期待您跟我一起加入巨匠的大家庭喔！', '2009-06-06 17:56:33'),
(6, '方大明', 'fun.show@gmail.com', '我覺得巨匠很不錯喔', '很開心新的套課推出了，期待您跟我一起加入巨匠的大家庭喔！', '2009-06-06 17:56:33'),
(7, '方大明', 'fun.show@gmail.com', '我覺得巨匠很不錯喔', '很開心新的套課推出了，期待您跟我一起加入巨匠的大家庭喔！', '2009-06-06 17:56:33'),
(444, '444', '444@444.444', '444', '444\r\n444\r\n444\r\n444', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- 資料表結構 `titles`
--

CREATE TABLE `titles` (
  `titleid` int(11) NOT NULL COMMENT '討論主題編號',
  `email` varchar(100) DEFAULT NULL COMMENT '電子郵件',
  `name` varchar(50) NOT NULL COMMENT '作者姓名',
  `subject` varchar(255) NOT NULL COMMENT '討論主題',
  `memo` text NOT NULL COMMENT '討論內容',
  `createDate` datetime DEFAULT NULL COMMENT '主題討論發起日',
  `lastNewsDate` datetime DEFAULT NULL COMMENT '主題最後討論日',
  `count` int(11) DEFAULT '0' COMMENT '參與討論數量'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `titles`
--

INSERT INTO `titles` (`titleid`, `email`, `name`, `subject`, `memo`, `createDate`, `lastNewsDate`, `count`) VALUES
(1, 'prisd@prisd.com.tw', '陳桶一', 'PHP好書推薦', '「PHP與MySQL架設Windows Web資料庫實務」\r\n這是一本不錯的書籍、不知大家有沒有什麼竟見\r\n一起討論？', '2009-06-08 16:28:17', '2009-06-09 08:39:40', 1),
(2, 'ahah@yahoo.com.tw', '阿修羅', 'DevPHP好用的編輯工具', '跟大家分享一個好用的PHP編輯工具\r\nDevPHP不知各位大大有沒有什麼\r\n好的技巧可以一起分享的', '2009-06-09 07:34:16', '2009-06-09 08:53:03', 1),
(3, 'gogo199@gmail.com', '困惑的人', '什麼是變數的變數啊?', '有誰可以教教我，關於「可變的變數或是變數的變數」它到底是什麼啊？\r\n\r\n我一直搞不清楚、謝謝', '2009-06-09 07:36:51', NULL, 0),
(4, 'tom@yahoo.com.tw', '湯姆熊', 'DW與PHP', '跟大家分享一本好書\r\nPHP不知各位有沒有什麼\r\n好書可以看的', '2009-06-10 08:30:00', NULL, 0),
(5, 'alan@gmail.com', '用功的學生', '作品完成', '作業上傳完畢，\r\n\r\n謝謝', '2009-06-11 11:01:05', NULL, 0),
(6, '444@444.444', '444', '444', '444\r\n444', '2018-06-08 21:17:18', '2018-06-11 19:59:02', 2),
(7, 'aaa@444.444', 'aaa', 'aaaa', 'aaaa\r\naaa', '2018-06-11 20:02:35', '2018-06-11 20:18:51', 3);

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `userid` varchar(20) NOT NULL COMMENT '會員帳號',
  `password` varchar(20) NOT NULL COMMENT '密碼',
  `sex` enum('F','M') NOT NULL DEFAULT 'F' COMMENT '性別',
  `age` int(11) NOT NULL COMMENT '年齡',
  `mail` varchar(50) DEFAULT NULL COMMENT '電子郵件',
  `address` varchar(100) DEFAULT NULL COMMENT '通訊地址',
  `admin` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '管理員權限',
  `auth` enum('Y','N') NOT NULL DEFAULT 'N' COMMENT '會員是否驗證',
  `register` datetime NOT NULL COMMENT '註冊日期'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`userid`, `password`, `sex`, `age`, `mail`, `address`, `admin`, `auth`, `register`) VALUES
('weill', 'weill', 'M', 30, 'weill@gjun.com', '台北市100公園路30號', 'Y', 'Y', '2011-06-19 02:36:56'),
('irock', 'irock', 'F', 20, 'irock@gjun.com', '台南市700中華路108號', 'N', 'Y', '2011-06-19 17:49:34'),
('alan', 'alan', 'M', 25, 'alan@gjun.com', '台中市500中正路200號', 'N', 'N', '2011-06-20 10:11:12');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `count`
--
ALTER TABLE `count`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `details`
--
ALTER TABLE `details`
  ADD PRIMARY KEY (`detailsid`);

--
-- 資料表索引 `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`serial`);

--
-- 資料表索引 `titles`
--
ALTER TABLE `titles`
  ADD PRIMARY KEY (`titleid`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `details`
--
ALTER TABLE `details`
  MODIFY `detailsid` int(11) NOT NULL AUTO_INCREMENT COMMENT '討論內容編號', AUTO_INCREMENT=10;
--
-- 使用資料表 AUTO_INCREMENT `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=445;
--
-- 使用資料表 AUTO_INCREMENT `titles`
--
ALTER TABLE `titles`
  MODIFY `titleid` int(11) NOT NULL AUTO_INCREMENT COMMENT '討論主題編號', AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
