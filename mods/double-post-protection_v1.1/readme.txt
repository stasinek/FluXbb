##
##
##        Mod title:  Double post protection
##
##      Mod version:  1.1
##  Works on FluxBB:  1.4.0, 1.4.1, 1.4.2, 1.4.3, 1.4.4, 1.4.5
##     Release date:  2011-04-10
##      Review date:  YYYY-MM-DD (Leave unedited)
##           Author:  François (admin@terrygoodkind.fr)
##
##      Description:  This mod prevent member to post two consecutive posts
##					  in the same topic with less  than X minutes between them.
##
##   Repository URL:  http://fluxbb.org/resources/mods/xxx (Leave unedited)
##
##   Affected files:  admin_groups.php
##                    post.php
##
##       Affects DB:  Yes
##
##            Notes:  
##
##       DISCLAIMER:  Please note that "mods" are not officially supported by
##                    FluxBB. Installation of this modification is done at 
##                    your own risk. Backup your forum database and any and
##                    all applicable files before proceeding.
##
##


#
#---------[ 1. UPLOAD ]-------------------------------------------------------
#

files/install_mod.php to /
files/lang/English/mod_double_post.php to /lang/English/
files/lang/French/mod_double_post.php to /lang/French/


#
#---------[ 2. RUN ]----------------------------------------------------------
#

install_mod.php


#
#---------[ 3. DELETE ]-------------------------------------------------------
#

install_mod.php


#
#---------[ 4. OPEN ]---------------------------------------------------------
#

admin_groups.php


#
#---------[ 5. FIND (line: 21) ]---------------------------------------------
#

	require PUN_ROOT.'lang/'.$admin_language.'/admin_groups.php';
	


#
#---------[ 6. AFTER, ADD ]-------------------------------------------------
#

	// Mod double post protection
	if (file_exists(PUN_ROOT.'lang/'.$pun_user['language'].'/mod_double_post.php'))
		require PUN_ROOT.'lang/'.$pun_user['language'].'/mod_double_post.php';
	else
		require PUN_ROOT.'lang/English/mod_double_post.php';
	// End mod double-post protection

	
#
#---------[ 7. FIND (line: 220) ]---------------------------------------------
#

	<th scope="row"><?php echo $lang_admin_groups['E-mail flood label'] ?></th>
		<td>
			<input type="text" name="email_flood" size="5" maxlength="4" value="<?php echo $group['g_email_flood'] ?>" tabindex="26" />
			<span><?php echo $lang_admin_groups['E-mail flood help'] ?></span>
		</td>
	</tr>


#
#---------[ 8. AFTER, ADD ]-------------------------------------------------
#	
	
	<!-- Mod double post protection -->
	<tr>
		<th scope="row"><?php echo $lang_mod_double_post['Double post label'] ?></th>
		<td>
			<input type="text" name="double_post" size="5" maxlength="4" value="<?php echo $group['g_double_post'] ?>" tabindex="26" />
			<span><?php echo $lang_mod_double_post['Double post help'] ?></span>
		</td>
	</tr>
	<!-- End mod double-post protection -->
	
#
#---------[ 9. FIND (line: 281) ]---------------------------------------------
#

	$email_flood = isset($_POST['email_flood']) ? intval($_POST['email_flood']) : '0';


#
#---------[ 10. AFTER, ADD ]-------------------------------------------------
#

	// Mod double post protection
	$double_post = isset($_POST['double_post']) ? intval($_POST['double_post']) : '0';
	// End mod double post protection
	
	
#
#---------[ 11. FIND (line: 298) ]---------------------------------------------
#
	
		$db->query('INSERT INTO '.$db->prefix.'groups (g_title, g_user_title, g_moderator, g_mod_edit_users, g_mod_rename_users, g_mod_change_passwords, g_mod_ban_users, g_read_board, g_view_users, g_post_replies, g_post_topics, g_edit_posts, g_delete_posts, g_delete_topics, g_set_title, g_search, g_search_users, g_send_email, g_post_flood, g_search_flood, g_email_flood) VALUES(\''.$db->escape($title).'\', '.$user_title.', '.$moderator.', '.$mod_edit_users.', '.$mod_rename_users.', '.$mod_change_passwords.', '.$mod_ban_users.', '.$read_board.', '.$view_users.', '.$post_replies.', '.$post_topics.', '.$edit_posts.', '.$delete_posts.', '.$delete_topics.', '.$set_title.', '.$search.', '.$search_users.', '.$send_email.', '.$post_flood.', '.$search_flood.', '.$email_flood.')') or error('Unable to add group', __FILE__, __LINE__, $db->error());


#
#---------[ 12. IN THIS LINE, FIND ]-------------------------------------------------
#

	g_email_flood


#
#---------[ 13. AFTER, ADD ]---------------------------------------------
#


	, g_double_post

			
#
#---------[ 14. IN THE SAME LINE, FIND ]-------------------------------------------------
#	

	'.$email_flood.'

#
#---------[ 15. AFTER, ADD ]---------------------------------------------
#	
	
	, '.$double_post.'
	
	
#
#---------[ 16. FIND (line: 312) ]---------------------------------------------
#

	$db->query('UPDATE '.$db->prefix.'groups SET g_title=\''.$db->escape($title).'\', g_user_title='.$user_title.', g_moderator='.$moderator.', g_mod_edit_users='.$mod_edit_users.', g_mod_rename_users='.$mod_rename_users.', g_mod_change_passwords='.$mod_change_passwords.', g_mod_ban_users='.$mod_ban_users.', g_read_board='.$read_board.', g_view_users='.$view_users.', g_post_replies='.$post_replies.', g_post_topics='.$post_topics.', g_edit_posts='.$edit_posts.', g_delete_posts='.$delete_posts.', g_delete_topics='.$delete_topics.', g_set_title='.$set_title.', g_search='.$search.', g_search_users='.$search_users.', g_send_email='.$send_email.', g_post_flood='.$post_flood.', g_search_flood='.$search_flood.', g_email_flood='.$email_flood.' WHERE g_id='.intval($_POST['group_id'])) or error('Unable to update group', __FILE__, __LINE__, $db->error());


#
#---------[ 17. IN THIS LINE, FIND ]-------------------------------------------------
#	
	
	g_email_flood='.$email_flood.'
		
		
#
#---------[ 18. AFTER, ADD ]---------------------------------------------------------
#

	, g_double_post='.$double_post.'

	
#
#---------[ 19. OPEN ]---------------------------------------------
#	
	
post.php	

	
#
#---------[ 20. FIND (line: 22) ]---------------------------------------------
#

	// Fetch some info about the topic and/or the forum
	if ($tid)
		$result = $db->query('SELECT f.id, f.forum_name, f.moderators, f.redirect_url, fp.post_replies, fp.post_topics, t.subject, t.closed, s.user_id AS is_subscribed


#
#---------[ 21. AFTER, ADD ]---------------------------------------------------
#

	, t.last_poster, t.last_post


#
#---------[ 22. FIND (line: 52) ]--------------------------------------------
#

	// Load the post.php language file
	require PUN_ROOT.'lang/'.$pun_user['language'].'/post.php';


#
#---------[ 23. AFTER, ADD ]-------------------------------------------------
#

	// Mod double post protection
	if (file_exists(PUN_ROOT.'lang/'.$pun_user['language'].'/mod_double_post.php'))
       require PUN_ROOT.'lang/'.$pun_user['language'].'/mod_double_post.php';
	else
       require PUN_ROOT.'lang/English/mod_double_post.php';
	// End mod double post protection

#
#---------[ 24. FIND (line: 73) ]--------------------------------------------
#

	// Flood protection
	if (!isset($_POST['preview']) && $pun_user['last_post'] != '' && (time() - $pun_user['last_post']) < $pun_user['g_post_flood'])
		$errors[] = $lang_post['Flood start'].' '.$pun_user['g_post_flood'].' '.$lang_post['flood end'];


#
#---------[ 25. AFTER, ADD ]-------------------------------------------------
#

	// Mod double post protection
	else if (!isset($_POST['preview']) && $tid)
	{
		if($cur_posting['last_post'] != '' && $pun_user['username'] == $cur_posting['last_poster'] && (time() - $cur_posting['last_post']) < $pun_user['g_double_post'] * 60)
			$errors[] = $lang_mod_double_post['Double post start'].' '.$pun_user['g_double_post'].' '.$lang_mod_double_post['Double post end'];	
	}
	// Mod double post protection

	
#
#---------[ 26. SAVE/UPLOAD ]-------------------------------------------------
#

/post.php
/admin_groups.php

