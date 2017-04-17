CREATE SCHEMA Library;
USE Library;

DROP TABLE IF EXISTS BOOK;
CREATE TABLE BOOK (
  isbn       char(13)  NOT NULL,
  title      VARCHAR(25) NOT NULL,
  CONSTRAINT pk_book PRIMARY KEY (isbn)
);

DROP TABLE IF EXISTS AUTHORS;
CREATE TABLE AUTHORS (
  author_id    INT      NOT NULL,
  name      VARCHAR(25) NOT NULL,
  CONSTRAINT pk_authors PRIMARY KEY (author_id)
);
DROP TABLE IF EXISTS BORROWER;
CREATE TABLE BORROWER (
  card_id    INT      NOT NULL, 
  ssn     	 CHAR(9),
  fname      VARCHAR(25) NOT NULL,
  lname      VARCHAR(25) NOT NULL,
  address  VARCHAR(50),
  phone INT(10),
  CONSTRAINT pk_borrower PRIMARY KEY (card_id),
  CONSTRAINT uk_ssn UNIQUE (ssn) 
);

DROP TABLE IF EXISTS FINES;
CREATE TABLE FINES (
  loan_id    INT      NOT NULL,
  fine_amt	 FLOAT,	
  paid	BOOLEAN,
  CONSTRAINT pk_fines PRIMARY KEY (loan_id)
);	

DROP TABLE IF EXISTS BOOK_AUTHORS;
CREATE TABLE BOOK_AUTHORS (
  author_id    INT      NOT NULL,
  isbn      char(13) NOT NULL,
  CONSTRAINT pk_authors PRIMARY KEY (author_id,isbn),
  CONSTRAINT fk_book_authors_id FOREIGN KEY (author_id) REFERENCES AUTHORS(author_id),
  CONSTRAINT fk_book_authors_isbn FOREIGN KEY (isbn) REFERENCES BOOK(isbn)
);

DROP TABLE IF EXISTS BOOK_LOANS;
CREATE TABLE BOOK_LOANS (
  loan_id    INT      NOT NULL,
  isbn	 	char(13) 	 NOT NULL,
  card_id	INT      NOT NULL,
  date_out	DATE ,
  due_date	DATE,
  date_in	DATE,
  CONSTRAINT pk_book_loans PRIMARY KEY (loan_id),
  CONSTRAINT fk_book_loans_id FOREIGN KEY (author_id) REFERENCES AUTHORS(author_id),
  CONSTRAINT fk_book_loans_isbn FOREIGN KEY (isbn) REFERENCES BOOK(isbn),
  CONSTRAINT fk_book_loans_card_id FOREIGN KEY (card_id) REFERENCES BORROWER(card_id)
);