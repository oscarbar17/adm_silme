@extends('layouts.default') 

@section('content')
<!-- PAGE-HEADER -->
<div class="page-header">
    <div>
        <h1 class="page-title">Bienvenido a {{env('APP_NAME')}}</h1>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- Row -->
<div class="row">
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col">
                        <p class="mb-1">Empleados Registrados</p>
                        <h3 class="mb-0 number-font">{{App\Models\Empleado::where('em_eliminado',false)->count()}}</h3>
                    </div>
                    <div class="col-auto mb-0">
                        <div class="dash-icon text-orange">
                            <i class="bx bxs-user-check"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col">
                        <p class="mb-1">Marcas Registradas</p>
                        <h3 class="mb-0 number-font">{{App\Models\Marca::where('ma_eliminado',false)->count()}}</h3>
                    </div>
                    <div class="col-auto mb-0">
                        <div class="dash-icon text-secondary1">
                            <i class="bx bxs-wallet"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col">
                        <p class="mb-1">Productores Registrados</p>
                        <h3 class="mb-0 number-font">{{App\Models\Productor::where('pr_eliminado',false)->count()}}</h3>
                    </div>
                    <div class="col-auto mb-0">
                        <div class="dash-icon text-secondary">
                            <i class="bx bxs-badge-dollar"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="row mb-1">
                    <div class="col">
                        <p class="mb-1">Sucursales</p>
                        <h3 class="mb-0 number-font">{{App\Models\Sucursal::where('su_eliminado',false)->count()}}</h3>
                    </div>
                    <div class="col-auto mb-0">
                        <div class="dash-icon text-warning">
                            <i class="bx bxs-credit-card-front"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Row-1 End -->

<!-- ROW-4 -->
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Eventos Recientes</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Empleado</th>
                                <th>Sucursal</th>
                                <th>Tipo de Cultivo</th>
                                <th>Cultivo</th>
                                <th>Fecha/Hora</th>
                                <th>Tipo</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($eventos as $evento)
                            <tr>
                                <td>
                                    <img src="{{asset('assets/images/users/3.jpg')}}" alt="profile-user" class="brround  avatar-sm w-32 mr-2">
                                        {{$evento->empleado->em_nombre}} {{$evento->empleado->em_apellido_paterno}}
                                </td>
                                <td>
                                    {{$evento->sucursal->su_nombre}}
                                </td>
                                <td>
                                    {{$evento->ev_tipo_cultivo}}
                                </td>
                                <td class="font-weight-semibold fs-15">
                                    {{$evento->producto->pr_nombre}}
                                </td>
                                <td>
                                    {{$evento->created_at}}
                                </td>
                                <td>
                                    {{$evento->ev_tipo_evento}}
                                </td>
                                <td>
                                    <a href="#" class="badge badge-danger">{{$evento->ev_estatus}}</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Actividad Reciente</h3>
            </div>
            <div class="card-body">
                <div class="activity-block">
                    <ul class="task-list user-tasks">
                        <li>
                            <span class="avatar avatar-md brround cover-image task-icon1" data-image-src="../../assets/images/users/1.jpg"></span>
                            <h6>Successful Purchase<small class="float-right text-muted tx-11">29 Mar 2020</small></h6>
                            <span class="text-muted tx-12">Order ID: #4567</span>
                        </li>
                        <li>
                            <span class="avatar avatar-md brround cover-image task-icon1" data-image-src="../../assets/images/users/2.jpg"></span>
                            <h6>New Registered Seller<small class="float-right text-muted tx-11">25 Mar 2020</small></h6>
                            <span class="text-muted tx-12">User ID: #8976</span>
                        </li>
                        <li>
                            <span class="avatar avatar-md brround cover-image task-icon1 bg-pink">H</span>
                            <h6>Order Verification<small class="float-right text-muted tx-11">14 Feb 2020</small></h6>
                            <span class="text-muted tx-12">Order ID: #6290</span>
                        </li>
                        <li>
                            <span class="avatar avatar-md brround cover-image task-icon1" data-image-src="../../assets/images/users/8.jpg"></span>
                            <h6>New Item Added<small class="float-right text-muted tx-11">02 Feb 2020</small></h6>
                            <span class="text-muted tx-12">Item ID: #0235</span>
                        </li>
                        <li>
                            <span class="avatar avatar-md brround cover-image task-icon1" data-image-src="../../assets/images/users/9.jpg"></span>
                            <h6>Purchase Cancellation<small class="float-right text-muted tx-11">28 Jan 2020</small></h6>
                            <span class="text-muted tx-12">Order ID: #1905</span>
                        </li>
                        <li class="mb-0">
                            <span class="avatar avatar-md brround cover-image task-icon1 bg-success">M</span>
                            <h6>Overdue Shipments<small class="float-right text-muted tx-11">25 Jan 2020</small></h6>
                            <span class="text-muted tx-12">Order ID: #8902</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ROW-4 END -->

<!-- ROW-5 -->
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Top Marcas</h3>
            </div>
            <div class="customer-scroll">
                @foreach($topMarcas as $marca)
                <div class="list-group-item d-flex  align-items-center border-top-0 border-left-0 border-right-0">
                    <div class="mr-2">
                        <span class="avatar avatar-md brround cover-image" data-image-src="{{asset('assets/images/users/1.jpg')}}"></span>
                    </div>
                    <div class="">
                        <div class="font-weight-semibold">{{App\Models\Marca::find($marca->marca_id)->ma_nombre}}</div>
                        <small class="text-muted">{{App\Models\Marca::find($marca->marca_id)->ma_contacto}}
                        </small>
                    </div>
                    <div class="ml-auto">
                        <a href="#" class="btn btn-sm btn-default">{{$marca->total}}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div><!-- COL END -->
    <div class="col-lg-8 col-md-12 col-sm-12 col-xl-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Top Selling Products</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table card-table border table-vcenter text-nowrap align-items-center">
                        <thead class="">
                            <tr>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                <img src="../../assets/images/pngs/1.png" alt="img" class="h-7 w-7">
                                <p class="d-inline-block align-middle mb-0 ml-1">
                                    <a href="" class="d-inline-block align-middle mb-0 product-name text-dark font-weight-semibold">Arm Chair</a>
                                    <br>
                                    <span class="text-muted fs-13">Office Chair</span>
                                </p>
                                </td>
                                <td>Home Accessories</td>
                                <td class="font-weight-semibold fs-15">$59.00</td>
                                <td><span class="badge badge-danger-light badge-md">Sold</span></td>
                                <td>
                                    <a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <img src="../../assets/images/pngs/2.png" alt="img" class="h-7 w-7">
                                <p class="d-inline-block align-middle mb-0 ml-1">
                                    <a href="" class="d-inline-block align-middle mb-0 product-name text-dark font-weight-semibold">Arm Chair</a>
                                    <br>
                                    <span class="text-muted fs-13">T-Shirt</span>
                                </p>
                                </td>
                                <td>Mens Wear</td>
                                <td class="font-weight-semibold fs-15">$45.00</td>
                                <td><span class="badge badge-danger-light badge-md">Sold</span></td>
                                <td>
                                    <a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <img src="../../assets/images/pngs/3.png" alt="img" class="h-7 w-7">
                                <p class="d-inline-block align-middle mb-0 ml-1">
                                    <a href="" class="d-inline-block align-middle mb-0 product-name text-dark font-weight-semibold">Arm Chair</a>
                                    <br>
                                    <span class="text-muted fs-13">Watch</span>
                                </p>
                                </td>
                                <td>Men Accessories</td>
                                <td class="font-weight-semibold fs-15">$123.00</td>
                                <td><span class="badge badge-danger-light badge-md">Sold</span></td>
                                <td>
                                    <a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                <img src="../../assets/images/pngs/4.png" alt="img" class="h-7 w-7">
                                <p class="d-inline-block align-middle mb-0 ml-1">
                                    <a href="" class="d-inline-block align-middle mb-0 product-name text-dark font-weight-semibold">Arm Chair</a>
                                    <br>
                                    <span class="text-muted fs-13">Hand Bag</span>
                                </p>
                                </td>
                                <td>Women Accessories</td>
                                <td class="font-weight-semibold fs-15">$98.00</td>
                                <td><span class="badge badge-danger-light badge-md">Sold</span></td>
                                <td>
                                    <a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                    <a class="btn btn-default btn-sm mb-2 mb-xl-0" data-toggle="tooltip" data-original-title="Save to Wishlist"><i class="fa fa-heart-o"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ROW-5 END -->
@endsection