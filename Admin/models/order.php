<?
require_once __DIR__ . "/db.php";

class Item {
    public $id;
    public $order;
    public $quantity;
    public $product;
    public $amount;
    public $size;
    public $color;
}

class Order {
    public $id;
    public $customer;
    public $address;
    public $state;
    public $date;
    public $sent_date;
    public $total_amount;

    /**
     * @param int $id
     * @return Order
     */
    public static function get($id){
        $sql="SELECT * FROM orders WHERE id = :id";

        $connection = DB::getConnection();
        $statement = $connection->prepare($sql);
        $statement->bindValue(":id",$id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Order", NULL);

        return $statement->fetch();
        
    }

    /**
     * @return Order[]
     */
    public static function listAll(){
        $sql="SELECT * FROM orders ORDER BY customer";
        $connection = DB::getConnection();
        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Order", NULL);

        return $statement->fetchAll();

    }

    /**
     * @param int $customer
     * @return Order[]
     */
    public static function findByCustomer($customer){
        $sql="SELECT * FROM orders WHERE customer = :customer ORDER BY id";

        $connection = DB::getConnection();

        $statement = $connection->prepare($sql);
        $statement->bindValue(":customer", $customer);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Order", NULL);

        return $statement->fetchAll();
    }

    /**
     * @return Item[];
     */
    public function getItems(){
        $sql='SELECT * FROM order_items WHERE "order" = :order';
        
        $connection=DB::getConnection();
        $statement = $connection->prepare($sql);
        $statement->bindValue(":order", $this->id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Item", NULL);
        
        return $statement->fetchAll();
    }

    public static function ship($id){
        $sql="UPDATE orders SET state = 2 where id= :id";

        $connection=DB::getConnection();
        $statement = $connection->prepare($sql);
        $statement->bindValue(":id", $id);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Item", NULL);

        return $statement->fetchAll();
    }

    public static function insert($customer, $address, $total_amount){
        $sql='INSERT INTO orders (customer, address, total_amount) VALUES (:customer, :address, :total_amount) RETURNING id';

        $connection=DB::getConnection();

        $statement = $connection->prepare($sql);
        $statement->bindValue(":customer",$customer);
        $statement->    bindValue(":address",$address);
        $statement->bindValue(":total_amount",$total_amount);
        $statement->execute();

        return $statement->fetch(PDO::FETCH_COLUMN);
    }

    public static function listbyState(){
        $sql="SELECT * FROM orders where state='1'";

        $connection = DB::getConnection();

        $statement = $connection->prepare($sql);
        $statement->execute();
        $statement->setFetchMode(PDO::FETCH_CLASS, "Order", NULL);

        return $statement->fetchAll();
    }

    public static function addOrderItems($order,$quantity,$product,$amount,$size,$color){
        $sql = 'INSERT INTO order_items ("order",quantity,product,amount,"size",color) VALUES (:order,:quantity,:product,:amount,:size,:color)';

        $connection = DB::getConnection();

        $statement = $connection->prepare($sql);
        $statement->bindValue(":order",$order);
        $statement->bindValue(":quantity",$quantity);
        $statement->bindValue(":product",$product);
        $statement->bindValue(":amount",$amount);
        $statement->bindValue(":size",$size);
        $statement->bindValue(":color",$color);
        $statement->execute();
    }
}
?>