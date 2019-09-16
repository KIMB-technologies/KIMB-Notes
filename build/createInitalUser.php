<?php
/**
 * Skript zur Usererstellung im Docker-Container,
 * erstellt User, falls nicht vorhanden,
 * schreibt immer das Passwort neu.
 * 
 * Erstellt default Ordner im /data/ Verzeichnis, falls dieser leer ist.
 * 
 * Erstellter User ist immer ein Admin.
 */
if( !is_dir( '/php-code/data/user' ) || !is_dir( '/php-code/data/notes' ) ){
	exec( 'mv /data-dir-default/* /php-code/data/' );
	exec('chown -R www-data:www-data /php-code/data/');
}

if( !empty( $_ENV['USER_name'] ) && !empty( $_ENV['USER_password'] ) ){
	
	// Daten extrahieren
	$password = $_ENV['USER_password'];
	$name = $_ENV['USER_name'];

	//JSON-Klasse
	define("Notestool", "OKAY");
	require_once( '/php-code/php/json.php' );
	require_once( '/php-code/php/func.php' );
	//Pfad
	JSONReader::changepath( '/php-code/data/' );

	//Passwort Hash
	$salt = makepassw( 40 );
	$passhash = hash( 'sha256', hash( 'sha256', $password ) . '+' . $salt );

	//Userdaten laden
	$userlist = new JSONReader( 'userlist' );

	//User vorhanden?
	$index = $userlist->searchValue( [], $name, 'username' );
	if( $index !== false ){
		//nur Passwort neu schreiben!
		$userlist->setValue( [$index, 'password'], $passhash );
		$userlist->setValue( [$index, 'salt'], $salt );

		echo "Set user password." . PHP_EOL;
	}
	//neuer User
	else{
		//UserID Liste laden
		$list = new JSONReader( '/user/userslist' );

		//Neue ID erstellen
		do{
			$newid = makepassw(30, 1);
		}while( $list->searchValue( [] , $newid) !== false );
		
		//neue ID merken
		$list->setValue( [null], $newid );

		//Neuen User erstellen
		$userarray = array(
			"username" => $name,
			"password" => $passhash,
			"salt" => $salt,
			"userid" => $newid,
			"admin" => true,
			"authcodes" => array()
		);

		//User erstellen
		$userlist->setValue( [null], $userarray );

		echo "Created user." . PHP_EOL;

		unset($list);
	}

	unset($userlist);

	exec('chown www-data:www-data /php-code/data/userlist.json* /php-code/data/user/userslist.json*');
}
?>