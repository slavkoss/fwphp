
--
-- user: conn hr/hr@ora7
--

--DROP TABLE ADMIN_PANEL CASCADE CONSTRAINTS;
--DROP TABLE CATEGORY CASCADE CONSTRAINTS;
--DROP TABLE COMMENTS CASCADE CONSTRAINTS;
--DROP TABLE REGISTRATION CASCADE CONSTRAINTS;


CREATE SEQUENCE POSTS_SEQ INCREMENT BY 1 MAXVALUE 9999999999 MINVALUE 1 CACHE 20;
CREATE SEQUENCE COMMENTS_SEQ INCREMENT BY 1 MAXVALUE 9999999999 MINVALUE 1 CACHE 20;


CREATE TABLE admin_panel (
    id number(10) NOT NULL
  , datetim varchar2(50) 
  , title varchar2(200) 
  , category varchar2(100) 
  , author varchar2(100) 
  , imag varchar2(200) 
  , post varchar2(4000)
  , img_desc varchar2(4000)
  , summary varchar2(4000)
) ;



CREATE TABLE category (
  id number(10) NOT NULL,
  datetim varchar2(50) ,
  name varchar2(100) ,
  creatorname varchar2(200) 
) ;




CREATE TABLE comments (
  id             number(10) NOT NULL,
  datetim        varchar2(50) ,
  name           varchar2(200) ,
  email          varchar2(200) ,
  komentar       varchar2(4000) ,
  approvedby     varchar2(200) ,
  status         varchar2(5) ,
  admin_panel_id number(10) 
) ;


CREATE TABLE registration (
  id number(10) NOT NULL,
  datetim varchar2(50) ,
  username varchar2(200) ,
  password varchar2(200) ,
  addedby varchar2(200) 
) ;


--
-- PK, FK, ndexes 
--
ALTER TABLE admin_panel ADD PRIMARY KEY (id);
ALTER TABLE category ADD PRIMARY KEY (id);
ALTER TABLE comments ADD PRIMARY KEY (id);
ALTER TABLE registration ADD PRIMARY KEY (id);

CREATE INDEX coment_post__idx ON
    comments (
        admin_panel_id
    ASC );


--
-- Constraints 
--
ALTER TABLE comments
    ADD CONSTRAINT coment_post_fk FOREIGN KEY ( admin_panel_id )
        REFERENCES admin_panel ( id )
        ON DELETE CASCADE;



--
-- AUTO_INCREMENT 
--
drop TRIGGER TG_BIU_ADMIN_PANEL ;
CREATE OR REPLACE TRIGGER TG_BIU_ADMIN_PANEL
BEFORE INSERT OR UPDATE ON ADMIN_PANEL
  FOR EACH ROW BEGIN
    --if :NEW.SIFRA_TEKKAR is null then :NEW.SIFRA_TEKKAR := TEKKAR_SEQ.NEXTVAL; end if;
    -- PRIOR TO 11G :
    if :NEW.ID is null then
       SELECT POSTS_SEQ.NEXTVAL INTO :NEW.ID FROM DUAL;
    end if;
  END;
/
sho error
ALTER TRIGGER TG_BIU_ADMIN_PANEL ENABLE;


drop TRIGGER TG_BIU_CATEGORY ;
CREATE OR REPLACE TRIGGER TG_BIU_CATEGORY
BEFORE INSERT OR UPDATE ON CATEGORY
  FOR EACH ROW BEGIN
    --if :NEW.SIFRA_TEKKAR is null then :NEW.SIFRA_TEKKAR := TEKKAR_SEQ.NEXTVAL; end if;
    -- PRIOR TO 11G :
    if :NEW.ID is null then
       SELECT POSTS_SEQ.NEXTVAL INTO :NEW.ID FROM DUAL;
    end if;
  END;
/
sho error
ALTER TRIGGER TG_BIU_CATEGORY ENABLE;


drop TRIGGER TG_BIU_COMMENTS ;
CREATE OR REPLACE TRIGGER TG_BIU_COMMENTS
BEFORE INSERT OR UPDATE ON COMMENTS
  FOR EACH ROW BEGIN
    --if :NEW.SIFRA_TEKKAR is null then :NEW.SIFRA_TEKKAR := TEKKAR_SEQ.NEXTVAL; end if;
    -- PRIOR TO 11G :
    if :NEW.ID is null then
       SELECT COMMENTS_SEQ.NEXTVAL INTO :NEW.ID FROM DUAL;
    end if;
  END;
/
sho error
ALTER TRIGGER TG_BIU_COMMENTS ENABLE;


drop TRIGGER TG_BIU_REGISTRATION ;
CREATE OR REPLACE TRIGGER TG_BIU_REGISTRATION
BEFORE INSERT OR UPDATE ON REGISTRATION
  FOR EACH ROW BEGIN
    --if :NEW.SIFRA_TEKKAR is null then :NEW.SIFRA_TEKKAR := TEKKAR_SEQ.NEXTVAL; end if;
    -- PRIOR TO 11G :
    if :NEW.ID is null then
       SELECT POSTS_SEQ.NEXTVAL INTO :NEW.ID FROM DUAL;
    end if;
  END;
/
sho error
ALTER TRIGGER TG_BIU_REGISTRATION ENABLE;
