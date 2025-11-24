<?php
/**
 * --------------------------------------------------------------
 * File: mits_carrier_data_privacy.php
 * Created by PhpStorm
 * Date: 25.05.2018
 * Time: 11:15
 *
 * Author: Hetfield
 * Copyright: (c) 2018 - MerZ IT-SerVice
 * Web: https://www.merz-it-service.de
 * Contact: info@merz-it-service.de
 *
 * Released under the GNU General Public License
 * --------------------------------------------------------------
 */

defined('_VALID_XTC') or die('Direct Access to this location is not allowed.');

class mits_carrier_data_privacy
{
    public string $code;
    public string $name;
    public string $version;
    public mixed $sort_order;
    public string $title;
    public string $description;
    public mixed $do_update;
    public bool $enabled;
    private bool $_check;

    /**
     *
     */
    public function __construct()
    {
        $this->code = 'mits_carrier_data_privacy';
        $this->name = 'MODULE_' . strtoupper($this->code);
        $this->version = '1.4';

        $this->sort_order = defined($this->name . '_SORT_ORDER') ? constant($this->name . '_SORT_ORDER') : 0;
        $this->enabled = defined($this->name . '_STATUS') && (constant($this->name . '_STATUS') == 'true');

        if (defined($this->name . '_VERSION') && $this->version != constant($this->name . '_VERSION')) {
            $this->do_update = (defined($this->name . '_UPDATE_AVAILABLE_TITLE')) ? constant($this->name . '_UPDATE_AVAILABLE_TITLE') : '';
        } else {
            $this->do_update = '';
        }

        $this->title = (defined($this->name . '_TITLE') ? constant($this->name . '_TITLE') : $this->code) . ' - v' . $this->version . $this->do_update;
        $this->description = '';
        if ($this->do_update != '') {
            $this->description .= '<a class="button btnbox but_green" style="text-align:center;" onclick="this.blur();" href="' . xtc_href_link(FILENAME_MODULE_EXPORT, 'set=' . $_GET['set'] . '&module=' . $this->code . '&action=update') . '">' . constant($this->name . '_UPDATE_MODUL') . '</a><br>';
        }
        $this->description .= defined($this->name . '_DESCRIPTION') ? constant($this->name . '_DESCRIPTION') . '<hr style="margin:10px 0">' : '';

        if (!$this->enabled) {
            $this->description .= '<div style="text-align:center;margin:30px 0"><a class="button but_red" style="text-align:center;" onclick="return confirmLink(\'' . constant($this->name . '_CONFIRM_DELETE_MODUL') . '\', \'\' ,this);" href="' . xtc_href_link(FILENAME_MODULE_EXPORT, 'set=system&module=' . $this->code . '&action=custom') . '">' . constant(
                $this->name . '_DELETE_MODUL'
              ) . '</a></div><br>';
        }
    }

    /**
     * @param $file
     * @return void
     */
    function process($file)
    {
    }

    /**
     * @return string[]
     */
    public function display(): array
    {
        return array(
          'text' => '<br /><div align="center">' . xtc_button(BUTTON_SAVE) .
            xtc_button_link(BUTTON_CANCEL, xtc_href_link(FILENAME_MODULE_EXPORT, 'set=' . $_GET['set'] . '&module=' . $this->code)) . "</div>"
        );
    }

    /**
     * @return true
     */
    public function check()
    {
        if (!isset($this->_check)) {
            if (defined($this->name . '_STATUS')) {
                $this->_check = true;
            } else {
                $check_query = xtc_db_query("SELECT configuration_value FROM " . TABLE_CONFIGURATION . " WHERE configuration_key = '" . $this->name . "_STATUS'");
                $this->_check = xtc_db_num_rows($check_query);
            }
        }
        return $this->_check;
    }

    /**
     * @return void
     */
    public function install(): void
    {
        $engine = defined('DB_SERVER_ENGINE') ? 'ENGINE=' . DB_SERVER_ENGINE : '';
        $charset = defined('DB_SERVER_CHARSET') ? ' DEFAULT CHARSET=' . DB_SERVER_CHARSET . ' COLLATE=' . DB_SERVER_CHARSET . '_general_ci' : '';

        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_STATUS', 'true', 6, 1, 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_MULTIPLE_ACCEPTS', 'false', 6, 2, 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, date_added) VALUES ('" . $this->name . "_DEFAULT_ADDRESS', 'Deutsche Post AG, Charles-de-Gaulle-Straße 20, 53113 Bonn', 6, 3, now())");
        xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value, configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_VERSION', '" . $this->version . "', 6, 99, NULL, now())");

        xtc_db_query(
          "CREATE TABLE IF NOT EXISTS " . TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY . " (
					  `id` int(11) NOT NULL auto_increment,
					  `orders_id` int(11) NOT NULL,
					  `customers_id` int(11) NOT NULL,
					  `ip_address` varchar(32) NOT NULL default '',
					  `date` datetime default NULL,
					  `carrier_address` varchar(255) NOT NULL,
					  `status` tinyint(1) NOT NULL default '0',
					  PRIMARY KEY  (`id`)
					)" . $engine . $charset
        );
        xtc_db_query(
          "CREATE TABLE IF NOT EXISTS " . TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY_CARRIERS_TO_SHIPPING_MODULES . " (
					  `id` int(11) NOT NULL auto_increment,
					  `carrier_id` int(11) NOT NULL,
					  `shipping_modul` varchar(255) NOT NULL,
					  PRIMARY KEY  (`id`)
					)" . $engine . $charset
        );

        xtc_db_query("ALTER TABLE " . TABLE_CARRIERS . " ADD `mits_carrier_address` varchar(255) NOT NULL");
        xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " ADD `mits_carrier_data_privacy` INT( 1 ) NOT NULL DEFAULT '0'");
        xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET `mits_carrier_data_privacy` = 1");

        // Bekannte Adressen importieren zu den bereit vorhandenen Paketdienstleistern im Standard-Shop
        xtc_db_query("UPDATE " . TABLE_CARRIERS . " SET `mits_carrier_address` = '" . decode_utf8('Deutsche Post AG, Charles-de-Gaulle-Straße 20, 53113 Bonn', $_SESSION['language_charset']) . "' WHERE carrier_name = 'DHL'");
        xtc_db_query("UPDATE " . TABLE_CARRIERS . " SET `mits_carrier_address` = '" . decode_utf8('DPD Deutschland GmbH, Wailandtstraße 1, 63741 Aschaffenburg', $_SESSION['language_charset']) . "' WHERE carrier_name = 'DPD'");
        xtc_db_query("UPDATE " . TABLE_CARRIERS . " SET `mits_carrier_address` = '" . decode_utf8('General Logistics Systems Germany GmbH & Co. OHG, GLS Germany-Straße 1 – 7, 36286 Neuenstein', $_SESSION['language_charset']) . "' WHERE carrier_name = 'GLS'");
        xtc_db_query("UPDATE " . TABLE_CARRIERS . " SET `mits_carrier_address` = '" . decode_utf8('United Parcel Service Deutschland Inc. & Co. OHG, Görlitzer Straße 1, 41460 Neuss', $_SESSION['language_charset']) . "' WHERE carrier_name = 'UPS'");
        xtc_db_query("UPDATE " . TABLE_CARRIERS . " SET `mits_carrier_address` = '" . decode_utf8('Hermes Logistik Gruppe Deutschland GmbH, Essener Straße 89, 22419 Hamburg', $_SESSION['language_charset']) . "' WHERE carrier_name = 'HERMES'");
        xtc_db_query("UPDATE " . TABLE_CARRIERS . " SET `mits_carrier_address` = '" . decode_utf8('FedEx Express Germany GmbH, Langer Kornweg 34 k, 65451 Kelsterbach', $_SESSION['language_charset']) . "' WHERE carrier_name = 'FEDEX'");
        xtc_db_query("UPDATE " . TABLE_CARRIERS . " SET `mits_carrier_address` = '" . decode_utf8('TNT Express GmbH, Haberstraße 2, 53842 Troisdorf', $_SESSION['language_charset']) . "' WHERE carrier_name = 'TNT'");
        xtc_db_query("UPDATE " . TABLE_CARRIERS . " SET `mits_carrier_address` = '" . decode_utf8('trans-o-flex Schnell-Lieferdienst GmbH, Zentrale Weinheim, Hertzstraße 10, 69469 Weinheim', $_SESSION['language_charset']) . "' WHERE carrier_name = 'TRANS-O-FLEX'");
        xtc_db_query("UPDATE " . TABLE_CARRIERS . " SET `mits_carrier_address` = '" . decode_utf8('Kühne + Nagel (AG & Co.) KG, Großer Grasbrook 11-13, 20457 Hamburg', $_SESSION['language_charset']) . "' WHERE carrier_name = 'KUEHNE-NAGEL'");
        xtc_db_query("UPDATE " . TABLE_CARRIERS . " SET `mits_carrier_address` = '" . decode_utf8('iloxx GmbH, Gutenstetter Str. 8b, 90449 Nürnberg', $_SESSION['language_charset']) . "' WHERE carrier_name = 'ILOXX'");
        xtc_db_query("UPDATE " . TABLE_CARRIERS . " SET `mits_carrier_address` = '" . decode_utf8('LogoiX GmbH, Wasserburger Str. 50a, 83395 Freilassing', $_SESSION['language_charset']) . "' WHERE carrier_name = 'LogoiX'");
        xtc_db_query("UPDATE " . TABLE_CARRIERS . " SET `mits_carrier_address` = '" . decode_utf8('Deutsche Post AG, Charles-de-Gaulle-Straße 20, 53113 Bonn', $_SESSION['language_charset']) . "' WHERE carrier_name = 'POST'");
    }

    /**
     * @return void
     */
    public function remove(): void
    {
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key in ('" . implode("', '", $this->keys()) . "')");
        xtc_db_query("DELETE FROM " . TABLE_CONFIGURATION . " WHERE configuration_key LIKE '" . $this->name . "_%'");
        xtc_db_query("DROP TABLE " . TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY);
        xtc_db_query("DROP TABLE " . TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY_CARRIERS_TO_SHIPPING_MODULES);
        xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " DROP COLUMN `mits_carrier_data_privacy`");
        xtc_db_query("ALTER TABLE " . TABLE_CARRIERS . " DROP COLUMN `mits_carrier_address`");
    }


    /**
     * @return void
     */
    public function update(): void
    {
        global $messageStack;

        xtc_db_query("UPDATE " . TABLE_CONFIGURATION . " SET configuration_value = '" . $this->version . "' WHERE configuration_key = '" . $this->name . "_VERSION'");

        if (!$this->columnExists(TABLE_CARRIERS, 'mits_carrier_address')) {
            xtc_db_query("ALTER TABLE " . TABLE_CARRIERS . " ADD `mits_carrier_address` varchar(255) NOT NULL");
        }

        if (!$this->columnExists(TABLE_ADMIN_ACCESS, 'mits_carrier_data_privacy')) {
            xtc_db_query("ALTER TABLE " . TABLE_ADMIN_ACCESS . " ADD `mits_carrier_data_privacy` INT( 1 ) NOT NULL DEFAULT '0'");
            xtc_db_query("UPDATE " . TABLE_ADMIN_ACCESS . " SET `mits_carrier_data_privacy` = 1");
        }

        if (!defined($this->name . '_MULTIPLE_ACCEPTS')) {
            xtc_db_query("INSERT INTO " . TABLE_CONFIGURATION . " (configuration_key, configuration_value,  configuration_group_id, sort_order, set_function, date_added) VALUES ('" . $this->name . "_MULTIPLE_ACCEPTS', 'false', 6, 2, 'xtc_cfg_select_option(array(\'true\', \'false\'), ', now())");
        }

        if (defined('DB_SERVER_ENGINE') && defined('DB_SERVER_CHARSET')) {
            xtc_db_query("ALTER TABLE `" . TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY . "` CONVERT TO CHARACTER SET " . DB_SERVER_CHARSET . " COLLATE " . DB_SERVER_CHARSET . "_general_ci");
            xtc_db_query("ALTER TABLE `" . TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY . "` ENGINE=" . DB_SERVER_ENGINE);
            xtc_db_query("ALTER TABLE `" . TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY_CARRIERS_TO_SHIPPING_MODULES . "` CONVERT TO CHARACTER SET " . DB_SERVER_CHARSET . " COLLATE " . DB_SERVER_CHARSET . "_general_ci");
            xtc_db_query("ALTER TABLE `" . TABLE_MITS_ORDER_CARRIER_DATA_PRIVACY_CARRIERS_TO_SHIPPING_MODULES . "` ENGINE=" . DB_SERVER_ENGINE);
        }

        $this->removeOldFiles();

        $messageStack->add_session(constant($this->name . '_UPDATE_FINISHED'), 'success');
    }

    /**
     * @return void
     */
    public function custom(): void
    {
        global $messageStack;

        $this->remove();
        $this->removeModulfiles();

        $messageStack->add_session(constant($this->name . '_DELETE_FINISHED'), 'success');
    }

    /**
     * @return string[]
     */
    public function keys(): array
    {
        $key = array(
          $this->name . '_STATUS',
          $this->name . '_MULTIPLE_ACCEPTS',
          $this->name . '_DEFAULT_ADDRESS',
        );

        return $key;
    }

    /**
     * @param $table
     * @param $column
     * @return bool
     */
    private function columnExists($table, $column): bool
    {
        $res = xtc_db_query("SHOW COLUMNS FROM {$table} LIKE '{$column}'");
        return xtc_db_num_rows($res) > 0;
    }

    /**
     * @return void
     */
    protected function removeOldFiles(): void
    {
        $old_files_array = array();

        if (count($old_files_array) > 0) {
            foreach ($old_files_array as $delete_file) {
                if (is_file($delete_file)) {
                    unlink($delete_file);
                }
            }
        }
    }

    /**
     * @param $dir
     * @return bool
     */
    protected function deleteDirectory($dir): bool
    {
        if (!file_exists($dir)) {
            return true;
        }

        if (!is_dir($dir)) {
            return unlink($dir);
        }

        $files = array_diff(scandir($dir), array('.', '..'));

        foreach ($files as $file) {
            $path = $dir . DIRECTORY_SEPARATOR . $file;
            if (is_dir($path)) {
                $this->deleteDirectory($path);
            } else {
                unlink($path);
            }
        }

        return rmdir($dir);
    }

    /**
     * @return void
     */
    protected function removeModulfiles(): void
    {
        $remove_files_array = array(
          DIR_FS_DOCUMENT_ROOT . (defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/') . 'includes/modules/system/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . (defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/') . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . (defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/') . 'includes/extra/filenames/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . (defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/') . 'includes/extra/menu/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . (defined('DIR_ADMIN') ? DIR_ADMIN : 'admin/') . 'includes/extra/modules/orders/orders_info_blocks/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'lang/english/extra/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'lang/english/extra/admin/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'lang/english/admin/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'lang/english/modules/system/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'lang/german/extra/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'lang/german/extra/admin/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'lang/german/admin/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'lang/german/modules/system/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'includes/extra/application_bottom/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'includes/extra/checkout/checkout_process_end/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'includes/extra/checkout/checkout_requirements/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'includes/extra/database_tables/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'includes/extra/filenames/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'includes/extra/functions/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'includes/extra/header/header_body/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'includes/extra/send_order/data/' . $this->code . '.php',
          DIR_FS_DOCUMENT_ROOT . 'templates/tpl_modified/module/account_carrier_data_privacy.html',
          DIR_FS_DOCUMENT_ROOT . 'templates/tpl_modified/module/checkout_carrier_data_privacy..html',
          DIR_FS_DOCUMENT_ROOT . 'templates/tpl_modified/module/mits_carrier_data_privacy.html',
          DIR_FS_DOCUMENT_ROOT . 'templates/tpl_modified_responsive/module/account_carrier_data_privacy.html',
          DIR_FS_DOCUMENT_ROOT . 'templates/tpl_modified_responsive/module/checkout_carrier_data_privacy.html',
          DIR_FS_DOCUMENT_ROOT . 'templates/tpl_modified_responsive/module/mits_carrier_data_privacy.html',
          DIR_FS_DOCUMENT_ROOT . 'templates/tpl_modified_nova/module/account_carrier_data_privacy.html',
          DIR_FS_DOCUMENT_ROOT . 'templates/tpl_modified_nova/module/checkout_carrier_data_privacy.html',
          DIR_FS_DOCUMENT_ROOT . 'templates/tpl_modified_nova/module/mits_carrier_data_privacy.html',
          DIR_FS_DOCUMENT_ROOT . 'templates/xtc5/module/account_carrier_data_privacy.html',
          DIR_FS_DOCUMENT_ROOT . 'templates/xtc5/module/checkout_carrier_data_privacy.html',
          DIR_FS_DOCUMENT_ROOT . 'templates/xtc5/module/mits_carrier_data_privacy.html',
          DIR_FS_DOCUMENT_ROOT . 'templates/' . CURRENT_TEMPLATE . '/module/account_carrier_data_privacy.html',
          DIR_FS_DOCUMENT_ROOT . 'templates/' . CURRENT_TEMPLATE . '/module/checkout_carrier_data_privacy.html',
          DIR_FS_DOCUMENT_ROOT . 'templates/' . CURRENT_TEMPLATE . '/module/mits_carrier_data_privacy.html',
        );

        foreach ($remove_files_array as $delete_file) {
            if (is_file($delete_file)) {
                unlink($delete_file);
            }
        }

        $this->deleteDirectory(DIR_FS_DOCUMENT_ROOT . 'callback/' . $this->code);
    }

}
