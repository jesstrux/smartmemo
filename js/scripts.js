var switcher = document.querySelector("#user-dropdown");
// console.log(switcher);

if (switcher) {
    switcher.onclick = function () {
        switcher.querySelector('#dropdown').classList.remove('open');
    }

    var switcherTrigger = document.querySelector("#user-dropdown a");

    switcherTrigger.onclick = function (event) {
        var dropdown = switcherTrigger.parentElement;
        dropdown.querySelector('#dropdown').classList.add('open');
        event.stopPropagation();
    }
}

var dropdownTriggers = document.querySelectorAll("aside .dropdown a");

for (let i = 0; i < dropdownTriggers.length; i++) {
    const element = dropdownTriggers[i];

    element.onclick = function(){
        var dropdown = element.parentElement;
        dropdown.classList.toggle('open');
        dropdown.querySelector('.dropdown-menu').classList.toggle('open');
    }
}

function upTo(el, tagName) {
    tagName = tagName.toLowerCase();
    while (el && el.parentNode) {
        el = el.parentNode;
        if (el.tagName && el.tagName.toLowerCase() == tagName) {
            return el;
        }
    }
    // Many DOM methods return null if they don't
    // find the element they are searching for
    // It would be OK to omit the following and just
    // return undefined
    return null;
}

function saveMemo(){
    closeModal('createMemo');
    showToast("Memo successfully saved!", 'top-center');
}

function openModal(id){
    document.getElementById(id).classList.add('open');
}

function closeModal(id){
    document.getElementById(id).classList.remove('open');
}

function closeToast(msg){
    setTimeout(() => {
        document.body.removeChild(toast);
    }, 2000);
}

function oldShowToast(msg, pos){
    var position = pos || 'left-bottom';
    var toast = document.createElement('div');
    toast.classList.add('toast');
    toast.classList.add(position);
    toast.classList.add("fade-in");

    toast.innerText = msg;

    document.body.appendChild(toast);

    setTimeout(() => {
        toast.classList.remove("fade-in");
    }, 2000);
}

function ajax($path, data){
    var promise = new Promise(resolve, reject);
    var xhr = new XMLHttpRequest();
    // && file.size <= $id("MAX_FILE_SIZE").value
    // if (xhr.upload && file.type == "image/jpeg") {
    xhr.upload.addEventListener("progress", function (e) {
        var pc = parseInt(100 - (e.loaded / e.total * 100));
        el.setAttribute("progress", pc);
        console.log("Progress: " + (pc - 100));
        el.style.setProperty("--progress", (100 - pc) + "%");
    }, false);

    xhr.onreadystatechange = function (e) {
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

    var method = data ? "POST" : "GET";
    xhr.open(method, "upload.php", true);
    xhr.send(data);
}