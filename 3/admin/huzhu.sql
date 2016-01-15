/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : huzhu

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2015-12-22 16:33:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for w_admin
-- ----------------------------
DROP TABLE IF EXISTS `w_admin`;
CREATE TABLE `w_admin` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL COMMENT '会员账号',
  `pwd` char(32) NOT NULL COMMENT '一级密码',
  `level` tinyint(1) unsigned DEFAULT '0' COMMENT '1是代理中心 2管理员',
  `name` varchar(50) NOT NULL COMMENT '姓名',
  `tel` varchar(50) NOT NULL COMMENT '电话',
  `ali` varchar(50) NOT NULL COMMENT '支付宝',
  `wx` varchar(50) NOT NULL COMMENT '微信号',
  `ip` varchar(15) NOT NULL DEFAULT '0' COMMENT 'ip',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of w_admin
-- ----------------------------
INSERT INTO `w_admin` VALUES ('1', 'admin', '7fef6171469e80d32c0559f88b377245', '0', '', '', '', '', '0', '1450761231');
INSERT INTO `w_admin` VALUES ('2', 'fuwu1', '7fef6171469e80d32c0559f88b377245', '1', '服务中心', '13076966542', '', '', '0', '1450761231');

-- ----------------------------
-- Table structure for w_config
-- ----------------------------
DROP TABLE IF EXISTS `w_config`;
CREATE TABLE `w_config` (
  `cid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '配置名称',
  `name` varchar(255) DEFAULT NULL COMMENT '英文名称',
  `val` varchar(255) DEFAULT NULL COMMENT '配置值',
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='系统配置表';

-- ----------------------------
-- Records of w_config
-- ----------------------------

-- ----------------------------
-- Table structure for w_message
-- ----------------------------
DROP TABLE IF EXISTS `w_message`;
CREATE TABLE `w_message` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(40) NOT NULL COMMENT '所属会员id',
  `title` varchar(255) DEFAULT NULL COMMENT '留言标题',
  `cont` varchar(255) DEFAULT NULL COMMENT '内容',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='留言';

-- ----------------------------
-- Records of w_message
-- ----------------------------

-- ----------------------------
-- Table structure for w_mlog
-- ----------------------------
DROP TABLE IF EXISTS `w_mlog`;
CREATE TABLE `w_mlog` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(40) NOT NULL COMMENT '所属会员id',
  `uname` varchar(50) NOT NULL COMMENT '会员账号',
  `remark` varchar(255) DEFAULT NULL COMMENT '日志说明',
  `income` int(10) unsigned DEFAULT '0' COMMENT '收入',
  `pay` int(10) unsigned DEFAULT '0' COMMENT '支出',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`mid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='资金日志表';

-- ----------------------------
-- Records of w_mlog
-- ----------------------------

-- ----------------------------
-- Table structure for w_notice
-- ----------------------------
DROP TABLE IF EXISTS `w_notice`;
CREATE TABLE `w_notice` (
  `nid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL COMMENT '消息标题',
  `cont` varchar(255) DEFAULT NULL COMMENT '内容',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`nid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='站内消息';

-- ----------------------------
-- Records of w_notice
-- ----------------------------

-- ----------------------------
-- Table structure for w_receive
-- ----------------------------
DROP TABLE IF EXISTS `w_receive`;
CREATE TABLE `w_receive` (
  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(40) NOT NULL COMMENT '所属会员id',
  `uname` varchar(50) NOT NULL COMMENT '会员账号',
  `code` varchar(50) DEFAULT NULL COMMENT '单号',
  `match_ids` varchar(255) DEFAULT NULL COMMENT '匹配id用英文,隔开',
  `remain` int(10) unsigned DEFAULT '0' COMMENT '剩余金额',
  `money` int(10) unsigned DEFAULT '0' COMMENT '金额',
  `money_allow` int(10) unsigned DEFAULT '0' COMMENT '可允许匹配金额',
  `money_match` int(10) unsigned DEFAULT '0' COMMENT '匹配金额',
  `money_ok` int(10) unsigned DEFAULT '0' COMMENT '成功金额',
  `flag` tinyint(1) unsigned DEFAULT '0' COMMENT '交易状态0等待匹配 1匹配成功',
  `match_time` int(10) NOT NULL DEFAULT '0' COMMENT '匹配时间',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='接收表-[提现]';

-- ----------------------------
-- Records of w_receive
-- ----------------------------
INSERT INTO `w_receive` VALUES ('1', '9c14df0c-a87e-11e5-a40d-f8bc1290406c', 'wangwang', 'TX2015122298499751', null, '0', '1000', '1000', '0', '0', '0', '0', '1450771627');

-- ----------------------------
-- Table structure for w_send
-- ----------------------------
DROP TABLE IF EXISTS `w_send`;
CREATE TABLE `w_send` (
  `sid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` varchar(40) NOT NULL COMMENT '所属会员id',
  `uname` varchar(50) NOT NULL COMMENT '会员账号',
  `code` varchar(50) DEFAULT NULL COMMENT '单号',
  `match_ids` varchar(255) DEFAULT NULL COMMENT '匹配id用英文,隔开',
  `remain` int(10) unsigned DEFAULT '0' COMMENT '剩余金额',
  `money` int(10) unsigned DEFAULT '0' COMMENT '金额',
  `money_allow` int(10) unsigned DEFAULT '0' COMMENT '可允许匹配金额',
  `money_match` int(10) unsigned DEFAULT '0' COMMENT '匹配金额',
  `money_ok` int(10) unsigned DEFAULT '0' COMMENT '成功金额',
  `pay` int(10) unsigned DEFAULT '0' COMMENT '已取本金',
  `days` int(10) unsigned DEFAULT '0' COMMENT '天数',
  `rate` int(10) unsigned DEFAULT '0' COMMENT '利息',
  `flag` tinyint(1) unsigned DEFAULT '0' COMMENT '交易状态0等待匹配 1匹配成功',
  `match_time` int(10) NOT NULL DEFAULT '0' COMMENT '匹配时间',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '添加时间',
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='发送表-[投资]';

-- ----------------------------
-- Records of w_send
-- ----------------------------
INSERT INTO `w_send` VALUES ('1', '68b6f40d-a880-11e5-a40d-f8bc1290406c', 'xiping', 'GD2015122248501005', null, '0', '1000', '1000', '0', '0', '0', '0', '0', '0', '0', '1450770656');

-- ----------------------------
-- Table structure for w_send_receive
-- ----------------------------
DROP TABLE IF EXISTS `w_send_receive`;
CREATE TABLE `w_send_receive` (
  `srid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '挂单id',
  `rid` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '提现id',
  `money` int(10) unsigned DEFAULT '0' COMMENT '本金[0已经取出本金]',
  `money_match` int(10) unsigned DEFAULT '0' COMMENT '匹配金额',
  `money_ok` int(10) unsigned DEFAULT '0' COMMENT '成功金额',
  `rate` int(10) unsigned DEFAULT '0' COMMENT '利息',
  `flag` tinyint(1) unsigned DEFAULT '0' COMMENT '0匹配成功 1已付款 2已确认 3交易成功 9出局[超出11天，本金,利息入钱包]',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '匹配时间',
  PRIMARY KEY (`srid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='挂单投资中间表';

-- ----------------------------
-- Records of w_send_receive
-- ----------------------------

-- ----------------------------
-- Table structure for w_user
-- ----------------------------
DROP TABLE IF EXISTS `w_user`;
CREATE TABLE `w_user` (
  `uid` varchar(40) NOT NULL,
  `fuid` varchar(40) NOT NULL COMMENT '所属会员id',
  `uname` varchar(50) NOT NULL COMMENT '会员账号',
  `lift_uname` varchar(50) NOT NULL COMMENT '推荐人账号',
  `center_uname` varchar(50) NOT NULL COMMENT '推荐人账号',
  `center_id` varchar(50) NOT NULL COMMENT '代理中心id admin id',
  `name` varchar(50) NOT NULL COMMENT '姓名',
  `tel` varchar(50) NOT NULL COMMENT '电话',
  `bank` varchar(20) NOT NULL COMMENT '开户行',
  `bank_code` varchar(50) NOT NULL COMMENT '账号',
  `ali` varchar(50) NOT NULL COMMENT '支付宝',
  `wx` varchar(50) NOT NULL COMMENT '微信号',
  `pwd1` char(32) NOT NULL COMMENT '一级密码',
  `pwd2` char(32) NOT NULL COMMENT '二级密码',
  `lift_people` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '推荐人数',
  `bag` decimal(10,0) NOT NULL COMMENT '钱包',
  `flag` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否激活',
  `lock` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否锁定',
  `ip` varchar(15) NOT NULL DEFAULT '0' COMMENT 'ip',
  `add_time` int(10) NOT NULL DEFAULT '0' COMMENT '注册时间',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='会员表';

-- ----------------------------
-- Records of w_user
-- ----------------------------
INSERT INTO `w_user` VALUES (' 7417fbbb-a879-11e5-acc3-f8bc1290406c', '1', 'tanjibo', '', '', '', '', '', '', '', '', '', '', '', '1', '0', '0', '0', '0', '0');
INSERT INTO `w_user` VALUES ('68b6f40d-a880-11e5-a40d-f8bc1290406c', '9c14df0c-a87e-11e5-a40d-f8bc1290406c', 'xiping', 'wangwang', 'fuwu1', '2', 'xiping', '18610729170', '', '', 'xxxx', 'xxxx', '7fef6171469e80d32c0559f88b377245', '7fef6171469e80d32c0559f88b377245', '0', '5000', '1', '0', '127.0.0.1', '1450770517');
INSERT INTO `w_user` VALUES ('9c14df0c-a87e-11e5-a40d-f8bc1290406c', ' 7417fbbb-a879-11e5-acc3-f8bc1290406c', 'wangwang', 'tanjibo', 'fuwu1', '2', 'tanjibo', '13076966542', '', '', 'fdd', 'xx', '7fef6171469e80d32c0559f88b377245', '7fef6171469e80d32c0559f88b377245', '1', '3000', '1', '0', '127.0.0.1', '1450769744');
