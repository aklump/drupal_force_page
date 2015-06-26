<?php
// $Id$

/**
 * @file
 * An example file of the api functions
 *
 * @defgroup force_page Force Page API
 * @{
 */

/**
 * Implements hook_force_page_pages
 *
 * Note that all paths should be the normal paths, not the aliases
 *
 * @param object $account
 *
 * @return array
 * - Keys of the array should be destination urls
 * - Values of the array should be arrays with following keys:
 *  - weight: The lowest weight will take precendence
 *  - test: If this is TRUE the user will be redirected to the array key. If it
 *  is FALSE, this forced page will be overlooked. You would usually use the
 *  $account variable and feed it to some function that returns a boolean value
 *  here; however you can hardcode values as well, or mathmatical expressions,
 *  e.g. time() > 1307744520
 *  - test_arguments: This array will be sent to the test callback
 *  - message: a message to display if the redirection occurs, this must be
 *    sanitized as it will be output directly
 *  - allowed_paths: an array of paths that will be allowed to be visited; you
 *    may also use <front> for the site_frontpage variable
 *    without forcing a redirection, such as "logout"
 */
function hook_force_page_pages($account) {

  //you might do this to only redirect authenticated users...
  if (user_is_anonymous()) {
    return array();
  }

  //... or $account is provided so you can allow for fine-grained bypass rules
  //for authenticated users, such as by role in this example.
  if (in_array('admin', $account->roles)) {
    return array();
  }

  //...otherwise return a list of forced urls
  return array(
    'user/' . $account->uid . '/edit' => array(
      'weight' => 0,
      'test' => !_ft_login_is_profile_complete($account),
      'message' => t('Before you continue, please fill out all of the required Personal Information.'),
      'allowed_paths' => array(
        'logout',
        'user/' . $account->uid . '/edit',
      ),
    ),
  );
}

/**
 * Implements hook_force_page_allowed_paths_alter().
 */
function hook_force_page_allowed_paths_alter($allowed_paths, $current_path) {

}

/** @} */ //end of group force_page
