use shasdist;

DROP TABLE IF EXISTS users;
CREATE TABLE users
(
    id                      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    thelogin                VARCHAR(128) NOT NULL UNIQUE,
    thepass                 VARCHAR(128) NOT NULL,
    theemail                VARCHAR(128) NOT NULL,
    firstname               VARCHAR(128) NOT NULL,
    usertypeid              TINYINT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (usertypeid) REFERENCES usertype(id)',
    lastname                VARCHAR(128) NOT NULL,
    cellphone               VARCHAR(10) NULL,
    homephone               VARCHAR(10) NULL,
    registrationdate        DATETIME NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    auth_key		    VARCHAR(128) NOT NULL,
    lastupdateuserid        INT NULL COMMENT 'CONSTRAINT FOREIGN KEY (lastupdateuserid) REFERENCES users(id)'
);

DROP TABLE IF EXISTS distributionprofiles;
CREATE TABLE distributionprofiles (
    id                      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    profilename             VARCHAR(128) NULL UNIQUE,
    header		    VARCHAR(128) NOT NULL,
    description             VARCHAR(1000) NOT NULL,
    starttime      	    DATETIME NULL,
    endtime        	    DATETIME NOT NULL,
    actualendtime           DATETIME NULL,
    multiplier		    TINYINT NOT NULL,
    finishbeforemultiplying BIT NOT NULL DEFAULT 0,
    requireconfirmation     BIT NOT NULL DEFAULT 0,
    profilephoto            VARCHAR(128) NOT NULL DEFAULT 'default-profile.jpg',
    creatoruserid	    INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (creatoruserid) REFERENCES users(id)',
    createdate              DATETIME NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (lastupdateuserid) REFERENCES users(id)'
);

DROP TABLE IF EXISTS distributionadmins;
CREATE TABLE distributionadmins (
    userid                  INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (userid) REFERENCES users(id)',
    distributionprofileid   INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (distributionprofileid) REFERENCES distributionprofile(id)',
    PRIMARY KEY (userid, distributionprofileid),
    creatoruserid	    INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (creatoruserid) REFERENCES users(id)',
    createdate              DATETIME NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (lastupdateuserid) REFERENCES users(id)'
);

DROP TABLE IF EXISTS distributionlearners;
CREATE TABLE distributionlearners (
    id                      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    userid                  INT NULL COMMENT 'CONSTRAINT FOREIGN KEY (userid) REFERENCES users(id)',
    distributionprofileid   INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (distributionprofileid) REFERENCES distributionprofile(id)',
    creatoruserid	    INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (creatoruserid) REFERENCES users(id)',
    mesechtaid              INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (creatoruserid) REFERENCES users(id)',
    completenumber          INT NOT NULL,
    createdate              DATETIME NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (lastupdateuserid) REFERENCES users(id)',
    endtime                 DATETIME NULL
);

DROP TABLE IF EXISTS mesechtos;
CREATE TABLE mesechtos (
    id                      INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    nameenglish             VARCHAR(128) NOT NULL UNIQUE,
    namehebrew              VARCHAR(128) NOT NULL UNIQUE,
    dafcount		    INT NOT NULL,
    lettercount		    INT NOT NULL, 
    wordcount		    INT NOT NULL, 
    avglettersperdaf	    FLOAT NOT NULL, 
    avgwordsperdaf	    FLOAT NOT NULL
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;


DROP TABLE IF EXISTS usertype;
CREATE TABLE usertype (
    id                      INT NOT NULL PRIMARY KEY,
    usertype                VARCHAR(255),
    createdate              DATETIME NOT NULL,
    lastupdatedate          DATETIME NOT NULL,
    lastupdateuserid        INT NOT NULL
);

INSERT INTO users ( thelogin, thepass, theemail, firstname, lastname, usertypeid, cellphone, homephone, auth_key) 
    VALUES ('admin', 'admin99', 'admin@mailnator.com', 'Shavy','Yarmush', 0, '3472280777', '7187745616', 'DQSHDwkd77eDJWi0201');

INSERT INTO users ( thelogin, thepass, theemail, firstname, lastname, usertypeid, cellphone, homephone)
    VALUES ('mushky', 'Mushk12', 'mushky@mailnator.com', 'Mushky','Niasoff', 2, '3472769282', 3472280777);

INSERT INTO users ( thelogin, thepass, theemail, firstname, lastname, usertypeid, cellphone, homephone, auth_key)
    VALUES ('berele', 'Berel12', 'berele@mailnator.com', 'Berel','Yarmush', 1,'7184737926','', 'asdasdadss238e747hrf73h8ff3');

INSERT INTO users ( theemail, firstname, lastname, usertypeid, cellphone, homephone)
    VALUES ('rosie@mailnator.com', 'Rosie','Kapel', 2, '1234567890','');

INSERT INTO usertype (id, usertype)
    VALUES  (0,'System Admin'),
            (1,'Distribution Profile Admin'),
            (2,'Learner');

INSERT INTO mesechtos (nameenglish, namehebrew, dafcount) VALUES ('m1','m1',100),('m2','m2',100),('m3','m3',100),('m4','m4',100),('m5','m5',100),('m6','m6',100),('m7','m7',100),('m8','m8',100),('m9','m9',100),('m12','m12',100),('m14','m14',100),('m16','m16',100),('m18','m18',100),('m20','m20',100),('m21','m21',100),('m23','m23',100),('m10','m10',100),('m26','m26',100),('m11','m11',100),('m13','m13',100),('m15','m15',100),('m17','m17',100),('m19','m19',100),('m22','m22',100),('m25','m25',100),('m24','m24',100);

INSERT INTO mesechtos (nameenglish, namehebrew,dafcount, lettercount, wordcount, avglettersperdaf, avgwordsperdaf) VALUES('brochos','ברכות',63,273260,70254,4337.46,1115.14);
INSERT INTO mesechtos (nameenglish, namehebrew,dafcount, lettercount, wordcount, avglettersperdaf, avgwordsperdaf) VALUES('krisos','כריתות',27,102234,26328,3786.44,975.11);
