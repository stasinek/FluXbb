<?php

/* ***** mod Suppress Messaging Section In Profile - SMSIP ***** */

/* Files to be modified by replacing string into */
$files_to_replace = array('profile.php', 'include/functions.php');

$search_replace_file['profile'] = array(
  "\t\tcase 'messaging':\n\t\t{\n\t\t\t\$form = array(\n\t\t\t\t'jabber'\t\t=> pun_trim(\$_POST['form']['jabber']),\n\t\t\t\t'icq'\t\t\t=> pun_trim(\$_POST['form']['icq']),\n\t\t\t\t'msn'\t\t\t=> pun_trim(\$_POST['form']['msn']),\n\t\t\t\t'aim'\t\t\t=> pun_trim(\$_POST['form']['aim']),\n\t\t\t\t'yahoo'\t\t\t=> pun_trim(\$_POST['form']['yahoo']),\n\t\t\t);\n\n\t\t\t// If the ICQ UIN contains anything other than digits it's invalid\n\t\t\tif (preg_match('%[^0-9]%', \$form['icq']))\n\t\t\t\tmessage(\$lang_prof_reg['Bad ICQ']);\n\n\t\t\tbreak;\n\t\t}\n",
  "\t\$user_messaging = array();\n\n\tif (\$user['jabber'] != '')\n\t{\n\t\t\$user_messaging[] = '<dt>'.\$lang_profile['Jabber'].'</dt>';\n\t\t\$user_messaging[] = '<dd>'.pun_htmlspecialchars((\$pun_config['o_censoring'] == '1') ? censor_words(\$user['jabber']) : \$user['jabber']).'</dd>';\n\t}\n\n\tif (\$user['icq'] != '')\n\t{\n\t\t\$user_messaging[] = '<dt>'.\$lang_profile['ICQ'].'</dt>';\n\t\t\$user_messaging[] = '<dd>'.\$user['icq'].'</dd>';\n\t}\n\n\tif (\$user['msn'] != '')\n\t{\n\t\t\$user_messaging[] = '<dt>'.\$lang_profile['MSN'].'</dt>';\n\t\t\$user_messaging[] = '<dd>'.pun_htmlspecialchars((\$pun_config['o_censoring'] == '1') ? censor_words(\$user['msn']) : \$user['msn']).'</dd>';\n\t}\n\n\tif (\$user['aim'] != '')\n\t{\n\t\t\$user_messaging[] = '<dt>'.\$lang_profile['AOL IM'].'</dt>';\n\t\t\$user_messaging[] = '<dd>'.pun_htmlspecialchars((\$pun_config['o_censoring'] == '1') ? censor_words(\$user['aim']) : \$user['aim']).'</dd>';\n\t}\n\n\tif (\$user['yahoo'] != '')\n\t{\n\t\t\$user_messaging[] = '<dt>'.\$lang_profile['Yahoo'].'</dt>';\n\t\t\$user_messaging[] = '<dd>'.pun_htmlspecialchars((\$pun_config['o_censoring'] == '1') ? censor_words(\$user['yahoo']) : \$user['yahoo']).'</dd>';\n\t}\n",
  "\telse if (\$section == 'messaging')\n\t{\n\n\t\t\$page_title = array(pun_htmlspecialchars(\$pun_config['o_board_title']), \$lang_common['Profile'], \$lang_profile['Section messaging']);\n\t\tdefine('PUN_ACTIVE_PAGE', 'profile');\n\t\trequire PUN_ROOT.'header.php';\n\n\t\tgenerate_profile_menu('messaging');\n\n?>\n\t<div class=\"blockform\">\n\t\t<h2><span><?php echo pun_htmlspecialchars(\$user['username']).' - '.\$lang_profile['Section messaging'] ?></span></h2>\n\t\t<div class=\"box\">\n\t\t\t<form id=\"profile3\" method=\"post\" action=\"profile.php?section=messaging&amp;id=<?php echo \$id ?>\">\n\t\t\t\t<div class=\"inform\">\n\t\t\t\t\t<fieldset>\n\t\t\t\t\t\t<legend><?php echo \$lang_profile['Contact details legend'] ?></legend>\n\t\t\t\t\t\t<div class=\"infldset\">\n\t\t\t\t\t\t\t<input type=\"hidden\" name=\"form_sent\" value=\"1\" />\n\t\t\t\t\t\t\t<label><?php echo \$lang_profile['Jabber'] ?><br /><input id=\"jabber\" type=\"text\" name=\"form[jabber]\" value=\"<?php echo pun_htmlspecialchars(\$user['jabber']) ?>\" size=\"40\" maxlength=\"75\" /><br /></label>\n\t\t\t\t\t\t\t<label><?php echo \$lang_profile['ICQ'] ?><br /><input id=\"icq\" type=\"text\" name=\"form[icq]\" value=\"<?php echo \$user['icq'] ?>\" size=\"12\" maxlength=\"12\" /><br /></label>\n\t\t\t\t\t\t\t<label><?php echo \$lang_profile['MSN'] ?><br /><input id=\"msn\" type=\"text\" name=\"form[msn]\" value=\"<?php echo pun_htmlspecialchars(\$user['msn']) ?>\" size=\"40\" maxlength=\"50\" /><br /></label>\n\t\t\t\t\t\t\t<label><?php echo \$lang_profile['AOL IM'] ?><br /><input id=\"aim\" type=\"text\" name=\"form[aim]\" value=\"<?php echo pun_htmlspecialchars(\$user['aim']) ?>\" size=\"20\" maxlength=\"30\" /><br /></label>\n\t\t\t\t\t\t\t<label><?php echo \$lang_profile['Yahoo'] ?><br /><input id=\"yahoo\" type=\"text\" name=\"form[yahoo]\" value=\"<?php echo pun_htmlspecialchars(\$user['yahoo']) ?>\" size=\"20\" maxlength=\"30\" /><br /></label>\n\t\t\t\t\t\t</div>\n\t\t\t\t\t</fieldset>\n\t\t\t\t</div>\n\t\t\t\t<p class=\"buttons\"><input type=\"submit\" name=\"update\" value=\"<?php echo \$lang_common['Submit'] ?>\" /> <?php echo \$lang_profile['Instructions'] ?></p>\n\t\t\t</form>\n\t\t</div>\n\t</div>\n<?php\n\n	}",
);

$insert_replace_file['profile'] = array(
  "    // [modif oto]  Mod SMSIP - Suppress Messaging Section In Profile\n    // case 'messaging':\n",
  "  //\$user_messaging = array(); [modif oto] Mod SMSIP - Suppress Messaging Section In Profile",
  "  // else if (\$section == 'messaging') [modif oto] Mod SMSIP - Suppress Messaging Section In Profile",
);

$search_replace_file['include/functions'] = array(
  "// Display the profile navigation menu",
  "<li<?php if (\$page == 'messaging') echo ' class=\"isactive\"'; ?>><a href=\"profile.php?section=messaging&amp;id=<?php echo \$id ?>\"><?php echo \$lang_profile['Section messaging'] ?></a></li>",
);
$insert_replace_file['include/functions'] = array(
  "// Display the profile navigation menu\n//[modif oto] Mod SMSIP - Suppress Messaging Section In Profile",
  "<!-- [modif oto] Mod SMSIP - Suppress Messaging Section In Profile <li<?php if (\$page == 'messaging') echo ' class=\"isactive\"'; ?>><a href=\"profile.php?section=messaging&amp;id=<?php echo \$id ?>\"><?php echo \$lang_profile['Section messaging'] ?></a></li> -->",
);

?>
