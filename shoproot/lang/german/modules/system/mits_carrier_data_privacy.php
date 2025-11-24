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

$modulname = strtoupper("mits_carrier_data_privacy");

$lang_array = array(
  'MODULE_' . $modulname . '_TITLE'                  => 'MITS_carrier_data_privacy - Einwilligung zur Datenweitergabe an Versanddienstleister <span style="white-space:nowrap;">&copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></span>',
  'MODULE_' . $modulname . '_DESCRIPTION'            => '
    <a href="https://www.merz-it-service.de/" target="_blank">
      <img src="' . (ENABLE_SSL === true ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG . DIR_WS_IMAGES . 'merz-it-service.png" border="0" alt="MerZ IT-SerVice" style="display:block;max-width:100%;height:auto;" />
    </a><br />
    <h3>Geben Sie E-Mail Adressen und/oder Telefonnummern weiter an Versanddienstleister?</h3>
    <h4>&Auml;nderung im Rahmen des Shop-Bestellvorgangs:</h4>
    <p>Sie d&uuml;rfen die vom Kunden erhobene E-Mail-Adresse bzw. Telefonnummer nur dann an einen Dritten weitergeben, 
    wenn Sie die ausdr&uuml;ckliche Einwilligung des betroffenen Kunden in die Weitergabe seiner E-Mail-Adresse eingeholt haben!</p>
    <p>Diese Einwilligung des Kunden kann durch einen entsprechenden Erkl&auml;rungstext bewerkstelligt werden, 
    den der Kunde im Verlauf des Bestellprozesses in Ihrem Online-Shop durch Setzen eines H&auml;kchens mittels Opt-In Checkbox ausdr&uuml;cklich best&auml;tigt.</p>
    <div style="text-align:center;">
      <small>Nur auf Github gibt es immer die aktuellste Version des Moduls!</small><br />
      <a style="background:#6a9;color:#444" target="_blank" href="https://github.com/hetfield74/MITS_Embedded_Videos" class="button" onclick="this.blur();">MITS Embedded Videos on Github</a>
    </div>
    <p>Bei Fragen, Problemen oder W&uuml;nschen zu diesem Modul oder auch zu anderen Anliegen rund um die modified eCommerce Shopsoftware nehmen Sie einfach Kontakt zu uns auf:</p> 
    <div style="text-align:center;"><a style="background:#6a9;color:#444" target="_blank" href="https://www.merz-it-service.de/Kontakt.html" class="button" onclick="this.blur();">Kontaktseite auf MerZ-IT-SerVice.de</strong></a></div>
',
  'MODULE_' . $modulname . '_STATUS_TITLE'           => 'Status',
  'MODULE_' . $modulname . '_STATUS_DESC'            => 'Modul aktivieren',
  'MODULE_' . $modulname . '_MULTIPLE_ACCEPTS_TITLE' => 'Anzahl Videos je Artikel oder Kategorie',
  'MODULE_' . $modulname . '_MULTIPLE_ACCEPTS_DESC'  => 'Geben Sie hier ein, wie viele Video-Eingabefelder Sie in der Artikelmaske oder in der Kategoriebearbeitung ben&ouml;tigen.',
  'MODULE_' . $modulname . '_DEFAULT_ADDRESS_TITLE'  => 'Angepasstes Template?',
  'MODULE_' . $modulname . '_DEFAULT_ADDRESS_DESC'   => 'Wird im Shop ein anderes Template verwendet, als <i>tpl_modified</i> oder <i>tpl_modified_responisve</i>, dann m&uuml;ssen sie zur Darstellung von Videos als zus&auml;tzliche Artikelbilder ihre Templatevorlage f&uuml;r Artikeldetails nach Installationsanleitung anpassen und diese Einstellung auf <i>ja</i> &auml;ndern.',
  'MODULE_' . $modulname . '_UPDATE_AVAILABLE_TITLE' => ' <span style="font-weight:bold;color:#900;background:#ff6;padding:2px;border:1px solid #900;">Bitte Modulaktualisierung durchf&uuml;hren!</span>',
  'MODULE_' . $modulname . '_UPDATE_AVAILABLE_DESC'  => '',
  'MODULE_' . $modulname . '_UPDATE_FINISHED'        => 'Das Modul MITS_carrier_data_privacy wurde aktualisiert.',
  'MODULE_' . $modulname . '_UPDATE_ERROR'           => 'Fehler',
  'MODULE_' . $modulname . '_UPDATE_MODUL'           => 'Modul aktualisieren',
  'MODULE_' . $modulname . '_DELETE_MODUL'           => 'MITS_carrier_data_privacy komplett vom Server entfernen',
  'MODULE_' . $modulname . '_CONFIRM_DELETE_MODUL'   => 'M&ouml;chten sie das Modul MITS_carrier_data_privacy mit allen Dateien wirklich vom Server l&ouml;schen?',
  'MODULE_' . $modulname . '_DELETE_FINISHED'        => 'Das Modul MITS_carrier_data_privacy wurde vom Server gel&ouml;scht.',
);

foreach ($lang_array as $key => $val) {
    defined($key) || define($key, $val);
}
