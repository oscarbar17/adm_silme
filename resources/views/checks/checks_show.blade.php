@extends('layouts.default') 

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <div>
        <h1 class="page-title">Checks</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Checks</a></li>
            <li class="breadcrumb-item active" aria-current="page">Check #{{$check->id}}</li>
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
                            <h4 class="mb-1">{{$check->empleado->em_nombre}} {{$check->empleado->em_apellido_paterno}}</h4>
                            <h6 class="text-muted mb-4">Empleado desde: {{Carbon\Carbon::parse($check->empleado->em_fecha_antiguedad)->format('M-y')}}</h6>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <div class="float-left">
                    <h3 class="card-title">Contacto</h3>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="card-body wideget-user-contact">
                <div class="media mb-5 mt-0">
                    <div class="d-flex mr-3">
                        <span class="user-contact-icon bg-primary"><i class="fa fa-envelope text-white"></i></span>
                    </div>
                    <div class="media-body">
                        <a href="#" class="text-dark">Correo</a>
                        <div class="text-muted fs-14">{{$check->empleado->em_email}}</div>
                    </div>
                </div>
                <div class="media mb-5 mt-0">
                    <div class="d-flex mr-3">
                        <span class="user-contact-icon bg-secondary"><i class="fa fa-globe text-white"></i></span>
                    </div>
                    <div class="media-body">
                        <a href="#" class="text-dark">Cargo</a>
                        <div class="text-muted fs-14">{{$check->empleado->em_cargo}}</div>
                    </div>
                </div>
                <div class="media mb-0 mt-0">
                    <div class="d-flex mr-3">
                        <span class="user-contact-icon bg-warning"><i class="fa fa-phone text-white"></i></span>
                    </div>
                    <div class="media-body">
                        <a href="#" class="text-dark">Contacto</a>
                        <div class="text-muted fs-14">{{$check->empleado->em_telefono}}</div>
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
                            <li class=""><a href="#tab-51" class="active show" data-toggle="tab">Detalles del Check</a></li>
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
                                            <td><strong>Nombre Completo :</strong> {{$check->empleado->em_nombre}} {{$check->empleado->em_apellido_paterno}} {{$check->empleado->em_apellido_materno}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Fecha :</strong> {{Carbon\Carbon::parse($check->created_at)->format('d-M-y')}}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Estatus :</strong> {{$check->ch_estatus}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="tab-61">
                <div class="card-body">
                    <ul id="lightgallery" class="list-unstyled row">
                        
                        <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0" data-responsive="{{asset($check->ch_photo_check_in)}}" data-src="{{asset($check->ch_photo_check_in)}}" data-sub-html="<h4>Check in</h4><p></p>">
                            <a href="">
                                <img class="img-responsive" src="{{asset($check->ch_photo_check_in)}}" alt="Thumb-1">
                            </a>
                        </li>
                        @if($check->ch_photo_check_out)
                        <li class="col-xs-6 col-sm-4 col-md-4 col-xl-4 mb-5 border-bottom-0" data-responsive="{{asset($check->ch_photo_check_out)}}" data-src="{{asset($check->ch_photo_check_out)}}" data-sub-html="<h4>Check out</h4><p></p>">
                            <a href="">
                                <img class="img-responsive" src="{{asset($check->ch_photo_check_out)}}" alt="Thumb-1">
                            </a>
                        </li>
                        @endif
                    
                    </ul>
                </div>
            </div>
            <div class="tab-pane" id="tab-71">
                <div class="card">
                    <div class="card-header">
                        
                    </div>
                    <div class="card-body">
                        <h4>Check in</h4>
                        <iframe src="https://maps.google.com/maps?q={{$check->ch_latitud_check_in}},{{$check->ch_longitud_check_in}}&hl=en&z=14&amp;output=embed" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                            <br>
                        @if($check->ch_photo_check_out)
                        <h4>Check out</h4>
                        <iframe src="https://maps.google.com/maps?q={{$check->ch_latitud_check_out}},{{$check->ch_longitud_check_out}}&hl=en&z=14&amp;output=embed" width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                        @endif
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