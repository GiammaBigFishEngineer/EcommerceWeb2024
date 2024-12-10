<?php
require_once('BaseModel.php');

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
        "imgPath3",
        "vendor_id"
    ];
   
}
