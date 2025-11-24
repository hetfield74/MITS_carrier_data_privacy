<?php
/**
 * --------------------------------------------------------------
 * File: mits_carrier_data_privacy.php
 * Created by PhpStorm
 * Date: 12.06.2018
 * Time: 10:23
 *
 * Author: Hetfield
 * Copyright: (c) 2018 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 *
 * Released under the GNU General Public License
 * --------------------------------------------------------------
 */

include('includes/application_top.php');

$smarty = new Smarty;

require_once(DIR_FS_CATALOG . 'templates/' . CURRENT_TEMPLATE . '/source/boxes.php');
require_once(DIR_FS_INC . 'xtc_validate_email.inc.php');
if (is_file(DIR_FS_INC . 'secure_form.inc.php')) {
    require_once(DIR_FS_INC . 'secure_form.inc.php');
}

$use_captcha = true;
defined('MODULE_CAPTCHA_CODE_LENGTH') or define('MODULE_CAPTCHA_CODE_LENGTH', 6);
defined('MODULE_CAPTCHA_LOGGED_IN') or define('MODULE_CAPTCHA_LOGGED_IN', 'True');

if (!isset ($_GET['order_id']) || (isset ($_GET['order_id']) && !is_numeric($_GET['order_id']))) {
    xtc_redirect(xtc_href_link(FILENAME_DEFAULT, '', $request_type));
} else {
    $orders_id = xtc_db_prepare_input((int)$_GET['order_id']);
}

if (is_file(DIR_WS_CLASSES . 'modified_captcha.php')) {
    require_once(DIR_WS_CLASSES . 'modified_captcha.php');
    $mod_captcha = $_mod_captcha_class::getInstance();
}

$mits_carrier_data_privacy_cancel_available = false;
$check_query = xtc_db_query("SELECT * FROM " . TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY . " WHERE orders_id = " . (int)$orders_id . " ORDER BY id DESC LIMIT 1");
if (xtc_db_num_rows($check_query)) {
    $carrier = xtc_db_fetch_array($check_query);
    if ($carrier['status'] == 1) {
        $mits_carrier_data_privacy_cancel_available = true;
        require_once(DIR_WS_CLASSES . 'order.php');
        $order = new order((int)$orders_id);
        $xtPrice = new xtcPrice($order->info['currency'], $order->info['status']);
    }
}

if ($mits_carrier_data_privacy_cancel_available === false) {
    $smarty->assign('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_NOT_AVAILABLE', MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_NOT_AVAILABLE);
    $smarty->assign('BUTTON_CONTINUE', '<a href="' . xtc_href_link(FILENAME_DEFAULT, '', 'SSL') . '">' . xtc_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>');
}

if (isset($_POST['action']) && ($_POST['action'] == 'process') && $mits_carrier_data_privacy_cancel_available == true) {
    $privacy = isset($_POST['privacy']) && $_POST['privacy'] == 'privacy' ? true : false;

    $valid_params = array(
      'orders_id',
      'email_address',
      'confirm_email_address',
      'postcode',
    );

    foreach ($_POST as $key => $value) {
        if (!is_object(${$key}) && in_array($key, $valid_params)) {
            ${$key} = xtc_db_prepare_input($value);
        }
    }

    $error = false;

    if ($order_id == '' && !is_numeric($orders_id)) {
        $error = true;
        $messageStack->add('carrier_data_privacy', ENTRY_ORDERID_ERROR);
    }

    if (strlen($email_address) < ENTRY_EMAIL_ADDRESS_MIN_LENGTH) {
        $error = true;
        $messageStack->add('carrier_data_privacy', ENTRY_EMAIL_ADDRESS_ERROR);
    } elseif (xtc_validate_email($email_address) == false) {
        $error = true;
        $messageStack->add('carrier_data_privacy', ENTRY_EMAIL_ADDRESS_CHECK_ERROR);
    } elseif ($email_address != $confirm_email_address) {
        $error = true;
        $messageStack->add('carrier_data_privacy', ENTRY_EMAIL_ERROR_NOT_MATCHING);
    } elseif ($email_address != $order->customer['email_address']) {
        $error = true;
        $messageStack->add('carrier_data_privacy', MITS_CARRIER_DATA_PRIVACY_ENTRY_ERROR);
    }

    if (strlen($postcode) < ENTRY_POSTCODE_MIN_LENGTH) {
        $error = true;
        $messageStack->add('carrier_data_privacy', ENTRY_POST_CODE_ERROR);
    } elseif ($postcode != $order->delivery['postcode']) {
        $error = true;
        $messageStack->add('carrier_data_privacy', MITS_CARRIER_DATA_PRIVACY_ENTRY_ERROR);
    }

    if ($use_captcha == true) {
        if (!isset($_SESSION['vvcode'])
          || !isset($_POST['vvcode'])
          || $_SESSION['vvcode'] == ''
          || $_POST['vvcode'] == ''
          || strtoupper($_POST['vvcode']) != $_SESSION['vvcode']
        ) {
            $messageStack->add('carrier_data_privacy', strip_tags(ERROR_VVCODE, '<b><strong>'));
            $error = true;
        }
        unset($_SESSION['vvcode']);
    }

    if (is_file(DIR_FS_INC . 'secure_form.inc.php')) {
        if (check_secure_form($_POST) === false) {
            $messageStack->add('carrier_data_privacy', ENTRY_TOKEN_ERROR);
            $error = true;
        }
    }

    if ($error == false) {
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

            $mail_content_html = '<font size="2" face="Tahoma, Verdana, sans-serif">' . MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_INTRO . $order->info['order_id'] . "<br /><br />\r\n" . MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_END . '</font>';
            $mail_content_txt = MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_INTRO . $order->info['order_id'] . "\r\n\r\n" . MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_END;
            xtc_php_mail(STORE_OWNER_EMAIL_ADDRESS, STORE_NAME, STORE_OWNER_EMAIL_ADDRESS, STORE_NAME, '', STORE_OWNER_EMAIL_ADDRESS, STORE_NAME, '', '', MITS_CARRIER_DATA_PRIVACY_MAILSUBJECT . $order->info['order_id'], $mail_content_html, $mail_content_txt);

            $smarty->assign('success_message', MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_CANCEL_MESSAGE);
            $smarty->assign('BUTTON_CONTINUE', '<a href="' . xtc_href_link(FILENAME_DEFAULT, '', 'SSL') . '">' . xtc_image_button('button_continue.gif', IMAGE_BUTTON_CONTINUE) . '</a>');
        }
    }
}

$breadcrumb->add(MODULE_MITS_CARRIER_DATA_PRIVACY_CHECKOUT_TITLE, xtc_href_link(FILENAME_MITS_CARRIER_DATA_PRIVACY, '', 'SSL'));

require(DIR_WS_INCLUDES . 'header.php');

if ($messageStack->size('carrier_data_privacy') > 0) {
    $smarty->assign('error', $messageStack->output('carrier_data_privacy'));
}

$smarty->assign('MODULE_MITS_CARRIER_DATA_PRIVACY_CANCEL_TITLE', MODULE_MITS_CARRIER_DATA_PRIVACY_CANCEL_TITLE);
$smarty->assign('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_EMAILADDRESS', MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_EMAILADDRESS);
$smarty->assign('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_CONFIRM_EMAILADDRESS', MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_CONFIRM_EMAILADDRESS);
$smarty->assign('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_DELIVERYPOSTCODE', MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_DELIVERYPOSTCODE);
$smarty->assign('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_INFO', sprintf(MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_INFO, $order->info['order_id']));

if (is_file(DIR_FS_INC . 'secure_form.inc.php')) {
    $smarty->assign('FORM_ACTION', xtc_draw_form('carrier_data_privacy', xtc_href_link(FILENAME_MITS_CARRIER_DATA_PRIVACY, 'order_id=' . $order->info['order_id'], 'SSL'), 'post') . xtc_draw_hidden_field('action', 'process') . secure_form());
} else {
    $smarty->assign('FORM_ACTION', xtc_draw_form('carrier_data_privacy', xtc_href_link(FILENAME_MITS_CARRIER_DATA_PRIVACY, 'order_id=' . $order->info['order_id'], 'SSL'), 'post') . xtc_draw_hidden_field('action', 'process'));
}
$smarty->assign('INPUT_EMAIL', xtc_draw_input_fieldNote(array('name' => 'email_address', 'text' => '&nbsp;' . (xtc_not_null(ENTRY_EMAIL_ADDRESS_TEXT) ? '<span class="inputRequirement">' . ENTRY_EMAIL_ADDRESS_TEXT . '</span>' : '')), '', ''));
$smarty->assign('INPUT_CONFIRM_EMAIL', xtc_draw_input_fieldNote(array('name' => 'confirm_email_address', 'text' => '&nbsp;' . (xtc_not_null(ENTRY_EMAIL_ADDRESS_TEXT) ? '<span class="inputRequirement">' . ENTRY_EMAIL_ADDRESS_TEXT . '</span>' : '')), '', ''));
$smarty->assign('INPUT_CODE', xtc_draw_input_fieldNote(array('name' => 'postcode', 'text' => '&nbsp;' . (xtc_not_null(ENTRY_POST_CODE_TEXT) ? '<span class="inputRequirement">' . ENTRY_POST_CODE_TEXT . '</span>' : ''))));
if ($use_captcha) {
    if (is_file(DIR_WS_CLASSES . 'modified_captcha.php')) {
        $smarty->assign('VVIMG', $mod_captcha->get_image_code());
        $smarty->assign('INPUT_VVCODE', $mod_captcha->get_input_code());
    } else {
        $smarty->assign('VVIMG', '<img src="' . xtc_href_link(FILENAME_DISPLAY_VVCODES, '', 'SSL') . '" alt="Captcha Alt" />');
        $smarty->assign('INPUT_VVCODE', xtc_draw_input_field('vvcode', '', 'style="width:240px;" size="' . MODULE_CAPTCHA_CODE_LENGTH . '" maxlength="' . MODULE_CAPTCHA_CODE_LENGTH . '"', 'text', false));
    }
}
$smarty->assign('BUTTON_SUBMIT', xtc_image_submit('button_continue.gif', IMAGE_BUTTON_CONTINUE));
$smarty->assign('FORM_END', '</form>');

$smarty->assign('language', $_SESSION['language']);

$smarty->caching = 0;
$main_content = $smarty->fetch(CURRENT_TEMPLATE . '/module/mits_carrier_data_privacy.html');

$smarty->assign('main_content', $main_content);
$smarty->caching = 0;
if (!defined('RM')) {
    $smarty->load_filter('output', 'note');
}
$smarty->display(CURRENT_TEMPLATE . '/index.html');
include('includes/application_bottom.php');
