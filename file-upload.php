<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<title>HTML5 File Drag &amp; Drop API</title>

<style>
	/*
Styles for HTML5 File Drag & Drop demonstration
Featured on SitePoint.com
Developed by Craig Buckler (@craigbuckler) of OptimalWorks.net
*/
body
{
	font-family: "Segoe UI", Tahoma, Helvetica, freesans, sans-serif;
	font-size: 90%;
	margin: 10px;
	color: #333;
	background-color: #fff;
}

h1, h2
{
	font-size: 1.5em;
	font-weight: normal;
}

h2
{
	font-size: 1.3em;
}

legend
{
	font-weight: bold;
	color: #333;
}

#filedrag
{
	display: none;
	font-weight: bold;
	text-align: center;
	padding: 1em 0;
	margin: 1em 0;
	color: #555;
	border: 2px dashed #555;
	border-radius: 7px;
	cursor: default;
}

#filedrag.hover
{
	color: #f00;
	border-color: #f00;
	border-style: solid;
	box-shadow: inset 0 3px 4px #888;
}

img
{
	max-width: 100%;
}

pre
{
	width: 95%;
	height: 8em;
	font-family: monospace;
	font-size: 0.9em;
	padding: 1px 2px;
	margin: 0 0 1em auto;
	border: 1px inset #666;
	background-color: #eee;
	overflow: auto;
}

#messages
{
	padding: 0 10px;
	margin: 1em 0;
	border: 1px solid #999;
}

#progress p
{
	display: block;
	width: 240px;
	padding: 2px 5px;
	margin: 2px 0;
	border: 1px inset #446;
	border-radius: 5px;
	background: #eee url("progress.png") 100% 0 repeat-y;
}

#progress p.success
{
	background: #0c0 none 0 0 no-repeat;
}

#progress p.failed
{
	background: #c00 none 0 0 no-repeat;
}
</style>

</head>
<body>

<h1>HTML5 File Drag &amp; Drop API</h1>

<p>This is a demonstration of the HTML5 file drag &amp; drop API with asynchronous Ajax file uploads, graphical progress bars and progressive enhancement.</p>

<p>For more information, please refer to:</p>
<ul>
<li><a href="http://www.sitepoint.com/html5-file-drag-and-drop/">How to Use HTML5 File Drag &amp Drop</a></li>
<li><a href="http://www.sitepoint.com/html5-javascript-open-dropped-files">How to Open Dropped Files Using HTML5 and JavaScript</a></li>
<li><a href="http://www.sitepoint.com/html5-ajax-file-upload">How to Asynchronously Upload Files Using HTML5 and Ajax</a></li>
<li><a href="http://www.sitepoint.com/html5-javascript-file-upload-progress-bar">How to Create File Upload Progress Bars in HTML5 and JavaScript</a></li>
</ul>


<form id="upload" action="upload.php" method="POST" enctype="multipart/form-data">

<fieldset>
<legend>HTML File Upload</legend>

<input type="hidden" id="MAX_FILE_SIZE" name="MAX_FILE_SIZE" value="300000" />

<div>
	<label for="fileselect">Files to upload:</label>
	<input type="file" id="fileselect" name="fileselect[]" multiple="multiple" />
	<div id="filedrag">or drop files here</div>
</div>

<div id="submitbutton">
	<button type="submit">Upload Files</button>
</div>

</fieldset>

</form>

<div id="progress"></div>

<div id="messages">
<p>Status Messages</p>
</div>


<h2>Disclaimer</h2>
<p>The code was developed by <a href="http://twitter.com/craigbuckler">Craig Buckler</a> of <a href="http://optimalworks.net/">OptimalWorks.net</a> for <a href="http://sitepoint.com/">SitePoint.com</a>.</p>

<p>This code can be <a href="http://blogs.sitepointstatic.com/examples/tech/filedrag/3/filedrag3.zip">downloaded and used</a> without any restrictions but please don't expect support! A link back to SitePoint.com is appreciated.</p>

<script src="js/filedrag.js"></script>
</body>
</html>