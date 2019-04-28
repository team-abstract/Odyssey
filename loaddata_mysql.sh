#!/bin/bash

read -p "Enter mysql user password: " passw

mysqlimport -u abstract -p$passw --local --ignore-lines=1 --fields-terminated-by=, odyssey users.csv

mysqlimport -u abstract -p$passw --local --ignore-lines=1 --fields-terminated-by=, odyssey librarians.csv

mysqlimport -u abstract -p$passw --local --ignore-lines=1 --fields-terminated-by=, odyssey items.csv

mysqlimport -u abstract -p$passw --local --ignore-lines=1 --fields-terminated-by=, odyssey cardOwners.csv
