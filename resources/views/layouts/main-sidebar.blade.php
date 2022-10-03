<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg" style="overflow: scroll">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <!-- menu item Dashboard-->
                    <li>
                        <a href="{{route('admin.dashboard')}}">
                            <div class="pull-left"><i class="ti-home"></i>
                                 <span class="right-nav-text">الصفحة الرئيسية</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>
                    <!-- menu title -->

                    <!-- Grades-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Grades-menu">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-t">المنتجات</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Grades-menu" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{route('product_ForAdmin.index')}}">عرض المنتجات</a>
                            </li>
                        </ul>
                    </li>
                    <!-- classes-->

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">العملاء</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{route('clients.create')}}">إضافة عميل</a>
                            </li>
                            <li>
                                <a href="{{route('clients.index')}}">عرض العملاء</a>
                            </li>
                            <li>
                                <a href="{{route('client.trash')}}">العملاء المحذوفين</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-category">
                            <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                                    class="right-nav-text">الأقسام</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-category" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{route('category.create')}}">إضافة قسم</a>
                            </li>
                            <li>
                                <a href="{{route('category.index')}}">عرض الأقسام</a>
                            </li>
                        </ul>
                    </li>


                    <!-- sections-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#sections-menu">
                            <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                                    class="right-nav-text">المشتريات</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="sections-menu" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{route('product_ForAdmin.create')}}">شراء منتج</a>
                            </li>
                            <li>
                                <a href="{{route('index.buy')}}">عرض المشتريات</a>
                            </li>
                        </ul>
                    </li>




                    <!-- Users-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Users-icon">
                            <div class="pull-left"><i class="fas fa-users"></i><span class="right-nav-text">المبيعات</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Users-icon" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('search.product')}}">بيع منتج</a>
                            </li>
                            <li><a href="{{route('sells.index')}}">عرض المبيعات</a>
                            </li>
                            <li><a href="{{route('trashed.sells')}}">المبيعات المحذوفة</a>
                            </li>
                        </ul>
                    </li>












                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#suppliers-menu">
                            <div class="pull-left"><i class="fas fa-school"></i><span
                                    class="right-nav-t">الموردين</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="suppliers-menu" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{route('suppliers.create')}}">إضافة مورد جديد</a>
                            </li>
                            <li>
                                <a href="{{route('suppliers.index')}}">عرض الموردين</a>
                            </li>
                            <li>
                                <a href="{{route('supplier.trash')}}">الموردين المحذوفين</a>
                            </li>
                        </ul>
                    </li>
                    <!-- classes-->

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#expenses-menu">
                            <div class="pull-left"><i class="fa fa-building"></i><span
                                    class="right-nav-text">المصروفات</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="expenses-menu" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{route('expenses.create')}}">إضافة مصروف</a>
                            </li>
                            <li>
                                <a href="{{route('expenses.index')}}">عرض المصروفات</a>
                            </li>
                        </ul>
                    </li>


                    <!-- sections-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#imports-menu">
                            <div class="pull-left"><i class="fas fa-chalkboard"></i><span
                                    class="right-nav-text">واردات الخزينة</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="imports-menu" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{route('safe.create')}}">إضافة مبلغ للخزينة</a>
                            </li>
                            <li>
                                <a href="{{route('safe.index')}}">عرض المبالغ المضافة للخزينة</a>
                            </li>
                        </ul>
                    </li>




                    <!-- Users-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#safe-icon">
                            <div class="pull-left"><i class="fas fa-users"></i><span class="right-nav-text">إدارة الحسابات</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="safe-icon" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="{{route('general.view')}}">نظرة عامة</a>
                            </li>
                            <li>
                                <a href="{{route('collected.data')}}">بيانات مجمعة</a>
                            </li>
                            <li>
                                <a href="{{route('reports')}}">تفاصيل الأرباح</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{route('registerView')}}">
                            <div class="pull-left"><i class="ti-home"></i>
                                <span class="right-nav-text">إضافة أدمن جديد</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->


