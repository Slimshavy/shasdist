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
    lastupdateuserid        INT NOT NULL COMMENT 'CONSTRAINT FOREIGN KEY (lastupdateuserid) REFERENCES users(id)',
    ispublic 		    BIT NOT NULL DEFAULT 0
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

INSERT INTO mesechtos (nameenglish, namehebrew,dafcount, lettercount, wordcount, avglettersperdaf, avgwordsperdaf) VALUES
('Berachos','ברכות',63,273260,70254,4337.46,1115.14),
('Kerisos','כריתות',27,102234,26328,3786.44,975.11),
('Horiyos','הוריות',13,49035,12632,3771.92,971.69),
('Megilah','מגילה',31,115271,28939,3718.42,933.52),
('Sanhedrin','סנהדרין',112,406013,104357,3625.12,931.76),
('Ta''anis','תענית',30,106087,26691,3536.23,889.7),
('Moed Katan','מועד קטן',28,89722,22554,3204.36,805.5),
('Sota','סוטה',48,152615,39149,3179.48,815.6),
('Erchin','ערכין',33,98096,24815,2972.61,751.97),
('Makos','מכות',23,67782,17608,2947.04,765.57),
('Shabbos','שבת',156,447232,113820,2866.87,729.62),
('Kidushin','קידושין',81,231631,59256,2859.64,731.56),
('Chagigah','חגיגה',26,73506,18533,2827.15,712.81),
('Bava Metzia','בבא מציעא',118,330417,84375,2800.14,715.04),
('Bava Kama','בבא קמא',118,328313,83973,2782.31,711.64),
('Avodah Zarah','עבודה זרה',75,207188,51851,2762.51,691.35),
('Temurah','תמורה',33,91112,23065,2760.97,698.94),
('Nidah','נידה',72,197171,50118,2738.49,696.08),
('Yevamos','יבמות',121,330319,84486,2729.91,698.23),
('Rosh Hashanah','ראש השנה',34,92621,23376,2724.15,687.53),
('Pesachim','פסחים',120,324521,82335,2704.34,686.13),
('Gitin','גיטין',89,238946,60832,2684.79,683.51),
('Bechoros','בכורות',60,160117,40587,2668.62,676.45),
('Shevuos','שבועות',48,127686,32717,2660.13,681.6),
('Menachos','מנחות',109,288694,73203,2648.57,671.59),
('Kesuvos','כתובות',111,288903,73398,2602.73,661.24),
('Yuma','יומא',87,225512,57180,2592.09,657.24),
('Eruvin','עירובין',104,264202,67238,2540.4,646.52),
('Betzah','ביצה',39,97777,24918,2507.1,638.92),
('Chulin','חולין',141,351691,89555,2494.26,635.14),
('Sukkah','סוכה',55,127774,32302,2323.16,587.31),
('Zevachim','זבחים',119,273681,69345,2299.84,582.73),
('Tamid','תמיד',9,18449,4610,2049.89,512.22),
('Bava Basra','בבא בתרא',175,346249,89044,1978.57,508.82),
('Nazir','נזיר',65,108571,27984,1670.32,430.52),
('Me''ilah','מעילה',21,32255,8064,1535.95,384),
('Nedarim','נדרים',90,134935,34475,1499.28,383.06);
