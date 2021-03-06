CREATE TABLE users (
    id int primary key,
    firstName char(20),
    lastName char(20),
    phoneNum int,
    email char(30),
    userRole char(11),
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE librarians (
    librarianID int primary key,
    userID int REFERENCES users(id),
    accessLevel char(13)
);

CREATE TABLE items (
    bibnum int primary key,
    title char(240),
    author char(240),
    isbn char(240),
    publicationYear int,
    publisher char(240),
    itemType varchar(7),
    genre char(240),
    itemLocation char(240),
    numCount int,
    itemStatus char
);

CREATE TABLE cardOwners (
    cardOwnerID int primary key,
    userID int REFERENCES users(id),
    itemOnHoldID int REFERENCES items(bibnum),
    outstandingFees int,
    isSuspended char
);

CREATE TABLE checkedBooks (
    cardOwnerID int,
    bibnum int,
    PRIMARY KEY (cardOwnerID, bibnum)
);
