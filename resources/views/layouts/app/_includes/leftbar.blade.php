<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">

        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <?php
            echo \App\Plugins\MenuPlugin::menu();
            // echo Cache::remember('sys_menu', 5, function () {
            //     return \App\Plugins\MenuPlugin::menu();
            // });

            ?>

            <div class="clearfix"></div>
        </div>
        <!-- Sidebar -->
        <div class="clearfix"></div>

    </div>

</div>
<!-- Left Sidebar End -->
