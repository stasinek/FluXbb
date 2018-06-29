<?php

/* ***** mod No UserList In Navbar - NULIN ***** */

/* Files to be modified by replacing string into */
$files_to_replace = array('header.php');

$search_replace_file['header'] = array(
  'if ($pun_user[\'g_read_board\'] == \'1\' && $pun_user[\'g_view_users\'] == \'1\')',
);
$insert_replace_file['header'] = array(
  "\$oto_no_userlist = true; //[modif oto] - No UserList In NavBar\nif (\$pun_user['g_read_board'] == '1' && \$pun_user['g_view_users'] == '1' && !\$oto_no_userlist)",
);

?>
