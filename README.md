# alhuda
How to Install:
- Download Xampp.
- Install it.
- Open Xampp and run the apache and sql.
- download source as zip, extract it and copy it to c:/xampp/htdocs/.
- open browser, and go to http://localhost/phpmyadmin.
- create new database with name "alhuda" and char "utf8_general_ci".
- click on created database "alhuda", and then click on import.
- select the sql file located on c:/xampp/htdocs/Alhuda1/database sql/alhuda.sql
- click go.
- now open "config/connections.php" and 
   update values with:
  - DEFINE('DB_NAME', 'alhuda');
  - DEFINE('USERNAME', 'root');
  - DEFINE('PASSWORD', '');

Update index.php
set your folder name 
define('HOME_FOLDER','Alhuda1');

- open browser and go to http://localhost/Alhuda1
