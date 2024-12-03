
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

INSERT INTO Ordine (data, prezzoTotale, indirizzo_id)
VALUES 
('2024-12-01', 23000, 1),
('2024-12-02', 15000, 2),
('2024-12-03', 40000, 3),
('2024-12-04', 37000, 4),
('2024-12-05', 50000, 5);

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



