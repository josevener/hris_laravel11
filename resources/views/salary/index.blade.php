<x-app-layout>
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Employee Salary <span id="year"></span></h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Salary</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="{{ route('salary.create') }}" class="btn add-btn">
                        <i class="fa fa-plus"></i>
                        Add Salary
                    </a>
                </div>
            </div>
        </div>

        <!-- Search Filter -->
        <div class="row filter-row">
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating">
                    <label class="focus-label">Employee Name</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus select-focus">
                    <select class="select floating">
                        <option value="">Select Role</option>
                        <option value="">Employee</option>
                        <option value="1">Manager</option>
                    </select>
                    <label class="focus-label">Role</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus select-focus">
                    <select class="select floating">
                        <option>Select Status</option>
                        <option> Pending </option>
                        <option> Approved </option>
                        <option> Rejected </option>
                    </select>
                    <label class="focus-label">Leave Status</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text">
                    </div>
                    <label class="focus-label">From</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <div class="form-group form-focus">
                    <div class="cal-icon">
                        <input class="form-control floating datetimepicker" type="text">
                    </div>
                    <label class="focus-label">To</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                <a href="#" class="btn btn-success btn-block"> Search </a>
            </div>
        </div>
        <!-- /Search Filter -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Email</th>
                                <th>Join Date</th>
                                <th>Role</th>
                                <th>Salary</th>
                                <th>Payslip</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($salaries as $salary)
                                <tr>
                                    <td>{{ $salary->employee->employeeId }}</td>
                                    <td>
                                        <h2 class="table-avatar">
                                            <a href="#" class="avatar">
                                                <img alt=""
                                                    src="{{ asset(optional($salary->employee->user)->profile_image ?? 'assets/images/photos_defaults.jpg') }}">
                                            </a>
                                            <a href="#">{{ $salary->employee->user->name }}
                                                <span>{{ $salary->employee->designation->designation }}</span>
                                            </a>
                                        </h2>
                                    </td>
                                    <td>{{ $salary->employee->user->email }}</td>
                                    <td>{{ $salary->employee->user->created_at }}</td>
                                    <td>{{ $salary->employee->user->role_name }}</td>
                                    <td>{{ number_format($salary->net_salary ?? 0, 2) }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="#" target="_blank">
                                            Generate Slip
                                        </a>
                                    </td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{ route('salary.edit', $salary) }}">
                                                    <i class="fa fa-pencil m-r-5"></i>
                                                    Edit
                                                </a>
                                                <button class="dropdown-item salaryDelete" data-toggle="modal"
                                                    data-target="#delete_salary" data-salary_id="{{ $salary->id }}">
                                                    <i class="fa fa-trash-o m-r-5"></i>
                                                    Delete
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /Page Content -->

    <!-- Edit Salary Modal -->
    {{-- <div id="edit_salary" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Employee
                </div>
                <div class="modal-body">
                    <form action="{{ route('salary.edit', $salary) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input class="form-control" type="hidden" name="id" id="e_id" value=""
                            readonly>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name Staff</label>
                                    <input class="form-control " type="text" name="name" id="e_name"
                                        value="" readonly>
                                </div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label>Net Salary</label>
                                <input class="form-control" type="text" name="salary" id="e_salary"
                                    value="">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="text-primary">Earnings</h4>
                                <div class="form-group">
                                    <label>Basic</label>
                                    <input class="form-control" type="text" name="basic" id="e_basic"
                                        value="">
                                </div>
                                <div class="form-group">
                                    <label>DA(40%)</label>
                                    <input class="form-control" type="text" name="da" id="e_da"
                                        value="">
                                </div>
                                <div class="form-group">
                                    <label>HRA(15%)</label>
                                    <input class="form-control" type="text" name="hra" id="e_hra"
                                        value="">
                                </div>
                                <div class="form-group">
                                    <label>Conveyance</label>
                                    <input class="form-control" type="text" name="conveyance" id="e_conveyance"
                                        value="">
                                </div>
                                <div class="form-group">
                                    <label>Allowance</label>
                                    <input class="form-control" type="text" name="allowance" id="e_allowance"
                                        value="">
                                </div>
                                <div class="form-group">
                                    <label>Medical Allowance</label>
                                    <input class="form-control" type="text" name="medical_allowance"
                                        id="e_medical_allowance" value="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <h4 class="text-primary">Deductions</h4>
                                <div class="form-group">
                                    <label>TDS</label>
                                    <input class="form-control" type="text" name="tds" id="e_tds"
                                        value="">
                                </div>
                                <div class="form-group">
                                    <label>ESI</label>
                                    <input class="form-control" type="text" name="esi" id="e_esi"
                                        value="">
                                </div>
                                <div class="form-group">
                                    <label>PF</label>
                                    <input class="form-control" type="text" name="pf" id="e_pf"
                                        value="">
                                </div>
                                <div class="form-group">
                                    <label>Leave</label>
                                    <input class="form-control" type="text" name="leave" id="e_leave"
                                        value="">
                                </div>
                                <div class="form-group">
                                    <label>Prof. Tax</label>
                                    <input class="form-control" type="text" name="prof_tax" id="e_prof_tax"
                                        value="">
                                </div>
                                <div class="form-group">
                                    <label>Loan</label>
                                    <input class="form-control" type="text" name="labour_welfare"
                                        id="e_labour_welfare" value="">
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- /Edit Salary Modal -->

    <!-- Delete Salary Modal -->
    <div class="modal custom-modal fade" id="delete_salary" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Salary</h3>
                        <p>Are you sure you want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <form id="deleteSalaryForm" method="POST">
                            @csrf
                            @method('DELETE')

                            <div class="row">
                                <div class="col-6">
                                    <input type="hidden" name="id" class="e_id" value="">
                                    <button type="submit"
                                        class="btn btn-primary continue-btn submit-btn salaryDeleteBtn">Delete</button>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal"
                                        class="btn btn-primary cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Salary Modal -->
</x-app-layout>

<script>
    $(document).ready(function() {
        // Delete Salary
        $('.salaryDelete').on('click', function() {
            var salary_id = $(this).data('salary_id');

            $('.e_id').val(salary_id).text();

            $('#deleteSalaryForm').attr('action', `/salary/${salary_id}`);
        });
    });
</script>
