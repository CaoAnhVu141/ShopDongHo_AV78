@extends('layout.master_admin')
@section('content')

<section class="content-header">
  <h1>
    Dashboard
    <small>Control panel</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Dashboard</li>
  </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tổng Số Đơn Hàng</span>
               <span class="info-box-number"><small><a href="">(Chi Tiết)</a></small></span> 
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Thành Viên</span>
               <span class="info-box-number"> <small><a href="">(Chi Tiết)</a></small></span> 
            </div>
          </div>
        </div>
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Sản Phẩm</span>
               <span class="info-box-number"><small><a href="">(Chi Tiết)</a></small></span> 
            </div>
          </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Fix Bug</span>
              <span class="info-box-number">++</span>
            </div>
          </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Danh sách đơn hàng trong 10 gần nhất</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body" style="">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    
                                    <th>Account</th>
                                    <th>Money</th>
                                    <th>Status</th>
                                    <th>Phương thức TT</th>
                                    <th>Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @if(isset($dataDashboard))
                                    @foreach ($dataDashboard as $item)
                                        <tr>
                                            <td>{{ $item->id_oder }}</td>
                                            <td>
                                                <ul>
                                                    <li>Name: {{ $item->name }}</li>
                                                    <li>Email: {{ $item->email }}</li>
                                                    <li>Phone: {{ $item->phone }}</li>
                                                    <li>Address: {{ $item->district }}</li>
                                                </ul>
                                            </td>
                                            
                                            <td>{{ number_format($item->intomoney,0,',','.') }} VND</td>
                                            <td>
                                                @if($item->status == 'Huỷ')
                                                    <span class="label label-danger" style="cursor: default; pointer-events: none;">
                                                        {{ $item->status }}
                                                    </span>
                                                @else
                                                    <span class="label label-success" style="cursor: default; pointer-events: none;">
                                                        {{ $item->status }}
                                                    </span>
                                                @endif
                                            </td>                                
                                            <td>đây là thanh toán</td>    
                                            <td>
                                                <span class="label label-warning" style="cursor: default; pointer-events: none;">
                                                    {{ $item->payoftype->name }}
                                                </span>
                                            </td>
                                            <td>{{ $item->created_at }}</td>
                                        </tr>
                                    @endforeach
                                @endif --}}
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="box-footer clearfix" style="">
                     <a href="{{ route('oderlist') }}" class="btn btn-sm btn-info btn-flat pull-right">Danh Sách Đơn Hàng</a> 
                </div>
            </div>
        </div>
        
    </div>
</section>
@endsection

 @section('script')
    <link rel="stylesheet" href="https://code.highcharts.com/css/highcharts.css">
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        let dataTransaction = $('#container').attr('data-json');
        dataTransaction = JSON.parse(dataTransaction);
        Highcharts.chart('container', {
            chart: {
                styledMode: true
            },

            title: {
                text: 'Pie point CSS'
            },

            xAxis: {
                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
            },

            series: [{
                type: 'pie',
                allowPointSelect: true,
                keys: ['name', 'y', 'selected', 'sliced'],
                data:dataTransaction ,
                showInLegend: true
            }]
        });




        let listday = $('#container2').attr('data-list-day');
        listday = JSON.parse(listday);

        let listMoneyMonth = $('#container2').attr('data-money');
        listMoneyMonth = JSON.parse(listMoneyMonth);

        let listMoneyMonthDefault = $('#container2').attr('data-money-default');
        listMoneyMonthDefault = JSON.parse(listMoneyMonthDefault);

        Highcharts.chart('container2', {
            chart: {
                type: 'spline'
            },
            title: {
                text: 'Biểu đồ doanh thu các ngày trong tháng'
            },
            subtitle: {
                text: 'hải mập mạp'
            },
            xAxis: {
                categories: listday
            },
            yAxis: {
                title: {
                    text: 'Số tiền'
                },
                labels: {
                    formatter: function () {
                        return new Intl.NumberFormat().format(this.value) + ' VND';
                    }
                }
            },
            tooltip: {
                crosshairs: true,
                shared: true
            },
            plotOptions: {
                spline: {
                    marker: {
                        radius: 4,
                        lineColor: '#666666',
                        lineWidth: 1
                    }
                }
            },
            series: [
                {
                    name: 'Đã Bàn Giao',
                    marker: {
                        symbol: 'square'
                    },
                    data:listMoneyMonth
                },{
                    name: 'Tiếp Nhận',
                    marker: {
                        symbol: 'square'
                    },
                    data:listMoneyMonthDefault
                }
            ]
        });
    </script>
@endsection 