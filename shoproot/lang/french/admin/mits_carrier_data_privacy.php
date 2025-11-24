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

require_once DIR_FS_LANGUAGES . $_SESSION['language'] . '/admin/' . FILENAME_PARCEL_CARRIERS;

require_once DIR_FS_LANGUAGES . $_SESSION['language'] . '/admin/' . FILENAME_MODULES;

defined('TABLE_HEADING_CARRIER_ADDRESS') || define('TABLE_HEADING_CARRIER_ADDRESS', 'Adresse pour le RGPD');
defined('TEXT_INFO_CARRIER_ADDRESS') || define('TEXT_INFO_CARRIER_ADDRESS', 'Adresse du transporteur de colis pour le RGPD');

defined('BUTTON_EDIT_CARRIER_TO_SHIPPING') || define('BUTTON_EDIT_CARRIER_TO_SHIPPING', 'Modifier l\'affectation');
defined('BUTTON_NEW_CARRIER_TO_SHIPPING') || define('BUTTON_NEW_CARRIER_TO_SHIPPING', 'Créer une nouvelle affectation');

defined('TABLE_HEADING_PRIVACY_FOR_CARRIER') || define('TABLE_HEADING_PRIVACY_FOR_CARRIER', 'Consentement au transfert de l\'adresse e-mail/du numéro de téléphone conformément au RGPD donné pour :');
defined('TABLE_INFO_PRIVACY_FOR_CARRIER') || define('TABLE_INFO_PRIVACY_FOR_CARRIER', 'Consentement donné pour le transporteur de colis suivant :');

defined('TABLE_HEADING_IP_ADDRESS') || define('TABLE_HEADING_IP_ADDRESS', 'Adresse IP');
defined('TABLE_HEADING_DATE') || define('TABLE_HEADING_DATE', 'Date');
