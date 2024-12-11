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
    
    public static function getVendorOrder($vendor_id)
    {
        $query = "SELECT O.nome, O.cognome, O.indirizzo, O.citta,  FROM Product P, Ordine O, ContenutoOrdine PO WHERE vendor_id = :vendor_id";
        $stmt = self::getConnection()->prepare($query);
        $stmt->bindParam(':vendor_id', $vendor_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   
}
