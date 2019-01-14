CREATE TABLE webforms (
    id CHAR(36) PRIMARY KEY COMMENT 'Primary Key UUID',
    name VARCHAR(255) COMMENT 'The name of the sender',
    body TEXT COMMENT 'The content of the email',
    email VARCHAR(200) COMMENT 'The replyto email',
    created DATETIME DEFAULT CURRENT_TIMESTAMP COMMENT 'When the post was created',
) ENGINE=INNODB;
