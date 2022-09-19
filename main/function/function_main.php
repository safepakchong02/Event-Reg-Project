<script>
	function convertNameCol(name) {
		switch (name) {
			case "emp_id":
				return "รหัสพนักงาน";
				break;
			case "card_id":
				return "รหัสบัตรประชาชน";
				break;
			case "name":
				return "ชื่อ - สกุล";
				break;
			case "call":
				return "เบอร์โทรศัพท์";
				break;
			case "com_name":
				return "ชื่อบริษัท";
				break;
			case "dep":
				return "แผนก";
				break;
			case "pos":
				return "ตำแหน่ง";
				break;
			case "salary":
				return "เงินเดือน";
				break;
			case "gender":
				return "เพศ";
				break;
			case "age":
				return "อายุ";
				break;
			case "birthDate":
				return "วันเกิด";
				break;
			case "reg_date":
				return "วันที่เข้าร่วมกิจกรรม";
				break;
			default:
				return "";
				break;
		}
	}
</script>

<?php
function module($path, $mod) {
	$path = "main/module/" . $path . "/" . $mod . ".php";

	if (file_exists($path)) {
		return	$path;
	} else {
		$path = "main/module/event/dashboard.php";
		return	$path;
	}
}

function chk_get_url($get_url) {
	if ($get_url != '') {
		$url_use = $get_url;
	} else {
	}
	return $url_use;
}
?>