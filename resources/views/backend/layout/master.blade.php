<!DOCTYPE html>
<html
  lang="en"
  data-layout="vertical"
  data-sidebar="light"
  data-sidebar-size="lg"
  data-sidebar-image="none"
  data-topbar="light"
  data-layout-style="default"
  data-layout-mode="light"
  data-layout-width="fluid"
  data-layout-position="fixed"
>
  <head>
    <meta charset="utf-8" />
    <title>Dashboard | Velzon - Admin &amp; Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta
      content="Premium Multipurpose Admin &amp; Dashboard Template"
      name="description"
    />
    <meta content="Themesbrand" name="author" />
    {{-- header link --}}
    @include('backend.includes.header-link')
    <!-- App favicon -->
  </head>

  <body>
    <!-- Begin page -->
    <div id="layout-wrapper">

     @include('backend.includes.header')
     @include('backend.includes.sideber')
      <!-- Vertical Overlay-->
      <div class="vertical-overlay"></div>

      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">
        @yield('content')
        <!-- End Page-content -->

        @include('backend.includes.footer')
      </div>
      <!-- end main content-->
    </div>
    <!-- END layout-wrapper -->

    <!--start back-to-top-->
    <button
      onclick="topFunction()"
      class="btn btn-danger btn-icon"
      id="back-to-top"
    >
      <i class="ri-arrow-up-line"></i>
    </button>
    <!--end back-to-top-->



{{-- javascript --}}
@include('backend.includes.footer-link')

</body>
</html>
