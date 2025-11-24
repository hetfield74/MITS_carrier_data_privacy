<?php
/**
 * --------------------------------------------------------------
 * File: mits_carrier_data_privacy.php
 * Created by PhpStorm
 * Date: 27.05.2018
 * Time: 15:00
 *
 * Author: Hetfield
 * Copyright: (c) 2018 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 *
 * Released under the GNU General Public License
 * --------------------------------------------------------------
 */

require_once(DIR_FS_LANGUAGES . $_SESSION['language'] . '/admin/' . FILENAME_PARCEL_CARRIERS);

require_once(DIR_FS_LANGUAGES . $_SESSION['language'] . '/admin/' . FILENAME_MODULES);

defined('TABLE_HEADING_CARRIER_ADDRESS') || define('TABLE_HEADING_CARRIER_ADDRESS', 'Anschrift f&uuml;r DSGVO');
defined('TEXT_INFO_CARRIER_ADDRESS') || define('TEXT_INFO_CARRIER_ADDRESS', 'Anschrift des Paketdienstleisters f&uuml;r DSGVO');

defined('BUTTON_EDIT_CARRIER_TO_SHIPPING') || define('BUTTON_EDIT_CARRIER_TO_SHIPPING', 'Zuordnung bearbeiten');
defined('BUTTON_NEW_CARRIER_TO_SHIPPING') || define('BUTTON_NEW_CARRIER_TO_SHIPPING', 'Neue Zuordnung erstellen');

defined('TABLE_HEADING_PRIVACY_FOR_CARRIER') || define('TABLE_HEADING_PRIVACY_FOR_CARRIER', 'Zustimmung zur &Uuml;bermittlung der E-Mail-Adresse/Telefonnummer gem&auml;&szlig; DSGVO erteilt f&uuml;r:');
defined('TABLE_INFO_PRIVACY_FOR_CARRIER') || define('TABLE_INFO_PRIVACY_FOR_CARRIER', 'Zustimmung f&uuml;r folgenden Paketdienstleister erteilt:');

defined('TABLE_HEADING_IP_ADDRESS') || define('TABLE_HEADING_IP_ADDRESS', 'IP-Adresse');
defined('TABLE_HEADING_DATE') || define('TABLE_HEADING_DATE', 'Datum');
