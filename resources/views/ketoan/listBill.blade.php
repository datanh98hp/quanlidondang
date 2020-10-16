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
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Danh sách đơn hàng</h5>
        <table class="table table-responsive" id="dataTable">
          {{-- <caption>Danh sách đơn hàng</caption> --}}
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên KH</th>
              <th scope="col">Thời gian</th>
              <th scope="col">Ngày xuất</th>
              <th scope="col">Người nhận</th>
              <th scope="col">Người giao</th>
              <th scope="col">#ACT</th>
              
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>@mdo</td>
              <td>@mdo</td>
              <td>
                <a class="btn btn-success"><i class="far fa-file-alt"></i></a>
                <a class="btn btn-warning"><i class="far fa-edit"></i></a>
                <a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
              <td>@adsd</td>
              <td>@mdo</td>
              <td>
                <a class="btn btn-success"><i class="far fa-file-alt"></i></a>
                <a class="btn btn-warning"><i class="far fa-edit"></i></a>
                <a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry</td>
              <td>the Bird</td>
              <td>@twitter</td>
              <td>@adsad</td>
              <td>@mdo</td>
              <td>
                <a class="btn btn-success"><i class="far fa-file-alt"></i></a>
                <a class="btn btn-warning"><i class="far fa-edit"></i></a>
                <a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card border-danger">
      <div class="card-body ">
        <h5 class="card-title"></h5>
        Chi tiết đơn hàng
        <table class="table table-borderless">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Tên hàng</th>
              <th scope="col">KTKT</th>
              <th scope="col">Don Gia</th>
              <th scope="col">Thành tiền</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td>Mark</td>
              <td>Otto</td>
              <td>@mdo</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">2</th>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>@fat</td>
              <td>@mdo</td>
            </tr>
            <tr>
              <th scope="row">3</th>
              <td>Larry the Bird</td>
              <td>@twitter</td>
              <td>@mdo</td>
              <td>@mdo</td>
            </tr>
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