CREATE TABLE IF NOT EXISTS schedule
(
    id       VARCHAR(255) NOT NULL,
    user_id  VARCHAR(255) NOT NULL,
    date     VARCHAR(255) NOT NULL,
    title    VARCHAR(255) NOT NULL,
    activity VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (username),
    PRIMARY KEY (id)
);