
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


-- Creazione tabella ContenutoOrdine
CREATE TABLE ContenutoOrdine (
    idOrdine INT,
    idProduct INT,
    quantita INT NOT NULL,
    PRIMARY KEY (idOrdine, idProduct),
    FOREIGN KEY (idOrdine) REFERENCES Ordine(id) ON DELETE CASCADE,
    FOREIGN KEY (idProduct) REFERENCES Product(id) ON DELETE CASCADE
);


INSERT INTO User (email, password, nome, cognome, venditore)
VALUES 
('mario.rossi@example.com', 'password123', 'Mario', 'Rossi', FALSE),
('lucia.verdi@example.com', 'password456', 'Lucia', 'Verdi', TRUE),
('sofia.carli@example.com', 'password789', 'Sofia', 'Carli', TRUE),
('luca.neri@example.com', 'password321', 'Luca', 'Neri', FALSE),
('giulia.bianchi@example.com', 'password654', 'Giulia', 'Bianchi', TRUE);

INSERT INTO Notifiche (testo, data, user_id)
VALUES 
('Nuovo ordine ricevuto', '2024-12-01', 2),
('Prodotto aggiornato: Submariner', '2024-12-02', 3),
('Stock di Daytona rinnovato', '2024-12-03', 3),
('Modifica prezzo: Santos', '2024-12-04', 2);

INSERT INTO Indirizzo (via, numero_civico, citta, user_id)
VALUES 
('Via dei Tulipani', 4, 'Bologna', 1),
('Via Decio Raggi', 15, 'Milano', 2),
('Piazza XX Settembre', 10, 'Torino', 3),
('Via Carlo Magno', 20, 'Cosenza', 4),
('Via Roma', 45, 'Napoli', 5);

INSERT INTO Product (UnitCost, name, marca, descrizione, condizioni, imgPath1, imgPath2, imgPath3)
VALUES 
(13000, 'Submariner', 'Rolex', 'Orologio subacqueo di alta gamma', 'Ottime', 'submariner1.jpg', 'submariner2.jpg', 'submariner3.jpg'),
(15000, 'Daytona', 'Rolex', 'Cronografo classico', 'Nuovo', 'daytona1.jpg', 'daytona2.jpg', 'daytona3.jpg'),
(8000, 'Santos', 'Cartier', 'Orologio elegante', 'Nuovo', 'santos1.jpg', 'santos2.jpg', 'santos3.jpg'),
(40000, 'Nautilus', 'Patek Philippe', 'Orologio di lusso', 'Nuovo', 'nautilus1.jpg', 'nautilus2.jpg', 'nautilus3.jpg'),
(25000, 'Royal Oak', 'Audemars Piguet', 'Icona dell’alta orologeria', 'Ottime', 'royaloak1.jpg', 'royaloak2.jpg', 'royaloak3.jpg'),
(12000, 'Seamaster', 'Omega', 'Orologio per immersioni', 'Nuovo', 'seamaster1.jpg', 'seamaster2.jpg', 'seamaster3.jpg');

INSERT INTO Ordine (data, prezzoTotale)
VALUES 
('2024-12-01', 23000),
('2024-12-02', 15000),
('2024-12-03', 40000),
('2024-12-04', 37000),
('2024-12-05', 50000);

INSERT INTO Ordine (data, prezzoTotale, nome, cognome, indirizzo)
VALUES 
('2024-12-07', 15000, 'Alessandro', 'Rossi', 'Via Firenze 12, Roma');


INSERT INTO ContenutoOrdine (idOrdine, idProduct, quantita)
VALUES 
(1, 1, 1), -- Ordine #1, Prodotto Submariner, Quantità 1
(1, 2, 1), -- Ordine #1, Prodotto Daytona, Quantità 1
(2, 3, 2), -- Ordine #2, Prodotto Santos, Quantità 2
(3, 4, 1), -- Ordine #3, Prodotto Nautilus, Quantità 1
(4, 5, 1), -- Ordine #4, Prodotto Royal Oak, Quantità 1
(4, 2, 2), -- Ordine #4, Prodotto Daytona, Quantità 2
(5, 6, 2), -- Ordine #5, Prodotto Seamaster, Quantità 2
(5, 1, 1); -- Ordine #5, Prodotto Submariner, Quantità 1