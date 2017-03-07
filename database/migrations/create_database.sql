 -- create user
 GRANT USAGE ON *.* TO 'molirun170308'@'localhost' IDENTIFIED BY '%m@k7jK7FCaeq#3fuv' WITH GRANT OPTION;
 -- create database
 CREATE DATABASE molirun170308  CHARACTER SET  utf8  COLLATE utf8_general_ci;
 -- grant user 权限1,权限2select,insert,update,delete,create,drop,index,alter,grant,references,reload,shutdown,process,file等14个权限
 GRANT SELECT,INSERT,UPDATE,DELETE,CREATE,DROP,LOCK TABLES,index,alter ON molirun170308.*  TO 'molirun170308'@'localhost' IDENTIFIED BY '%m@k7jK7FCaeq#3fuv';

 -- mysqldump -umolirun170308 -p%m@k7jK7FCaeq#3fuv molirun170308 > /var/tmp/mysqlbackup/mysqlbak_molirun170308_201608111839.sql