<?php
    session_start();
    session_destroy(); // Destroy all session data
    echo "<script>
            alert('You have successfully logged out.');
            window.location.href = 'login_staff.html';
        </script>";
?>