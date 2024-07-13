<nav class="header-nav ms-auto">
    <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
                <i class="bi bi-search"></i>
            </a>
        </li><!-- End Search Icon-->

        <!-- End Messages Nav -->

        <?php if(auth()->user()->role_id == 6 || auth()->user()->role_id == 1): ?>
            <li class="nav-item"><a class="btn-primary btn-sm" href="<?php echo e(route('sale.pos')); ?>"><i
                        class="dripicons-shopping-bag"></i><span>
                        POS</span></a></li>
        <?php endif; ?>
        <li class="nav-item dropdown pe-3">

            <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                
                <span class="d-none d-md-block dropdown-toggle ps-2">Menu</span>
            </a><!-- End Profile Iamge Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                <li class="dropdown-header">
                    <h6>
                        <?php if(Auth::check()): ?>
                            <?php echo e(Auth::user()->name); ?>

                        <?php endif; ?>
                    </h6>
                    
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('my.profile')); ?>">
                        <i class="bi bi-person"></i>
                        <span>My Profile</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="<?php echo e(route('settings')); ?>">
                        <i class="bi bi-gear"></i>
                        <span>Account Settings</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" href="#">
                        <i class="bi bi-question-circle"></i>
                        <span>Need Help?</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>

                <li>
                    <a class="dropdown-item d-flex align-items-center" style="cursor:pointer"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Sign Out</span>
                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none"
                            style="display: none">
                            <?php echo csrf_field(); ?>
                        </form>
                    </a>
                </li>

            </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

    </ul>
</nav>
<?php /**PATH /home/1216098.cloudwaysapps.com/gemcvyvqcd/public_html/resources/views/layouts/nav.blade.php ENDPATH**/ ?>