<script>
	function checkNull(str) {
		if (str.length === 0) return true;
		else return false;
	}

	function boolArrayToLSB(boolArray) {
		let lsb = "";
		for (let i = 0; i < boolArray.length; i++) {
			if (boolArray[i] && boolArray[i] !== null) lsb = "1" + lsb;
			else lsb = "0" + lsb;
		}
		return lsb;
	}

	function LSBToBoolArray(lsb) {
		let boolArray = [];
		let index = 0;
		while (lsb > 0) {
			boolArray[index] = lsb % 2 === 1;
			lsb = Math.floor(lsb / 2);
			index++;
		}
		return boolArray;
	}

	function encodeHTML(str) {
		// if (checkNull(str)) return "";
		return str.replace(/[&<>"']/g, function(tag) {
			var charsToReplace = {
				'--': '--amp;',
				'<': '--lt;',
				'>': '--gt;',
				'"': '--quot;',
				"'": '--#39;'
			};
			return charsToReplace[tag] || tag;
		});
	}

	function decodeHTML(str) {
		if (checkNull(str)) return "";
		return str.replace(/--amp;|--lt;|--gt;|--quot;|--#39;/g, function(tag) {
			var charsToReplace = {
				'--amp;': '&',
				'--lt;': '<',
				'--gt;': '>',
				'--quot;': '"',
				'--#39;': "'"
			};
			return charsToReplace[tag] || tag;
		});
	}

	function setEventStatus(arrEvent) {
		let newArr = [];
		let now = new Date();

		for (let i = 0; i < arrEvent.length; i++) {
			let data_event = {};
			data_event = arrEvent[i];
			let date_st = createDate(data_event.ev_checkInStart);
			let date_ed = createDate(data_event.ev_checkInEnd);

			if (now < date_st) data_event["ev_checkInState"] = "color-warning";
			else if (now > date_st && now < date_ed) data_event["ev_checkInState"] = "color-success";
			else data_event["ev_checkInState"] = "color-danger";

			newArr.push(data_event);
		}

		return newArr;
	}

	function intToBool(int) {
		return int == 1 ? true : false
	}

	function boolToInt(bool) {
		return bool == true ? 1 : 0;
	}

	function filterList(selector, state) {
		document.querySelectorAll(selector).forEach((element) => {
			if (state) element.classList.remove("ng-hide");
			else element.classList.add("ng-hide");
		})
	}
</script>

<?php
function module($path, $mod)
{
	$path = "main/module/" . $path . "/" . $mod . ".php";

	if (file_exists($path)) {
		return	$path;
	} else {
		$path = $_SESSION["default_path"];
		return	$path;
	}
}

function chk_get_url($get_url)
{
	if ($get_url != '') $url_use = $get_url;
	return $url_use;
}
?>