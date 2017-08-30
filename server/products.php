<?php

require_once ('BLL.php');

class products  {
    private $id;
    private $product_name;

    public static $table_name = 'products';



    function __construct ($product_name) {
            $this->product_name = $product_name;


            }


   public static function GetAllCustomers() {

        $products = $DB->prepare('SELECT * FROM products');
        $products->execute();
        $productsCount = $products->rowCount();
        $i = 0;

            echo "[";
                    while ($row = $customers->fetch()) 
            {
                echo "{";

                echo  '"id":';
                echo $row["id"];
                echo ",";
                
                echo '"product_name":';
                echo '"';
                echo $row['product_name'];
                echo '"';


                echo "}";
                if ($productsCount -1> $i)
                    echo ",";
                $i++;
            }

            echo "]";

        }



// Get products and return a select
   public static function GetProductsSelect() {
        $productsList =  BusinessLogicLayer::SelectAllFromTable(self::$table_name);
        $productSelect="";
    for ($i = 0; $i < count($productsList); $i++) {
             $productSelect .= "<option value=" . $productsList[$i]["id"] . "'>" . $productsList[$i]["product_name"] . "</option>";
                }

        

        return $productSelect; 
    }



   }


