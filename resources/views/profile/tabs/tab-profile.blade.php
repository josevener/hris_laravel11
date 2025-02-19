<div id="emp_profile" class="pro-overview tab-pane fade show active">
    <div class="row">
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <div class="card-body">
                    <h3 class="card-title">Personal Informations <a href="#" class="edit-icon" data-toggle="modal"
                            data-target="#personal_info_modal"><i class="fa fa-pencil"></i></a></h3>
                    <ul class="personal-info">
                        <li>
                            <div class="title">Passport No.</div>
                            @if (!empty($user->passport_no))
                                <div class="text">{{ $user->passport_no }}</div>
                            @else
                                <div class="text">N/A</div>
                            @endif
                        </li>
                        <li>
                            <div class="title">Passport Exp Date.</div>
                            @if (!empty($user->passport_expiry_date))
                                <div class="text">{{ $user->passport_expiry_date }}</div>
                            @else
                                <div class="text">N/A</div>
                            @endif
                        </li>
                        <li>
                            <div class="title">Tel</div>
                            @if (!empty($user->tel))
                                <div class="text">{{ $user->tel }}</div>
                            @else
                                <div class="text">N/A</div>
                            @endif
                        </li>
                        <li>
                            <div class="title">Nationality</div>
                            @if (!empty($user->nationality))
                                <div class="text">{{ $user->nationality }}</div>
                            @else
                                <div class="text">N/A</div>
                            @endif
                        </li>
                        <li>
                            <div class="title">Religion</div>
                            @if (!empty($user->religion))
                                <div class="text">{{ $user->religion }}</div>
                            @else
                                <div class="text">N/A</div>
                            @endif
                        </li>
                        <li>
                            <div class="title">Marital status</div>
                            @if (!empty($user->marital_status))
                                <div class="text">{{ $user->marital_status }}</div>
                            @else
                                <div class="text">N/A</div>
                            @endif
                        </li>
                        <li>
                            <div class="title">Employment of spouse</div>
                            @if (!empty($user->employment_of_spouse))
                                <div class="text">{{ $user->employment_of_spouse }}</div>
                            @else
                                <div class="text">N/A</div>
                            @endif
                        </li>
                        <li>
                            <div class="title">No. of children</div>
                            @if ($user->children != null)
                                <div class="text">{{ $user->children }}</div>
                            @else
                                <div class="text">N/A</div>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <div class="card-body">
                    <h3 class="card-title">Emergency Contact <a href="#" class="edit-icon" data-toggle="modal"
                            data-target="#emergency_contact_modal"><i class="fa fa-pencil"></i></a></h3>
                    <h5 class="section-title">Primary</h5>
                    <ul class="personal-info">
                        <li>
                            <div class="title">Name</div>
                            @if (!empty($user->name_primary))
                                <div class="text">{{ $user->name_primary }}</div>
                            @else
                                <div class="text">N/A</div>
                            @endif
                        </li>
                        <li>
                            <div class="title">Relationship</div>
                            @if (!empty($user->relationship_primary))
                                <div class="text">{{ $user->relationship_primary }}</div>
                            @else
                                <div class="text">N/A</div>
                            @endif
                        </li>
                        <li>
                            <div class="title">Phone </div>
                            @if (!empty($user->phone_primary) && !empty($user->phone_2_primary))
                                <div class="text">{{ $user->phone_primary }},{{ $user->phone_2_primary }}</div>
                            @else
                                <div class="text">N/A</div>
                            @endif
                        </li>
                    </ul>
                    <hr>
                    <h5 class="section-title">Secondary</h5>
                    <ul class="personal-info">
                        <li>
                            <div class="title">Name</div>
                            @if (!empty($user->name_secondary))
                                <div class="text">{{ $user->name_secondary }}</div>
                            @else
                                <div class="text">N/A</div>
                            @endif
                        </li>
                        <li>
                            <div class="title">Relationship</div>
                            @if (!empty($user->relationship_secondary))
                                <div class="text">{{ $user->relationship_secondary }}</div>
                            @else
                                <div class="text">N/A</div>
                            @endif
                        </li>
                        <li>
                            <div class="title">Phone </div>
                            @if (!empty($user->phone_secondary) && !empty($user->phone_2_secondary))
                                <div class="text">{{ $user->phone_secondary }},{{ $user->phone_2_secondary }}</div>
                            @else
                                <div class="text">N/A</div>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <div class="card-body">
                    <h3 class="card-title">Bank information
                        <a href="#" class="edit-icon" data-toggle="modal" data-target="#bank_information_modal">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </h3>
                    <ul class="personal-info">
                        <li>
                            <div class="title">Bank name</div>
                            <div class="text">ICICI Bank</div>
                        </li>
                        <li>
                            <div class="title">Bank account No.</div>
                            <div class="text">159843014641</div>
                        </li>
                        <li>
                            <div class="title">IFSC Code</div>
                            <div class="text">ICI24504</div>
                        </li>
                        <li>
                            <div class="title">PAN No</div>
                            <div class="text">TC000Y56</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <div class="card-body">
                    <h3 class="card-title">Family Informations <a href="#" class="edit-icon" data-toggle="modal"
                            data-target="#family_info_modal"><i class="fa fa-pencil"></i></a></h3>
                    <div class="table-responsive">
                        <table class="table table-nowrap">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Relationship</th>
                                    <th>Date of Birth</th>
                                    <th>Phone</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Leo</td>
                                    <td>Brother</td>
                                    <td>Feb 16th, 2019</td>
                                    <td>9876543210</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a aria-expanded="false" data-toggle="dropdown"
                                                class="action-icon dropdown-toggle" href="#"><i
                                                    class="material-icons">more_vert</i></a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a href="#" class="dropdown-item"><i
                                                        class="fa fa-pencil m-r-5"></i> Edit</a>
                                                <a href="#" class="dropdown-item"><i
                                                        class="fa fa-trash-o m-r-5"></i> Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <div class="card-body">
                    <h3 class="card-title">Education Informations <a href="#" class="edit-icon"
                            data-toggle="modal" data-target="#education_info"><i class="fa fa-pencil"></i></a></h3>
                    <div class="experience-box">
                        <ul class="experience-list">
                            <li>
                                <div class="experience-user">
                                    <div class="before-circle"></div>
                                </div>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <a href="#/" class="name">International College of Arts and Science
                                            (UG)</a>
                                        <div>Bsc Computer Science</div>
                                        <span class="time">2000 - 2003</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="experience-user">
                                    <div class="before-circle"></div>
                                </div>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <a href="#/" class="name">International College of Arts and Science
                                            (PG)</a>
                                        <div>Msc Computer Science</div>
                                        <span class="time">2000 - 2003</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex">
            <div class="card profile-box flex-fill">
                <div class="card-body">
                    <h3 class="card-title">Experience <a href="#" class="edit-icon" data-toggle="modal"
                            data-target="#experience_info"><i class="fa fa-pencil"></i></a></h3>
                    <div class="experience-box">
                        <ul class="experience-list">
                            <li>
                                <div class="experience-user">
                                    <div class="before-circle"></div>
                                </div>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <a href="#/" class="name">Web Designer at Zen Corporation</a>
                                        <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="experience-user">
                                    <div class="before-circle"></div>
                                </div>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <a href="#/" class="name">Web Designer at Ron-tech</a>
                                        <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="experience-user">
                                    <div class="before-circle"></div>
                                </div>
                                <div class="experience-content">
                                    <div class="timeline-content">
                                        <a href="#/" class="name">Web Designer at Dalt Technology</a>
                                        <span class="time">Jan 2013 - Present (5 years 2 months)</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
