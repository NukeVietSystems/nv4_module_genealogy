<?php

/*
	@Project NUKEVIET 4.x
	@Author NukeViet Systems(hoangnt@nguyenvan.vn)
	@License GNU/GPL version 2 or any later version
*/


if (!defined('NV_MAINFILE')) die('Stop!!!');

$sql_drop_module = array();

$sql_drop_module[] ="DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "";
$sql_drop_module[] ="DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family";
$sql_drop_module[] ="DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_genealogy";
$sql_drop_module[] ="DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location";

$sql_create_module = $sql_drop_module;

$sql_create_module[] ="CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . " (
  id int(11) NOT NULL AUTO_INCREMENT,
  gid int(11) NOT NULL DEFAULT '0',
  parentid int(11) NOT NULL DEFAULT '0' COMMENT 'Là con của Ai, thường là bố',
  parentid2 int(11) NOT NULL DEFAULT '0' COMMENT 'Là con của mẹ nào',
  weight int(11) NOT NULL DEFAULT '0' COMMENT 'Là con/vợ thứ mấy (Thứ 2, 3 hay cả, hai, ba , tư..)',
  lev int(11) NOT NULL DEFAULT '0' COMMENT 'Đời thứ',
  relationships tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Quan hệ với người được chọn: Vợ/Con.',
  gender tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Nam/Nữ/Chưa biết',
  active tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Còn sống/ đã mất/ không rõ',
  anniversary varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT 'Ngày giỗ',
  actanniversary tinyint(4) NOT NULL DEFAULT '0' COMMENT 'Hiển thị ngày giỗ hay không',
  alias varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  full_name varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên húy (Là tên trong khai sinh, tên cúng cơm)',
  codes varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Số mã hiệu (Là số mã hiệu trong gia phả, nếu có)',
  name1 varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Tên tự (Là tên tự gọi)',
  name2 varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Là tên thụy phong, truy phong sau khi mất',
  birthday datetime NOT NULL COMMENT 'Ngày giờ sinh ',
  dieday date NOT NULL COMMENT 'Ngày giờ mất ',
  life int(11) NOT NULL DEFAULT '0' COMMENT 'Hưởng thọ',
  burial varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Mộ táng tại',
  content mediumtext COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Sự nghiệp, công đức của nguời này. (Nếu là nữ, ghi tên con, cháu ngoại cũng như các ghi chú khác vào đây.)',
  image varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Upload đính kèm ảnh chân dung',
  userid int(11) NOT NULL DEFAULT '0',
  add_time int(11) NOT NULL DEFAULT '0',
  edit_time int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (id)
) ENGINE=MyISAM ";



$sql_create_module[] ="CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (
  fid mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  active tinyint(4) NOT NULL DEFAULT '0',
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  alias varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  description varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  weight smallint(4) NOT NULL DEFAULT '0',
  keywords mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  add_time int(11) NOT NULL DEFAULT '0',
  edit_time int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (fid),
  UNIQUE KEY alias (alias)
) ENGINE=MyISAM ";



$sql_create_module[] ="CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_genealogy (
  gid mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  alias varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  weight smallint(4) NOT NULL DEFAULT '0',
  add_time int(11) NOT NULL DEFAULT '0',
  edit_time int(11) NOT NULL DEFAULT '0',
  userid int(11) NOT NULL DEFAULT '0',
  fid int(11) NOT NULL DEFAULT '0',
  locationid int(11) NOT NULL DEFAULT '0',
  description mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  rule mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  content mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  status tinyint(4) NOT NULL DEFAULT '1',
  number int(11) NOT NULL DEFAULT '0',
  years varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  author varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  full_name varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  telephone varchar(55) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  email varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  who_view varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (gid),
  UNIQUE KEY alias (alias),
  KEY locationid (locationid)
) ENGINE=MyISAM ";



$sql_create_module[] ="CREATE TABLE IF NOT EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (
  locationid mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  parentid mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  title varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  alias varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  weight smallint(4) NOT NULL DEFAULT '0',
  orders mediumint(8) NOT NULL DEFAULT '0',
  lev smallint(4) NOT NULL DEFAULT '0',
  numlistcu int(11) NOT NULL DEFAULT '0',
  listcu mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  active tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  number int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (locationid),
  UNIQUE KEY title (title),
  UNIQUE KEY alias (alias)
) ENGINE=MyISAM ";

$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(1, 1, 'An', 'An', '', 1, '', 1310921468, 1310921468)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(2, 1, 'Ân', 'An-2', '', 2, '', 1310921468, 1310921468)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(3, 1, 'Âu', 'Au', '', 3, '', 1310921468, 1310921468)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(4, 1, 'Bạc', 'Bac', '', 4, '', 1310921468, 1310921468)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(5, 1, 'Bạch', 'Bach', '', 5, '', 1310921468, 1310921468)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(6, 1, 'Bàng', 'Bang', '', 6, '', 1310921468, 1310921468)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(7, 1, 'Bành', 'Banh', '', 7, '', 1310921468, 1310921468)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(8, 1, 'Bế', 'Be', '', 8, '', 1310921468, 1310921468)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(9, 1, 'Biện', 'Bien', '', 9, '', 1310921468, 1310921468)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(10, 1, 'Bùi', 'Bui', '', 10, '', 1310921468, 1310921468)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(11, 1, 'Ca', 'Ca', '', 11, '', 1310921468, 1310921468)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(12, 1, 'Cái', 'Cai', '', 12, '', 1310921468, 1310921468)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(13, 1, 'Cam', 'Cam', '', 13, '', 1310921468, 1310921468)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(14, 1, 'Cầm', 'Cam-14', '', 14, '', 1310921468, 1310921468)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(15, 1, 'Cấn', 'Can', '', 15, '', 1310921468, 1310921468)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(16, 1, 'Cao', 'Cao', '', 16, '', 1310921468, 1310921468)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(17, 1, 'Cát', 'Cat', '', 17, '', 1310921468, 1310921468)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(18, 1, 'Châu', 'Chau', '', 18, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(19, 1, 'Chế', 'Che', '', 19, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(20, 1, 'Chiêm', 'Chiem', '', 20, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(21, 1, 'Chu', 'Chu', '', 21, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(22, 1, 'Chử', 'Chu-22', '', 22, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(23, 1, 'Chung', 'Chung', '', 23, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(24, 1, 'Chương', 'Chuong', '', 24, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(25, 1, 'Cồ', 'Co', '', 25, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(26, 1, 'Cù', 'Cu', '', 26, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(27, 1, 'Cự', 'Cu-27', '', 27, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(28, 1, 'Cung', 'Cung', '', 28, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(29, 1, 'Đái', 'Dai', '', 29, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(30, 1, 'Đàm', 'Dam', '', 30, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(31, 1, 'Đặng', 'Dang', '', 31, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(32, 1, 'Danh', 'Danh', '', 32, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(33, 1, 'Đào', 'Dao', '', 33, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(34, 1, 'Đầu', 'Dau', '', 34, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(35, 1, 'Đậu', 'Dau-35', '', 35, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(36, 1, 'Dềnh (Dình)', 'Denh-Dinh', '', 36, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(37, 1, 'Đèo', 'Deo', '', 37, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(38, 1, 'Diệp', 'Diep', '', 38, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(39, 1, 'Diêu', 'Dieu', '', 39, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(40, 1, 'Điêu', 'Dieu-40', '', 40, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(41, 1, 'Điểu', 'Dieu-41', '', 41, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(42, 1, 'Đinh', 'Dinh', '', 42, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(43, 1, 'Đô', 'Do', '', 43, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(44, 1, 'Đồ', 'Do-44', '', 44, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(45, 1, 'Đỗ', 'Do-45', '', 45, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(46, 1, 'Doãn', 'Doan', '', 46, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(47, 1, 'Đoàn', 'Doan-47', '', 47, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(48, 1, 'Đống', 'Dong', '', 48, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(49, 1, 'Đồng', 'Dong-49', '', 49, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(50, 1, 'Đổng', 'Dong-50', '', 50, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(51, 1, 'Dư', 'Du', '', 51, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(52, 1, 'Duôn Du', 'Duon-Du', '', 52, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(53, 1, 'Dương', 'Duong', '', 53, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(54, 1, 'Eban', 'Eban', '', 54, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(55, 1, 'Enoul', 'Enoul', '', 55, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(56, 1, 'Giản', 'Gian', '', 56, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(57, 1, 'Giang', 'Giang', '', 57, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(58, 1, 'Giao', 'Giao', '', 58, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(59, 1, 'Giáp', 'Giap', '', 59, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(60, 1, 'Hà', 'Ha', '', 60, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(61, 1, 'Hạ', 'Ha-61', '', 61, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(62, 1, 'Hàm', 'Ham', '', 62, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(63, 1, 'Hào (Hầu)', 'Hao-Hau', '', 63, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(64, 1, 'Hò', 'Ho', '', 64, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(65, 1, 'Hồ', 'Ho-65', '', 65, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(66, 1, 'Hoa', 'Hoa', '', 66, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(67, 1, 'Hoài', 'Hoai', '', 67, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(68, 1, 'Hoàng', 'Hoang', '', 68, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(69, 1, 'Hồng', 'Hong', '', 69, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(70, 1, 'Hứa', 'Hua', '', 70, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(71, 1, 'Hui', 'Hui', '', 71, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(72, 1, 'Hùng', 'Hung', '', 72, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(73, 1, 'Huỳnh', 'Huynh', '', 73, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(74, 1, 'Kha', 'Kha', '', 74, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(75, 1, 'Khiên', 'Khien', '', 75, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(76, 1, 'Khiếu', 'Khieu', '', 76, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(77, 1, 'Khổng', 'Khong', '', 77, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(78, 1, 'Khu', 'Khu', '', 78, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(79, 1, 'Khuất', 'Khuat', '', 79, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(80, 1, 'Khúc', 'Khuc', '', 80, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(81, 1, 'Khương', 'Khuong', '', 81, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(82, 1, 'Khưu', 'Khuu', '', 82, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(83, 1, 'Kiên', 'Kien', '', 83, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(84, 1, 'Kiều', 'Kieu', '', 84, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(85, 1, 'Kiểu', 'Kieu-85', '', 85, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(86, 1, 'Kim', 'Kim', '', 86, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(87, 1, 'Knui', 'Knui', '', 87, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(88, 1, 'Ksor', 'Ksor', '', 88, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(89, 1, 'Kỷ', 'Ky', '', 89, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(90, 1, 'La', 'La', '', 90, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(91, 1, 'Lã', 'La-91', '', 91, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(92, 1, 'Lai', 'Lai', '', 92, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(93, 1, 'Lại', 'Lai-93', '', 93, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(94, 1, 'Lâm', 'Lam', '', 94, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(95, 1, 'Lang', 'Lang', '', 95, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(96, 1, 'Lành', 'Lanh', '', 96, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(97, 1, 'Lầu', 'Lau', '', 97, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(98, 1, 'Lê', 'Le', '', 98, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(99, 1, 'Lều', 'Leu', '', 99, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(100, 1, 'Liên', 'Lien', '', 100, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(101, 1, 'Liêu', 'Lieu', '', 101, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(102, 1, 'Liễu', 'Lieu-102', '', 102, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(103, 1, 'Linh', 'Linh', '', 103, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(104, 1, 'Lò', 'Lo', '', 104, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(105, 1, 'Lô', 'Lo-105', '', 105, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(106, 1, 'Lợi', 'Loi', '', 106, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(107, 1, 'Lù', 'Lu', '', 107, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(108, 1, 'Lư', 'Lu-108', '', 108, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(109, 1, 'Lữ', 'Lu-109', '', 109, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(110, 1, 'Lương', 'Luong', '', 110, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(111, 1, 'Lưu', 'Luu', '', 111, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(112, 1, 'Luyện', 'Luyen', '', 112, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(113, 1, 'Lý', 'Ly', '', 113, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(114, 1, 'Ma', 'Ma', '', 114, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(115, 1, 'Mã', 'Ma-115', '', 115, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(116, 1, 'Mạc', 'Mac', '', 116, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(117, 1, 'Mạch', 'Mach', '', 117, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(118, 1, 'Mai', 'Mai', '', 118, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(119, 1, 'Man Thiên', 'Man-Thien', '', 119, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(120, 1, 'Mạnh', 'Manh', '', 120, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(121, 1, 'Mậu', 'Mau', '', 121, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(122, 1, 'Miên', 'Mien', '', 122, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(123, 1, 'Ngạc', 'Ngac', '', 123, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(124, 1, 'Ngân', 'Ngan', '', 124, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(125, 1, 'Nghê', 'Nghe', '', 125, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(126, 1, 'Nghiêm', 'Nghiem', '', 126, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(127, 1, 'Ngô', 'Ngo', '', 127, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(128, 1, 'Ngọ', 'Ngo-128', '', 128, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(129, 1, 'Ngũ', 'Ngu', '', 129, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(130, 1, 'Ngụy', 'Nguy', '', 130, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(131, 1, 'Nguyễn', 'Nguyen', '', 131, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(132, 1, 'Nhạc', 'Nhac', '', 132, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(133, 1, 'Nhan', 'Nhan', '', 133, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(134, 1, 'Nhân', 'Nhan-134', '', 134, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(135, 1, 'Nhữ', 'Nhu', '', 135, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(136, 1, 'Ninh', 'Ninh', '', 136, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(137, 1, 'Nông', 'Nong', '', 137, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(138, 1, 'Nùng', 'Nung', '', 138, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(139, 1, 'On', 'On', '', 139, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(140, 1, 'Ôn', 'On-140', '', 140, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(141, 1, 'Ông', 'Ong', '', 141, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(142, 1, 'Pản', 'Pan', '', 142, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(143, 1, 'Phẩm', 'Pham', '', 143, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(144, 1, 'Phạm', 'Pham-144', '', 144, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(145, 1, 'Phan', 'Phan', '', 145, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(146, 1, 'Phí', 'Phi', '', 146, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(147, 1, 'Phú', 'Phu', '', 147, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(148, 1, 'Phù', 'Phu-148', '', 148, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(149, 1, 'Phùng', 'Phung', '', 149, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(150, 1, 'Phương', 'Phuong', '', 150, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(151, 1, 'Quách', 'Quach', '', 151, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(152, 1, 'Quan', 'Quan', '', 152, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(153, 1, 'Quảng', 'Quang', '', 153, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(154, 1, 'Quyền', 'Quyen', '', 154, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(155, 1, 'Sầm', 'Sam', '', 155, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(156, 1, 'Sĩ', 'Si', '', 156, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(157, 1, 'Sơn', 'Son', '', 157, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(158, 1, 'Sử', 'Su', '', 158, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(159, 1, 'Tạ', 'Ta', '', 159, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(160, 1, 'Tân', 'Tan', '', 160, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(161, 1, 'Tấn', 'Tan-161', '', 161, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(162, 1, 'Tan (Tang)', 'Tan-Tang', '', 162, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(163, 1, 'Tăng', 'Tang', '', 163, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(164, 1, 'Thạch', 'Thach', '', 164, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(165, 1, 'Thái', 'Thai', '', 165, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(166, 1, 'Thẩm', 'Tham', '', 166, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(167, 1, 'Thân', 'Than', '', 167, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(168, 1, 'Thang', 'Thang', '', 168, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(169, 1, 'Thành', 'Thanh', '', 169, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(170, 1, 'Thảo', 'Thao', '', 170, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(171, 1, 'Thi', 'Thi', '', 171, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(172, 1, 'Thiều', 'Thieu', '', 172, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(173, 1, 'Thông', 'Thong', '', 173, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(174, 1, 'Thục', 'Thuc', '', 174, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(175, 1, 'Tiết', 'Tiet', '', 175, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(176, 1, 'Tiêu', 'Tieu', '', 176, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(177, 1, 'Tô', 'To', '', 177, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(178, 1, 'Tôn', 'Ton', '', 178, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(179, 1, 'Tôn Thất', 'Ton-That', '', 179, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(180, 1, 'Tống', 'Tong', '', 180, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(181, 1, 'Trà', 'Tra', '', 181, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(182, 1, 'Trác', 'Trac', '', 182, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(183, 1, 'Trầm', 'Tram', '', 183, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(184, 1, 'Trần', 'Tran', '', 184, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(185, 1, 'Trang', 'Trang', '', 185, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(186, 1, 'Triệu', 'Trieu', '', 186, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(187, 1, 'Trình', 'Trinh', '', 187, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(188, 1, 'Trịnh', 'Trinh-188', '', 188, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(189, 1, 'Trưng', 'Trung', '', 189, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(190, 1, 'Trương', 'Truong', '', 190, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(191, 1, 'Từ', 'Tu', '', 191, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(192, 1, 'Tướng', 'Tuong', '', 192, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(193, 1, 'Tường', 'Tuong-193', '', 193, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(194, 1, 'Tưởng', 'Tuong-194', '', 194, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(195, 1, 'Ủ', 'U', '', 195, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(196, 1, 'Ung', 'Ung', '', 196, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(197, 1, 'Ứng', 'Ung-197', '', 197, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(198, 1, 'Uông', 'Uong', '', 198, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(199, 1, 'Uyển', 'Uyen', '', 199, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(200, 1, 'Vân', 'Van', '', 200, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(201, 1, 'Văn', 'Van-201', '', 201, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(202, 1, 'Vận', 'Van-202', '', 202, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(203, 1, 'Vi', 'Vi', '', 203, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(204, 1, 'Viêm', 'Viem', '', 204, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(205, 1, 'Viên', 'Vien', '', 205, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(206, 1, 'Võ', 'Vo', '', 206, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(207, 1, 'Vũ', 'Vu', '', 207, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(208, 1, 'Vương', 'Vuong', '', 208, '', 1310921469, 1310921469)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_family (fid, active, title, alias, description, weight, keywords, add_time, edit_time) VALUES(209, 1, 'Vưu', 'Vuu', '', 209, '', 1310921469, 1310921469)";

$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(2, 0, 'Hà Nội', 'Ha-Noi', 1, 1, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(3, 0, 'Hồ Chí Minh', 'Ho-Chi-Minh', 2, 2, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(4, 0, 'An Giang', 'An-Giang', 3, 3, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(5, 0, 'Bà Rịa - Vũng Tàu', 'Ba-Ria-Vung-Tau', 4, 4, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(6, 0, 'Bắc Cạn', 'Bac-Can', 5, 5, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(7, 0, 'Bắc Giang', 'Bac-Giang', 6, 6, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(8, 0, 'Bạc Liêu', 'Bac-Lieu', 7, 7, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(9, 0, 'Bắc Ninh', 'Bac-Ninh', 8, 8, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(10, 0, 'Bến Tre', 'Ben-Tre', 9, 9, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(11, 0, 'Bình Định', 'Binh-Dinh', 10, 10, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(12, 0, 'Bình Dương', 'Binh-Duong', 11, 11, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(13, 0, 'Bình Phước', 'Binh-Phuoc', 12, 12, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(14, 0, 'Bình Thuận', 'Binh-Thuan', 13, 13, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(15, 0, 'Cà Mau', 'Ca-Mau', 14, 14, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(16, 0, 'Cần Thơ', 'Can-Tho', 15, 15, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(17, 0, 'Cao Bằng', 'Cao-Bang', 16, 16, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(18, 0, 'Đà Nẵng', 'Da-Nang', 17, 17, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(19, 0, 'Đắc Lắc', 'Dac-Lac', 18, 18, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(20, 0, 'Đắk Nông', 'Dak-Nong', 19, 19, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(21, 0, 'Điện Biên', 'Dien-Bien', 20, 20, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(22, 0, 'Đồng Nai', 'Dong-Nai', 21, 21, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(23, 0, 'Đồng Tháp', 'Dong-Thap', 22, 22, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(24, 0, 'Gia Lai', 'Gia-Lai', 23, 23, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(25, 0, 'Hà Giang', 'Ha-Giang', 24, 24, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(26, 0, 'Hà Nam', 'Ha-Nam', 25, 25, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(27, 0, 'Hà Tĩnh', 'Ha-Tinh', 26, 26, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(28, 0, 'Hải Dương', 'Hai-Duong', 27, 27, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(29, 0, 'Hải Phòng', 'Hai-Phong', 28, 28, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(30, 0, 'Hậu Giang', 'Hau-Giang', 29, 29, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(31, 0, 'Hòa Bình', 'Hoa-Binh', 30, 30, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(32, 0, 'Hưng Yên', 'Hung-Yen', 31, 31, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(33, 0, 'Khánh Hòa', 'Khanh-Hoa', 32, 32, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(34, 0, 'Kiên Giang', 'Kien-Giang', 33, 33, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(35, 0, 'Kon Tum', 'Kon-Tum', 34, 34, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(36, 0, 'Lai Châu', 'Lai-Chau', 35, 35, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(37, 0, 'Lâm Đồng', 'Lam-Dong', 36, 36, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(38, 0, 'Lạng Sơn', 'Lang-Son', 37, 37, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(39, 0, 'Lào Cai', 'Lao-Cai', 38, 38, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(40, 0, 'Long An', 'Long-An', 39, 39, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(41, 0, 'Nam Định', 'Nam-Dinh', 40, 40, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(42, 0, 'Nghệ An', 'Nghe-An', 41, 41, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(43, 0, 'Ninh Bình', 'Ninh-Binh', 42, 42, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(44, 0, 'Ninh Thuận', 'Ninh-Thuan', 43, 43, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(45, 0, 'Phú Thọ', 'Phu-Tho', 44, 44, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(46, 0, 'Phú Yên', 'Phu-Yen', 45, 45, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(47, 0, 'Quảng Bình', 'Quang-Binh', 46, 46, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(48, 0, 'Quảng Nam', 'Quang-Nam', 47, 47, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(49, 0, 'Quảng Ngãi', 'Quang-Ngai', 48, 48, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(50, 0, 'Quảng Ninh', 'Quang-Ninh', 49, 49, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(51, 0, 'Quảng Trị', 'Quang-Tri', 50, 50, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(52, 0, 'Sóc Trăng', 'Soc-Trang', 51, 51, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(53, 0, 'Sơn La', 'Son-La', 52, 52, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(54, 0, 'Tây Ninh', 'Tay-Ninh', 53, 53, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(55, 0, 'Thái Bình', 'Thai-Binh', 54, 54, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(56, 0, 'Thái Nguyên', 'Thai-Nguyen', 55, 55, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(57, 0, 'Thanh Hoá', 'Thanh-Hoa', 56, 56, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(58, 0, 'Thừa Thiên - Huế', 'Thua-Thien-Hue', 57, 57, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(59, 0, 'Tiền Giang', 'Tien-Giang', 58, 58, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(60, 0, 'Trà Vinh', 'Tra-Vinh', 59, 59, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(61, 0, 'Tuyên Quang', 'Tuyen-Quang', 60, 60, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(62, 0, 'Vĩnh Long', 'Vinh-Long', 61, 61, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(63, 0, 'Vĩnh Phúc', 'Vinh-Phuc', 62, 62, 0, 0, '', 1, 0)";
$sql_create_module[] ="INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "_location (locationid, parentid, title, alias, weight, orders, lev, numlistcu, listcu, active, number) VALUES(64, 0, 'Yên Bái', 'Yen-Bai', 63, 63, 0, 0, '', 1, 0)";
