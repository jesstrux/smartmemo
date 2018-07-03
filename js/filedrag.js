(function() {
	// file drag hover
	function FileDragHover(e) {
		e.stopPropagation();
		e.preventDefault();
		if(e.type == "dragover")
			e.target.classList.add("hover");
		else
			e.target.classList.remove("hover");
	}

	var fileWorker = new Worker('js/process_file_worker.js');
	// file selection
	function FileSelectHandler(e) {
		// cancel event and hover styling
		FileDragHover(e);

		// fetch FileList object
		var files = e.target.files || e.dataTransfer.files;

		// process all File objects
		for (var i = 0, f; f = files[i]; i++) {
			console.log(f.type);
			var type;
			var name = f.name.replace(/ /g, "_");
			
			if (f.type.indexOf("image") != -1)
				type = "image";
			else if (f.type.indexOf("application") != -1)
				type = name.split(".").pop();
			else{
				showToast(`File format for <em>${name}</em> is not supported.`);
				continue;
			}

			addToAttachments(f,
				`<div class="attachment loading ${type}">
					<button type="button" class="attachment-remover" onclick="removeAttachment(event, '${name}')">
						<b class="zmdi zmdi-close"></b>
					</button>
					<i class="zmdi"></i>
					<span class="trim-text">${name}</span>
				</div>`
			);
		}
	}

	function addToAttachments(f, attachment_tpl) {
		var attachments = $id("attachments");
		var template = document.createElement('template');
        template.innerHTML = attachment_tpl.trim();
        var attachment = template.content.firstChild;
        attachments.appendChild(attachment);

        UploadFile(f, attachment);
	}

	// upload JPEG files
	function UploadFile(file, el) {
		var xhr = new XMLHttpRequest();
		 // && file.size <= $id("MAX_FILE_SIZE").value
		// if (xhr.upload && file.type == "image/jpeg") {
			xhr.upload.addEventListener("progress", function(e) {
				var pc = parseInt(100 - (e.loaded / e.total * 100));
				el.setAttribute("progress", pc);
				console.log("Progress: " + (pc - 100));
				el.style.setProperty("--progress", (100 - pc) + "%");
			}, false);

			xhr.onreadystatechange = function(e) {
				// console.log("Ready state changed to: " + xhr.readyState);
				if (xhr.readyState == 4) {
					console.log(xhr.responseText);
					// progress.className = (xhr.status == 200 ? "success" : "failure");
					el.classList.remove("loading");
					var attachments_value = $id("savedAttachments").value;
					var savedAttachments = attachments_value.length ? attachments_value.split(",") : [];
					savedAttachments.push(file.name.replace(/ /g, "_"));
					$id("savedAttachments").value = savedAttachments.join(",");
				}
			};

			// start upload
			xhr.open("POST", "upload.php", true);
			xhr.setRequestHeader("X-FILENAME", file.name.replace(/ /g, "_"));
			xhr.send(file);
		// }
	}


	// initialize
	function Init() {
		var fileselect = $id("pickAttachments"),
			filedrag = $id("dropAttachments");

		// file select
		fileselect.addEventListener("change", FileSelectHandler, false);

		// is XHR2 available?
		var xhr = new XMLHttpRequest();
		if (xhr.upload) {

			// file drop
			filedrag.addEventListener("dragover", FileDragHover, false);
			filedrag.addEventListener("dragleave", FileDragHover, false);
			filedrag.addEventListener("drop", FileSelectHandler, false);
			// filedrag.style.display = "block";
		}

	}

	// call initialization file
	if (window.File && window.FileList && window.FileReader) {
		Init();
	}
})();