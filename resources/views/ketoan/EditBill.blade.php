<x-app-layout>
    <h2 class="text-center">Thông tin đơn hàng</h2>
    <div class="form-group center">
      <a class="btn btn-link" style="margin:0% 48%" href="/print-donhang/{{$donhang->id}}"> <i class="fas fa-print"></i> In </a>
    </div>
    <div class="card  border-danger col-md-9" style="margin:0% 15%">
      @if (session('status'))
      <div class="alert alert-success" role="alert">
            {{ session('status') }}
      </div>
      @endif
        <div class="form-froup">
          @if ($donhang->Trang_thai==='Hoàn thành')

            <form class="form" action="/undo-hoanthanh-donhang/{{$donhang->id}}" method="POST" style="margin: 2% 0% 0% 70%">
              {{ csrf_field() }}
              {{method_field('PUT')}}
              <button type="submit" class="btn btn-light "><i class="fas fa-uncheck"></i> <span style="color: green"> Hủy chốt đơn </span></button>
            </form>
   
          @else
            
            <form class="form" action="/hoanthanh-donhang/{{$donhang->id}}" method="POST" style="margin: 2% 0% 0% 70%">
              {{ csrf_field() }}
              {{method_field('PUT')}}
              <button type="submit" class="btn btn-light "><i class="fas fa-check"></i> <span style="color: green">Chốt đơn hàng</span></button>
            </form>
          @endif
        </div>
        {{--  --}}
        <form action="/update-donhang/{{$donhang->id}}" method="POST">
          {{ csrf_field() }}
          {{method_field('PUT')}}
         
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Người lập đơn hàng:</label>
            <input type="text" class="form-control" id="recipient-name" name="" value="{{$username}}" disabled placeholder="Họ và tên">
          </div>

          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tên Mặt hàng:</label>
     
            <table class="table table-borderless">
              <thead>
                <tr>
                  {{-- <th scope="col">#</th> --}}
                  <th scope="" style="width:300px">Tên MH</th>
                  <th scope="">Số lượng</th>
                  <th scope="">Đơn giá</th>
                  <th scope="">Đơn vị</th>
                  <th scope=""><a href="javascript:;" class="btn btn-success addRow">+</a></th>
                  <th scope=""></a></th>
               
                </tr>
              </thead>
              <tbody id="content" >
                @foreach ($mathang as $item)
                  @if ($item->id_Donhang === $donhang->id )
                  
                  <tr>
                    <th>
                      <input type="text" class="form-control"  id="TenMH" name="TenMH[]" value="{{$item->TenMH}}">
                    </th>
                    <th>
                      <input type="number" min="0" class="form-control" id="Soluong" name="Soluong[]" value="{{$item->Soluong}}">
                    </th>
                    <th>
                      <input type="text" class="form-control" id="Don_gia" name="Don_gia[]" value="{{$item->Don_gia}}">
                    </th>
                    <th>
                      {{-- <input type="text" class="form-control" id="Donvi" name="Donvi[]"> --}}
                      <select class="custom-select" name="Donvi[]">
                        <option value="Cái" @if ($item->Donvi==="Cái")
                            selected="true"
                        @else
                        
                        @endif>Cái</option>
                        <option value="Mét" @if ($item->Donvi==="Mét")
                            selected="true"
                        @else
                        
                        @endif>Mét</option>
                        <option value="Tờ" @if ($item->Donvi==="Tờ")
                            selected="true"
                        @else
                        
                        @endif>Tờ</option>
                        <option value="Tấm" @if ($item->Donvi==="Tấm")
                            selected="true"
                        @else
                        
                        @endif>Tấm</option>
                      </select>
                    </th>
                    <th><a href="javascript:;" class="btn btn-dark deleteRow">-</a></th>
                    <th>
                        {{-- <form action="del-one-mathang/{{$item->id}}" method="POST">
                          {{ @csrf_field() }}
                          {{method_field('DELETE')}}
                          <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>
                        </form>  --}}
                        <a href="/del-one-mathang/{{$item->id}}">Xóa</a>
                    </th>
                  </tr>
                  @endif
                       
                @endforeach
            
              </tbody>

            </table>
          </div>

          <div class="form-group">
              <label for="message-text" class="col-form-label">Ngày trả</label>
          <input type="text"   class="form-control"  name="Tg_giao" value="{{$donhang->Tg_giao}}"> 
      
          </div>
        
          <div class="form-group">
            <label for="message-text" class="col-form-label">Cọc trước</label>
            <input type="text" class="form-control"  name="Coc_truoc" value="{{$donhang->Coc_truoc}}">
        </div>
          <div class="modal-footer">
            <button type="submit" @if($donhang->Trang_thai==="Hoàn thành"){ disabled } @endif class="btn btn-primary">Lưu</button>
          </div>

        </form>
      </div>
     

</x-app-layout>
<script>
    $('thead').on('click','.addRow',function(){
      var tr =  '<tr>'+
                      '<td>'+
                        '<input type="text" class="form-control" id="TenMH" name="TenMH[]"'+
                      '</td>'+
                      '<td>'+
                        '<input type="number" min="0" class="form-control" id="Soluong" name="Soluong[]">'+
                      '</td>'+
                      '<td>'+
                        '<input type="text" class="form-control" id="Don_gia" name="Don_gia[]">'+
                      '</td>'+
                      '<td>'+
                       
                        '<select class="custom-select" name="Donvi[]">'+
                          '<option selected>Chọn...</option>'+
                          '<option value="Cái">Cái</option>'+
                          '<option value="Chiếc">Chiếc</option>'+
                          '<option value="M">M</option>'+
                        '</select>'+
                      '</td>'+
                      '<th scope="col"><a href="javascript:;" class="btn btn-danger deleteRow">-</a></th>'+
                      
                    '</tr>';
      $('#content').append(tr);
    });

    $('tbody').on('click','.deleteRow',function(){
      $(this).parent().parent().remove();
    });
  </script>