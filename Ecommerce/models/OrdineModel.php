<?php

require_once('BaseModel.php');

class OrdineModel extends BaseModel
{
    public static string $nome_tabella = 'Ordine';
    
    protected array $_fields = [
        "id",
        "data",
        "prezzoTotale",
        "nome",
        "cognome",
        "email",
        "indirizzo",
        "citta",
        "user_id"
    ];
   
}
