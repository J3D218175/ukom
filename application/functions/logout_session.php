    <!--logout session custom-->
    <script>
        var t;
        var multiplier = 60000;
        var time = 15; //in minute;
        window.onload = resetTimer();
        // DOM Events
        document.onmousemove = resetTimer();
        document.onkeypress = resetTimer();
        console.log('loaded');

        function logout() {
                alert("Silahkan login kembali")
                location.href = '<?=$adminurl;?>index.php?p=logout'
            }

            function resetTimer() {
                
                clearTimeout(t);
                t = setTimeout(logout, (multiplier * time));
                
            }
    </script>