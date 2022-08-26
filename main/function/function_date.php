<script>
	// แปลง JS default date format เป็น dd/mm/yyyy hh:mm(30/12/2022 00:00)
	function convertDate(str) {
		var out = new Date(str);

		out = out.getDate() + "/" +
			out.getMonth() + "/" +
			out.getFullYear() + " " +
			out.getHours() + ":" +
			out.getMinutes();

		return out;
	} // end convertDate function

	// แปลง string date format เป็น object JS date // format คือ dd/mm/yyyy hh:mm(30/12/2022 00:00)
	function createDate(str) {
		str = str.split(" ");
		var date = str[0].split("/");
		var time = str[1].split(":");

		var date_js = new Date(
			parseInt(date[2]), // year
			parseInt(date[1]), // month
			parseInt(date[0]), // day
			parseInt(time[0]), // hour
			parseInt(time[1])  // minutes
		)
		return date_js;
	}
</script>