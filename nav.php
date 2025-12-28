<?php
if (!isset($pathparts)) {
    $script_name = isset($_SERVER['SCRIPT_NAME']) ? $_SERVER['SCRIPT_NAME'] : $_SERVER['PHP_SELF'];
    $pathparts = pathinfo($script_name);
}
?>
<nav>
    <!-- Home page -->
    <a class="<?php
    // Active page
    if ($pathparts['filename'] == "index") {
        print 'activePage';
    }

    // Left of active page
    if ($pathparts['filename'] == "smuggs") {
        print 'leftOfActive';
    }

    ?>" href="/SkiCam/index.php">Home</a>


    <!-- Smuggs -->
    <a class="<?php
    // Active page
    if ($pathparts['filename'] == "smuggs") {
        print 'activePage';
    }

    // Right of active page
    if ($pathparts['filename'] == "index") {
        print 'rightOfActive';
    }

    // Left of active page
    if ($pathparts['filename'] == "bolton") {
        print 'leftOfActive';
    }

    ?>" href="/SkiCam/resorts/smuggs.php">Smuggs</a>

    <!-- Bolton -->
    <a class="<?php
    // Active page
    if ($pathparts['filename'] == "bolton") {
        print 'activePage';
    }

    // Right of active page
    if ($pathparts['filename'] == "smuggs") {
        print 'rightOfActive';
    }

    // Left of active page
    if ($pathparts['filename'] == "stowe") {
        print 'leftOfActive';
    }

    ?>" href="/SkiCam/resorts/bolton.php">Bolton</a>

    <!-- Stowe -->
    <a class="<?php
    // Active page
    if ($pathparts['filename'] == "stowe") {
        print 'activePage';
    }

    // Right of active page
    if ($pathparts['filename'] == "bolton") {
        print 'rightOfActive';
    }

    // Left of active page
    if ($pathparts['filename'] == "bush") {
        print 'leftOfActive';
    }

    ?>" href="/SkiCam/resorts/stowe.php">Stowe</a>

    <!-- Bush -->
    <a class="<?php
    // Active page
    if ($pathparts['filename'] == "bush") {
        print 'activePage';
    }

    // Right of active page
    if ($pathparts['filename'] == "stowe") {
        print 'rightOfActive';
    }

    // Left of active page
    if ($pathparts['filename'] == "kmart") {
        print 'leftOfActive';
    }

    ?>" href="/SkiCam/resorts/bush.php">Bush</a>

    <!-- K-Mart -->
    <a class="<?php
    // Active page
    if ($pathparts['filename'] == "kmart") {
        print 'activePage';
    }

    // Right of active page
    if ($pathparts['filename'] == "bush") {
        print 'rightOfActive';
    }

    // Left of active page
    if ($pathparts['filename'] == "jay") {
        print 'leftOfActive';
    }

    ?>" href="/SkiCam/resorts/kmart.php">K-Mart</a>

    <!-- Jay -->
    <a class="<?php
    // Active page
    if ($pathparts['filename'] == "jay") {
        print 'activePage';
    }

    // Right of active page
    if ($pathparts['filename'] == "kmart") {
        print 'rightOfActive';
    }
    ?>" href="/SkiCam/resorts/jay.php">Jay</a>
</nav>