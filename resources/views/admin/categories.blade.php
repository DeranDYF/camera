@extends('layouts.app')

@section('content')
<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="h3">Category</h4>
        <small class="text-muted float-end"><span class="text-muted float-end fw-bold mx-1"> Category
            </span></small>
    </div>
    <div class="col-12 mb-4">
        <h6 class="text-muted mt-3">Carousel Category</h6>

        <div class="swiper" id="swiper-3d-coverflow-effect">
            <div class="swiper-wrapper">
                @php $no = 1 @endphp
                @if ($category -> isEmpty())
                <div class="swiper-slide"
                    style="background-image: url(../../assets/img/elements/15.jpg); border-radius: 10px;">
                    No Data
                </div>
                @else
                @foreach($category as $ct)
                <div class="swiper-slide"
                    style="background-image: url(../../doc/category/{{ $ct->img }}); border-radius: 10px;"
                    alt="{{ $ct->img }}">
                    {{ ucfirst($ct->name) }}
                </div>
                @endforeach
                @endif
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    @include('layouts.flash')
    <div class="card mt-4">
        <div class="d-flex justify-content-between align-items-center">
            <h5 class="card-header">List Category</h5>
            <button type="button" class="btn bts-sm btn-label-primary mx-3" data-bs-toggle="modal"
                data-bs-target="#modalAddCategory">Add Category
            </button>
        </div>
        <div class="card-body">
            <div class="mx-2 mb-2">
                <div class="table-responsive text-nowrap mb-2">
                    <table class="datatables-categories table ">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Descriptions</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        @php $no = 1 @endphp
                        @foreach($category as $ct)
                        <tr>
                            <td>{{ $no++}}</td>
                            <td>{{ $ct->name }}</td>
                            <td>{{ $ct->descriptions }}</td>
                            <td class="text-center">
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">

                                        <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#modalEditCategory{{ $ct->id }}">
                                            Edit
                                        </button>

                                        <button type="button" class="dropdown-item btn-label-danger"
                                            id="confirm-text{{ $ct->id }}">Delete</button>

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
                                confirmText = document.querySelector('#confirm-text{{ $ct->id }}'),
                                confirmColor = document.querySelector('#confirm-color');


                            // Alert With Functional Confirm Button
                            if (confirmText) {
                                confirmText.onclick = function() {
                                    Swal.fire({
                                        title: 'Are you sure?',
                                        text: "Delete Category Named {{ $ct->name }}",
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
                                                text: 'Category has been deleted.',
                                                showConfirmButton: false,
                                                timer: 1500,
                                                customClass: {
                                                    confirmButton: 'btn btn-success'
                                                }
                                            }).then(function() {
                                                window.location.href =
                                                    "{{ route('deletecategory', $ct->id) }}";
                                            });
                                        }
                                    });
                                };
                            }
                        })();
                        </script>
                        <!-- Modal Edit Category -->
                        <div class="modal fade" id="modalEditCategory{{ $ct->id }}" tabindex="2" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="add">
                                <div class="modal-content">
                                    <form method="POST" action="{{ route('editcategory',[$ct->id]) }}">
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
                                                        value="{{ $ct->name }}" placeholder="Enter Fullname" />
                                                    <label for="descriptions" class="form-label">Email</label>
                                                    <input type="text" name="descriptions" id="descriptions"
                                                        class="form-control" value="{{ $ct->descriptions }}" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-label-secondary"
                                                data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary" id="editCategory">Edit
                                                Category</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal Category -->
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal Add Category -->
<div class="modal fade" id="modalAddCategory" tabindex="2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="add">
        <div class="modal-content">
            <form enctype="multipart/form-data" action="{{ route('addcategory') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Add New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control mb-3"
                                placeholder="Enter Category Name" />
                            <label for="descriptions" class="form-label">Descriptions</label>
                            <input type="text" name="descriptions" id="descriptions" class="form-control mb-3"
                                placeholder="Enter Descriptions" />
                            <label for="upload" class="form-label">Upload Image</label>
                            <input type="file" class="form-control" id="img" name="img">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary" id="addCategory">Add Category</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal Category -->
@endsection