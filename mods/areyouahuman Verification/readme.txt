##
##
##        Mod title:  Are You A Human Verification
##
##      Mod version:  1.1.1
##  Works on FluxBB:  1.5.3
##     Release date:  2013-03-30
##      Review date:  2013-03-30
##       Maintainer:  benjawi (benjawi@hotmail.com)
##           Author:  benjawi
##
##      Description:  This mod displays the Are You A Human verification to 
##                    your registration page to ensure that the person 
##                    signing up to your forum is in fact a human.
##
##
##   Repository URL:  http://fluxbb.org/resources/mods/ 
##
##   Affected files:  register
##                    lang/English/register.php
##
##       Affects DB:  No
##
##            Notes:  None.
##
##       DISCLAIMER:  Please note that "mods" are not officially supported by
##                    FluxBB. Installation of this modification is done at 
##                    your own risk. Backup your forum database and any and all
##                    applicable files before proceeding.
##
##


##  Before installing, go to http://areyouahuman.com/ to register. Select PHP as the platform. Make sure that your Game Style is embedded. Get your Publisher and Scoring Key.
You can now select FluxBB when registering which will automatically select your game style as embedded :)


#
#---------[ 1. UPLOAD ]-----------------------------------------------------
#

libs/ to /

#
#---------[ 2. OPEN ]-------------------------------------------------------
#

libs/ayah_config.php


#
#---------[ 3. FIND & REPLACE ]---------------------------------------------
#

Find YOUR_PUBLISHER_KEY and YOUR_SCORING_KEY - replace with your keys at which can be found at http://portal.areyouahuman.com/dashboard


#
#---------[ 4. OPEN ]-------------------------------------------------------
#

register.php

#
#---------[ 5. FIND ]-------------------------------------------------------
#

require PUN_ROOT.'include/common.php';

#
#---------[ 6. ADD BELOW ]--------------------------------------------------
#
require_once("libs/ayah.php");
$ayah = new AYAH();

#
#---------[ 7. FIND ]-------------------------------------------------------
#

$email_setting = intval($_POST['email_setting']);
if ($email_setting < 0 || $email_setting > 2)
	$email_setting = $pun_config['o_default_email_setting'];

#
#---------[ 8. ADD BELOW ]--------------------------------------------------
#
$score = $ayah->scoreResult();
if (!$score)
	$errors[] = $lang_register['Failed Are You Human Test'];

#
#---------[ 9. FIND ]-------------------------------------------------------
#

	<div class="rbox">
		<label><input type="radio" name="email_setting" value="0"<?php if ($email_setting == '0') echo ' checked="checked"' ?> /><?php echo $lang_prof_reg['Email setting 1'] ?><br /></label>
		<label><input type="radio" name="email_setting" value="1"<?php if ($email_setting == '1') echo ' checked="checked"' ?> /><?php echo $lang_prof_reg['Email setting 2'] ?><br /></label>
		<label><input type="radio" name="email_setting" value="2"<?php if ($email_setting == '2') echo ' checked="checked"' ?> /><?php echo $lang_prof_reg['Email setting 3'] ?><br /></label>
	</div>
</div>
</fieldset>
</div>

#
#---------[ 10. ADD BELOW ]-------------------------------------------------
#

<div class="inform">
	<fieldset>
		<legend><?php echo $lang_register['Are you a real person'] ?></legend>
		<div class="infldset">
			<?php
				echo $ayah->getPublisherHTML();
			?>
		</div>
	</fieldset>
</div>


#
#---------[ 11. SAVE ]----------------------------------------------------
#

register.php

#
#---------[ 12. OPEN ]----------------------------------------------------
#

lang/English/register.php

#
#---------[ 13. FIND ]------------------------------------------------------
#

'Email addresses do not match.',

#
#---------[ 14. ADD AFTER ]-------------------------------------------------
#

'Are you a real person'		=>	'Are you a real person?',
'Failed Are You Human Test'	=>	'You need to complete the Are You Human test',

#
#---------[ 15. SAVE/UPLOAD ]-----------------------------------------------
#

Save and upload files