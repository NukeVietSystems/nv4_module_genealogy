<?php

/**
 * @Project NUKEVIET 4.x
 * @Author NukeViet Systems (hoangnt@nguyenvan.vn)
 * @License GNU/GPL version 2 or any later version
 */

 
if (!defined('NV_IS_FILE_ADMIN')) die('Stop!!!');

$contents='';
$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->parse('main');
$contents = $xtpl->text('main');
$page_title = $lang_module['main'];
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';

