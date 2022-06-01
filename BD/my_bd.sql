DROP SCHEMA new_bd CASCADE;
CREATE SCHEMA new_bd;
SET search_path TO new_bd;

CREATE TABLE items(
                      Id INT PRIMARY KEY,
                      Desctription VARCHAR(50) NOT NULL,
                      Ville VARCHAR (20) NOT NULL,
                      Quantity INT NOT NULL,
                      Price FLOAT
);
insert into  items (Id, Desctription, Ville, Quantity, Price) VALUES
                                                                  (1, 'Welcome to Paris','Paris',5, 13.05),
                                                                  (2, 'Welcome to Lyon','Lyon',12, 10.0),
                                                                  (3, 'Welcome to Arras','Arras',3, 6.60),
                                                                  (4, 'Welcome to Lens','Lens',2, 5.22),
                                                                  (5, 'Welcome to Lille','Lille',5, 12.22),
                                                                  (6, 'Welcome to Lievin','Lievin',2, 10.3),
                                                                  (7, 'Welcome to Calais','Calais',3, 1.66);
