<?php

/**
 * @Project NUKEVIET 4.x
 * @Author NukeViet Systems (hoangnt@nguyenvan.vn)
 * @License GNU/GPL version 2 or any later version
 */
 
if (!defined('NV_ADMIN')) die('Stop!!!');

$submenu['genealogy'] = $lang_module['genealogy'];
$submenu['location'] = $lang_module['location'];
$submenu['family'] = $lang_module['family'];
 
$allow_func = array('main', 'config', 'location', 'location_del', 'alias', 'change_status_location', 'change_weight_location', 'family', 'chang_family', 'list_family', 'del_family', 'genealogy', 'list_genealogy', 'chang_genealogy', 'del_genealogy', 'anniversary', 'genealogy_show', 'users');

 