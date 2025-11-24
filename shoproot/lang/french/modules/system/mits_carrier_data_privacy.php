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
        <img src="' . DIR_WS_CATALOG . 'callback/mits_carrier_data_privacy/merz-it-service.png" border="0" alt="" style="display:block;max-width:100%;height:auto;" />
    </a><br />
    <h3>Transmettez-vous des adresses &eacute;lectroniques et/ou des num&eacute;ros de t&eacute;l&eacute;phone &agrave; des prestataires de services d\'exp&eacute;dition ?</h3>
    <h4>Modification dans le cadre du processus de commande de la boutique :</h4>
    <p>Vous ne pouvez transmettre &agrave; un tiers l\'adresse e-mail et/ou le num&eacute;ro de t&eacute;l&eacute;phone collect&eacute;s aupr&egrave;s du client que si vous avez obtenu le consentement explicite du client concern&eacute; pour la transmission de son adresse e-mail !</p>
    <p>Ce consentement du client peut &ecirc;tre obtenu au moyen d\'un texte explicatif correspondant, que le client confirme express&eacute;ment au cours du processus de commande dans votre boutique en ligne en cochant la case opt-in.</p>
    <p>Si vous avez des questions, des probl&egrave;mes ou des souhaits concernant ce module ou toute autre demande relative au logiciel de boutique en ligne modified eCommerce, n\'h&eacute;sitez pas &agrave; nous contacter :</p> 
    <div style="text-align:center;"><a style="background:#6a9;color:#444" target="_blank" href="https://www.merz-it-service.de/Kontakt.html" class="button" onclick="this.blur();">Page de contact sur MerZ-IT-SerVice.de</strong></a></div>.'
);
define('MODULE_MITS_CARRIER_DATA_PRIVACY_STATUS_TITLE', 'Activate module?');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_STATUS_DESC', 'Activate the module?');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_MULTIPLE_ACCEPTS_TITLE', 'Allow multiple revocations/consent?');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_MULTIPLE_ACCEPTS_DESC', 'By selecting <strong>true</strong>, the customer may withdraw and agree as often as he wishes. With <strong>false</strong> <i>(recommended)</ i>, only subsequent approval (if not yet granted during the ordering process) and revocation is allowed!');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS_TITLE', 'Parcel service standard address');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS_DESC', 'Use this address as the default address for the parcel service provider. If e.g. displayed if the customer has not yet selected a shipping method in the checkout or if no address has been assigned to the respective shipping method.');
