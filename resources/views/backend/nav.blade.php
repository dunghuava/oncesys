<div class="bg-w" style="background: #1e691e;">
    <br>
    <br>
</div>
<nav id="navbar" class="nav">
    <div class="container">
        <div class="row">
            <div class="col-md-8 p0">
                <ul class="p0">
                    <li>
                        <a title="Dasboard" href="{{asset('b')}}">
                            <span class="fa fa-home"></span>
                            Dasboard
                        </a>
                    </li>
                    <li id="kham_benh">
                        <a title="Dasboard" href="{{asset('b/examination')}}">
                            <span class="fa fa-heart"></span>
                            Khám bệnh
                        </a>
                    </li>
                    <li id="thuoc">
                        <a title="Quản lý thuốc" href="{{asset('b/medicine')}}">
                            <span class="fa fa-cube"></span>
                            Quản lý thuốc
                        </a>
                    </li>
                    <li id="kinh">
                        <a title="Quản lý kinh" href="{{asset('b/glass')}}">
                            <span class="fa fa-cube"></span>
                            Quản lý kính
                        </a>
                    </li>
                    <li id="hoa_don">
                        <a title="Hóa đơn" href="{{asset('b/bills')}}">
                            <span class="fa fa-history"></span>
                            Lịch sử khám
                        </a>
                    </li>
                    <li id="thong_ke">
                        <a title="Thống kê" href="{{asset('b/statistical')}}">
                            <span class="fa fa-bar-chart"></span>
                            Thống kê
                        </a>
                    </li>
                </ul>   
            </div>
            <div class="col-md-4 text-right">
                <ul>
                    <li>
                        <a class="circle" title="Tiếp tân" href="{{asset('f')}}"><span class="fa fa-archive"></span></a>
                    </li>
                    <li>
                        <a class="circle" href="javascript:void(0)"><span class="fa fa-reply-all"></span></a>
                    </li>
                    <li>
                        <a class="circle" onclick="if (!confirm('Đăng xuất khỏi phần mềm ? ')) return false" title="Đăng xuất" href="{{asset('auth/logout')}}"><span class="fa fa-sign-out"></span></a>
                    </li>
                    <li>
                        <a class="circle" title="Tùy chọn" href="javascript:void(0)"><span class="fa fa-bars"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>