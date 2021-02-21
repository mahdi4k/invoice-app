<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">

        </div>
        <div class="sidebar-brand-text mx-3">پنل مدیریت</div>
    </a>

    <!-- Divider -->

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{url('admin/panel')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>داشبورد</span></a>
    </li>

    <!-- Nav Item - PipeFactory -->


    <!-- factors -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#invoice" aria-expanded="false" aria-controls="invoice">
            <i class="fas fa-fw fa-cog"></i>
            <span>مدیریت  فاکتورها</span>
        </a>
        <div id="invoice" class="collapse" aria-labelledby="invoice" data-parent="#accordionSidebar" style="">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{url('admin/orders')}}">فاکتور ها</a>
            </div>
        </div>
    </li>


    <!-- FactoryPipe -->
    <li class="nav-item">
        <a class="nav-link " href="{{route('factoryPipe.index')}}"   >
            <i class="fas fa-fw fa-cog"></i>
            <span>مدیریت  کارخانه ها</span>
        </a>
     </li>

    <!-- Factory Pipe -->
    <li class="nav-item">
        <a class="nav-link  " href="{{route('Pipe.index')}}"    >
            <i class="fas fa-fw fa-cog"></i>
            <span>مدیریت کالا</span>
        </a>
    </li>


    <!-- Manage Users -->
    <li class="nav-item  ">
        <a class="nav-link" href="{{url('admin/user')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>مدیریت کاربران</span>
        </a>
    </li>

    <li class="nav-item  ">
        <a class="nav-link" href="{{url('admin/user/message')}}">
            <i class="far fa-envelope ml-1"></i>
            <span>نظرات کاربران</span></a>
    </li>

    <li class="nav-item  ">
        <a style="float: right; text-align: right;margin-top: 10px;font-size: 15px;margin-right: 16px;" class="btn btn-danger" href="{{url('logout')}}">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>خروج</span></a>
    </li>

    <!-- Nav Item - Tables -->


    <!-- Divider -->

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->
