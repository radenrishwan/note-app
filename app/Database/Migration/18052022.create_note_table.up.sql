create table if not exists note
(
    id       varchar(255) not null,
    user_id  varchar(255) not null,
    title    varchar(255) not null,
    subtitle varchar(255) not null,
    body     text         not null,
    image    text         not null,
    tag      varchar(255) not null,
    FOREIGN KEY (user_id) REFERENCES users (username),
    primary key (id)
);
