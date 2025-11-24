<?php
/**
 * --------------------------------------------------------------
 * File: mits_carrier_data_privacy.php
 * Created by PhpStorm
 * Date: 25.05.2018
 * Time: 14:31
 *
 * Author: Hetfield
 * Copyright: (c) 2018 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 *
 * Released under the GNU General Public License
 * --------------------------------------------------------------
 */

defined('MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS') || define('MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS', 'Deutsche Post AG, Charles-de-Gaulle-Straße 20, 53113 Bonn');

define('MODULE_MITS_CARRIER_DATA_PRIVACY_CHECKOUT_TITLE','Einwilligung zur Datenerhebung');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_CHECKOUT_TEXT',
  'Ich bin damit einverstanden, dass meine E-Mail-Adresse bzw. meine Telefonnummer an <span id="mits_carrier_data">' . MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS . '</span>  
    weitergegeben wird, damit der Paketdienstleister vor der Zustellung der Ware zum Zwecke der Abstimmung eines Liefertermins per E-Mail oder 
    Telefon Kontakt mit mir aufnehmen bzw. Statusinformationen zur Sendungszustellung &uuml;bermitteln kann. 
    Meine diesbez&uuml;glich erteilte Einwilligung kann ich jederzeit widerrufen.');

define('MODULE_MITS_CARRIER_DATA_PRIVACY_ORDER_MAIL_TEXT',
  'Ich bin damit einverstanden, dass meine E-Mail-Adresse bzw. meine Telefonnummer an %s 
    weitergegeben wird, damit der Paketdienstleister vor der Zustellung der Ware zum Zwecke der Abstimmung eines Liefertermins per E-Mail oder 
    Telefon Kontakt mit mir aufnehmen bzw. Statusinformationen zur Sendungszustellung &uuml;bermitteln kann. 
    Meine diesbez&uuml;glich erteilte Einwilligung kann ich jederzeit widerrufen.');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_ORDER_MAIL_TEXT_PLAIN',
  'Ich bin damit einverstanden, dass meine E-Mail-Adresse bzw. meine Telefonnummer an %s 
    weitergegeben wird, damit der Paketdienstleister vor der Zustellung der Ware zum Zwecke der Abstimmung eines Liefertermins per E-Mail oder 
    Telefon Kontakt mit mir aufnehmen bzw. Statusinformationen zur Sendungszustellung übermitteln kann. 
    Meine diesbezüglich erteilte Einwilligung kann ich jederzeit widerrufen.');

define('MODULE_MITS_CARRIER_DATA_PRIVACY_NOT_ACCEPTED_TEXT',
  'Ich bin <strong>nicht</strong> damit einverstanden, dass meine E-Mail-Adresse bzw. meine Telefonnummer an %s 
    weitergegeben wird, damit der Paketdienstleister vor der Zustellung der Ware zum Zwecke der Abstimmung eines Liefertermins per E-Mail oder 
    Telefon Kontakt mit mir aufnehmen bzw. Statusinformationen zur Sendungszustellung &uuml;bermitteln kann.');

define('MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_CANCEL','Einwilligung zur Datenweitergabe an den Versanddienstleister widerrufen &raquo;');
define('MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_ACCEPT','Einwilligung zur Datenweitergabe an den Versanddienstleister erteilen &raquo;<br /><small>(Meine diesbezüglich erteilte Einwilligung kann ich jederzeit widerrufen.)</small>');
define('MITS_CARRIER_DATA_PRIVACY_LINK_CONFIRM_SUBMIT_TEXT','M&ouml;chten Sie Ihre Einwilligung zur Datenweitergabe an Versanddienstleister wirklich &auml;ndern?');
define('MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_CANCEL_MESSAGE','Ihre Einwilligung zur Datenweitergabe an den Versanddienstleister wurde erfolgreich widerrufen!');
define('MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_ACCEPT_MESSAGE','Ihre Einwilligung zur Datenweitergabe an den Versanddienstleister wurde erfolgreich erteilt!');

define('MITS_CARRIER_DATA_PRIVACY_MAILSUBJECT','Update bei Einwilligung zur Datenerhebung an Versanddienstleister / Bestellung Nr.: ');
define('MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_INTRO','Die Einwilligung zur Datenweitergabe an Versanddienstleister wurde widerrufen. Betroffen ist die Bestell-Nr.: ');
define('MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_END','Hinweis: Details zum aktuellen Status finden Sie im Adminbereich des Shops auf der Detailseite der Bestellung!');
define('MITS_CARRIER_DATA_PRIVACY_MAILTEXT_ACCEPT_INTRO','Die Einwilligung zur Datenweitergabe an Versanddienstleister wurde erteilt. Betroffen ist die Bestell-Nr.: ');
define('MITS_CARRIER_DATA_PRIVACY_MAILTEXT_ACCEPT_END','Hinweis: Details zum aktuellen Status finden Sie im Adminbereich des Shops auf der Detailseite der Bestellung!');

define('MITS_CARRIER_DATA_PRIVACY_ENTRY_ERROR','Eine oder mehrere Angaben passen nicht zur Bestellung oder die Bestellung ist nicht vorhanden! Bitte &uuml;berpr&uuml;fen Sie Ihre Eingaben und versuchen Sie es erneut. Bei Problemen mit dem Formular wenden Sie sich per E-Mail an unseren Support unter <a href="mailto:'.STORE_OWNER_EMAIL_ADDRESS.'">'.STORE_OWNER_EMAIL_ADDRESS.'</a>');
define('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_NOT_AVAILABLE','FEHLER: Diese Bestellung existiert nicht in unserem System oder es ist keine Einwilligung zur Datenweitergabe an Versanddienstleister vorhanden, welche widerrufen werden k&ouml;nnte.');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_CANCEL_TITLE','Einwilligung zur Datenerhebung widerrufen');
define('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_INFO','Hiermit wiederrufe ich meine Einwilligung zur Datenerhebung an Versanddienstleister f&uuml;r die Bestellung-Nr.:  %s mit sofortiger Wirkuung. Der Paketdienstleister kann damit vor der Zustellung der Ware zum Zwecke der Abstimmung eines Liefertermins per E-Mail oder Telefon <strong>keinen</strong> Kontakt mit mir aufnehmen bzw. Statusinformationen zur Sendungszustellung &uuml;bermitteln.');
define('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_EMAILADDRESS','E-Mail-Adresse der Bestellung:');
define('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_CONFIRM_EMAILADDRESS','E-Mail-Adresse wiederholen:');
define('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_DELIVERYPOSTCODE','Postleitzahl der Lieferadresse:');
