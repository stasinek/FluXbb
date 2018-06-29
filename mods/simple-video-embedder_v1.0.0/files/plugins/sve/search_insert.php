<?php

$files_to_add = array('include/parser.php');
$files_to_replace = array('include/parser.php');

/* String to be searched and string to be added after */
$search_add_file['include/parser'] = array(
	"// Make sure no one attempts to run this script \"directly\"\nif (!defined('PUN'))\n\texit;",
);
$insert_add_file['include/parser'] = array(
	"\n\n// Simple Video Embedder Mod\nrequire_once PUN_ROOT.'include/sve_parser.php';",
);

/* String to be searched and string to be replaced */
$search_replace_file['include/parser'] = array(
	"\tif (\$link == '' || \$link == \$url)",
);
$insert_replace_file['include/parser'] = array(
	"\t// Simple Video Embedder Mod - Check for video links & generate embed code\n\t\tif (preg_match('%youtube.com%i', \$url, \$matches) || preg_match('%youtu.be%i', \$url, \$matches))\n\t\t\treturn CreateYoutubeEmbedCode(\$url);\n\t\telse if (preg_match('%dailymotion.com%i', \$url, \$matches) || preg_match('%dai.ly%i', \$url, \$matches))\n\t\t\treturn CreateDailyMotionEmbedCode(\$url);\n\t\telse if (preg_match('~(?:http|https|)(?::\/\/|)(?:www.|)(?:vimeo.com(?:\/channels\/|\/groups\/|\/videos\/|album\/|\S*[^\w\-\s]))(\d+)[a-z0-9;:@#?&%=+\/\\$_.-]*~i', \$url, \$matches))\n\t\t\treturn CreateVimeoEmbedCode(\$url);\n\t\telse if (\$link == '' || \$link == \$url)",
);

?>
