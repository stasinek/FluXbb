<?php

/* ***** mod Dates Localization - DATLOC ***** */

/* ----------------------------------------------------------------- */
/* ******* These values can be defined by the administrator ******** */
	//Pour Français de France - For French of France
	//setlocale possible values for your country (see http://fr2.php.net/manual/en/function.setlocale.php)
	$datloc_local_values = array('fr_FR','french','fr_FR.utf8','French_France.1252','fr_FR.ISO8859-1','fra');
	//strftime() Date formats to be selected by users.
	$datloc_date_formats = array('%d %b %Y', '%A %d %B %Y', '%a %d %B %Y', '%a %d %b %Y', '%d-%m-%Y', '%Y-%m-%d');
	//default strftime() format for date
	$datloc_date_default = '%d %B %Y';
	//Type of charset encoding output from strftime (see http://www.gnu.org/software/libiconv/)
	//The charset given must be compatible with iconv (see http://fr2.php.net/manual/en/function.iconv.php)
	$datloc_strftime_coding = 'ISO-8859-1';
/* ----------------------------------------------------------------- */

/* Files to be modified by replacing string into */
$files_to_replace = array('include/common.php', 'include/functions.php', 'admin_options.php');

$search_replace_file['include/common'] = array(
  "\$forum_date_formats = array(\$pun_config['o_date_format'], 'Y-m-d', 'Y-d-m', 'd-m-Y', 'm-d-Y', 'M j Y', 'jS M Y');",
);
$insert_replace_file['include/common'] = array(
  "// modif oto - mod DATLOC Dates Localization - Formats for strftime() in place of gmdate()\n\$forum_date_formats = array(\$pun_config['o_date_format'],'".implode("','",$datloc_date_formats)."');",
);

$search_replace_file['include/functions'] = array(
  "\t\$date = gmdate(\$date_format, \$timestamp);\n\t\$today = gmdate(\$date_format, \$now+\$diff);\n\t\$yesterday = gmdate(\$date_format, \$now+\$diff-86400);\n\n\tif(!\$no_text)\n\t{\n\t\tif (\$date == \$today)\n\t\t\t\$date = \$lang_common['Today'];\n\t\telse if (\$date == \$yesterday)\n\t\t\t\$date = \$lang_common['Yesterday'];\n\t}",
);
$insert_replace_file['include/functions'] = array(
  "  // modif oto mod DATLOC - Dates Localization - function date() replaced by strftime()\n  //We must keep the yesterday and today comparisons with gmdate()\n  //Perform comparisons Today and Yesterday with \$date_comp instead of \$date\n  \$date_comp = gmdate('d-m-Y', \$timestamp); //'d-m-Y'\n  \$today = gmdate('d-m-Y', \$now+\$diff); //'d-m-Y'\n  \$yesterday = gmdate('d-m-Y', \$now+\$diff-86400); //'d-m-Y'\n  setlocale(LC_TIME,'".implode("','",$datloc_local_values)."');\n  \$date =  iconv('".$datloc_strftime_coding."', 'UTF-8//TRANSLIT//IGNORE',strftime(\$date_format, \$timestamp));\n\n\tif(!\$no_text)\n\t{\n\t\tif (\$date_comp == \$today)\n\t\t\t\$date = \$lang_common['Today'];\n\t\telse if (\$date_comp == \$yesterday)\n\t\t\t\$date = \$lang_common['Yesterday'];\n\t}",
);

$search_replace_file['admin_options'] = array(
  "\n// Tell header.php to use the admin template",
  "\n\tif (\$form['date_format'] == '')\n\t\t\$form['date_format'] = 'Y-m-d';",
  "\t\$timestamp = time() + \$diff;\n",
  "<span><?php printf(\$lang_admin_options['Date format help'], gmdate(\$pun_config['o_date_format'], \$timestamp), '<a href=\"http://www.php.net/manual/en/function.date.php\">'.\$lang_admin_options['PHP manual'].'</a>') ?></span>",
);
$insert_replace_file['admin_options'] = array(
  "// modif oto - mod DATLOC - Dates localization - strftime() in place of date() Format in database = ".$datloc_date_default."\n// Tell header.php to use the admin template",
  "\t//modif oto - mod DATLOC Dates Localization - Default format : ".$datloc_date_default."\n\tif (\$form['date_format'] == '')\n\t\t\$form['date_format'] = '".$datloc_date_default."';",
  "\t\$timestamp = time() + \$diff;\n// modif oto mod DATLOC Dates Localization - strftime() on input date_format",
  "<span><?php printf(\$lang_admin_options['Date format help'], iconv('".$datloc_strftime_coding."', 'UTF-8//TRANSLIT//IGNORE',strftime(\$pun_config['o_date_format'], \$timestamp)), '<a href=\"http://www.php.net/manual/en/function.strftime.php\">'.\$lang_admin_options['PHP manual'].'</a>') ?></span>",
);
 
?>
