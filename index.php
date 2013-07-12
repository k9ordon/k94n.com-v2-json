<?

	// bootstrap

	// libs
	include "externals.php";

	// bootstrap apis
	$externals = new Externals(array_key_exists('noCache', $_GET) ? true : false);

	$artists = $externals->getLastfmTopArtists(1, 5);
	$jawbone = $externals->getJawboneYesterday();

	// render
	ob_start();
	include "view.php";
	$markup = ob_get_contents();
	ob_end_clean();

	// minify output
	print preg_replace('#(?ix)(?>[^\S ]\s*|\s{2,})(?=(?:(?:[^<]++|<(?!/?(?:textarea|pre)\b))*+)(?:<(?>textarea|pre)\b|\z))#', ' ', $markup);
