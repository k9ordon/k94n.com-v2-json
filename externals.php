<?

class Externals {
	public function getLastfmTopArtists($count = 1) {
		$apiUrl = "http://ws.audioscrobbler.com/2.0/user/mracidfreak/weeklyartistchart.xml";
		$xml = simplexml_load_file($apiUrl);
		$array = json_decode(json_encode($xml), TRUE);

		$artists = $array['artist'];
		return array_slice($artists, 0, $count);
	}
}

?>