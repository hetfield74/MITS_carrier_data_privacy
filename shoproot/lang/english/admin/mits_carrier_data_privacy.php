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

defined('TABLE_HEADING_CARRIER_ADDRESS') || define('TABLE_HEADING_CARRIER_ADDRESS', 'Address for DSGVO');
defined('TEXT_INFO_CARRIER_ADDRESS') || define('TEXT_INFO_CARRIER_ADDRESS', 'Address of the parcel service provider for DSGVO');

defined('BUTTON_EDIT_CARRIER_TO_SHIPPING') || define('BUTTON_EDIT_CARRIER_TO_SHIPPING' ,'Edit assignment');
defined('BUTTON_NEW_CARRIER_TO_SHIPPING') || define('BUTTON_NEW_CARRIER_TO_SHIPPING', 'Create new assignment');

defined('TABLE_HEADING_PRIVACY_FOR_CARRIER') || define('TABLE_HEADING_PRIVACY_FOR_CARRIER', 'Consent to the transmission of the e-mail address / telephone number according to DSGVO granted for:');
defined('TABLE_INFO_PRIVACY_FOR_CARRIER') || define('TABLE_INFO_PRIVACY_FOR_CARRIER', 'Approval granted to the following parcel service:');

defined('TABLE_HEADING_IP_ADDRESS') || define('TABLE_HEADING_IP_ADDRESS', 'IP-Address');
defined('TABLE_HEADING_DATE') or defined('TABLE_HEADING_DATE') || define('TABLE_HEADING_DATE', 'Date');
