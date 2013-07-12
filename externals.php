<?

class Externals {

	private $cache = array();
	private $noCache = false;

	public function __construct($noCache = false) {
		$this->noCache = (bool) $noCache;
		$this->cache = json_decode(file_get_contents('cache.json'), true);
	}

	public function cachedApiFile($apiUrl, $cacheTime = 43200) {
		$cacheKey = base64_encode($apiUrl);
		if($this->noCache != false 
			&& array_key_exists($cacheKey, $this->cache) 
			&& ($this->cache[$cacheKey]['time'] - (time() - $cacheTime)) > 0) {
			return base64_decode($this->cache[$cacheKey]['data']);
		}
		$data = file_get_contents($apiUrl);
		$this->cache[$cacheKey] = array(
			'time' => time(),
			'data' => base64_encode($data)
		);
		file_put_contents('cache.json', json_encode($this->cache));
		return $data;
	}

	public function getLastfmTopArtists($count = 1, $randomCount = false) {
		$apiUrl = "http://ws.audioscrobbler.com/2.0/user/mracidfreak/weeklyartistchart.xml";
		$xml = simplexml_load_string($this->cachedApiFile($apiUrl));
		$array = json_decode(json_encode($xml), TRUE);

		$artists = $array['artist'];
		if($randomCount > 0) {
			$artists = array_slice($artists, 0, $randomCount);
			shuffle($artists);
		}
		return array_slice($artists, 0, $count);
	}

	public function getJawboneYesterday() {
		$key = "0AkQg6lNBHx7mdDJQVGVyajNHdzBxcWFfMkxsR3p6aXc";
		$apiUrl = "http://spreadsheets.google.com/feeds/list/".$key."/od6/public/values?alt=json";

		$json = json_decode($this->cachedApiFile($apiUrl), true);
		$rows = $json['feed']['entry'];
		$latest = $rows[(count($rows)-1)];

		return array(
			'steps' => number_format($latest['gsx$steps']['$t']),
			'km' => number_format(($latest['gsx$km']['$t'] / 1000), 1)
		);
	}
}

?>