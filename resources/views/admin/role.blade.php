@extends('layouts.app')

@section('content')

<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="h3">Role</h4>
        <small class="text-muted float-end">Data Master /<span class="text-muted float-end fw-bold mx-1"> Role
            </span></small>
    </div>
    @include('layouts.flash')
    <div class="card">

        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-header">List Role</h5>
            <button type="button" class="btn bts-sm btn-label-primary mx-4" data-bs-toggle="modal"
                data-bs-target="#modalAddRole">Add Role
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive text-nowrap">
                <table class="table datatables-role">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    @php $no = 1 @endphp
                    @foreach($role as $rl)
                    <tr>
                        <td>{{ $no++}}</td>
                        <td>{{ $rl->name }}</td>
                        <td>{{ $rl->descriptions }}</td>
                        <td class="text-center">
                            <div class="dropdown">
                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                    data-bs-toggle="dropdown">
                                    <i class="ti ti-dots-vertical"></i>
                                </button>
                                <div class="dropdown-menu">

                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#modalEditRole{{ $rl->id }}">
                                        Edit
                                    </button>
                                    <button type="button" class="dropdown-item btn-label-danger"
                                        id="confirm-text{{ $rl->id }}">Delete</button>
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
                            confirmText = document.querySelector('#confirm-text{{ $rl->id }}'),
                            confirmColor = document.querySelector('#confirm-color');


                        // Alert With Functional Confirm Button
                        if (confirmText) {
                            confirmText.onclick = function() {
                                Swal.fire({
                                    title: 'Are you sure?',
                                    text: "Delete Role Named {{ $rl->name }}",
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
                                            text: 'Role has been deleted.',
                                            showConfirmButton: false,
                                            timer: 1500,
                                            customClass: {
                                                confirmButton: 'btn btn-success'
                                            }
                                        }).then(function() {
                                            window.location.href =
                                                "{{ route('deleterole', $rl->id) }}";
                                        });
                                    }
                                });
                            };
                        }
                    })();
                    </script>
                    <!-- Modal Edit Role -->
                    <div class="modal fade" id="modalEditRole{{ $rl->id }}" tabindex="2" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="add">
                            <div class="modal-content">
                                <form method="POST" action="{{ route('editrole',[$rl->id]) }}">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Edit Role</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="name" class="form-label">Name</label>
                                                <input type="text" name="name" id="name" class="form-control mb-3"
                                                    value="{{ $rl->name }}" />
                                                <label for="descriptions" class="form-label">Descriptions</label>
                                                <input type="text" name="descriptions" id="descriptions"
                                                    class="form-control" value="{{ $rl->descriptions }}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-primary" id="editRole">Edit Role</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal Role -->
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add Role -->
<div class="modal fade" id="modalAddRole" tabindex="2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="add">
        <div class="modal-content">
            <form method="POST" action="{{ route('addrole') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Add New Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control mb-3"
                                placeholder="Enter Role Name" />
                            <label for="descriptions" class="form-label">Descriptions</label>
                            <input type="text" name="descriptions" id="descriptions" class="form-control"
                                placeholder="Enter Descriptions" />
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary" id="addRole">Add Role</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Role -->
@endsection                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   