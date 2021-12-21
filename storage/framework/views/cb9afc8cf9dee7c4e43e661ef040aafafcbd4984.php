<style>


</style>
<nav class="main-menu">
        
        <ul>
            <li>
                <a href="<?php echo e(url('/home')); ?>">
                    <i class="fa fa-home nav_icon"></i>
                    <span class="nav-text">
                        <b>Home</b>
                    </span>
                </a>
            </li>
            
            <li class="has-subnav">
                <a href="javascript:;">
                <i class="fa fa-file-text-o nav_icon"></i>
                    <span class="nav-text">Chart</span>
                <i class="icon-angle-right"></i><i class="icon-angle-down"></i>
                </a>
                <ul>
                    <li>
                        <a class="subnav-text" href="<?php echo e(url('/chart_request')); ?>">
                            Summary Inquiry
                        </a>
                    </li>
                    <li>
                        <a class="subnav-text" href="<?php echo e(url('/chart_request_2')); ?>">
                            Top 5 Inquiry
                        </a>
                    </li>
                    
                </ul>
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
        

    <!--dimatikan kalau pakai SSO-->
    
    <script>

        function openNewTab()
        {
            window.open('/coverage_area', '_blank');
        }
    </script>
    
</nav><?php /**PATH C:\xampp\htdocs\search_coverage\resources\views/layout/includes/_navbar.blade.php ENDPATH**/ ?>