<!-- Sidebar -->
<div class="sidebar sidebar-style-2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                {{-- <div class="avatar-sm float-left mr-2">
                    <img src="{{asset('atlantis-lite-master\back/img/profile.jpg')}}" alt="atlantis-lite-master." class="avatar-img rounded-circle">
                </div> --}}
                <div class="info avatar">
                    <a data-toggle="collapse" href="#" aria-expanded="true">
                        <span>
                            <a href="#">
                                Ghifari Thufail
                                <span class="user-level">Admin</span>
                            </a>
                        </span>
                    </a>
                </div>
            </div>
            <ul  class="nav nav-primary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section"> Home</h4>
                </li>
                <li class="nav-item">
                    <a href="/dashboard" class="collapsed" aria-expanded="false">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">User</h4>
                </li>

                <li class="nav-item">
                    <a href="/user" class="collapsed" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Reservation</h4>
                </li>

                <li class="nav-item">
                    <a href="{{ route('reservations.arrival') }}" class="collapsed" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        <p>Arrival</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reservations') }}" class="collapsed" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        <p>Data</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reservations.report') }}" class="collapsed" aria-expanded="false">
                        <i class="fa fa-user"></i>
                        <p>Report</p>
                    </a>
                </li>
                {{-- <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Data</h4>
                </li>
                <li class="nav-item">
                    <a href="/koordinator-kecamatan" class="collapsed" aria-expanded="false">
                        <i class="fas fa-building"></i>
                        <p>Koordinator Kecamatan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/koordinator-desa" class="collapsed" aria-expanded="false">
                        <i class="fa fa-university"></i>
                        <p>Koordinator Desa</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/relawan" class="collapsed" aria-expanded="false">
                        <i class="fa fa-users"></i>
                        <p>Balad Husein</p>
                    </a>
                </li><li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Berita</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#sidebarLayouts">
                        <i class="fas fa-th-list"></i>
                        <p>Berita</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="sidebarLayouts">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/artikel">
                                    <span class="sub-item">Artikel</span>
                                </a>
                            </li>
                            <li>
                                <a href="/galeri">
                                    <span class="sub-item">Galeri</span>
                                </a>
                            </li>
                            <li>
                                <a href="/aspirasi-data">
                                    <span class="sub-item">Aspirasi</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Report</h4>
                </li>
                <li class="nav-item">
                    <a data-toggle="collapse" href="#base">
                        <i class="far fa-chart-bar"></i>
                        <p>Data</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse" id="base">
                        <ul class="nav nav-collapse">
                            <li>
                                <a href="/report-kecamatan">
                                    <span class="sub-item">Kecamatan</span>
                                </a>
                            </li>
                            <li>
                                <a href="/report-desa">
                                    <span class="sub-item">Desa</span>
                                </a>
                            </li>
                            <li>
                                <a href="/report-kelurahan">
                                    <span class="sub-item">TPS</span>
                                </a>
                            </li>
                            <li>
                                <a href="/report-user">
                                    <span class="sub-item">User</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="/data-relawan" class="collapsed" aria-expanded="false">
                        <i class="fa fa-id-card"></i>
                        <p>Data Balad Husein</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/raihan-suara" class="collapsed" aria-expanded="false">
                        <i class="fa fa-align-left"></i>
                        <p>Raihan Suara</p>
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->