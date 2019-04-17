LOAD DATA
INFILE 'librarias.csv'
INTO TABLE librarians
FIELDS TERMINATED BY "," OPTIONALLY ENCLOSED BY '"'
(librarianid, userid, accesslevel)
