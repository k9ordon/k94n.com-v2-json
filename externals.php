<?

class Externals {
	public function getLastfmTopArtists($count = 1, $random = false) {
		$apiUrl = "http://ws.audioscrobbler.com/2.0/user/mracidfreak/weeklyartistchart.xml";
		$xml = simplexml_load_file($apiUrl);
		$array = json_decode(json_encode($xml), TRUE);

		$artists = array_slice($array['artist'], 0, $count * 3);
		if($random) shuffle($artists);
		return array_slice($artists, 0, $count);
	}

	public function getJawboneYesterday() {
		$key = "0AkQg6lNBHx7mdDJQVGVyajNHdzBxcWFfMkxsR3p6aXc";
		$url = "http://spreadsheets.google.com/feeds/list/".$key."/od6/public/values?alt=json";

		$json = json_decode(file_get_contents($url), true);
		$rows = $json['feed']['entry'];
		$latest = $rows[(count($rows)-1)];

		return array(
			'steps' => number_format($latest['gsx$steps']['$t']),
			'km' => number_format(($latest['gsx$km']['$t'] / 1000), 1)
		);
	}
}

?>