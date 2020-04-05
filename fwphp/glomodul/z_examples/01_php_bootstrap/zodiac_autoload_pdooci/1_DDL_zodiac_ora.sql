-- J:\awww\apl\dev1\zz30GB\ddl\1_DDL_zodiac_ora.sql

--SELECT * FROM message ;
--select * from zodiac ;

-- oracle :  C:\Windows\SysWOW64\cmd.exe or
-- winkey+X -> Comm.prompt admin
-- C:
-- cd C:\oraclexe\app\oracle\product\11.2.0\server\bin
-- sqlplus hr/hr
-- sho user
CREATE TABLE ZODIAC (
  ID          NUMBER(10) NOT NULL,
  SIGN        VARCHAR2(11),
  SYMBOL      VARCHAR2(13),
  PLANET      VARCHAR2(7),
  ELEMENT     VARCHAR2(5),
  START_MONTH INTEGER,
  START_DAY   INTEGER,
  END_MONTH   INTEGER,
  END_DAY     INTEGER,
  PRIMARY KEY(ID)
);

CREATE SEQUENCE ZODIAC_SEQ;
CREATE or replace TRIGGER ZODIAC_TRIG 
  BEFORE INSERT ON ZODIAC 
  FOR EACH ROW
BEGIN
  -- PRIOR TO 11G :
  SELECT ZODIAC_SEQ.NEXTVAL INTO :NEW.ID FROM DUAL;
  -- 11G :
  --:NEW.MSG_ID := ZODIAC_SEQ.NEXTVAL;
END;
/
sho err

INSERT INTO zodiac VALUES (1,'Aries','Ram','Mars','fire',3,21,4,19);
INSERT INTO zodiac VALUES (2,'Taurus','Bull','Venus','earth',4,20,5,20);
INSERT INTO zodiac VALUES (3,'Gemini','Twins','Mercury','air',5,21,6,21);
INSERT INTO zodiac VALUES (4,'Cancer','Crab','Moon','water',6,22,7,22);
INSERT INTO zodiac VALUES (5,'Leo','Lion','Sun','fire',7,23,8,22);
INSERT INTO zodiac VALUES (6,'Virgo','Virgin','Mercury','earth',8,23,9,22);
INSERT INTO zodiac VALUES (7,'Libra','Scales','Venus','air',9,23,10,23);
INSERT INTO zodiac VALUES (8,'Scorpio','Scorpion','Mars','water',10,24,11,21);
INSERT INTO zodiac VALUES (9,'Sagittarius','Archer','Jupiter','fire',11,22,12,21);
INSERT INTO zodiac VALUES (10,'Capricorn','Goat','Saturn','earth',12,22,1,19);
INSERT INTO zodiac VALUES (11,'Aquarius','Water Carrier','Uranus','air',1,20,2,18);
INSERT INTO zodiac VALUES (12,'Pisces','Fishes','Neptune','water',2,19,3,20);
commit;
