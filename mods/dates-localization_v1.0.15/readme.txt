********************************************************************
              F L U X B B     M O D I F I C A T I O N
********************************************************************
##
##
##        Mod title:  Dates Localization (DATLOC)
##
##      Mod version:  1.0.15
##     Release date:  2016-06-17
##  Works on FluxBB:  1.4.6, 1.4.7, 1.4.8, 1.5.0, 1.5.1, 1.5.2, 1.5.3
##                    1.5.4, 1.5.5, 1.5.6, 1.5.7, 1.5.8, 1.5.9, 1.5.10
##
##           Author:  Otomatic
##
##      Description:  Display dates according to the chosen location (France, UK, Germany, Italy, etc..). With choice of display format, perhaps with the names of the months and days. The default view is selected in Administration Options. Each user can select the desired display format in Profile
##
##   Affected files:   include/common.php, include/functions.php, admin_options.php (must be writable)
##
##       Affects DB:  No
##
##       DISCLAIMER:  Please note that "mods" are not officially supported by
##                    FluxBB. Installation of this modification is done at
##                    your own risk. Backup your forum database and any and
##                    all applicable files before proceeding.
##       NOTE : The changes are described for the original files,
##              without any further modification.
##
## Why "setlocale" takes place just prior to need it and not once for all into the config.php file?
## The locale information is maintained per process, not per thread. If you are running PHP on a multithreaded server API like IIS or Apache on Windows, you may experience sudden changes in locale settings while a script is running, though the script itself never called setlocale(). This happens due to other scripts running in different threads of the same process at the same time, changing the process-wide locale using setlocale().
##----
## Pourquoi utiliser "setlocale" juste avant d'en avoir besoin et pas une fois pour toutes dans le fichier config.php ?
## L'information locale est maintenue par processus, non par thread. Si vous faites fonctionner PHP sur un serveur multi-threadé comme IIS ou Apache sur Windows, vous pourriez obtenir des changements soudains des configurations locales pendant qu'un script fonctionne, même si celui-ci n'appelle jamais la fonction setlocale(). Ceci survient à cause des autres scripts qui fonctionnent dans des threads différents du même processus. Ces scripts changent les configurations locales dans le processus au complet en utilisant la fonction setlocale().
##
##****** IMPORTANT ******
##** REQUIRED: You must first install the plugin "Modification Installer" (Mod Installer version 1.0.6 at least)
##** OBLIGATOIRE : Vous devez d'abord installer le plugin "Modification Installer" (Mod Installer version 1.0.6 au moins)


*************************** INSTALLATION *********************************
**** REQUIRED:     FIRST INSTALL Mod Installer plugin (1.0.3 or newer)
**** OBLIGATOIRE : INSTALLER D'ABORD le plugin Mod Installer (1.0.3 ou plus récent)
**************************************************************************
#---------[ 1. UPLOAD THE CONTENT OF ]--------------------------------
#---------[ 1. ENVOYER LE CONTENU DE ]--------------------------------
#

/files/		to		/your_forum_folder/

 Examples : your_forum_folder\plugins\datloc\mod_config.php
            your_forum_folder\plugins\datloc\search_insert.php
            your_forum_folder\plugins\datloc\update_install.php
            your_forum_folder\plugins\datloc\lang\English\mod_admin.php
#
#---------[ 2. VISIT... ]----------------------------------------------
#---------[ 2. SE RENDRE À... ]----------------------------------------
#

Go to the plugin administration page and launch Mod Installer
Rendez vous à la page d'administration des plugins et lancer Mod Installer

#
#--------[ 3. END ]----------------------------------------------------
#--------[ 3. FIN ]----------------------------------------------------
#