<?php
include_once 'config.php';
include_once 'ts3admin.php';

function ts3_connect()
{
    global $ts3, $ts3_connect;

    if ($ts3 == null || $ts3_connect['success'] != 1) {
        $ts3 = new ts3admin(TS_IP, TS_QUERY_PORT);

        $ts3_connect = $ts3->connect();
        if (
            $ts3->selectServer(TS_VSERV_PORT)
        ) { } else {
            error("Der Server konnte nicht ausgewählt werden.");
        }
        $ts3->login(TS_QUERY_USER, TS_QUERY_PASS);
        $ts3->setName(FCPCONTROL_TS3NICK_IDLE);
    }
}
ts3_connect();
var_dump($ts3_connect);

function ts3_verify($dbid, $type, $tsid, $force = false)
{
    
    global $ts3, $ts3_connect, $user;
    echo $tsid;
    if (empty($dbid) || !isset($dbid) || empty($tsid) || !isset($tsid)) {
    //    error("Fehler mit den IDs");
    }
    //if (mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM dbid_ts3clid WHERE ts3uid = '" . $tsid . "'"))['COUNT(*)'] != "0" && !$force) {
    //    error("ID schon eingetragen");
    //}

    ts3_connect();
   
    

    $clientDBlist = $ts3->clientDblist(0, 999999999999999999);
    $clientlist = $ts3->clientlist();

    $foundPlayer = false;
    $ts3->setName(FCPCONTROL_TS3NICK_VERIFY);

    

    foreach ($clientDBlist['data'] as $client) {
        if ($client['client_unique_identifier'] == $tsid) {
            $tsdbid = $client['cldbid'];echo 'ye';

            if ($type == "player") {
                
                $ts3->serverGroupAddClient(TS_SERVERGROUP_CIV, $tsdbid);
                $ts3->clientDbEdit($tsdbid, array('client_description' => $dbid));
            } else {
                $ts3->serverGroupAddClient(TS_SERVERGROUP_BOT, $tsdbid);
                $ts3->clientDbEdit($tsdbid, array('client_description' => "b" . $dbid));
            }

            foreach ($clientlist['data'] as $client) {
                if ($client['client_database_id'] == $tsdbid) {
                    $clientid = $client['clid'];

                    $ts3->clientPoke($clientid, FCPCONTROL_TS3MSG_VERIFY);
                }
            }
            $foundPlayer = true;
        } else {
           
        }
    }
    $ts3->setName(FCPCONTROL_TS3NICK_IDLE);

    

    if ($foundPlayer) {
        $u_mainrole = $user['mainrole'];
        $u_dbname = $user['dbname'];

        /*if ($type == "player"){
           $sql = "INSERT INTO dbid_ts3clid (`dbid`,`ts3uid`) VALUES ($dbid,'$tsid')";
            mysql_query($db_acp, $sql);

            $sql = "INSERT INTO comments (`player`,`text`,`author`) VALUES ('$dbid','Verified Player on TeamSpeak3 : $tsid','$u_mainrole:$u_dbname')";
            mysql_query($db_acp, $sql);

            $sql = "INSERT INTO acp_log (user, action) VALUES ('$u_dbname','TSVerification:$dbid:$tsid')";
           mysql_query($db_acp, $sql);
        } else {
            $sql = "INSERT INTO dbid_ts3clid (`dbid`,`ts3uid`,`type`) VALUES ($dbid,'$tsid','$type')";
            mysql_query($db_acp, $sql);

            $sql = "INSERT INTO comments (`player`,`text`,`author`) VALUES ('$dbid','Verified Bot on TeamSpeak3 : $tsid','$u_mainrole:$u_dbname')";
            mysql_query($db_acp, $sql);

            $sql = "INSERT INTO acp_log (user, action) VALUES ('$u_dbname','TSVerificationBot:$dbid:$tsid')";
            mysql_query($db_acp, $sql);
        }*/
    } else {
        //error ("ID wurde nicht gefunden");
    }
}
