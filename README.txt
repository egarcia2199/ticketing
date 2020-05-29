OBSERVACIONS:

PER COMERÇAR LA PRÀCTICA, ES COMENÇA AMB L'ARXIU index.php

------------------------------------------------------------

He creat un usuari en la BBDD anomenat adminbd amb contrassenya admin123


Per això,haurás de crear l'usuari i donar-li permisos dins de MySQL:

Entra a mySQL i posa aquestes comandes en la terminal:

 CREATE USER 'adminbd'@'localhost' IDENTIFIED BY 'admin123';
 GRANT ALL PRIVILEGES ON *.* TO 'adminbd'@'localhost';

 
Després, fer un:  source /var/www/html/ticketing/login.sql; 


------------------------------------------------------------

Per poder fer login tenim 3 usuaris creats (Es pot entrar amb qualsevol d'aquests usuaris):

-administrador amb contrassenya: admin123
-gestor amb contrassenya: gestor123
-professor amb contrassenya: professor123


------------------------------------------------------------

NOTA: No he sapigut modificar les incidències, per tant he fet uns inserts a la taula 'incidencies' amb dues ja resoltes.
