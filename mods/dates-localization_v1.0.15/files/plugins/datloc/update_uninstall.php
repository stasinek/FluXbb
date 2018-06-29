<?php
//Uninstall script for mod DATLOC - Dates Localization
$value = 'Y-m-d';
$key = 'date_format';
$db->query('UPDATE '.$db->prefix.'config SET conf_value=\''.$db->escape($value).'\' WHERE conf_name=\'o_'.$db->escape($key).'\'') or error('Unable to update board config', __FILE__, __LINE__, $db->error());
// Regenerate the config cache
if (!defined('FORUM_CACHE_FUNCTIONS_LOADED'))
	require PUN_ROOT.'include/cache.php';
generate_config_cache();
clear_feed_cache();

?>