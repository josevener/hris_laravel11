<x-app-layout>
    <!-- Page Content -->
    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Holidays <span id="year"></span></h3>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Holidays</li>
                    </ul>
                </div>
                <div class="col-auto float-right ml-auto">
                    <a href="#" class="btn add-btn" data-toggle="modal" data-target="#add_holiday"><i
                            class="fa fa-plus"></i> Add Holiday</a>
                </div>
            </div>
        </div>
        <!-- /Page Header -->

        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-striped custom-table datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Title </th>
                                <th>Holiday Date</th>
                                <th>Type</th>
                                <th>Day</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $count = 0;
                            @endphp

                            @foreach ($holidays as $holiday)
                                @php
                                    $isPastHoliday = $currentDate > $holiday->date_holiday;
                                    $rowClass = $isPastHoliday ? 'holiday-completed' : 'holiday-upcoming';
                                @endphp

                                <tr class="{{ $rowClass }}">
                                    <td>{{ ++$count }}</td>
                                    <td class="holidayName">{{ $holiday->name_holiday }}</td>
                                    <td hidden class="holidayDate">{{ $holiday->date_holiday }}</td>
                                    <td>{{ date('F d, Y', strtotime($holiday->date_holiday)) }}</td>
                                    <td class="holidayType">{{ $holiday->type_holiday }}</td>
                                    <td>{{ date('l', strtotime($holiday->date_holiday)) }}</td>
                                    <td class="text-right">
                                        <div class="dropdown dropdown-action">
                                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="material-icons">more_vert</i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                @if ($isPastHoliday)
                                                    <button class="dropdown-item cursor-pointer" disabled>
                                                        <i class="fa fa-pencil m-r-5"></i> Edit
                                                    </button>
                                                @else
                                                    <a class="dropdown-item cursor-pointer editHoliday" href="#"
                                                        data-toggle="modal" data-holiday_id="{{ $holiday->id }}"
                                                        data-name_holiday="{{ $holiday->name_holiday }}"
                                                        data-date_holiday="{{ $holiday->date_holiday }}"
                                                        data-type_holiday="{{ $holiday->type_holiday }}"
                                                        data-target="#edit_holiday">
                                                        <i class="fa fa-pencil m-r-5"></i> Edit
                                                    </a>
                                                @endif
                                                <button class="dropdown-item cursor-pointer deleteHoliday"
                                                    data-toggle="modal" data-holiday_id="{{ $holiday->id }}"
                                                    data-target="#deleteHoliday">
                                                    <i class="fa fa-trash-o m-r-5"></i> Delete
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
    <!-- Add Holiday Modal -->
    <div class="modal custom-modal fade" id="add_holiday" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Holiday</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('holidays.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Holiday Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="nameHoliday" name="name_holiday">
                        </div>
                        <div class="form-group">
                            <label>Holiday Date <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input class="form-control datetimepicker" type="text" id="holidayDate"
                                    name="date_holiday">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Type <span class="text-danger">*</span></label>
                            <select class="form-control" id="typeHoliday" name="type_holiday">
                                <option value="">Select Type</option>
                                <option value="Regular">Regular</option>
                                <option value="Special">Special</option>
                            </select>
                        </div>
                        <div class="submit-section">
                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /Add Holiday Modal -->

    <!-- Edit Holiday Modal -->
    <div class="modal custom-modal fade" id="edit_holiday" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Holiday</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editHolidayForm" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="id" id="e_id" value="">
                        <div class="form-group">
                            <label>Holiday Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="e_name_holiday" name="name_holiday"
                                value="">
                        </div>
                        <div class="form-group">
                            <label>Holiday Date <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" id="e_date_holiday"
                                    name="date_holiday" value="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Type <span class="text-danger">*</span></label>
                            <select class="form-control" id="e_type_holiday" name="type_holiday">
                                <option value="">Select Type</option>
                                <option value="Regular">Regular</option>
                                <option value="Special">Special</option>
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
    <!-- /Edit Holiday Modal -->

    <!-- Delete Holiday Modal -->
    <div class="modal custom-modal fade" id="deleteHoliday" role="dialog">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-header">
                        <h3>Delete Holiday</h3>
                        <p>Are you sure want to delete?</p>
                    </div>
                    <form id="deleteHolidayForm" method="POST">
                        @csrf
                        @method('DELETE')

                        <input type="hidden" name="id" class="id">
                        <div class="modal-btn delete-action">
                            <div class="row">
                                <div class="col-6">
                                    <button type="submit" class="btn btn-primary continue-btn submit-btn">
                                        Delete
                                    </button>
                                </div>
                                <div class="col-6">
                                    <a href="#" data-dismiss="modal" class="btn btn-primary cancel-btn">
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
    <!-- /Delete Holiday Modal -->

</x-app-layout>


<script>
    $(document).ready(function() {

        $(document).on('click', '.deleteHoliday', function() {
            var holiday_id = $(this).data('holiday_id');

            $('#deleteHolidayForm').attr('action', `/holidays/${holiday_id}`);
        });


        $(document).on('click', '.editHoliday', function() {
            var holiday_id = $(this).data('holiday_id');
            var name_holiday = $(this).data('name_holiday');
            var date_holiday = $(this).data('date_holiday');
            var type_holiday = $(this).data('type_holiday');

            $('#e_id').val(holiday_id).text();
            $('#e_name_holiday').val(name_holiday).text();
            $('#e_date_holiday').val(date_holiday).text();
            $('#e_type_holiday').val(type_holiday).text();

            $('#editHolidayForm').attr('action', `/holidays/${holiday_id}`);

        });
    });
</script>
