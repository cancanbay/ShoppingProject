<?
require_once __DIR__ . "/db.php";

class Customer
{
    public $id;
    public $first_name;
    public $last_name;
    public $email;
    public $password;

    public static function listAll(){
        $sql="SELECT * FROM customers";
        $connection = DB::getConnection();
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Customer", NULL);

        return $statement->fetchAll();
    }

    /**
     * @param int $id
     * @return Customer[]
     */
    public static function getCustomerByid($id){
        $sql="SELECT * FROM customers WHERE id =:id";
        
        $connection = DB::getConnection();
        
        $statement = $connection->prepare($sql);
        $statement->bindValue(":id",$id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Customer", NULL);

        return $statement->fetchAll();

    }
    public static function insert($firstname, $lastname, $email, $password){
        $sql="INSERT INTO customers (first_name,last_name,email,password) VALUES (:firstname,:lastname,:email,:password)";
        
        $connection = DB::getConnection();
        
        $statement = $connection->prepare($sql);
        $statement->bindValue(":firstname",$firstname);
        $statement->bindValue(":lastname",$lastname);
        $statement->bindValue(":email",$email);
        $statement->bindValue(":password",$password);
        $statement->execute();
    }
    public static function getCustomerbyInfo($email,$password){
        $sql="SELECT * FROM customers WHERE email =:email AND password = :password";

        $connection = DB::getConnection();

        $statement = $connection->prepare($sql);
        $statement->bindValue(":email",$email);
        $statement->bindValue(":password",$password);

        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS,"Customer",NULL);

        return $statement->fetch();
    }

}

?>