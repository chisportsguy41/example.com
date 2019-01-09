CREATE TABLE users (
    id CHAR(36) PRIMARY KEY COMMENT 'Primary Key UUID',
    first_name VARCHAR(40) DEFAULT NULL COMMENT 'The users first name',
    last_name VARCHAR(40) DEFAULT NULL COMMENT 'The users last name',
    email VARCHAR(200) DEFAULT NULL COMMENT 'A unique identifier for a user',
    created DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'When the user was created',
    modified DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT 'When the user was last edited'
) ENGINE=INNODB;


INSERT INTO
  users
SET
  id=UUID(),
  first_name='Caleb',
  last_name='Nordgren',
  email='cdn841@gmail.com';

INSERT INTO
  users
SET
  id=UUID(),
  first_name='Your',
  last_name='Mom',
  email='your@mom.com';

SELECT * FROM users;

SELECT * FROM users WHERE email='cdn841@gmail.com';

SELECT
  first_name,
  last_name
FROM
  users
WHERE
  email='cdn841@gmail.com';

SELECT
  CONCAT(last_name, ', ', first_name) as Name
FROM
  users
WHERE
  email='cdn841@gmail.com';

SELECT
  first_name,
  last_name
FROM
  users
WHERE
  email LIKE '%.com'
ORDER BY last_name DESC;
