<style>


</style>
<nav class="main-menu">
        <?php if(auth()->user()->status_active == 'Admin'): ?>
        <ul>
            <li>
                <a href="<?php echo e(url('/home')); ?>">
                    <i class="fa fa-home nav_icon"></i>
                    <span class="nav-text">
                        <b>Home</b>
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(url('/chart_request')); ?>">
                    <i class="fa fa-bar-chart nav_icon"></i>
                    <span class="nav-text">
                        <b>Chart</b>
                    </span>
                </a>
            </li>
            
            <li>
                <a href="<?php echo e(url('/request_area')); ?>">
                    <i class="icon-table nav-icon nav_icon"></i>
                    <span class="nav-text">
                        <b>Dashboard</b>
                    </span>
                </a>
            </li>
            <li>
                
                <a onclick="openNewTab()">
                    <i class="fa fa-search nav-icon nav_icon"></i>
                    <span class="nav-text">
                    <b>Search Coverage Area</b>
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(url('/import_coverage')); ?>">
                    <i class="fa fa-plus nav-icon nav_icon"></i>
                    <span class="nav-text">
                    <b>Add Coverage by Excel</b>
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(url('/user')); ?>">
                    <i class="fa fa-list-ul"></i>
                    <span class="nav-text">
                    <b>User</b>
                    </span>
                </a>
            </li>
            <li class="has-subnav">
                <a href="javascript:;">
                <i class="fa fa-file-text-o nav_icon"></i>
                    <span class="nav-text">Log</span>
                <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
                </a>
                <ul>
                    <li>
                        <a class="subnav-text" href="<?php echo e(url('/log')); ?>">
                           Audit Log
                        </a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>

        <?php if(auth()->user()->status_active == 'Guest'): ?>
        <ul>
            <li>
                <a href="<?php echo e(url('/home')); ?>">
                    <i class="fa fa-home nav_icon"></i>
                    <span class="nav-text">
                        <b>Home</b>
                    </span>
                </a>
            </li>
            <li>
                <a href="<?php echo e(url('/chart_request')); ?>">
                    <i class="fa fa-bar-chart nav_icon"></i>
                    <span class="nav-text">
                        <b>Chart</b>
                    </span>
                </a>
            </li>
            
            <li>
                <a href="<?php echo e(url('/request_area')); ?>">
                    <i class="icon-table nav-icon nav_icon"></i>
                    <span class="nav-text">
                        <b>Dashboard</b>
                    </span>
                </a>
            </li>
            <li>
                
                <a onclick="openNewTab()">
                    <i class="fa fa-search nav-icon nav_icon"></i>
                    <span class="nav-text">
                    <b>Search Coverage Area</b>
                    </span>
                </a>
            </li>
        <?php endif; ?>


    <!--dimatikan kalau pakai SSO-->
    <ul class="logout">
        <li>
        <a href="<?php echo e(url('/logout')); ?>">
        <i class="icon-off nav-icon"></i>
        <span class="nav-text">
        Logout
        </span>
        </a>
        </li>
    </ul>
    <script>

        function openNewTab()
        {
            window.open('/coverage/coverage_area', '_blank');
        }
    </script>
    
</nav><?php /**PATH C:\xampp\htdocs\nap_coverage_area\resources\views/layout/includes/_navbar.blade.php ENDPATH**/ ?>