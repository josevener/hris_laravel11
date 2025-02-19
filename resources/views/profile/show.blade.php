<x-app-layout>
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-title">Profile</h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- /Page Header -->

        <div class="card mb-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="profile-view">
                            <div class="profile-img-wrap">
                                <div class="profile-img">
                                    <a href="#">
                                        <img class="user-profile" alt=""
                                            src="{{ asset($user->profile_image ?? 'assets/images/photo_defaults.jpg') }}"
                                            alt="{{ $user->name }}">
                                    </a>
                                </div>
                            </div>
                            <div class="profile-basic">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="profile-info-left">
                                            <h3 class="user-name m-t-0 mb-0">{{ $user->name }}</h3>
                                            <h6 class="text-muted"> {{ $user->employee->department->department }} |
                                                {{ $user->employee->designation->designation ?? '' }}</h6>
                                            <div class="staff-id">Employee ID: {{ $user->employeeId }}</div>
                                            <div class="small doj text-muted">Joined Date:
                                                {{ $user->employee->created_at->format('F d, Y') }}</div>
                                            <div class="staff-msg"><a class="btn btn-custom" href="chat.html">Send
                                                    Message</a></div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <ul class="personal-info">
                                            <li>
                                                <div class="title">Phone:</div>
                                                <div class="text">
                                                    @if (!empty($user->phone_number))
                                                        <a>{{ $user->phone_number }}</a>
                                                    @else
                                                        <a>N/A</a>
                                                    @endif
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">Email:</div>
                                                <div class="text">
                                                    @if (!empty($user->email))
                                                        <a>{{ $user->email }}</a>
                                                    @else
                                                        <a>N/A</a>
                                                    @endif
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">Birthday:</div>
                                                <div class="text">
                                                    @if (!empty($user->employee->birthdate))
                                                        <a>{{ $user->employee->birthdate }}</a>
                                                    @else
                                                        <a>N/A</a>
                                                    @endif
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">Address:</div>
                                                <div class="text">
                                                    @if (!empty($user->employee->address))
                                                        <a>{{ $user->employee->address }}</a>
                                                    @else
                                                        <a>N/A</a>
                                                    @endif
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">Gender:</div>
                                                <div class="text">
                                                    @if (!empty($user->employee->gender))
                                                        <a>{{ $user->employee->gender }}</a>
                                                    @else
                                                        <a>N/A</a>
                                                    @endif
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">Reports to:</div>
                                                <div class="text">
                                                    <div class="avatar-box">
                                                        <div class="avatar avatar-xs">
                                                            <img src="{{ asset($user->employee->user->profile_image ?? 'assets/images/photo_defaults.jpg') }}"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                    <a>{{ $user->employee->reports_to }}</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="pro-edit">
                                <a data-target="#profile_info" data-toggle="modal" class="edit-icon" href="#">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card tab-box">
            <div class="row user-tabs">
                <div class="col-lg-12 col-md-12 col-sm-12 line-tabs">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item"><a href="#emp_profile" data-toggle="tab"
                                class="nav-link active">Profile</a></li>
                        <li class="nav-item"><a href="#emp_projects" data-toggle="tab" class="nav-link">Projects</a>
                        </li>
                        @if ($user->role_name !== 'Admin' && $user->role_name !== 'Super Admin')
                            <li class="nav-item">
                                <a href="#bank_statutory" data-toggle="tab" class="nav-link">Bank & Statutory
                                    <small class="text-danger">(Admin Only) {{ $user->role_name }}</small>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <div class="tab-content">
            <!-- Profile Info Tab -->
            @include('profile.tabs.tab-profile')
            <!-- /Profile Info Tab -->

            <!-- Projects Tab -->
            @include('profile.tabs.tab-projects')
            <!-- /Projects Tab -->

            <!-- Bank Statutory Tab -->
            @include('profile.tabs.tab-bank')
            <!-- /Bank Statutory Tab -->
        </div>
    </div>
    <!-- /Page Content -->

    <!-- Profile Modal -->
    @include('profile.modals.modal-profile')
    <!-- /Profile Modal -->

    <!-- Personal Info Modal -->
    {{-- <div id="personal_info_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Personal Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('user/information/save') }}" method="POST">
                        @csrf
                        <input type="hidden" class="form-control" name="user_id" value="{{ $user->user_id }}" readonly>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Passport No</label>
                                    <input type="text" class="form-control @error('passport_no') is-invalid @enderror" name="passport_no" value="{{ $user->passport_no }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Passport Expiry Date</label>
                                    <div class="cal-icon">
                                        <input class="form-control datetimepicker @error('passport_expiry_date') is-invalid @enderror" type="text" name="passport_expiry_date" value="{{ $user->passport_expiry_date }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tel</label>
                                    <input class="form-control @error('tel') is-invalid @enderror" type="text" name="tel" value="{{ $user->tel }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Nationality <span class="text-danger">*</span></label>
                                    <input class="form-control @error('nationality') is-invalid @enderror" type="text" name="nationality" value="{{ $user->nationality }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Religion</label>
                                    <div class="form-group">
                                        <input class="form-control @error('religion') is-invalid @enderror" type="text" name="religion" value="{{ $user->religion }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Marital status <span class="text-danger">*</span></label>
                                    <select class="select form-control @error('marital_status') is-invalid @enderror" name="marital_status">
                                        <option value="{{ $user->marital_status }}" {{ ( $user->marital_status == $user->marital_status) ? 'selected' : '' }}> {{ $user->marital_status }} </option>
                                        <option value="Single">Single</option>
                                        <option value="Married">Married</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Employment of spouse</label>
                                    <input class="form-control @error('employment_of_spouse') is-invalid @enderror" type="text" name="employment_of_spouse" value="{{ $user->employment_of_spouse }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No. of children </label>
                                    <input class="form-control @error('children') is-invalid @enderror" type="text" name="children" value="{{ $user->children }}">
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
    <!-- /Personal Info Modal -->

    <!-- Bank information Modal -->
    {{-- <div id="bank_information_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bank Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        @csrf
                        <input type="hidden" class="form-control" name="user_id" value="{{ Session::get('user_id') }}" readonly>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bank name</label>
                                    <input type="text" class="form-control @error('bank_name') is-invalid @enderror" name="bank_name" value="{{ old('bank_name') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Bank account No</label>
                                    <input type="text" class="form-control @error('bank_account_no') is-invalid @enderror" name="bank_account_no" oninput="this.value = this.value.replace(/[^0-9.]/g, ''); this.value = this.value.replace(/(\..*)\./g, '$1');" value="{{ old('bank_account_no') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>IFSC Code</label>
                                    <input type="text" class="form-control @error('ifsc_code') is-invalid @enderror" name="ifsc_code" value="{{ old('ifsc_code') }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>PAN No</label>
                                    <input type="text" class="form-control @error('pan_no') is-invalid @enderror" name="pan_no" value="{{ old('pan_no') }}">
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
    <!-- /Bank information Modal -->

    <!-- Family Info Modal -->
    {{-- <div id="family_info_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Family Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-scroll">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Family Member <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Relationship <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date of birth <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Name <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Relationship <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Date of birth <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Phone <span class="text-danger">*</span></label>
                                                <input class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-more">
                                        <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- /Family Info Modal -->

    <!-- Emergency Contact Modal -->
    {{-- <div id="emergency_contact_modal" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Personal Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="validation" action="{{ route('user/profile/emergency/contact/save') }}" method="POST">
                        @csrf
                        <input type="text" class="form-control" name="user_id" value="{{ $user->user_id }}">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Primary Contact</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name <span class="text-danger">*</span></label>
                                            @if (!empty($user->name_primary))
                                            <input type="text" class="form-control" name="name_primary" value="{{ $user->name_primary }}">
                                            @else
                                            <input type="text" class="form-control" name="name_primary">
                                            @endif
                                        </li>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Relationship <span class="text-danger">*</span></label>
                                            @if (!empty($user->relationship_primary))
                                            <input type="text" class="form-control" name="relationship_primary" value="{{ $user->relationship_primary }}">
                                            @else
                                            <input type="text" class="form-control" name="relationship_primary">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone <span class="text-danger">*</span></label>
                                            @if (!empty($user->phone_primary))
                                            <input type="text" class="form-control" name="phone_primary" value="{{ $user->phone_primary }}">
                                            @else
                                            <input type="text" class="form-control" name="phone_primary">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone 2</label>
                                            @if (!empty($user->phone_2_primary))
                                            <input type="text" class="form-control" name="phone_2_primary" value="{{ $user->phone_2_primary }}">
                                            @else
                                            <input type="text" class="form-control" name="phone_2_primary">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Secondary Contact</h3>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Name <span class="text-danger">*</span></label>
                                            @if (!empty($user->name_secondary))
                                            <input type="text" class="form-control" name="name_secondary" value="{{ $user->name_secondary }}">
                                            @else
                                            <input type="text" class="form-control" name="name_secondary">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Relationship <span class="text-danger">*</span></label>
                                            @if (!empty($user->relationship_secondary))
                                            <input type="text" class="form-control" name="relationship_secondary" value="{{ $user->relationship_secondary }}">
                                            @else
                                            <input type="text" class="form-control" name="relationship_secondary">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone <span class="text-danger">*</span></label>
                                            @if (!empty($user->phone_secondary))
                                            <input type="text" class="form-control" name="phone_secondary" value="{{ $user->phone_secondary }}">
                                            @else
                                            <input type="text" class="form-control" name="phone_secondary">
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Phone 2</label>
                                            @if (!empty($user->phone_2_secondary))
                                            <input type="text" class="form-control" name="phone_2_secondary" value="{{ $user->phone_2_secondary }}">
                                            @else
                                            <input type="text" class="form-control" name="phone_2_secondary">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- /Emergency Contact Modal -->

    <!-- Education Modal -->
    {{-- <div id="education_info" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Education Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-scroll">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text" value="Oxford University" class="form-control floating">
                                                <label class="focus-label">Institution</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text" value="Computer Science" class="form-control floating">
                                                <label class="focus-label">Subject</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <div class="cal-icon">
                                                    <input type="text" value="01/06/2002" class="form-control floating datetimepicker">
                                                </div>
                                                <label class="focus-label">Starting Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <div class="cal-icon">
                                                    <input type="text" value="31/05/2006" class="form-control floating datetimepicker">
                                                </div>
                                                <label class="focus-label">Complete Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text" value="BE Computer Science" class="form-control floating">
                                                <label class="focus-label">Degree</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text" value="Grade A" class="form-control floating">
                                                <label class="focus-label">Grade</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Education Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text" value="Oxford University" class="form-control floating">
                                                <label class="focus-label">Institution</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text" value="Computer Science" class="form-control floating">
                                                <label class="focus-label">Subject</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <div class="cal-icon">
                                                    <input type="text" value="01/06/2002" class="form-control floating datetimepicker">
                                                </div>
                                                <label class="focus-label">Starting Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <div class="cal-icon">
                                                    <input type="text" value="31/05/2006" class="form-control floating datetimepicker">
                                                </div>
                                                <label class="focus-label">Complete Date</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text" value="BE Computer Science" class="form-control floating">
                                                <label class="focus-label">Degree</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus focused">
                                                <input type="text" value="Grade A" class="form-control floating">
                                                <label class="focus-label">Grade</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-more">
                                        <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- /Education Modal -->

    <!-- Experience Modal -->
    {{-- <div id="experience_info" class="modal custom-modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Experience Informations</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-scroll">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Experience Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="text" class="form-control floating" value="Digital Devlopment Inc">
                                                <label class="focus-label">Company Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="text" class="form-control floating" value="United States">
                                                <label class="focus-label">Location</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="text" class="form-control floating" value="Web Developer">
                                                <label class="focus-label">Job Position</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <div class="cal-icon">
                                                    <input type="text" class="form-control floating datetimepicker" value="01/07/2007">
                                                </div>
                                                <label class="focus-label">Period From</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <div class="cal-icon">
                                                    <input type="text" class="form-control floating datetimepicker" value="08/06/2018">
                                                </div>
                                                <label class="focus-label">Period To</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Experience Informations <a href="javascript:void(0);" class="delete-icon"><i class="fa fa-trash-o"></i></a></h3>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="text" class="form-control floating" value="Digital Devlopment Inc">
                                                <label class="focus-label">Company Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="text" class="form-control floating" value="United States">
                                                <label class="focus-label">Location</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <input type="text" class="form-control floating" value="Web Developer">
                                                <label class="focus-label">Job Position</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <div class="cal-icon">
                                                    <input type="text" class="form-control floating datetimepicker" value="01/07/2007">
                                                </div>
                                                <label class="focus-label">Period From</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group form-focus">
                                                <div class="cal-icon">
                                                    <input type="text" class="form-control floating datetimepicker" value="08/06/2018">
                                                </div>
                                                <label class="focus-label">Period To</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="add-more">
                                        <a href="javascript:void(0);"><i class="fa fa-plus-circle"></i> Add More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="submit-section">
                            <button class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- /Experience Modal -->
</x-app-layout>
