<!doctype html>
<html lang="en" class="light-theme">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{ admin_asset('assets/images/favicon-32x32.png')}}" type="image/png" />
  <!--plugins-->
  <link href="{{ admin_asset('assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
  <link href="{{ admin_asset('assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
  <link href="{{ admin_asset('assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link href="{{ admin_asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{ admin_asset('assets/css/bootstrap-extended.css')}}" rel="stylesheet" />
  <link href="{{ admin_asset('assets/css/style.css')}}" rel="stylesheet" />
  <link href="{{ admin_asset('assets/css/icons.css')}}" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

  <!-- loader-->
  <link href="{{ admin_asset('assets/css/pace.min.css')}}" rel="stylesheet" />


  <!--Theme Styles-->
  <link href="{{ admin_asset('assets/css/dark-theme.css')}}" rel="stylesheet" />
  <link href="{{ admin_asset('assets/css/light-theme.css')}}" rel="stylesheet" />
  <link href="{{ admin_asset('assets/css/semi-dark.css')}}" rel="stylesheet" />
  <link href="{{ admin_asset('assets/css/header-colors.css')}}" rel="stylesheet" />

  <title>Snacked - Dashboard</title>
</head>

<body class="hold-transition {{config('admin.skin')}} {{join(' ', config('admin.layout'))}}">

@if($alert = config('admin.top_alert'))
    <div style="text-align: center;padding: 5px;font-size: 12px;background-color: #ffffd5;color: #ff0000;">
        {!! $alert !!}
    </div>
@endif
  <!--start wrapper-->
  <div class="wrapper">
    <!--start top header-->
    @include('admin::partials.header')

    @include('admin::partials.sidebar')
    <!--end sidebar -->
    <?php

    use App\Admin\Models\OrderModel;
    use App\Models\customers;
    use App\Models\CartModel;

    $total_order    = OrderModel::count();
    $total_views    = CartModel::count();
    $revenue        = OrderModel::sum('unit_price');
    $revenue        = $revenue / 100000;
    $revenue        = $revenue . 'Lakh';
    $customers      = customers::count();
    $rOrder     = OrderModel::orderBy('id','DESC')->limit(8)->get();
    $top_sold   = DB::table('order')
        ->leftjoin('product','order.product_id','=','product.id')
        ->leftjoin('product_image','order.product_id','=','product_image.product_id')
        ->select('product_image.image_name','order.product_name','order.id as o_id','product.id as pro_id',DB::raw('count(order.product_id) as p_id'))
        ->groupBy('order.product_id')
        ->orderBy('p_id','DESC')
        ->limit(6)
        ->get();
    ?>
    <!--start content-->
    <main class="page-content">

      <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2 row-cols-xxl-4">
        <div class="col">
          <div class="card overflow-hidden radius-10">
            <div class="card-body p-2">
              <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                <div class="w-50 p-3 bg-light-pink">
                  <p>Total Orders</p>
                  <h4 class="text-pink">{{$total_order}}</h4>
                </div>
                <div class="w-50 bg-pink p-3">
                  <!-- <p class="mb-3 text-white">+ 16% <i class="bi bi-arrow-up"></i></p> -->
                  <div id="chart1"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card overflow-hidden radius-10">
            <div class="card-body p-2">
              <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                <div class="w-50 p-3 bg-light-purple">
                  <p>Total Views</p>
                  <h4 class="text-purple">{{$total_views}}</h4>
                </div>
                <div class="w-50 bg-purple p-3">
                  <!-- <p class="mb-3 text-white">- 3.4% <i class="bi bi-arrow-down"></i></p> -->
                  <div id="chart2"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card overflow-hidden radius-10">
            <div class="card-body p-2">
              <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                <div class="w-50 p-3 bg-light-success">
                  <p>Revenue</p>
                  <h4 class="text-success">{{$revenue}}</h4>
                </div>
                <div class="w-50 bg-success p-3">
                  <!-- <p class="mb-3 text-white">+ 24% <i class="bi bi-arrow-up"></i></p> -->
                  <div id="chart3"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card overflow-hidden radius-10">
            <div class="card-body p-2">
              <div class="d-flex align-items-stretch justify-content-between radius-10 overflow-hidden">
                <div class="w-50 p-3 bg-light-orange">
                  <p>Customers</p>
                  <h4 class="text-orange">{{$customers}}</h4>
                </div>
                <div class="w-50 bg-orange p-3">
                  <!-- <p class="mb-3 text-white">+ 8.2% <i class="bi bi-arrow-up"></i></p> -->
                  <div id="chart4"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!--end row-->


      <div class="row">
        <div class="col-12 col-lg-12 col-xl-8 d-flex">
          <div class="card radius-10 w-100">
            <div class="card-header bg-transparent">
              <div class="row g-3 align-items-center">
                <div class="col">
                  <h5 class="mb-0">Recent Orders</h5>
                </div>
                <div class="col">
                  <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                    <div class="dropdown">
                      <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table align-middle mb-0">
                  <thead class="table-light">
                    <tr>
                      <th>#Order ID</th>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Date</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $rOrders = DB::table('order')->where('user_id',Admin::user()->id)->get(); ?>
                    @foreach($rOrders as $key => $value)
                    <tr>
                      <td>#{{$value->order_id}}</td>
                      <td>
                        <div class="d-flex align-items-center gap-3">
                        <?php
                                $productimg = DB::table('product_image')->where('product_id',$value->product_id)->limit(1)->get();
                            ?>
                             @foreach($productimg as $productimgs)
                          <div class="product-box border">
                            <img src="{{ url('upload')}}/{{$productimgs->image_name}}" alt="">
                          </div>
                          @endforeach
                          <div class="product-info">
                            <h6 class="product-name mb-1">{{$value->product_name}}</h6>
                          </div>
                        </div>
                      </td>
                      <td>{{$value->quantity}}</td>
                      <td>Rs.{{$value->unit_price}}</td>
                      <td>{{date('d-m-y',strtotime($value->created_at))}}</td>
                      <td>
                        <div class="d-flex align-items-center gap-3 fs-6">
                          <a href="{{url('vendor/ViewOrderDetails')}}/{{$value->order_id}}" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View Order Details" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                        </div>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-12 col-xl-4 d-flex">
          <div class="card radius-10 w-100">
            <div class="card-header bg-transparent border-0">
              <div class="row g-3 align-items-center">
                <div class="col">
                  <h6 class="mb-0">Top Sold</h6>
                </div>
                <div class="col">
                  <div class="d-flex align-items-center justify-content-end gap-3 cursor-pointer">
                    <div class="dropdown">
                      <a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i class="bx bx-dots-horizontal-rounded font-22 text-option"></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="javascript:;">Action</a>
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Another action</a>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="javascript:;">Something else here</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="best-product p-2 mb-3">
                @foreach($top_sold as $key => $value)
                <div class="best-product-item">
                  <div class="d-flex align-items-center gap-3">
                    <div class="product-box border">
                      @if($value->image_name)
                      <img src="{{ url('/upload')}}/{{ $value->image_name }}" alt="">
                      @else
                      <p>NA</p>
                      @endif
                    </div>
                    <div class="product-info flex-grow-1">
                      <div class="progress-wrapper">
                        <div class="progress" style="height: 5px;">
                          <div class="progress-bar bg-primary" role="progressbar" style="width: 80%;"></div>
                        </div>
                      </div>
                      <p class="product-name mb-0 mt-2 fs-6">{{$value->product_name}}<span class="float-end">{{$value->p_id}}</span></p>
                    </div>
                  </div>
                </div>
                @endforeach

              </div>
            </div>
          </div>

        </div>
      </div>
      <!--end row-->


    </main>
    <!--end page main-->


    <!--start overlay-->
    <div class="overlay nav-toggle-icon"></div>
    <!--end overlay-->

    <!--Start Back To Top Button-->
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->


  </div>
  <!--end wrapper-->


  <!-- Bootstrap bundle JS -->
  <script src="{{ admin_asset('assets/js/bootstrap.bundle.min.js')}}"></script>
  <!--plugins-->
  <script src="{{ admin_asset('assets/js/jquery.min.js')}}"></script>
  <script src="{{ admin_asset('assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
  <script src="{{ admin_asset('assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
  <script src="{{ admin_asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
  <script src="{{ admin_asset('assets/js/pace.min.js')}}"></script>
  <!--app-->

  <!-- <script src="{{ admin_asset('assets/js/app.js')}}"></script>-->

  <!--Data Table-->
  <script type="text/javascript" src=" https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src=" https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
  <!--Export table buttons-->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
  <!--  <script type="text/javascript" src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/pdfmake.min.js" ></script>-->
  <!-- <script type="text/javascript"  src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.24/build/vfs_fonts.js"></script>-->
  <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
  <!-- <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.2.1/js/buttons.print.min.js"></script>-->

  <!--Export table button CSS-->

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
  <script>
    $('#productPurity').DataTable({
      dom: 'Bfrtip',
      buttons: [
        //'csv'
      ]
    });
  </script>


</body>

</html>