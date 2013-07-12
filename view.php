<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Hello! My name is Klemens Gordon - k94n.com</title>
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style><?=file_get_contents('assets/built/css/app.css')?></style>

    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>

<body>
	<div class="wrap">
		<h1>Hello! <span>My name is <a href="http://twitter.com/thisisgordon">Klemens Gordon</a>.</span></h1>
		<h2>I am a webdeveloper with love for interfaces.</h2>
		<h3>I currently code at <a href="http://dev.karriere.at">karriere.at</a>.</h3>
		<h3>I enjoy listening to <a href="http://last.fm/user/mracidfreak"><?=$artists[0]['name']?></a>.</h3>
		<h3>I moved <?=$jawbone['steps']?> steps yesterday.</h3>

		<div id="footprint">
			<p>I push code to <a href="http://github.com/k9ordon">github</a>, talk on <a href="http://twitter.com/thisisgordon">twitter</a> and bookmark at <a href="http://delicious.com/k9ordon">delicious</a>.</p>
			<p>Need code? Ninja is ready <a href="">hello@k94n.com</a>.</p>
		</div>
	</div>

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-42261707-2', 'k94n.com');
	  ga('send', 'pageview');
	</script>
</body>
</html>