<x-app-layout>
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Employees</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Employees</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_employee"><i
                            class="fa fa-plus"></i> Add Employee</a>
                    <div class="view-icons">
                        <a href="#card" class="grid-view btn btn-link active"><i class="fa fa-th"></i></a>
                        <a href="#list" class="list-view btn btn-link"><i class="fa fa-bars"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <!-- Search Filter -->
        <form action="#search" method="POST">
            @csrf
            <div class="row filter-row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating" name="employee_id">
                        <label class="focus-label">Employee ID</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating">
                        <label class="focus-label">Employee Name</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group form-focus">
                        <input type="text" class="form-control floating">
                        <label class="focus-label">Position</label>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <button type="sumit" class="btn btn-success btn-block"> Search </button>
                </div>
            </div>
        </form>
        <!-- Search Filter -->


        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Role</th>
                                <th class="text-nowrap">Join Date</th>
                                <th class="text-right no-sort">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp

                            @if (isset($employees) && $employees->isNotEmpty())
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td>{{ ++$count }}</td>
                                        <td>{{ $employee->employeeId }}</td>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="#" class="avatar">
                                                    <img
                                                        src="{{ asset($employee->user->profile_image ?? 'assets/images/photo_defaults.jpg') }}">
                                                </a>
                                                <a href="#">
                                                    {{ $employee->user->name }}
                                                    <span>{{ $employee->designation->designation }}</span>
                                                </a>
                                            </h2>
                                        </td>
                                        <td>{{ $employee->user->email }}</td>
                                        <td>{{ $employee->user->phone_number }}</td>
                                        <td>{{ $employee->user->role_name }}</td>
                                        <td>{{ $employee->user->created_at->format('F d, Y') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item"
                                                        href="{{ route('employees.edit', $employee) }}">
                                                        <i class="fa fa-pencil m-r-5"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item delete_user" href="#"
                                                        data-toggle="modal" data-employee_id="{{ $employee->id }}"
                                                        data-target="#delete_user">
                                                        <i class="fa fa-trash-o m-r-5"></i>
                                                        Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="text-center" colspan="12">No employee record found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Add Employee Modal -->
    <div id="add_employee" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Employee</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('employees.store') }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Full Name</label>
                                    <input type="hidden" name="user_id" id="user_id" value=""></input>
                                    <select class="select" id="name" name="name">
                                        <option value="">-- Select --</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                data-employee_id="{{ $user->employeeId }}"
                                                data-email="{{ $user->email }}" data-user_id={{ $user->id }}>
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email <span class="text-danger">*</span>
                                    </label>
                                    <input class="form-control" type="email" id="email" name="email"
                                        placeholder="Auto generated email" readonly>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Birth Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker" type="text" id="birth_date"
                                            name="birth_date">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <select class="select form-control" id="gender" name="gender">
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select class="select" id="department" name="department_id">
                                        <option selected disabled>Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->department }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Designation <small>
                                            <super>(Position)</super>
                                        </small></label>
                                    <select class="select" id="designation_id" name="designation_id" disabled>
                                        <option selected disabled>Select department first</option>
                                        {{-- @foreach ($designations as $designation)
                                            <option value="{{ $designation->id }}">{{ $designation->designation }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Employee ID <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="employeeId" name="employeeId"
                                        placeholder="Auto generated id" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Supervisor</label>
                                    <select class="select" id="reports_to" name="reports_to">
                                        <option selected disabled>-- Select --</option>
                                        @foreach ($supervisors as $supervisor)
                                            <option value="{{ $supervisor->name }}">{{ $supervisor->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive m-t-15">
                            <table class="table table-striped custom-table">
                                <thead>
                                    <tr>
                                        <th>Module Permission</th>
                                        <th class="text-center">Read</th>
                                        <th class="text-center">Write</th>
                                        <th class="text-center">Create</th>
                                        <th class="text-center">Delete</th>
                                        <th class="text-center">Import</th>
                                        <th class="text-center">Export</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Employee Modal -->

    <!-- Delete User Modal -->
    <div class="modal custom-modal fade" id="delete_user" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete User</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <form id="deleteEmployeeForm" method="POST">
                            @csrf
                            @method('DELETE')

                            <input type="hidden" name="id" class="user_id">
                            <input type="hidden" name="profile_image" id="profile_image">

                            <div class="row">
                                <div class="col-6">
                                    <button type="submit"
                                        class="btn btn-primary continue-btn deleteEmployeeBtn w-100">Delete</button>
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
    <!-- /Delete User Modal -->

</x-app-layout>

<script>
    $(document).ready(function() {
        $('#name').on('change', function() {

            var employeeId = $(this).find(':selected').data('employee_id');
            var email = $(this).find(':selected').data('email');
            var userId = $(this).find(':selected').data('user_id');

            $('#employeeId').val(employeeId);
            $('#email').val(email);
            $('#user_id').val(userId);
        });

        $(document).on('click', '.delete_user', function() {
            var employee_id = $(this).data('employee_id');

            $('#deleteEmployeeForm').attr('action', `/employees/${employee_id}`);
        });

        $(document).on('click', 'deleteEmployeeBtn', function() {
            $('#deleteEmployeeForm').submit();
        })


        $('#department').on('change', function() {
            var departmentId = $(this).val();

            // Make an AJAX request to get the designations based on selected department
            if (departmentId) {

                $('#designation_id').prop('disabled', false);

                $.ajax({
                    url: `/employees/get-designations/${departmentId}`,
                    type: 'GET',
                    success: function(data) {
                        // Clear existing options
                        $('#designation_id').empty();

                        // Add a default option
                        $('#designation_id').append('<option selected disabled>Select Designation</option>');

                        // Loop through the response and add options to the Designation dropdown
                        $.each(data, function(key, value) {
                            $('#designation_id').append('<option value="' + value
                                .id + '">' + value.designation + '</option>');
                        });
                    }
                });
            } else {
                // If no department selected, reset the Designation dropdown
                $('#designation_id').prop('disabled', true);
                $('#designation_id').empty();
                $('#designation_id').append('<option selected disabled>Select Designation</option>');
            }
        });
    });
</script>
