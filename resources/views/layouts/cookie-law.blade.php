<div id="cookie-law" class="notification is-warning is-light" style="z-index: 999; position: fixed; top: 10px; left: 30%; display:none;">
    <button class="delete"></button>
    Our site uses cookies. Learn more at: <a href="{{route('privacy-policy')}}">{{route('privacy-policy')}}</a>
</div>

<script>
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return null;
    }

    if (!getCookie('seen-cookie-law')) {
        var cookieBox = document.getElementById('cookie-law');
        cookieBox.style.display = 'block';
    }

    document.addEventListener('DOMContentLoaded', () => {
        (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
            $notification = $delete.parentNode;
            $delete.addEventListener('click', () => {
                setCookie('seen-cookie-law', true, 365);
                $notification.parentNode.removeChild($notification);
            });
        });
    });
</script>