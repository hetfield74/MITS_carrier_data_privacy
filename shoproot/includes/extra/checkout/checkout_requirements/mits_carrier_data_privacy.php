<?php
/**
 * --------------------------------------------------------------
 * File: mits_carrier_data_privacy.php
 * Created by PhpStorm
 * Date: 25.05.2018
 * Time: 11:09
 *
 * Author: Hetfield
 * Copyright: (c) 2018 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 *
 * Released under the GNU General Public License
 * --------------------------------------------------------------
 */

if (defined('MODULE_MITS_CARRIER_DATA_PRIVACY_STATUS') && MODULE_MITS_CARRIER_DATA_PRIVACY_STATUS == 'true') {
    if (isset($_POST['dataconsent'])) {
        $_SESSION['dataconsent'] = (int)$_POST['dataconsent'];
    } else {
        if (!isset($_SESSION['dataconsent'])) {
            $_SESSION['dataconsent'] = 0;
        }
    }
    if (isset($_SESSION['shipping']['id']) && $_SESSION['shipping']['id'] == 'selfpickup_selfpickup') {
        $_SESSION['dataconsent'] = 0;
    }
}