<?php
include_once 'config.php';

if (isset($_POST['action']))
    if ($_POST['action'] == "updateLicenses") {
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

        $sql = "UPDATE `players` SET `civ_licenses` = '$liccivnew', `cop_licenses` = '$liccopnew', `med_licenses` = '$licmednew' WHERE uid = $uid;";
        //echo '<pre>';
        //var_dump($liccivnew);
        //var_dump($liccopnew);
        //var_dump($licmednew);
        //echo '</pre>';
        mysql_query( $sql);
    }
    if ($_POST['action'] == "ts3verify") {
          echo $_POST['cuid'];
        ts3_verify($_POST['id'],$_POST['type'],$_POST['cuid']);
        
    }

     
    
