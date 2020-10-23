<x-app-layout>
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
<div class="row">
  
  <div class="col-sm-8">
    <div class="card border-danger" style="margin-left: 20%">
      <div class="card-body ">
        <h5 class="card-title"></h5>
        Chi tiết đơn hàng
        <table class="table table-responsive">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">KH</th>
              <th scope="col">Tên SP</th>
              <th scope="col">T.gian lập</th>
              <th scope="col">Trạng thái</th>
              <th scope="col">Ngày trả</th>
              <th scope="col">Đặt cọc trước</th>
              <th scope="col">Thành tiền</th>
              <th scope="col"></th>
              <th scope="col"></th>
            </tr>
          </thead>
          <tbody>
            {{-- @foreach ($thiepcuoi as $item) --}}
            <tr>
            {{-- <th scope="row">{{$item->id}}</th>
              <td>{{$item->KH}}</td>
              <td>{{$item->codau}}</td>
              <td>{{$item->chure}}</td>
              <td>{{$item->soluong_trai}}</td>
              <td>{{$item->soluong_gai}}</td>
              <td>{{$item->ngay_tra}}</td>
              <td>{{$item->Dat_coc}}</td>
              <td>{{$item->Tong_tien}}</td>
            </tr> --}}
            {{-- @endforeach --}}
          </tbody>
        </table>
        
      </div>
    </div>
  </div>
</div>
    
<script>
  $(document).ready(function() {
  var table = $('#dataTable').DataTable();

$('#dataTable tbody').on('click', 'tr', function () {
  var data = table.row( this ).data();
  
  $('.id_bill').text(''+data[0]);
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