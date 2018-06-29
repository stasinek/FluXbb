<?php

/**
 * Chatwee is a feature-rich social chat platform that provides real-time chatting experience for communities on forums
 *
 * @package Chatwee Plugin for FluxBB
 * @version 1.1
 * @author Chatwee (www.chatwee.com)
 * @license http://opensource.org/licenses/mit-license.php MIT license
 */

if (!defined('PUN'))
{
	exit;
}

if (file_exists(PUN_ROOT.'lang/'.$admin_language.'/chatwee.php'))
{
	require PUN_ROOT.'lang/'.$admin_language.'/chatwee.php';
}
else
{
	require PUN_ROOT.'lang/English/chatwee.php';
}

define('PUN_PLUGIN_LOADED', 1);

function get_chatwee_settings()
{
	global $pun_config;

	$chatwee_settings = array(
		"chatwee_enable_chatwee" => isset($pun_config["chatwee_enable_chatwee"])? $pun_config["chatwee_enable_chatwee"] : 0,
		"chatwee_chatwee_script" => isset($pun_config["chatwee_chatwee_script"])? $pun_config["chatwee_chatwee_script"] : "",
		"chatwee_disable_offline_users" => isset($pun_config["chatwee_disable_offline_users"])? $pun_config["chatwee_disable_offline_users"] : 0,
		"chatwee_enable_sso" => isset($pun_config["chatwee_enable_sso"])? $pun_config["chatwee_enable_sso"] : 0,
		"chatwee_chat_id" => isset($pun_config["chatwee_chat_id"])? $pun_config["chatwee_chat_id"] : "",
		"chatwee_client_key" => isset($pun_config["chatwee_client_key"])? $pun_config["chatwee_client_key"] : ""
	);

	return $chatwee_settings;
}

function save_chatwee_settings()
{
	global $db;

	$chatwee_enable_chatwee = 0;
	$chatwee_script = "";
	$chatwee_disable_offline_users = 0;
	$chatwee_enable_sso = 0;
	$chatwee_chat_id = "";
	$chatwee_client_key = "";

	if(isset($_POST["enable_chatwee"]))
	{
		$chatwee_enable_chatwee = $_POST["enable_chatwee"] ? 1 : 0;
	}
	if(isset($_POST["chatwee_script"]))
	{
		$chatwee_script = $db->escape($_POST["chatwee_script"]);
	}
	if(isset($_POST["disable_offline_users"]))
	{
		$chatwee_disable_offline_users = $_POST["disable_offline_users"] ? 1 : 0;
	}
	if(isset($_POST["enable_sso"]))
	{
		$chatwee_enable_sso = $_POST["enable_sso"] ? 1 : 0;
	}
	if(isset($_POST["chat_id"]))
	{
		$chatwee_chat_id = $db->escape($_POST["chat_id"]);
	}
	if(isset($_POST["client_key"]))
	{
		$chatwee_client_key = $db->escape($_POST["client_key"]);
	}

	$insert_query = 'INSERT INTO '.$db->prefix.'config (conf_name, conf_value) VALUES ';
	$insert_query .= '("chatwee_enable_chatwee", "' . $chatwee_enable_chatwee . '"), ';
	$insert_query .= '("chatwee_chatwee_script", "' . $chatwee_script . '"), ';
	$insert_query .= '("chatwee_disable_offline_users", ' . $chatwee_disable_offline_users . '), ';
	$insert_query .= '("chatwee_enable_sso", ' . $chatwee_enable_sso . '), ';
	$insert_query .= '("chatwee_chat_id", "' . $chatwee_chat_id . '"), ';
	$insert_query .= '("chatwee_client_key", "' . $chatwee_client_key . '") ';
	$insert_query .= 'ON DUPLICATE KEY UPDATE ';
	$insert_query .= 'conf_value=VALUES(conf_value)';

	$db->query($insert_query) or error('Unable to save settings', __FILE__, __LINE__, $db->error());

	if(!defined('FORUM_CACHE_FUNCTIONS_LOADED'))
	{
		require PUN_ROOT.'include/cache.php';
	}

	generate_config_cache();

	redirect('admin_loader.php?plugin=AP_Chatwee.php', 'Settings saved');
	exit();
}

if(isset($_POST['save_chatwee_settings']))
{
	save_chatwee_settings();

	generate_admin_menu($plugin);

?>
	<div class="block">
		<h2><span><?php echo $lang_chatwee['Chatwee title']; ?></span></h2>
		<div class="box">
			<div class="inbox">
				<p><?php echo $lang_chatwee['Chatwee settings saved']; ?></p>
				<p><a href="javascript: history.go(-1)"><?php echo $lang_admin_common['Go back'] ?></a></p>
			</div>
		</div>
	</div>
<?php

}
else
{
	generate_admin_menu($plugin);

	$chatwee_settings = get_chatwee_settings();
?>
	<div class="plugin blockform">
		<h2><span><?php echo $lang_chatwee['Chatwee title']; ?></span></h2>
		<div class="box">
			<div class="inbox">
				<p><?php echo $lang_chatwee['Chatwee description']; ?></p>
			</div>
		</div>

		<br/>
		<h2 class="block2"><span><?php echo $lang_chatwee['Plugin settings']; ?></span></h2>
		<div class="box">
			<form id="chatwee" method="post" action="<?php echo pun_htmlspecialchars($_SERVER['REQUEST_URI']) ?>&amp;foo=bar">
				<div class="inform">
					<fieldset>
						<legend><?php echo $lang_chatwee['General settings']; ?></legend>
						<div class="infldset">
							<table class="aligntop" cellspacing="0">
								<tr>
									<th scope="row">
										<?php echo $lang_chatwee['Chatwee enable']; ?>
									</th>
									<td>
										<input type="checkbox" id="enable_chatwee" name="enable_chatwee" value="1"
											<?php if($chatwee_settings["chatwee_enable_chatwee"]) echo 'checked'; ?>
										/>
									</td>
								</tr>
								<tr>
									<th scope="row">
										<?php echo $lang_chatwee['Installation code']; ?>
									</th>
									<td>
										<textarea style="width:100%;" id="chatwee_script" name="chatwee_script"><?php
											echo $chatwee_settings["chatwee_chatwee_script"];
										?></textarea>
										<span><?php echo $lang_chatwee['Get installation code']; ?> <a href="https://chatwee.com/login-form/v2" target="_blank"><?php echo $lang_chatwee['Chatwee Dashboard']; ?></a>. <?php echo $lang_chatwee['No installation code']; ?> <a target="_blank" href="https://chatwee.com/register-form/v2"><?php echo $lang_chatwee['Sign up']; ?></a></span>
									</td>
								</tr>
								<tr>
									<th scope="row">
										<?php echo $lang_chatwee['Logged in only']; ?>
									</th>
									<td>
										<input type="checkbox" id="disable_offline_users" name="disable_offline_users" value="1"
											<?php if($chatwee_settings["chatwee_disable_offline_users"]) echo 'checked'; ?>
										/>
									</td>
								</tr>
							</table>
						</div>
					</fieldset>
					<fieldset>
						<legend><?php echo $lang_chatwee['SSO settings']; ?></legend>
						<div class="infldset">
							<table class="aligntop" cellspacing="0">
								<tr>
									<th>
										<?php echo $lang_chatwee['SSO enable']; ?>
									</th>
									<td>
										<input type="checkbox" id="enable_sso" name="enable_sso" value="1"
											<?php if($chatwee_settings["chatwee_enable_sso"]) echo 'checked'; ?>
										/>
									</td>
								</tr>
								<tr>
									<th>
										<?php echo $lang_chatwee['Chat ID']; ?>
									</th>
									<td>
										<input style="width:100%;" type="text" id="chat_id" name="chat_id" value="<?php echo $chatwee_settings["chatwee_chat_id"]; ?>"/>
									</td>
								</tr>
								<tr>
									<th>
										<?php echo $lang_chatwee['API key']; ?>
									</th>
									<td>
										<input style="width:100%;" type="text" id="client_key" name="client_key" value="<?php echo $chatwee_settings["chatwee_client_key"]; ?>"/>
									</td>
								</tr>
							</table>
						</div>
					</fieldset>
					<br>
					<input type="submit" name="save_chatwee_settings" value="Save settings" tabindex="2" />
				</div>
			</form>
		</div>
		<br/>
		<h2><?php echo $lang_chatwee['How to setup']; ?></h2>
		<ol>
			<li><a href="https://chatwee.com/login-form/v2" target="_blank"><?php echo $lang_chatwee['Sign in']; ?></a> <?php echo $lang_chatwee['To panel']; ?></li>
			<li><?php echo $lang_chatwee['Copy the code']; ?></li>
			<li><?php echo $lang_chatwee['Paste the code']; ?></li>
			<li><?php echo $lang_chatwee['Visit']; ?> <a target="_blank" href="https://chatwee.com/integration"><?php echo $lang_chatwee['Chatwee integration page']; ?></a> <?php echo $lang_chatwee['More instructions']; ?></li>
		</ol>
	</div>
<?php

}
