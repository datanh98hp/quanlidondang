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
    {{-- <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Thiệp cưới') }}
    </h2>
</x-slot> --}}
  {{-- <x-header title="Mẫu đặt in thiệp cưới"></x-header> --}}
    <div style="margin-left: 40px; padding:10px" >
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
           + Thêm mới
        </button>
    </div>
   
    <div class="collapse" id="collapseExample">
        
      <div class="card center">
        <div class="card-body">
            <button style="background-color:white;border-radius:50%;padding:5px" class="" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                X
            </button>
          <form>
          <div class="row">
            {{-- Nhà trai --}}
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="inputAddress2">Khách hàng : </label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Khách Hàng">
                        </div>
                    </div>
                    <hr>
                  <div class="form-row">
                    <div class="col-md-6">
                        <label>Nhà Trai</label>
                        <div class="form-group">
                            <label class="small mb-1" for="inputFirstName">Ông :</label>
                            <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" />
                            <label class="small mb-1" for="inputFirstName">Bà :</label>
                            <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Nhà Gái</label>
                        <div class="form-group">
                            <label class="small mb-1" for="inputLastName">Ông :</label>
                            <input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" />
                            <label class="small mb-1" for="inputLastName">Bà :</label>
                            <input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" />
                        </div>
                    </div>
                     <h3 style="color: red;" class="text-center">Trân trọng 
                         <select>   
                             <option value="thân">thân</option>
                             <option value="kính">kính</option>
                         </select>
                         mời tới dự bữa cơm thân mật mừng lễ thành hôn của <select>   
                            <option value="2"> 2</option>
                            <option value="2 con">2 con</option>
                            <option value="2 cháu">2 cháu</option>
                        </select>
                        chúng tôi.
                     </h3>
                    
                    
                </div>
                
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputPassword">Chú rể :</label>
                            <input class="form-control py-4" id="inputPassword" type="text" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Bậc</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option value="Trưởng">Trưởng</option>
                              <option value="Thứ">Thứ</option>
                              <option value="Út">Út</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputConfirmPassword">Cô dâu :</label>
                            <input class="form-control py-4" id="inputConfirmPassword" type="text" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Bậc</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option value="Trưởng">Trưởng</option>
                              <option value="Thứ">Thứ</option>
                              <option value="Út">Út</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">  
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">Giờ ăn cơm (nhà trai):</div>
                              </div>
                              <input type="time" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                              <div class="input-group-prepend">
                                <div class="input-group-text">Giờ tổ chức (nhà trai):</div>
                              </div>
                              <input type="time" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                            </div>
                    </div>
                    <div class="col-md-6">  
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Giờ ăn cơm (nhà gái):</div>
                          </div>
                          <input type="time" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Giờ tổ chức (nhà gái):</div>
                          </div>
                          <input type="time" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="inputAddress2">Địa chỉ (nhà trai)</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Địa chỉ nhà trai">
                            <div class="col-md-6">
                                <label for="inputEmail4">SĐT (trai) : </label>
                                <input type="tel" class="form-control" id="inputEmail4">
                                <label for="inputAddress2">Số lượng (nhà trai) :</label>
                                <input type="number" min="0" class="form-control" placeholder="Số lượng">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="inputAddress2">Địa chỉ (nhà gái)</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Địa chỉ nhà gái">
                            <div class="col-md-6">
                                <label for="inputEmail4">SĐT (gái) : </label>
                                <input type="tel" class="form-control" id="inputEmail4">
                                <label for="inputAddress2">Số lượng (nhà trai) :</label>
                                <input type="number" min="0" class="form-control" placeholder="số lượng">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Tổng số tiền :</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Tổng">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Đặt trước :</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Đặt trước">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Loại :  </div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Mã thiếp">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Ngày trả :</div>
                        </div>
                        <input type="date" class="form-control" id="inlineFormInputGroupUsername" placeholder="Ngày trả">
                    </div>
                    
                </div>
                
                </div>
              </div>
    
            </div>

          </div>
          <div class="form-group mt-8 mb-8 col-sm-2 text-center ">
              <a class="btn btn-primary btn-block" href="login.html">Lưu</a>
              
            </div>
          
          </form>
        </div>
    </div>
    </div>
    {{-- Edit modal --}}
    {{-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button> --}}

  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <form>
          <div class="row">
            {{-- Nhà trai --}}
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="inputAddress2">Khách hàng : </label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Khách Hàng">
                        </div>
                    </div>
                    <hr>
                  <div class="form-row">
                    <div class="col-md-6">
                        <label>Nhà Trai</label>
                        <div class="form-group">
                            <label class="small mb-1" for="inputFirstName">Ông :</label>
                            <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" />
                            <label class="small mb-1" for="inputFirstName">Bà :</label>
                            <input class="form-control py-4" id="inputFirstName" type="text" placeholder="Enter first name" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label>Nhà Gái</label>
                        <div class="form-group">
                            <label class="small mb-1" for="inputLastName">Ông :</label>
                            <input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" />
                            <label class="small mb-1" for="inputLastName">Bà :</label>
                            <input class="form-control py-4" id="inputLastName" type="text" placeholder="Enter last name" />
                        </div>
                    </div>
                     <h3 style="color: red;" class="text-center">Trân trọng 
                         <select>   
                             <option value="thân">thân</option>
                             <option value="kính">kính</option>
                         </select>
                         mời tới dự bữa cơm thân mật mừng lễ thành hôn của <select>   
                            <option value="2"> 2</option>
                            <option value="2 con">2 con</option>
                            <option value="2 cháu">2 cháu</option>
                        </select>
                        chúng tôi.
                     </h3>
                    
                    
                </div>
                
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputPassword">Chú rể :</label>
                            <input class="form-control py-4" id="inputPassword" type="text" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Bậc</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option value="Trưởng">Trưởng</option>
                              <option value="Thứ">Thứ</option>
                              <option value="Út">Út</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="small mb-1" for="inputConfirmPassword">Cô dâu :</label>
                            <input class="form-control py-4" id="inputConfirmPassword" type="text" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Bậc</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option value="Trưởng">Trưởng</option>
                              <option value="Thứ">Thứ</option>
                              <option value="Út">Út</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">  
                            <div class="input-group">
                              <div class="input-group-prepend">
                                <div class="input-group-text">Giờ ăn cơm (nhà trai):</div>
                              </div>
                              <input type="time" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                              <div class="input-group-prepend">
                                <div class="input-group-text">Giờ tổ chức (nhà trai):</div>
                              </div>
                              <input type="time" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                            </div>
                    </div>
                    <div class="col-md-6">  
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Giờ ăn cơm (nhà gái):</div>
                          </div>
                          <input type="time" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                          <div class="input-group-prepend">
                            <div class="input-group-text">Giờ tổ chức (nhà gái):</div>
                          </div>
                          <input type="time" class="form-control" id="inlineFormInputGroupUsername" placeholder="Username">
                        </div>
                    </div>
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="inputAddress2">Địa chỉ (nhà trai)</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Địa chỉ nhà trai">
                            <div class="col-md-6">
                                <label for="inputEmail4">SĐT (trai) : </label>
                                <input type="tel" class="form-control" id="inputEmail4">
                                <label for="inputAddress2">Số lượng (nhà trai) :</label>
                                <input type="number" min="0" class="form-control" placeholder="Số lượng">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">  
                        <div class="form-group">
                            <label for="inputAddress2">Địa chỉ (nhà gái)</label>
                            <input type="text" class="form-control" id="inputAddress2" placeholder="Địa chỉ nhà gái">
                            <div class="col-md-6">
                                <label for="inputEmail4">SĐT (gái) : </label>
                                <input type="tel" class="form-control" id="inputEmail4">
                                <label for="inputAddress2">Số lượng (nhà trai) :</label>
                                <input type="number" min="0" class="form-control" placeholder="số lượng">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Tổng số tiền :</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Tổng">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Đặt trước :</div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Đặt trước">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Loại :  </div>
                        </div>
                        <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="Mã thiếp">
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                          <div class="input-group-text">Ngày trả :</div>
                        </div>
                        <input type="date" class="form-control" id="inlineFormInputGroupUsername" placeholder="Ngày trả">
                    </div>
                    
                </div>
                
                </div>
              </div>
    
            </div>

          </div>
          <div class="form-group mt-8 mb-8 col-sm-2 text-center ">
              <a class="btn btn-primary btn-block" href="login.html">Lưu</a>
              
            </div>
          
          </form>
      </div>
    </div>
  </div>
    {{--  Hien thi danh sach don dat in thiep cuoi --}}
    <div class="" style="padding: 0% 10% 0 10%">
      <table class="table table-hover alight-center" id="dataTable">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Tên Khách Hàng</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Cô dâu + Chú Rể</th>
            <th scope="col">#Act</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>
              <a class="btn btn-success"><i class="far fa-file-alt"></i></a>
              <a class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="far fa-edit"></i></a>
              <a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
            </td>
          
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>
              <a class="btn btn-success"><i class="far fa-file-alt"></i></a>
              <a class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="far fa-edit"></i></a>
              <a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>Larry the Bird</td>
            <td>@twitter</td>
            <td>@fat</td>
            <td>
              <a class="btn btn-success"><i class="far fa-file-alt"></i></a>
              <a class="btn btn-warning" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="far fa-edit"></i></a>
              <a class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
            </td>
          </tr>
        </tbody>
      </table>
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