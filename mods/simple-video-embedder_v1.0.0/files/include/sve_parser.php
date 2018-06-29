<?php

/**
 * Copyright (C) 2008-2012 FluxBB
 * based on code by Rickard Andersson copyright (C) 2002-2008 PunBB
 * License: http://www.gnu.org/licenses/gpl.html GPL version 2 or higher
 *
 *
 * Mod Name: Simple Video Embedder
 * Mod Author: ThePanda <linuxpanda@outlook.com>
 * Mod License: Unlicense (http://unlicense.org)
 */

// Make sure no one attempts to run this script "directly"
if (!defined('PUN'))
	exit;

// Automatically parse youtube video/playlist links and generate the respective embed code
function CreateYoutubeEmbedCode($url)
{
	$width = 480;
	$height = 270;

	// Check if youtube link is a playlist
	if (strpos($url, 'list=') !== false) {
		// Generate the embed code
		$url = preg_replace('~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{12,})[a-z0-9;:@#?&%=+\/\$_.-]*~i', '<iframe style="border:0;" width="' . $width . '" height="' . $height . '" src="https://www.youtube.com/embed/$1" allowfullscreen></iframe>', $url);
		return $url;
	}

	// Check if youtube link is not a playlist but a video [with time identifier]
	if (strpos($url, 'list=') === false && strpos($url, 't=') !== false) {
		$time_in_secs = null;

		// Get the time in seconds from the time function
		$time_in_secs = ConvertTimeToSeconds($url);

		// Generate the embed code
		$url = preg_replace('~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{11})[a-z0-9;:@#?&%=+\/\$_.-]*~i', '<iframe style="border:0;" width="' . $width . '" height="' . $height . '" src="https://www.youtube.com/embed/$1?start=' . $time_in_secs . '" allowfullscreen></iframe>', $url);
		return $url;
	}

	// If the above conditions were false then the youtube link is probably just a plain video link. So generate the embed code already.
	$url = preg_replace('~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{11})[a-z0-9;:@#?&%=+\/\$_.-]*~i', '<iframe style="border:0;" width="' . $width . '" height="' . $height . '" src="https://www.youtube.com/embed/$1" allowfullscreen></iframe>', $url);
	return $url;
}

// Automatically parse vimeo links and generate the respective embed code
function CreateVimeoEmbedCode($url)
{
	$width = 480;
	$height = 270;
	
	// Generate the embed code
	$url = preg_replace('~(?:http|https|)(?::\/\/|)(?:www.|)(?:vimeo.com(?:\/channels\/|\/groups\/|\/videos\/|album\/|\S*[^\w\-\s]))(\d+)[a-z0-9;:@#?&%=+\/\$_.-]*~i', '<iframe src="//player.vimeo.com/video/$1" width="' . $width . '" height="' . $height . '" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>', $url);
	return $url;
}

// Automatically parse dailymotion links and generate the respective embed code
function CreateDailyMotionEmbedCode($url)
{
	$width = 480;
	$height = 270;
	
	// Generate the embed code
	$url = preg_replace('~(?:http|https|)(?::\/\/|)(?:www.|)(?:dai\.ly\/|dailymotion\.com(?:\/video\/|\/hub\/|\S*[^\w\-\s]))([\w\-]{6,7})[a-z0-9;:@#?&%=+\/\$_.-]*~i', '<iframe frameborder="0" width="' . $width . '" height="' . $height . '" src="//www.dailymotion.com/embed/video/$1" allowfullscreen></iframe>', $url);
	return $url;
}

// Check for time identifier in the youtube video link and conver it into seconds
function ConvertTimeToSeconds($url)
{
	$time = null;
	$hours = null;
	$minutes = null;
	$seconds = null;

	$pattern_time_split = "([0-9]{1-2}+[^hms])";

	// Regex to check for youtube video link with time identifier
	$youtube_time = '~(?:http|https|)(?::\/\/|)(?:www.|)(?:youtu\.be\/|youtube\.com(?:\/embed\/|\/v\/|\/watch\?v=|\/ytscreeningroom\?v=|\/feeds\/api\/videos\/|\/user\S*[^\w\-\s]|\S*[^\w\-\s]))([\w\-]{11})[a-z0-9;:@#?&%=+\/\$_.-]*(t=((\d+h)?(\d+m)?(\d+s)?))~i';

	// Check for time identifier in the youtube video link, extract it and convert it to seconds
	if (preg_match($youtube_time, $url, $matches)) {
		// Check for hours
		if (isset($matches[4])) {
			$hours = $matches[4];
			$hours = preg_split($pattern_time_split, $hours);
			$hours = substr($hours[0], 0, -1);
		}

		// Check for minutes
		if (isset($matches[5])) {
			$minutes = $matches[5];
			$minutes = preg_split($pattern_time_split, $minutes);
			$minutes = substr($minutes[0], 0, -1);
		}

		// Check for seconds
		if (isset($matches[6])) {
			$seconds = $matches[6];
			$seconds = preg_split($pattern_time_split, $seconds);
			$seconds = substr($seconds[0], 0, -1);
		}

		// Convert time to seconds
		$time = (($hours*3600) + ($minutes*60) + $seconds);
	}
	
	return $time;
}
