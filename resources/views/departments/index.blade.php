<x-app-layout>
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Department</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Department</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_department">
                        <i class="fa fa-plus"></i>
                        Add Department
                    </a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div>
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th style="width: 30px;">No</th>
                                <th>Department Name</th>
                                <th hidden></th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp

                            @if (isset($departments) && $departments->isNotEmpty())
                                @foreach ($departments as $department)
                                    <tr>
                                        <td>{{ ++$count }}</td>
                                        <td hidden class="id">{{ $department->id }}</td>
                                        <td class="department">{{ $department->department }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item  edit_department" href="#"
                                                        data-toggle="modal" data-department_id="{{ $department->id }}"
                                                        data-department_name="{{ $department->department }}"
                                                        data-target="#edit_department">
                                                        <i class="fa fa-pencil m-r-5"></i>
                                                        Edit
                                                    </a>
                                                    <a class="dropdown-item delete_department" href="#"
                                                        data-toggle="modal" data-department_id="{{ $department->id }}"
                                                        data-target="#delete_department">
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
                                    <td colspan="12" class="text-center">No department available</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Add Department Modal -->
    <div id="add_department" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('departments.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Department Name <span class="text-danger">*</span></label>
                            <input class="form-control @error('department') is-invalid @enderror" type="text"
                                id="department" name="department">
                            @error('department')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Department Modal -->

    <!-- Edit Department Modal -->
    <div id="edit_department" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Department</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editDepartmentForm" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" id="e_id" value="">
                        <div class="form-group">
                            <label>Department Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="department_edit" name="department"
                                value="">
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Department Modal -->

    <!-- Delete Department Modal -->
    <div class="modal custom-modal fade" id="delete_department" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Department</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <div class="modal-btn delete-action">
                        <form id="deleteDepartmentForm" method="POST">
                            @csrf
                            @method('DELETE')

                            <input type="hidden" name="id" class="e_id" value="">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit"
                                        class="btn btn-primary continue-btn submit-btn">Delete</button>
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
    <!-- /Delete Department Modal -->
</x-app-layout>

<script>
    $(document).on('click', '.edit_department', function() {
        var departmentId = $(this).data('department_id');
        var departmentName = $(this).data('department_name');

        $('#department_edit').val(departmentName).text();
        $('#e_id').val(departmentId).text();

        $('#editDepartmentForm').attr('action', `/departments/${departmentId}`);
    });

    $(document).on('click', '.delete_department', function() {
        var departmentId = $(this).data('department_id');

        $('#deleteDepartmentForm').attr('action', `/departments/${departmentId}`);
    });
</script>
