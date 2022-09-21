@extends('layouts.admin')
@section('content')




<div class="page-content">

  <div class="content">
      <!-- breadcrumb -->
      <div class="breadcrumb  py-2">
          View Asset
      </div>            
      <a href="{{ route('assetmanager')}}" class="mt-5 d-inline-block ms-5" title="Return Home">
          <span data-icon="akar-icons:arrow-back" class="fs-2 iconify txt-secondary" ></span> 
      </a>   
       
      <div class="container shadow-sm bg-white mt-5 "> 
          <div class="row">
              <h5 class="m-0 py-4 txt-secondary px-4">View Profile</h5> <hr>       
          </div>
      </div>
      <div class="container shadow-sm bg-white mb-5 p-4 profile">
         
          <div class="row">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="user-tab" data-bs-toggle="tab" data-bs-target="#user" type="button" role="tab" aria-controls="user" aria-selected="true">User</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button" role="tab" aria-controls="image" aria-selected="false">Change Photo</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="passowrd-tab" data-bs-toggle="tab" data-bs-target="#passowrd" type="button" role="tab" aria-controls="passowrd" aria-selected="false">Change Password</button>
                  </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                  <br>
                <div class="ermsg"></div>

                  <div class="tab-pane fade show active " id="user" role="tabpanel" aria-labelledby="user-tab">
                      <form class=" ">
                          <div class="row   pt-4 px-3">
                              <div class="col-lg-4">
                                <input id="profileid" value="{{$profile_data->id}}" type="hidden">
                                  <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Full Name</label>
                                      <input class="form-control" id="name" value="{{$profile_data->name}}" type="text">
                                    </div>
                              </div>
                              <div class="col-lg-4">
                                  <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Email address</label>
                                      
                                      <input class="form-control"  id="email" value="{{$profile_data->email}}" type="text">
                                    </div>
                              </div>
                              <div class="col-lg-4">
                                  <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Phone</label>
                                      <input class="form-control" id="phone" value="{{$profile_data->phone}}" type="text">
                                    </div>
                              </div>
                              <div class="col-lg-4">
                                  <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">City</label>
                                      <input class="form-control" id="city" value="{{$profile_data->city}}" type="text">
                                    </div>
                              </div>
                              <div class="col-lg-4">
                                  <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Country</label>
                                      <input class="form-control" id="country" value="{{$profile_data->country}}" type="text">
                                    </div>
                              </div>
                              <div class="col-lg-4">
                                  <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Postal Code</label>
                                      <input class="form-control" id="postal_code" value="{{$profile_data->postal_code}}" type="text">
                                    </div>
                              </div>
                              <div class="col-lg-4">
                                  <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">About</label>
                                      <input class="form-control" id="about" value="{{$profile_data->about}}" type="text">
                                    </div>
                              </div>
                              <div class="col-lg-4">
                                  <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Address</label>
                                      <textarea class="form-control"  id="address" type="text">{{$profile_data->address}}</textarea>
                                    </div>
                              </div>
                              <div class="col-lg-12">
                                  <div class="mb-3">
                                      <button type="button" class="btn btn-theme detailsBtn">Submit</button>
                                    </div>
                              </div>
                          </div> 
                         
                        </form>
                  </div>


                  <div class="tab-pane fade" id="image" role="tabpanel" aria-labelledby="image-tab">

                       <input id="profileid" value="{{$profile_data->id}}" type="hidden">
                       <img src="{{asset('images/'.$profile_data->photo)}}" width="90px" class="mt-4"><br>
                       <input type="file" class="form-control my-3 " name="" id="pimage"> 
                       <input type="hidden" name="id" value="">
                       
                        <div class="progress">
                            <div class="progress-bar"
                                  role="progressbar" aria-valuemin="0"
                                  aria-valuemax="100">

                            </div>
                        </div><br>
                      <button type="button" class="btn btn-theme imgBtn">Update</button>

                  </div>



                  <div class="tab-pane fade" id="passowrd" role="tabpanel" aria-labelledby="passowrd-tab">
                      <form class=" ">
                          <div class="row   pt-4 px-3"> 
                              <div class="col-lg-4">
                                  <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">Old Password</label>
                                      <input class="form-control" id="old_password" type="password">
                                  </div>
                              </div>

                              <div class="col-lg-4">
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">New Passowrd</label>
                                    <input class="form-control" id="new_password" type="password">
                                </div>
                            </div>

                            <div class="col-lg-4">
                              <div class="mb-3">
                                  <label for="exampleInputEmail1" class="form-label">Re-type Passowrd</label>
                                  <input class="form-control" id="password_confirmation" type="password">
                              </div>
                            </div>

                              <div class="col-lg-12">
                                  <div class="mb-3">
                                      <button type="button" class="btn btn-theme passwordBtn">Update</button>
                                    </div>
                              </div>
                          </div> 
                         
                        </form>
                  </div>
                </div>
          </div>
      </div>

  </div>
</div>





@endsection
@section('scripts')


<script>
  $(document).ready(function(){
      //header for csrf-token is must in laravel
      $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
      //
      var url = "{{URL::to('/admin/profile')}}";
      //console.log(url);
      $(".detailsBtn").click(function(){
          var name= $("#name").val();
          var email= $("#email").val();
          var phone= $("#phone").val();
          var city= $("#city").val();
          var country= $("#country").val();
          var postal_code= $("#postal_code").val();
          var about= $("#about").val();
          var address= $("#address").val();

          //console.log(fullname +','+ email +','+ title+','+ phone+','+ address+','+ city+','+ state+','+ zip+','+ about+','+ facebook+','+ twitter+','+ google+','+ linkedin);

          $.ajax({
                  url:url+'/'+$("#profileid").val(),
                  method: "PUT",
                  type: "PUT",
                  data:{
                    name:name,email:email,phone:phone,city:city,country:country,postal_code:postal_code,about:about,address:address
                  },
                  success: function(d){
                      if (d.status == 303) {
                          $(".ermsg").html(d.message);
                      }else if(d.status == 300){
                        pagetop();
                        
                        $(".ermsg").html(d.message);
                                // success("User Details Updated Successfully!!");
                          window.setTimeout(function(){location.reload()},20000)
                      }
                  },
                  error:function(d){
                      console.log(d);
                  }
              });
      });

      var passwordurl = "{{URL::to('/admin/changepassword')}}";
            $(".passwordBtn").click(function(){
                var password= $("#new_password").val();
                var confirmpassword= $("#password_confirmation").val();
                var opassword= $("#old_password").val();
                // console.log(password);
                $.ajax({
                    url: passwordurl,
                    method: "POST",
                    data: {password:password,confirmpassword:confirmpassword,opassword:opassword},
                    success: function (d) {
                        console.log(d);
                        if (d.status == 303) {
                            $(".ermsg").html(d.message);
                        }else if(d.status == 300){
                            pagetop();
                                success("Password Updated Successfully!!");
                            window.setTimeout(function(){location.reload()},2000)
                        }
                    },
                    error: function (d) {
                        console.log(d);
                    }
                });
            });


            //image upload

            var imgurl = "{{URL::to('/admin/image')}}";
            $(".imgBtn").click(function(){
              // alert('btn work');
              var file_data = $('#pimage').prop('files')[0];
                  if(typeof file_data === 'undefined'){
                    file_data = 'null';
                  }
                  var form_data = new FormData();
                  form_data.append('image', file_data);
                  form_data.append('_method', 'put');

                    $.ajax({
                      url:imgurl+'/'+$("#profileid").val(),
                      method: "POST",
                      contentType: false,
                      processData: false,
                      data:form_data,
                      success: function (d) {
                          if (d.status == 303) {
                              $(".ermsg").html(d.message);
                          }else if(d.status == 300){
                            pagetop();
                            $(".ermsg").html(d.message);
                                // success("Profile Image Updated Successfully!!");
                            window.setTimeout(function(){location.reload()},2000)
                          }
                      },
                      error: function (d) {
                          console.log(d);
                      }
                  });
                //create  end
            });

  });
</script>
{{-- @endsection --}}
    <script>
        $(function () {
            $.ajaxSetup({
                headers: {'X-CSRF-Token': '{{csrf_token()}}'}
            });

            var id = $('input[name="id"]').val();


            $('#pimage').change(function () {
                var photo = $(this)[0].files[0];
                var formData = new FormData();
                formData.append('id', id);
                formData.append('photo', photo);

                $.ajax({
                    xhr: function () {
                        var xhr = new window.XMLHttpRequest();
                        xhr.upload.addEventListener("progress", function (evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                percentComplete = parseInt(percentComplete * 100);
                                console.log(percentComplete);
                                $('.progress-bar').css('width', percentComplete + '%');
                                if (percentComplete === 100) {
                                    console.log('completed 100%')

                                    var imageUrl = window.URL.createObjectURL(photo)
                                    $('.imgPreview').attr('src', imageUrl);
                                    setTimeout(function () {
                                        $('.progress-bar').css('width', '0%');
                                    }, 2000)
                                }
                            }
                        }, false);
                        return xhr;
                    },

                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function (res) {
                        if(!res.success){alert(res.error)}
                    }
                })
            })
        })
    </script>

<script type="text/javascript">
  $(document).ready(function() {
      $("#profileinfo").addClass('active');
      $("#profileinfo").addClass('is-expanded');
      $("#profile").addClass('active');
  });
</script>
@endsection
