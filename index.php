<?
include("template/header.php");
include("template/nav.php");
?>
<article >
<!-- Camera Output -->
	<video hidden id="myVideo" autoplay></video>
	<div>
      <canvas hidden id="cInput" width="400" height="400"/>
      </div>
      <div class="vloc">
      <canvas style="float:left" id="cOutput" width="400" height="400"/>
    </div>	
 	<!--<h2>Output</h2>-->
 	<!--<p id="info">Please allow access to your camera!</p>-->
  	<div id="snap"  height="240" width="320"></div>
<!-- /Camera Output -->
	<span class="controls">
		<div class="takepic TouchTooltip Shadow Round Bottom Dark">
		    <div class="Content">
		        Take a Picture
		    </div>
		</div>
		<div class="takepic TouchTooltip Shadow Round Bottom Dark">
		    <div class="Content">
		        Delete Picture
		    </div>
		</div>
		<dl class="cambtts">
			<dt id="convertjpegbtn">Snap</dt>
			<dt id="resetbtn" >Delete</dt>
		</dl>
	</span>
	 <div id="backgroundimageselection">
         <p>Background image selection</p>
    <ul>
        <li><input type="radio" id="bg1" name="background" value="images/background1.jpg" onclick="loadBackgroundVideo();" /><label for="bg1">Train station</label></li>
        <li><input type="radio" id="bg2" name="background" value="images/background2.jpg" onclick="loadBackgroundVideo();" /><label for="bg2">Road junction</label></li>
        <li><input type="radio" id="bg3" name="background" value="images/background3.jpg" onclick="loadBackgroundVideo();" /><label for="bg3">Building site</label></li>
        <li><input type="radio" id="bg4" name="background" value="images/background4.jpg" onclick="loadBackgroundVideo();" /><label for="bg3">Drawing train station</label></li>
        
    </ul>
    </div>
</article>
<script>
// Get the canvas screenshot as PNG
var oCanvas = document.getElementById("cOutput");
var oCtx = oCanvas.getContext("2d");
var iWidth = oCanvas.width;
var iHeight = oCanvas.height;

var strDataURI = oCanvas.toDataURL("image/jpeg");  
var oImgJPEG = Canvas2Image.saveAsJPEG(oCanvas, true);
function convertCanvas(strType) {
		if (strType == "PNG")
			var oImg = Canvas2Image.saveAsPNG(oCanvas, true);
		if (strType == "BMP")
			var oImg = Canvas2Image.saveAsBMP(oCanvas, true);
		if (strType == "JPEG")
			var oImg = Canvas2Image.saveAsJPEG(oCanvas, true);

		if (!oImg) {
			alert("Sorry, this browser is not capable of saving " + strType + " files!");
			return false;
		}

		oImg.id = "canvasimage";

		oImg.style.border = oCanvas.style.border;
		oCanvas.parentNode.replaceChild(oImg, oCanvas);

		showDownloadText();
	}	

document.getElementById("convertjpegbtn").onclick = function() {
		convertCanvas("JPEG");
}

document.getElementById("resetbtn").onclick = function() {
	var oImg = document.getElementById("canvasimage");
	oImg.parentNode.replaceChild(oCanvas, oImg);
}
</script>
<?
include("template/footer.php");
?>