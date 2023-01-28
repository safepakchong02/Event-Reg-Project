<?
    function connectDb(){
        $handler = null;
        $db = "prj65_16";
        $host = "localhost";
        $user = "root";
        $password = "";
        try {
            $handler = new PDO("mysql:host=$host;dbname=$db", $user, $password);
            $handler->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $handler->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            if (!$handler) {
                echo "Failed to connect to MySQL: " . $handler->errorInfo();
            }
        }
        catch (PDOException $e) {

        }
        return $handler;
    }

?>