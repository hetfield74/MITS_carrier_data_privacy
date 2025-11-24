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
    }
    if ((isset($_SESSION['dataconsent']) && $_SESSION['dataconsent'] == 1) && isset($insert_id)) {
        $check_query = xtc_db_query("SELECT * FROM " . TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY . " WHERE orders_id = " . (int)$insert_id);
        if (!xtc_db_num_rows($check_query)) {
            if (isset($order->info['shipping_class']) && !empty($order->info['shipping_class']) && $order->info['shipping_class'] != 'selfpickup_selfpickup') {
                $carrier_address = get_carrier_address($order->info['shipping_class']);
            }

            if (!empty($carrier_address)) {
                $mits_sql_data_array = array(
                  'orders_id'       => (int)$insert_id,
                  'customers_id'    => (int)$_SESSION['customer_id'],
                  'ip_address'      => xtc_db_input($_SESSION['tracking']['ip']),
                  'date'            => 'now()',
                  'carrier_address' => xtc_db_input($carrier_address),
                  'status'          => xtc_db_input($_SESSION['dataconsent'])
                );
                xtc_db_perform(TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY, $mits_sql_data_array);
            }
        }
    }
}