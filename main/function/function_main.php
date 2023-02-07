<script>
	function checkNull(str) {
		if (str === null) return true;
		else return false;
	}

	function boolArrayToLSB(boolArray) {
		let lsb = 0;
		for (let i = 0; i < boolArray.length; i++) {
			if (boolArray[i]) {
				lsb |= 1 << i;
			}
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
		if (checkNull(str)) return "";
		return str.replace(/[&<>"']/g, function(tag) {
			var charsToReplace = {
				'&': '&amp;',
				'<': '&lt;',
				'>': '&gt;',
				'"': '&quot;',
				"'": '&#39;'
			};
			return charsToReplace[tag] || tag;
		});
	}

	function decodeHTML(str) {
		if (checkNull(str)) return "";
		return str.replace(/&amp;|&lt;|&gt;|&quot;|&#39;/g, function(tag) {
			var charsToReplace = {
				'&amp;': '&',
				'&lt;': '<',
				'&gt;': '>',
				'&quot;': '"',
				'&#39;': "'"
			};
			return charsToReplace[tag] || tag;
		});
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