LOAD DATA
INFILE 'records2.csv'
INSERT
INTO TABLE items
FIELDS TERMINATED BY "," OPTIONALLY ENCLOSED BY '"'
(bibnum, title, author, isbn, publicationYear, publisher, itemType, genre, itemLocation, numCount, itemStatus)