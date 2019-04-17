LOAD DATA
INFILE 'users.csv'
INSERT
INTO TABLE users
FIELDS TERMINATED BY "," OPTIONALLY ENCLOSED BY '"'
(id, firstName, lastName, phoneNum, email, userRole)
