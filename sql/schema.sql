# 

CREATE TABLE if not exists users (
    id int not null primary key auto_increment,
    fb_access_token int null,
    tw_access_token int null,
    tw_access_tooken_secret int null,
    email varchar(255) null,
    username varchar(255) unique not null,
    # password varchar(255) null,
    created datetime not null,
    modified datetime null
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE if not exists timelines (
    id int not null primary key auto_increment,
    user_id int not null,
    name int unique not null,
    created datetime not null,
    modified datetime null,
    FOREIGN KEY (`user_id`) REFERENCES `users`(`id`)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE if not exists timelines_facebooks(
    id int not null primary key auto_increment,
    timeline_id int not null,
    twitter_user_id int not null,
    created datetime not null,
    modified datetime null,
    FOREIGN KEY (`timeline_id`) REFERENCES timelines(id)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;

CREATE TABLE if not exists timelines_twitters(
    id int not null primary key auto_increment,
    timeline_id int not null,
    twitter_user_id int not null,
    created datetime not null,
    modified datetime null,
    FOREIGN KEY (`timeline_id`) REFERENCES timelines(id)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;

