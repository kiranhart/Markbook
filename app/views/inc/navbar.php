<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a href="<?php echo (isLoggedIn()) ? URLROOT . '/users/home' : URLROOT; ?>" class="navbar-brand">
            <img src="<?php echo URLROOT . '/images/favicon.png'; ?>" width="30" height="30" class="d-inline-block align-top">
            <!-- Markbook -->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <?php if (isset($_SESSION['user_id'])) : ?>
                    <li class="nav-item active">
                        <a href="<?php echo URLROOT . '/classes/list'; ?>" class="nav-link">Classes</a>
                    </li>
                    <li class="nav-item active">
                        <a href="<?php echo URLROOT . '/students/list'; ?>" class="nav-link">Students</a>
                    </li>
                    <li class="nav-item active">
                        <a href="<?php echo URLROOT . '/assignments/list'; ?>" class="nav-link">Assignments</a>
                    </li>
                    <li class="nav-item dropdown active">
                        <a href="" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['user_data']->prefix . ". " . $_SESSION['user_data']->lastname; ?>
                        </a>
                        <div class="dropdown-menu" aria=labelledby="navbarDropdown">
                            <a href="<?php echo URLROOT . '/users/account'; ?>" class="dropdown-item">Account</a>
                            <div class="dropdown-divider"></div>
                            <a href="<?php echo URLROOT . '/users/logout'; ?>" class="dropdown-item">Logout</a>
                        </div>
                    </li>
                <?php else : ?>
                    <li class="nav-item active">
                        <a href="<?php echo URLROOT . '/pages/about'; ?>" class="nav-link">About</a>
                    </li>
                    <li class="nav-item active">
                        <a href="<?php echo URLROOT . '/pages/features'; ?>" class="nav-link">Features</a>
                    </li>
                    <li class="nav-item active">
                        <a href="<?php echo URLROOT . '/users/login'; ?>" class="nav-link btn btn-success px-3">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>