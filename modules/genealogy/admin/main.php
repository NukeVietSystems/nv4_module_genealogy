<?php

/**
 * @Project NUKEVIET 4.x
 * @Author NukeViet Systems (hoangnt@nguyenvan.vn)
 * @License GNU/GPL version 2 or any later version
 */

 
if (!defined('NV_IS_FILE_ADMIN')) die('Stop!!!');

$content = nv_show_genealogy_list();
if ( $content == "&nbsp;" )
{
    nv_redirect_location(NV_BASE_ADMINURL . 'index.php?' . NV_LANG_VARIABLE . '=' . NV_LANG_DATA . '&' . NV_NAME_VARIABLE . '=' . $module_name . '&' . NV_OP_VARIABLE . '=genealogy' );
}
$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
$xtpl->assign( 'GENEALOGY_LIST', $content);
$xtpl->parse('main');
$contents = $xtpl->text('main');
$page_title = $lang_module['main'];
include NV_ROOTDIR . '/includes/header.php';
echo nv_admin_theme($contents);
include NV_ROOTDIR . '/includes/footer.php';