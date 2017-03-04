<?php

defined("Notestool") or die('No clean Request');

//Userdaten laden
$userlist = new JSONReader( 'userlist' );

//Userid
//	=> Konvention nur kleine Buchstaben!
$userid = preg_replace( '/[^a-z]/', '', $_POST['userid'] );

//Login des Admin pruefen
if( checkAdminLogin( $userid, $userlist ) ){

	//AUfgabe herausfinden
	$art = $_POST['art'];

	//Aufgabe okay?
	if( in_array( $art, array( 'list', 'add', 'del' ) ) ){

		//Welche Aufgabe genau
		if( $art === 'list' ){
			//Liste aller User erstellen
			$out = array();
			foreach( $userlist->getArray() as $user ){
				$out[] = array(
					'username' => $user['username'],
					'userid' => $user['userid'],
					'admin' => $user['admin']
				);
			}
			add_output( array( 'list' => $out, 'salt' => makepassw( 40 ) ) );
		}
		elseif( $art === 'add' ){

			//POST Check
			if(
				check_params( POST, array(
						'userid' => 'strAZaz09',
						'art' => 'strAZaz09',
						'user' => array(
							'name' => 'strAZaz09',
							'admin' => 'strAZaz09',
							'password' => 'strAZaz09',
							'salt' => 'strAZaz09'
						)

					)
				)
			){
				//UserID Liste laden
				$list = new JSONReader( '/user/userslist' );

				//Neue ID erstellen
				do{
					$newid = makepassw(30, 1);
				}while( $list->searchValue( [] , $newid) !== false );

				//neue ID merken
				$list->setValue( [null], $newid );

				//Admin Rechte
				$admin = ( $_POST['user']['admin'] === 'true' ) ? true : false ;

				//Neuen User erstellen
				$userarray = array(
					"username" => $_POST['user']['name'],
					"password" => $_POST['user']['password'],
					"salt" => $_POST['user']['salt'],
					"userid" => $newid,
					"admin" => $admin,
					"authcodes" => array()
				);

				//User erstellen
				$userlist->setValue( [null], $userarray );

				//Ausgabe
				add_output( array( 'done' => true ) );
			}
			else{
				add_error( 'Invalid Data' );
			}
		}
		elseif( $art == 'del' ){
			//UserId des zu entfernenden Users
			$deluserid = preg_replace( '/[^a-z]/', '', $_POST['deluserid'] );
			
			//UserId okay?
			if( !empty( $deluserid ) ){
				//User suchen
				$id = $userlist->searchValue( [], $deluserid, 'userid' );
				//gefunden?
				if( $id !== false ){
					//Löschen
					$userlist->setValue( [$id], null );
					//Ausgabe
					add_output( array( 'done' => true ) );
				}
				else{
					add_error( 'User not found' );
				}
			}
			else{
				add_error( 'Invalid Data' );
			}
		}
	}
	else{
		add_error( 'Unknown Task' );	
	}
}
else{
	add_error( 'Not allowed' );
}

