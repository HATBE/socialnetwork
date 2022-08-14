<?php
/*
    Agrs:
    - noparts // if the footer is not used
    - scripts // scripts that will be loaded under main.js
*/
?>
    <?php if(!isset($noparts)):?>
    <footer>
        footer
    </footer>
    <?php endif;?>

    <!-- JS Ajax/Jquery --><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- JS Fontawesome --><script src="https://kit.fontawesome.com/2ea3e8bf3d.js" crossorigin="anonymous"></script>
    <!-- JS Bootstrap --><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="/assets/js/main.js"></script>
    <?php
        if(isset($scripts)) {
            foreach($scripts as $script) {
                echo '<script src="' . $script . '"></script>';
            }
        }
    ?>

    </body>
</html>