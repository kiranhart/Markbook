<?php require APPROOT . '/views/inc/header.php'; ?>

<br><br>
<div class="container">
    <div class="text-center">
        <h3>Account Settings</h3>
        <hr>
        <p>Country: <?php echo $data['log']['geoplugin_countryName'];?></p>
        <p>Country: <?php echo $data['log']['geoplugin_regionName'];?></p>
        <p>Country: <?php echo $data['log']['geoplugin_city'];?></p>
    </div>
</div>

<?php require APPROOT . '/views/inc/footer.php'; ?>
<script>
</script>
