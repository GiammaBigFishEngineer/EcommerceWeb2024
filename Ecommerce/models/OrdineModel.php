<?php

require_once('BaseModel.php');

class OrdineModel extends BaseModel
{
    public static string $nome_tabella = 'Ordine';
    
    protected array $_fields = [
        "id",
        "data",
        "prezzoTotale",
        "indirizzo_id"
    ];
   
}
