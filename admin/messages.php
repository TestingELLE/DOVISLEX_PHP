<?php if (isset($_SESSION['message'])) : ?>
    <div class="message" >
        <p style="background-color: yellowgreen; width: fit-content; padding: 5px;">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </p>
    </div>
    <?php
 endif ?>