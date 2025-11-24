<?php
/**
 * --------------------------------------------------------------
 * File: mits_carrier_data_privacy.php
 * Created by PhpStorm
 * Date: 27.05.2018
 * Time: 08:32
 *
 * Author: Hetfield
 * Copyright: (c) 2018 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 *
 * Released under the GNU General Public License
 * --------------------------------------------------------------
 */

chdir('../../');
require_once('includes/application_top.php');

if (defined('MODULE_MITS_CARRIER_DATA_PRIVACY_STATUS') && MODULE_MITS_CARRIER_DATA_PRIVACY_STATUS == 'true') {
    if (isset($_POST['val']) && $_POST['val'] != '') {
        $value = $_POST['val'];
        echo get_carrier_address($value);
    }
}