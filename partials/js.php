<script src="js/jquery.min.js"></script>
<script src="js/scripts.js"></script>

<script>
    function showToast(msg, type, pos){
        var position = pos || 'top-center';
        var toast = document.createElement('div');
        toast.classList.add('toast');

        if(type){
            var icon = document.createElement('i');
            icon.classList.add('zmdi');
            toast.appendChild(icon);
            if(type === "success"){
                icon.classList.add('zmdi-check');
                toast.classList.add('success');
            }
            else if(type === "error"){
                icon.classList.add('zmdi-close');
                toast.classList.add('error');
            }
        }

        var html = toast.innerHTML;
        toast.innerHTML = html + msg;

        document.body.appendChild(toast);

        toast.classList.add(position);
        toast.classList.add("fade-in");

        setTimeout(() => {
            toast.classList.remove("fade-in");
            setTimeout(() => {
                document.body.removeChild(toast);
            }, 400);
        }, 3000);
    }

    <?php 
        if (Notify::has_success()) {
            echo "showToast('" . Notify::get_success() . "', 'success')";
        } else if (Notify::has_error()) {
            echo "showToast('" . Notify::get_error() . "', 'error')";
        }
        Notify::restore();
    ?>
</script>