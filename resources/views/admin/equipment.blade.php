@extends('layouts.app')
@section('content')
<div class="card-body">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="h3">Equipment</h4>
        <small class="text-muted float-end"><span class="text-muted float-end fw-bold mx-1"> Equipment
            </span></small>
    </div>
    <div class="col-12 mb-4">
        <h6 class="text-muted mt-3">Carousel Equipment</h6>
        <div class="card" style="border-radius: 10px;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="swiper" id="swiper-with-arrows" style="height: 450px; border-radius: 10px;">
                            <div class="swiper-wrapper">
                                @php $no = 1 @endphp
                                @if($img -> isEmpty())
                                <div class="swiper-slide"
                                    style="background-image: url(../../assets/img/elements/1.jpg)">
                                </div>
                                @else
                                @foreach ($img as $im)
                                @if ($im->id_equipment == $equipment_sample->id)
                                <div class="swiper-slide"
                                    style="background-image: url(../../doc/product/{{ $im->img }})">
                                </div>
                                @else
                                <div class="swiper-slide"
                                    style="background-image: url(../../assets/img/elements/{{ $no++ }})">
                                </div>
                                @endif
                                @endforeach
                                @endif
                            </div>
                            <div class="swiper-button-next swiper-button-white custom-icon"></div>
                            <div class="swiper-button-prev swiper-button-white custom-icon"></div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <span class="text-muted"><svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-star-filled" width="20" height="20"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                    stroke-width="0" fill="currentColor"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-filled"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                    stroke-width="0" fill="currentColor"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-filled"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                    stroke-width="0" fill="currentColor"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-filled"
                                width="20" height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M8.243 7.34l-6.38 .925l-.113 .023a1 1 0 0 0 -.44 1.684l4.622 4.499l-1.09 6.355l-.013 .11a1 1 0 0 0 1.464 .944l5.706 -3l5.693 3l.1 .046a1 1 0 0 0 1.352 -1.1l-1.091 -6.355l4.624 -4.5l.078 -.085a1 1 0 0 0 -.633 -1.62l-6.38 -.926l-2.852 -5.78a1 1 0 0 0 -1.794 0l-2.853 5.78z"
                                    stroke-width="0" fill="currentColor"></path>
                            </svg>
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="icon icon-tabler icon-tabler-star-half-filled" width="20" height="20"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M12 1a.993 .993 0 0 1 .823 .443l.067 .116l2.852 5.781l6.38 .925c.741 .108 1.08 .94 .703 1.526l-.07 .095l-.078 .086l-4.624 4.499l1.09 6.355a1.001 1.001 0 0 1 -1.249 1.135l-.101 -.035l-.101 -.046l-5.693 -3l-5.706 3c-.105 .055 -.212 .09 -.32 .106l-.106 .01a1.003 1.003 0 0 1 -1.038 -1.06l.013 -.11l1.09 -6.355l-4.623 -4.5a1.001 1.001 0 0 1 .328 -1.647l.113 -.036l.114 -.023l6.379 -.925l2.853 -5.78a.968 .968 0 0 1 .904 -.56zm0 3.274v12.476a1 1 0 0 1 .239 .029l.115 .036l.112 .05l4.363 2.299l-.836 -4.873a1 1 0 0 1 .136 -.696l.07 -.099l.082 -.09l3.546 -3.453l-4.891 -.708a1 1 0 0 1 -.62 -.344l-.073 -.097l-.06 -.106l-2.183 -4.424z"
                                    stroke-width="0" fill="currentColor"></path>
                            </svg>
                        </span>

                        <h3 class="fw-bold mt-3">Nama Produk</h3>
                        <p class="text-muted">Sold Jumlah Angka
                        </p>
                        <h4 class="text-muted mt-2 mb-4">RP.1212000
                        </h4>



                        <small class="text-muted mt-4 mb-2">Deliver</small>
                        <div class="row">
                            <div class="col-sm-1">
                                <span class="text-muted me-2"><svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-truck-delivery" width="24" height="24"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M17 17m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M5 17h-2v-4m-1 -8h11v12m-4 0h6m4 0h2v-6h-8m0 -5h5l3 5"></path>
                                        <path d="M3 9l4 0"></path>
                                    </svg></span>
                            </div>
                            <div class="col-sm-2">
                                <label for="smallSelect" class="form-label me-2">Delivery to</label>
                            </div>
                            <div class="col-sm-4">
                                <select id="smallSelect" class="form-select">
                                    <option>West Jakarta</option>
                                    <option value="1">North Jakarta</option>
                                    <option value="2">South Jakarta</option>
                                    <option value="3">East Jakarta</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-1 mb-2">
                            <div class="col-sm-1">
                            </div>
                            <div class="col-sm-2">
                                <label for="smallSelect" class="form-label me-2">Quantity</label>
                            </div>
                            <div class="col-sm-3">
                                <input type="number" name="quantity" id="quantity" class="form-control" placeholder="1"
                                    min="1" max="10" aria-describedby="dealAmountHelp" />
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                            </div>
                            <div class="col-sm-2">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <button type="button" class="btn btn-label-dark btn-lg me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="icon icon-tabler icon-tabler-shopping-cart" width="20" height="20"
                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M6 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M17 19m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                        <path d="M17 17h-11v-14h-2"></path>
                                        <path d="M6 5l14 1l-1 7h-13"></path>
                                    </svg> Add to Cart</button>

                                <button type="button" class="btn btn-primary btn-lg">
                                    Buy Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.flash')
    <div class="card mt-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header">List Equipment</h5>
                <button type="button" class="btn bts-sm btn-label-primary mx-3" data-bs-toggle="modal"
                    data-bs-target="#modalAddEquipment">Add Equipment
                </button>
            </div>
        </div>
        <div class="card-body">
            <table class="datatables-equipment table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Product Name</th>
                        <th>Stock</th>
                        <th>Sold</th>
                        <th>Cost</th>
                        <th>Descriptions</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                @php $no = 1 @endphp
                @foreach($equipment as $eq)
                <tr>
                    <td>{{ $no++}}</td>
                    <td>{{ $eq->name }}</td>
                    <td>{{ $eq->stock }}</td>
                    <td>
                        @if ($eq->sold == NULL)
                        0
                        @else
                        {{ $eq->sold }}
                        }
                        @endif
                    </td>
                    <td>Rp. {{ number_format($eq->cost, 0, ',', '.') }}</td>
                    <td>Desc</td>
                    <td class="text-center">
                        <div class="dropdown">
                            <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="modal"
                                data-bs-target="#modalEditEquipment{{ $eq->id }}">
                                <span class="ti ti-edit ti-flashing-hover"></span>
                            </button>
                            <button type="button" class="btn btn-icon btn-danger" id="confirm-text{{ $eq->id }}"><span
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
                        confirmText = document.querySelector('#confirm-text{{ $eq->id }}'),
                        confirmColor = document.querySelector('#confirm-color');


                    // Alert With Functional Confirm Button
                    if (confirmText) {
                        confirmText.onclick = function() {
                            Swal.fire({
                                title: 'Are you sure?',
                                text: "Delete Equipment {{ $eq->name }}",
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
                                            "{{ route('deleteequipment', $eq->id) }}";
                                    });
                                }
                            });
                        };
                    }
                })();
                </script>
                <!-- Modal Edit User -->
                <div class="modal-onboarding modal fade animate__animated" id="modalEditEquipment{{$eq->id}}"
                    tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="modalCenterTitle">Edit Equipment</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div id="modalCarouselControls_edit{{$eq->id}}" class="carousel slide pb-4 mb-2"
                                data-bs-interval="false">
                                <ol class="carousel-indicators">
                                    <li data-bs-target="#modalCarouselControls_edit{{$eq->id}}" data-bs-slide-to="0"
                                        class="active">
                                    </li>
                                    <li data-bs-target="#modalCarouselControls_edit{{$eq->id}}" data-bs-slide-to="1">
                                    </li>
                                    <li data-bs-target="#modalCarouselControls_edit{{$eq->id}}" data-bs-slide-to="2">
                                    </li>
                                </ol>
                                <div class="carousel-inner">
                                    <form method="POST" action="{{ route('editequipment',[$eq->id]) }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="carousel-item active">
                                            <div class="onboarding-media">
                                                <div class="mx-2">
                                                </div>
                                            </div>
                                            <div class="onboarding-content">

                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="category" class="form-label">Category</label>
                                                        <select id="select2" class="select2 form-select" name="category"
                                                            data-allow-clear="true">
                                                            @foreach ($categories as $ct)
                                                            @if ($eq->id_category == $ct->id)
                                                            <option selected value="{{$ct->id}}">{{$ct->name}}</option>
                                                            @else
                                                            <option value="{{$ct->id}}">{{$ct->name}}</option>
                                                            @endif
                                                            @endforeach
                                                        </select>
                                                        <label for="fullname" class="form-label mt-3">Name</label>
                                                        <input type="text" name="name" id="name" class="form-control"
                                                            value="{{$eq->name}}" />
                                                        <label for="stock" class="form-label mt-3">Stock</label>
                                                        <input type="text" name="stock" id="stock" class="form-control"
                                                            value="{{$eq->stock}}" />
                                                        <label for="cost" class="form-label mt-3">Cost</label>
                                                        <div class="input-group">
                                                            <span class="input-group-text">Rp.</span>
                                                            <input type="text" class="form-control"
                                                                onkeyup="formatNumber()" id="cost" name="cost"
                                                                value="{{ number_format($eq->cost, 0, ',', '.') }}" />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="onboarding-media">
                                                <div class="mx-2">
                                                </div>
                                            </div>
                                            <div class="onboarding-content">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="Descriptions" class="form-label">Description</label>
                                                        <textarea id="descriptions" name="descriptions" rows="11"
                                                            class="form-control">{{$eq->descriptions}}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="carousel-item">
                                            <div class="onboarding-media">
                                                <div class="mx-2">
                                                </div>
                                            </div>
                                            <div class="onboarding-content">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="nameEx2" class="form-label">Upload Image
                                                            Equipment</label>
                                                        <input type="file" class="form-control" name="file[]" id="file"
                                                            multiple />
                                                    </div>
                                                    <button type="submit" id="submit-all"
                                                        class="btn btn-label-primary mt-2">Edit
                                                        Equipment</button>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            </form>
                            <a class="carousel-control-prev" href="#modalCarouselControls_edit{{$eq->id}}" role="button"
                                data-bs-slide="prev">
                                <i class="ti ti-chevrons-left me-2"></i><span>Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#modalCarouselControls_edit{{$eq->id}}" role="button"
                                data-bs-slide="next">
                                <span>Next</span><i class="ti ti-chevrons-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <script>
                var modal = document.getElementById('modalEditEquipment{{$eq->id}}');
                var fileInput = document.getElementById('file');

                function resetFileValue() {
                    fileInput.value = null;
                }
                modal.addEventListener('show.bs.modal', resetFileValue);
                modal.addEventListener('hidden.bs.modal', resetFileValue);
                </script>
                <!-- End Modal User -->
                @endforeach
            </table>
        </div>
    </div>
</div>

<!-- Modal slider -->
<div class="modal-onboarding modal fade animate__animated" id="modalAddEquipment" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content text-center">
            <div class="modal-header border-0">
                <h5 class="modal-title" id="modalCenterTitle">Add New Equipment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div id="modalCarouselControls" class="carousel slide pb-4 mb-2" data-bs-interval="false">
                <ol class="carousel-indicators">
                    <li data-bs-target="#modalCarouselControls" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#modalCarouselControls" data-bs-slide-to="1"></li>
                    <li data-bs-target="#modalCarouselControls" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <form method="POST" action="{{ route('addequipment') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="carousel-item active">
                            <div class="onboarding-media">
                                <div class="mx-2">
                                </div>
                            </div>
                            <div class="onboarding-content">

                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="category" class="form-label">Category</label>
                                        <select id="select2" class="select2 form-select" name="category"
                                            data-allow-clear="true">
                                            @foreach ($categories as $ct)
                                            <option value="{{$ct->id}}">{{$ct->name}}</option>
                                            @endforeach
                                        </select>
                                        <label for="fullname" class="form-label mt-3">Name</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Enter Equipment Name" />
                                        <label for="stock" class="form-label mt-3">Stock</label>
                                        <input type="text" name="stock" id="stock" class="form-control"
                                            placeholder="Enter Equipment Stock" />
                                        <label for="cost" class="form-label mt-3">Cost</label>
                                        <div class="input-group">
                                            <span class="input-group-text">Rp.</span>
                                            <input type="text" class="form-control" onkeyup="formatNumber()" id="cost"
                                                name="cost" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="onboarding-media">
                                <div class="mx-2">
                                </div>
                            </div>
                            <div class="onboarding-content">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="Descriptions" class="form-label">Description</label>
                                        <textarea id="descriptions" name="descriptions" rows="11"
                                            class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="onboarding-media">
                                <div class="mx-2">
                                </div>
                            </div>
                            <div class="onboarding-content">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameEx2" class="form-label">Upload Image Equipment</label>
                                        <input type="file" class="form-control" name="files[]" id="files" multiple />
                                    </div>
                                    <button type="submit" id="submit-all" class="btn btn-label-primary mt-2">Add New
                                        Equipment</button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            </form>
            <a class="carousel-control-prev" href="#modalCarouselControls" role="button" data-bs-slide="prev">
                <i class="ti ti-chevrons-left me-2"></i><span>Previous</span>
            </a>
            <a class="carousel-control-next" href="#modalCarouselControls" role="button" data-bs-slide="next">
                <span>Next</span><i class="ti ti-chevrons-right ms-2"></i>
            </a>
        </div>
    </div>
</div>


<script>
function formatNumber() {
    var input = document.getElementById('cost');
    var value = input.value.replace(/\D/g, '');
    var formattedValue = new Intl.NumberFormat('id-ID').format(value);
    input.value = formattedValue;
}
</script>
<!--/ slider modal -->
@endsection