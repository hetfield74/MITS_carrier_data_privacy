<?php
/**
 * --------------------------------------------------------------
 * File: mits_carrier_data_privacy.php
 * Created by PhpStorm
 * Date: 27.05.2018
 * Time: 22:04
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
    @include_once(DIR_FS_LANGUAGES . $_SESSION['language'] . '/admin/' . FILENAME_MITS_CARRIER_DATA_PRIVACY);
    $carrier_privacy_query = xtc_db_query(
      "SELECT * FROM " . TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY . " WHERE orders_id = " . (int)$oID . " ORDER BY id DESC"
    );
    if (xtc_db_num_rows($carrier_privacy_query)) {
        ?>
      <div class="heading"><?php
          echo TABLE_HEADING_PRIVACY_FOR_CARRIER; ?></div>
      <table cellspacing="0" cellpadding="5" class="table borderall">
        <tr>
          <td class="smallText" align="center" style="width:100px;">
            <strong><?php
                echo TABLE_HEADING_STATUS; ?></strong>
          </td>
          <td class="smallText" align="left">
            <strong><?php
                echo TABLE_INFO_PRIVACY_FOR_CARRIER; ?></strong>
          </td>
          <td class="smallText" align="center" style="width:100px;">
            <strong><?php
                echo TABLE_HEADING_IP_ADDRESS; ?></strong>
          </td>
          <td class="smallText" align="center">
            <strong><?php
                echo TABLE_HEADING_DATE; ?></strong>
          </td>
        </tr>
          <?php
          $carrier_privacy_counter = 0;
          while ($carrier_privacy = xtc_db_fetch_array($carrier_privacy_query)) {
              $carrier_privacy_counter++;
              if ($carrier_privacy['status'] == 1) {
                  if ($carrier_privacy_counter == 1) {
                      $carrier_privacy_notification = true;
                  }
                  $carrier_privacy_status = xtc_image(DIR_WS_IMAGES . 'icon_status_green.gif', IMAGE_ICON_STATUS_GREEN, 10, 10);
              } elseif ($carrier_privacy['status'] == 0) {
                  if ($carrier_privacy_counter == 1) {
                      $carrier_privacy_notification = false;
                  }
                  $carrier_privacy_status = xtc_image(DIR_WS_IMAGES . 'icon_status_red.gif', IMAGE_ICON_STATUS_RED, 10, 10);
              }
              ?>
            <tr>
              <td class="smallText" align="center" style="width:100px;">
                <strong><?php
                    echo $carrier_privacy_status; ?></strong>
              </td>
              <td class="smallText" align="left">
                <strong><?php
                    echo $carrier_privacy['carrier_address']; ?></strong>
              </td>
              <td class="smallText" align="center" style="width:100px;">
                <strong><?php
                    echo $carrier_privacy['ip_address']; ?></strong>
              </td>
              <td class="smallText" align="center">
                <strong><?php
                    echo xtc_datetime_short($carrier_privacy['date']); ?></strong>
              </td>
            </tr>
              <?php
          }
          ?>
      </table>
        <?php
        if (defined('MODULE_DHL_BUSINESS_STATUS') && MODULE_DHL_BUSINESS_STATUS == 'True' && $carrier_privacy_notification !== false) {
            ?>
          <script>
            $(document).ready(function () {
              //$('input[name="notification[]"]').attr('checked', true);
              $('select[name="notification"]').val('1');
              $('select[name="notification"]')[0].sumo.selectItem(1);
            });
          </script>
            <?php
        }
    }
}
