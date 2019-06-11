<nav class="navbar navbar-expand-md bg-danger navbar-dark">
    <div class="container">
        <a href="<?php echo (isLoggedIn()) ? URLROOT . '/users/home' : URLROOT; ?>" class="navbar-brand">
            <img src="<?php echo URLROOT . '/images/favicon.png'; ?>" width="30" height="30" class="d-inline-block align-top mr-1">
            Speed Grader - Admin
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
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
                        <a href="<?php echo URLROOT . '/users/account'; ?>" class="dropdown-item disabled">Account</a>
                            <?php if (userAccountType() == 10) : ?>
                                <a href="<?php echo URLROOT . '/users/home'; ?>" class="dropdown-item">Home</a>
                                <a href="<?php echo URLROOT . '/admins'; ?>" class="dropdown-item">Admin</a>
                            <?php endif; ?>
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo URLROOT . '/users/logout'; ?>" class="dropdown-item">Logout</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>