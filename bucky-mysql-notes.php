<?php
/*
tutotrial: https://www.youtube.com/watch?v=KgiCxe-ZW8o&list=PL32BC9C878BA72085
sql file: https://github.com/martiis/sample-db


NOTES
QUESTIONS
CODES
TO STUDY


NOTES
*****
DATABASE – collection of organize data of information using tables, columns, rows or indices or grid.
SQL – is a programming language for database
MySQL – frameworks for sql database (free)
QUERY - command or struction to the database
ASC - or ascending is default to mysql (no need to right)
- you can use also cmd in mysql
- when bought a server sql is already installed on it and everything is set-up

- Capital letter is the standard SQL command
- Spaces are ignore or no effect
- for advanced MYSQL study REGULAR EXPRESSIONS

TO STUDY
********
- view, sort
- create account

QUESTIONS
*********
auto insert date mysql
return only the highest number
SHOW
SELECT 
DISTINCT                      //wlay pariha
LIMIT                         //1-5 or 6-15 only (computer start at 0)
USING FULLY QUALIFIED NAMES
SORTING or ALPHABETICAL ORDER
DESC
FILTERING - WHERE, =, !, <, <=, BETWEEN, AND, OR
(id=1 OR id=2)                //this is use if you have multiple OR
IN meaning lives inside CA, NC and NY
NOT IN meaning do not lives in CA, NC and NY
SEARCH - LIKE, % is a wildcards that search anything LIKE word, character etc.
REGEXP or REGULAR EXPRESSIONS can search more complex patterns
SELECTING ONLY 1 letter or 1 character
OTHER KIND OF RESULT: Adams, NY or with comma
CONCAT meaning join columns together
AS is use to create new column name
MATH - you can minus number in the column like price
SQRT or square root of the price
AVG or average total of items data of the price
SUM or total of all bids of the price
COUNT all the name that has the id 6, seller_id is the name of the column of the price
SELECT AVG(cost) FROM items WHERE seller_id=6 of the price
UPPER - change data to upper letter
MAX and MIN
GROUP BY
SUBQUERIES or a query inside the query
JOIN TABLES - meaning i join ang mga columns sa lain lain nga tables
OUTER JOIN TABLE
UNION - used for complex filtering or seraching data
FULL TEXT SEARCHING - like google search and ranking searching, also faster searching
INSERT MULTIPLE ROWS
UPDATE and DELETE
VIEWS
CREATE
NOTE: id=1 integer has NO QOUTATION

CODES
*****
auto insert date mysql
----------------------
Type: TIMESTAMP, Default: CURRENT_TIMESTAMP then try to insert on mysql

- SHOW DATABASES or TABLES
- SHOW COLUMNS FROM customers

- SELECT city FROM customers;
- SELECT id FROM customers;
- SELECT city, zip FROM customers

- SELECT DISTINCT state FROM customers
- SELECT id, name FROM customers LIMIT 5          //this is start 1-5
- SELECT id, name FROM customers LIMIT 5, 10      //this is start 6-15

USING FULLY QUALIFIED NAMES
---------------------------
- SELECT customers.address FROM customers (same with)
- SELECT address FROM customers

SORTING or ALPHABETICAL ORDER
-----------------------------
- SELECT customers address FROM customers ORDER BY name
- SELECT state, city, name FROM customers ORDER BY state, name   //state and name are sorted order
- SELECT name, zip FROM customers ORDER BY zip DESC              //zip are sort descending
- SELECT name, id FROM customers ORDER BY id DESC LIMIT 1        //return only the highest number
- SELECT name FROM customers ORDER BY name LIMIT 1

FILTERING
---------
- SELECT id, name FROM customers WHERE id=54 or id!=54 or id < 8 or id <= 8
- SELECT id, name FROM customers WHERE id BETWEEN 25 AND 30                     //value within 25-30
- SELECT name, state FROM customers WHERE state='CA'                            //when finding character like CA

AND and OR
----------
SELECT name, state, city FROM customers WHERE state='CA' AND city='Hollywood'   //it will find the person who in CA and the city is hollywood
SELECT name, state, city FROM customers WHERE city='Boston' OR state='CA'       //naa siya sa boston pero wla siya sa CA or vice versa

NOTE: id=1 integer has NO QOUTATION
-----------------------------------
SELECT id, name, city FROM customers WHERE id=1 OR id=2 AND city='Raleigh'
SELECT id, name, city FROM customers WHERE (id=1 OR id=2) AND city='Raleigh'    //this will find only 1 data either 1 or 2 and live in Raleigh

if you use more OR, JUST use IN for simply
------------------------------------------
SELECT name, state FROM customers WHERE state IN ('CA','NC','NY') ORDER BY state          //IN meaning lives inside CA, NC and NY
SELECT name, state FROM customers WHERE state NOT IN ('CA','NC','NY') ORDER BY state      //NOT IN meaning do not lives in CA, NC and NY

SEARCH
------
//NOTE: % is a wildcards that search anything LIKE word, character etc.
SELECT name FROM items WHERE name LIKE'new%'                               //search all name start in new word
SELECT name FROM items WHERE name LIKE'%computer%'                         //wither start or end as long it has computer word
SELECT city FROM customers WHERE city LIKE'h%d'                            //search the word that start with h and ends with d

SELECTING ONLY 1 LETTER or CHARACTER
------------------------------------
SELECT name FROM items WHERE name LIKE '_ boxes of frogs'                  //OUTPUT: 3 boxes of frogs

REGEXP or REGULAR EXPRESSIONS can search more complex patterns
--------------------------------------------------------------
SELECT name FROM items WHERE name REGEXP 'new'                        //REGEXP meaning search for anything that has the word new
SELECT name FROM items WHERE name REGEXP '.boxes'                     // . meaning search anything with a second word boxes
SELECT name FROM items WHERE name REGEXP 'gold | car'                 //meaning search anything with a gold or car word
SELECT name FROM items WHERE name REGEXP '[12345] boxes of frogs'     //returns 1 boxes of frogs or returns 3 boxes of frogs or returns 5 boxes of frogs
SELECT name FROM items WHERE name REGEXP '[^12345] boxes of frogs'    //^ is negate that tells DO NOT search 12345 but 678 or 100 etc.
SELECT name FROM items WHERE name REGEXP '[1-5] boxes of frogs'       //search range from 1 to 5

FUNCTIONS
---------
//CONCAT meaning join columns together
SELECT CONCAT(city,',',state) FROM customers                     //OTHER KIND OF RESULT: Adams, NY
SELECT CONCAT(city,',',state) AS new_address FROM customers      //AS is use to create new column name

MATH
----
SELECT name, cost, cost- or + or / or * 1 AS sale_price FROM items    //this will minus the original price to 1 the and create new table name sale_price
SELECT name, UPPER(name) FROM customers                               //this will create new table and the data will change to CAPITAL LETTER

AGGREGATE FUNCTION
------------------
SELECT cost SQRT(cost) FROM items                 //SQRT or square root
SELECT AVG(cost) FROM items                       //AVG or average total of items data
SELECT SUM(bids) FROM items                       //SUM or total of all bids
SELECT COUNT(name) FROM items WHERE seller_id=6   //COUNT all the name that has the id 6, seller_id is the name of the column
SELECT AVG(cost) FROM items WHERE seller_id=6

MAX and MIN
-----------
SELECT COUNT(*) AS item_count, MAX(cost) AS max, AVG(cost) AS avg FROM items WHERE seller_id=12

GROUP BY
--------
SELECT seller_id, COUNT(*) AS item_count FROM items WHERE seller_id=1
SELECT seller_id, COUNT(*) AS item_count FROM items GROUP BY seller_id=1                       //seltler_id 1 has 2 item_count to sell
SELECT seller_id, COUNT(*) AS item_count FROM items GROUP BY seller_id HAVING COUNT(*)>=3
SELECT seller_id, COUNT(*) AS item_count FROM items GROUP BY seller_id HAVING COUNT(*)>=3 ORDER BY item_count DESC

SUBQUERIES or a query inside the query
--------------------------------------
SELECT name, cost FROM items WHERE cost>(
SELECT AVG(cost) FROM items                  //this is the subqueries
) ORDER BY cost DESC

SUBQUERIES(EX:1)
----------------
Simple query - SELECT seller_id FROM items WHERE name LIKE ‘boxes of frogs’

SUBQUERIES(EX:2)
----------------
Not sub query - SELECT name, MIN(cost) FROM items WHERE name LIKE ‘%boxes of frogs’ AND seller_id IN(68,6,18)

SUBQUERIES(EX:3)
----------------   
NOTE: EX2 and EX3 has the same result but EX3 is appropriate for using subqueries
Sub query - SELECT name, MIN(cost) FROM items WHERE name LIKE ‘%boxes of frogs’ AND seller_id IN(
		  SELECT seller_id FROM items WHERE name LIKE ‘boxes of frogs’
            )

JOIN TABLES - meaning i join ang mga columns sa lain lain nga tables
--------------------------------------------------------------------
//this is called FULLY QUALIFIED 
SELECT customer.id       //customer is table, id is column
       items.name        //items is table, name is column

EX:  SELECT customers.id, customers.name, items.name, items.cost
     FROM customers, items          //customers, items is different table
     WHERE customers.id=seller_id   //kong pariha si id and seller_id maoy i display
     ORDER BY customers.id          //ascending order

OUTER JOIN TABLE
----------------
//customers is the table, name is the column
//items is the table, name is the column

EX:  SELECT customers.name, items.name 
     FROM customers
     LEFT OUTER JOIN items
     ON customers.id=seller_id //ON meaning hows table related

UNION - used for complex filtering or seraching data
----------------------------------------------------
NOTE: - make sure SELECT data are the same when using UNION
      - also UNION remove authomatically duplicate data
      - use UNION ALL if you like not to remove duplicate data

EX:  SELECT name, cost, bids FROM items WHERE bids>190
     UNION or UNION ALL
     SELECT name, cost, bids FROM items WHERE cost>1000

FULL TEXT SEARCHING - like google search and ranking searching, also faster searching
-------------------------------------------------------------------------------------
//all first word baby will selected

EX1:  SELECT name, cost FROM items WHERE MATCH(name) Againts(‘baby’)

EX2:  +baby         //+ sign means that baby word is included in searching
      -cloat        //- sign means dont include this word        
      SELECT name, cost FROM items WHERE MATCH(name)  Againts(‘+baby -coat’ IN BOOLEAN MODE)

INSERT MULTIPLE ROWS
--------------------
INSERT INTO items(id, name, cost, seller_id, bids)
VALUES (‘104’,’beef chops’,’7.99’,’1’,’0’),
       (‘105’,’jelly pockets’,’4.50’,’1’,’0’),
       (‘106’,’sack of ham’,’9.95’,’1’,’0’)

UPDATE and DELETE
-----------------
NOTE : SET meaning CHANGE
UPDATE items SET name=’frog paste’, bids=66 WHERE id=106
DELETE FROM items WHERE id=106

CREATE TABLE
------------
CREATE TABLE users(
Id int,
Username varchar(30),
Password varchar(20),
PRIMARY KEY(id)
)

VIEWS
-----
a TEMPORARY table that holds the data from other table
or a view from other table and i t updates automatically
the icon kay dili pariha sa table

//create a tempoary table and name it mostbids unya ang
//ang sulod niya na data kay ang data ni SELECT
 
EX1:  CREATE VIEW mostbids AS
      SELECT id, name, bids FROM items ORDER BY bids DESC LIMIT 10

//Concat kay mo create siya og comma
//gi select niya si city and state pero gi display niya sa new created column na address

EX2:  SELECT Concat(city,',',state) AS address FROM users

EX3:  CREATE VIEW mailing AS
      SELECT Concat(city,',',state) AS address FROM users

EX4:  //pwede sd nimo ma select ang VIEW
      SELECT name, bids FROM mostbids




NOT INCLUDED IN THE TUTORIAL
----------------------------
Triggers
Cursors
Stored procedure
























*/
?>