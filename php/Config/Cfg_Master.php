<?php
define('Crew_ROOT_OFFSET', '');

define('Crew_DOC_ROOT', $_SERVER["DOCUMENT_ROOT"].Crew_ROOT_OFFSET);



include_once(Crew_DOC_ROOT.'/php/Config/Cfg_Database.php');
include_once(Crew_DOC_ROOT.'/php/Config/Cfg_Abfrage.php');
include_once(Crew_DOC_ROOT.'/php/Config/Cfg_Ranks.php');
include_once(Crew_DOC_ROOT.'/php/Config/Cfg_Lizenzen.php');
include_once(Crew_DOC_ROOT.'/php/Config/Cfg_cars.php');
include_once(Crew_DOC_ROOT.'/php/Config/Cfg_update.php');
include_once(Crew_DOC_ROOT.'/php/Functions/fn_lizenz.php');
include_once(Crew_DOC_ROOT.'/steamauth/userInfo.php');

?>
