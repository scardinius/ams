<?php

require_once 'ams.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function ams_civicrm_config(&$config) {
  _ams_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @param $files array(string)
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function ams_civicrm_xmlMenu(&$files) {
  _ams_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function ams_civicrm_install() {
  _ams_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function ams_civicrm_uninstall() {
  _ams_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function ams_civicrm_enable() {
  _ams_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function ams_civicrm_disable() {
  _ams_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @param $op string, the type of operation being performed; 'check' or 'enqueue'
 * @param $queue CRM_Queue_Queue, (for 'enqueue') the modifiable list of pending up upgrade tasks
 *
 * @return mixed
 *   Based on op. for 'check', returns array(boolean) (TRUE if upgrades are pending)
 *                for 'enqueue', returns void
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function ams_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _ams_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function ams_civicrm_managed(&$entities) {
  _ams_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function ams_civicrm_caseTypes(&$caseTypes) {
  _ams_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function ams_civicrm_angularModules(&$angularModules) {
_ams_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function ams_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _ams_civix_civicrm_alterSettingsFolders($metaDataFolders);
}


/**
 * Implements hook_civicrm_alterMailParams().
 *
 * @param $params
 * @param $context
 */
function ams_civicrm_alterMailParams(&$params, $context) {
  if (array_key_exists('ams', $params) && $params['ams']) {
    $session = CRM_Core_Session::singleton();
    $session->set('ams', $params['ams'], 'ams');
  }
}


/**
 * Implements hook_civicrm_alterMailer().
 *
 * @param $mailer
 * @param $driver
 * @param $params
 */
function ams_civicrm_alterMailer(&$mailer, $driver, $params) {
  $session = CRM_Core_Session::singleton();
  $ams = $session->get('ams', 'ams');
  CRM_Core_Error::debug_var('$ams', $ams, false, true);
  if ($ams) {
    $mailingInfoAlternate = CRM_Core_BAO_Setting::getItem(CRM_Core_BAO_Setting::MAILING_PREFERENCES_NAME, 'mailing_backend_alternate');
  }
}
