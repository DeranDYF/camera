@extends('layouts.app')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <h4 class="h3">Dashboard</h4>
        <small class="text-muted float-end"><span class="text-muted float-end fw-bold mx-1"> Dashboard
            </span></small>
    </div>
    <div class="row">
        <style>
        .carousel {
            border-radius: 10px;
            overflow: hidden;
        }

        .carousel-item {
            height: 400px;
            border-radius: 10px;

        }

        .carousel-item img {
            width: auto;
            height: auto;
        }
        </style>
        <!-- Earning Reports -->
        <div class="col-12 mb-4">
            @include('layouts.flash')
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="my-2">Carousel</h5>

            </div>
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <!-- <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li> -->
                    @php $no = 0 @endphp
                    @if ($carousel == NULL)
                    <li data-bs-target="#carouselExample" class="active" data-bs-slide-to="0"></li>
                    @else
                    @foreach($carousel as $cr)
                    @if ($no == 0)
                    <li data-bs-target="#carouselExample" class="active" data-bs-slide-to="{{ $no++ }}"></li>
                    @else
                    <li data-bs-target="#carouselExample" data-bs-slide-to="{{ $no++ }}"></li>
                    @endif

                    @endforeach
                    @endif
                </ol>
                <div class="carousel-inner">
                    @php $no = 0 @endphp
                    @if ($carousel -> isEmpty())
                    <div class="carousel-item active">
                        <img class="d-block" src="../../assets/img/backgrounds/1.jpg" alt="Slide 0" />
                        <div class="carousel-caption d-none d-md-block">
                            <h4>No Title Data</h4>
                            <p>No Descriptions Data</p>
                        </div>
                    </div>
                    @else
                    @foreach($carousel as $cr)
                    @if ($no == 0)
                    <div class="carousel-item active">
                        <img class="d-block" src="../../doc/{{ $cr->img }}" alt="Slide {{ $no++ }}" />
                        <div class="carousel-caption d-none d-md-block">
                            <!-- <h4>{{ $cr->title }}</h4>
                            <p>{{ $cr->descriptions }}</p> -->
                        </div>
                    </div>
                    @else
                    <div class="carousel-item">
                        <img class="d-block" src="../../doc/{{ $cr->img }}" alt="Slide {{ $no++ }}" />
                        <div class="carousel-caption d-none d-md-block">
                            <!-- <h4>{{ $cr->title }}</h4>
                            <p>{{ $cr->descriptions }}</p> -->
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @endif
                </div>

                <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
        </div>
    </div>
    @if (Auth::user()->role->name == 'admin')
    <div class="row">
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="card-header">List Carousel</h5>
                        <button type="button" class="btn bts-sm btn-label-primary mx-3" data-bs-toggle="modal"
                            data-bs-target="#modalAddCarousel">Add Carousel
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card-datatable text-nowrap">
                        <table class="datatables-carousel table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            @php $no = 1 @endphp
                            @foreach($carousel as $cr)
                            <tr>
                                <td>{{ $no++}}</td>
                                <td>{{ $cr->title }}</td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#modalEditCarousel{{ $cr->id }}">
                                            <span class="ti ti-edit ti-flashing-hover"></span>
                                        </button>
                                        <button type="button" class="btn btn-icon btn-danger"
                                            id="confirm-text{{ $cr->id }}"><span
                                                class="ti ti-trash ti-flashing-hover"></span></button>
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
                                    confirmText = document.querySelector('#confirm-text{{ $cr->id }}'),
                                    confirmColor = document.querySelector('#confirm-color');


                                // Alert With Functional Confirm Button
                                if (confirmText) {
                                    confirmText.onclick = function() {
                                        Swal.fire({
                                            title: 'Are you sure?',
                                            text: "Delete Carousel",
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
                                                    text: 'Carousel has been deleted.',
                                                    showConfirmButton: false,
                                                    timer: 1500,
                                                    customClass: {
                                                        confirmButton: 'btn btn-success'
                                                    }
                                                }).then(function() {
                                                    window.location.href =
                                                        "{{ route('deletecarousel', $cr->id) }}";
                                                });
                                            }
                                        });
                                    };
                                }
                            })();
                            </script>
                            <!-- Modal Edit User -->
                            <div class="modal fade" id="modalEditCarousel{{ $cr->id }}" tabindex="2" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="add">
                                    <div class="modal-content">
                                        <form method="POST" action="{{ route('editcarousel',[$cr->id]) }}">
                                            @csrf
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Edit Carousel</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="title" class="form-label">Title</label>
                                                        <input type="text" name="title" id="title"
                                                            class="form-control mb-3" value="{{ $cr->title }}"
                                                            placeholder="Enter Fullname" />
                                                        <label for="email" class="form-label">Descriptions</label>
                                                        <input type="text" name="descriptions" id="descriptions"
                                                            class="form-control mb-3" value="{{ $cr->descriptions }}" />
                                                        <label for="upload" class="form-label">Upload</label>
                                                        <input type="file" class="form-control" id="imgtest"
                                                            name="imgtest">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-label-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary" id="editCarousel">Edit
                                                    Carousel</button>
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
        </div>

    </div>
    @endif
</div>


<!-- Modal Add Carousel -->
<div class="modal fade" id="modalAddCarousel" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="add">
        <div class="modal-content">
            <!-- <form method="POST" action="">
                @csrf -->
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">Add New Carousel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col mb-3">
                        <form enctype="multipart/form-data" action="{{ route('addcarousel') }}" method="POST">
                            <!-- Tambahkan method POST -->
                            @csrf
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control mb-3"
                                placeholder="Enter Title" />
                            <label for="descriptions" class="form-label">Descriptions</label>
                            <input type="text" name="descriptions" id="descriptions" class="form-control mb-3"
                                placeholder="Enter Descriptions" />
                            <label for="descriptions" class="form-label">Upload Foto</label>
                            <input type="file" class="form-control" id="img" name="img">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                    Close
                </button>
                <button type="submit" class="btn btn-primary" id="addCarousel">Add Carousel</button>
                </form>
            </div>
            <!-- </form> -->
        </div>
    </div>
</div>

<!-- End Modal Carousel -->

<!-- Modal Edit User -->
<div class="modal fade" id="bs-target" tabindex="2" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="add">
        <div class="modal-content">
            <form method="POST" action="">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCenterTitle">Edit Carousel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col mb-3">
                            <label for="title" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control mb-3" value=""
                                placeholder="Enter Fullname" />
                            <label for="email" class="form-label">Descriptions</label>
                            <input type="text" name="descriptions" id="descriptions" class="form-control mb-3"
                                value="" />
                            <label for="upload" class="form-label">Upload</label>
                            <input type="file" class="form-control" id="imgtest" name="imgtest">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary" id="editCarousel">Edit
                        Carousel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal User -->

@endsection