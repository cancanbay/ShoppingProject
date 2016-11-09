<?
require_once "../../Admin/models/product.php";
class CartItem{
    public $product;
    public $size;
    public $quantity;
    public $color;
}

class Cart {
    /**
     * @var CartItem[]
     */
    public $items;

    function __construct() {
        $this->items = [];
    }

    function add($product, $size, $quantity, $color) {
        $item = new CartItem();
        $item->product = $product;
        $item->size=$size;
        $item->quantity=$quantity;
        $item->color=$color;

        $this->items[] = $item;
    }

    function getTotal() {
        $totalprice=0;
        foreach($this->items as $item){
            $product = Product::get($item->product);
            $totalprice += ($product->price)*($item->quantity);
        }

        return $totalprice;
    }
}
?>