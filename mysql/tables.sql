
CREATE DATABASE IF NOT EXISTS limbo;
USE limbo;
DROP TABLE IF EXISTS lost;
DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS found1;
CREATE TABLE lost (
	id int UNIQUE AUTO_INCREMENT,
	fname TEXT NOT NULL,
	lname TEXT NOT NULL,
	email TEXT NOT NULL,
	phone TEXT NOT NULL,
	name TEXT,
	color TEXT,
	make TEXT,
	model TEXT,
	sizes TEXT,
	info TEXT,
	location TEXT NOT NULL,
	status SET (
	'lost',
	'claimed'
	),
	dateLost DATE,
	dateSubmitted DATE
);
CREATE TABLE found1 (
	id int UNIQUE AUTO_INCREMENT,
	fname TEXT NOT NULL,
	lname TEXT NOT NULL,
	email TEXT NOT NULL,
	phone TEXT NOT NULL,
	name TEXT,
	color TEXT,
	make TEXT,
	model TEXT,
	sizes TEXT,
	info TEXT,
	location TEXT NOT NULL,
	status SET ('found','claimed'), 
	dateFound DATE,
	dateSubmitted DATE
);
CREATE TABLE users (
	id int UNIQUE AUTO_INCREMENT PRIMARY KEY,
	username TEXT NOT NULL,
	password TEXT NOT NULL
);