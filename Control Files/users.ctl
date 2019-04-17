LOAD DATA
INFILE 'users.ctl'
INSERT
INTO TABLE users
FIELDS TERMINATED BY "," OPTIONALLY ENCLOSED BY '"'
(id, firstName, lastName, phoneNum, email, userRole)
