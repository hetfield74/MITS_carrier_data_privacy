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

define('MODULE_MITS_CARRIER_DATA_PRIVACY_TITLE', 'Consent to the data transfer to shipping service providers <span style="white-space:nowrap;">&copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></span>');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_DESCRIPTION', '
    <a href="https://www.merz-it-service.de/" target="_blank">
        <img src="'.DIR_WS_CATALOG.'callback/mits_carrier_data_privacy/merz-it-service.png" border="0" alt="" style="display:block;max-width:100%;height:auto;" />
    </a><br />
    <h3>Do you provide e-mail addresses and/or telephone numbers to shipping service providers?</h3>
    <h4>Change as part of the shop order process:</h4>
    <p>You may only pass the e-mail address or telephone number collected from the customer to a third party,
     if you have obtained the explicit consent of the affected customer in the forwarding of his e-mail address!</p>
    <p>This consent of the customer can be accomplished by an appropriate explanatory text,
     the customer in the course of the ordering process in your online store by setting a check mark by opt-in checkbox explicitly confirmed.</p>
');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_STATUS_TITLE', 'Activate module?');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_STATUS_DESC', 'Activate the module?');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_MULTIPLE_ACCEPTS_TITLE', 'Allow multiple revocations/consent?');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_MULTIPLE_ACCEPTS_DESC', 'By selecting <strong>true</strong>, the customer may withdraw and agree as often as he wishes. With <strong>false</strong> <i>(recommended)</ i>, only subsequent approval (if not yet granted during the ordering process) and revocation is allowed!');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS_TITLE', 'Parcel service standard address');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS_DESC', 'Use this address as the default address for the parcel service provider. If e.g. displayed if the customer has not yet selected a shipping method in the checkout or if no address has been assigned to the respective shipping method.');
