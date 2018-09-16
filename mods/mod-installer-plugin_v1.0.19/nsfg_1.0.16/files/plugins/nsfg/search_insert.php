<?php

/* ***** mod No Statictics For Guest - NSFG ***** */

$files_to_insert = array('index.php');

/* String to be searched and string to be inserted in files */
/* ****** Each insert value must be terminated by \n ****** */
$search_file['index'] = array(
  "// Collect some statistics from the database",
  "\$footer_style = 'index';",
);
$insert_file['index'] = array(
 "if(!\$pun_user['is_guest']) : //[modif oto] - No Statistics For Guest\n",
 "endif;//[modif oto] - Endif Mod No Statistics For Guest\n",
);

$files_to_replace = array('extern.php');
$search_replace_file['extern'] = array(
	"// Show users online\nelse if (\$action == 'online' || \$action == 'online_full')",
	"// Show board statistics\nelse if (\$action == 'stats')",
);
$insert_replace_file['extern'] = array(
	"// Show users online - modif oto - mod No Statictics For Guests\nelse if ((\$action == 'online' || \$action == 'online_full') && !\$pun_user['is_guest'])",
	"// Show board statistics - modif oto - mod No Statictics For Guests\nelse if (\$action == 'stats' && !\$pun_user['is_guest'])",
);

?>
