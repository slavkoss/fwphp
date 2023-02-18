/*
conn hr/hr@ora7
start J:\awww\www\fwphp\glomodul\z_examples\ora11g\ACXE2\1_ddl_ACXE.sql
            was start J:\awww\apl\dev1\afwww\glomodul\ACXE2\1_ddl_ACXE.sql 
                start H:\dev_web\htdocs\t_oci8\ACXE2\ddl_ACXE.sql

cd C:\oraclexe\app\oracle\product\11.2.0\server\bin
sqlplus / as sysdba  ili sqlplus hr/hr@sspc/XE
execute dbms_cnidection_pool.start_pool();
select * from DBA_CPOOL_INFO; -- <--- mora biti ACTIVE
select * from V$CPOOL_STATS; -- <-- ako nije ACTIVE pokaze nista
*/
CREATE TABLE equipment(
    id          NUMBER PRIMARY KEY,
    employee_id REFERENCES employees(employee_id) ON DELETE CASCADE,
    equip_name  VARCHAR2(20) NOT NULL
)
/
CREATE SEQUENCE equipment_seq;
CREATE TRIGGER equipment_trig BEFORE INSERT ON equipment FOR EACH ROW
BEGIN
  -- prior to 11g : select equipment_seq.nextval into :NEW.ID from dual; 
  -- 11g :
  :NEW.id := equipment_seq.NEXTVAL;
END;
/

CREATE TABLE pictures (id NUMBER, pic BLOB);
 
CREATE SEQUENCE pictures_seq;
CREATE TRIGGER pictures_trig BEFORE INSERT ON pictures FOR EACH ROW
BEGIN
    select pictures_seq.nextval into :NEW.ID from dual; 
    --:NEW.id := pictures_seq.NEXTVAL;
END;
/

CREATE OR REPLACE PROCEDURE get_equip(eid_p IN NUMBER, RC IN OUT SYS_REFCURSOR) AS
BEGIN
  --called eg by running an anonymous PL/SQL block: BEGIN get_equip(:id, :rc); END;
  --Returned cursor variable of type SYS_REFCURSOR : 1. can be opened for any query
  --   2. it is like view with parameter eid_p
    OPEN RC FOR SELECT   *
                FROM     equipment
                WHERE    employee_id = eid_p
                ORDER BY equip_name;
END;
/

/* --------- test rc-a :
select employee_id from equipment --100,102,102,103,121,180
select employee_id from employees where rownum < 6


SET SERVEROUTPUT OFF
SET SERVEROUTPUT ON SIZE 1000000 FORMAT WRAPPED
DECLARE
  v_employee_id_given equipment.employee_id%TYPE := 100;

  v_rows_equip_rc SYS_REFCURSOR ;
  v_row_equip_rc_x equipment%ROWTYPE ; 
                     --v_row_id equipment.id%TYPE ; v_row_employee_id equipment.employee_id%TYPE ;
                     --v_row_equip_name equipment.equip_name%TYPE ;
BEGIN
  get_equip(v_employee_id_given, v_rows_equip_rc);
               --pck_stavke_nard.tbl_displ(v_rows_equip_rc);
  dbms_output.put_line('-- ********************** ISPIS :' );
  -- process each row
  LOOP
    FETCH v_rows_equip_rc INTO v_row_equip_rc_x ;
                  --FETCH v_rows_equip_rc INTO v_row_id, v_row_employee_id, v_row_equip_name ;
    EXIT WHEN v_rows_equip_rc%notfound;
    dbms_output.put_line(
         'id=' || v_row_equip_rc_x.id 
         ||', employee_id=' || v_row_equip_rc_x.employee_id 
         ||', equip_name=' || v_row_equip_rc_x.equip_name 
         );
  END LOOP;

  CLOSE v_rows_equip_rc; --open is in get ref cursor procedure !

EXCEPTION 
  WHEN OTHERS THEN 
    IF v_rows_equip_rc%ISOPEN THEN CLOSE v_rows_equip_rc; END IF; 
    RAISE; 
END;
/


*/


/*
CREATE OR REPLACE PACKAGE equip_pkg AS
    TYPE arrtype IS TABLE OF VARCHAR2(20) INDEX BY PLS_INTEGER;
    PROCEDURE insert_equip(eid_p IN NUMBER, eqa_p IN arrtype);
END equip_pkg;
/
CREATE OR REPLACE PACKAGE BODY equip_pkg AS
    PROCEDURE insert_equip(eid_p IN NUMBER, eqa_p IN arrtype) IS
    BEGIN
        FORALL i IN INDICES OF eqa_p
            INSERT INTO equipment (employee_id, equip_name) 
                                   VALUES (eid_p, eqa_p(i));
    END insert_equip;
END equip_pkg;
/
*/
CREATE OR REPLACE PACKAGE equip_pkg AS
    TYPE arrtype IS TABLE OF VARCHAR2(20) INDEX BY PLS_INTEGER;
    PROCEDURE insert_equip(eid_p IN NUMBER, eqa_p IN arrtype);
END equip_pkg;
/
CREATE OR REPLACE PACKAGE BODY equip_pkg AS
    PROCEDURE insert_equip(eid_p IN NUMBER, eqa_p IN arrtype) IS
    BEGIN
        FORALL i IN INDICES OF eqa_p
            INSERT INTO equipment (employee_id, equip_name) 
                                   VALUES (eid_p, eqa_p(i));
    END insert_equip;
END equip_pkg;
/

INSERT INTO equipment (employee_id, equip_name) VALUES (100, 'pen');
INSERT INTO equipment (employee_id, equip_name) VALUES (100, 'telephone');
INSERT INTO equipment (employee_id, equip_name) VALUES (101, 'pen');
INSERT INTO equipment (employee_id, equip_name) VALUES (101, 'paper');
INSERT INTO equipment (employee_id, equip_name) VALUES (101, 'car');
INSERT INTO equipment (employee_id, equip_name) VALUES (102, 'pen');
INSERT INTO equipment (employee_id, equip_name) VALUES (102, 'paper');
INSERT INTO equipment (employee_id, equip_name) VALUES (102, 'telephone');
INSERT INTO equipment (employee_id, equip_name) VALUES (103, 'telephone');
INSERT INTO equipment (employee_id, equip_name) VALUES (103, 'computer');
INSERT INTO equipment (employee_id, equip_name) VALUES (121, 'computer');
INSERT INTO equipment (employee_id, equip_name) VALUES (180, 'pen');
INSERT INTO equipment (employee_id, equip_name) VALUES (180, 'paper');
INSERT INTO equipment (employee_id, equip_name) VALUES (180, 'cardboard box');
COMMIT;
