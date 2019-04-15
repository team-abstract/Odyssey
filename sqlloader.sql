CREATE TABLE users (
    id int primary key,
    firstName char(100),
    lastName char(100),
    phoneNum int,
    email char(100),
    userRole char(11)
);

CREATE TABLE librarians (
    librarianID int primary key,
    userID int;
    FOREIGN KEY (userID) REFERENCES users(id),
    accessLevel char(10)
);

CREATE TABLE cardOwners (
    cardOwnerID int primary key,
    userID int FOREIGN KEY REFERENCES users(id),
    checkedBooks varray(5),
    itemOnHoldID int FOREIGN KEY REFERENCES items(bibnum),
    outstandingFees int,
    isSuspended boolean
);

CREATE TABLE items (
    bibnum char(100) primary key,
    title char(240),
    author char(240),
    isbn char(240),
    publicationYear int,
    publisher char(240),
    itemType varchar(6),
    genre char(240),
    itemLocation char(240),
    numCount int,
    itemStatus char
);