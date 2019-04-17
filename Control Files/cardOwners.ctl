LOAD DATA
INFILE 'cardOwners.csv'
INSERT
INTO TABLE cardOwners
FIELDS TERMINATED BY "," OPTIONALLY ENCLOSED BY '"'
(cardOwnerID, userID, checkedBooks, itemOnHoldID, outstandingFees, isSuspended)

