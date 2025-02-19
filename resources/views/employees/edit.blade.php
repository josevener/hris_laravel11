<x-app-layout>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Employee</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Employee</li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Employee edit</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('employees.update', $employee) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <input type="hidden" class="form-control" id="id" name="id"
                                value="{{ old('id', $employee->id) }}">

                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Employee ID</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="employee_id" name="employee_id"
                                        value="{{ old('employee_id', $employee->employee_id) }}" readonly>
                                </div>
                            </div>
                            <!-- Full Name & Email in One Row -->
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Full Name</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="name" name="name"
                                        value="{{ old('name', $employee->user->name) }}">
                                </div>
                                <label class="col-form-label col-md-2">Email</label>
                                <div class="col-md-4">
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="{{ old('email', $employee->user->email) }}">
                                </div>
                            </div>

                            <!-- Birth Date & Gender in One Row -->
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Birth Date</label>
                                <div class="col-md-4">
                                    <div class="cal-icon">
                                        <input type="text" class="form-control datetimepicker" id="birth_date"
                                            name="birth_date" value="{{ old('birthdate', $employee->birthdate) }}">
                                    </div>
                                </div>
                                <label class="col-form-label col-md-2">Gender</label>
                                <div class="col-md-4">
                                    <select class="select form-control" id="gender" name="gender">
                                        <option value="{{ old('gender', $employee->gender) }}"
                                            {{ $employee->gender == $employee->gender ? 'selected' : '' }}>
                                            {{ $employee->gender }}
                                        </option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Position</label>
                                <div class="col-md-4">
                                    <select class="form-control select" id="position" name="position_id">
                                        <option value="{{ old('position_id', $employee->position_id) }}" selected>
                                            {{ $employee->position->title }}
                                        </option>
                                        @foreach ($positions as $position)
                                            <option value="{{ $position->id }}">{{ $position->title }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label class="col-md-2 col-form-label">Department</label>
                                <div class="col-md-4">
                                    <select class="form-control select" id="department" name="department_id">
                                        <option value="{{ old('department_id', $employee->department_id) }}" selected>
                                            {{ $employee->department->department }}
                                        </option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->department }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Employee ID & Line Manager in One Row -->
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Phone Number</label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="phone_number" name="phone_number"
                                        value="{{ old('phone_number', $employee->user->phone_number) }}">
                                </div>
                                <label class="col-form-label col-md-2">Supervisor</label>
                                <div class="col-md-4">
                                    <select class="form-control select" id="reports_to" name="reports_to">
                                        <option value="{{ old('reports_to', $employee->reports_to) }}" selected>
                                            {{ $employee->reports_to ?? '--- Select supervisor ---' }}
                                        </option>
                                        @foreach ($supervisors as $supervisor)
                                            <option value="{{ $supervisor->name }}">{{ $supervisor->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Employee Permission Table -->
                            <div class="form-group row">
                                <label class="col-form-label col-md-2">Employee Permission</label>
                                <div class="col-md-10">
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
                                </div>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="form-group row">
                                <div class="col-md-2"></div>
                                <div class="col-md-6 d-flex gap-2">
                                    <button type="submit"
                                        class="btn btn-primary w-50 submit-btn mr-3">Update</button>
                                    <a href="{{ route('employees.index') }}"
                                        class="btn btn-secondary w-50 cancel-btn">Cancel</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
