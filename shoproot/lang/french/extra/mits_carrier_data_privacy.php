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

define('MODULE_MITS_CARRIER_DATA_PRIVACY_CHECKOUT_TITLE','Consentement à la divulgation des données');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_CHECKOUT_TEXT','Je consens à ce que mon adresse e-mail et / ou mon numéro de téléphone soient divulgués à <span id="mits_carrier_data">' . MODULE_MITS_CARRIER_DATA_PRIVACY_DEFAULT_ADDRESS . '</span>  pour que le prestataire de services de colis me contacte afin de coordonner une date de livraison et/ou de fournir des informations sur l\'\état de la livraison. Je peux retirer mon consentement à tout moment.');

define('MODULE_MITS_CARRIER_DATA_PRIVACY_ORDER_MAIL_TEXT','e consens à ce que mon adresse e-mail et / ou mon numéro de téléphone soient divulgués à  %s pour que le prestataire de services de colis me contacte afin de coordonner une date de livraison et/ou de fournir des informations sur l\'\état de la livraison. Je peux retirer mon consentement à tout moment.');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_ORDER_MAIL_TEXT_PLAIN','e consens à ce que mon adresse e-mail et / ou mon numéro de téléphone soient divulgués à  %s our que le prestataire de services de colis me contacte afin de coordonner une date de livraison et/ou de fournir des informations sur l\'\état de la livraison. Je peux retirer mon consentement à tout moment.');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_NOT_ACCEPTED_TEXT','Je <strong>ne consnes pas</strong> à ce que mon adresse e-mail et mon numéro de téléphone soient divulgués à %s pour la coordination des dates de livraison et les informations sur l\'\état de la livraison.');

define('MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_CANCEL','Retirer le consentement à la divulgation des données au fournisseur de services de colis &raquo;');
define('MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_ACCEPT','Consentement à la divulgation des données au prestataire de services d\'\envoi de colis &raquo;<br /><small>(Je peux retirer mon consentement à tout moment.)</small>');
define('MITS_CARRIER_DATA_PRIVACY_LINK_CONFIRM_SUBMIT_TEXT','Êtes-vous sûr de vouloir modifier vos paramètres de consentement à la divulgation de données aux fournisseurs de services de colis ?');
define('MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_CANCEL_MESSAGE','Vous avez retiré votre consentement à la divulgation des données aux fournisseurs de services de colis.');
define('MITS_CANCEL_CARRIER_DATA_PRIVACY_TEXT_ACCEPT_MESSAGE','Vous avez maintenant consenti à la divulgation des données aux fournisseurs de services de colis.');

define('MITS_CARRIER_DATA_PRIVACY_MAILSUBJECT','Mise à jour de votre consentement à la divulgation des données aux prestataires de services de colis pour la commande n° ');
define('MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_INTRO','Votre consentement à la divulgation des données aux fournisseurs de services de colis a été retiré. Ceci a un impact sur la commande n° ');
define('MITS_CARRIER_DATA_PRIVACY_MAILTEXT_CANCEL_END','Avis : Les détails sur l\'\état actuel de votre consentement sont disponibles dans les détails de la commande sur votre page personnelle dans notre boutique en ligne.');
define('MITS_CARRIER_DATA_PRIVACY_MAILTEXT_ACCEPT_INTRO','Votre consentement à la divulgation des données aux fournisseurs de services de colis a été enregistré. Ceci a un impact sur le commande n° ');
define('MITS_CARRIER_DATA_PRIVACY_MAILTEXT_ACCEPT_END','Avis : Les détails sur l\'\état actuel de votre consentement sont disponibles dans les détails de la commande sur votre page personnelle dans notre boutique en ligne.');

define('MITS_CARRIER_DATA_PRIVACY_ENTRY_ERROR','Un ou plusieurs détails ne correspondent pas à la commande ou la commande n\'\existe pas. Veuillez vérifier les données que vous avez saisies et réessayer. Si vous rencontrez un problème persistant avec ce formulaire, veuillez envoyer un e-mail à notre équipe d\'assistance à l\'adresse suivante : <a href="mailto:'.STORE_OWNER_EMAIL_ADDRESS.'">'.STORE_OWNER_EMAIL_ADDRESS.'</a>');
define('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_NOT_AVAILABLE','ERREUR : Soit cette commande n\'\existe pas dans notre base de données, soit la divulgation des données aux fournisseurs de services de colis a déjà été refusée.');
define('MODULE_MITS_CARRIER_DATA_PRIVACY_CANCEL_TITLE','Retrait du consentement à la divulgation des données');
define('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_INFO','Je retire mon consentement à la divulgation de données aux fournisseurs de services de colis pour mon commande n° %s avec effet immédiat. Le prestataire de services de colis <strong>ne peut pas</strong> me contacter pour coordonner une date de livraison et / ou fournir des informations sur l\'\état de la livraison.');
define('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_EMAILADDRESS','Saisissez l\'\adresse e-mail utilisée lors de la commande');
define('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_CONFIRM_EMAILADDRESS','Veuillez confirmer l\'\adresse e-mail');
define('MITS_DATA_CARRIER_PRIVACY_TEXT_CANCEL_DELIVERYPOSTCODE','Code postal de l\'adresse de livraison :');
