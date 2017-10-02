<?php

/**
 * @Project NUKEVIET 4.x
 * @Author NukeViet Systems (hoangnt@nguyenvan.vn)
 * @License GNU/GPL version 2 or any later version
 */
 
if (!defined('NV_IS_MOD_GENEALOGY')) die('Stop!!!');
 
$contents ='Nội dung file funcs/main.php';
 
include NV_ROOTDIR . '/includes/header.php';
echo nv_site_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';