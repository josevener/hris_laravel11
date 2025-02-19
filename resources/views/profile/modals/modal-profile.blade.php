<div id="profile_info" class="modal custom-modal fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Profile Information</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Profile Image Upload -->
                    <div class="text-center mb-3">
                        <div class="profile-img-wrap edit-img d-inline-block">
                            <img class="rounded-circle" width="100" height="100"
                                src="{{ asset($user->profile_image ?? 'assets/images/photo_defaults.jpg') }}"
                                alt="{{ $user->name }}">
                            <div class="fileupload btn btn-sm btn-primary mt-2">
                                <span class="btn-text">Edit</span>
                                <input class="upload" type="file" id="image" name="images">
                            </div>
                        </div>
                    </div>

                    <!-- Personal Information -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}">
                                <input type="hidden" name="user_id" value="{{ $user->employeeId }}">
                                <input type="hidden" name="email" value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Birth Date</label>
                                <input type="text" class="form-control datetimepicker" name="birth_date"
                                    value="{{ old('birth_date', $user->employee->birthdate) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Gender</label>
                                <select class="form-control select" name="gender">
                                    <option value="Male" {{ old('gender', $user->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ old('gender', $user->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Details -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="text" class="form-control" name="phone_number"
                                    value="{{ old('phone_number', $user->phone_number) }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pin Code</label>
                                <input type="text" class="form-control" name="pin_code"
                                    value="{{ old('pin_code', $user->pin_code) }}">
                            </div>
                        </div>
                    </div>

                    <!-- Address Information -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" class="form-control" name="address"
                                    value="{{ old('address', $user->address) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>State</label>
                                <input type="text" class="form-control" name="state"
                                    value="{{ old('state', $user->state) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Country</label>
                                <input type="text" class="form-control" name="country"
                                    value="{{ old('country', $user->country) }}">
                            </div>
                        </div>
                    </div>

                    <!-- Work Details -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Department <span class="text-danger">*</span></label>
                                <select class="form-control select" name="department">
                                    <option value="Web Development" {{ old('department', $user->department) == 'Web Development' ? 'selected' : '' }}>Web Development</option>
                                    <option value="IT Management" {{ old('department', $user->department) == 'IT Management' ? 'selected' : '' }}>IT Management</option>
                                    <option value="Marketing" {{ old('department', $user->department) == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Designation <span class="text-danger">*</span></label>
                                <select class="form-control select" name="designation">
                                    <option value="Web Designer" {{ old('designation', $user->designation) == 'Web Designer' ? 'selected' : '' }}>Web Designer</option>
                                    <option value="Web Developer" {{ old('designation', $user->designation) == 'Web Developer' ? 'selected' : '' }}>Web Developer</option>
                                    <option value="Android Developer" {{ old('designation', $user->designation) == 'Android Developer' ? 'selected' : '' }}>Android Developer</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Supervisor<span class="text-danger">*</span></label>
                                <select class="form-control select" name="reports_to">
                                    <option value="">Select Supervisor</option>
                                    {{-- @foreach ($supervisors as $supervisor)
                                        <option value="{{ $supervisor->name }}" {{ old('reports_to', $user->reports_to) == $supervisor->name ? 'selected' : '' }}>
                                            {{ $supervisor->name }}
                                        </option>
                                    @endforeach --}}
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="submit-section text-center">
                        <button type="submit" class="btn btn-primary px-4">Update Profile</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
