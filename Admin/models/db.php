<?
class DB {
    private static $connection = NULL;

    /**
     * @return PDO
     */
    public static function getConnection() {
        if(!self::$connection) {
            self::$connection = new PDO("pgsql:host=localhost;dbname=Giyim", "postgres", "postgres");
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$connection;
    }
}
?>