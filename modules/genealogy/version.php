<?php

/**
 * @Project NUKEVIET 4.x
 * @Author NukeViet Systems (hoangnt@nguyenvan.vn)
 * @License GNU/GPL version 2 or any later version
 */

if (!defined('NV_MAINFILE')) die('Stop!!!');

$module_version = array(
    'name' => 'genealogy', // đặt tên module
    'modfuncs' => 'main', // khai báo các function su dung ngoai site
    'submenu' => '',
    'is_sysmod' => 0,
    'virtual' => 1,
    'version' => '1.0.00',
    'date' => 'Wed, 27 sep 2017 17:15:44 GMT',
    'author' => 'NukeViet Systems (hoangnt@nguyenvan.vn)',
    'uploads_dir' => array(
        $module_upload
    ),
    'note' => ''
);

//khởi tạo version cho module với các thông tin như trên