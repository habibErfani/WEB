DROP SCHEMA new_bd CASCADE;
CREATE SCHEMA new_bd;
SET search_path TO new_bd;

CREATE TABLE items(
    Id INT PRIMARY KEY,
    Desctription VARCHAR(50) NOT NULL
    );
insert into  items (Id, Desctription) VALUES
                                          (1,'Ceci est le numero un'),
                                          (2,'Ceci est le numero deux'),
                                          (3,'Ceci est le numero trois'),
                                          (4,'Ceci est le numero quatre'),
                                          (5,'Ceci est le numero cinq'),
                                          (6,'Ceci est le numero six'),
                                          (7,'Ceci est le numero sept'),
                                          (8,'Ceci est le numero huit');         
                                          
