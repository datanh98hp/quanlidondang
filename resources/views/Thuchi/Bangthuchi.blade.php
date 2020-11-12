<x-app-layout>
  <div>
<!-- Modal -->
<div class="modal fade " id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-lg">
    <div class="modal-content">
    <form action="/create-thuchi" method="POST">
        @csrf
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Thêm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        {{-- tb form  --}}
        <table class="table table-borderless">
          <thead>
            <tr>
              {{-- <th scope="col">#</th> --}}
              <th scope="" style="width:300px">Tên CV</th>
              <th scope="">$ Thu</th>
              <th scope="">$ Chi</th>
              {{-- <th scope=""> </th> --}}
              <th scope=""><a href="javascript:;" class="btn btn-success addRow">+</a></th>
            </tr>
          </thead>
          <tbody id="content">
            <tr>
              <td>
                <textarea type="text" rows="1" class="form-control" id="TenMH" name="NDCV[]"></textarea>
              </td>
              <td>
                <input type="number" min="0" class="form-control" id="Soluong" name="SoTen_Thu[]">
              </td>
              <td>
                <input type="number" min="0" class="form-control" id="Don_gia" name="SoTen_Chi[]">
              </td>
              <th scope="col"><a href="javascript:;" class="btn btn-danger deleteRow">-</a></th>
            </tr>
          </tbody>
        </table>
        {{--  --}}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="submit" class="btn btn-primary">Lưu</button>
      </div>
    </form>
    </div>
  </div>
</div>
<div class="ml-5">
  <button type="button" class="btn btn-primary mx-auto" data-toggle="modal" data-target="#staticBackdrop">
    Thêm
  </button>
</div>
  </div>
  
    <h2 class="text-center" style="color: blue">Bảng thu chi</h2>
      <h6 class="text-center">( {{ date("F j, Y")  }} )</h6>
        <!-- Button trigger modal -->
    
    <div class="row">
        <div class="col-sm-8 mx-auto">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
          @endif
          <table class="table table-striped table-hover thead-dark" >
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Công việc</th>
                <th scope="col">Thu</th>
                <th scope="col">Chi</th>
                <th scope="col">Còn lại</th>
                <th scope="col">Người thanh toán</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($thuchi as $item)
              <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->NDCV}}</td>
                <td>{{$item->SoTen_Thu}}</td>
                <td>{{$item->SoTen_Chi}}</td>
                <td>{{ $item->SoTen_Thu - $item->SoTen_Chi}}</td>
                <td>{{$item->id_user}}</td>
                <td>
                  <a class="btn btn-warning" href="/edit-thuchi/"><i class="far fa-edit"></i></a>
                </td>
                <td>
                  <form action="/del-thuchi/{{$item->id}}" method="POST">
                    {{@csrf_field()}}
                    {{method_field('DELETE')}}
                    <button class="btn btn-danger" type="submit"><i class="fas fa-trash-alt"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
            
          </table>
          <h3 class="text-right" style="margin-right: 20px;font-weight: 1000">Tổng thu : <span style="font-weight: 800">{{$Tongthu}} VND</span></h3>
        </div>
        
    </div>
   
</x-app-layout>
<script>
  $('thead').on('click','.addRow',function(){
    var tr =  '<tr>'+
                    '<td>'+
                      '<textarea type="text" rows="1" class="form-control" id="TenMH" name="NDCV[]"></textarea>'+
                    '</td>'+
                    '<td>'+
                      '<input type="number" min="0" class="form-control" id="Soluong" name="SoTen_Thu[]">'+
                    '</td>'+
                    '<td>'+
                      '<input type="text" class="form-control" id="Don_gia" name="SoTen_Chi[]">'+
                    '</td>'+
                    '<th scope="col"><a href="javascript:;" class="btn btn-danger deleteRow">-</a></th>'+
                  '</tr>';
    $('#content').append(tr);
  });
  $('tbody').on('click','.deleteRow',function(){
    $(this).parent().parent().remove();
  });
</script>