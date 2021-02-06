//Allgemein fuer Userid und Namen
var userinformation = { "name": null, "id": null, "admin" : false, "authcode" : null };

//Speicher fuer Timeout
var errorMessageTimeOut = null;

//Offline oder online?
var systemOfflineMode = false;
var systemOfflineManager = new OfflineManager();

//Notizen verschluesseln
var systemEncrypter = new NotesEncrypter();

//REST oder Session API?
var systemRESTAPI = false;

/**
 * Aktuellen DOM-Bereich sichtbar machen
 * @param review {String} Bereich (aus: login, noteview, noteslist, globalloader)
 */
function review( enabled ){
	//erstmal alles weg
	$( "div.login" ).addClass( "disable" );
	$( "div.noteview" ).addClass( "disable" );
	$( "div.noteslist" ).addClass( "disable" );
	$( "div.globalloader" ).addClass( "disable" );

	//eins wieder hin
	$( "div." + enabled ).removeClass( "disable" );
}

/**
 * globale Fehlermeldung anzeigen
 * @param {String} message Text der Fehlermeldung (bei null wird Fehlermeldung entfernt!)
 * @param {int} remove (optional) Wann soll die Nachricht wieder verschwinden (Sekunden oder false; Standard 10)
 */
function errorMessage( message, remove ){
	//altes Timeout weg
	if( errorMessageTimeOut !== null ){
		clearTimeout( errorMessageTimeOut );
	}
	if( message === null ){
		//Meldung weg
		$( "div.global.error.message" ).html( "Fehler!" );
		$( "div.global.error.message" ).addClass( "disable" );
	}
	else{
		//Remove gegeben?
		if( typeof remove == "undefined" ){
			remove = 10;
		}
		//Meldung setzen
		$( "div.global.error.message" ).html( message );
		//Medlung anzeigen
		$( "div.global.error.message" ).removeClass( "disable" );

		//Soll Meldung ueberhaupt verschwinden
		if( remove !== false ){
			//per timeOut wieder loeschen
			errorMessageTimeOut = setTimeout( function(){
				//wieder weg
				$( "div.global.error.message" ).addClass( "disable" );
			}, remove * 1000 );
		}
	}
}

/**
 * AJAX Anfrage an Server stellen
 * @param {String} task Aufgabenbereich der Anfage (login, list, view, admin)
 * @param {JSON} post Daten die per POST übertragen werden sollen
 * @param {function (JSON)} callback (optional) Funktion nach erfolgreicher Anfage, JSON Rückgabe als Parameter
 * @param {function (JSON)} errcallback (optional) Funktion bei fehlerhafter Anfrage, JSON Rückgabe wenn möglich
 */
function ajax_request( task, post, callback, errcallback ){
	if( systemRESTAPI && ( task != "share" || task != "login" ) || task == "auth" ){
		var filename = "rest";
		//nicht jeder Request übergibt den Authcode sicher, deshalb hier anfügen!
		if( typeof post["authcode"] == "undefined" || post["authcode"] == null ){
			post["authcode"] = userinformation.authcode;
		}
	}
	else{
		var filename = "ajax";
		if( $("input#usercookieok").length > 0 ){ // cookies ok?
			// not ok, no ajax!
			if( !$("input#usercookieok").prop('checked') || !localStorage.hasOwnProperty('cookie') ){
				//globale Fehlermeldung
				errorMessage('Es wird das Recht benötigt, Cookies abzulegen!', false);

				//Callback vorhanden?
				if( typeof errcallback === "function" ){
					errcallback();
				}
				return;	
			}
		}
	}

	$.post( domain + "/"+ filename +".php?" + task , post,
		function (data) {
			//Serveranwort okay?
			if( typeof data === "object" ){
				//Fehler?
				if( data.status === 'error' ){
					//log auf Konsole
					console.log( data.error );
				}
				else{
					if( systemOfflineMode ){
						//remove force reconnect if clicked on errormsg 
						$("div.global.error.message").off('click');
					}
					//hier online
					systemOfflineMode = false;
					systemOfflineManager.statusChanged( false );

					//Fehlermeldungen wegnehmen
					errorMessage(null);
				}
				//Callback vorhanden?
				if( typeof callback === "function" ){
					callback( data );
				}
			}
			else{
				//globale Fehlermeldung
				errorMessage('Sever antwortet nicht korrekt!', false);

				//Callback vorhanden?
				if( typeof errcallback === "function" ){
					errcallback( data );
				}
			}
		}
	).fail( function() {
		//globale Fehlermeldung
		errorMessage('Offlinemodus', false);

		//force reconnect if clicked on errormsg.
		$("div.global.error.message").click( () => {
			errorMessage('Neu verbinden ...', false);
			ajax_request(
				"login",
				{ "status" : userinformation.id },
				() => {},
				() => { errorMessage('Offlinemodus', false);}
			);
		});

		//jetzt offline
		systemOfflineMode = true;
		systemOfflineManager.statusChanged( true );

		//Callback vorhanden?
		if( typeof callback === "function" ){
			callback( { data : {} } );
		}
	} );
}

/**
 * Dialog anzeigen
 * @param {String} cont Inhalt des Dialogs
 * @param {JSON} buttons (optional) Buttons auf dem Dilog {Name: Callback}
 * 						(im Callback $(this).dialog("close"); zum schließen)
 * @param {String} title (optional) Titel des Dialogs
 * @returns {function} Inhalt ändern (Parameter ist neuer Inhalt)
 */
function confirmDialog(cont, buttons, title){
	if( typeof buttons == "undefined" ){
		var buttons = {
			"OK" : function (){},
			"Abbrechen" : function (){}
		};
	}
	if( typeof title == "undefined" ){
		var title = "Wichtig!"
	}

	//Element anzeigen
	$("div.globalDialog").removeClass("disable");
	//Dialog erstellen
	$("div.globalDialog").dialog({
		resizable: false,
		height: "auto",
		width: "auto",
		minWidth: 200,
		minHeight: 150,
		modal: true,
		title: title,
		close: function () {
			$("div.globalDialog").html("");
			$("div.globalDialog").addClass("disable");
		},
		position: {
			my: "center", at: "center", of: $("div.main")
		},
		buttons : buttons
	});

	/**
	 * HTML Inhalt des Dialogs ändern
	 * @param {String} content neuer Inhalt
	 */
	function changeHTML( content ){
		$("div.globalDialog").html( content );
	}
	changeHTML(cont);

	return changeHTML;
}

/* Different Design for WebApp (Homescreen-Mode) */
let isOpenedAsApp = ((("standalone" in window.navigator) && window.navigator.standalone == true) || (window.matchMedia('(display-mode: standalone)').matches));
function displayAsApp(){
	$('body').css({
		background: 'var(--as-app-color)'
	});
	$('div.main').css({
		border: 'none',
		'box-shadow': 'none'
	});
	$('h1').css({
		'font-size': '1.2em'
	});
	$('div.logout button#logout, div.logout span.small, div.footer a').css({
		display: 'none'
	});
	$('div.logout').css({
		height: '26px',
		width: '48px',
		position: 'initial'
	});
	$("div.logout").removeClass("box");
}

