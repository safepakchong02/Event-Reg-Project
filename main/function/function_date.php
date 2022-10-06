<script>
	// เพิ่ม 0 ลงไปในหลักหน่วย เมื่อเวลาน้อยกว่า 10 และ int convert to string
	function addZero(num) {
		if (num < 10) {
			return `0${num}`;
		} else {
			return `${num}`;
		}
	}

	// ลบ 0 ออกจากหลักหน่วย เมื่อเวลาน้อยกว่า 10 and string convert to int
	function delZero(str) {
		if (str.charAt(0) === "0") {
			// alert(parseInt(str.substr(1)));
			return parseInt(str.substr(1));
		} else {
			return parseInt(str);
		}
	}

	// แปลง JS default date format เป็น dd/mm/yyyy hh:mm(30/12/2022 00:00)
	function convertDate(str) {
		var out = new Date(str);

		out = addZero(out.getDate()) + "/" +
			addZero(out.getMonth() + 1) + "/" +
			addZero(out.getFullYear()) + " " +
			addZero(out.getHours()) + ":" +
			addZero(out.getMinutes());

		return out;
	} // end convertDate function

	// แปลง string date format เป็น object JS date // format คือ dd/mm/yyyy hh:mm(30/12/2022 00:00)
	function createDate(str) {
		if (str != "") {
			str = str.split(" ");
			var date = str[0].split("/");
			var time = str[1].split(":");

			var date_js = new Date(
				delZero(date[2]), // year
				(delZero(date[1]) - 1), // month
				delZero(date[0]), // day
				delZero(time[0]), // hour
				delZero(time[1]) // minutes
			)
			return date_js;
		} else {
			return str;
		}
	}
</script>