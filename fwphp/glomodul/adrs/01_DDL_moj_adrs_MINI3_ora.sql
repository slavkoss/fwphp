
CREATE TABLE song (
  id number(10) NOT NULL, 
  artist varchar2(255) ,
  track varchar2(255) ,
  link varchar2(255) ,
  PRIMARY KEY (id)
  --UNIQUE KEY id (id)
) ;


CREATE SEQUENCE "SONG_ID_SEQ" MINVALUE 101 MAXVALUE 999999999999999999999999999 INCREMENT BY 1
START WITH 1 CACHE 20 NOORDER NOCYCLE 
/

ALTER TRIGGER "TG_BIU_SONG" DISABLE;
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
sho error
ALTER TRIGGER "TG_BIU_SONG" ENABLE;



INSERT INTO song (id, artist, track, link) VALUES
(1, 'Rin', 'Ljubav/Beichtstuhl', 'https://www.youtube.com/watch?v=MDHJMirQ5PI'),
(2, 'Jeremih feat. Natasha Mosley', 'F*** U All The Time', 'https://www.youtube.com/watch?v=6-Bq7PCKCJ4'),
(3, 'Nao', 'In the Morning', 'https://www.youtube.com/watch?v=uuocmqLRgOM'),
(4, 'Sofi / Tukker', 'Matadora', 'https://www.youtube.com/watch?v=d6GJeap4Oqo'),
(5, 'Yung Hurn', 'Nein', 'https://www.youtube.com/watch?v=22m5eU6uxeQ'),
(6, 'Rin', 'Error', 'https://www.youtube.com/watch?v=VzajBMa-2P8'),
(7, 'Detachments', 'Circles (Martyn Remix)', 'http://www.youtube.com/watch?v=UzS7Gvn7jJ0'),
(8, 'Survive', 'Hourglass', 'https://www.youtube.com/watch?v=JVOe2oGoHLk'),
(9, 'Big Narstie', 'Hello Hi', 'https://www.youtube.com/watch?v=q10WwZJmPew'),
(10, 'Sleaford Mods', 'Tarantula Deadly Cargo', 'https://www.youtube.com/watch?v=E-gvxxhcS8s'),
(11, 'Mykki Blanco and Woodkid', 'Highschool never ends', 'https://www.youtube.com/watch?v=cNGR4ciDmTA'),
(12, 'Secondcity and Tyler Rowe', 'I Enter', 'https://www.youtube.com/watch?v=vAmDJAxNMi0'),
(13, 'Maxxi Soundsystem', 'Regrets we have no use for (Radio1 Rip)', 'https://soundcloud.com/maxxisoundsystem/maxxi-soundsystem-ft-name-one'),
(14, 'Jamie T', 'Don''t you find', 'https://www.youtube.com/watch?v=-tmoaFAT108'),
(15, 'Sierra Kid', 'Ein Fan von Dir', 'https://www.youtube.com/watch?v=dfabdmbpQeQ'),
(16, 'SSIO', 'Nullkommaneun', 'https://www.youtube.com/watch?v=Slei8n08Cqk'),
(17, 'Pupkulies & Rebecca', 'ICI', 'https://www.youtube.com/watch?v=60tebPRj_D0'),
(18, 'Color War', 'Shapeshifting', 'https://vimeo.com/111250184'),
(19, 'R�F�S', 'Innerbloom', 'https://www.youtube.com/watch?v=IA1liCmUsAM'),
(20, 'R�F�S', 'Tonight', 'https://www.youtube.com/watch?v=GCa_TKn9ghI');
