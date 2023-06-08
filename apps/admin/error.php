<?php
        include("header.php");
?>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
<!-- Main Content -->
<div id="content">
    <?php
        include("small_header.php");
    ?>
    <!-- Begin Page Content -->
    <div class="container-fluid"> 
        <div class="text-center">
            <div class="error mx-auto" data-text="404">404</div>
            <p class="lead text-gray-800 mb-5" style="text-align: center !important;">Page Not Found</p>
            <p class="text-gray-500 mb-0" style="text-align: center !important;">It looks like you found a glitch in the matrix...</p>
            <a href="#">&larr; Back to Dashboard</a>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<script>
    $("#accordionSidebar").hide();
    $("#s-h").hide();
</script>
<?php
        include("footer.php");
?>    