
</section>
<footer>
	<script>
	  var onFailSoHard = function(e) {
	    console.log('Reeeejected!', e);
	  };
		window.URL = window.URL || window.webkitURL;
		navigator.getUserMedia  = navigator.getUserMedia || navigator.webkitGetUserMedia ||
	                          navigator.mozGetUserMedia || navigator.msGetUserMedia;
	  // Not showing vendor prefixes.
	  navigator.getUserMedia({video: true, audio: true}, function(localMediaStream) {
	    var video = document.querySelector('video');
	    video.src = window.URL.createObjectURL(localMediaStream);

	    // Note: onloadedmetadata doesn't fire in Chrome when using it with getUserMedia.
	    // See crbug.com/110938.
	    video.onloadedmetadata = function(e) {
	      // Ready to go. Do some stuff.
	    };
	  }, onFailSoHard);
	</script>
</footer>
</body>
</html>