<?
@session_start();
$_SESSION['db_select'] = "prj65_16";
$_SESSION['hostname'] = "localhost";
$_SESSION['user'] = "root";
$_SESSION['passwd'] = "";

// เชื่อมต่อ DB
$handle = mysqli_connect($_SESSION['hostname'], $_SESSION['user'], $_SESSION['passwd'], $_SESSION['db_select']) or die("connect to database fail");

/* check connection */
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

/* change character set to utf8 */
if (!$handle->set_charset("utf8")) {
    printf("Error loading character set utf8: %s\n", $handle->error);
    exit();
} else {
    //   printf("Current character set: %s\n", $handle->character_set_name());
}

?>