LOAD DATA
INFILE 'librarians.csv'
INTO TABLE librarians
FIELDS TERMINATED BY "," OPTIONALLY ENCLOSED BY '"'
(librarianID, userID, accessLevel)
