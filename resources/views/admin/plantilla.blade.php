
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    @include ("admin.htmls.head")
    @yield("estilos")
</head>

<body>
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
       @include("admin.htmls.aside")
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
           @include("admin.htmls.header")
        </header>
        <!-- /#header -->
        <!-- Content -->
        <div class="content">
            @yield("contenido")
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            @include("admin.htmls.footer")
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->
    @include("admin.htmls.script")

    <!--Local Stuff-->
    @yield("scripts")
</body>
</html>
