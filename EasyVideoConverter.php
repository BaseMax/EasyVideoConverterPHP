<?php
/*
 * PHP Script: EasyVideoConverter
 * 2021 May 09
 * GPL3 License
 */

// function endsWith($input, $needle) {
// 	$length = strlen($needle);
// 	if(!$length) {
// 		return true;
// 	}
// 	return substr($input, -$length ) === $needle;
// }

$files = glob("*");
foreach($files as $file) {
	// if($file === "." || $file === "..") {
	// 	continue;
	// }

	// skip dir
	if(is_dir($file)) {
		continue;
	}

	$dots = explode('.', $file);
	$ends = end($dots);
	if($ends === "php" || $ends === "txt") {
		continue;
	}

	array_pop($dots);
	$newFile = implode('.', $dots);
	$newFile = $newFile . ".mp4";

	$command = "ffmpeg -i $file -vcodec libx264 -crf 32 $newFile";
	// print $command;
	exec($command);
}
