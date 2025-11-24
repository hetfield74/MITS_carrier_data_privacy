<?php
/**
 * --------------------------------------------------------------
 * File: mits_carrier_data_privacy.php
 * Created by PhpStorm
 * Date: 27.05.2018
 * Time: 22:21
 *
 * Author: Hetfield
 * Copyright: (c) 2018 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 *
 * Released under the GNU General Public License
 * --------------------------------------------------------------
 */

function get_carrier_address($class)
{
    $shipping_class_array = explode('_', $class);
    $shipping_class = $shipping_class_array[0];
    $carrier_query = xtc_db_query(
      "SELECT c.mits_carrier_address
         FROM " . TABLE_CARRIERS . " c, 
              " . TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY_CARRIERS_TO_SHIPPING_MODULES . " cts
        WHERE cts.shipping_modul = '" . xtc_db_input($shipping_class) . "' 
          AND c.carrier_id = cts.carrier_id"
    );
    if (xtc_db_num_rows($carrier_query)) {
        $carrier = xtc_db_fetch_array($carrier_query);
        return $carrier['mits_carrier_address'];
    }
    return (defined('MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS')) ? MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS : '';
}
