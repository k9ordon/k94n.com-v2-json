<?

	// bootstrap

	// libs
	include "externals.php";

	// bootstrap apis
	$externals = new Externals();

	$artists = $externals->getLastfmTopArtists(1);
	$jawbone = $externals->getJawboneYesterday();

	// render
	include "view.php";