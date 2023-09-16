@extends('layouts.app')
@section('content')
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
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h5 class="my-2">Carousel</h5>
                <div class="dropdown">
                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="ti ti-dots-vertical"></i>
                    </button>
                    <div class="dropdown-menu">
                        <div class="dropdown-header">
                            <span class="text-muted align-items-center mx-1">MANAGE CAROUSEL</span>
                        </div>
                        <div class="dropdown-divider"></div>
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalAddCarousel">
                            <i class="menu-icon tf-icons ti ti-square-plus"></i> Add
                        </button>
                        <button type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modal2">
                            <i class="menu-icon tf-icons ti ti-edit"></i> Edit
                        </button>
                        <button type="button" class="dropdown-item btn-label-danger" data-bs-toggle="modal" data-bs-target="#modal3">
                            <i class="menu-icon tf-icons ti ti-square-x"></i> Delete

                        </button>
                    </div>
                </div>
            </div>
            <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">

                    <div class="carousel-item active">
                        <img class="d-block" src="../../assets/img/backgrounds/2.jpg" alt="First slide" />
                        <div class="carousel-caption d-none d-md-block">
                            <h4>First slide</h4>
                            <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue
                                pertinacia.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" src="../../assets/img/backgrounds/3.jpg" alt="Second slide" />
                        <div class="carousel-caption d-none d-md-block">
                            <h4>Second slide</h4>
                            <p>In numquam omittam sea.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block" src="../../assets/img/backgrounds/4.jpg" alt="Third slide" />
                        <div class="carousel-caption d-none d-md-block">
                            <h4>Third slide</h4>
                            <p>Lorem ipsum dolor sit amet, virtute consequat ea qui, minim graeco mel no.</p>
                        </div>
                    </div>
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

        <div class="col-lg-6 mb-4">
            <div class="card h-100">
                <div class="card-header pb-0 d-flex justify-content-between mb-lg-n4">
                    <div class="card-title mb-0">
                        <h5 class="mb-0">Earning Reports</h5>
                        <small class="text-muted">Weekly Earnings Overview</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="earningReportsId" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="earningReportsId">
                            <a class="dropdown-item" href="javascript:void(0);">View
                                More</a>
                            <a class="dropdown-item btn-label-danger" href="javascript:void(0);">
                                Delete</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-12 col-lg-4">
                            <div class="mt-lg-4 mt-lg-2 mb-lg-4 mb-2 pt-1">
                                <h1 class="mb-0">164</h1>
                                <p class="mb-0">Total Tickets</p>
                            </div>
                            <ul class="p-0 m-0">
                                <li class="d-flex gap-3 align-items-center mb-lg-3 pt-2 pb-1">
                                    <div class="badge rounded bg-label-primary p-1"><i class="ti ti-ticket ti-sm"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap">New Tickets</h6>
                                        <small class="text-muted">142</small>
                                    </div>
                                </li>
                                <li class="d-flex gap-3 align-items-center mb-lg-3 pb-1">
                                    <div class="badge rounded bg-label-info p-1">
                                        <i class="ti ti-circle-check ti-sm"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap">Open Tickets</h6>
                                        <small class="text-muted">28</small>
                                    </div>
                                </li>
                                <li class="d-flex gap-3 align-items-center pb-1">
                                    <div class="badge rounded bg-label-warning p-1"><i class="ti ti-clock ti-sm"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap">Response Time</h6>
                                        <small class="text-muted">1 Day</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-8 col-md-12 col-lg-8">
                            <div id="supportTracker"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!--/ Earning Reports -->

        <!-- Support Tracker -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="mb-0">Support Tracker</h5>
                        <small class="text-muted">Last 7 Days</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="supportTrackerMenu" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="supportTrackerMenu">
                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-4 col-md-12 col-lg-4">
                            <div class="mt-lg-4 mt-lg-2 mb-lg-4 mb-2 pt-1">
                                <h1 class="mb-0">164</h1>
                                <p class="mb-0">Total Tickets</p>
                            </div>
                            <ul class="p-0 m-0">
                                <li class="d-flex gap-3 align-items-center mb-lg-3 pt-2 pb-1">
                                    <div class="badge rounded bg-label-primary p-1"><i class="ti ti-ticket ti-sm"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap">New Tickets</h6>
                                        <small class="text-muted">142</small>
                                    </div>
                                </li>
                                <li class="d-flex gap-3 align-items-center mb-lg-3 pb-1">
                                    <div class="badge rounded bg-label-info p-1">
                                        <i class="ti ti-circle-check ti-sm"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap">Open Tickets</h6>
                                        <small class="text-muted">28</small>
                                    </div>
                                </li>
                                <li class="d-flex gap-3 align-items-center pb-1">
                                    <div class="badge rounded bg-label-warning p-1"><i class="ti ti-clock ti-sm"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0 text-nowrap">Response Time</h6>
                                        <small class="text-muted">1 Day</small>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-12 col-sm-8 col-md-12 col-lg-8">
                            <div id="supportTracker"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Support Tracker -->

        <!-- Sales By Country -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Sales by Countries</h5>
                        <small class="text-muted">Monthly Sales Overview</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="salesByCountry" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesByCountry">
                            <a class="dropdown-item" href="javascript:void(0);">Download</a>
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Share</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="d-flex align-items-center mb-4">
                            <img src="../../assets/svg/flags/us.svg" alt="User" class="rounded-circle me-3" width="34" />
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0 me-1">$8,567k</h6>
                                    </div>
                                    <small class="text-muted">United states</small>
                                </div>
                                <div class="user-progress">
                                    <p class="text-success fw-semibold mb-0">
                                        <i class="ti ti-chevron-up"></i>
                                        25.8%
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <img src="../../assets/svg/flags/br.svg" alt="User" class="rounded-circle me-3" width="34" />
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0 me-1">$2,415k</h6>
                                    </div>
                                    <small class="text-muted">Brazil</small>
                                </div>
                                <div class="user-progress">
                                    <p class="text-danger fw-semibold mb-0">
                                        <i class="ti ti-chevron-down"></i>
                                        6.2%
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <img src="../../assets/svg/flags/in.svg" alt="User" class="rounded-circle me-3" width="34" />
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0 me-1">$865k</h6>
                                    </div>
                                    <small class="text-muted">India</small>
                                </div>
                                <div class="user-progress">
                                    <p class="text-success fw-semibold">
                                        <i class="ti ti-chevron-up"></i>
                                        12.4%
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <img src="../../assets/svg/flags/au.svg" alt="User" class="rounded-circle me-3" width="34" />
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0 me-1">$745k</h6>
                                    </div>
                                    <small class="text-muted">Australia</small>
                                </div>
                                <div class="user-progress">
                                    <p class="text-danger fw-semibold mb-0">
                                        <i class="ti ti-chevron-down"></i>
                                        11.9%
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <img src="../../assets/svg/flags/fr.svg" alt="User" class="rounded-circle me-3" width="34" />
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0 me-1">$45</h6>
                                    </div>
                                    <small class="text-muted">France</small>
                                </div>
                                <div class="user-progress">
                                    <p class="text-success fw-semibold mb-0">
                                        <i class="ti ti-chevron-up"></i>
                                        16.2%
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex align-items-center">
                            <img src="../../assets/svg/flags/cn.svg" alt="User" class="rounded-circle me-3" width="34" />
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <div class="d-flex align-items-center">
                                        <h6 class="mb-0 me-1">$12k</h6>
                                    </div>
                                    <small class="text-muted">China</small>
                                </div>
                                <div class="user-progress">
                                    <p class="text-success fw-semibold mb-0">
                                        <i class="ti ti-chevron-up"></i>
                                        14.8%
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Sales By Country -->

        <!-- Total Earning -->
        <div class="col-12 col-xl-4 mb-4 col-md-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between pb-1">
                    <h5 class="mb-0 card-title">Total Earning</h5>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="totalEarning" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="totalEarning">
                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <h1 class="mb-0 me-2">87%</h1>
                        <i class="ti ti-chevron-up text-success me-1"></i>
                        <p class="text-success mb-0">25.8%</p>
                    </div>
                    <div id="totalEarningChart"></div>
                    <div class="d-flex align-items-start my-4">
                        <div class="badge rounded bg-label-primary p-2 me-3 rounded">
                            <i class="ti ti-currency-dollar ti-sm"></i>
                        </div>
                        <div class="d-flex justify-content-between w-100 gap-2 align-items-center">
                            <div class="me-2">
                                <h6 class="mb-0">Total Sales</h6>
                                <small class="text-muted">Refund</small>
                            </div>
                            <p class="mb-0 text-success">+$98</p>
                        </div>
                    </div>
                    <div class="d-flex align-items-start">
                        <div class="badge rounded bg-label-secondary p-2 me-3 rounded">
                            <i class="ti ti-brand-paypal ti-sm"></i>
                        </div>
                        <div class="d-flex justify-content-between w-100 gap-2 align-items-center">
                            <div class="me-2">
                                <h6 class="mb-0">Total Revenue</h6>
                                <small class="text-muted">Client Payment</small>
                            </div>
                            <p class="mb-0 text-success">+$126</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Total Earning -->

        <!-- Monthly Campaign State -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="mb-0">Monthly Campaign State</h5>
                        <small class="text-muted">8.52k Social Visiters</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="MonthlyCampaign" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="MonthlyCampaign">
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Download</a>
                            <a class="dropdown-item" href="javascript:void(0);">View All</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="p-0 m-0">
                        <li class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                            <div class="badge bg-label-success rounded p-2"><i class="ti ti-mail ti-sm"></i></div>
                            <div class="d-flex justify-content-between w-100 flex-wrap">
                                <h6 class="mb-0 ms-3">Emails</h6>
                                <div class="d-flex">
                                    <p class="mb-0 fw-semibold">12,346</p>
                                    <p class="ms-3 text-success mb-0">0.3%</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                            <div class="badge bg-label-info rounded p-2"><i class="ti ti-link ti-sm"></i></div>
                            <div class="d-flex justify-content-between w-100 flex-wrap">
                                <h6 class="mb-0 ms-3">Opened</h6>
                                <div class="d-flex">
                                    <p class="mb-0 fw-semibold">8,734</p>
                                    <p class="ms-3 text-success mb-0">2.1%</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                            <div class="badge bg-label-warning rounded p-2"><i class="ti ti-click ti-sm"></i></div>
                            <div class="d-flex justify-content-between w-100 flex-wrap">
                                <h6 class="mb-0 ms-3">Clicked</h6>
                                <div class="d-flex">
                                    <p class="mb-0 fw-semibold">967</p>
                                    <p class="ms-3 text-success mb-0">1.4%</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                            <div class="badge bg-label-primary rounded p-2"><i class="ti ti-users ti-sm"></i></div>
                            <div class="d-flex justify-content-between w-100 flex-wrap">
                                <h6 class="mb-0 ms-3">Subscribe</h6>
                                <div class="d-flex">
                                    <p class="mb-0 fw-semibold">345</p>
                                    <p class="ms-3 text-success mb-0">8.5k</p>
                                </div>
                            </div>
                        </li>
                        <li class="mb-4 pb-1 d-flex justify-content-between align-items-center">
                            <div class="badge bg-label-secondary rounded p-2">
                                <i class="ti ti-alert-triangle ti-sm text-body"></i>
                            </div>
                            <div class="d-flex justify-content-between w-100 flex-wrap">
                                <h6 class="mb-0 ms-3">Complaints</h6>
                                <div class="d-flex">
                                    <p class="mb-0 fw-semibold">10</p>
                                    <p class="ms-3 text-success mb-0">1.5%</p>
                                </div>
                            </div>
                        </li>
                        <li class="d-flex justify-content-between align-items-center">
                            <div class="badge bg-label-danger rounded p-2"><i class="ti ti-ban ti-sm"></i></div>
                            <div class="d-flex justify-content-between w-100 flex-wrap">
                                <h6 class="mb-0 ms-3">Unsubscribe</h6>
                                <div class="d-flex">
                                    <p class="mb-0 fw-semibold">86</p>
                                    <p class="ms-3 text-success mb-0">0.8%</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Monthly Campaign State -->

        <!-- Source Visit -->
        <div class="col-xl-4 col-md-6 order-2 order-lg-1">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="card-title mb-0">
                        <h5 class="mb-0">Source Visits</h5>
                        <small class="text-muted">38.4k Visitors</small>
                    </div>
                    <div class="dropdown">
                        <button class="btn p-0" type="button" id="sourceVisits" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti ti-dots-vertical ti-sm text-muted"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="sourceVisits">
                            <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                            <a class="dropdown-item" href="javascript:void(0);">Download</a>
                            <a class="dropdown-item" href="javascript:void(0);">View All</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                        <li class="mb-3 pb-1">
                            <div class="d-flex align-items-start">
                                <div class="badge bg-label-secondary p-2 me-3 rounded">
                                    <i class="ti ti-shadow ti-sm"></i>
                                </div>
                                <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Direct Source</h6>
                                        <small class="text-muted">Direct link click</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">1.2k</p>
                                        <div class="ms-3 badge bg-label-success">+4.2%</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="mb-3 pb-1">
                            <div class="d-flex align-items-start">
                                <div class="badge bg-label-secondary p-2 me-3 rounded">
                                    <i class="ti ti-globe ti-sm"></i>
                                </div>
                                <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Social Network</h6>
                                        <small class="text-muted">Social Channels</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">31.5k</p>
                                        <div class="ms-3 badge bg-label-success">+8.2%</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="mb-3 pb-1">
                            <div class="d-flex align-items-start">
                                <div class="badge bg-label-secondary p-2 me-3 rounded">
                                    <i class="ti ti-mail ti-sm"></i>
                                </div>
                                <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Email Newsletter</h6>
                                        <small class="text-muted">Mail Campaigns</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">893</p>
                                        <div class="ms-3 badge bg-label-success">+2.4%</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="mb-3 pb-1">
                            <div class="d-flex align-items-start">
                                <div class="badge bg-label-secondary p-2 me-3 rounded">
                                    <i class="ti ti-external-link ti-sm"></i>
                                </div>
                                <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Referrals</h6>
                                        <small class="text-muted">Impact Radius Visits</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">342</p>
                                        <div class="ms-3 badge bg-label-danger">-0.4%</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="mb-3 pb-1">
                            <div class="d-flex align-items-start">
                                <div class="badge bg-label-secondary p-2 me-3 rounded">
                                    <i class="ti ti-discount-2 ti-sm"></i>
                                </div>
                                <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">ADVT</h6>
                                        <small class="text-muted">Google ADVT</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">2.15k</p>
                                        <div class="ms-3 badge bg-label-success">+9.1%</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="mb-2">
                            <div class="d-flex align-items-start">
                                <div class="badge bg-label-secondary p-2 me-3 rounded">
                                    <i class="ti ti-star ti-sm"></i>
                                </div>
                                <div class="d-flex justify-content-between w-100 flex-wrap gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">Other</h6>
                                        <small class="text-muted">Many Sources</small>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <p class="mb-0">12.5k</p>
                                        <div class="ms-3 badge bg-label-success">+6.2%</div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/ Source Visit -->

        <!-- Projects table -->
        <div class="col-12 col-xl-8 col-sm-12 order-1 order-lg-2 mb-4 mb-lg-0">
            <div class="card">
                <div class="card-datatable table-responsive">
                    <table class="datatables-projects table border-top">
                        <thead>
                            <tr>
                                <th></th>
                                <th></th>
                                <th>Name</th>
                                <th>Leader</th>
                                <th>Team</th>
                                <th class="w-px-200">Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!--/ Projects table -->
    </div>
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
                        <form enctype="multipart/form-data" action="{{ route('addcarousel') }}" class="dropzone needsclick" id="dropzone-basic">
                            <div class="dz-message needsclick">
                                Drop files here or click to upload
                            </div>
                            <div class="fallback">
                                <input type="file" name="img" id="img" />
                            </div>
                            <label for="name" class="form-label">Title</label>
                            <input type="text" name="title" id="title" class="form-control mb-3" placeholder="Enter Title" />
                            <label for="descriptions" class="form-label">Descriptions</label>
                            <input type="text" name="descriptions" id="descriptions" class="form-control mb-3" placeholder="Enter Descriptions" />
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

@endsection