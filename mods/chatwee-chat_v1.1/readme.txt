##
##
##        Mod title:  Chatwee Mod
##
##      Mod version:  1.0
##  Works on FluxBB:  1.5
##     Release date:  2017-11-27
##           Author:  Chatwee (info@chatwee.com)
##
##      Description:  This mod in pair with Chatwee Plugin enables Chatwee chat
##                    on your site.
##                    Chatwee is a feature-rich social chat platform
##                    that provides real-time chatting experience
##                    for communities on forums.
##
##   Repository URL:  http://fluxbb.org/resources/mods/chatwee-chat
##
##   Affected files:  footer.php
##                    login.php
##                    profile.php
##                    include/common.php
##
##       Affects DB:  Yes
##
##            Notes:  The database changes are installed automatically by
##                    the script when it is first loaded.
##
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
AP_Chatwee.php to /plugins/
/chatwee/* to /include/chatwee/
files/lang/English/chatwee.php to /lang/English/chatwee.php


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

footer.php


#
#---------[ 5. FIND (lines: 127-130) ]---------------------------------------------
#

// Display debug info (if enabled/defined)
if (defined('PUN_DEBUG'))
{
	echo '<p id="debugtime">[ ';


#
#---------[ 6. BEFORE, ADD ]-------------------------------------------------
#

// CHATWEE MODIFICATION
echo chatwee_include_script();
// ********************

#
#---------[ 7. OPEN ]---------------------------------------------------------
#

include/common.php


#
#---------[ 8. FIND (lines: 54-55) ]---------------------------------------------
#

// Load UTF-8 functions
require PUN_ROOT.'include/utf8/utf8.php';


#
#---------[ 9. AFTER, ADD ]---------------------------------------------------
#

// CHATWEE MODIFICATION
require PUN_ROOT.'include/chatwee/chatwee.php';
// ********************

#
#---------[ 10. OPEN ]---------------------------------------------------------
#

login.php


#
#---------[ 11. FIND (lines: 94-95) ]---------------------------------------------
#

		// Reset tracked topics
		set_tracked_topics(null);

#
#---------[ 12. AFTER, ADD ]---------------------------------------------------
#

// CHATWEE MODIFICATION
chatwee_login($cur_user);
// ********************

#
#---------[ 13. FIND (lines: 105-111) ]---------------------------------------------
#

	if ($pun_user['is_guest'] || !isset($_GET['id']) || $_GET['id'] != $pun_user['id'])
	{
		header('Location: index.php');
		exit;
	}

#
#---------[ 14. AFTER, ADD ]---------------------------------------------------
#

// CHATWEE MODIFICATION
chatwee_logout();
// ********************
