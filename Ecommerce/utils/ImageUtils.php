<?php

function uploadProductImages($id) {
    // Verifica se l'id è valido
    if (empty($id) || !is_numeric($id)) {
        throw new Exception("ID non valido");
    }

    // Percorso della cartella dove salvare le immagini
    $baseDir = __ROOT__ . '/product_images';
    $targetDir = $baseDir . '/' . $id;

    // Crea la cartella se non esiste
    if (!is_dir($targetDir)) {
        if (!mkdir($targetDir, 0777, true)) {
            throw new Exception("Impossibile creare la cartella: $targetDir");
        }
    }

    // Elenco dei campi input del form per le immagini
    $imageFields = ['img1', 'img2', 'img3'];
    $uploadedFiles = [];

    foreach ($imageFields as $field) {
        // Controlla se l'immagine è stata caricata
        if (isset($_FILES[$field]) && $_FILES[$field]['error'] === UPLOAD_ERR_OK) {
            $tmpName = $_FILES[$field]['tmp_name'];
            $fileName = basename($_FILES[$field]['name']);
            $targetFile = $targetDir . '/' . $fileName;

            // Sposta il file caricato nella cartella di destinazione
            if (move_uploaded_file($tmpName, $targetFile)) {
                $uploadedFiles[] = $targetFile;
            } else {
                throw new Exception("Errore durante il caricamento dell'immagine: $field");
            }
        }
    }

    // Restituisci un array con i percorsi dei file caricati
    return $uploadedFiles;
}