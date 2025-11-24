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
  'MODULE_' . $modulname . '_TITLE'                  => 'MITS_carrier_data_privacy - Consentement à la transmission des données aux prestataires de services d\'expédition <span style="white-space:nowrap;">&copy; by <span style="padding:2px;background:#ffe;color:#6a9;font-weight:bold;">Hetfield (MerZ IT-SerVice)</span></span>',
  'MODULE_' . $modulname . '_DESCRIPTION'            => '
    <a href="https://www.merz-it-service.de/" target="_blank">
      <img src="' . (ENABLE_SSL === true ? HTTPS_SERVER : HTTP_SERVER) . DIR_WS_CATALOG . DIR_WS_IMAGES . 'merz-it-service.png" border="0" alt="MerZ IT-SerVice" style="display:block;max-width:100%;height:auto;" />
    </a><br />
    <h3>Transmettez-vous des adresses e-mail et/ou des numéros de téléphone à des prestataires de services d\'expédition&nbsp;?</h3>
    <h4>Modification dans le cadre du processus de commande de la boutique&nbsp;:</h4>
    <p>Vous ne pouvez transmettre l\'adresse e-mail et/ou le numéro de téléphone collectés auprès du client à un tiers que si vous avez obtenu le consentement explicite du client concerné à la transmission de son adresse e-mail et/ou de son numéro de téléphone&nbsp;!</p>
    <p>Ce consentement du client peut être obtenu au moyen d\'un texte de déclaration approprié que le client confirme expressément au cours du processus de commande dans votre boutique en ligne en cochant une case d\'opt-in.</p>
    <div style="text-align:center;">
      <small>La dernière version du module est toujours uniquement disponible sur Github&nbsp;!</small><br />
      <a style="background:#6a9;color:#444" target="_blank" href="https://github.com/hetfield74/MITS_carrier_data_privacy" class="button" onclick="this.blur();">MITS_carrier_data_privacy sur Github</a>
    </div>
    <p>Pour toute question, tout problème ou toute demande concernant ce module ou d\'autres sujets liés au logiciel de boutique modified eCommerce, il vous suffit de nous contacter&nbsp;:</p> 
    <div style="text-align:center;"><a style="background:#6a9;color:#444" target="_blank" href="https://www.merz-it-service.de/Kontakt.html" class="button" onclick="this.blur();">Page de contact sur MerZ-IT-SerVice.de</a></div>
',
  'MODULE_' . $modulname . '_STATUS_TITLE'           => 'Statut',
  'MODULE_' . $modulname . '_STATUS_DESC'            => 'Activer le module',
  'MODULE_' . $modulname . '_MULTIPLE_ACCEPTS_TITLE' => 'Nombre de vidéos par produit ou catégorie',
  'MODULE_' . $modulname . '_MULTIPLE_ACCEPTS_DESC'  => 'Indiquez ici combien de champs de saisie vidéo vous souhaitez avoir dans la fiche produit ou dans l\'édition de la catégorie.',
  'MODULE_' . $modulname . '_DEFAULT_ADDRESS_TITLE'  => 'Template personnalisé&nbsp;?',
  'MODULE_' . $modulname . '_DEFAULT_ADDRESS_DESC'   => 'Si la boutique utilise un autre template que <i>tpl_modified</i> ou <i>tpl_modified_responisve</i>, vous devez adapter, conformément au guide d\'installation, votre modèle de fiche produit afin d\'afficher les vidéos comme images supplémentaires de l\'article et régler ce paramètre sur <i>oui</i>.',
  'MODULE_' . $modulname . '_UPDATE_AVAILABLE_TITLE' => ' <span style="font-weight:bold;color:#900;background:#ff6;padding:2px;border:1px solid #900;">Veuillez mettre à jour le module&nbsp;!</span>',
  'MODULE_' . $modulname . '_UPDATE_AVAILABLE_DESC'  => '',
  'MODULE_' . $modulname . '_UPDATE_FINISHED'        => 'Le module MITS_carrier_data_privacy a été mis à jour.',
  'MODULE_' . $modulname . '_UPDATE_ERROR'           => 'Erreur',
  'MODULE_' . $modulname . '_UPDATE_MODUL'           => 'Mettre à jour le module',
  'MODULE_' . $modulname . '_DELETE_MODUL'           => 'Supprimer complètement MITS_carrier_data_privacy du serveur',
  'MODULE_' . $modulname . '_CONFIRM_DELETE_MODUL'   => 'Voulez-vous vraiment supprimer du serveur le module MITS_carrier_data_privacy avec tous ses fichiers&nbsp;?',
  'MODULE_' . $modulname . '_DELETE_FINISHED'        => 'Le module MITS_carrier_data_privacy a été supprimé du serveur.',
);

foreach ($lang_array as $key => $val) {
    defined($key) || define($key, $val);
}
