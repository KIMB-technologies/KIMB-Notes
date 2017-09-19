# KIMB-Notes

KIMB-Notes ist ein einfaches Notiztool, welches es erlaubt Notizen online zu erstellen, zu teilen und zu organisieren.

Die Notizen werden in Markdown erstellt und sind über das responsive Interface der WebApp auf allen Geräten erreichbar.

*Geplante Features sind u.a. Dateianhänge und vollständige Verschlüsselung.*

### Entwicklung und Features
Siehe [Issues](https://github.com/kimbtech/KIMB-Notes/issues)

### Testen
> Für die Veröffentlichung soll eine Testversion mittles GitHub Pages realisiert werden, welche keine
> PHP-API benutzt und somit nichts speichern kann.

## Technisch
Das Tool besteht aus einem HTML, CSS & JavaScript Client, welcher per AJAX mit einer PHP-API kommuniziert.

Um auch Verbindungsprobleme ausgleichen zu können wird der `localStorage` genutzt.
Außerdem ist die PHP-API so konzipiert, dass automatisch Notizverläufe angelegt werden und somit alles wieder
zurück geholt werden kann.

## Veröffentlichung
Nach Erreichen der Version 1 ist eine Veröffentlichung des Tools geplant.
Dazu wird noch ein [Installer](https://github.com/kimbtech/KIMB-Notes/issues/9) integriert.

## Aufbau des Repository
- `/system/` Hauptsystem
- `/install/` Installer
- `/js-libs/` benötigte JS-Bibilotheken (extern und somit CDN-Nutzung möglich)
