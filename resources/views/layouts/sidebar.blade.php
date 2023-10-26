    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="" class="text-nowrap logo-img">
            <img src="../images/logos/logo.webp" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            @if(auth()->user()->is_Admin == '0')
            <li class="sidebar-item mt-4">
              <a class="sidebar-link" href="{{ route('admin.home') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('datapegawai') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-user"></i>
                </span>
                <span class="hide-menu">Data Pegawai</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('datakota') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-location"></i>
                </span>
                <span class="hide-menu">Data Kota</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('dataperdin') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-car"></i>
                </span>
                <span class="hide-menu">Data Perjalanan Dinas</span>
              </a>
            </li>
            @endif

            @if(auth()->user()->is_Admin == '1')
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('pegawai.home') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('pengajuan') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-car"></i>
                </span>
                <span class="hide-menu">Perjalanan Dinas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('history') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-server"></i>
                </span>
                <span class="hide-menu">History</span>
              </a>
            </li>
            @endif

            @if(auth()->user()->is_Admin == '2')
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('SDM.home') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('approval') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-car"></i>
                </span>
                <span class="hide-menu">Approval Perjalanan Dinas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('historySDM') }}" aria-expanded="false">
                <span>
                  <i class="ti ti-server"></i>
                </span>
                <span class="hide-menu">History</span>
              </a>
            </li>
            @endif

          </ul>
          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->