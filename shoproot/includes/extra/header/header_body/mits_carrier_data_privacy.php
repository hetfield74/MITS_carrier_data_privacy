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

    if (defined('FILENAME_CHECKOUT_CONFIRMATION') && strstr($PHP_SELF, FILENAME_CHECKOUT_CONFIRMATION)) {
        if (defined('MODULE_CHECKOUT_EXPRESS_STATUS') && MODULE_CHECKOUT_EXPRESS_STATUS == 'true') {
            if ((isset($_GET['express']) && $_GET['express'] == 'on') || (isset($order->info['payment_method']) && !empty($order->info['payment_method']) && ($order->info['payment_method'] == 'paypalcart' || $order->info['payment_method'] == 'paypalexpress'))) {
                $dataconsent = isset($_POST['dataconsent']) && $_POST['dataconsent'] == 1 ? true : false;
                ($dataconsent == false) ? $_SESSION['dataconsent'] = 0 : $_SESSION['dataconsent'] = 1;

                $mits_checkout_smarty = new Smarty;
                $mits_checkout_smarty->assign('language', $_SESSION['language']);
                $mits_checkout_smarty->assign('CHECKBOX_DATACONSENT', xtc_draw_checkbox_field('dataconsent', '1', $dataconsent, 'id="dataconsent"'));
                $mits_checkout_smarty->caching = 0;

                if (isset($order->info['shipping_class']) && !empty($order->info['shipping_class']) && $order->info['shipping_class'] != 'selfpickup_selfpickup') {
                    $carrier_address = get_carrier_address($order->info['shipping_class']);
                }

                $checkout_carrier_data_privacy = $mits_checkout_smarty->fetch(CURRENT_TEMPLATE . '/module/checkout_carrier_data_privacy.html');
                $smarty->assign('CARRIER_DATA_PRIVACY_BLOCK', $checkout_carrier_data_privacy);
            }
        }
    }

    if (defined('FILENAME_CHECKOUT_SHIPPING') && strstr($PHP_SELF, FILENAME_CHECKOUT_SHIPPING)) {
        $dataconsent = isset($_POST['dataconsent']) && $_POST['dataconsent'] == 1 ? true : false;
        !$dataconsent ? $_SESSION['dataconsent'] = 0 : $_SESSION['dataconsent'] = 1;

        $mits_checkout_smarty = new Smarty;
        $mits_checkout_smarty->assign('language', $_SESSION['language']);
        $mits_checkout_smarty->assign('CHECKBOX_DATACONSENT', xtc_draw_checkbox_field('dataconsent', '1', $dataconsent, 'id="dataconsent"'));
        $mits_checkout_smarty->caching = 0;

        $checkout_carrier_data_privacy = $mits_checkout_smarty->fetch(CURRENT_TEMPLATE . '/module/checkout_carrier_data_privacy.html');
        $smarty->assign('CARRIER_DATA_PRIVACY_BLOCK', $checkout_carrier_data_privacy);
    }

    if (defined('FILENAME_ACCOUNT_HISTORY_INFO') && strstr($PHP_SELF, FILENAME_ACCOUNT_HISTORY_INFO)) {
        $mits_account_smarty = new Smarty;
        $mits_account_smarty->assign('language', $_SESSION['language']);
        $mits_account_smarty->caching = 0;

        if (isset ($_GET['action']) && ($_GET['action'] == 'cancel_carrier_data_privacy')) {
            if (isset($order->info['shipping_class']) && !empty($order->info['shipping_class']) && $order->info['shipping_class'] != 'selfpickup_selfpickup') {
                $carrier_address = get_carrier_address($order->info['shipping_class']);
            }

            if (!empty($carrier_address)) {
                $mits_sql_data_array = array(
                  'orders_id'       => (int)$order->info['order_id'],
                  'customers_id'    => (int)$_SESSION['customer_id'],
                  'ip_address'      => xtc_db_input($_SESSION['tracking']['ip']),
                  'date'            => 'now()',
                  'carrier_address' => xtc_db_input($carrier_address),
                  'status'          => '0'
                );
                xtc_db_perform(TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY, $mits_sql_data_array);
                $mail_content_html = '<font size="2" face="Tahoma, Verdana, sans-serif">' . MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_INTRO . $order->info['order_id'] . "<br />\r\n" . MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_END . '</font>';
                $mail_content_txt = MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_INTRO . $order->info['order_id'] . "\r\n" . MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_END;
                xtc_php_mail(
                  STORE_OWNER_EMAIL_ADDRESS,
                  STORE_NAME,
                  STORE_OWNER_EMAIL_ADDRESS,
                  STORE_NAME,
                  '',
                  STORE_OWNER_EMAIL_ADDRESS,
                  STORE_NAME,
                  '',
                  '',
                  MITS_CARRIER_DATA_PRIVACY_MAILSUBJECT . $order->info['order_id'],
                  $mail_content_html,
                  $mail_content_txt
                );
                xtc_redirect(xtc_href_link(FILENAME_ACCOUNT_HISTORY_INFO, 'order_id=' . $order->info['order_id'] . '&success=cancel', 'SSL'));
            }
        } elseif (isset ($_GET['action']) && ($_GET['action'] == 'accept_carrier_data_privacy')) {
            if (isset($order->info['shipping_class']) && !empty($order->info['shipping_class']) && $order->info['shipping_class'] != 'selfpickup_selfpickup') {
                $carrier_address = get_carrier_address($order->info['shipping_class']);
            }

            if (!empty($carrier_address)) {
                $mits_sql_data_array = array(
                  'orders_id'       => (int)$order->info['order_id'],
                  'customers_id'    => (int)$_SESSION['customer_id'],
                  'ip_address'      => xtc_db_input($_SESSION['tracking']['ip']),
                  'date'            => 'now()',
                  'carrier_address' => xtc_db_input($carrier_address),
                  'status'          => '1'
                );
                xtc_db_perform(TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY, $mits_sql_data_array);
                $mail_content_html = '<font size="2" face="Tahoma, Verdana, sans-serif">' . MITS_CARRIER_DATA_PRIVACY_MAILTEXT_ACCEPT_INTRO . $order->info['order_id'] . "<br />\r\n" . MITS_CARRIER_DATA_PRIVACY_MAILTEXT_ACCEPT_END . '</font>';
                $mail_content_txt = MITS_CARRIER_DATA_PRIVACY_MAILTEXT_ACCEPT_INTRO . $order->info['order_id'] . "\r\n" . MITS_CARRIER_DATA_PRIVACY_MAILTEXT_ACCEPT_END;
                xtc_php_mail(
                  STORE_OWNER_EMAIL_ADDRESS,
                  STORE_NAME,
                  STORE_OWNER_EMAIL_ADDRESS,
                  STORE_NAME,
                  '',
                  STORE_OWNER_EMAIL_ADDRESS,
                  STORE_NAME,
                  '',
                  '',
                  MITS_CARRIER_DATA_PRIVACY_MAILSUBJECT . $order->info['order_id'],
                  $mail_content_html,
                  $mail_content_txt
                );
                xtc_redirect(xtc_href_link(FILENAME_ACCOUNT_HISTORY_INFO, 'order_id=' . $order->info['order_id'] . '&success=accept', 'SSL'));
            }
        }
        if (isset($_GET['success']) && $_GET['success'] == 'cancel') {
            $mits_account_smarty->assign('success_message', MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_CANCEL_MESSAGE);
        } elseif (isset($_GET['success']) && $_GET['success'] == 'accept') {
            $mits_account_smarty->assign('success_message', MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_ACCEPT_MESSAGE);
        }
        $mits_account_smarty->assign('MITS_CARRIER_DATA_PRIVACY_LINK_CONFIRM_SUBMIT', MITS_CARRIER_DATA_PRIVACY_LINK_CONFIRM_SUBMIT_TEXT);

        $check_query = xtc_db_query("SELECT * FROM " . TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY . " WHERE orders_id = " . (int)$order->info['order_id'] . " ORDER BY id DESC LIMIT 1");
        if (xtc_db_num_rows($check_query)) {
            $carrier = xtc_db_fetch_array($check_query);

            if (isset($order->info['shipping_class']) && !empty($order->info['shipping_class']) && $order->info['shipping_class'] != 'selfpickup_selfpickup') {
                $carrier_address = $carrier['carrier_address'];
            }

            if ($carrier['status'] == 1) {
                $mits_account_smarty->assign('MITS_CARRIER_DATA_PRIVACY_INFO', sprintf(MODULE_MITS_CARRIER_DATA_PRIVACY_ORDER_MAIL_TEXT, $carrier_address));
                $mits_account_smarty->assign(
                  'MITS_CARRIER_DATA_PRIVACY_LINK',
                  xtc_href_link(FILENAME_ACCOUNT_HISTORY_INFO, 'action=cancel_carrier_data_privacy&order_id=' . $order->info['order_id'], 'SSL')
                );
                $mits_account_smarty->assign('MITS_CARRIER_DATA_PRIVACY_LINK_TEXT', MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_CANCEL);
            } elseif (defined('MODULE_MITS_CARRIER_DATA_PRIVACY_MULTIPLE_ACCEPTS') && MODULE_MITS_CARRIER_DATA_PRIVACY_MULTIPLE_ACCEPTS == 'true') {
                $mits_account_smarty->assign('MITS_CARRIER_DATA_PRIVACY_INFO', sprintf(MODULE_MITS_CARRIER_DATA_PRIVACY_NOT_ACCEPTED_TEXT, $carrier_address));
                $mits_account_smarty->assign(
                  'MITS_CARRIER_DATA_PRIVACY_LINK',
                  xtc_href_link(FILENAME_ACCOUNT_HISTORY_INFO, 'action=accept_carrier_data_privacy&order_id=' . $order->info['order_id'], 'SSL')
                );
                $mits_account_smarty->assign('MITS_CARRIER_DATA_PRIVACY_LINK_TEXT', MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_ACCEPT);
            }
        } else {
            if (isset($order->info['shipping_class']) && !empty($order->info['shipping_class']) && $order->info['shipping_class'] != 'selfpickup_selfpickup') {
                $carrier_address = get_carrier_address($order->info['shipping_class']);
            }

            $mits_account_smarty->assign('MITS_CARRIER_DATA_PRIVACY_INFO', sprintf(MODULE_MITS_CARRIER_DATA_PRIVACY_NOT_ACCEPTED_TEXT, $carrier_address));
            $mits_account_smarty->assign(
              'MITS_CARRIER_DATA_PRIVACY_LINK',
              xtc_href_link(FILENAME_ACCOUNT_HISTORY_INFO, 'action=accept_carrier_data_privacy&order_id=' . $order->info['order_id'], 'SSL')
            );
            $mits_account_smarty->assign('MITS_CARRIER_DATA_PRIVACY_LINK_TEXT', MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_ACCEPT);
        }

        $account_carrier_data_privacy = $mits_account_smarty->fetch(CURRENT_TEMPLATE . '/module/account_carrier_data_privacy.html');
        $smarty->assign('ACCOUNT_CARRIER_DATA_PRIVACY_BLOCK', $account_carrier_data_privacy);
    }

}
