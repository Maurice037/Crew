<?php
require_once("arc.php");
include_once("./config.php");

use \Nizarii\ARC;

$rcon = NULL;

function rcon_connect()
{
    if ($rcon == NULL || !isset($rcon)) {
        try {
            $rcon = new ARC('91.200.101.57', 'UFO', 2304);
        } catch (Exception $e) {
            echo "Ups! Something went wrong: {$e->getMessage()}";
        }
    }
    return $rcon;
}

function rcon_ban($uid, $type = 'steam')
{
    $rc = rcon_connect();
}

//-- BEGUIDs generieren

$sql = "SELECT * from players WHERE `beguid` = '0'";
$result = mysql_query($sql);
while ($rows = mysql_fetch_array($result, MYSQL_ASSOC)) {
    $pid = $rows['pid'];
    $beid = getBEGuid($pid);
    $uid = $rows['uid'];
    $sql = "UPDATE `players` SET `beguid` = '$beid' WHERE uid = '$uid'";
    mysql_query($sql);
}

function getBEGuid($steamid64)
{
    //$steamID = '76561198123551457';
    $temp = '';
    for ($i = 0; $i < 8; $i++) {
        $temp .= chr($steamid64 & 0xFF);
        $steamid64 >>= 8;
    }
    $return = md5('BE' . $temp);
    return $return;
}

function isOnline($steamid64)
{
    $beid = getBEGuid($steamid64);
    $players = array();
    try {
        $rcon = new ARC('91.200.101.57', 'UFO', 2304);

        $players = $rcon
            ->getPlayersArray();
        $rcon->disconnect();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $online = '---';

    foreach ($players as $player) {
        if ($player['3'] == $beid) {
            $online = $player['0'];
        }
    }
    return $online;
}


//var_dump(rcon_connect());

//echo isOnline('76561198234900760');

//include 'verifyPanel';
//Rconconnect();
//ban funktion
$rcon = rcon_connect();
if (isset($_POST['banadd'])) {
    session_start();
    
    $guid = $usr_arr['beguid'];
    $banlenraw = intval($_POST['ban_len_val']);
    $banlenunit = $_POST['ban_len_unit'];
    switch ($banlenunit) {
        case 0:
            $bantime = 0;
            $banlenstr = "perm";
            break;
        case 1:
            $bantime = $banlenraw;
            $banlenstr = $banlenraw . " Minuten";
            if ($banlenraw == 1) {
                $banlenstr = mb_substr($banlenstr, 0, -1);
            }
            break;
        case 60:
            $bantime =  $banlenraw * 60;
            $banlenstr = $banlenraw . " Stunden";
            if ($banlenraw == 1) {
                $banlenstr = mb_substr($banlenstr, 0, -1);
            }
            break;
        case 1440:
            $bantime = $banlenraw * 1440;
            $banlenstr = $banlenraw . " Tage";
            if ($banlenraw == 1) {
                $banlenstr = mb_substr($banlenstr, 0, -1);
            }
            break;
        case 10080:
            $bantime = $banlenraw * 10080;
            $banlenstr = $banlenraw . " Wochen";
            if ($banlenraw == 1) {
                $banlenstr = mb_substr($banlenstr, 0, -1);
            }
            break;
        case 40320:
            $bantime = $banlenraw * 40320;
            $banlenstr = $banlenraw . " Monate";
            if ($banlenraw == 1) {
                $banlenstr = mb_substr($banlenstr, 0, -1);
            }
            break;
        case 525600:
            $bantime = $banlenraw * 525600;
            $banlenstr = $banlenraw . " Jahre";
            if ($banlenraw == 1) {
                $banlenstr = mb_substr($banlenstr, 0, -1);
            }
            break;
        default:
            $bantime = 0;
    };
    $reason = $_POST['ban_reason'] . ' | ' . $banlenstr . ' | ' . $_SESSION['name'];
    //echo $_SESSION['name'];
    //echo '<br />';
    //var_dump($reason);
    //echo '<br />';
    //var_dump(intval($bantime));
    $addBan = $rcon->addBan($guid, $reason, $bantime);
    $check = $rcon->loadBans();
    //var_dump($guid);
    $lol = $rcon->getBansArray();
    //var_dump($lol);
    $rcon->sayGlobal("Ein spieler wurde gebannt!");
};

if (isset($_POST['banremove'])) {
    try {
        $check = $rcon->getBansArray();
        foreach ($check as $v) {
            //var_dump($v);
            if ($v[1] == $usr_arr['beguid']) {
                $rcon->removeBan(intval($v[0]));
                //echo 'entbannt ' . $v[0] . '<br />';
            }
        }
    } catch (Exception $e) {
        //echo 'Exception abgefangen: ',  $e->getMessage(), "\n";
    }

    //$banid=       $guid

    //$removeban=removeBan($bid)
}
