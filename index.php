<?php
include 'functions/route.php';
include 'functions/brain.php';
include 'inc/header.php';
if (!isset($_SESSION['user'])) {
    echo '<script>window.location.href="login.php"</script>';
}
?>
<div class="main-content">
    <?php
    if (isset($_GET['page'])) {
        include 'inc/main.php';
    }
    ?>

</div>

<?php include 'inc/footer.php'; ?>