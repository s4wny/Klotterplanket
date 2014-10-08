#CREATE DATABASE IF NOT EXISTS Klotter CHARACTER SET utf8;
#USE Klotter;

CREATE TABLE IF NOT EXISTS users (
	ID int(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	userName varchar(50) NOT NULL,
	password varchar(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS post (
	ID int(4) PRIMARY KEY NOT NULL AUTO_INCREMENT,
	user_ID int(4) NOT NULL,
	comment text NOT NULL,
	time_posted datetime NOT NULL
);

