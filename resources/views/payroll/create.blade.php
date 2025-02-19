<x-app-layout>
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Add Employee Salary <span id="year"></span></h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Add employee salary</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="add_salary" class="salary-form-section">
            <div class="salary-form-container">
                <form action="#" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Employee Name</label>
                                <select class="select select2s-hidden-accessible @error('name') is-invalid @enderror"
                                    style="width: 100%;" id="name" name="name">
                                    <option value="">Select Employee</option>
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->user->name }}" data-employee_id={{ $employee->id }}>
                                            {{ $employee->user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <input class="form-control" type="hidden" name="user_id" id="employee_id" readonly>
                        <div class="col-sm-6">
                            <label>Net Salary</label>
                            <input class="form-control @error('salary') is-invalid @enderror" type="number"
                                name="salary" id="salary" value="{{ old('salary') }}"
                                placeholder="Enter net salary">
                            @error('salary')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <h4 class="text-primary">Earnings</h4>
                            <div class="form-group">
                                <label>Basic</label>
                                <input class="form-control @error('basic') is-invalid @enderror" type="number"
                                    name="basic" id="basic" value="{{ old('basic') }}" placeholder="Enter basic salary">
                                @error('basic')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <h5 class="text-primary">Allowances</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Meal</label>
                                        <input class="form-control @error('meal') is-invalid @enderror" type="number"
                                            name="meal" id="meal" value="{{ old('meal') }}"
                                            placeholder="Enter meal allowance">
                                        @error('meal')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label>Transportation</label>
                                        <input class="form-control @error('transportation') is-invalid @enderror" type="number"
                                            name="transportation" id="transportation" value="{{ old('transportation') }}"
                                            placeholder="Enter transportation">
                                        @error('transportation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h4 class="text-primary">Deductions</h4>
                            <div class="form-group">
                                <label>SSS</label>
                                <input class="form-control @error('sss') is-invalid @enderror" type="number"
                                    name="sss" id="sss" value="{{ old('sss') }}" placeholder="Enter SSS">
                                @error('sss')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Pag-IBIG</label>
                                <input class="form-control @error('pag-ibig') is-invalid @enderror" type="number"
                                    name="pag-ibig" id="pag-ibig" value="{{ old('pag-ibig') }}"
                                    placeholder="Enter Pag-IBIG">
                                @error('pag-ibig')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Philhealth</label>
                                <input class="form-control @error('philhealth') is-invalid @enderror" type="number"
                                    name="philhealth" id="philhealth" value="{{ old('philhealth') }}"
                                    placeholder="Enter Philhealth">
                                @error('philhealth')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="submit-section d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary submit-btn mr-4">Save</button>
                        <a href="{{ route('payroll.index') }}"
                            class="btn btn-primary continue-btn submit-btn">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
