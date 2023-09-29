@extends('layouts.app')

@section('content')

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="h3">User Setting</h4>
        <small class="text-muted float-end">User /<span class="text-muted float-end fw-bold mx-1"> Setting
            </span></small>
    </div>
    @include('layouts.flash')
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-pills flex-column flex-md-row mb-4">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="ti-xs ti ti-users me-1"></i>
                        Account</a>
                </li>
            </ul>
            <div class="card mb-4">
                <h5 class="card-header">Profile Details</h5>
                <!-- Account -->
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="../../assets/img/avatars/14.png" alt="user-avatar"
                            class="d-block w-px-100 h-px-100 rounded-circle" id="uploadedAvatar" />
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-3" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="ti ti-upload d-block d-sm-none"></i>
                                <input type="file" id="upload" class="account-file-input" hidden name="file"
                                    accept="image/png, image/jpeg" />
                            </label>
                            <div class="text-muted">Allowed JPG and PNG File. Max size of 800K</div>
                        </div>
                    </div>
                </div>
                <hr class="my-0" />
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Email</label>
                                <input class="form-control" type="email" id="email" name="email"
                                    value="{{ Auth::user()->email }}" disabled />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="lastName" class="form-label">Fullname</label>
                                <input class="form-control" type="text" name="name" id="name"
                                    value="{{ Auth::user()->name }}" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Phone Number</label>
                                <div class="input-group input-group-merge">
                                    <span class="input-group-text">ID (+62)</span>
                                    <input type="text" id="phoneNumber" name="phoneNumber" class="form-control"
                                        placeholder="821 190 090 02" />
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" name="address"
                                    placeholder="Address" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="state">State</label>
                                <select id="state" class="select2 form-select">
                                    <option value="">Select</option>
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Bandung">Bandung</option>
                                    <option value="Semarang">Semarang</option>
                                    <option value="Kalimantan">Kalimantan</option>
                                    <option value="Sekayu">Sekayu</option>
                                    <option value="Palembang">Palembang</option>
                                    <option value="Sumedang">Sumedang</option>
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="zipCode" class="form-label">Zip Code</label>
                                <input type="text" class="form-control" id="zipCode" name="zipCode" placeholder="231465"
                                    maxlength="6" />
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-label-secondary">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(function() {
    var dt_basic_table = $('.datatables-basic'),
        dt_complex_header_table = $('.table_user'),
        dt_row_grouping_table = $('.dt-row-grouping'),
        dt_multilingual_table = $('.dt-multilingual'),
        dt_basic;
    if (dt_complex_header_table.length) {
        var dt_complex = dt_complex_header_table.DataTable({
            ajax: assetsPath + 'json/table-datatable.json',
            columns: [{
                    data: 'full_name'
                },
                {
                    data: 'email'
                },
                {
                    data: 'city'
                },
                {
                    data: 'post'
                },
                {
                    data: 'salary'
                },
                {
                    data: 'status'
                },

            ],
            dom: '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6 d-flex justify-content-center justify-content-md-end"f>><"table-responsive"t><"row"<"col-sm-12 col-md-6"i><"col-sm-12 col-md-6"p>>',
            displayLength: 7,
            lengthMenu: [7, 10, 25, 50, 75, 100]
        });
    }
});
</script>
@endsection