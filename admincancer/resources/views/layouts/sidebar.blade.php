  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset("/bower_components/AdminLTE/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name}}</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="/"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
        <li><a href="{{ url('employee-management') }}"><i class="	fa fa-male"></i> <span>Perawat Dan Staff</span></a></li>
        <li><a href="{{ url('pemeriksaans') }}"><i class="fa fa-stethoscope"></i> <span>Pemeriksaan</span></a></li>
       
        <li><a href="{{ url('prediksis') }}"><i class="fa fa-calculator"></i> <span>Perhitungan Prediksi</span></a></li>
        <li><a href="{{ url('category') }}"><i class="	fa fa-heartbeat"></i> <span>Kategori</span></a></li>
        <li><a href="{{ url('#') }}"><i class="fa fa-file-text"></i> <span>Artikel</span></a></li>
        <li><a href="{{ url('artikel') }}"><i class="fa fa-line-chart"></i> <span>Statistik</span></a></li>
        <li><a href="{{ url('#') }}"><i class="fa fa-calendar-check-o"></i> <span>Jadwal Pasien</span></a></li>
       
       
        <li class="treeview">
          <a href="#"><i class="fas fa-procedures"></i> <span>Data List</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('pasiens') }}">Data Pasien</a></li>
            <li><a href="{{ url('dokters') }}">Data Dokter</a></li>
            <li><a href="{{ url('#') }}">Data Staff</a></li>
         
          </ul>
        </li>



      <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>System Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ url('system-management/department') }}">Department</a></li>
            <li><a href="{{ url('system-management/division') }}">Division</a></li>
            <li><a href="{{ url('system-management/country') }}">Country</a></li>
            <li><a href="{{ url('system-management/state') }}">State</a></li>
            <li><a href="{{ url('system-management/city') }}">City</a></li>
            <li><a href="{{ url('system-management/report') }}">Report</a></li>
          </ul>
        </li>
        <li><a href="{{ route('user-management.index') }}"><i class="fa fa-link"></i> <span>User management</span></a></li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>