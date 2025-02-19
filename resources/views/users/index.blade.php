<x-app-layout>
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">User Management</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">User</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_user">
                        <i class="fa fa-plus"></i>
                        Add User
                    </a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        {{-- {!! Flasher::render() !!} --}}

        <!-- Search Filter -->
        <div class="row filter-row">
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus">
                    <input type="text" class="form-control floating" id="user_name" name="user_name">
                    <label class="focus-label">User Name</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <select class="select floating" id="type_role">
                        <option selected disabled>-- Select Role Name --</option>
                    </select>
                    <label class="focus-label">Role Name</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <div class="form-group form-focus select-focus">
                    <select class="select floating" id="type_status">
                        <option selected disabled> --Select --</option>
                    </select>
                    <label class="focus-label">Status</label>
                </div>
            </div>
            <div class="col-sm-6 col-md-3">
                <button type="submit" class="btn btn-success btn-block btn_search"> Search </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table" id="userDataList" style="width: 100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Employee ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Joined Date</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp

                            @if (isset($users) && $users->isNotEmpty())
                                @foreach ($users as $user)
                                    <tr>
                                        <td hidden class="ids">{{ $user->id }}</td>
                                        <td class="id">{{ ++$count }}</td>
                                        <td class="id">{{ $user->employeeId }}</td>
                                        <td>
                                            <span hidden class="profile_image">{{ $user->profile_image }}</span>
                                            <h2 class="table-avatar">
                                                <a href="{{ route('profile.show', $user->employeeId ?? '') }}" class="profile_image">
                                                    <img class="avatar"
                                                        src="{{ asset($user->profile_image ?? 'assets/images/photo_defaults.jpg') }}"
                                                        alt="{{ $user->profile_image }}">
                                                </a>
                                                <a href="{{ route('profile.show', $user->employeeId ?? '') }}" class="name">{{ $user->name }}
                                                    </span>
                                                </a>
                                            </h2>
                                        </td>
                                        <td class="email">{{ $user->email }}</td>
                                        <td class="phone_number">{{ $user->phone_number }}</td>
                                        <td>{{ $user->created_at->format('F d, Y') }}</td>
                                        <td>
                                            @if ($user->role_name == 'Admin')
                                                <span
                                                    class="badge bg-inverse-danger role_name">{{ $user->role_name }}</span>
                                            @elseif ($user->role_name == 'Super Admin')
                                                <span
                                                    class="badge bg-inverse-warning role_name">{{ $user->role_name }}</span>
                                            @elseif ($user->role_name == 'Normal User')
                                                <span
                                                    class="badge bg-inverse-info role_name">{{ $user->role_name }}</span>
                                            @elseif ($user->role_name == 'Client')
                                                <span
                                                    class="badge bg-inverse-success role_name">{{ $user->role_name }}</span>
                                            @elseif ($user->role_name == 'Employee')
                                                <span
                                                    class="badge bg-inverse-dark role_name">{{ $user->role_name }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="dropdown action-label">
                                                @if ($user->status == 'Active')
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle"
                                                        href="#" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-success"></i>
                                                        <span class="statuss">{{ $user->status }}</span>
                                                    </a>
                                                @elseif ($user->status == 'Inactive')
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle"
                                                        href="#" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-info"></i>
                                                        <span class="statuss">{{ $user->status }}</span>
                                                    </a>
                                                @elseif ($user->status == 'Disable')
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle"
                                                        href="#" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-danger"></i>
                                                        <span class="statuss">{{ $user->status }}</span>
                                                    </a>
                                                @elseif ($user->status == '')
                                                    <a class="btn btn-white btn-sm btn-rounded dropdown-toggle"
                                                        href="#" data-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-dot-circle-o text-dark"></i>
                                                        <span class="statuss">N/A</span>
                                                    </a>
                                                @endif

                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-dot-circle-o text-success"></i> Active
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-dot-circle-o text-warning"></i> Inactive
                                                    </a>
                                                    <a class="dropdown-item" href="#">
                                                        <i class="fa fa-dot-circle-o text-danger"></i> Disable
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <div class="dropdown dropdown-action">
                                                <a href="#" class="action-icon dropdown-toggle"
                                                    data-toggle="dropdown" aria-expanded="false">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <button class="dropdown-item userUpdate" data-toggle="modal"
                                                        data-user_id="{{ $user->id }}"
                                                        data-profile_image="{{ $user->profile_image }}"
                                                        data-target="#edit_user">
                                                        <i class="fa fa-pencil m-r-5"></i>
                                                        Edit
                                                    </button>
                                                    <button class="dropdown-item userDelete" data-toggle="modal"
                                                        data-user_id="{{ $user->id }}"
                                                        data-profile_image="{{ $user->profile_image }}"
                                                        data-target="#delete_user">
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
                                    <td class="text-center" colspan="12">No users found.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Add User Modal -->
    <div id="add_user" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        id="" name="name" value="{{ old('name') }}"
                                        placeholder="Enter Name">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Emaill Address</label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email"
                                    id="email" name="email" value="{{ old('email') }}"
                                    placeholder="Enter Email">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Role Name</label>
                                <select class="select" name="role_name" id="role_name">
                                    <option selected disabled> -- Select role --</option>
                                    @foreach ($role_name as $role)
                                        <option value="{{ $role->role_type }}">{{ $role->role_type }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text"
                                        id="" name="phone_number" value="{{ old('phone_number') }}"
                                        placeholder="Enter Phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Status</label>
                                <select class="select" name="status" id="status">
                                    <option selected disabled> --Select status --</option>
                                    @foreach ($user_types as $status)
                                        <option value="{{ $status->type_name }}">{{ $status->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>Photo</label>
                                <input class="form-control" type="file" id="image" name="profile_image">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password"
                                        placeholder="Enter Password">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Repeat Password</label>
                                <input type="password" class="form-control" name="password_confirmation"
                                    placeholder="Choose Repeat Password">
                            </div>
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add User Modal -->

    <!-- Edit User Modal -->
    <div id="edit_user" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <br>
                <div class="modal-body">
                    <form id="editUserForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" id="e_user_id">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="form-control" type="text" name="name" id="e_name"
                                        value="{{ old('name', $user->name ?? '') }}" />
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Email</label>
                                <input class="form-control" type="text" name="email" id="e_email"
                                    value="{{ old('email', $user->email ?? '') }}" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Role Name</label>
                                <select class="select" name="role_name" id="e_role_name"
                                    value="{{ old('role_name', $user->role_name ?? '') }}">
                                    @foreach ($role_name as $role)
                                        <option value="{{ $role->role_type }}">{{ $role->role_type }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" type="text" id="e_phone_number"
                                        name="phone_number"
                                        value="{{ old('phone_number', $user->phone_number ?? '') }}"
                                        placeholder="Enter Phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Status</label>
                                <select class="select" name="status" id="e_status"
                                    value="{{ old('status', $user->status ?? '') }}">
                                    @foreach ($user_types as $status)
                                        <option value="{{ $status->type_name }}">{{ $status->type_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label>Photo</label>
                                <input class="form-control" type="file" id="image" name="profile_image">
                                <input type="hidden" name="profile_image" id="e_image" value="">
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                            </div>
                        </div>
                        <br>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Edit Salary Modal -->

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
                        <form id="deleteUserForm" method="POST">
                            @csrf
                            @method('DELETE')

                            <input type="hidden" name="id" class="user_id">
                            <input type="hidden" name="profile_image" id="profile_image">

                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary continue-btn deleteUserBtn w-100">
                                        Delete
                                    </button>
                                </div>
                                <div class="col-6">
                                    <a href="javascript:void(0);" data-dismiss="modal" class="btn btn-primary cancel-btn">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Delete User Modal -->

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script type="text/javascript">
        // $(document).ready(function() {
        //     const table = $('#userDataList').DataTable({
        //         lengthMenu: [
        //             [10, 25, 50, 100, 150],
        //             [10, 25, 50, 100, 150]
        //         ],
        //         buttons: ['pageLength'],
        //         pageLength: 10,
        //         order: [
        //             [5, 'desc']
        //         ],
        //         processing: true,
        //         serverSide: true,
        //         ordering: true,
        //         searching: true,
        //         ajax: {
        //             url: "#",
        //             data: function(data) {
        //                 data.user_name = $('#user_name').val() || null;
        //                 data.type_role = $('#type_role').val() || null;
        //                 data.type_status = $('#type_status').val() || null;
        //             }
        //         },
        //         columns: [
        //             {
        //                 data: 'no',
        //                 defaultContent: '-'
        //             },
        //             {
        //                 data: 'name',
        //                 defaultContent: '-'
        //             },
        //             {
        //                 data: 'user_id',
        //                 defaultContent: '-'
        //             },
        //             {
        //                 data: 'email',
        //                 defaultContent: '-'
        //             },
        //             {
        //                 data: 'phone_number',
        //                 defaultContent: '-'
        //             },
        //             {
        //                 data: 'created_at',
        //                 defaultContent: '-'
        //             },
        //             {
        //                 data: 'role_name',
        //                 defaultContent: '-'
        //             },
        //             {
        //                 data: 'status',
        //                 defaultContent: '-'
        //             },
        //             {
        //                 data: 'action',
        //                 defaultContent: '-'
        //             }
        //         ]
        //     });

        //     $('.btn_search').on('click', function() {
        //         table.draw();
        //     });
        // });

        $(document).ready(function() {

            $(document).on('click', '.userUpdate', function() {
                const _this = $(this).closest('tr');
                var userId = $(this).data('user_id');
                var profileImage = $(this).data('profile_image');

                $('#e_user_id').val(userId).text().trim();
                $('#e_name').val(_this.find('.name').text().trim());
                $('#e_email').val(_this.find('.email').text().trim());
                $('#e_role_name').val(_this.find('.role_name').text().trim()).change();
                $('#e_phone_number').val(_this.find('.phone_number').text().trim());
                $('#e_status').val(_this.find('.statuss').text().trim()).change();
                $('#e_image').val(profileImage);


                $('#editUserForm').attr('action', '/users/' + userId);
            });

            $(document).on('click', '.userDelete', function() {
                let userId = $(this).data('user_id');
                $('#deleteUserForm').attr('action', `/users/${userId}`);
            });

            $(document).on('click', '.deleteUserBtn', function() {
                $('#deleteUserForm').submit();
            });

        });
    </script>
</x-app-layout>
