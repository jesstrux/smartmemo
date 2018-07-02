onmessage = function(e) {
	var file = e.data;
	var reader = new FileReader();
	reader.onload = function(e) {
		postMessage({file: file, src: e.target.result});
	}
	reader.readAsDataURL(file);
}