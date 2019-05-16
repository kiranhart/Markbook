<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Markbook</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="<?php echo URLROOT . '/pages/about'; ?>">About</a>
        <a class="p-2 text-dark" href="<?php echo URLROOT . '/pages/features'; ?>">Features</a>
        <a class="p-2 text-dark" href="<?php echo URLROOT . '/pages/contact'; ?>">Contact</a>
    </nav>
    <?php if (isset($_SESSION['user_id'])) : ?>
        <a class="btn btn-outline-primary" href="<?php echo URLROOT . '/users/logout'; ?>">Logout</a>
    <?php else : ?>
        <a class="btn btn-outline-primary" href="<?php echo URLROOT . '/users/login'; ?>">Login</a>
    <?php endif; ?>
</div>