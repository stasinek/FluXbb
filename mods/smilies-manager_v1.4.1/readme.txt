##
##
##        Mod title:  Smilies Manager
##
##      Mod version:  1.4
##  Works on FluxBB:  1.4
##     Release date:  2010-06-23
##            1.3.1:  2007-04-25
##              1.3:  2006-12-12
##              1.2:  2006-02-17
##              1.1:  2006-02-06
##              1.0:  2005-12-22
##      Review date:  2010-06-23\
##
##          Authors:  Mpok (mpok@fluxbb.fr) for 1.4
##                    Vincent Garnier (vin100@forx.fr) for previous versions
##     Contributors:  Fil1958
##
##      Description:  Manage smilies
##
##   Repository URL:  http://fluxbb.org/resources/mods/smilies-manager
##
##   Affected files:  include/parser.php
##
##       Affects DB:  Yes
##
##            Notes:  Manage the smilies easily. The smilies are stored in 
##                    the database but a cache file is generated. 
##
##       DISCLAIMER:  Please note that "mods" are not officially supported by
##                    FluxBB. Installation of this modification is done at
##                    your own risk. Backup your forum database and any and
##                    all applicable files before proceeding.
##
##

#
#---------[ 1. UPLOAD ]----------------------------------------------------
#---------[ 1. TELECHARGER LES FICHIERS ]----------------------------------
#

/files/install_mod.php			to	/your_forum_folder/

/files/include/cache_smilies.php	to	/your_forum_folder/include/

/files/plugins/AP_Smilies.php		to	/your_forum_folder/plugins/

/files/lang/English/smilies.php	to	/your_forum_folder/lang/English/

/files/lang/French/smilies.php		to	/your_forum_folder/lang/French/	(if you want french translation)

#
#---------[ 2. RUN ]-------------------------------------------------------
#---------[ 2. LANCER ]----------------------------------------------------
#

install_mod.php

#
#---------[ 3. DELETE ]----------------------------------------------------
#---------[ 3. SUPPRIMER ]-------------------------------------------------
#

install_mod.php

#
#---------[ 4. OPEN ]------------------------------------------------------
#---------[ 4. OUVRIR ]----------------------------------------------------
#

include/parser.php

#
#---------[ 5. FIND ]------------------------------------------------------
#---------[ 5. TROUVER ]---------------------------------------------------
#

// Here you can add additional smilies if you like (please note that you must escape single quote and backslash)
$smilies = array(
	':)' => 'smile.png',
	'=)' => 'smile.png',
	':|' => 'neutral.png',
	'=|' => 'neutral.png',
	':(' => 'sad.png',
	'=(' => 'sad.png',
	':D' => 'big_smile.png',
	'=D' => 'big_smile.png',
	':o' => 'yikes.png',
	':O' => 'yikes.png',
	';)' => 'wink.png',
	':/' => 'hmm.png',
	':P' => 'tongue.png',
	':p' => 'tongue.png',
	':lol:' => 'lol.png',
	':mad:' => 'mad.png',
	':rolleyes:' => 'roll.png',
	':cool:' => 'cool.png');

#
#---------[ 6. REPLACE WITH ]----------------------------------------------
#---------[ 6. REMPLACER PAR ]---------------------------------------------
#

// Load smilies cache
if (file_exists(FORUM_CACHE_DIR.'cache_smilies.php'))
	include FORUM_CACHE_DIR.'cache_smilies.php';
else
{
	require_once PUN_ROOT.'include/cache_smilies.php';
	generate_smiley_cache();
	require FORUM_CACHE_DIR.'cache_smilies.php';
}

#
#---------[ 7. SAVE/UPLOAD ]-----------------------------------------------
#---------[ 7. ENREGSITRER / ENVOYER SUR LE SERVEUR ]----------------------
#

include/parser.php

#
#---------[ 8. NOTES (English) ]-------------------------------------------
#

You must now go to the plugin "Smilies" to add / modify / delete your smilies.

1) To add a smiley, you MUST have previously uploaded an image in the "img/smilies" directory (or use an existing image). The plugin allows to upload images.

2) Maybe, to be abble to upload images you will need to CHMOD the "img/smilies" directory (add writing permission).

3) You can customize the upload limits (total size, width and height) by editing "AP_Smilies.php", look up the file.

4) By default, the size of smilies displayed is 15x15 pixels. If you want to use bigger smilies (without being deformed), you must:
- Open "include/parser.php"
- Find the line containing "img / smilies"
- Delete this part: ' width = "15" height = "15"'
- Do the same in "help.php"

#
#---------[ 8bis. NOTES (Français) ]--------------------------------------
#

Vous devez maintenant vous rendre sur le plugin "Smilies" pour ajouter/modifier/supprimer vos smilies.

1) Pour ajouter un smiley, il FAUT avoir AUPARAVANT uploadé une image dans le répertoire "img/smilies" (ou utiliser une image déjà existante). Le plugin permet l'upload des images.

2) Peut-être, afin de pouvoir uploader des images, vous devrez faire un CHMOD sur le répertoire "img/smilies" (ajouter les droits d'écriture).

3) Vous pouvez personnaliser les limites d'upload (taille, largeur et hauteur) en modifiant le fichier "AP_Smilies.php" ; regardez en haut du fichier.

4) Par défaut, la taille des smilies affichés est de 15x15 pixels. Si vous voulez utiliser des smilies plus grands (et qu'ils ne soient pas déformés), vous devez :
- ouvrir "include/parser.php"
- rechercher la ligne contenant "img/smilies"
- supprimer cette partie : ' width="15" height="15"'
- faire la même opération dans "help.php"

