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

$lang_array = array(
  'MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS' => 'Deutsche Post AG, Charles-de-Gaulle-Straße 20, 53113 Bonn',
  'MODULE_MITS_CARRIER_DATA_PRIVACY_CHECKOUT_TITLE' => 'Consentement à la collecte de données',
  'MODULE_MITS_CARRIER_DATA_PRIVACY_CHECKOUT_TEXT'  =>
    'Je consens à ce que mon adresse e-mail et/ou mon numéro de téléphone soient transmis à <span id="mits_carrier_data">' . MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS . '</span>  
    afin que le prestataire de services de livraison puisse me contacter par e-mail ou par téléphone avant la livraison de la marchandise aux fins de la prise de rendez-vous pour la livraison ou 
    de la communication d’informations sur le statut de l’envoi. 
    Je peux retirer ce consentement à tout moment.',

  'MODULE_MITS_CARRIER_DATA_PRIVACY_ORDER_MAIL_TEXT' =>
    'Je consens à ce que mon adresse e-mail et/ou mon numéro de téléphone soient transmis à %s 
    afin que le prestataire de services de livraison puisse me contacter par e-mail ou par téléphone avant la livraison de la marchandise aux fins de la prise de rendez-vous pour la livraison ou 
    de la communication d’informations sur le statut de l’envoi. 
    Je peux retirer ce consentement à tout moment.',

  'MODULE_MITS_CARRIER_DATA_PRIVACY_ORDER_MAIL_TEXT_PLAIN' =>
    'Je consens à ce que mon adresse e-mail et/ou mon numéro de téléphone soient transmis à %s 
    afin que le prestataire de services de livraison puisse me contacter par e-mail ou par téléphone avant la livraison de la marchandise aux fins de la prise de rendez-vous pour la livraison ou 
    de la communication d’informations sur le statut de l’envoi. 
    Je peux retirer ce consentement à tout moment.',

  'MODULE_MITS_CARRIER_DATA_PRIVACY_NOT_ACCEPTED_TEXT' =>
    'Je ne consens <strong>pas</strong> à ce que mon adresse e-mail et/ou mon numéro de téléphone soient transmis à %s 
    afin que le prestataire de services de livraison puisse me contacter par e-mail ou par téléphone avant la livraison de la marchandise aux fins de la prise de rendez-vous pour la livraison ou 
    de la communication d’informations sur le statut de l’envoi.',

  'MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_CANCEL' =>
    'Révoquer le consentement à la transmission des données au prestataire de services de livraison &raquo;',

  'MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_ACCEPT' =>
    'Donner son consentement à la transmission des données au prestataire de services de livraison &raquo;<br /><small>(Je peux retirer ce consentement à tout moment.)</small>',

  'MITS_CARRIER_DATA_PRIVACY_LINK_CONFIRM_SUBMIT_TEXT' =>
    'Voulez-vous vraiment modifier votre consentement à la transmission des données aux prestataires de services de livraison&nbsp;?',

  'MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_CANCEL_MESSAGE' =>
    'Votre consentement à la transmission des données au prestataire de services de livraison a été révoqué avec succès&nbsp;!',

  'MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_ACCEPT_MESSAGE' =>
    'Votre consentement à la transmission des données au prestataire de services de livraison a été donné avec succès&nbsp;!',

  'MITS_CARRIER_DATA_PRIVACY_MAILSUBJECT' =>
    'Mise à jour du consentement à la transmission des données au prestataire de services de livraison / Commande n°&nbsp;: ',

  'MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_INTRO' =>
    'Le consentement à la transmission des données aux prestataires de services de livraison a été révoqué. Cela concerne la commande n°&nbsp;: ',

  'MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_END' =>
    'Remarque&nbsp;: vous trouverez des informations détaillées sur l’état actuel dans l’interface d’administration de la boutique, sur la page de détail de la commande&nbsp;!',

  'MITS_CARRIER_DATA_PRIVACY_MAILTEXT_ACCEPT_INTRO' =>
    'Le consentement à la transmission des données aux prestataires de services de livraison a été donné. Cela concerne la commande n°&nbsp;: ',

  'MITS_CARRIER_DATA_PRIVACY_MAILTEXT_ACCEPT_END' =>
    'Remarque&nbsp;: vous trouverez des informations détaillées sur l’état actuel dans l’interface d’administration de la boutique, sur la page de détail de la commande&nbsp;!',

  'MITS_CARRIER_DATA_PRIVACY_ENTRY_ERROR' =>
    'Une ou plusieurs informations ne correspondent pas à la commande ou la commande n’existe pas&nbsp;! Veuillez vérifier vos informations et réessayer. En cas de problème avec le formulaire, veuillez contacter notre support par e-mail à <a href="mailto:' . STORE_OWNER_EMAIL_ADDRESS . '">' . STORE_OWNER_EMAIL_ADDRESS . '</a>',

  'MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_NOT_AVAILABLE' =>
    'ERREUR&nbsp;: cette commande n’existe pas dans notre système ou il n’existe aucun consentement à la transmission des données aux prestataires de services de livraison pouvant être révoqué.',

  'MODULE_MITS_CARRIER_DATA_PRIVACY_CANCEL_TITLE' =>
    'Révoquer le consentement à la collecte de données',

  'MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_INFO' =>
    'Je révoque par la présente mon consentement à la collecte de données par des prestataires de services de livraison pour la commande n°&nbsp;%s avec effet immédiat. Le prestataire de services de livraison ne peut donc <strong>plus</strong> me contacter par e-mail ou par téléphone avant la livraison de la marchandise aux fins de la prise de rendez-vous pour la livraison ni me communiquer des informations sur le statut de l’envoi.',

  'MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_EMAILADDRESS' =>
    'Adresse e-mail de la commande&nbsp;:',

  'MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_CONFIRM_EMAILADDRESS' =>
    'Répéter l’adresse e-mail&nbsp;:',

  'MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_DELIVERYPOSTCODE' =>
    'Code postal de l’adresse de livraison&nbsp;:',
);

foreach ($lang_array as $key => $val) {
    defined($key) || define($key, $val);
}

