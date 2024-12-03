<?php
require_once(__ROOT__ . '/vendor/autoload.php');
require_once(__ROOT__ . '/config/DB.php');


require_once('BaseModel.php');

use CodeInc\StripAccents\StripAccents;

class ProductModel extends BaseModel
{
    public static string $nome_tabella = 'Product';
    
    protected array $_fields = [
        "id",
        "unitCost",
        "name",
        "marca",
        "descrizione",
        "condizioni",
        "imgPath1",
        "imgPath2",
        "imgPath3"
    ];
   
}
