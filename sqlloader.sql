CREATE TABLE users {
    id char(240) primary key,
    userRole char(240)
};

CREATE TABLE librarians {
    
}

CREATE TABLE cardOwners {
    id char(240) primary key,
    phoneNum number,
    checkedBooks varray(5),
    outstandingFees number,
    ownerStatus char
};

CREATE TABLE items {
    bibnum char(240) primary key,
    title char(240),
    author char(240),
    isbn char(240),
    publicationYear number,
    publisher char(240),
    itemType varchar(6),
    genre char(240),
    itemLocation char(240),
    numCount number,
    itemStatus char
};