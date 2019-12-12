<?php
include_once(Crew_DOC_ROOT.'/php/Config/Cfg_Master.php');
//Coplevel
if (isset($_POST['submitcoplvl'])) {
    $coprank = $_POST['cop'];

    if ($coplevel_get < $coprank) {mysqli_query($db_game,"INSERT INTO crew_rankinfo ( uid, type, Art, rank) VALUES('$uid', 'cop', 'Beförderung', ' $coprank')");}
    if ($coplevel_get > $coprank) {mysqli_query($db_game,"INSERT INTO crew_rankinfo ( uid, type, Art, rank) VALUES('$uid', 'cop', 'Degradierung', ' $coprank')");}

    mysqli_query($db_game,"UPDATE `players` SET `coplevel` = '$coprank'  WHERE `players`.`uid` = '$uid'; ");
    mysqli_query($db_game,"INSERT INTO crew_log ( name, type, log) VALUES('$name', 'cop', 'der rang von $name_get wurde von $coplevel_get auf $coprank verändert ')");
    header('Location:/intern/cop/Spieler/info.php/?uid=' . $uid. '');
}
//copnote
if (isset($_POST['notecop']) && $_POST['notecop'] == 'Abschicken' ) {
	$notiz = $_POST['note'];
	$insertlog = mysqli_query($db_game,"INSERT INTO crew_note ( uid, type, note, ersteller) VALUES('$uid', 'cop', '$notiz', '$name')");
	$copnotelog = mysqli_query($db_game,"INSERT INTO crew_log ( name, type, log) VALUES('$name', 'cop', 'Bei $name_get wurde eine Notiz erstellt')");
	header('Location:/intern/cop/Spieler/info.php/?uid=' . $uid. '');
}else{

}

//copkummerkasten
if (isset($_POST['sendcoptext'])) {
	$kummer = $_POST['coptext'];
	$insertkummer = mysqli_query($db_game,"INSERT INTO crew_messege (uid , Text, type) VALUES('$uiduser', '$kummer','cop')");
	$copnotelog = mysqli_query($db_game,"INSERT INTO crew_log ( name, type, log) VALUES('$name', 'cop', 'hat sein Kummer rausgelassen')");
	header('Location:/Public/cop/melden');
}else{

}


//medlevel
if (isset($_POST['submitmedlvl'])) {
    $medrank = $_POST['med'];

    if ($mediclevel_get < $medrank) {mysqli_query($db_game,"INSERT INTO crew_rankinfo ( uid, type, Art, rank) VALUES('$uid', 'med', 'Beförderung', ' $medrank')");}
    if ($mediclevel_get > $medrank) {mysqli_query($db_game,"INSERT INTO crew_rankinfo ( uid, type, Art, rank) VALUES('$uid', 'med', 'Degradierung', ' $medrank')");}

    mysqli_query($db_game,"UPDATE `players` SET `mediclevel` = '$medrank'  WHERE `players`.`uid` = '$uid'; ");
    mysqli_query($db_game,"INSERT INTO crew_log ( name, type, log) VALUES('$name', 'med', 'der rang von $name_get wurde von $mediclevel_get auf $medrank verändert ')");
    header('Location:/intern/med/Spieler/info.php/?uid=' . $uid. '');
}
//mednote
if (isset($_POST['notemed']) && $_POST['notemed'] == 'Abschicken' ) {
	$notiz = $_POST['notem'];
	$insertlog = mysqli_query($db_game,"INSERT INTO crew_note ( uid, type, note, ersteller) VALUES('$uid', 'med', '$notiz', '$name')");
	$mednotelog = mysqli_query($db_game,"INSERT INTO crew_log ( name, type, log) VALUES('$name', 'med', 'Bei $name_get wurde eine Notiz erstellt')");
	header('Location:/intern/med/Spieler/info.php/?uid=' . $uid. '');
}else{

}

//medkummerkasten
if (isset($_POST['sendmedtext'])) {
	$kummer = $_POST['medtext'];
	$insertkummer = mysqli_query($db_game,"INSERT INTO crew_messege (uid , Text, type) VALUES('$uiduser', '$kummer','med')");
	$mednotelog = mysqli_query($db_game,"INSERT INTO crew_log ( name, type, log) VALUES('$name', 'med', 'hat sein Kummer rausgelassen')");
	header('Location:/Public/med/melden');
}else{

}



 ?>
