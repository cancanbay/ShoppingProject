<?
require_once __DIR__ . "/db.php";

class Product {
    public $id;
    public $name;
    public $size;
    public $quantity;
    public $color;
    public $imageurl;
    public $price;
    public $category;
    public $gender;

    /**
     * @param int $id
     * @return Product|null
     */
    public static function get($id) {
        $sql = "SELECT * FROM giyim WHERE id = :id";
        $connection = DB::getConnection();
        $statement = $connection->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Product", NULL);

        return $statement->fetch();
    }

    /**
     * @return Product[]|
     */
    public static function listAll() {
        $sql = "SELECT * FROM giyim ORDER BY id";
        $connection = DB::getConnection();
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Product", NULL);

        return $statement->fetchAll();
    }
    public static function addProduct($name,$size,$quantity,$color,$imageurl,$price,$category,$gender){
        $sql = "INSERT INTO Giyim (name, size, quantity, color, imageurl,price,category,gender) VALUES (:name,:size,:quantity,:color,:imageurl,:price,:category,:gender)";
        $connection = DB::getConnection();
        $statement = $connection->prepare($sql);
        $statement->bindValue(":name",$name);
        $statement->bindValue(":size",$size);
        $statement->bindValue(":quantity",$quantity);
        $statement->bindValue(":color",$color);
        $statement->bindValue(":imageurl",$imageurl);
        $statement->bindValue(":price",$price);
        $statement->bindValue(":category",$category);
        $statement->bindValue(":gender",$gender);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS,"Product",NULL);
        
        return $statement->fetch();
    }

    public static function updateProduct($id,$name,$size,$quantity,$color,$imageurl,$price,$category,$gender){
        $sql = "UPDATE Giyim SET name = :name , size = :size , quantity = :quantity , color = :color , imageurl = :imageurl , price = :price, category = :category , gender = :gender WHERE id= :id";
        $connection = DB::getConnection();
        $statement = $connection->prepare($sql);
        $statement->bindValue(":name",$name);
        $statement->bindValue(":size",$size);
        $statement->bindValue(":quantity",$quantity);
        $statement->bindValue(":color",$color);
        $statement->bindValue(":imageurl",$imageurl);
        $statement->bindValue(":price",$price);
        $statement->bindValue(":category",$category);
        $statement->bindValue("gender",$gender);
        $statement->bindValue(":id",$id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS,"Product",NULL);

        return $statement->fetch();
    }
    public static function deleteProduct($id){
        $sql = "DELETE FROM Giyim WHERE id= :id";
        $connection = DB::getConnection();
        $statement = $connection->prepare($sql);
        $statement->bindValue(":id",$id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS,"Product",NULL);

        return $statement->fetch();

    }

    /**
     * @param $gender
     * @return Product[]
     */
    public static function listbyGender($gender){
        $sql = "SELECT * FROM Giyim WHERE gender = :gender";
        $connection = DB::getConnection();
        $statement = $connection->prepare($sql);
        $statement->bindValue(":gender",$gender);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS,"Product",NULL);

        return $statement->fetchAll();

    }
}
?>