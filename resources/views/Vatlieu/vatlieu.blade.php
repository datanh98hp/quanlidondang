<x-app-layout>
    {{-- <div class="row">
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Danh sách vật liệu báo giá tu admin</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Danh sách vật liệu cho đơn hàng</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              
            </div>
          </div>
        </div>
      </div> --}}
      {{-- @if(Auth::user()->type <=2)
      <div class="card text-center">
      
        <div class="card-body">
          <h3 class="card-title">Bảng báo giá</h3>
          <h4 class="card-text">Vật liệu</h4>
          <table class="table display table-responsive-sm"  id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
                @if(Auth::user()->type ==1)
                <th scope="col"></th>
                @endif
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                @if(Auth::user()->type ==1)
                <td>
                  <a class="btn btn-success">Sửa</a>
                  <a class="btn btn-danger">Xóa</a>
                </td>
                @endif
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                @if(Auth::user()->type ==1)
                <td>
                  <a class="btn btn-success">Sửa</a>
                  <a class="btn btn-danger">Xóa</a>
                </td>
                @endif
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>Larry</td>
                <td>the Bird</td>
                <td>@twitter</td>
                @if(Auth::user()->type ==1)
                <td>
                  <a class="btn btn-success">Sửa</a>
                  <a class="btn btn-danger">Xóa</a>
                </td>
                @endif
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      @endif --}}
      <hr>
      <div class="row">
        <div class="col-sm-6">
          <div class="card border-primary mb-3" style="max-width: 100%;margin:40pt">
            <div class="card-header">Phiếu nhập</div>
            <div class="card-body text-primary">
              <h5 class="card-title">Phiếu nhập vật liệu</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card border-success mb-3" style="max-width: 100%;margin:40pt">
            <div class="card-header">Phiếu xuất</div>
            <div class="card-body text-primary">
              <h5 class="card-title">Phiếu Xuất vật liệu</h5>
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
      </div>
</x-app-layout>