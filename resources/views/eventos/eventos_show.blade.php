@extends('layouts.default') 

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <div>
        <h1 class="page-title">Eventos</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Eventos</a></li>
            <li class="breadcrumb-item"><a href="#">Eventos o Ventas</a></li>
            <li class="breadcrumb-item active" aria-current="page">Evento #{{$evento->id}}</li>
        </ol>
    </div>
    <div class="ml-auto pageheader-btn">
        <div class="btn-list">
            
        </div>
    </div>
</div>
<!-- PAGE-HEADER END -->
<!-- ROW-1 OPEN -->
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="wideget-user text-center">
                    <div class="wideget-user-desc">
                        <div class="wideget-user-img">
                            <img class="" src="{{asset('assets/images/users/10.jpg')}}" alt="img">
                        </div>
                        <div class="user-wrap">
                            <h4 class="mb-1">{{$evento->empleado->em_nombre}} {{$evento->empleado->em_apellido_paterno}}</h4>
                            <h6 class="text-muted mb-4">Member Since: November 2017</h6>
                            <div class="wideget-user-rating">
                                <a href="#"><i class="fa fa-star text-warning"></i></a>
                                <a href="#"><i class="fa fa-star text-warning"></i></a>
                                <a href="#"><i class="fa fa-star text-warning"></i></a>
                                <a href="#"><i class="fa fa-star text-warning"></i></a>
                                <a href="#"><i class="fa fa-star-o text-warning mr-1"></i></a> <span>5 (3876 Reviews)</span>
                            </div>
                            <div class="wideget-user-icons mb-4">
                                <a href="#" class="bg-facebook text-white mt-0"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="bg-info text-white"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="bg-google text-white"><i class="fa fa-google"></i></a>
                                <a href="#" class="bg-dribbble text-white"><i class="fa fa-dribbble"></i></a>
                            </div>
                            <a href="#" class="btn btn-primary mt-1 mb-1"><i class="fa fa-rss"></i> Follow</a>
                            <a href="#" class="btn btn-secondary mt-1 mb-1"><i class="fa fa-envelope"></i> E-mail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h3 class="card-title">Contact</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-body wideget-user-contact">
                <div class="media mb-5 mt-0">
                    <div class="d-flex mr-3">
                        <span class="user-contact-icon bg-primary"><i class="fa fa-envelope text-white"></i></span>
                    </div>
                    <div class="media-body">
                        <a href="#" class="text-dark">Support</a>
                        <div class="text-muted fs-14">support@demo.com</div>
                    </div>
                </div>
                <div class="media mb-5 mt-0">
                    <div class="d-flex mr-3">
                        <span class="user-contact-icon bg-secondary"><i class="fa fa-globe text-white"></i></span>
                    </div>
                    <div class="media-body">
                        <a href="#" class="text-dark">Address</a>
                        <div class="text-muted fs-14">San Francisco, CA</div>
                    </div>
                </div>
                <div class="media mb-0 mt-0">
                    <div class="d-flex mr-3">
                        <span class="user-contact-icon bg-warning"><i class="fa fa-phone text-white"></i></span>
                    </div>
                    <div class="media-body">
                        <a href="#" class="text-dark">Contact</a>
                        <div class="text-muted fs-14">+125 5826 3658</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="wideget-user-tab">
                <div class="tab-menu-heading">
                    <div class="tabs-menu1">
                        <ul class="nav">
                            <li class=""><a href="#tab-51" class="active show" data-toggle="tab">Detalles del Evento</a></li>
                            <li><a href="#tab-61" data-toggle="tab" class="">Galería</a></li>
                            <li><a href="#tab-71" data-toggle="tab" class="">Mapa</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-content">
            <div class="tab-pane active show" id="tab-51">
                <div class="card">
                    <div class="card-body">
                        <div id="profile-log-switch">
                            <div class="table-responsive">
                                <table class="table row table-borderless">
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>Nombre Completo :</strong> {{$evento->empleado->em_nombre}} {{$evento->empleado->em_apellido_paterno}} {{$evento->empleado->em_apellido_materno}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Productor :</strong> {{$evento->productor->pr_nombre}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Teléfono :</strong> {{$evento->productor->pr_telefono}}</td>
                                        </tr>
                                    </tbody>
                                    <tbody class="col-lg-12 col-xl-6 p-0">
                                        <tr>
                                            <td><strong>Fecha :</strong> {{Carbon\Carbon::parse($evento->created_at)->format('d-M-y')}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Estatus :</strong> {{$evento->ev_estatus}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row profie-img">
                                <div class="col-md-12">
                                    <div class="media-heading">
                                        <h5><strong>Notas</strong></h5>
                                    </div>
                                    <p>
                                        {{$evento->ev_notas}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="media-heading">
                            <h5><strong>Skills</strong></h5>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6">
                                <label>HTML5</label>
                                <div class="progress progress-md mb-3">
                                    <div class="progress-bar  bg-primary w-50">50%</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Wordpress</label>
                                <div class="progress progress-md mb-3">
                                    <div class="progress-bar bg-danger w-70">70%</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Javascript</label>
                                <div class="progress progress-md mb-3">
                                    <div class="progress-bar  bg-warning w-80">80%</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Photography</label>
                                <div class="progress progress-md mb-3">
                                    <div class="progress-bar bg-secondary w-75">75%</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Php</label>
                                <div class="progress progress-md mb-3 mb-md-0">
                                    <div class="progress-bar bg-secondary1 w-65">80%</div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Android</label>
                                <div class="progress progress-md mb-0">
                                    <div class="progress-bar bg-orange w-70">69%</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <div class="media-user mr-4">
                                <div class="main-img-user avatar-md"><img alt="" class="rounded-circle" src="../../assets/images/users/15.jpg"></div>
                            </div>
                            <div class="">
                                <h6 class="mb-0 mt-2">Peter Hill</h6><span class="text-muted">5 mins ago</span>
                            </div>
                        </div>
                        <div class="card-options">
                            <div class="dropdown">
                                <a class="new" data-toggle="dropdown" href="JavaScript:void(0);"><i class="fe fe-more-vertical text-dark"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#">Edit Post</a>
                                    <a class="dropdown-item" href="#">Delete Post</a>
                                    <a class="dropdown-item" href="#">Personal Settings</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <p class="mg-t-10">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                        <div><img alt="img" class="w-100" src="../../assets/images/media/13.jpg"></div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex">
                            <div class="avatar-group">
                                <a class="avatar avatar-sm" data-toggle="tooltip" href="#" data-original-title="" title=""><img alt="Image placeholder" class="rounded-circle" src="../../assets/images/users/19.jpg"></a>
                                <a class="avatar avatar-sm" data-toggle="tooltip" href="#" data-original-title="" title=""><img alt="Image placeholder" class="rounded-circle" src="../../assets/images/users/20.jpg"></a>
                                <a class="avatar avatar-sm" data-toggle="tooltip" href="#" data-original-title="" title=""><img alt="Image placeholder" class="rounded-circle" src="../../assets/images/users/1.jpg"></a>
                                <a class="avatar avatar-sm" data-toggle="tooltip" href="#" data-original-title="" title=""><img alt="Image placeholder" class="rounded-circle" src="../../assets/images/users/2.jpg"></a>
                            </div>
                            <div class="ml-auto">
                                <div class="dropdown wideget-user-contact">
                                    <a class="user-contact-icon bg-light" href="JavaScript:void(0);" data-toggle="tooltip" data-placement="top" title="Likes"><i class="fe fe-heart text-dark"></i></a>
                                    <a class="user-contact-icon bg-light" href="JavaScript:void(0);" data-toggle="tooltip" data-placement="top" title="Comments"><i class="fe fe-message-square text-dark"></i></a>
                                    <a class="user-contact-icon bg-light" href="JavaScript:void(0);" data-toggle="tooltip" data-placement="top" title="Shares"><i class="fe fe-share-2 text-dark"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab-61">
                <ul class="widget-users row">
                    <li class="col-lg-4  col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <span class="avatar avatar-xxl brround cover-image" data-image-src="../../assets/images/users/15.jpg"></span>
                                <h4 class="h4 mb-0 mt-3">James Thomas</h4>
                                <p class="card-text">Web designer</p>
                            </div>
                            <div class="card-footer text-center">
                                <div class="row user-social-detail">
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-facebook text-blue" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-google-plus text-danger" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-twitter text-info" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <span class="avatar avatar-xxl brround cover-image" data-image-src="../../assets/images/users/9.jpg"></span>
                                <h4 class="h4 mb-0 mt-3">George Clooney</h4>
                                <p class="card-text">Web designer</p>
                            </div>
                            <div class="card-footer text-center">
                                <div class="row user-social-detail">
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-facebook text-blue" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-google-plus text-danger" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-twitter text-info" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <span class="avatar avatar-xxl brround cover-image" data-image-src="../../assets/images/users/20.jpg"></span>
                                <h4 class="h4 mb-0 mt-3">Robert Downey Jr.</h4>
                                <p class="card-text">Web designer</p>
                            </div>
                            <div class="card-footer text-center">
                                <div class="row user-social-detail">
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-facebook text-blue" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-google-plus text-danger" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-twitter text-info" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card mb-lg-0">
                            <div class="card-body text-center">
                                <span class="avatar avatar-xxl brround cover-image" data-image-src="../../assets/images/users/12.jpg"></span>
                                <h4 class="h4 mb-0 mt-3">Emma Watson</h4>
                                <p class="card-text">Web designer</p>
                            </div>
                            <div class="card-footer text-center">
                                <div class="row user-social-detail">
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-facebook text-blue" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-google-plus text-danger" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-twitter text-info" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card mb-lg-0">
                            <div class="card-body text-center">
                                <span class="avatar avatar-xxl brround cover-image" data-image-src="../../assets/images/users/4.jpg"></span>
                                <h4 class="h4 mb-0 mt-3">Mila Kunis</h4>
                                <p class="card-text">Web designer</p>
                            </div>
                            <div class="card-footer text-center">
                                <div class="row user-social-detail">
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-facebook text-blue" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-google-plus text-danger" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-twitter text-info" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="col-lg-4 col-md-6 col-sm-12 col-12">
                        <div class="card mb-0">
                            <div class="card-body text-center">
                                <span class="avatar avatar-xxl brround cover-image" data-image-src="../../assets/images/users/6.jpg"></span>
                                <h4 class="h4 mb-0 mt-3">Ryan Gossling</h4>
                                <p class="card-text">Web designer</p>
                            </div>
                            <div class="card-footer text-center">
                                <div class="row user-social-detail">
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-facebook text-blue" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-google-plus text-danger" aria-hidden="true"></i></a>
                                    </div>
                                    <div class="col-lg-4 col-sm-4 col-4">
                                        <a href="#"><i class="fa fa-twitter text-info" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="tab-pane" id="tab-71">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Basic</h3>
                    </div>
                    <div class="card-body">

                        <div class="map-header">
                            <div class="map-header-layer" id="map"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- COL-END -->
</div>
<!-- ROW-1 CLOSED -->
@stop 
@push('scripts')
<script>

</script>
@endpush