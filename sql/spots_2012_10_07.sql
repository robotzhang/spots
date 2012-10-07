/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50141
Source Host           : localhost:3306
Source Database       : spots

Target Server Type    : MYSQL
Target Server Version : 50141
File Encoding         : 65001

Date: 2012-10-07 23:58:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL COMMENT '角色(admin/editor)',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'uto168', 'e10adc3949ba59abbe56e057f20f883e', 'admin', '2012-09-29 01:12:36', '2012-09-29 01:12:40');

-- ----------------------------
-- Table structure for `handbooks`
-- ----------------------------
DROP TABLE IF EXISTS `handbooks`;
CREATE TABLE `handbooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` varchar(255) NOT NULL COMMENT '手册唯一id',
  `is_used` char(1) DEFAULT 'N' COMMENT '是否已被激活(默认未被激活)',
  `user_id` int(11) DEFAULT NULL COMMENT '激活用户id',
  `created_at` datetime DEFAULT NULL COMMENT '添加时间',
  `updated_at` datetime DEFAULT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='手册';

-- ----------------------------
-- Records of handbooks
-- ----------------------------
INSERT INTO `handbooks` VALUES ('2', 'vuioplnfq', 'Y', '34', '2012-09-23 15:31:38', '2012-10-01 00:41:03');
INSERT INTO `handbooks` VALUES ('4', 'test', 'N', null, '2012-10-07 15:03:41', '2012-10-07 15:03:44');

-- ----------------------------
-- Table structure for `partners`
-- ----------------------------
DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '登录名',
  `password` varchar(255) NOT NULL COMMENT '登录密码',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of partners
-- ----------------------------
INSERT INTO `partners` VALUES ('2', 'zj_千岛湖', 'e10adc3949ba59abbe56e057f20f883e', '2012-10-01 01:20:21', '2012-10-07 14:24:42');

-- ----------------------------
-- Table structure for `spots`
-- ----------------------------
DROP TABLE IF EXISTS `spots`;
CREATE TABLE `spots` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL COMMENT '景点名称',
  `introduce` text COMMENT '景点介绍',
  `partner_id` int(11) DEFAULT NULL COMMENT '所属景点合作者id',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='景点/景区表';

-- ----------------------------
-- Records of spots
-- ----------------------------
INSERT INTO `spots` VALUES ('2', '千岛湖风景区', '<p>\r\n	一、景区整体概况\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; 千岛湖风景区位于浙江省淳安县境内，其形成缘于1959年建设我国第一座自行设计的大型水力发电站——新安江水力发电站筑坝拦江蓄水而成的一座人工湖，因湖中有1078个芊芊翠岛而被命名为千岛湖。整个湖面分为中心、东南、西北、西南、东北五个各具特色的湖区。千岛湖为国务院首批公布的国家级风景名胜区之一，国家4A级景区，国内最大的国家级森林公园；1997年被评为\"浙江十佳美景\"榜首，同年又跻身\"全国森林公园十大标兵\"行列；2003被评为浙江省最具吸引力的景区之一。2007年，千岛湖所在的淳安县被国家旅游局评为“中国旅游强县。”2010年，千岛湖又获得了国家5A级旅游景区的荣誉称号。\r\n</p>\r\n<p>\r\n	千岛湖碧波万顷，景区内岛屿星罗棋布，有如大珠小珠落玉盘。目前湖区已开发有梅峰览胜、龙山岛、月光岛、黄山尖、密山等十一个景点。\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;千岛湖的外围还分布着诸多的风景区块，如华东第一石林--千岛湖石林、龙川湾湿地公园、森林氧吧、华东最大的瀑布群--上西村瀑布群、九龙溪漂流、白云溪漂流、龙门漂流、金峰漂流、王子谷漂流等，以及芹川古民居、白马盆地、千亩田、磨心尖原始森林等。\r\n</p>\r\n<p>\r\n	（千岛湖风景区是国家4A级景区，国内最大的国家级森林公园。）\r\n</p>\r\n<p>\r\n	<br />\r\n</p>\r\n<p>\r\n	二、景区亮点\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1.梅峰览胜——登临梅峰山顶，可以看到在这片广阔的湖面上，有300多个大小岛屿星罗棋布，俯首近视，只见众多岛屿，高低错落，山重水复，港湾曲折；纵观全景，青山绿水，蓝天白云，有动有静，变幻多端，韵味无穷。船行在梅峰附近水域里，岛间的航道曲折多变，似隔多连，船行其中，有的地方似乎没有去路，稍一转折又觉得没有尽头，形成了别具一格的“水上迷宫”。\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.黄山尖——登临黄山尖，鸟瞰西北，九十多个岛屿，如珍珠撒落湖面。或大或小，或密或疏；密的似连非连，疏的如孤如寂。岛屿把湖面任意分割成大小不一的空间，制造了一个巨大的水上迷宫，妙趣纷披。更绝的是，这些岛屿隐约组成了“天下为公”四个大字，尤其是占水域面积三十余亩的“公”字，形象逼真，气势恢宏，堪称天下一绝。\r\n</p>\r\n<p>\r\n	三、吃\r\n</p>\r\n<p>\r\n	&nbsp; &nbsp; 千岛湖，因临近古徽州，故其餐饮保留着浓郁的徽菜风韵，“味重、色浓、火工足”，多煲仔类菜肴；又，以水为邻，气候湿润，为祛除水气，菜肴多辣；另，地处山区，其烹饪手法及材料选取均保持着浓浓的乡土气息。鲜美而不张扬，精致而不奢华，这就是千岛湖美食的典型特点。\r\n</p>\r\n<p>\r\n	“砂锅鱼头”、“八宝鱼头”、“秀水鱼鳔”、“浪里白条”、“红油石斑鱼”、等都是千岛湖鱼类美食的精选。\r\n</p>\r\n<p>\r\n	“千岛玉笋”、&nbsp;“千岛山珍羹”、“雀巢野兔丁”、“千岛双珍羮”、“五彩蕨菜”、“铁板黄麂”、“红烧野猪肉”等是山林野味的美食精选。\r\n</p>\r\n<p>\r\n	“土鸡煲”、“风干肉煲”、“农家豆腐”、&nbsp;“千岛石鸡”、“千岛石衣”、“火腿腊肉”、“笋干煲”等是当地农家特色菜肴。\r\n</p>\r\n<p>\r\n	这些美食在千岛湖鱼味馆、岛外新岛酒楼等景区内餐馆酒楼都能品尝到。\r\n</p>\r\n<p>\r\n	四、住\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;景区有许多酒店可供您歇宿。\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;有独居千岛湖美丽的羡山半岛，将山景、水景与酒店巧妙地融合到一起，设备配套齐全的岛湖万向洲际度假酒店；距淳安县市中心区及县长途汽车站仅需几分钟车程，距离至杭州、上海高速公路入口最近的一流国际品牌酒店——千岛湖滨江希尔顿度假酒店；可以享受到居家般的舒适与便利，每个房间均可观赏到美轮美奂的山景、水景或园景的千岛湖喜来登度假酒店；由“中国饭店业集团20强”之一的开元旅业集团开发管理的豪华度假村，内有一家五星级度假酒店和88幢独立别墅，赢得“东方夏威夷”之美称的千岛湖开元度假村；五星级标准建造的高档休闲度假酒店——千岛湖温馨岛度假酒店；位于千岛湖镇梦姑路，紧邻千岛湖旅游码头，面向千岛湖中心湖区，东依梦姑塘文化公园的千岛湖润和建国度假酒店等等。\r\n</p>\r\n<p>\r\n	五、行\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;千岛湖位于长三角南翼，隶属浙江省杭州市，东距杭州129公里，距离上海315公里，距离南京436公里，千岛湖旅游已经成为长三角名副其实的后花园。千岛湖作为这个区域内唯一一个以自然山水景观结合见长的景区，自然具有不可替代的优势。千岛湖交通便捷，长三角地区的大中城市均可一路高速直达千岛湖。\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;Ø杭州（经绕城高速南枢纽上杭新景高速，约100KM）——〉洋溪枢纽（转至杭千高速支线）——〉千岛湖镇\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;Ø黄山（经黄衢南高速，约35KM）——〉马金（经淳开公路，约20KM）——〉汾口（经千汾公路，约75KM）——〉千岛湖镇\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;Ø南京（宁杭高速）——〉杭州绕城高速南枢纽（转至杭新景高速，约100KM）——〉洋溪枢纽（转至杭千高速支线）——〉千岛湖镇\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;Ø上海（经沪杭高速）——〉杭州绕城北枢纽（经杭州绕城）——〉杭州绕城高速南枢纽（转至杭新景高速，约100KM）——〉洋溪枢纽（转至杭千高速支线）——〉千岛湖镇\r\n</p>\r\n<p>\r\n	六、游\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;千岛湖位于杭州市西部淳安县境内，是首批国家重点风景名胜区，国家5A级旅游区，是“杭州—千岛湖—黄山”世博精品旅游体验线路上的一颗璀璨明珠。千岛湖景区以山清、水秀、群岛风光为特色，湖光山色千变万化，被世人称之为“中国最美丽的湖泊”。\r\n</p>\r\n<p>\r\n	573平方公里湖面、1078座宁静翠岛、178亿立方米至清水体、2200公里湖岸线、95%森林覆盖率、1800余种植物种类、2100多种野生动物、20%空气含氧量、9米水体能见度、17℃年平均气温、12℃常年水温、100%绿视率。\r\n</p>\r\n<p>\r\n	七、购\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;景区有着众多特色商店，供您在游览之余参观挑选。\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;主营各类旅游纪念品及本地特色商品的千岛湖秀水街；依托千岛湖一流生态环境下的农产品资源，研发生产传统食疗养生系列产品的千岛湖红曲养生基地；销售本地特产和深加工鱼类产品为主的千岛湖野娇娇品牌特产；以销售山核桃、地瓜干、笋干、山茶油、葛粉、茶叶、鱼干、桑木耳等本地特产为主的千岛湖木兰土特产超市；主要开发生产“永成”牌生态绿色食品有野生鱼干、野生葛粉、野生珍菇、山核桃、山笋干、高山干菜、高山茶叶等的千岛湖永成土特产；主要产品有：山核桃、山萸肉、茶叶、笋干、鱼干、山茶油、高山薯干、蔬菜干制品等的千岛高峰特产专卖；主要经营蚕丝被，蚕丝毯，蚕丝围巾、领带、服装等真丝系列产品的千岛湖蚕丝馆；主要销售淳牌千岛湖有机鱼加工产品千岛湖淳鱼荟萃。\r\n</p>\r\n<p>\r\n	八、娱\r\n</p>\r\n<p>\r\n	&nbsp;&nbsp;&nbsp;&nbsp;景区有着丰富多彩的娱乐项目，供您在游览之余放松身心，如：主要经营专业足疗保健，泰式保健的淳安县富侨保健足浴；以肩颈舒压养生、盆部排毒养生、抗衰老冰光疗法、中医经络减肥等调理养护为特色的“名门闺秀”养生馆；经营进口牛排、韩式石锅拌饭、现磨咖啡、花果茶、鸡尾酒、各式精致小吃为一体两岸咖啡、水岸咖啡；千岛湖规模最大、人气最旺的娱乐先锋——维多利亚娱乐城等。\r\n</p>', '2', '2012-09-28 12:03:26', '2012-10-01 23:09:09');

-- ----------------------------
-- Table structure for `tickets`
-- ----------------------------
DROP TABLE IF EXISTS `tickets`;
CREATE TABLE `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '所属用户id',
  `spot_id` int(11) NOT NULL COMMENT '票所属景点id',
  `handbook_unique_id` varchar(255) DEFAULT NULL COMMENT '使用的是哪个手册id(unique_id)',
  `created_at` datetime DEFAULT NULL COMMENT '购买时间',
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COMMENT='用户购买打折门票信息';

-- ----------------------------
-- Records of tickets
-- ----------------------------
INSERT INTO `tickets` VALUES ('1', '34', '2', 'vuioplnfq', '2012-10-02 02:11:23', '2012-10-02 02:11:23');
INSERT INTO `tickets` VALUES ('5', '34', '2', 'vuioplnfq', '2012-10-03 01:49:32', '2012-10-03 01:49:32');
INSERT INTO `tickets` VALUES ('4', '34', '2', 'vuioplnfq', '2012-10-02 02:17:25', '2012-10-02 02:17:25');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mobile` varchar(13) NOT NULL COMMENT '手机号码',
  `drive` varchar(255) DEFAULT NULL COMMENT '驾驶证号',
  `password` varchar(255) NOT NULL COMMENT '登陆密码',
  `nickname` varchar(255) DEFAULT NULL COMMENT '用户昵称',
  `ip` varchar(255) DEFAULT NULL COMMENT '注册ip',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `is_validation` char(1) DEFAULT 'N' COMMENT '手机是否已验证',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=utf8 COMMENT='用户表';

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('34', '13482285699', '1234567893211', 'c33367701511b4f6020ec61ded352059', null, '127.0.0.1', '2012-10-01 00:40:39', '2012-10-07 14:49:23', 'Y');
