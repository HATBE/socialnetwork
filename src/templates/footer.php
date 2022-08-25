<?php
/*
    Agrs:
    - noparts // if the footer is not used
    - scripts // scripts that will be loaded under main.js and ajax
*/
?>
    <?php if(!isset($noparts)):?>
    <footer class="bg-dark">
        <div class="container p-4">
            <!--Grid row-->
            <div class="row">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
                <h5><?= META_PAGE_TITLE;?></h5>
                <p>
                    <!-- Nothing -->
                </p>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5>XXX</h5>
                <ul class="list-unstyled mb-0">
                <li>
                    <a href="/xx" class="underline text-white">xx</a>
                </li>
                <li>
                    <a href="/xx" class="underline text-white">xx</a>
                </li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                <h5 class="mb-0">Links</h5>
                <ul class="list-unstyled">
                <li>
                    <a href="/imprint" class="underline text-white">Impressum</a>
                </li>
                <li>
                    <a href="/imprint" class="underline text-white">Datenschutz</a>
                </li>
                <li>
                    <a href="/copyright" class="underline text-white">Copyright</a>
                </li>
                </ul>
            </div>
            </div>
        </div>
        <div class="text-center b-dark p-3">
            &copy; <?= '2022 - ' . date('Y');?> Copyright:
            <a class="text-white" href="https://hatbe.ch/">HATBE</a>
        </div>
    </footer>
    <?php endif;?>

    <!-- JS Ajax/Jquery --><script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- JS Fontawesome --><script src="https://kit.fontawesome.com/2ea3e8bf3d.js" crossorigin="anonymous"></script>
    <!-- JS Bootstrap --><script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <!-- JS Local --><script src="/assets/js/main.js"></script>
    <?php
        if(isset($scripts)) {
            foreach($scripts as $script) {
                echo '<!-- JS Local --><script src="' . $script . '"></script>';
            }
        }
    ?>

    </body>
</html>