<?php
include_once(Crew_DOC_ROOT.'/php/Config/Cfg_Master.php');

//var_dump(debug1);
$uid = $_GET['uid'];
$id = $_GET['id'];





session_start();
$steam = $_SESSION['steamid'];


//Nachrichten zähler
$tocount=(mysqli_num_rows(mysqli_query($db_game,"SELECT * FROM `messages` where toID='$piduser '")));
$fromcount=(mysqli_num_rows(mysqli_query($db_game,"SELECT * FROM `messages` where fromid='$piduser '")));
$countmessege = $tocount+$fromcount;


//Nachrichten lesen




//user(Session) abfrage
$sql = "SELECT * FROM `players` WHERE pid = '$steam'";
$result = mysqli_query($db_game, $sql);
if (!($result == FALSE)){
    while($rows = mysqli_fetch_array($result, MYSQLI_BOTH)){
        $name = $rows['name'];
        $aliases = $rows['aliases'];
        $pid = $rows['pid'];
        $uiduser = $rows['uid'];
        $beguid = $rows['beguid'];
        $cash = $rows['cash'];
        $bankacc = $rows['bankacc'];
        $coplevel = (int)$rows['coplevel'];
        $mediclevel = (int)$rows['mediclevel'];
        $civ_licenses = $rows['civ_licenses'];
        $cop_licenses = $rows['cop_licenses'];
        $med_licenses = $rows['med_licenses'];
        $civ_gear = $rows['civ_gear'];
        $cop_gear = $rows['cop_gear'];
        $med_gear = $rows['med_gear'];
        $civ_stats = $rows['civ_stats'];
        $cop_stats = $rows['cop_stats'];
        $med_stats = $rows['med_stats'];
        $arrested = $rows['arrested'];
        $adminlevel = $rows['adminlevel'];
        $donorlevel = $rows['donorlevel'];
        $playtime = $rows['playtime'];
        $aufforderung = $rows['melden'];
    }
};

//Stunden(session)
$zeit = explode(",", $playtime);
$time = preg_replace('![^0-9]!', '', $zeit);
$coptime = ($time[0] / 60);
$medictime = ($time[1] / 60);
$civtime = ($time[2] / 60);
$gtime = $coptime + $medictime + $civtime;

//user(get) abfrage
$sql = "SELECT * FROM `players` WHERE uid = '$uid'";
$result = mysqli_query($db_game, $sql);
if (!($result == FALSE)){
    while($rows = mysqli_fetch_array($result, MYSQLI_BOTH)){
        $name_get = $rows['name'];
        $uid_get = $rows['uid'];
        $aliases_get = $rows['aliases'];
        $pid_get = $rows['pid'];
        $beguid_get = $rows['beguid'];
        $cash_get = $rows['cash'];
        $bankacc_get = $rows['bankacc'];
        $coplevel_get = $rows['coplevel'];
        $mediclevel_get = $rows['mediclevel'];
        $seklevel_get = $rows['seklevel'];
        $civ_licenses_get = $rows['civ_licenses'];
        $cop_licenses_get = $rows['cop_licenses'];
        $med_licenses_get = $rows['med_licenses'];
        $civ_gear_get = $rows['civ_gear'];
        $cop_gear_get = $rows['cop_gear'];
        $med_gear_get = $rows['med_gear'];
        $civ_stats_get = $rows['civ_stats'];
        $cop_stats_get = $rows['cop_stats'];
        $med_stats_get = $rows['med_stats'];
        $arrested_get = $rows['arrested'];
        $adminlevel_get = $rows['adminlevel'];
        $donorlevel_get = $rows['donorlevel'];
        $playtime_get = $rows['playtime'];
    }
};



//Stunden(get)
$zeit_get = explode(",", $playtime_get);
$time_get = preg_replace('![^0-9]!', '', $zeit_get);
$coptime_get = ($time_get[0] / 60);
$medictime_get = ($time_get[1] / 60);
$civtime_get = ($time_get[2] / 60);
$gtime_get = $coptime_get + $medictime_get + $civtime_get;

//css lvl bar
$copbar_get = $coplevel_get / (count($rank['cop'])+1) * 100;
$adminbar_get = $adminlevel_get / (count($rank['admin'])+1) * 100;
$medbar_get = $mediclevel_get / (count($rank['med'])+1) * 100;
$sekbar_get = $seklevel_get / (count($ranks['sek'])+1) * 25;




?>
