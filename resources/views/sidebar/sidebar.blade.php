<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <li class="menu-title">
                    <span>Main</span>
                </li>
                <li class="submenu">
                    <a href="#">
                        <i class="la la-dashboard"></i>
                        <span> Dashboard</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="#">Admin Dashboard</a></li>
                        <li><a class="{{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}"
                                href="{{ route('dashboard') }}">Employee Dashboard</a></li>
                    </ul>
                </li>
                <li class="menu-title"> <span>Authentication</span> </li>
                <li class="submenu">
                    <a href="#">
                        <i class="la la-user-secret"></i>
                        <span> User Controller</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a class="{{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}"
                                href="{{ route('users.index') }}">All User</a></li>
                        <li><a href="#">Activity Log</a></li>
                        <li><a href="#">Activity User</a></li>
                    </ul>
                </li>
                <li class="menu-title"> <span>Employees</span> </li>
                <li class="submenu">
                    <a href="#">
                        <i class="la la-user"></i>
                        <span> Employees</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a class="{{ in_array(Route::currentRouteName(), ['employees.index', 'employees.edit']) ? 'active' : '' }}"
                                href="{{ route('employees.index') }}">
                                All Employees
                            </a>
                        </li>
                        <li>
                            <a class="{{ Route::currentRouteName() == 'holidays.index' ? 'active' : '' }}"
                                href="{{ route('holidays.index') }}">
                                Holidays
                            </a>
                        </li>
                        <li><a href="#">Leaves (Admin)</a></li>
                        <li><a href="#">Leaves (Employee)</a></li>
                        <li><a href="#">Leave Settings</a></li>
                        <li><a href="#">Attendance (Admin)</a></li>
                        <li><a href="#">Attendance (Employee)</a></li>
                        <li>
                            <a class="{{ Route::currentRouteName() == 'departments.index' ? 'active' : '' }}"
                                href="{{ route('departments.index') }}">
                                Departments
                            </a>
                        </li>
                        <li>
                            <a class="{{ Route::currentRouteName() == 'designations.index' ? 'active' : '' }}"
                                href="{{ route('designations.index') }}">
                                Designations
                            </a>
                        </li>
                        <li><a href="#">Timesheet</a></li>
                        <li><a href="#">Shift & Schedule</a></li>
                        <li><a href="#">Overtime</a></li>
                    </ul>
                </li>
                <li class="menu-title"> <span>HR</span> </li>
                <li class="submenu">
                    <a href="#">
                        <i class="la la-files-o"></i>
                        <span> Sales </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="#">Estimates</a></li>
                        <li><a href="#">Invoices</a></li>
                        <li><a href="#">Payments</a></li>
                        <li><a href="#">Expenses</a></li>
                        <li><a href="#">Provident Fund</a></li>
                        <li><a href="#">Taxes</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#">
                        <i class="la la-money"></i>
                        <span> Payroll </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li>
                            <a class="{{ in_array(Route::currentRouteName(), ['salary.index', 'salary.create', 'salary.edit']) ? 'active' : '' }} }}"
                                href="{{ route('salary.index') }}">
                                Employee Salary
                            </a>
                        </li>
                        <li>
                            <a href="{{ Route::currentRouteName() == 'payslip.index' ? 'active' : '' }}">Payslip</a>
                        </li>
                        <li><a href="#">Payroll Items</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#">
                        <i class="la la-pie-chart"></i>
                        <span> Reports </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="#">Expense Report</a></li>
                        <li><a href="#">Invoice Report</a></li>
                        <li><a href="#">Payments Report</a></li>
                        <li><a href="#">Employee Report</a></li>
                        <li><a href="#">Payslip Report</a></li>
                        <li><a href="#">Attendance Report</a></li>
                        <li><a href="#">Leave Report</a></li>
                        <li><a href="#">Daily Report</a></li>
                    </ul>
                </li>
                <li class="menu-title"> <span>Performance</span> </li>
                <li class="submenu">
                    <a href="#">
                        <i class="la la-graduation-cap"></i>
                        <span> Performance </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="#">Performance Indicator</a></li>
                        <li><a href="#">Performance Review</a></li>
                        <li><a href="#">Performance Appraisal</a></li>
                    </ul>
                </li>
                <li class="submenu">
                    <a href="#">
                        <i class="la la-edit"></i>
                        <span> Training </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul>
                        <li><a href="#">Training List</a></li>
                        <li><a href="#">Trainers</a></li>
                        <li><a href="#">Training Type</a></li>
                    </ul>
                </li>
                <li class="menu-title"> <span>Administration</span> </li>
                <li><a href="#"><i class="la la-object-ungroup"></i> <span>Assets</span></a></li>
                <li class="menu-title"> <span>Pages</span> </li>
                <li class="submenu">
                    <a href="#"><i class="la la-user"></i> <span> Profile </span> <span
                            class="menu-arrow"></span></a>
                    <ul>
                        <li><a href="#">Employee Profile</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /Sidebar -->
