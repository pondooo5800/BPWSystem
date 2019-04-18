<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('home') }}">
                <span class="menu-title">หน้าหลัก</span>
                <i class="mdi mdi-home menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-product" aria-expanded="false" aria-controls="ui-product">
                    <span class="menu-title">ข้อมูลสินค้า</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-format-list-bulleted menu-icon"></i>
                </a>
                    <div class="collapse" id="ui-product">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{ route('product.index') }}">สินค้า</a></li>
                        </ul>
                    </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/icons/mdi.html">
                <span class="menu-title">ข้อมูลการขาย</span>
                <i class="mdi mdi-table-large menu-icon"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="pages/charts/chartjs.html">
                <span class="menu-title">รายงาน</span>
                <i class="mdi mdi-chart-bar menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="pages/tables/basic-table.html">
                <span class="menu-title">ข้อมูลสมาชิก</span>
                <i class="mdi mdi-contacts menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-setting" aria-expanded="false" aria-controls="ui-setting">
                    <span class="menu-title">ตั้งค่า</span>
                        <i class="menu-arrow"></i>
                        <i class="mdi mdi-settings menu-icon"></i>
                </a>
                    <div class="collapse" id="ui-setting">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="{{ route('category.index') }}">ประเภทสินค้า</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('user.index') }}">ผู้ใช้งานระบบ</a></li>

                        </ul>
                    </div>
            </li>
        </ul>
    </nav>
