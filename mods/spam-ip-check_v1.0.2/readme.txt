##
##
##        Mod title:  Spam IP Check
##
##      Mod version:  1.0.2
##  Works on FluxBB:  1.4.5
##     Release date:  2011-05-12
##      Review date:  2011-05-12
##           Author:  blissend@gmail.com
##
##      Description:  This mod checks users IP trying to register against
##					  DNSBL list online like stopforumspam.com and others
##					  you can add. If their IP is found it'll deny
##					  registration.
##
##   Repository URL:  http://fluxbb.org/resources/mods/spam-ip-check/
##
##   Affected files:  register.php
##					  admin_options.php
##                    lang/English/register.php
##					  lang/English/admin_options.php
##
##       Affects DB:  Yes
##
##            Notes:  You can check http://www.dnsbl.info/ for other DNSBL
##					  lists you may want to use instead of what's provided
##					  by default.
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

install_mod.php to /

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

register.php

#
#---------[ 5. FIND (line: 60) ]---------------------------------------------
#

	require PUN_ROOT.'footer.php';
}

#
#---------[ 6. AFTER, ADD ]---------------------------------------------------
#

//--------------Start Spam IP Check--------------
if ($pun_config['o_ipcheck_enable'] == 1 && empty($_POST['form_sent']))
{
	$ip = get_remote_address();
	$timestamp = time();
	$current_day = floor($timestamp/86400);
	$last_day = floor($pun_config['o_ipcheck_timestamp']/86400);
	$check = 0; // if 1 it'll do a dnsbl lookup
	$resetlimit = 0; // if not 0 it'll reset the total lookups
	
	// Prevent the same IP being checked every hour if it already failed
	if ($pun_config['o_ipcheck_lastip'] == $ip && $pun_config['o_ipcheck_pass'] == 0 && ($timestamp - 3600) < $pun_config['o_ipcheck_timestamp'])
		message($lang_register['Spam IP Failed']);
	else if ($pun_config['o_ipcheck_lastip'] != $ip || ($timestamp - 3600) > $pun_config['o_ipcheck_timestamp'])
	{
		if ($current_day == $last_day)
		{
			if ($pun_config['o_ipcheck_used'] < $pun_config['o_ipcheck_limit'])
				$check = 1;
			else if ($pun_config['o_ipcheck_overlimit_reg'] == 0)
				message($lang_register['Spam IP Overlimit']);
		}
		else
		{
			$check = 1;
			$resetlimit = 1;
		}
		if ($check == 1)
		{
			$dnsbl_lists = explode(",", preg_replace('/\s+/', '', $pun_config['o_ipcheck_dnsbl']));
			$reverse_ip = implode(".", array_reverse(explode(".", $ip)));
			$pass = 1;
			
			foreach($dnsbl_lists as $list)
			{
				if (checkdnsrr($reverse_ip.".".$list.".", "A")) 
				{
					$pass = 0;
					break; // for speedy checks just find in any list and then break
				}
			}
			
			$db->query('UPDATE '.$db->prefix.'config SET conf_value=\''.$ip.'\' WHERE conf_name=\'o_ipcheck_lastip\'') or error('Unable to update board config', __FILE__, __LINE__, $db->error());
			if ($resetlimit == 0)
				$db->query('UPDATE '.$db->prefix.'config SET conf_value='.($pun_config['o_ipcheck_used']+1).' WHERE conf_name=\'o_ipcheck_used\'') or error('Unable to update board config', __FILE__, __LINE__, $db->error());
			else
				$db->query('UPDATE '.$db->prefix.'config SET conf_value=0 WHERE conf_name=\'o_ipcheck_used\'') or error('Unable to update board config', __FILE__, __LINE__, $db->error());
			$db->query('UPDATE '.$db->prefix.'config SET conf_value='.$pass.' WHERE conf_name=\'o_ipcheck_pass\'') or error('Unable to update board config', __FILE__, __LINE__, $db->error());
			$db->query('UPDATE '.$db->prefix.'config SET conf_value='.$timestamp.' WHERE conf_name=\'o_ipcheck_timestamp\'') or error('Unable to update board config', __FILE__, __LINE__, $db->error());
			
			// Regenerate the config cache
			if (!defined('FORUM_CACHE_FUNCTIONS_LOADED'))
				require PUN_ROOT.'include/cache.php';
			
			generate_config_cache();
			
			if ($pass = 0)
				message($lang_register['Spam IP Failed']);
		}
	}
}
//--------------End Spam IP Check----------------

#
#---------[ 7. OPEN ]---------------------------------------------------------
#

admin_options.php

#
#---------[ 8. FIND (line: 86) ]----------------------------------------------
#

		'maintenance'			=> $_POST['form']['maintenance'] != '1' ? '0' : '1',
		'maintenance_message'	=> pun_trim($_POST['form']['maintenance_message']),

#
#---------[ 9. AFTER, ADD ]---------------------------------------------------
#

		'ipcheck_enable'		=> $_POST['form']['ipcheck_enable'] != '1' ? '0' : '1',
		'ipcheck_limit'			=> intval($_POST['form']['ipcheck_limit']),
		'ipcheck_dnsbl'			=> pun_trim($_POST['form']['ipcheck_dnsbl']),
		'ipcheck_overlimit_reg'	=> $_POST['form']['ipcheck_overlimit_reg'] != '1' ? '0' : '1',

#
#---------[ 10. FIND (line: 193) ]--------------------------------------------
#

	if ($form['timeout_online'] >= $form['timeout_visit'])
		message($lang_admin_options['Timeout error message']);

#
#---------[ 11. AFTER, ADD ]--------------------------------------------------
#

	// If we don't have an DNSBL to check against we cannot use Spam IP Check
	if (empty($form['ipcheck_dnsbl']))
		$form['ipcheck_enable'] = '0';

#
#---------[ 12. FIND (line: 843) ]--------------------------------------------
#

									<th scope="row"><?php echo $lang_admin_options['Maintenance message label'] ?></th>
									<td>
										<textarea name="form[maintenance_message]" rows="5" cols="55"><?php echo pun_htmlspecialchars($pun_config['o_maintenance_message']) ?></textarea>
										<span><?php echo $lang_admin_options['Maintenance message help'] ?></span>
									</td>
								</tr>
							</table>
						</div>
					</fieldset>
				</div>

#
#---------[ 13. AFTER, ADD ]--------------------------------------------------
#

				<div class="inform">
					<fieldset>
						<legend><?php echo $lang_admin_options['ipcheck subhead'] ?></legend>
						<div class="infldset">
							<table class="aligntop" cellspacing="0">
								<tr>
									<th scope="row"><a name="ipcheck_enable"><?php echo $lang_admin_options['ipcheck enable label'] ?></a></th>
									<td>
										<input type="radio" name="form[ipcheck_enable]" value="1"<?php if ($pun_config['o_ipcheck_enable'] == '1') echo ' checked="checked"' ?> />&#160;<strong><?php echo $lang_admin_common['Yes'] ?></strong>&#160;&#160;&#160;<input type="radio" name="form[ipcheck_enable]" value="0"<?php if ($pun_config['o_ipcheck_enable'] == '0') echo ' checked="checked"' ?> />&#160;<strong><?php echo $lang_admin_common['No'] ?></strong>
										<span><?php echo $lang_admin_options['ipcheck enable help'] ?></span>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php echo $lang_admin_options['ipcheck limit label'] ?></th>
									<td>
										<input type="text" name="form[ipcheck_limit]" size="10" maxlength="10" value="<?php echo $pun_config['o_ipcheck_limit'] ?>" />
										<span><?php echo $lang_admin_options['ipcheck limit help'] ?></span>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php echo $lang_admin_options['ipcheck dnsbl label'] ?></th>
									<td>
										<textarea name="form[ipcheck_dnsbl]" rows="5" cols="55"><?php echo pun_htmlspecialchars($pun_config['o_ipcheck_dnsbl']) ?></textarea>
										<span><?php echo $lang_admin_options['ipcheck dnsbl help'] ?></span>
									</td>
								</tr>
								<tr>
									<th scope="row"><?php echo $lang_admin_options['ipcheck overlimit reg label'] ?></a></th>
									<td>
										<input type="radio" name="form[ipcheck_overlimit_reg]" value="1"<?php if ($pun_config['o_ipcheck_overlimit_reg'] == '1') echo ' checked="checked"' ?> />&#160;<strong><?php echo $lang_admin_common['Yes'] ?></strong>&#160;&#160;&#160;<input type="radio" name="form[ipcheck_overlimit_reg]" value="0"<?php if ($pun_config['o_ipcheck_overlimit_reg'] == '0') echo ' checked="checked"' ?> />&#160;<strong><?php echo $lang_admin_common['No'] ?></strong>
										<span><?php echo $lang_admin_options['ipcheck overlimit reg help'] ?></span>
									</td>
								</tr>
							</table>
						</div>
					</fieldset>
				</div>

#
#---------[ 14. OPEN ]--------------------------------------------------------
#

lang/English/register.php

#
#---------[ 15. FIND (line: 14) ]---------------------------------------------
#

'Register'					=>	'Register',

#
#---------[ 16. AFTER, ADD ]--------------------------------------------------
#

'Spam IP Failed'			=>	'Your IP is listed in one of our DNSBL checks!',
'Spam IP Overlimit'			=>	'Registrations are disabled today because we have reached our DNSBL IP lookup limit. Tomorrow the limit will be reset.',

#
#---------[ 17. OPEN ]--------------------------------------------------------
#

lang/English/admin_options.php

#
#---------[ 18. FIND (line: 225) ]--------------------------------------------
#

'Maintenance message label'			=>	'Maintenance message',
'Maintenance message help'			=>	'The message that will be displayed to users when the board is in maintenance mode. If left blank, a default message will be used. This text will not be parsed like regular posts and thus may contain HTML.',


#
#---------[ 19. AFTER, ADD ]--------------------------------------------------
#

// Spam IP Check Section
'ipcheck subhead'					=>	'Spam IP Check',
'ipcheck enable label'				=> 	'Check IP addresses',
'ipcheck enable help'				=>	'When enabled, guests IP addresses will have to pass DNSBL checks when registering.',
'ipcheck limit label'				=>	'Global Lookup Limit',
'ipcheck limit help'				=>	'The maximum number of IP lookups allowed per day. Each list online will likely have a daily limit for IP lookups so be sure to check out what they are. If using more than one then use the lowest value from your DNSBL limits.',
'ipcheck dnsbl label'				=>	'DNS Black Lists',
'ipcheck dnsbl help'				=>	'The URL for each IP to check against. Use a comma to seperate for multiple black lists.',
'ipcheck overlimit reg label'		=>	'Allow registrations past limit',
'ipcheck overlimit reg help'		=>	'If disabled, when you reach your global lookup limit above, no more registrations will be allowed.',

#
#---------[ 20. SAVE/UPLOAD ]-------------------------------------------------
#
