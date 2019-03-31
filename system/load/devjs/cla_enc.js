/**
 * Diese Klasse dient Notizen zu ver- und entschluesseln.
 */
class NotesEncrypter{

	/**
	 * >> Konstruktor <<
	 * lädt Daten aus dem localStorage sofern verfügbar.
	 */
	constructor(){
		if( localStorage.getItem("notes_encrypt_data") !== null ){
			this.data = JSON.parse( localStorage.getItem("notes_encrypt_data") );
		}
		else{
			this.data = {
				password : "",
				status : false
			};
		}	
	}

	setNotesPassword( password ){
		this.data.password = sjcl.codec.hex.fromBits( sjcl.hash.sha256.hash( password + "bu79ubwqrzbIgbuwiw" ) );
		this.data.status = true;
		this.saveLocalStorage();
	}

	requestForPassword(){
		if(!this.data.status){
			errorMessage( "Es ist kein Passwort zum Verschlüsseln von Notizen angegeben.", 20 );
		}
	}

	encryptNote(text){
		if(!this.data.status){
			return text;
		}
		return JSON.stringify( sjcl.encrypt(this.data.password, text ) );
	}

	decryptNote(text){
		if(!this.data.status){
			return text;
		}
		return sjcl.decrypt(this.data.password, JSON.parse( text ) );
	}

	/**
	 * >> PRIVATE <<
	 * Die internen Daten im localStorage ablegen.
	 */
	saveLocalStorage(){
		localStorage.setItem("notes_encrypt_data", JSON.stringify( this.data ) );
	}
}