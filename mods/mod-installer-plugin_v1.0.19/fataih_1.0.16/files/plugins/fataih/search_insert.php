<?php

/* ***** mod Forum And Topic Actions In Header - FATAIH ***** */

/* Files to be modified by replacing string into */
$files_to_replace = array('viewtopic.php', 'header.php');

$search_replace_file['viewtopic'] = array(
  "{\n\t\$token_url = '&amp;csrf_token='.pun_csrf_token();\n\n\tif (\$cur_topic['is_subscribed'])\n\t\t// I apologize for the variable naming here. It's a mix of subscription and action I guess :-)\n\t\t\$subscraction = \"\\t\\t\".'<p class=\"subscribelink clearb\"><span>'.\$lang_topic['Is subscribed'].' - </span><a id=\"unsubscribe\" href=\"misc.php?action=unsubscribe&amp;tid='.\$id.\$token_url.'\">'.\$lang_topic['Unsubscribe'].'</a></p>'.\"\\n\";\n\telse\n\t\t\$subscraction = \"\\t\\t\".'<p class=\"subscribelink clearb\"><a href=\"misc.php?action=subscribe&amp;tid='.\$id.\$token_url.'\">'.\$lang_topic['Subscribe'].'</a></p>'.\"\\n\";\n}\nelse\n\t\$subscraction = '';\n",
);
$insert_replace_file['viewtopic'] = array(
  "{ //[modif oto] mod FATAIH - Add of \$topic_action_oto for wiew topic actions in header\n\t\$topic_action_oto = array();\n\t\$token_url = '&amp;csrf_token='.pun_csrf_token();\n\n\tif (\$cur_topic['is_subscribed']) {\n\t\t// I apologize for the variable naming here. It's a mix of subscription and action I guess :-)\n\t\t\$subscraction = \"\\t\\t\".'<p class=\"subscribelink clearb\"><span>'.\$lang_topic['Is subscribed'].' - </span><a id=\"unsubscribe\" href=\"misc.php?action=unsubscribe&amp;tid='.\$id.\$token_url.'\">'.\$lang_topic['Unsubscribe'].'</a></p>'.\"\\n\";\n\t\t\$topic_action_oto[] = \$lang_topic['Is subscribed'].' : <a href=\"misc.php?action=unsubscribe&amp;tid='.\$id.'\">'.\$lang_topic['Unsubscribe'].'</a>';\n\t}\n\telse {\n\t\t\$subscraction = \"\\t\\t\".'<p class=\"subscribelink clearb\"><a href=\"misc.php?action=subscribe&amp;tid='.\$id.\$token_url.'\">'.\$lang_topic['Subscribe'].'</a></p>'.\"\\n\";\n\t\t\$topic_action_oto[] = '<a href=\"misc.php?action=subscribe&amp;tid='.\$id.'\">'.\$lang_topic['Subscribe'].'</a>';\n\t}\n}\nelse {\n\t\$subscraction = '';\n\t\$topic_action_oto = array();\n} //[modif oto] - End for view topic actions in header\n",
);

$search_replace_file['header'] = array(
  "// Generate quicklinks\nif (!empty(\$page_topicsearches))\n{\n\t\$tpl_temp .= \"\\n\\t\\t\\t\".'<ul class=\"conr\">';\n\t\$tpl_temp .= \"\\n\\t\\t\\t\\t\".'<li><span>'.\$lang_common['Topic searches'].' '.implode(' | ', \$page_topicsearches).'</span></li>';\n\t\$tpl_temp .= \"\\n\\t\\t\\t\".'</ul>';\n}\n",
);

$insert_replace_file['header'] = array(
  "//modif oto] - MOD FATAIH - Add of \$topic_action_oto - Generate quicklinks\nif (!empty(\$page_topicsearches))\n{\n\t\$tpl_temp .= \"\\n\\t\\t\\t\".'<ul class=\"conr\">';\n\t\$tpl_temp .= \"\\n\\t\\t\\t\\t\".'<li><span>'.\$lang_common['Topic searches'].' '.implode(' | ', \$page_topicsearches).'</span></li>';\n\tif (!empty(\$forum_actions)) \$tpl_temp .= \"\\n\\t\\t\\t\\t\".'<li><span>'.implode(' | ', \$forum_actions).'</span></li>';\n\tif (!empty(\$topic_action_oto)) \$tpl_temp .= \"\\n\\t\\t\\t\\t\".'<li><span>'.implode(' | ',\$topic_action_oto).'</span></li>';\n\t\$tpl_temp .= \"\\n\\t\\t\\t\".'</ul>';\n}\n",
);

?>
