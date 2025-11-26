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

if (defined('MODULE_MITS_CARRIER_DATA_PRIVACY_STATUS')
  && MODULE_MITS_CARRIER_DATA_PRIVACY_STATUS == 'true'
  && defined('MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS')
) {
    $lang_array = array(
      'MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS' => 'Deutsche Post AG, Charles-de-Gaulle-Straße 20, 53113 Bonn',
      'MODULE_MITS_CARRIER_DATA_PRIVACY_CHECKOUT_TITLE'  => 'Consent to data collection',
      'MODULE_MITS_CARRIER_DATA_PRIVACY_CHECKOUT_TEXT'   =>
        'I agree that my email address and/or telephone number may be passed on to <span id="mits_carrier_data">' . MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS . '</span>  
    so that the parcel service provider can contact me by email or telephone prior to delivery of the goods for the purpose of arranging a delivery date or 
    provide status information on the shipment delivery. 
    I can withdraw my consent at any time.',

      'MODULE_MITS_CARRIER_DATA_PRIVACY_ORDER_MAIL_TEXT' =>
        'I agree that my email address and/or telephone number may be passed on to %s 
    so that the parcel service provider can contact me by email or telephone prior to delivery of the goods for the purpose of arranging a delivery date or 
    provide status information on the shipment delivery. 
    I can withdraw my consent at any time.',

      'MODULE_MITS_CARRIER_DATA_PRIVACY_ORDER_MAIL_TEXT_PLAIN' =>
        'I agree that my email address and/or telephone number may be passed on to %s 
    so that the parcel service provider can contact me by email or telephone prior to delivery of the goods for the purpose of arranging a delivery date or 
    provide status information on the shipment delivery. 
    I can withdraw my consent at any time.',

      'MODULE_MITS_CARRIER_DATA_PRIVACY_NOT_ACCEPTED_TEXT' =>
        'I do <strong>not</strong> agree that my email address and/or telephone number may be passed on to %s 
    so that the parcel service provider can contact me by email or telephone prior to delivery of the goods for the purpose of arranging a delivery date or 
    provide status information on the shipment delivery.',

      'MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_CANCEL' =>
        'Revoke consent to the transfer of data to the shipping service provider &raquo;',

      'MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_ACCEPT' =>
        'Grant consent to the transfer of data to the shipping service provider &raquo;<br /><small>(I can withdraw my consent at any time.)</small>',

      'MITS_CARRIER_DATA_PRIVACY_LINK_CONFIRM_SUBMIT_TEXT' =>
        'Do you really want to change your consent to the transfer of data to shipping service providers?',

      'MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_CANCEL_MESSAGE' =>
        'Your consent to the transfer of data to the shipping service provider has been successfully revoked!',

      'MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_ACCEPT_MESSAGE' =>
        'Your consent to the transfer of data to the shipping service provider has been successfully granted!',

      'MITS_CARRIER_DATA_PRIVACY_MAILSUBJECT' =>
        'Update of consent to data transfer to shipping service providers / Order no.: ',

      'MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_INTRO' =>
        'Consent to the transfer of data to shipping service providers has been revoked. This concerns order no.: ',

      'MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_END' =>
        'Note: You can find details on the current status in the admin area of the shop on the order detail page!',

      'MITS_CARRIER_DATA_PRIVACY_MAILTEXT_ACCEPT_INTRO' =>
        'Consent to the transfer of data to shipping service providers has been granted. This concerns order no.: ',

      'MITS_CARRIER_DATA_PRIVACY_MAILTEXT_ACCEPT_END' =>
        'Note: You can find details on the current status in the admin area of the shop on the order detail page!',

      'MITS_CARRIER_DATA_PRIVACY_ENTRY_ERROR' =>
        'One or more entries do not match the order or the order does not exist! Please check your entries and try again. If you have problems with the form, please contact our support by email at <a href="mailto:' . STORE_OWNER_EMAIL_ADDRESS . '">' . STORE_OWNER_EMAIL_ADDRESS . '</a>',

      'MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_NOT_AVAILABLE' =>
        'ERROR: This order does not exist in our system or there is no consent to the transfer of data to shipping service providers that could be revoked.',

      'MODULE_MITS_CARRIER_DATA_PRIVACY_CANCEL_TITLE' =>
        'Revoke consent to data collection',

      'MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_INFO' =>
        'I hereby revoke my consent to the collection of data by shipping service providers for order no.: %s with immediate effect. The parcel service provider can therefore <strong>no longer</strong> contact me by email or telephone prior to delivery of the goods for the purpose of arranging a delivery date or provide status information on the shipment delivery.',

      'MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_EMAILADDRESS' =>
        'Email address of the order:',

      'MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_CONFIRM_EMAILADDRESS' =>
        'Repeat email address:',

      'MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_DELIVERYPOSTCODE' =>
        'Postcode of the delivery address:',
    );

    foreach ($lang_array as $key => $val) {
        defined($key) || define($key, $val);
    }
}
