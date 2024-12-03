
-- Creazione tabella User
CREATE TABLE User (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nome VARCHAR(100),
    cognome VARCHAR(100),
    venditore BOOLEAN NOT NULL DEFAULT FALSE
);

-- Creazione tabella Notifiche
CREATE TABLE Notifiche (
    id INT AUTO_INCREMENT PRIMARY KEY,
    testo TEXT NOT NULL,
    data DATE NOT NULL,
    user_id INT,
    FOREIGN KEY (user_id) REFERENCES User(id) ON DELETE CASCADE
);

-- Creazione tabella Indirizzo
CREATE TABLE Indirizzo (
    id INT AUTO_INCREMENT PRIMARY KEY,
    via VARCHAR(255) NOT NULL,
    numero_civico INT NOT NULL,
    citta VARCHAR(100) NOT NULL,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES User(id) ON DELETE CASCADE,
    UNIQUE(user_id, via, numero_civico, citta) -- Chiave univoca
);


-- Creazione tabella Product
CREATE TABLE Product (
    id INT AUTO_INCREMENT PRIMARY KEY,
    UnitCost INT NOT NULL,
    name VARCHAR(255) NOT NULL,
    marca VARCHAR(100),
    descrizione TEXT,
    condizioni VARCHAR(50),
    imgPath1 VARCHAR(255),
    imgPath2 VARCHAR(255),
    imgPath3 VARCHAR(255)
);

-- Creazione tabella Ordine
CREATE TABLE Ordine (
    id INT AUTO_INCREMENT PRIMARY KEY,
    data DATE NOT NULL,
    prezzoTotale INT NOT NULL,
    nome VARCHAR(100),        
    cognome VARCHAR(100),     
    indirizzo VARCHAR(255),   
    user_id INT NULL,         
    FOREIGN KEY (user_id) REFERENCES User(id) ON DELETE SET NULL
);

-- Creazione del trigger per la tabella Ordine
DELIMITER $$

CREATE TRIGGER trg_check_order BEFORE INSERT ON Ordine
FOR EACH ROW
BEGIN
    -- Controllo: Se `user_id` è presente, `nome`, `cognome` e `indirizzo` devono essere NULL
    IF NEW.user_id IS NOT NULL AND (NEW.nome IS NOT NULL OR NEW.cognome IS NOT NULL OR NEW.indirizzo IS NOT NULL) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Se user_id è presente, nome, cognome e indirizzo devono essere NULL';
    END IF;

    -- Controllo: Se `user_id` è NULL, `nome`, `cognome` e `indirizzo` devono essere NON NULL
    IF NEW.user_id IS NULL AND (NEW.nome IS NULL OR NEW.cognome IS NULL OR NEW.indirizzo IS NULL) THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Se user_id è NULL, nome, cognome e indirizzo devono essere NON NULL';
    END IF;
END$$

DELIMITER ;


-- Creazione tabella ContenutoOrdine
CREATE TABLE ContenutoOrdine (
    idOrdine INT,
    idProduct INT,
    quantita INT NOT NULL,
    PRIMARY KEY (idOrdine, idProduct),
    FOREIGN KEY (idOrdine) REFERENCES Ordine(id) ON DELETE CASCADE,
    FOREIGN KEY (idProduct) REFERENCES Product(id) ON DELETE CASCADE
);
