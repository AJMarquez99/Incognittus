<?php

/*$servername = "localhost";
$username = "ajmarque_amarque";

$password = "t3mpPassword";

try {
    $conn = new PDO("mysql:host=$servername; dbname=ajmarque_incognittus", $username, $password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}*/


?>
<?php

class Database
{
    private static $DB_HOST = 'localhost';
    private static $DB_NAME = 'ajmarque_incognittus';
    private static $DB_USER = 'ajmarque_ajmarque';
    private static $DB_PASS = 't3mpPassword';

    static $conn = NULL;

    static function get_conn()
    {
        if (is_null(self::$conn)) {
            self::$conn = new PDO('mysql:host=' . self::$MYSQL_DB_ZEUS_HOST . ';charset=utf8;dbname=' . self::$MYSQL_DB_ZEUS_NAME, self::$MYSQL_DB_ZEUS_USER, self::$MYSQL_DB_ZEUS_PASS);
        }

        return self::$conn;
    }
}

