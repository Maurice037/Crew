<?php
//Db Connection
$host = 'localhost';
$user = 'fun';
$db = 'Allstars';
$pass = 'Aa3a6d6_';

$connect = @mysql_connect($host, $user, $pass) or die('Database could not connect');
$select = @mysql_select_db($db, $connect) or die('Database could not select');

//Get einträge
$uid = $_GET['uid'];
$aname = $_SESSION['name'];
$id = $_GET['id'];

//gang einträge
$gangres = mysql_query("SELECT `players`.`name` as `ownername`, `gangs`.`id`, `gangs`.`owner`, `gangs`.`name`, `gangs`.`Hive`, `gangs`.`maxmembers`, `gangs`.`bank`, `gangs`.`active`, `gangs`.`insert_time` FROM `gangs`, `players` WHERE `gangs`.`id`='$id' AND `players`.`pid` = `gangs`.`owner`");
// var_dump($gangres);
$gang_arr = mysql_fetch_array($gangres);

$res = mysql_query("SELECT * FROM players WHERE uid='$uid'");
$usr_arr = mysql_fetch_array($res);
$resa = mysql_query("SELECT * FROM players ");
$a_arr = mysql_fetch_array($resa);
//var_dump($res);
//var_dump($value);
$bank = number_format ($usr_arr['bankacc']);
$cash = number_format ($usr_arr ['cash']);
$money = $usr_arr['cash'] + $usr_arr['bankacc'];
$medbalken = $medsee;
$coplvlmax = 10;
$medlvlmax = 5;
$name = $usr_arr['name'];
$zeit = explode(",", $usr_arr['playtime']);
$time = preg_replace('![^0-9]!', '', $zeit);
$coptime = ($time[0] / 60);
$medictime = ($time[1] / 60);
$civtime = ($time[2] / 60);
$gtime = $coptime + $medictime + $civtime;
$civ_licenses = $usr_arr['civ_licenses'];
$cop_licenses = $usr_arr['cop_licenses'];
$med_licenses = $usr_arr['med_licenses'];
$cop_ausbildung = $usr_arr['crew_cop_ausbildung'];
$t = date('Y-m-d H:i:s');
$setmelden= $usr_arr['melden'];
$copsee = $usr_arr['coplevel'];
$medsee = $usr_arr['mediclevel'];
$adminsee = $usr_arr['adminlevel'];

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



$ranks = [
	'med' => [
		'nicht eingestellt',
		'Praktikant',
		'Auszubildener',
		'Rettungsassistent',
		'Rettungssanitäter',
		'Rettungspilot',
		'Assistentsarzt',
		'Oberarzt',
		'Chefarzt',
		'Ausbilder',
		'Vorstand'
	],
	'cop' => [
		'nicht eingestellt',
		'Praktikant',
		'Anwärter',
		'Meister',
		'Obermeister',
		'Hauptmeister',
		'Kommissar',
		'Oberkommissar',
		'Hauptkommissar',
		'Ausbilder',
		'Leitung'
	],
	'admin' => [
		'nicht im Team',
		'Fraktionsleitungen',
		'Wächter',
		'Entwickler',
		'Supporter',
		'SupporterLeitung',
		'Communitymanager',
		'Personalplaner',
		'Entwicklerleitung',
		'Admin',
		'Bürgermeister'	

	]
];

$licenses = [
    "civ" => [
		['driver',"Führerschein"],
		['boat',"Bootsschein"],
		['pilot',"Pilotenschein"],
		['trucking',"LkwSchein"],
		['gun',"Waffenschein"],
		['dive',"tauchen"],
		['home',"haus"],
		['oil',"öl"],
		['diamond',"dias"],
		['salt',"salz"],
		['sand',"sand"],
		['iron',"eisen"],
		['copper',"kupfer"],
		['cement',"zement"],
		['medmarijuana',"medweed"],
		['cocaine',"kokain"],
		['heroin',"herion"],
		['marijuana',"weed"],
		['rebel',"rebelen"],
		['Tabak',"tabak"]
        
    ],
    "med" => [
        ['license_med_mAir',"Pilot"]
    ],
    "cop" => [
		['license_cop_cAir',"Piloten"],
		['license_cop_sek',"SEK-Grundlizenz"],
		['license_cop_SEKB',"SEK-Beamter"],
		['license_cop_SekL',"SEK-Leitung"],
		['license_cop_SekS',"SEK-Sniper"],
		['license_cop_SEKG',"SEK-Geheimdienst"],
		['license_cop_cg',"Bootsschein"]
    ]
];

$Aubildung = [
    "sek" => [
		['driver',"Führerschein"],
    ],
    "med" => [
        ['med_ga',"Grundausbildung"],
		['med_Rp',"Roleplay Ausbildung"],
		['med_Funk',"Funkausbildung"],
		['med_Flug',"Flugausbildung"],
		['med_Doc',"Doktortest"]
    ],
    "cop" => [
		['cop_ga',"Grundausbildung"],
		['cop_Rp',"Roleplay Ausbildung"],
		['cop_Funk',"Funkausbildung"],
		['cop_Flug',"Flugausbildung"],
		['cop_KuT',"Kampf&Taktik"]
    ]
];


if (isset($_POST['submitmedlvl'])) {
	
	$medrank = $_POST['med'];
	$changelvl = mysql_query("UPDATE `players` SET `mediclevel` = '$medrank'  WHERE `players`.`uid` = '$uid'; ");
	$medranglog = mysql_query("INSERT INTO Crew_log ( name, type, log, date) VALUES('$aname', 'med', 'der rang von $name wurde auf $coprank gewechselt', 'time')");
	header('Location:/intern/med/Spieler/info.php/?uid=' . $uid. '');
	
};

if (isset($_POST['copmelden'])) {
	
	$cop=$_POST['cop'];
	$changemelden = mysql_query("UPDATE `players` SET `melden` = '$cop'  WHERE `players`.`uid` = '$uid'; ");
	$copranglog = mysql_query("INSERT INTO Crew_log ( name, type, log) VALUES('$aname', 'cop', '$name wurde aufgefordert')");
	header('Location:/intern/cop/Spieler/info.php/?uid=' . $uid. '');
	
};

if (isset($_POST['submitcoplvl'])) {
    $coprank = $_POST['cop'];
	var_dump($coprank);
    
    if ($copsee < $coprank) {mysql_query("INSERT INTO crew_rankinfo ( uid, type, Art, rank) VALUES('$uid', 'cop', 'Beförderung', ' $copsee -> $coprank')");}
    if ($copsee > $coprank) {mysql_query("INSERT INTO crew_rankinfo ( uid, type, Art, rank) VALUES('$uid', 'cop', 'Degradierung', ' $copsee -> $coprank')");}

    mysql_query("UPDATE `players` SET `coplevel` = '$coprank'  WHERE `players`.`uid` = '$uid'; ");
    mysql_query("INSERT INTO Crew_log ( name, type, log) VALUES('$aname', 'cop', 'der rang von $name wurde auf $coprank gewechselt')");
    header('Location:/intern/cop/Spieler/info.php/?uid=' . $uid. '');
}
var_dump($copsee);



if (isset($_POST['notecop']) && $_POST['notecop'] == 'Abschicken' ) {
	$notiz = $_POST['note'];
	$insertlog = mysql_query("INSERT INTO crew_note ( uid, type, note, ersteller) VALUES('$uid', 'cop', '$notiz', '$aname')");
	$copnotelog = mysql_query("INSERT INTO Crew_log ( name, type, log) VALUES('$aname', 'cop', 'Zu $name wurde eine Notiz erstellt')");
	header('Location:/intern/cop/Spieler/info.php/?uid=' . $uid. '');
}else{
	
}




$copbar = $copsee / (count($ranks['cop'])-1) * 100;
$medbar = $medsee / (count($ranks['med'])-1) * 100;
$adminbar = $adminsee / (count($ranks['admin'])-1) * 100;

if (isset($_POST['moneyset'])) {
	$pbank = $_POST['bankacc'];
	$pcash = $_POST['cash'];
	$setcash = str_replace(",", "", $pcash);
	$setbank = str_replace(",", "", $pbank);
	$changelvl = mysql_query("UPDATE `players` SET `bankacc` = '$setbank',`cash` = '$setcash'  WHERE `players`.`uid` = '$uid'; ");
};

//Ts3
define('TS_IP', '30033');
define('TS_QUERY_PORT', 10011);
define('TS_VSERV_PORT', 10110);
define('TS_QUERY_USER', 'serveradmin');
define('TS_QUERY_PASS', 'D5vKdkRY');

define('FCPCONTROL_TS3NICK_IDLE', "Allstars :: AdminPanel");
define('FCPCONTROL_TS3NICK_VERIFY', "Allstars :: Verifizierung");

define('FCPCONTROL_TS3MSG_VERIFY', "Du wurdest soeben verifiziert. Wir wünschen dir viel Spaß bei Allstars!");


define('TS_SERVERGROUP_BOT',1);
define('TS_SERVERGROUP_CIV',6);


											
?>

