<script>
	function convertNameCol(name) {
		switch (name) {
			case "hn":
				return "HN";
				break;
			case "emp_id":
				return "รหัสพนักงาน/รหัสนักศึกษา";
				break;
			case "card_id":
				return "รหัสบัตรประชาชน";
				break;
			case "prefix":
				return "หมายเหตุ";
				break;
			case "name":
				return "ชื่อ";
				break;
			case "surname":
				return "นามสกุล";
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
			case "no":
				return "ลำดับที่";
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
			case "comment":
				return "หมายเหตุ";
				break;
			default:
				return "";
				break;
		}
	}

	function splitTitle(title) {
		let arr = title.split("{e}");
		if (arr.length == 0) return title;
		else return arr;
	}

	function convertTitle(title, reverse) {
		let text = "";
		if (reverse) text = String(title).replaceAll("{e}", "\n");
		else text = String(title).replaceAll("\n", "{e}");
		return text;
	}

	function viewTitle(title) {
		let text = String(title).replaceAll("{e}", " ");
		return text;
	}
</script>

<?php
function module($path, $mod)
{
	$path = "main/module/" . $path . "/" . $mod . ".php";

	if (file_exists($path)) {
		return	$path;
	} else {
		$path = "main/module/event/dashboard.php";
		return	$path;
	}
}

function chk_get_url($get_url)
{
	if ($get_url != '') {
		$url_use = $get_url;
	} else {
	}
	return $url_use;
}
?>