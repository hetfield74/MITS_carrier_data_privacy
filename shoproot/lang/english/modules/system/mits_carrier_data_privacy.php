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

$modulname = strtoupper("mits_carrier_data_privacy");

$lang_array = array(
  'MODULE_' . $modulname . '_TITLE'                  => 'MITS_carrier_data_privacy - Consent to the transfer of data to shipping service providers <span style="white-space:nowrap;">&copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></span>',
  'MODULE_' . $modulname . '_DESCRIPTION'            => '
    <a href="https://www.merz-it-service.de/" target="_blank">
      <img src="' . (ENABLE_SSL === true ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG . DIR_WS_IMAGES . 'merz-it-service.png" border="0" alt="MerZ IT-SerVice" style="display:block;max-width:100%;height:auto;" />
    </a><br />
    <h3>Do you pass on email addresses and/or telephone numbers to shipping service providers?</h3>
    <h4>Change within the shop order process:</h4>
    <p>You may only pass on the customer\'s email address and/or telephone number to a third party if you have obtained the explicit consent of the customer concerned to the transfer of his or her email address and/or telephone number!</p>
    <p>This consent of the customer can be obtained by means of a corresponding declaration text which the customer expressly confirms during the order process in your online shop by ticking an opt-in checkbox.</p>
    <div style="text-align:center;">
      <small>The latest version of the module is always only available on Github!</small><br />
      <a style="background:#6a9;color:#444" target="_blank" href="https://github.com/hetfield74/MITS_carrier_data_privacy" class="button" onclick="this.blur();">MITS_carrier_data_privacy on Github</a>
    </div>
    <p>If you have any questions, problems or requests regarding this module or any other matters relating to the modified eCommerce shop software, simply contact us:</p> 
    <div style="text-align:center;"><a style="background:#6a9;color:#444" target="_blank" href="https://www.merz-it-service.de/Kontakt.html" class="button" onclick="this.blur();">Contact page on MerZ-IT-SerVice.de</a></div>
',
  'MODULE_' . $modulname . '_STATUS_TITLE'           => 'Status',
  'MODULE_' . $modulname . '_STATUS_DESC'            => 'Activate module',
  'MODULE_' . $modulname . '_MULTIPLE_ACCEPTS_TITLE' => 'Number of videos per product or category',
  'MODULE_' . $modulname . '_MULTIPLE_ACCEPTS_DESC'  => 'Enter here how many video input fields you need in the product form or in category editing.',
  'MODULE_' . $modulname . '_DEFAULT_ADDRESS_TITLE'  => 'Custom template?',
  'MODULE_' . $modulname . '_DEFAULT_ADDRESS_DESC'   => 'If the shop uses a template other than <i>tpl_modified</i> or <i>tpl_modified_responisve</i>, you must adapt your product detail template according to the installation instructions in order to display videos as additional product images and set this option to <i>yes</i>.',
  'MODULE_' . $modulname . '_UPDATE_AVAILABLE_TITLE' => ' <span style="font-weight:bold;color:#900;background:#ff6;padding:2px;border:1px solid #900;">Please update the module!</span>',
  'MODULE_' . $modulname . '_UPDATE_AVAILABLE_DESC'  => '',
  'MODULE_' . $modulname . '_UPDATE_FINISHED'        => 'The MITS_carrier_data_privacy module has been updated.',
  'MODULE_' . $modulname . '_UPDATE_ERROR'           => 'Error',
  'MODULE_' . $modulname . '_UPDATE_MODUL'           => 'Update module',
  'MODULE_' . $modulname . '_DELETE_MODUL'           => 'Completely remove MITS_carrier_data_privacy from the server',
  'MODULE_' . $modulname . '_CONFIRM_DELETE_MODUL'   => 'Do you really want to delete the MITS_carrier_data_privacy module with all files from the server?',
  'MODULE_' . $modulname . '_DELETE_FINISHED'        => 'The MITS_carrier_data_privacy module has been deleted from the server.',
);

foreach ($lang_array as $key => $val) {
    defined($key) || define($key, $val);
}
