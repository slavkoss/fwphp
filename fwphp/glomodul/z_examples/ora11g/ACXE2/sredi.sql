/*   select distinct SIFRA_AKCIJE from t_log_akcija where to_char(VRIJEME_AKCIJE,'RRRR') > '2009';
select user_name, naziv from mercedes.t_user order by user_name;
select * from all_users order by username;
--
select distinct OBJECT_TYPE from user_objects
DATABASE LINK
FUNCTION
INDEX
PACKAGE
PACKAGE BODY
PROCEDURE
SEQUENCE
SYNONYM
TABLE
TRIGGER
VIEW

select object_name from user_objects where OBJECT_TYPE = 'FUNCTION'
/
ALTER FUNCTION PF_OZNAKA_U_NUMSORT COMPILE
/

select owner, segment_name, to_char(blocks,'999G999G999G999') blocks, to_char(bytes,'999G999G999G999') bytes, extents
from
   (  select owner, substr(segment_name,1,30) segment_name, sum(extents) extents, sum(blocks) blocks, sum(bytes) bytes
      from dba_segments where owner = 'KECUR'  group by owner, segment_name )
order by blocks desc
/

select owner, trigger_name, status, triggering_event event
     from all_triggers
     where table_name = 'T_STAVKA_DOKUMENTA' --upper(t) T_STAVKA_IZDATNICE
       and table_owner = 'CVRCAK11B' --upper(o)
/

------ ovo za sada sintaksa ima grešku
select t.table_name, t.owner
     , t.num_rows, t.blocks
     , s.blocks2, s.bytes, s.extents
     , t.tablespace_name
     , t.initial_extent, t.next_extent, t.pct_increase
from dba_tables t,
  (
      select owner, segment_name, to_char(extents) extents, to_char(blocks) blocks2, to_char(bytes) bytes
              from dba_segments
  ) s
where
 upper(t.owner) = upper(s.owner)
 and upper(t.table_name) = upper(s.segment_name)
 --
 and t.owner = 'kecur' --like upper(wuser)
     --and table_name like upper(wtable)
/
*/
prompt
prompt
PROMPT 1. SREÐIVANJE INVALIDA :
PROMPT ======================== 160
SET LINESIZE 300
SET heading off feedback off showmode off echo off
PROMPT echo on pokazuje sql naredbe, showmode on pokazuje old i new nakon SET naredbe
SPOOL _SREDI_INVALIDE.SQL
--select 'PROMPT  ALTER '||OBJECT_TYPE||' '||OWNER||'.'||object_name||' COMPILE;' from all_objects where status='INVALID' -- user_objects
--/
--select 'ALTER '||OBJECT_TYPE||' '||OWNER||'.'||object_name||' COMPILE;' from all_objects where status='INVALID'
select 'ALTER '||OBJECT_TYPE||' '||USER||'.'||object_name||' COMPILE;' from user_objects where status='INVALID'
/

prompt
SPOOL OFF
SET LINESIZE 300
SET heading on feedback on showmode off echo off
START  _SREDI_INVALIDE.SQL


set linesize 300 pagesize 67
set heading on feedback on showmode off echo off
SPOOL tmp.txt
prompt
prompt

prompt 2. DROP invalidnih sinonima  (izvan spool off):
PROMPT =========================================
--select 'drop synonym '||s.table_owner||'.'||s.synonym_name||'; --invalidan synonym' from user_synonyms s
select 'drop synonym '||USER||'.'||o.object_name||';'
from user_objects o
where OBJECT_TYPE = 'SYNONYM' and status='INVALID';
--where exists ( select '1' from user_objects o where USER||'.'||o.object_name = s.table_owner||'.'||s.synonym_name  and o.status='VALID')
--select OBJECT_TYPE tip, USER||'.'||o.object_name a from user_objects o where OBJECT_TYPE = 'SYNONYM' and status='VALID'
prompt
prompt
prompt 3. TRIGGERI DISABLED I ENABLED :
PROMPT ================================
select trigger_name,status from user_triggers order by status,TRIGGER_NAME ;


prompt
prompt
PROMPT 4. PROVJERA KOLIKO JOS IMA INVALIDA :
PROMPT =====================================

--set echo off showmode off --set pagesize 64 --timing off feedback off --SET linesize 2000 heading on --spool TMP.TXT
CLEAR COLUMNS
CLEAR BREAKS
CLEAR COMPUTES
-- FORMAT 99999999  FORMAT 999G999G999D99 width 17
COLUMN status HEADING STATUS
COLUMN object_type HEADING OBJECT_TYPE
COLUMN object_name HEADING OBJECT_NAME
--
BREAK ON REPORT ON status ON OBJECT_TYPE ON object_name SKIP 0
COMPUTE count OF status ON status
COMPUTE count OF OBJECT_TYPE ON status
COMPUTE count OF object_name ON status
--COMPUTE SUM OF iznos ON id
--
COMPUTE count OF status ON OBJECT_TYPE
COMPUTE count OF OBJECT_TYPE ON OBJECT_TYPE
COMPUTE count OF object_name ON OBJECT_TYPE
--
COMPUTE count OF status ON REPORT
COMPUTE count OF OBJECT_TYPE ON REPORT
COMPUTE count OF object_name ON REPORT
--
prompt SVI USERI: select * from all_users order by username;
PROMPT SVI OBJEKTI USERA: select max(length(rtrim(OWNER||'.'||object_name))) from all_objects;
PROMPT INVALIDNI OBJEKTI USERA: select DISTINCT status, OBJECT_TYPE, substr(USER||'.'||object_name,1,50) object_name from user_objects where status = 'INVALID'
select DISTINCT status, OBJECT_TYPE, substr(USER||'.'||object_name,1,50) object_name from user_objects where status = 'INVALID'
/

prompt 5. DROP TRIGGERA KOJI TABLE_OWNER!=OWNER (izvan spool off jer brise sistemske triggere !!):
PROMPT =========================================
select 'drop trigger '||owner||'.'||trigger_name||';                   --jer table_owner='||table_owner dropati_pa_kreirati
from all_triggers
where table_owner!=owner ;



CLEAR COLUMNS
CLEAR BREAKS
CLEAR COMPUTES
SPOOL OFF
--ed tmp.txt
prompt ************** mozete ed tmp.txt *************
-- LINESIZE je max. 100
SET LINESIZE 300
SET heading on feedback on showmode off echo off

sho user
