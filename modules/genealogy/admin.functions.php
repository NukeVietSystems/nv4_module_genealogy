<?php

/**
 * @Project NUKEVIET 4.x
 * @Author NukeViet Systems (hoangnt@nguyenvan.vn)
 * @License GNU/GPL version 2 or any later version
 */
 
if( ! defined( 'NV_ADMIN' ) or ! defined( 'NV_MAINFILE' ) or ! defined( 'NV_IS_MODADMIN' ) ) die( 'Stop!!!' );
define('NV_IS_FILE_ADMIN', true);
define('MOD_GENEALOGY', NV_PREFIXLANG . '_' . $module_data);
function nv_show_genealogy_list()
{
	global $db,$lang_module,$lang_global,$module_name;
	$contents = '';
	$sql = "SELECT * FROM " . MOD_GENEALOGY . "_genealogy ORDER BY weight ASC";
	$result = $db->query($sql); 
	$num = $result->rowCount();
	if( $num > 0 )
	{
		$contents = "<div class=\"table-responsive\"><table class=\"table table-striped table-bordered table-hover\">\n";
		$contents .= "<colgroup>
                <col class=\"w50\" />
                <col  />
                <col class=\"w150\"  />
                <col />
                <col class=\"w150\" />
            </colgroup>";
		
		$contents .= "<thead>\n";
		$contents .= "<tr>\n";
		$contents .= "<td >" . $lang_module['weight'] . "</td>\n";
		$contents .= "<td>" . $lang_module['name'] . "</td>\n";
		$contents .= "<td align=\"center\">" . $lang_module['add_time'] . "</td>\n";
		$contents .= "<td align=\"center\">" . $lang_module['status'] . "</td>\n";
		$contents .= "<td >" . $lang_module['function'] . "</td>\n";
		$contents .= "</tr>\n";
		$contents .= "</thead>\n";
		$array_status = array( $lang_global['no'], $lang_global['yes'] );
		while( $row = $result->fetch() )
		{
			$contents .= "<tbody>\n";
			$contents .= "<tr>\n";
			$contents .= "<td align=\"center\"><select id=\"id_weight_" . $row['gid'] . "\" >\n";
			for( $i = 1; $i <= $num; $i++ )
			{
				$contents .= "<option value=\"" . $i . "\"" . ( $i == $row['weight'] ? " selected=\"selected\"" : "" ) . ">" . $i . "</option>\n";
			}
			$contents .= "</select></td>\n";
			$contents .= "<td><a href=\"" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=genealogy_show&amp;gid=" . $row['gid'] . "\">" . $row['title'] . "</a>";

			$contents .= " </td>\n";
			$contents .= "<td align=\"center\">" . nv_date( "H:i d/m/y", $row['add_time'] ) . "</a>";

			$contents .= "<td align=\"center\"><select id=\"id_status_" . $row['gid'] . "\" onchange=\"nv_chang_genealogy('" . $row['gid'] . "','status');\">\n";
			foreach( $array_status as $key => $val )
			{
				$contents .= "<option value=\"" . $key . "\"" . ( $key == $row['status'] ? " selected=\"selected\"" : "" ) . ">" . $val . "</option>\n";
			}
			$contents .= "</select></td>\n";
			$contents .= "<td align=\"center\">";
			$contents .= "<span class=\"default_icon\"><a href=\"" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=anniversary&amp;gid=" . $row['gid'] . "\">" . $lang_module['anniversary'] . "</a></span>\n";
			$contents .= "&nbsp;-&nbsp;<span class=\"edit_icon\"><a href=\"" . NV_BASE_ADMINURL . "index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&amp;" . NV_OP_VARIABLE . "=genealogy&amp;gid=" . $row['gid'] . "\">" . $lang_global['edit'] . "</a></span>\n";
			$contents .= "&nbsp;-&nbsp;<span class=\"delete_icon\"><a href=\"javascript:void(0);\" >" . $lang_global['delete'] . "</a></span></td>\n";
			$contents .= "</tr>\n";
			$contents .= "</tbody>\n";
		}
		$contents .= "</table>\n";
	}else{
		$contents = "không tồn tại danh sách";
	}
	return $contents; 
}