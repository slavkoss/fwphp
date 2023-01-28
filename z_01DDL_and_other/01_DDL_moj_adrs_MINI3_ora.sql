CREATE SEQUENCE "SONG_ID_SEQ" MINVALUE 101 MAXVALUE 999999999999999999999999999 INCREMENT BY 1
START WITH 1 CACHE 20 NOORDER NOCYCLE 
/
--------------------------------------------------------
--  DDL for Table SONG
--------------------------------------------------------

  CREATE TABLE "SONG" 
   (	"ID" NUMBER(10,0), 
	"ARTIST" VARCHAR2(255), 
	"TRACK" VARCHAR2(255), 
	"LINK" VARCHAR2(255)
   ) SEGMENT CREATION IMMEDIATE 
  PCTFREE 10 PCTUSED 40 INITRANS 1 MAXTRANS 255 NOCOMPRESS LOGGING
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Index SYS_C0011205
--------------------------------------------------------

  CREATE UNIQUE INDEX "SYS_C0011205" ON "SONG" ("ID") 
  PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS" ;
--------------------------------------------------------
--  DDL for Trigger TG_BIU_SONG
--------------------------------------------------------

  CREATE OR REPLACE TRIGGER "TG_BIU_SONG" 
BEFORE INSERT OR UPDATE ON SONG
  FOR EACH ROW BEGIN
    --if :NEW.id is null then :NEW.id := SONG_ID.NEXTVAL; end if;
    -- PRIOR TO 11G :
    if :NEW.id is null then
       SELECT SONG_ID_SEQ.NEXTVAL INTO :NEW.id FROM DUAL;
    end if;
  END;

/
ALTER TRIGGER "TG_BIU_SONG" ENABLE;
--------------------------------------------------------
--  Constraints for Table SONG
--------------------------------------------------------

  ALTER TABLE "SONG" ADD PRIMARY KEY ("ID")
  USING INDEX PCTFREE 10 INITRANS 2 MAXTRANS 255 COMPUTE STATISTICS 
  STORAGE(INITIAL 65536 NEXT 1048576 MINEXTENTS 1 MAXEXTENTS 2147483645
  PCTINCREASE 0 FREELISTS 1 FREELIST GROUPS 1 BUFFER_POOL DEFAULT FLASH_CACHE DEFAULT CELL_FLASH_CACHE DEFAULT)
  TABLESPACE "USERS"  ENABLE;
  ALTER TABLE "SONG" MODIFY ("ID" NOT NULL ENABLE);




--------------------------------------------------------
--  File created - subota-sijeènja-28-2023   
--------------------------------------------------------
REM INSERTING into SONG
SET DEFINE OFF;
Insert into SONG (ID,ARTIST,TRACK,LINK) values (34,'16 updated','16','16');
Insert into SONG (ID,ARTIST,TRACK,LINK) values (44,'001 Sofi Tukker','Matadora','https://www.youtube.com/watch?v=d6GJeap4Oqo');
Insert into SONG (ID,ARTIST,TRACK,LINK) values (43,'17','17','17');
Insert into SONG (ID,ARTIST,TRACK,LINK) values (32,'15 updated','15','15');
Insert into SONG (ID,ARTIST,TRACK,LINK) values (18,'jjjjj','jjjjj','jjjjj');
Insert into SONG (ID,ARTIST,TRACK,LINK) values (19,'hhh','hhh','hhh');
Insert into SONG (ID,ARTIST,TRACK,LINK) values (20,'rrr','rrr','rrr');
Insert into SONG (ID,ARTIST,TRACK,LINK) values (7,'b','b','b');
Insert into SONG (ID,ARTIST,TRACK,LINK) values (6,'a','a','a');
Insert into SONG (ID,ARTIST,TRACK,LINK) values (8,'c','c','c');
Insert into SONG (ID,ARTIST,TRACK,LINK) values (9,'d','d','d');
Insert into SONG (ID,ARTIST,TRACK,LINK) values (10,'e','e','e');
Insert into SONG (ID,ARTIST,TRACK,LINK) values (11,'f','f','f');
Insert into SONG (ID,ARTIST,TRACK,LINK) values (12,'g','g','g');
Insert into SONG (ID,ARTIST,TRACK,LINK) values (13,'h','h','h');
Insert into SONG (ID,ARTIST,TRACK,LINK) values (14,'i','i','i');
Insert into SONG (ID,ARTIST,TRACK,LINK) values (16,'k','k','k');
Insert into SONG (ID,ARTIST,TRACK,LINK) values (17,'l','l','l');
