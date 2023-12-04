
@if (Auth::user()->role == '1')
<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="info avatar">
                    <a data-toggle="collapse" href="#" aria-expanded="true">
                        <span>
                            {{-- <a href="#"> --}}
                            <strong>{{ strtoupper(Auth::user()->name) }}</strong>   
                            <span class="user-level">
                                @if (Auth::user()->role == '1')
                                    <strong>ADMIN</strong>
                                @elseif (Auth::user()->role == '2')
                                    <strong>EMPLOYEE</strong>
                                @endif
                            </span>

                            {{-- </a> --}}
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav nav-primary">
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
                    <h4 class="text-section">Log</h4>
                </li>
                <li class="nav-item">
                    <a href="/log/user" class="collapsed" aria-expanded="false">
                        <i class="fa fa-file-code" aria-hidden="true"></i>
                        <p>User Log</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/log/reservation" class="collapsed" aria-expanded="false">
                        <i class="fa fa-file-code" aria-hidden="true"></i>
                        <p>Reservation Log</p>
                    </a>
                </li>

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Table</h4>
                </li>

                <li class="nav-item">
                    <a href="{{ route('tables') }}" class="collapsed" aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <p>Data</p>
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
                        <i class="fa fa-car" aria-hidden="true"></i>
                        <p>Arrival</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reservations') }}" class="collapsed" aria-expanded="false">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <p>Data</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reservations.report') }}" class="collapsed" aria-expanded="false">
                        <i class="fa fa-file" aria-hidden="true"></i>
                        <p>Report</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
@endif


@if (Auth::user()->role == '2')
<!-- Sidebar -->
<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="info avatar">
                    <a data-toggle="collapse" href="#" aria-expanded="true">
                        <span>
                            {{-- <a href="#"> --}}
                            <strong>{{ strtoupper(Auth::user()->name) }}</strong>   
                            <span class="user-level">
                                @if (Auth::user()->role == '1')
                                    <strong>ADMIN</strong>
                                @elseif (Auth::user()->role == '2')
                                    <strong>EMPLOYEE</strong>
                                @endif
                            </span>

                            {{-- </a> --}}
                        </span>
                    </a>
                </div>
            </div>
            <ul class="nav nav-primary">
                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Reservation</h4>
                </li>

                <li class="nav-item">
                    <a href="{{ route('reservations.arrival') }}" class="collapsed" aria-expanded="false">
                        <i class="fa fa-car" aria-hidden="true"></i>
                        <p>Arrival</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reservations') }}" class="collapsed" aria-expanded="false">
                        <i class="fa fa-users" aria-hidden="true"></i>
                        <p>Data</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('reservations.report') }}" class="collapsed" aria-expanded="false">
                        <i class="fa fa-file" aria-hidden="true"></i>
                        <p>Report</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
@endif

