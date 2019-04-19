-- As a librarian, put the book with bibnum 1988429 on hold for the card owner with ID 5662
UPDATE items SET itemStatus='H' WHERE bibnum=1988429; 
UPDATE cardOwners SET itemOnHoldID=1988429 WHERE cardOwnerID=5662;

-- As a librarian, get the first and last names and cardOwnerID of all users that are cardowners 
SELECT firstName, lastName, cardOwnerID FROM users, cardOwners 
WHERE id IN (SELECT userID FROM CardOwners);

-- As a librarian, select users that are card owners with the item 3177495 on hold
SELECT * FROM users
WHERE id = (SELECT userID FROM cardOwners WHERE itemOnHoldID=3177495);

-- Find the users that are librarians
SELECT id FROM users
INTERSECT
SELECT userid FROM librarians;

-- As a librarian, find the first and last names of card owners that have checked out books
SELECT firstName, lastName, id FROM users 
WHERE EXISTS (SELECT userID, cardownerID FROM cardOwners WHERE checkedBooks IS NOT NULL);

-- As a card owner, view the number of each book available with the word “Shakespeare" in the title
SELECT title, COUNT(*) FROM items 
WHERE title LIKE '%Shakespeare%'
GROUP BY title;

-- As a librarian, create a card owner user named John Smith with the phone number 2025550141 and email jsmith@gmail.com
INSERT INTO users
VALUES (98765, 'John', 'Smith', 2025550141, 'jsmith@gmail.com', 'Cardowner');

-- As a librarian, remove a registered card owner with ID #9928 from the library database
DELETE FROM cardOwners WHERE cardOwnerID=9928;

-- As a librarian, remove all card owners with an outstanding balance from the library database
DELETE FROM cardOwners WHERE outstandingFees > 0;

-- As a librarian, update Zak Hibbert’s email to zhibbert@yahoo.com
UPDATE users SET email='zhibbert@yahoo.com'
WHERE firstName='Zak' AND lastName='Hibbert';

-- As a librarian, suspend all card owners with an outstanding balance from renting out any books.
UPDATE cardOwners SET isSuspended='Y'
WHERE outstandingFees > 0;