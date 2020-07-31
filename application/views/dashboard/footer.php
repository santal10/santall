<footer class="page-footer">
    <div class="font-13">2018 © <b>Adminca</b> - Save your time, choose the best</div>
    <div>
        <a class="px-3 pl-4" href="http://themeforest.net/item/adminca-responsive-bootstrap-4-3-angular-4-admin-dashboard-template/20912589" target="_blank">Purchase</a>
        <a class="px-3" href="http://admincast.com/adminca/documentation.html" target="_blank">Docs</a>
    </div>
    <div class="to-top"><i class="fa fa-angle-double-up"></i></div>
</footer>
</div>
</div>
<!-- START SEARCH PANEL-->
<form class="search-top-bar" action="http://admincast.com/adminca/preview/admin_1/html/search.html">
    <input class="form-control search-input" type="text" placeholder="Search...">
    <button class="reset input-search-icon"><i class="ti-search"></i></button>
    <button class="reset input-search-close" type="button"><i class="ti-close"></i></button>
</form>
<!-- END SEARCH PANEL-->
<!-- BEGIN THEME CONFIG PANEL-->
<div class="theme-config">
    <div class="theme-config-toggle"><i class="ti-settings theme-config-show"></i><i class="ti-close theme-config-close"></i></div>
    <div class="theme-config-box">
        <h5 class="text-center mb-4 mt-3">SETTINGS</h5>
        <div class="font-strong mb-3">LAYOUT OPTIONS</div>
        <div class="check-list mb-4">
            <label class="checkbox checkbox-grey checkbox-primary">
                <input id="_fixedNavbar" type="checkbox" checked>
                <span class="input-span"></span>Fixed navbar</label>
            <label class="checkbox checkbox-grey checkbox-primary mt-3">
                <input id="_fixedlayout" type="checkbox">
                <span class="input-span"></span>Fixed layout</label>
            <label class="checkbox checkbox-grey checkbox-primary mt-3">
                <input class="js-sidebar-toggler" type="checkbox">
                <span class="input-span"></span>Collapse sidebar</label>
            <label class="checkbox checkbox-grey checkbox-primary mt-3">
                <input id="_drawerSidebar" type="checkbox">
                <span class="input-span"></span>Drawer sidebar</label>
        </div>
        <div class="font-strong mb-3">LAYOUT STYLE</div>
        <div class="check-list mb-4">
            <label class="radio radio-grey radio-primary">
                <input type="radio" name="layout-style" value="" checked="">
                <span class="input-span"></span>Fluid</label>
            <label class="radio radio-grey radio-primary mt-3">
                <input type="radio" name="layout-style" value="1">
                <span class="input-span"></span>Boxed</label>
        </div>
    </div>
</div>
<!-- END THEME CONFIG PANEL-->
<!-- BEGIN PAGA BACKDROPS-->
<div class="sidenav-backdrop backdrop"></div>
<div class="preloader-backdrop">
    <div class="page-preloader">Loading</div>
</div>
<!-- END PAGA BACKDROPS-->
<!-- New question dialog-->
<div class="modal fade" id="session-dialog">
    <div class="modal-dialog" style="width:400px;" role="document">
        <div class="modal-content timeout-modal">
            <div class="modal-body">
                <button class="close" data-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mt-3 mb-4"><i class="ti-lock timeout-icon"></i></div>
                <div class="text-center h4 mb-3">Set Auto Logout</div>
                <p class="text-center mb-4">You are about to be signed out due to inactivity.<br>Select after how many minutes of inactivity you log out of the system.</p>
                <div id="timeout-reset-box" style="display:none;">
                    <div class="form-group text-center">
                        <button class="btn btn-danger btn-fix btn-air" id="timeout-reset">Deactivate</button>
                    </div>
                </div>
                <div id="timeout-activate-box">
                    <form id="timeout-form" action="javascript:;">
                        <div class="form-group pl-3 pr-3 mb-4">
                            <input class="form-control form-control-line" type="text" name="timeout_count" placeholder="Minutes" id="timeout-count">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary btn-fix btn-air" id="timeout-activate">Activate</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End New question dialog-->

<!-- CORE PLUGINS-->


<script>
    $(function() {
        $('#products-table').DataTable({
            pageLength: 10,
            fixedHeader: true,
            responsive: true,
            "sDom": 'rtip',
        });
        var table = $('#products-table').DataTable();
        $('#key-search').on('keyup', function() {
            table.search(this.value).draw();
        });
        $('#type-filter').on('change', function() {
            table.column(2).search($(this).val()).draw();
        });
    });
</script>
<script>
    $(function() {
        $('#orders-table').DataTable({
            pageLength: 10,
            fixedHeader: true,
            responsive: true,
            "sDom": 'rtip',
            columnDefs: [{
                targets: 'no-sort',
                orderable: false
            }]
        });

        var table = $('#orders-table').DataTable();
        $('#key-search').on('keyup', function() {
            table.search(this.value).draw();
        });
        $('#type-filter').on('change', function() {
            table.column(4).search($(this).val()).draw();
        });
    });
</script>
<script>
    $(function() {
        $('#customers-table').DataTable({
            pageLength: 10,
            fixedHeader: true,
            responsive: true,
            "sDom": 'rtip',
            columnDefs: [{
                targets: 'no-sort',
                orderable: false
            }]
        });

        var table = $('#customers-table').DataTable();
        $('#key-search').on('keyup', function() {
            table.search(this.value).draw();
        });
        $('#type-filter').on('change', function() {
            table.column(2).search($(this).val()).draw();
        });
    });
</script>
<script>
     $("#userfile").change((e)=>{
        $("#principalImage").attr("src",URL.createObjectURL(e.target.files[0]))
        for(var i =1;i<e.target.files.length;i++)
            $(".aa").append("<div class='file-input-plus file-input'><img src='"+URL.createObjectURL(e.target.files[i])+"' /></div>")
    })
 
</script>
<script>

</script>

</body>


<!-- Mirrored from admincast.com/adminca/preview/admin_1/html/dashboard_ecommerce.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 May 2020 18:59:38 GMT -->

</html>