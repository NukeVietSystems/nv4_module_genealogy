<?php

/**
 * @Project NUKEVIET 4.x
 * @Author NukeViet Systems (hoangnt@nguyenvan.vn)
 * @License GNU/GPL version 2 or any later version
 */

 
if (!defined('NV_IS_FILE_ADMIN')) die('Stop!!!');
$groups_list = nv_groups_list();
// bây giờ chúng ta code phần xử lý dữ liệu sau khi nhập form. và người dùng sẽ nhấn nút submit
// $post['gid'], $post['title'] ... là những biến mảng php vì vậy phải có khai báo mảng trong php
$post = array();
$post['gid'] = $nv_Request->get_int('gid', 'post', 0);
if ($nv_Request->get_string('submit', 'post') != "") // Dùng code này để kiểm tra người dùng có nhấn submit hay chưa
{
	//nhấn rồi thì thực thi đoạn code trong khung này
	$post['gid'] = $nv_Request->get_int('gid', 'post', 0); // $nv_Request->get_int lấy giá trị số từ thẻ HTML, 
															//'gid' thẻ html có tên là gid, 
															//'post', 'post,get', 'get' là phương thức method của form
	$post['title'] = $nv_Request->get_title('title', 'post', ''); // $nv_Request->get_title : lấy chuõi giá trị trong input
																// thường dùng cho lấy giá trị của tiêu đề
	$post['fid'] = $nv_Request->get_int('fid', 'post', 0);
    $post['locationid'] = $nv_Request->get_int('locationid', 'post', 0);
    $post['description'] = $nv_Request->get_string('description', 'post', '');
    $post['description'] = defined('NV_EDITOR') ? nv_nl2br($post['description'], '') : nv_nl2br(nv_htmlspecialchars(strip_tags($post['description'])), '<br />');
    $post['rule'] = $nv_Request->get_string('rule', 'post', '');//tương tự như $nv_Request->get_title
    $post['rule'] = defined('NV_EDITOR') ? nv_nl2br($post['rule'], '') : nv_nl2br(nv_htmlspecialchars(strip_tags($post['rule'])), '<br />');
    $post['content'] = $nv_Request->get_string('content', 'post', ''); 
    $post['content'] = defined('NV_EDITOR') ? nv_nl2br($post['content'], '') : nv_nl2br(nv_htmlspecialchars(strip_tags($post['content'])), '<br />');
    $post['status'] = ( int )$nv_Request->get_bool('status', 'post');		// $nv_Request->get_int , $nv_Request->get_bool	lấy giá trị đúng hoặc sai				
	// những thẻ html textarea : 
	 // ta sử dụng nv_nl2br() khi hệ thống cho phép sử dụng trình soạn thảo editor để chuyển thẻ html sang data và lưu vào mysql
	 // nếu không có trình soạn thảo thì ta sử dụng thêm nv_htmlspecialchars(strip_tags()) để loại bỏ các thẻ nguy hiểm đến bảo mật
	$post['years'] = $nv_Request->get_string('years', 'post', '', 1); //filter_text_input không còn sử dụng trong NukeViet 4.x ta thay nó bằng $nv_Request->get_string
    $post['author'] = $nv_Request->get_string('author', 'post', '', 1);
    $post['full_name'] = $nv_Request->get_string('full_name', 'post', '', 1);
    $post['telephone'] = $nv_Request->get_string('telephone', 'post', '', 1);
    $post['email'] = $nv_Request->get_string('email', 'post', '', 1);
	 if (!empty($post['title']) and $post['locationid'] > 0) //kiểm tra title có được nhập không? và địa điểm gia phả có thông tin hay không?
    {
		// nếu có thì thực thi đoạn code này
		$post['alias'] = change_alias($post['title']); //change_alias() hàm gán alias
		$post['userid'] = $admin_info['admin_id']; //$admin_info['admin_id'] là id người dùng đang đăng nhập và có quyền trên func của module
		if (empty($post['gid'])) // kiểm tra id gia phả 
        {
			//Nếu không có thì vào chế độ insert gia phả vào mysql
			$contents =  "Thêm gia phả thành công";
			include NV_ROOTDIR . '/includes/header.php';
			echo nv_admin_theme($contents);
			include NV_ROOTDIR . '/includes/footer.php';
		}else{
			//Nếu không có thì vào chế độ update gia phả vào mysql
			$contents =  "Sữa gia phả thành công";
			include NV_ROOTDIR . '/includes/header.php';
			echo nv_admin_theme($contents);
			include NV_ROOTDIR . '/includes/footer.php';
		}
	}
}elseif ($post['gid'] > 0) {
	$contents =  "Hiển thị gia phả đã có trong CSDL";
	include NV_ROOTDIR . '/includes/header.php';
	echo nv_admin_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
	// nếu chưa nhấn thì thực thi đoạn code trong khung này
	// ta dùng thêm elseif để kiểm tra điều kiện thứ 2 mak chugns ta muốn
	// ở đây mình dùng là kiểm tra điều kiện tồn tại gia phả hay chưa
}else{

	$post['fid']="";
	$post['locationid']="";
	$post['description']="";
	$post['rule']="";
	$post['content']="";
	$post['who_view']=4;
	$content = "";
	$sql = "SELECT * FROM " . MOD_GENEALOGY . "_family ORDER BY weight ASC";
	$list_family = $db->query($sql);
	$num_f= $list_family->rowCount();
	$sql = "SELECT locationid, title FROM " . MOD_GENEALOGY . "_location WHERE parentid=0 ORDER BY weight ASC";
	$list_location = $db->query($sql);
	$num_l= $list_location->rowCount();
	if (defined('NV_EDITOR')) {
		require_once NV_ROOTDIR . '/' . NV_EDITORSDIR . '/' . NV_EDITOR . '/nv.php'; 
	}
	$xtpl = new XTemplate($op . '.tpl', NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/modules/' . $module_file);
	$xtpl->assign( 'LANG', $lang_module);
	$xtpl->assign( 'NV_BASE_ADMINURL', NV_BASE_ADMINURL);
	$xtpl->assign( 'NV_NAME_VARIABLE', NV_NAME_VARIABLE);
	$xtpl->assign( 'MODULE_NAME', $module_name);
	$xtpl->assign('NV_OP_VARIABLE', NV_OP_VARIABLE);
	$xtpl->assign('OP', $op);

	if($num_f>0){
		while ($row = $list_family->fetch())
		{
			$row['selected'] = ($row['fid'] == $post['fid']) ? ' selected="selected"' : '';
			$xtpl->assign('FAMILY', $row); 
			$xtpl->parse('main.family');
		}
	}
	if($num_l>0){
		while ($row = $list_location->fetch())
		{
			$row['selected'] = ($row['locationid'] == $post['locationid']) ? ' selected="selected"' : '';
			$xtpl->assign('LOCATION', $row);
			$xtpl->parse('main.location');
		}
	}

	if (defined('NV_EDITOR') and nv_function_exists('nv_aleditor')) {
		$post['description'] = nv_aleditor('description', '100%', '200px', $post['description']);
		$post['rule'] = nv_aleditor('rule', '100%', '200px', $post['rule']);
		$post['content'] = nv_aleditor('content', '100%', '200px', $post['content']);
	}else{
		$post['description'] = "<textarea style=\"width: 100%\" name=\"description\" cols=\"20\" rows=\"15\">" . $post['description'] . "</textarea>";
		$post['rule'] = "<textarea style=\"width: 100%\" name=\"rule\" cols=\"20\" rows=\"15\">" . $post['rule'] . "</textarea>";
		$post['content'] = "<textarea style=\"width: 100%\" name=\"rule\" cols=\"20\" rows=\"15\">" . $post['content'] . "</textarea>";
	}
	$xtpl->assign('DATA', $post);
	$allowed_view = explode(',', $post['who_view']); 
	foreach ($groups_list as $_group_id => $_title) {
		$xtpl->assign('ALLOWED_VIEW', array(
			'value' => $_group_id,
			'checked' => in_array($_group_id, $allowed_view) ? ' checked="checked"' : '',
			'title' => $_title
		));
		$xtpl->parse('main.allowed_view');
	}

	$xtpl->parse('main');
	$contents = $xtpl->text('main');
	$page_title = $lang_module['genealogy'];
	include NV_ROOTDIR . '/includes/header.php';
	echo nv_admin_theme($contents);
	include NV_ROOTDIR . '/includes/footer.php';
}
// bài học hôm nay chúng ta học cách xủ lý dữ liệu sau khi người dùng nhập 
// trong bài học này chúng ta nắm cách lấy giá trị của thẻ html truyền vào biến php thông qua biến $nv_Request