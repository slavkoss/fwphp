-- J:\0downl\1_instalirano\1_oracle\3_11XE\instalac\sql_utl_moj\users.sql
SET LINESIZE 160 trimspool on arraysize 100 tab off

prompt ******** 1. nls_database_parameters 
--select * from nls_database_parameters

prompt ******** 2. francuski e:
--select 'é', ascii('é') from dual

prompt ******** 3. nls_session_parameters:
--select PARAMETER, VALUE from nls_session_parameters

prompt ******** 4. nls_instance_parameters
--select PARAMETER, VALUE from nls_instance_parameters


-- delete t_user where user_name != 'MERCEDES'  EE8PC852  US8PC437  EE8MSWIN1250
-- delete t_user where user_alias != 'ora7'

prompt ********* APEX: ******** https://docs.oracle.com/cd/E59726_01/install.50/e39144/pre_require.htm#HTMIG376
prompt name and location of the server parameter file (spfiledbname.ora eg SPFILEXE.ORA)
prompt or initialization parameter file: (initsid.ora) :
SHOW PARAMETER PFILE;

prompt Determine current values of MEMORY_TARGET param.:
prompt 0 = your db is using manual memory management - Consult the Oracle Database Administrators Guide to learn how to configure an equivalent memory size using manual memory management, instead of continuing with the steps that follow.
prompt If the system is using a server parameter file, set the value of the MEMORY_TARGET initialization parameter to at least 300 MB (ALTER SYSTEM SET MEMORY_TARGET='300M' SCOPE=spfile; then SHUTDOWN and STARTUP)
SHOW PARAMETER MEMORY_TARGET
select default_tablespace, temporary_tablespace from dba_users where username = 'APEX_040000';
select substr(tablespace_name,1,12) tablespace_name,
  substr(file_name, 1, 55) file_name,
  (maxbytes - bytes) / 1024/1024 as "Available Space MB",
  autoextensible
from dba_data_files
where tablespace_name in ('SYSAUX', 'SYSTEM')
/
prompt ********************************************


select comp_name, version, status from dba_registry where comp_id = 'XDB';

alter session set 
    --NLS_LANGUAGE=american NLS_TERRITORY=america 
    --NLS_CHARACTERSET=US8PC437 
  nls_numeric_characters=',.' 
  nls_date_format='YYYY-MM-DD HH24:MI:SS'
/
-- ne ide: alter session set NLS_LANG=american_america.US8PC437
--          NLS_CHARACTERSET=US8PC437
COLUMN value HEADING nlsdbcharset FORMAT A50
--SELECT distinct PARAMETER FROM V$NLS_VALID_VALUES
-- CHARACTERSET SORT TERRITORY LANGUAGE
--SELECT PARAMETER, VALUE FROM V$NLS_VALID_VALUES where PARAMETER='CHARACTERSET' order by VALUE
-- EE8ISO8859P2 EE8MSWIN1250 EE8PC852 UTF8
SET LINESIZE 254 arraysize 100 tab off
select * from t_tip_doc
/
select a.USER_ID, a.CREATED
     ,  u.NAZIV, u.USER_NAME, u.USER_PASSWORD, u.USER_ALIAS
from all_users a, t_user u
where u.user_name = a.username(+)
order by u.user_name
/

select * from t_user order by user_name
/

prompt D:\>echo %NLS_LANG%  vrati AMERICAN_AMERICA.EE8MSWIN1250
prompt D:\>chcp  vrati Active code page: 852 = console page win CLI-a
prompt U nls_database_parameters: AL32UTF8 ili EE8MSWIN1250 :
select substr(value,1,50) value from nls_database_parameters where parameter ='NLS_CHARACTERSET'
/

select banner from v$version where banner like 'Oracle Database%';
select instance_name, status, database_status from v$instance;

select * from all_users order by username
/
sho user
