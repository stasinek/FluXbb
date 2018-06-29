Don't use Windows's Notepad to read this file. Use Notepad++ http://notepad-plus-plus.org/
N'utilisez pas Notepad (Bloc-Notes) de Windows pour lire ce fichier. Utilisez Notepad++ http://notepad-plus-plus.org/fr/

********************************************************************
              F L U X B B     P L U G I N
********************************************************************
##     Plugin title:  Modification Installer
##
##   Plugin version:  1.0.19
##     Release date:  2016-06-17
##  Works on FluxBB:  1.4.6, 1.4.7, 1.4.8, 1.4.9, 1.5.0, 1.5.1, 1.5.2
##                    1.5.3, 1.5.4, 1.5.5, 1.5.6, 1.5.7, 1.5.8, 1.5.9
##                    1.5.10
##            1.0.0:  2011-03-12
##
##           Author:  Otomatic
##
##      Description:  Allows the installation and uninstallation of FluxBB mod's
##                    with one click. Mods files must meet several criteria. (Details below)
##
##   Affected files:  None
##
##       Affects DB:  No
##
##       DISCLAIMER:  Please note that "plugin" are not officially supported by
##                    FluxBB. Installation of this plugin is done at
##                    your own risk. Backup your forum database and any and
##                    all applicable files before proceeding.
##
*************************** INSTALLATION *********************************
#--[ 1. UPLOAD THE CONTENT OF - ENVOYER LE CONTENU DE]--------------------

/files/		to		/your_forum_folder/

 Examples : your_forum_folder/plugins/AP_Mod_Installer.php
            your_forum_folder/plugins/mod_installer/plugin_config.php
            your_forum_folder/plugins/mod_installer/lang/English/plugin_admin.php

 Nota : It is only an example, there are more files to upload.
        Ce n'est qu'un exemple, il y a d'autres fichiers à envoyer.

#---------[ 2. VISIT... - SE RENDRE À...]---------------------------------

Go to the plugin administration page and launch Mod Installer
Rendez vous à la page d'administration des plugins et lancer Mod Installer

#--------[ 3. END  - FIN ]------------------------------------------------

----- English -----
This Mod Installer package has five mods included:
- No Announce For Guest (NAFG)
  If installed, will not show the announce for guests.
- No UserList In Navbar (NULIN)
  If installed, will not show User List item in Menu
- Forum And Topic Actions In Header (FATAIH)
  If installed, will display the possible actions on the forums
  and discussions in the header, in addition to the display at the bottom.
- No Statitics For Guests (NSFG)
  If installed, will not show the statistics of the forum for guests.
- Suppress Messaging Section In Profile (SMSIP)
  If installed, will not show Messaging Section In Profile

To not see the option to install a modification, simply delete the entire folder of the mod.
For example for the mod No UserList In Navbar (NULIN), delete the folder "your_forum/plugins/nulin/"

----- French - Français -----
Le paquetage Mod Installer comprend cinq autres modifications
- No Announce For Guest (NAFG)
  Si installée, les annonces ne sont pas vues par les invités
- No Userlist In Navbar (NULIN)
  Si installée, pas d'item Liste des membres dans le menu
- Forum And Topic Actions In Header (FATAIH)
  Si installée, affiche les actions possibles sur les forums
  et discussions dans l'entête, en plus du bas de page
- No Statistics For Guest
  Si installée, les statistiques du forum seront cachées aux invités
- Suppress Messaging Section In Profile (SMSIP)
  Si installée, supprime toute la section Messageries dans les profiles

*** To not see the option to install a modification, simply delete the entire folder of the mod.
For example for the mod No UserList In Navbar (NULIN), delete the folder "my_forum/plugins/nulin/"

*** Pour ne pas voir une de ces modification dans Mod Installer, il suffit d'en supprimer le dossier afférent.
Par exemple, pour ne pas voir No Userlist In Navbar (NULIN), supprimer le dossier "mon_forum/plugins/nulin/"

**************************************************************************
*********** HOW TO MAKE "MODS" CONSISTENT WITH MOD INSTALLER *************

 To be managed correctly by Mod Installer, the mods should have the following structure:

 All files must be in a folder, named for the abbreviated name of the mod,
 for example "nafg" for No Announce For Guest
 This mod folder must be in "your_forum/plugins/" folder (your_forum/plugins/nafg/)
 In the folder of the mod "your_forum/plugins/nafg/" there must be:

 - A configuration file named "mod_config.php".
   The contents of this file is detailed below
   <?php
   $mod_config array(
     'mod_name'        => 'Complete mod name',
     'version'         => 'Mod version number',
     'release_date'    => 'Date of release (YYYY-MM-DD)',
     'author'          => 'Name of author',

     'mod_installer'   => 'OK', If mod can be installed by all versions of MODINST
         or
     'mod_installer_versions'   => array of versions of Mod Installer this mod was created for

     'fluxbb_versions' => array of versions of FluxBB this mod was created for.
                          A warning will be displayed, if versions do not match
                          array ('1.4.0','1.4.1','1.4.2','1.4.3','1.4.4','1.4.5),
     'date_install'    => 0 or first install Unix timestamp,
     'mod_status'      => 0 if Not installed or Removed - 1 otherwise,
     'mod_abbr'        => 'Abbreviated mod name'
     );
   ?>

 - A search and insert or replace strings file named "search_insert.php"
   If a file to be modify is not located at the root of the forum,
   its path from the root must be declared in the array like this:
      $files_to_insert= array('include/common.php');
   and the same path (without extension) in search or insert strings arrays:
      $search_file['include/common'] = array(...

   See an example below with the four possibilities:

<?php

/* ***** mod For Test TESTOTO ***** */

$files_to_insert = array('test_mod_oto.php');
$files_to_add = array('test_mod_oto.php');
$files_to_replace = array('test_mod_oto.php');
$files_to_move = array('test_mod_oto.php');

/* String to be searched and string to be inserted before */
/* ****** Each insert value must be terminated by \n ****** */
$search_file['test_mod_oto'] = array(
  "// Load the admin_bans.php language file",
);
$insert_file['test_mod_oto'] = array(
 "//modif oto - lines insert before\n//lines before\n//lines before\n",
);

/* String to be searched and string to be added after */
/* ****** Each search and add values must be terminated by \n ****** */
$search_add_file['test_mod_oto'] = array(
	"// Add/edit a ban (stage 1)\n",
);
$insert_add_file['test_mod_oto'] = array(
	"//modif oto - lines add after\n//line after\n//line after\n",
);

/* String to be searched and string to be replaced in files */
$search_replace_file['test_mod_oto'] = array(
	"// Tell header.php to use the admin template\ndefine('PUN_ADMIN_CONSOLE', 1);",
);
$insert_replace_file['test_mod_oto'] = array(
	"// Tell header.php to use the admin template\ndefine('PUN_ADMIN_CONSOLE', 0); //modif oto - Put to zero",
);

/* Strings between get_start and get_end be moved in files */
/* to destination between to_start and to_end              */
/* *** Each ...._start value must be terminated by \n **** */
$move_get_start['test_mod_oto'] = array(
	"require PUN_ROOT.'header.php';\n",
);
$move_get_end['test_mod_oto'] = array(
	"require PUN_ROOT.'include/parser.php';",
);
$move_to_start['test_mod_oto'] = array(
	"\terror('The post table and topic table seem to be out of sync!', __FILE__, __LINE__);\n",
);
$move_to_end['test_mod_oto'] = array(
	"// modif oto - Reverse message order - Quickpost at top if enable",
);


?>

All searched, inserted or added "strings" must be between double-quotes and must have "control characters" like line feed or tab replaced by php equivalents and "special" characters must be escaped it with a backslash.
For example:
$search_file['my_file'] = array(
	"	$output = array();
	while ($cur_rank = $db->fetch_assoc($result))
		$output[] = $cur_rank;
",
);
must be translated into:
$search_file['my_file'] = array(
	"\t\$output = array();\n\twhile (\$cur_rank = \$db->fetch_assoc(\$result))\n\t\t\$output[] = \$cur_rank;\n",
);
The order to replace characters by escaped ones is:
- Replace \t by \\t
- Replace \n by \\n
- Replace $ by \$
- Replace " by \"
- Replace tab by \t
- Replace line feed Windows (CR/LF) by \n
- Replace line feed Unix (LF) by \n

********** Database modifications *********
To add columns in a table, in the file search_insert.php put the variables below:

//tables to add fields
//There may be several table names
$fields_to_add = array('table_name_without_prefix');
//add two fields to table users
//These four arrays are mandatory.
//One group of four arrays per table.
$add_field_name['users'] = array(
	"rmo_order",
	"rmo_quickpost",
);
$add_field_type['users'] = array(
	"TINYINT(1) UNSIGNED",
	"TINYINT(1) UNSIGNED",
);
$add_allow_null['users'] = array(
	false,
	false,
);
$add_default_value['users'] = array(
	"0",
	"0",
);

To add values to config table:
//add value to config table
$config_to_insert = array('config');
//In order: conf_name, conf_value
//There may be several pairs of values (conf_name, conf_value)
$values['config'] = array(
	'o_oto_name_test',
	'oto_value_test',
);

********** install or uninstall scripts *********
Script for install or uninstall can be use.
Must be named:
plugins\my_mod\update_install.php
or
plugins\my_mod\update_uninstall.php
The content may be any valid php script, for example:
<?php
// Regenerate the config cache
if (!defined('FORUM_CACHE_FUNCTIONS_LOADED'))
	require PUN_ROOT.'include/cache.php';
generate_config_cache();
clear_feed_cache();
?>

   In the same file search_insert.php, there may be possibilities for inserting,
   replacing and adding strings; Simply put different arrays.

 - A folder named "lang" with one or more language folder with the same name
   as for FluxBB languages folders.
   Each language file must be named "mod_admin.php"
   See an example with the file from the mod No Announce For Guest
   Necessarily, there must be: plugins/nafg/lang/English/mod_admin.php
   and the name of language array must be "$lang_plugin_admin"

<?php
// Admin language string for mod No Announce For Guest
$lang_plugin_admin = array(
  'Explanation' => 'If installed, will not show the announce for guests.',
);
?>

- All other files needed for the modification, such as include files and language files.

**********************************************************

