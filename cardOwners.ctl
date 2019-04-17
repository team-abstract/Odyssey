LOAD DATA
INFILE 'cardOwners.csv'
INSERT
INTO TABLE cardOwners
FIELDS TERMINATED BY "," OPTIONALLY ENCLOSED BY '"'
(cardownerid, userid, checkedbooks, itemonholdsid, outstandingfees, issuspended)

