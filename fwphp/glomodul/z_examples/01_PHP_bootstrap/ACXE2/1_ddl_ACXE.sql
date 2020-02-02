/*
start J:\awww\apl\dev1\afwww\glomodul\ACXE2\1_ddl_ACXE.sql 
--start H:\dev_web\htdocs\t_oci8\ACXE2\ddl_ACXE.sql
cd C:\oraclexe\app\oracle\product\11.2.0\server\bin
sqlplus / as sysdba  ili sqlplus hr/hr@sspc/XE
-- p s w = 141
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
  -- prior to 11g :
  select equipment_seq.nextval into :NEW.ID from dual; 
  -- 11g :
  --:NEW.id := equipment_seq.NEXTVAL;
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

CREATE OR REPLACE PROCEDURE get_equip(eid_p IN NUMBER, RC OUT SYS_REFCURSOR) AS
BEGIN
    OPEN rc FOR SELECT   equip_name
                FROM     equipment
                WHERE    employee_id = eid_p
                ORDER BY equip_name;
END;
/
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
