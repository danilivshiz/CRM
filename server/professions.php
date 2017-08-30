<?php

require_once ('BLL.php');

class professions  {
    private $id;
    private $name;



    function __construct ($name) {
            $this->name = $name;


            }


   public static function GetAllCustomers() {
    //    $DB = new connection();
    //    $DB = $DB->getDB();

    //     $professions = $DB->prepare('SELECT * FROM professions');
    //     $professions->execute();
    //     $professionsCount = $professions->rowCount();
    //     $i = 0;

    //         echo "[";
    //                 while ($row = $customers->fetch()) 
    //         {
    //             echo "{";

    //             echo  '"id":';
    //             echo $row["id"];
    //             echo ",";
                
    //             echo '"name":';
    //             echo '"';
    //             echo $row['name'];
    //             echo '"';


    //             echo "}";
    //             if ($professionsCount -1> $i)
    //                 echo ",";
    //             $i++;
    //         }

    //         echo "]";

        }

        

   }


