<!DOCTYPE html>
<html lang="en">

<head>
 @include('template.header')
</head>

<body class="">
  <div class="wrapper">
      <!-- Sidebar -->
    @include('template.sidebar')
    <!-- End Sidebar -->
    <div class="main-panel">
      <!-- Navbar -->
      @include('template.navbar')
      <!-- End Navbar -->

       <!-- Content -->
       <div class="container-fluid">

         <!-- DataTales Example -->
         <div class="container">

          <!-- Outer Row -->
          <div class="row justify-content-center">
  
              <div class="col-xl-8 col-md-8">
  
                  <div class="card o-hidden border-0 shadow-lg my-5">
                      <div class="card-body p-0">
                          <!-- Nested Row within Card Body -->
                                  <div class="p-5">
                                      <div class="text-center">
                                          <h1 class="h4 text-gray-900 mb-4">{{ $title }}</h1>
                                      </div>
                                      <form action="{{(isset($pengguna))?route('pengguna.update', $pengguna->id):route('pengguna.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @if (isset($pengguna))
                                        @method('PUT')
                                        @endif
                                          <div class="form-group">
                                            <label class="block text-sm font-medium text-black">
                                              Nama
                                            </label>
                                              <input type="text" name="Nama" value="{{(isset($pengguna))?$pengguna->Nama:old('Nama')}}" class="@error('Nama') @enderror form-control form-control-user">
                                          </div>
                                          <div class="text-xs"> @error('Nama') {{$message}} @enderror</div>
                                          <div class="form-group">
                                            <label class="block text-sm font-medium text-black">
                                              Alamat
                                            </label>
                                              <input type="text" name="Alamat" value="{{(isset($pengguna))?$pengguna->Alamat:old('Alamat')}}" class="@error('Alamat') @enderror form-control form-control-user">
                                          </div>
                                          <div class="text-xs"> @error('Alamat') {{$message}} @enderror</div>
                                          <div class="form-group">
                                            <label class="block text-sm font-medium text-black">
                                              No Telepon
                                            </label>
                                            <input type="number" name="No_Telepon" value="{{(isset($pengguna))?$pengguna->No_Telepon:old('No_Telepon')}}" class="@error('No_Telepon') @enderror form-control form-control-user">
                                        </div>
                                        <div class="text-xs"> @error('No_Telepon') {{$message}} @enderror</div>
                                        <div class="form-group">
                                          <label class="block text-sm font-medium text-black">
                                            Email
                                          </label>
                                          <input type="email" name="Email" value="{{(isset($pengguna))?$pengguna->Email:old('Email')}}" class="@error('Email') @enderror form-control form-control-user">
                                      </div>
                                      <div class="text-xs"> @error('Email') {{$message}} @enderror</div>
                                      <div class="form-group">
                                        <label class="block text-sm font-medium text-black">
                                          Password
                                        </label>
                                        <input type="password" name="Password" value="{{(isset($pengguna))?$pengguna->Password:old('Password')}}" class="@error('Password') @enderror form-control form-control-user">
                                    </div>
                                    <div class="text-xs"> @error('Password') {{$message}} @enderror</div>
                                          <br>
                                          <button type="submit" class="btn btn-primary btn-user btn-block">
                                              Simpan
                                          </button>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
  
              </div>
  
          </div>
      <!-- End Content -->
      <footer class="footer">
        @include('template.footer')
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{asset('template/assets/js/core/jquery.min.js')}}"></script>
  <script src="{{asset('template/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('template/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('template/assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <!--  Google Maps Plugin    -->
  <!-- Place this tag in your head or just before your close body tag. -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{asset('template/assets/js/plugins/chartjs.min.js')}}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{asset('template/assets/js/plugins/bootstrap-notify.js')}}"></script>
  <!-- Control Center for Black Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('template/assets/js/black-dashboard.min.js?v=1.0.0')}}"></script><!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{asset('template/assets/demo/demo.js')}}"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');
        $navbar = $('.navbar');
        $main_panel = $('.main-panel');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');
        sidebar_mini_active = true;
        white_color = false;

        window_width = $(window).width();

        fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();



        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .background-color span').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data', new_color);
          }

          if ($main_panel.length != 0) {
            $main_panel.attr('data', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data', new_color);
          }
        });

        $('.switch-sidebar-mini input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            sidebar_mini_active = false;
            blackDashboard.showSidebarMessage('Sidebar mini deactivated...');
          } else {
            $('body').addClass('sidebar-mini');
            sidebar_mini_active = true;
            blackDashboard.showSidebarMessage('Sidebar mini activated...');
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);
        });

        $('.switch-change-color input').on("switchChange.bootstrapSwitch", function() {
          var $btn = $(this);

          if (white_color == true) {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').removeClass('white-content');
            }, 900);
            white_color = false;
          } else {

            $('body').addClass('change-background');
            setTimeout(function() {
              $('body').removeClass('change-background');
              $('body').addClass('white-content');
            }, 900);

            white_color = true;
          }


        });

        $('.light-badge').click(function() {
          $('body').addClass('white-content');
        });

        $('.dark-badge').click(function() {
          $('body').removeClass('white-content');
        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();

    });
  </script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-free"
      });
  </script>
</body>

</html>