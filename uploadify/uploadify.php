<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder = '/uploads'; // Relative to the root

if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		echo '1';
	} else {
		echo 'Invalid file type.';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
����<title>My Uploadify Implementation</title>
����<link rel="stylesheet" type="text/css" href="uploadify.css">
����<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
����<script type="text/javascript" src="jquery.uploadify-3.1.min.js"></script>
����<script type="text/javascript">
����$(function() {
��������$('#file_upload').uploadify({
������������'swf'������: 'uploadify.swf',
������������'uploader' : 'uploadify.php'
������������// Your options here
��������});
����});
����</script>
</head>
<body>
<input type="file" name="file_upload" id="file_upload" />
</body>
</html>