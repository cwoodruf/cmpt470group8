CREATE TABLE Login(
	email VARCHAR(128) NOT NULL,
	password VARCHAR(64) NOT NULL,
	user_type VARCHAR(64) NOT NULL,
	external_key INT NOT NULL,
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT PK_Login PRIMARY KEY (email)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Volunteer(
	volunteerID INT NOT NULL AUTO_INCREMENT,
	name_first VARCHAR(64) NOT NULL,
	name_last VARCHAR(63) NOT NULL,
	phone VARCHAR(32),
	email VARCHAR(128) NOT NULL,
	status VARCHAR(32),
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT PK_Volunteer PRIMARY KEY (VolunteerID)	
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Organization(
	organizationID INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(128) NOT NULL,
	address TEXT,
	contact_name_first VARCHAR(64) NOT NULL,
	contact_name_last VARCHAR(64),
	contact_phone VARCHAR(32) NOT NULL,
	contact_email VARCHAR(128) NOT NULL,
	url VARCHAR(128) NOT NULL,
	visibility_status VARCHAR(32),
	description TEXT,
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT PK_Organization PRIMARY KEY (organizationID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Admin(
	adminID INT NOT NULL AUTO_INCREMENT,
	permissions VARCHAR(32) NOT NULL,
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT PK_Admin PRIMARY KEY(adminID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Job(
	jobID INT NOT NULL AUTO_INCREMENT,
	organizationID INT NOT NULL,
	search_text VARCHAR(255),
	title VARCHAR(64),
	time VARCHAR(128),
	street_address VARCHAR(255),
	city VARCHAR(64),
	country VARCHAR(32),
	description TEXT,
	url VARCHAR(128),
	visibility_status VARCHAR(32),
	requirements TEXT,
	created TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT PK_Job PRIMARY KEY (jobID),
	CONSTRAINT FK_Job_Organization FOREIGN KEY (organizationID)
		REFERENCES Organization(organizationID)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE Schedule(
	jobID INT NOT NULL,
	volunteerID INT NOT NULL,
	job_date DATETIME NOT NULL,
	start DATETIME,
	hours INT DEFAULT 0,
	hours_worked INT,
	CONSTRAINT PK_Schedule PRIMARY KEY (jobID, volunteerID, start),
	CONSTRAINT FK_Schedule_Job FOREIGN KEY (jobID) 
		REFERENCES Job (jobID),
	CONSTRAINT FK_Schedule_Volunteer FOREIGN KEY (volunteerID)
		REFERENCES Volunteer(volunteerID)	
)ENGINE=InnoDB DEFAULT CHARSET=utf8;
