<?php
include_once(Crew_DOC_ROOT.'/php/Config/Cfg_Master.php');
function contains($needle, $haystack){
    $pos = strpos($haystack, $needle);
    if ($pos !== false){
        return true;
    }else {
        return false;
    }
}

function startsWith($haystack, $needle)
{
    $length = strlen($needle);
    return (substr($haystack, 0, $length) === $needle);
}

function endsWith($haystack, $needle)
{
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}


    include_once(Crew_DOC_ROOT.'/php/Config/Cfg_Master.php');
    if (isset($_POST['actionc']))
        if ($_POST['actionc'] == "updatecLicenses") {
          header('Location:/intern/cop/Spieler/info.php/?uid='.$uid.'');


            // Cop-Lizenzen neu machen
            $liccopnew = '"[';
            foreach ($licenses['cop'] as $lic) {
                // lel
                if (isset($_POST['license_cop_' . $lic[0]])) {
                    $liccopnew = $liccopnew . '[`license_cop_' . $lic[0] . '`,1],';
                } else {
                    $liccopnew = $liccopnew . '[`license_cop_' . $lic[0] . '`,0],';
                }
            }
            $liccopnew = $liccopnew . '[]]"';

            $sql = "UPDATE `players` SET `cop_licenses` = '$liccopnew' WHERE uid = $uid;";
            $createlog =  mysql_query("INSERT INTO crew_log ( name, type, log) VALUES('$name', 'cop', 'Bei $name_get wurden die ausbildungen bearbeitet')");
            //echo '<pre>';
            //var_dump($liccivnew);
            //var_dump($liccopnew);
            //var_dump($licmednew);
            //echo '</pre>';
            mysqli_query($db_game,$sql,$createlog);


        }



if (isset($_POST['actionm']))
    if ($_POST['actionm'] == "updatemLicenses") {
      header('Location:/intern/med/Spieler/info.php/?uid='.$uid.'');


        // med-Lizenzen neu machen
        $licmednew = '"[';
        foreach ($licenses['med'] as $lic) {
            // lel
            if (isset($_POST['license_med_' . $lic[0]])) {
                $licmednew = $licmednew . '[`license_med_' . $lic[0] . '`,1],';
            } else {
                $licmednew = $licmednew . '[`license_med_' . $lic[0] . '`,0],';
            }
        }
        $licmednew = $licmednew . '[]]"';

        $sql = "UPDATE `players` SET `med_licenses` = '$licmednew' WHERE uid = $uid;";
        $createlog =  mysql_query("INSERT INTO crew_log ( name, type, log) VALUES('$name', 'med', 'Bei $name_get wurden die ausbildungen bearbeitet')");
        //echo '<pre>';
        //var_dump($liccivnew);
        //var_dump($liccopnew);
        //var_dump($licmednew);
        //echo '</pre>';
        mysqli_query($db_game,$sql,$createlog);


    }


    if (isset($_POST['actiona']))
        if ($_POST['actiona'] == "updateLicenses") {
            // Civ-Lizenzen neu machen
           $liccivnew = '"[';
        foreach ($licenses['civ'] as $lic) {
                // lel
                if (isset($_POST['license_civ_' . $lic[0]])) {
                    $liccivnew = $liccivnew . '[`license_civ_' . $lic[0] . '`,1],';
                } else {
                    $liccivnew = $liccivnew . '[`license_civ_' . $lic[0] . '`,0],';
                }
            }
            $liccivnew = $liccivnew . '[]]"';

            // Cop-Lizenzen neu machen
            $liccopnew = '"[';
            foreach ($licenses['cop'] as $lic) {
                // lel
                if (isset($_POST['license_cop_' . $lic[0]])) {
                    $liccopnew = $liccopnew . '[`license_cop_' . $lic[0] . '`,1],';
                } else {
                    $liccopnew = $liccopnew . '[`license_cop_' . $lic[0] . '`,0],';
                }
            }
            $liccopnew = $liccopnew . '[]]"';

            // Med-Lizenzen neu machen
            $licmednew = '"[';
            foreach ($licenses['med'] as $lic) {
                // lel
                if (isset($_POST['license_med_' . $lic[0]])) {
                    $licmednew = $licmednew . '[`license_med_' . $lic[0] . '`,1],';
                } else {
                    $licmednew = $licmednew . '[`license_med_' . $lic[0] . '`,0],';
                }
            }
            $licmednew = $licmednew . '[]]"';

            $sql = "UPDATE `players` SET , `cop_licenses` = '$liccopnew', `med_licenses` = '$licmednew' WHERE uid = $uid;";
            echo '<pre>';
            var_dump($liccivnew);
            var_dump($liccopnew);
            var_dump($licmednew);
            echo '</pre>';
            mysqli_query($db_game,$sql);
        }

?>
