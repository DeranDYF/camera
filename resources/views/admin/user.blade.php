@extends('layouts.app')

@section('content')

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="h3">User</h4>
        <small class="text-muted float-end">Data Master /<span class="text-muted float-end fw-bold mx-1"> User
            </span></small>
    </div>
    @include('layouts.flash')
    <div class="card">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-header">List User</h5>
            <button type="button" class="btn bts-sm btn-label-primary mx-3" data-bs-toggle="modal"
                data-bs-target="#modalAddUser">Add User
            </button>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Email</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                @php $no = 1 @endphp
                @foreach($users as $tm)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $tm->name }}</td>
                    <td>{{ $tm->role->name }}</td>
                    <td>{{ $tm->email }}</td>
                    <td class="text-center">
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">

                                <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#modalEditUser{{ $tm->id }}">
                                    Edit
                                </button>

                                <button type="button" class="dropdown-item btn-label-danger"
                                    id="confirm-text{{ $tm->id }}">Delete</button>

                            </div>
                        </div>
                    </td>
                </tr>
                <script>
                /**
                 * Sweet Alerts
                 */

                'use strict';

                (function() {
                    const basicAlert = document.querySelector('#basic-alert'),
                        ajaxRequest = document.querySelector('#ajax-request'),
                        confirmText = document.querySelector('#confirm-text{{ $tm->id }}'),
                        confirmColor = document.querySelector('#confirm-color');


                    // Alert With Functional Confirm Button
                    if (confirmText) {
                        confirmText.onclick = function() {
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "Delete User Named {{ $tm->name }}",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonText: 'Yes, delete it!',
                                customClass: {
                                    confirmButton: 'btn btn-label-danger me-3',
                                    cancelButton: 'btn btn-label-secondary'
                                },
                                buttonsStyling: false
                            }).then(function(result) {
                                if (result.value) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted!',
                                        text: 'User has been deleted.',
                                        showConfirmButton: false,
                                        timer: 1500,
                                        customClass: {
                                            confirmButton: 'btn btn-success'
                                        }
                                    }).then(function() {
                                        window.location.href =
                                            "{{ route('deleteuser', $tm->id) }}";
                                    });
                                }
                            });
                        };
                    }
                })();
                </script>
                <!-- Modal Edit User -->
                <div class="modal fade" id="modalEditUser{{ $tm->id }}" tabindex="2" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="add">
                        <div class="modal-content">
                            <form method="POST" action="{{ route('edituser',[$tm->id]) }}">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalCenterTitle">Edit User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col mb-3">
                                            <label for="fullname" class="form-label">Fullname</label>
                                            <input type="text" name="name" id="name" class="form-control mb-3"
                                                value="{{ $tm->name }}" placeholder="Enter Fullname" />
                                            <label for="email" class="form-label">Email</label>
                                            <input type="text" name="email" id="email" class="form-control"
                                                value="{{ $tm->email }}" />
                                        </div>

                                    </div>
                                    <div class="row g-2">
                                        <div class="col mb-0">
                                            <label for="role" class="form-label">Role</label>
                                            <select id="select2" class="select2 form-select" name="role"
                                                data-allow-clear="true">
                                                @foreach ($role as $rl)
                                                @if ($rl->id == $tm->id_role)
                                                <option selected value="{{ $rl->id }}">{{ $rl->name }}</option>
                                                @else
                                                <option value="{{ $rl->id }}">{{ $rl->name }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                    <button type="submit" class="btn btn-primary" id="editUser">Edit User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- End Modal User -->
                @endforeach
            </table>
        </div>
    </div>
</div>
<!-- Modal Add User -->
<div class="modal fade" id="modalAddUser" tabindex="2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="add">
        <div class="modal-content">
            <form method="POST" action="{{ route('adduser') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Add New User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="fullname" class="form-label">Fullname</label>
                            <input type="text" name="name" id="name" class="form-control mb-3"
                                placeholder="Enter Fullname" />
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" />
                        </div>

                    </div>
                    <div class="row g-2 mb-3">
                        <div class="col mb-0">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Enter Password" />
                        </div>
                        <div class="col mb-0">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control"
                                placeholder="Enter Confirm Password" />
                        </div>
                    </div>
                    <div class="row g-2">
                        <div class="col mb-0">
                            <label for="role" class="form-label">Role</label>
                            <select id="select2" class="select2 form-select" name="role" data-allow-clear="true">
                                @foreach ($role as $rl)
                                <option value="{{ $rl->id }}">{{ $rl->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary" id="addUser">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal User -->
@endsection