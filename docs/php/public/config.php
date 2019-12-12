<?php
session_start();
$meduser = $_SESSION['mediclevel'];
$copuser = $_SESSION['coplevel'];
$copusernav = $_SESSION['coplevel'];
$medusernav = $_SESSION['mediclevel'];




//Db Connection
$host = 'localhost';
$user = 'fun';
$db = 'Allstars';
$pass = 'Aa3a6d6_';

$connect = @mysql_connect($host, $user, $pass) or die('Database could not connect');
$select = @mysql_select_db($db, $connect) or die('Database could not select');

//Get einträge
$uid = $_GET['uid'];
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


if (isset($_POST['submitlvl'])) {
	$coprank = $_POST['cop'];
	$adminrank = $_POST['admin'];
	$medrank = $_POST['med'];
	$changelvl = mysql_query("UPDATE `players` SET `coplevel` = '$coprank',`mediclevel` = '$medrank'  WHERE `players`.`uid` = '$uid'; ");
	$admincange = mysql_query("UPDATE `players` SET `adminlevel`= '$adminrank' WHERE `players`.`uid` = '$uid';");
};

$copsee = $usr_arr['coplevel'];
$medsee = $usr_arr['mediclevel'];
$adminsee = $usr_arr['adminlevel'];

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

