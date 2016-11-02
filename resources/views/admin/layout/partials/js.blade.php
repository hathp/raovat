<!-- BEGIN CORE PLUGINS -->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('assets/admin/js/admin-core-plugins.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->

<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('assets/admin/js/admin-page-plugins.js') }}" type="text/javascript"></script>
@yield('js-page-plugin')
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('assets/admin/js/admin-theme-global.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('assets/admin/js/admin-page-scripts.js') }}"></script>
<script src="{{ asset('assets/admin/plugins/global/counterup/jquery.waypoints.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/admin/plugins/global/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
@yield('js-page-script')
<!-- END PAGE LEVEL SCRIPTS -->

<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="{{ asset('assets/admin/js/admin-theme-layout.js') }}" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
