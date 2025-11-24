<?php
/* --------------------------------------------------------------
 $Id$

 modified eCommerce Shopsoftware
 http://www.modified-shop.org

 Copyright (c) 2009 - 2013 [www.modified-shop.org]
 --------------------------------------------------------------
 Released under the GNU General Public License
 --------------------------------------------------------------*/

require('includes/application_top.php');

//display per page
$cfg_max_display_results_key = 'MAX_DISPLAY_PARCEL_CARRIER_RESULTS';
$page_max_display_results = xtc_cfg_save_max_display_results($cfg_max_display_results_key);


function check_carrier_to_shipping_modul($shipping_modul)
{
    $carriers_to_shipping_query = xtc_db_query(
      "SELECT *
                                                FROM " . TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY_CARRIERS_TO_SHIPPING_MODULES . "
                                               WHERE shipping_modul = '" . xtc_db_input($shipping_modul) . "'"
    );
    if (xtc_db_num_rows($carriers_to_shipping_query)) {
        $carriers_to_shipping = xtc_db_fetch_array($carriers_to_shipping_query);
        return $carriers_to_shipping['carrier_id'];
    }
    return false;
}

function get_carrier_name($class)
{
    $carrier_name_query = xtc_db_query(
      "SELECT *
                                        FROM " . TABLE_CARRIERS . " c, " . TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY_CARRIERS_TO_SHIPPING_MODULES . " cts
                                       WHERE cts.shipping_modul = '" . xtc_db_input($class) . "' AND c.carrier_id = cts.carrier_id"
    );
    if (xtc_db_num_rows($carrier_name_query)) {
        $carrier_name = xtc_db_fetch_array($carrier_name_query);
        return $carrier_name['carrier_name'];
    }
    return false;
}

function get_shipping_name($shipping_class)
{
    $shipping_class_array = explode('_', $shipping_class);
    $shipping_class = $shipping_class_array[0];
    $shipping_method = $shipping_class;
    if (file_exists(DIR_FS_CATALOG . 'lang/' . $_SESSION['language'] . '/modules/shipping/' . $shipping_class . '.php')) {
        include(DIR_FS_CATALOG . 'lang/' . $_SESSION['language'] . '/modules/shipping/' . $shipping_class . '.php');
        $shipping_method = constant(strtoupper('MODULE_SHIPPING_' . $shipping_class . '_TEXT_TITLE'));
    }
    return $shipping_method;
}

$action = (isset($_GET['action']) ? $_GET['action'] : '');
$page_parcel = (isset($_GET['page']) ? $_GET['page'] : '');
if (xtc_not_null($action)) {
    switch ($action) {
        case 'savecombine':
            $shipping = xtc_db_prepare_input($_POST['shipping']);
            $new_carrier_id = xtc_db_prepare_input($_POST['new_carrier_id']);
            $sql_data_array = array(
              'shipping_modul' => $shipping,
              'carrier_id'     => $new_carrier_id
            );
            xtc_db_perform(TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY_CARRIERS_TO_SHIPPING_MODULES, $sql_data_array);
            xtc_redirect(xtc_href_link(FILENAME_MITS_CARRIER_DATA_PRIVACY));
            break;

        case 'updatecombine':
            $shipping = xtc_db_prepare_input($_POST['shipping']);
            $new_carrier_id = xtc_db_prepare_input($_POST['new_carrier_id']);
            $sql_data_array = array(
              'shipping_modul' => $shipping,
              'carrier_id'     => $new_carrier_id
            );
            xtc_db_perform(TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY_CARRIERS_TO_SHIPPING_MODULES, $sql_data_array, 'update', "shipping_modul = '" . $shipping . "'");
            xtc_redirect(xtc_href_link(FILENAME_MITS_CARRIER_DATA_PRIVACY));
            break;

        case 'insert':
            $carrier_name = xtc_db_prepare_input($_POST['carrier_name']);
            $carrier_tracking_link = xtc_db_prepare_input($_POST['carrier_tracking_link']);
            $mits_carrier_address = xtc_db_prepare_input($_POST['mits_carrier_address']);
            $carrier_sort_order = xtc_db_prepare_input($_POST['carrier_sort_order']);
            $date_added = xtc_db_prepare_input($_POST['carrier_date_added']);
            $sql_data_array = array(
              'carrier_name'          => $carrier_name,
              'carrier_tracking_link' => $carrier_tracking_link,
              'mits_carrier_address'  => $mits_carrier_address,
              'carrier_sort_order'    => $carrier_sort_order,
              'carrier_date_added'    => 'now()'
            );
            xtc_db_perform(TABLE_CARRIERS, $sql_data_array);
            xtc_redirect(xtc_href_link(FILENAME_MITS_CARRIER_DATA_PRIVACY));
            break;

        case 'save':
            $carrier_id = xtc_db_prepare_input($_GET['cID']);
            $carrier_name = xtc_db_prepare_input($_POST['carrier_name']);
            $carrier_tracking_link = xtc_db_prepare_input($_POST['carrier_tracking_link']);
            $mits_carrier_address = xtc_db_prepare_input($_POST['mits_carrier_address']);
            $carrier_sort_order = xtc_db_prepare_input($_POST['carrier_sort_order']);
            $sql_data_array = array(
              'carrier_name'          => $carrier_name,
              'carrier_tracking_link' => $carrier_tracking_link,
              'mits_carrier_address'  => $mits_carrier_address,
              'carrier_sort_order'    => $carrier_sort_order,
              'carrier_last_modified' => 'now()'
            );
            xtc_db_perform(TABLE_CARRIERS, $sql_data_array, 'update', "carrier_id = '" . (int)$carrier_id . "'");
            xtc_redirect(xtc_href_link(FILENAME_MITS_CARRIER_DATA_PRIVACY, 'page=' . $page_parcel . '&cID=' . $carrier_id));
            break;

        case 'deleteconfirm':
            $carrier_id = xtc_db_prepare_input($_GET['cID']);
            xtc_db_query("DELETE FROM " . TABLE_CARRIERS . " WHERE carrier_id = '" . (int)$carrier_id . "'");
            xtc_redirect(xtc_href_link(FILENAME_MITS_CARRIER_DATA_PRIVACY, 'page=' . $page_parcel));
            break;
    }
}


require(DIR_WS_INCLUDES . 'head.php');
?>
  <script type="text/javascript" src="includes/general.js"></script>
  </head>
  <body>
  <!-- header //-->
  <?php require(DIR_WS_INCLUDES . 'header.php'); ?>
  <!-- header_eof //-->
  <!-- body //-->
  <table class="tableBody">
    <tr>
        <?php //left_navigation
        if (USE_ADMIN_TOP_MENU == 'false') {
            echo '<td class="columnLeft2">' . PHP_EOL;
            echo '<!-- left_navigation //-->' . PHP_EOL;
            require_once(DIR_WS_INCLUDES . 'column_left.php');
            echo '<!-- left_navigation eof //-->' . PHP_EOL;
            echo '</td>' . PHP_EOL;
        }
        ?>
      <!-- body_text //-->
      <td class="boxCenter">
        <div class="pageHeadingImage"><?php echo xtc_image(DIR_WS_ICONS . 'heading/icon_configuration.png'); ?></div>
        <div class="pageHeading"><?php echo HEADING_TITLE; ?><br /></div>
        <div class="main pdg2 flt-l">Configuration</div>

        <div>
          <table class="tableCenter">
            <tr>
              <td>
                <table class="tableBoxCenter collapse">
                  <tr class="dataTableHeadingRow">
                    <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_MODULES; ?></td>
                    <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_FILENAME; ?></td>
                    <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_CARRIER_NAME; ?></td>
                    <td class="dataTableHeadingContent txta-r"><?php echo TABLE_HEADING_ACTION; ?>&nbsp;</td>
                  </tr>
                    <?php
                    if (defined('MODULE_SHIPPING_INSTALLED') && xtc_not_null(MODULE_SHIPPING_INSTALLED)) {
                    $modules = explode(';', MODULE_SHIPPING_INSTALLED);
                    $module_directory = DIR_FS_CATALOG_MODULES . 'shipping/';
                    foreach ($modules as $file) {
                    echo '<tr class="dataTableRow" onmouseover="this.className=\'dataTableRowOver\';this.style.cursor=\'pointer\'" onmouseout="this.className=\'dataTableRow\'">' . "\n";
                    $class = substr($file, 0, strrpos($file, '.'));
                    //$module_status = (defined('MODULE_SHIPPING_' . strtoupper($class) . '_STATUS') && strtolower(constant('MODULE_SHIPPING_' . strtoupper($class) . '_STATUS')) == 'true') ? true : false;
                    //if (is_file($module_directory . $file) && $module_status) {
                    if (is_file($module_directory . $file)) {
                    ?>
                  <td class="dataTableContent"><?php echo get_shipping_name($class); ?></td>
                  <td class="dataTableContent"><?php echo $class; ?></td>
                  <td class="dataTableContent"><?php
                      if (($action == 'editcombine' || $action == 'newcombine') && $_GET['shipping'] == $class) {
                          $carriers = array();
                          $carriers_query = xtc_db_query("SELECT carrier_id, carrier_name FROM " . TABLE_CARRIERS . " ORDER BY carrier_sort_order ASC");
                          while ($carrier = xtc_db_fetch_array($carriers_query)) {
                              $carriers[] = array('id' => $carrier['carrier_id'], 'text' => $carrier['carrier_name']);
                          }
                          if (check_carrier_to_shipping_modul($shipping_modul)) {
                              $carrier_selected = check_carrier_to_shipping_modul($shipping_modul);
                          } else {
                              $carrier_selected = $carriers[0];
                          }
                          if ($action == 'editcombine' && $_GET['shipping'] == $class) {
                              echo xtc_draw_form('carrier_to_shipping', FILENAME_MITS_CARRIER_DATA_PRIVACY, xtc_get_all_get_params(array('action')) . 'action=updatecombine', 'post');
                          } elseif ($action == 'newcombine' && $_GET['shipping'] == $class) {
                              echo xtc_draw_form('carrier_to_shipping', FILENAME_MITS_CARRIER_DATA_PRIVACY, xtc_get_all_get_params(array('action')) . 'action=savecombine', 'post');
                          }
                          echo '<table><tr><td valign="top">';
                          echo xtc_draw_pull_down_menu('new_carrier_id', $carriers, $carrier_selected);
                          echo xtc_draw_hidden_field('shipping', $class);
                          echo '</td><td valign="top">';
                          echo '<input type="submit" class="button" style="margin-top:1px;padding:7px 15px;" onclick="this.blur();" value="' . BUTTON_SAVE . '"/>';
                          echo '</td></tr></table>';
                          echo '</form>';
                      } else {
                          echo get_carrier_name($class);
                      }
                      ?></td>
                  <td class="dataTableContent txta-r">
                      <?php
                      if (check_carrier_to_shipping_modul($class)) {
                          echo '<a class="button" onclick="this.blur();" href="' . xtc_href_link(
                              FILENAME_MITS_CARRIER_DATA_PRIVACY,
                              'page=' . $page_parcel . '&action=editcombine&shipping=' . $class
                            ) . '">' . BUTTON_EDIT_CARRIER_TO_SHIPPING . '</a>';
                      } elseif (!check_carrier_to_shipping_modul($class)) {
                          echo '<a class="button" onclick="this.blur();" href="' . xtc_href_link(
                              FILENAME_MITS_CARRIER_DATA_PRIVACY,
                              'page=' . $page_parcel . '&action=newcombine&shipping=' . $class
                            ) . '">' . BUTTON_NEW_CARRIER_TO_SHIPPING . '</a>';
                      }
                      echo '</td>';
                      }
                      }
                      }
                      ?>
                </table>
              </td>
            </tr>
          </table>
        </div>
        <div>
          <table class="tableCenter">
            <tr>
              <td class="boxCenterLeft">
                <table class="tableBoxCenter collapse">
                  <tr class="dataTableHeadingRow">
                    <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_CARRIER_NAME; ?></td>
                    <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_TRACKING_LINK; ?>&nbsp;</td>
                    <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_CARRIER_ADDRESS; ?>&nbsp;</td>
                    <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_SORT_ORDER; ?>&nbsp;</td>
                    <td class="dataTableHeadingContent txta-r"><?php echo TABLE_HEADING_ACTION; ?>&nbsp;</td>
                  </tr>
                    <?php
                  $carriers_query_raw = "SELECT *
                                           FROM " . TABLE_CARRIERS . "
                                       ORDER BY carrier_sort_order";
                  $carriers_split = new splitPageResults($page_parcel, $page_max_display_results, $carriers_query_raw, $carriers_query_numrows, 'carrier_id', 'cID');
                    $carriers_query = xtc_db_query($carriers_query_raw);
                    while ($carriers = xtc_db_fetch_array($carriers_query)) {
                    if ((!isset($_GET['cID']) || (isset($_GET['cID']) && ($_GET['cID'] == $carriers['carrier_id']))) && !isset($cInfo) && (substr($action, 0, 3) != 'new')) {
                        $cInfo = new objectInfo($carriers);
                    }
                    if (isset($cInfo) && is_object($cInfo) && ($carriers['carrier_id'] == $cInfo->carrier_id)) {
                        echo '              <tr class="dataTableRowSelected" onmouseover="this.style.cursor=\'pointer\'" onclick="document.location.href=\'' . xtc_href_link(
                            FILENAME_MITS_CARRIER_DATA_PRIVACY,
                            'page=' . $page_parcel . '&cID=' . $cInfo->carrier_id . '&action=edit'
                          ) . '\'">' . "\n";
                    } else {
                        echo '              <tr class="dataTableRow" onmouseover="this.className=\'dataTableRowOver\';this.style.cursor=\'pointer\'" onmouseout="this.className=\'dataTableRow\'" onclick="document.location.href=\'' . xtc_href_link(
                            FILENAME_MITS_CARRIER_DATA_PRIVACY,
                            'page=' . $page_parcel . '&cID=' . $carriers['carrier_id']
                          ) . '\'">' . "\n";
                    }
                    ?>
                  <td class="dataTableContent"><?php echo $carriers['carrier_name']; ?></td>
                  <td class="dataTableContent"><?php echo $carriers['carrier_tracking_link']; ?></td>
                  <td class="dataTableContent"><?php echo str_replace(',', ',<br />', $carriers['mits_carrier_address']); ?></td>
                  <td class="dataTableContent"><?php echo $carriers['carrier_sort_order']; ?></td>
                  <td class="dataTableContent txta-r"><?php
                      if (isset($cInfo) && is_object($cInfo) && ($carriers['carrier_id'] == $cInfo->carrier_id)) {
                          echo xtc_image(DIR_WS_IMAGES . 'icon_arrow_right.gif', ICON_ARROW_RIGHT);
                      } else {
                          echo '<a href="' . xtc_href_link(FILENAME_MITS_CARRIER_DATA_PRIVACY, 'page=' . $page_parcel . '&cID=' . $carriers['carrier_id']) . '">' . xtc_image(
                              DIR_WS_IMAGES . 'icon_arrow_grey.gif',
                              IMAGE_ICON_INFO
                            ) . '</a>';
                      } ?>&nbsp;
                  </td>
            </tr>
              <?php
              }
              ?>
          </table>

              <div class="smallText pdg2 flt-l"><?php echo $carriers_split->display_count($carriers_query_numrows, $page_max_display_results, $page_parcel, TEXT_DISPLAY_NUMBER_OF_CARRIERS); ?></div>
              <div class="smallText pdg2 flt-r"><?php echo $carriers_split->display_links($carriers_query_numrows, $page_max_display_results, MAX_DISPLAY_PAGE_LINKS, $page_parcel); ?></div>
              <?php echo draw_input_per_page($PHP_SELF,$cfg_max_display_results_key,$page_max_display_results); ?>

            <?php
            if (empty($action)) {
                ?>
              <div class="clear"></div>
              <div class="pdg2 flt-r smallText"><?php
                  echo '<a class="button" onclick="this.blur();" href="' . xtc_href_link(
                      FILENAME_MITS_CARRIER_DATA_PRIVACY,
                      'page=' . $page_parcel . '&action=new'
                    ) . '">' . BUTTON_NEW_CARRIER . '</a>'; ?></div>
                <?php
            }
            ?>
          <div class="clear"></div>
          <br />
          <div class="pdg2 customers-groups smallText" style="width:100%;"><?php echo TEXT_CARRIER_LINK_DESCRIPTION; ?></div>
      </td>
        <?php
        $heading = array();
        $contents = array();
        switch ($action) {
            case 'new':
                $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_NEW_CARRIER . '</b>');
                $contents = array('form' => xtc_draw_form('carrier', FILENAME_MITS_CARRIER_DATA_PRIVACY, 'page=' . $page_parcel . '&action=insert'));
                $contents[] = array('text' => TEXT_INFO_INSERT_INTRO);
                $contents[] = array('text' => '<br />' . TEXT_INFO_CARRIER_NAME . '<br />' . xtc_draw_input_field('carrier_name'));
                $contents[] = array('text' => '<br />' . TEXT_INFO_CARRIER_TRACKING_LINK . '<br />' . xtc_draw_input_field('carrier_tracking_link', '', 'style="width:300px;"'));
                $contents[] = array('text' => '<br />' . TEXT_INFO_CARRIER_ADDRESS . '<br />' . xtc_draw_input_field('mits_carrier_address', '', 'style="width:300px;"'));
                $contents[] = array('text' => '<br />' . TEXT_INFO_CARRIER_SORT_ORDER . '<br />' . xtc_draw_input_field('carrier_sort_order'));
                $contents[] = array(
                  'align' => 'center',
                  'text'  => '<br /><input type="submit" class="button" onclick="this.blur();" value="' . BUTTON_INSERT . '"/>&nbsp;<a class="button" onclick="this.blur();" href="' . xtc_href_link(
                      FILENAME_MITS_CARRIER_DATA_PRIVACY,
                      'page=' . $page_parcel
                    ) . '">' . BUTTON_CANCEL . '</a>'
                );
                break;
            case 'edit':
                $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_EDIT_CARRIER . '</b>');
                $contents = array('form' => xtc_draw_form('carrier', FILENAME_MITS_CARRIER_DATA_PRIVACY, 'page=' . $page_parcel . '&cID=' . $cInfo->carrier_id . '&action=save'));
                $contents[] = array('text' => TEXT_INFO_EDIT_INTRO);
                $contents[] = array('text' => '<br />' . TEXT_INFO_CARRIER_NAME . '<br />' . xtc_draw_input_field('carrier_name', $cInfo->carrier_name));
                $contents[] = array(
                  'text' => '<br />' . TEXT_INFO_CARRIER_TRACKING_LINK . '<br />' . xtc_draw_input_field(
                      'carrier_tracking_link',
                      $cInfo->carrier_tracking_link,
                      'style="width:300px;"'
                    )
                );
                $contents[] = array(
                  'text' => '<br />' . TEXT_INFO_CARRIER_ADDRESS . '<br />' . xtc_draw_input_field(
                      'mits_carrier_address',
                      $cInfo->mits_carrier_address,
                      'style="width:300px;"'
                    )
                );
                $contents[] = array('text' => '<br />' . TEXT_INFO_CARRIER_SORT_ORDER . '<br />' . xtc_draw_input_field('carrier_sort_order', $cInfo->carrier_sort_order));
                $contents[] = array(
                  'align' => 'center',
                  'text'  => '<br /><input type="submit" class="button" onclick="this.blur();" value="' . BUTTON_UPDATE . '"/>&nbsp;<a class="button" onclick="this.blur();" href="' . xtc_href_link(
                      FILENAME_MITS_CARRIER_DATA_PRIVACY,
                      'page=' . $page_parcel . '&cID=' . $cInfo->carrier_id
                    ) . '">' . BUTTON_CANCEL . '</a>'
                );
                break;
            case 'delete':
                $heading[] = array('text' => '<b>' . TEXT_INFO_HEADING_DELETE_CARRIER . '</b>');
                $contents = array('form' => xtc_draw_form('carrier', FILENAME_MITS_CARRIER_DATA_PRIVACY, 'page=' . $page_parcel . '&cID=' . $cInfo->carrier_id . '&action=deleteconfirm'));
                $contents[] = array('text' => TEXT_INFO_DELETE_INTRO);
                $contents[] = array('text' => '<br /><b>' . $cInfo->carrier_name . '</b>');
                $contents[] = array(
                  'align' => 'center',
                  'text'  => '<br /><input type="submit" class="button" onclick="this.blur();" value="' . BUTTON_DELETE . '"/>&nbsp;<a class="button" onclick="this.blur();" href="' . xtc_href_link(
                      FILENAME_MITS_CARRIER_DATA_PRIVACY,
                      'page=' . $page_parcel . '&cID=' . $cInfo->carrier_id
                    ) . '">' . BUTTON_CANCEL . '</a>'
                );
                break;
            default:
                if (isset($cInfo) && is_object($cInfo)) {
                    $heading[] = array('text' => '<b>' . $cInfo->carrier_name . '</b>');
                    $contents[] = array(
                      'align' => 'center',
                      'text'  => '<a class="button" onclick="this.blur();" href="' . xtc_href_link(
                          FILENAME_MITS_CARRIER_DATA_PRIVACY,
                          'page=' . $page_parcel . '&cID=' . $cInfo->carrier_id . '&action=edit'
                        ) . '">' . BUTTON_EDIT . '</a> <a class="button" onclick="this.blur();" href="' . xtc_href_link(
                          FILENAME_MITS_CARRIER_DATA_PRIVACY,
                          'page=' . $page_parcel . '&cID=' . $cInfo->carrier_id . '&action=delete'
                        ) . '">' . BUTTON_DELETE . '</a>'
                    );
                    $contents[] = array('text' => '<br />' . TEXT_INFO_DATE_ADDED . ' ' . xtc_date_short($cInfo->carrier_date_added));
                    $contents[] = array('text' => '' . TEXT_INFO_LAST_MODIFIED . ' ' . xtc_date_short($cInfo->carrier_last_modified));
                    $contents[] = array('text' => '<br />' . TEXT_INFO_CARRIER_NAME . '<br />' . $cInfo->carrier_name);
                    $contents[] = array('text' => '<br />' . TEXT_INFO_CARRIER_ADDRESS . '<br />' . $cInfo->mits_carrier_address);
                }
                break;
        }

        if ((xtc_not_null($heading)) && (xtc_not_null($contents))) {
            echo '            <td class="boxRight">' . "\n";
            $box = new box;
            echo $box->infoBox($heading, $contents);
            echo '            </td>' . "\n";
        }
        ?>
    </tr>
  </table>
  </div>
  </td>
  <!-- body_text_eof //-->
  </tr>
  </table>
  <!-- body_eof //-->
  <!-- footer //-->
  <?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
  <!-- footer_eof //-->
  <br />
  </body>
  </html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>