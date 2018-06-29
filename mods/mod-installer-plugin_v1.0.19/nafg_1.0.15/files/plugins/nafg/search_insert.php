<?php

/* ***** mod No Announce For Guest - NAFG ***** */

/* Files to be modified by replacing string into */
$files_to_replace = array('header.php');

$search_replace_file['header'] = array(
  'if ($pun_user[\'g_read_board\'] == \'1\' && $pun_config[\'o_announcement\'] == \'1\')',
);
$insert_replace_file['header'] = array(
  'if ($pun_user[\'g_read_board\'] == \'1\' && $pun_config[\'o_announcement\'] == \'1\' && !$pun_user[\'is_guest\']) //[modif oto] - mod NAFG - No Announce For Guest',
);

?>
