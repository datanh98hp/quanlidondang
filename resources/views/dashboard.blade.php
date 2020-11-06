<x-app-layout>
    <!-- $slot -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    
    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            <!-- Chèn view -->
                <x-jet-welcome />
            </div>
        </div>
    </div> --}}
    <div class="row" style="margin:30px;justify-content: space-evenly">
        <div class="card border-primary mb-3" style="max-width: 18rem;">
            {{-- <div class="card-header">Tổng hóa đơn</div> --}}
            <div class="card-body text-primary text-center">
              <h5 class="card-title">Tổng đơn hàng trong ngày</h5>
              <h1 class="card-text">{{$countDonhang}}</h1>
              <h4 class="card-text">Đơn hàng</h4>
            </div>
          </div>
          <div class="card border-success mb-3 text-center" style="max-width: 18rem;">
           
            <div class="card-body">
              <h5 class="card-title">Tổng đơn hàng hoàn thành trong ngày</h5>
              <h1 class="card-text">{{$countDh_Hoanthanh}}</h1>
              <h4 class="card-text">Đơn hàng</h4>
            </div>
          </div>
          <div class="card border-success mb-3 text-center" style="max-width: 18rem;">
           
            <div class="card-body text-success">
              <h5 class="card-title">Tổng thu nhập trong ngày</h5>
              <h1 class="card-text">{{number_format($count_gt_Dh_ht)}}</h1>
              <h4 class="card-text">VND</h4>
            </div>
          </div>
          <div class="card border-danger mb-3 text-center" style="max-width: 18rem;">
           
            <div class="card-body text-danger">
              <h5 class="card-title">Tổng chi tiêu trong ngày</h5>
              <h1 class="card-text">{{number_format(200000)}}</h1>
              <h4 class="card-text">VND</h4>
            </div>
          </div>
          {{-- <div class="card border-succes mb-3 text-center" style="max-width: 18rem;">
           
            <div class="card-body">
              <h5 class="card-title">Tổng lợi nhuận thu được trong ngày</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div> --}}
    </div>
    <div class="container-fluid">
        <h1 class="mt-4">Charts</h1>
        {{-- <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Charts</li>
        </ol> --}}
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-chart-area mr-1"></i>
                Area Chart - Trung bình thu nhập bình quân trong tháng
            </div>
            <div class="card-body"><canvas id="myAreaChart" width="100%" height="30"></canvas></div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-bar mr-1"></i>
                        Biểu đồ doanh số đơn hàng trong tháng
                    </div>
                    {{-- <div class="card-body"><canvas id="myBarChart" width="100%" height="50"></canvas></div> --}}
                    {{-- <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div> --}}
                </div>
            </div>
            {{-- <div class="col-lg-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-chart-pie mr-1"></i>
                        Pie Chart - Biểu đồ doanh thu trong ngày
                    </div>
                    <div class="card-body"><canvas id="myPieChart" width="100%" height="50"></canvas></div>
                    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
                </div>
            </div>
        </div> --}}
    </div>

</x-app-layout>
