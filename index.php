<?

	// bootstrap

	// libs
	include "externals.php";

	// bootstrap apis
	$externals = new Externals(array_key_exists('noCache', $_GET) ? true : false);

	$artists = $externals->getLastfmTopArtists(1, true);
	$jawbone = $externals->getJawboneYesterday();

	// render
	include "view.php";