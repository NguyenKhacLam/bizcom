<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ url('/') }}" ><i class="fa fa-fw fa-home"></i>Trang chủ <span class="badge badge-success">6</span></a>
                    </li>

                    <li class="nav-divider">
                        Tổ chức
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-f fa-users"></i>Tổ chức của tôi</a>
                        <div id="submenu-1" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/organization/1') }}">Chi tiết</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Tô chức con</a>
                                </li>
                            </ul>
                        <div/>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" ><i class="fas fa-fw fa-users"></i> Nhóm </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" ><i class="fas fa-fw fa-compass"></i> Chiến dịch </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" ><i class="fas fa-fw fa-money-bill-alt"></i>Hóa đơn </a>
                    </li>

                    <li class="nav-divider">
                        Người dùng
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" ><i class="fas fa-fw fa-users"></i>Nhân viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-f fa-users"></i>Quyền hạn và chức vụ</a>
                        <div id="submenu-2" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="">Chức vụ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Quyền hạn</a>
                                </li>
                            </ul>
                        <div/>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" ><i class="fas fa-fw fa-users"></i>Khánh hàng</a>
                    </li>

                    <li class="nav-divider">
                        Sản phẩm
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" ><i class="fas fa-fw fa-inbox"></i>Danh mục</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-fw fa-columns"></i>Sản phẩm</a>
                    </li>
                    {{-- <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-10" aria-controls="submenu-10"><i class="fas fa-f fa-folder"></i>Menu Level</a>
                        <div id="submenu-10" class="collapse submenu" style="">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Level 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-11" aria-controls="submenu-11">Level 2</a>
                                    <div id="submenu-11" class="collapse submenu" style="">
                                        <ul class="nav flex-column">
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Level 1</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Level 2</a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Level 3</a>
                                </li>
                            </ul>
                        </div>
                    </li> --}}
                </ul>
            </div>
        </nav>
    </div>
</div>
