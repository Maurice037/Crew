<?php
include_once 'config.php';

if (isset($_POST['action']))
    if ($_POST['action'] == "updateAusbildung") {

        // Cop-Lizenzen neu machen
        $ausbcopnew = '"[';
        foreach ($Aubildung['cop'] as $Ausb) {
            // lel
            if (isset($_POST['ausbildung_cop_' . $Ausb[0]])) {
                $ausbcopnew = $ausbcopnew . '[`ausbildung_cop_' . $Ausb[0] . '`,1],';
            } else {
                $ausbcopnew = $ausbcopnew . '[`ausbildung_cop_' . $Ausb[0] . '`,0],';
            }
        }
        $ausbcopnew = $ausbcopnew . '[]]"';

        // Med-Lizenzen neu machen
        /* $licmednew = '"[';
        foreach ($licenses['med'] as $lic) {
            // lel
            if (isset($_POST['license_med_' . $lic[0]])) {
                $licmednew = $licmednew . '[`license_med_' . $lic[0] . '`,1],';
            } else {
                $licmednew = $licmednew . '[`license_med_' . $lic[0] . '`,0],';
            }
        }
        $licmednew = $licmednew . '[]]"';  */

        $sql = "UPDATE `players` SET `crew_cop_ausbildung` = '$ausbcopnew' WHERE uid = $uid;";
        $createlog =  mysql_query("INSERT INTO Crew_log ( name, type, log, date) VALUES('$aname', 'cop', 'Bei $name wurden die ausbildungen bearbeitet', '$t')");
        //echo '<pre>';
        //var_dump($liccivnew);
        //var_dump($liccopnew);
        //var_dump($ausbcopnew);
        //echo '</pre>';
        mysql_query( $sql);
        header('Location:/intern/cop/Spieler/info.php/?uid=' . $uid. '');
    }
  

     
    
