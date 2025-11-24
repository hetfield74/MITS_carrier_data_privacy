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

defined('MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS') || define('MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS', 'Deutsche Post AG, Charles-de-Gaulle-Straße 20, 53113 Bonn');

define('MODULE_MITS_CARRIER_DATA_PRIVACY_CHECKOUT_TITLE','Consent to data disclosure');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_CHECKOUT_TEXT','I consent to my email address and / or phone number being disclosed to <span id="mits_carrier_data">' . MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS . '</span> for the parcel service provider to contact me to coordinate a delivery date and / or provide delivery status information. I can withdraw my consent at any time.');

define('MODULE_MITS_CARRIER_DATA_PRIVACY_ORDER_MAIL_TEXT','I consent to my email address and / or phone number being disclosed to  %s for the parcel service provider to contact me to coordinate a delivery date and / or provide delivery status information. I can withdraw my consent at any time.');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_ORDER_MAIL_TEXT_PLAIN','I consent to my email address and / or phone number being disclosed to  %s for the parcel service provider to contact me to coordinate a delivery date and / or provide delivery status information. I can withdraw my consent at any time.');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_NOT_ACCEPTED_TEXT','I do <strong>not</strong> consent to my email address and phone number being disclosed to %s for delivery date coordination and delivery status information.');

define('MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_CANCEL','Withdraw consent to data disclusure to the parcel service provider &raquo;');
define('MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_ACCEPT','Consent to data disclosure to the parcel service provider &raquo;<br /><small>(I can withdraw this consent at any time.)</small>');
define('MITS_CARRIER_DATA_PRIVACY_LINK_CONFIRM_SUBMIT_TEXT','Are you sure you want to change your consent settings for data disclosure to parcel service providers?');
define('MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_CANCEL_MESSAGE','You have successfully withdrawn your consent to data diclosure to parcel service providers.');
define('MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_ACCEPT_MESSAGE','You have succesfully consented to data disclosure to parcel service providers.');

define('MITS_CARRIER_DATA_PRIVACY_MAILSUBJECT','Update of your consent to data disclosure to parcel service providers for order no. ');
define('MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_INTRO','Your consent for data diclosure to parcel service providers has been withdrawn. This has an impact on order no. ');
define('MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_END','Note: Details on your current consent status are available in the order details within your personal page in our online shop.');
define('MITS_CARRIER_DATA_PRIVACY_MAILTEXT_ACCEPT_INTRO','Your consent to data disclosure to parcel service providers has been registered. This has an impact on order no. ');
define('MITS_CARRIER_DATA_PRIVACY_MAILTEXT_ACCEPT_END','Note: Details on your current consent status are available in the order details within your personal page in our online shop.');

define('MITS_CARRIER_DATA_PRIVACY_ENTRY_ERROR','One or more details either do not match the order or the order doesn\'\t exist. Please verify the data you have entered and try again. Should you have a persistent problem with this form, please email our support team at: <a href="mailto:'.STORE_OWNER_EMAIL_ADDRESS.'">'.STORE_OWNER_EMAIL_ADDRESS.'</a>');
define('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_NOT_AVAILABLE','ERROR: This order either doesn\'\t exist in our database or data disclosure to parcel service providers has already been objected to.');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_CANCEL_TITLE','Withdraw consent to data disclosure');
define('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_INFO','I hereby withdraw my consent to the disclosure of data to parcel service providers for my order number %s with immediate effect. The parcel service provider may <strong>not</strong> contact me to coordinate a delivery date and / or provide delivery status information.');
define('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_EMAILADDRESS','Enter the email address used with the order');
define('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_CONFIRM_EMAILADDRESS','Please confirm email address');
define('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_DELIVERYPOSTCODE','Postal code of the delivery address:');
