<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0;">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="http://gympal.com.hk/front">Gympal</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="{{route('home')}}"><i class="fa fa-th fa-th"></i> 網站首頁 </a>
                </li>
                <li>
                    <a href="{{ route('student_myprofile') }}"><i class="fa fa-user fa-user"></i> 用戶資料 </a>
                </li>
                <li>
                    <a href="{{ route('student_list_mycase') }}"><i class="fa fa-edit fa-edit"></i> 我的個案 </a>
                </li>
                <li>
                    <a href="{{ route('create_case') }}"><i class="fa fa-edit fa-edit"></i> 開新個案 </a>
                </li>
                <li>
                    <a href="{{ route('public_list_coach') }}"><i class="fa fa-group fa-group"></i> 尋找導師 </a>
                </li>
                <li>
                    <a href="{{route('logout')}}"><i class="fa fa-reply fa-reply"></i> 登出 </a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>