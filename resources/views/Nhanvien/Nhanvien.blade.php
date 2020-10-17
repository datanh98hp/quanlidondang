<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nhân viên') }}
        </h2>
    </x-slot> --}}


   {{-- <div class="card mb-4">
   
    <p>{{$user}}</p>
    </div> --}}
    <style>
        .selected{
            background-color: slategrey;
            cursor: pointer;
        }
        .center {
                    display: block;
                    margin-left: 25%;
                    margin-right: auto;
                    width: 50%;
                }
    </style>
    <div class="card mb-3 center" style="max-width: 540px;">
        <div class="row no-gutters">
          <div class="col-md-4">
            <img src="https://cdn.onlinewebfonts.com/svg/img_452000.png" class="card-img" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Thông tin</h5>
              <p class="card-text name_display"></p>
              <p class="card-text pos_display"></p>
              <p class="card-text phone_display"></p>
              <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
          </div>
        </div>
      </div>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table mr-1"></i>
           Danh sách nhân viên
        </div>
        <div class="card-body">
            <div class="table-responsive-md text-center">
                
                {{-- <button type="button" class="btn btn-primary btn_modal" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Open modal for @mdo</button> --}}
                <table class="table table-bordered display" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>$ID</th>
                            <th>Họ Tên</th>   
                            <th>Ngày vào làm</th>
                            <th>Ngày kết thúc</th>
                            <th>Số ngày làm</th>
                            <th>Hệ số lương</th>
                            <th>Pos</th>
                            <th>Lương thực lĩnh</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($nhanvien as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->Hoten}}</td>
                            <td>{{$item->start_work}}</td>
                            <td>{{$item->end_work}}</td>
                            <td>{{$item->Hesoluong}}</td>
                            <td>{{$item->Position}}</td>
                            {{-- <td>{{$item->luong_h }}</td> --}}
                            <td>{{$item->Tienluong}} VND</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
        var table = $('#dataTable').DataTable();
     
    $('#dataTable tbody').on('click', 'tr', function () {
        var data = table.row( this ).data();
        // alert( 'You clicked on '+data ); 
        // $('.data_display').text(data);

        $('.name_display').text(''+data[0]);
        $('.pos_display').text(''+data[1]);
        $('.phone_display').text(''+data[3]);
        ///
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
} );
    </script>
   
</x-app-layout>