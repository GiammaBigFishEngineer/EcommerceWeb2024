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
    
    public static function getVendorOrders($vendor_id)
    {
        $query = "SELECT O.nome, O.cognome, O.indirizzo, O.citta, O.codiceOrdine,
         P.name AS nomeProdotto, PO.quantita, (P.unitCost * PO.quantita) AS totaleCosto
          FROM Product P, Ordine O, ContenutoOrdine PO 
          WHERE P.vendor_id = :vendor_id
          AND O.id = PO.idOrdine AND P.id = PO.idProduct";
        $stmt = DB::get()->prepare($query);
        $stmt->bindParam(':vendor_id', $vendor_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
   
}
