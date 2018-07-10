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