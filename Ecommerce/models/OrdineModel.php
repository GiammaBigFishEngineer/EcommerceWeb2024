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

    /** @var ProductModel[] */
    public array $productsAssociated;
   
    public function setProducts() {
        $sql = "SELECT P.* FROM " . static::$nome_tabella . " O, ". ProductModel::$nome_tabella ." P, " . OrdineProductModel::$nome_tabella . " OP WHERE O.id = OP.idOrdine AND P.id = OP.idProduct AND O.id=:id";
        $sth = DB::get()->prepare($sql);
        $sth->execute([
            "id" => $this->id
        ]);
        $rows = $sth->fetchAll();
        $this->productsAssociated = $rows;
    }

}
