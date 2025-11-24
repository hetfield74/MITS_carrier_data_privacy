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
    if (strstr($PHP_SELF, FILENAME_CHECKOUT_CONFIRMATION)) {
        if (defined('MODULE_CHECKOUT_EXPRESS_STATUS') && MODULE_CHECKOUT_EXPRESS_STATUS == 'true') {
            if ((isset($_GET['express']) && $_GET['express'] == 'on') || (isset($order->info['payment_method']) && !empty($order->info['payment_method']) && $order->info['payment_method'] == 'paypalcart')) {
                if (isset($order->info['shipping_class']) && !empty($order->info['shipping_class']) && $order->info['shipping_class'] != 'selfpickup_selfpickup') {
                    ?>
                  <script type="text/javascript">
                    $(window).on('load', function () {
                      jQuery('#mits_carrier_data').html(<?php echo json_encode($carrier_address);?>);
                    });
                  </script>
                    <?php
                }
            }
        }
    }

    if (strstr($PHP_SELF, FILENAME_CHECKOUT_SHIPPING)) {
        ?>
      <script type="text/javascript">
        $(window).on('load', function () {
          var shippingdefault = $("input[name=shipping]:checked").val();
          jQuery("input[name='shipping']").each(function () {
            $.post('<?php echo xtc_href_link('callback/mits_carrier_data_privacy/mits_carrier_data_privacy.php', '', 'SSL');?>', 'val=' + shippingdefault, function (response) {
              jQuery('#mits_carrier_data').html(response);
            });
            if (shippingdefault == 'selfpickup_selfpickup') jQuery('#carrier_data_privacy_box').css("display", "none");
            if (shippingdefault != 'selfpickup_selfpickup') jQuery('#carrier_data_privacy_box').css("display", "block");
          });
          $("[id*='rd']").click(function (e) {
            var shippingaccid = $("input[name=shipping]:checked").val();
            $.post('<?php echo xtc_href_link('callback/mits_carrier_data_privacy/mits_carrier_data_privacy.php', '', 'SSL');?>', 'val=' + shippingaccid, function (response) {
              jQuery('#mits_carrier_data').html(response);
            });
            if (shippingaccid == 'selfpickup_selfpickup') jQuery('#carrier_data_privacy_box').css("display", "none");
            if (shippingaccid != 'selfpickup_selfpickup') jQuery('#carrier_data_privacy_box').css("display", "block");
          });
        });
      </script>
        <?php
    }
}
