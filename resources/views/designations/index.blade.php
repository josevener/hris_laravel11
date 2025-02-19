<x-app-layout>
    <!-- Page Content -->
    <div class="content container-fluid">

        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Designations</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                        <li class="breadcrumb-item active">Designations</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_designation"><i
                            class="fa fa-plus"></i> Add Designation</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table mb-0 datatable">
                        <thead>
                            <tr>
                                <th style="width: 30px;">#</th>
                                <th>Designation </th>
                                <th>Department </th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp

                            @if (isset($designations) && $designations->isNotEmpty())
                                @foreach ($designations as $designation)
                                    <tr>
                                        <td>{{ ++$count }}</td>
                                        <td>{{ $designation->designation }}</td>
                                        <td>{{ $designation->department->department }}</td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-toggle="dropdown" aria-expanded="false"><i
                                                        class="material-icons">more_vert</i></a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item editDesignation" href="#"
                                                        data-toggle="modal" data-designation_id="{{ $designation->id }}"
                                                        data-designation="{{ $designation->designation }}"
                                                        data-department_id="{{ $designation->department->id }}"
                                                        data-target="#edit_designation">
                                                        <i class="fa fa-pencil m-r-5"></i>
                                                        Edit
                                                    </a>
                                                    <button class="dropdown-item deleteDesignation" data-toggle="modal"
                                                        data-designation_id="{{ $designation->id }}"
                                                        data-target="#delete_designation">
                                                        <i class="fa fa-trash-o m-r-5"></i>
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center">No Designations Found</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Add Designation Modal -->
    <div id="add_designation" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Designation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('designations.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Designation Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="designation" name="designation">
                        </div>
                        <div class="form-group">
                            <label>Department <span class="text-danger">*</span></label>
                            <select class="select" id="department" name="department_id">
                                <option>Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->department }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Designation Modal -->

    <!-- Edit Designation Modal -->
    <div id="edit_designation" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Designation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editDesignationForm" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <input type="hidden" name="id" id="id">
                            <label>Designation Name <span class="text-danger">*</span></label>
                            <input class="form-control" name="designation" id="designation_name" type="text">
                        </div>
                        <div class="form-group">
                            <label>Department <span class="text-danger">*</span></label>
                            <select class="select" name="department_id" id="department_id">
                                <option>Select Department</option>
                                @foreach ($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->department }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Designation Modal -->

    <!-- Delete Designation Modal -->
    <div class="modal custom-modal fade" id="delete_designation" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Designation</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <form id="deleteDesignationForm" method="POST">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="id" id="id">
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary continue-btn submit-btn">
                                        Delete
                                    </button>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal"
                                        class="btn btn-primary cancel-btn">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete Designation Modal -->
</x-app-layout>


<script>
    $(document).ready(function() {

        $(document).on('click', '.deleteDesignation', function() {
            var designation_id = $(this).data('designation_id');

            $('#deleteDesignationForm').attr('action', `/designations/${designation_id}`);
        });

        $(document).on('click', '.editDesignation', function() {
            var designation_id = $(this).data('designation_id');
            var designation = $(this).data('designation');
            var department_id = $(this).data('department_id');

            $('#id').val(designation_id).text();
            $('#designation_name').val(designation).text();
            $('#department_id').val(department_id).change();

            console.log("ID: " + designation_id);
            console.log("Designation: " + designation);
            console.log("Department: " + department_id);

            $('#editDesignationForm').attr('action', `/designations/${designation_id}`);
        });

    });
</script>
