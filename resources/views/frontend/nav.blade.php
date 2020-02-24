<nav id="navbar" class="nav">
    <div class="container">
        <div class="row">
            <div class="col-md-5 p0">
                <ul class="p0">
                    <li style="width:500px">
                        <div style="position: relative;width:100%">
                            <input type="text" class="form-control" placeholder="Tìm kiếm bệnh nhân">
                            <button style="position: absolute;background: none;border:none;top:24%;right:10px" class="fa fa-search"></button>
                            <div id="div_search"></div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-7 text-right">
                <ul>
                    <li>
                        <a title="Khám bệnh" href="{{asset('b')}}"><span class="fa fa-heart"></span></a>
                    </li>
                    <li>
                        <a v-on:click="isabout=true" title="Hỗ trợ" style="cursor: pointer"><span class="fa fa-exclamation"></span></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)"><span class="fa fa-reply-all"></span></a>
                    </li>
                    <li>
                        <a onclick="if (!confirm('Đăng xuất khỏi phần mềm ? ')) return false" title="Đăng xuất" href="{{asset('auth/logout')}}"><span class="fa fa-sign-out"></span></a>
                    </li>
                    <li>
                        <a title="Tùy chọn" href="javascript:void(0)"><span class="fa fa-bars"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>