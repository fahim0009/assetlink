<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <!-- FOR SEO -->
    <!-- <meta property='og:title' content='Custom Notion-styled Avatar Icon'/>
    <meta property='og:image' content='./assets/images/link.jpg'/> 
    <meta property='og:description' content='DESCRIPTION OF YOUR SITE'/>
    <meta property='og:url' content='URL OF YOUR WEBSITE'/>
    <meta property='og:image:width' content='1200' />
    <meta property='og:image:height' content='627' />
    <meta property="og:type" content='website'/> -->

    <title>Asset Panda</title>
    <link rel="icon" href="{{ asset('admin/images/favi.png')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/bootstrap-5.1.3min.css')}}">
    <link rel="stylesheet" href="{{ asset('admin/css/app.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/slick.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/slick-theme.css')}}" />
</head>

<body>
 
  @include('admin.inc.header')
    
    @yield('content')

    <!-- add new asset -->
    <div class="modal fade" id="addNewAsset" tabindex="-1" aria-labelledby="addNewAssetLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title text-center" id="addNewAssetLabel">Add New Asset</h6>
                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="ermsg"></div>
                <div class="modal-body">

                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="image" class="col-form-label">Photo</label>
                            <input type="file" id="image" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="asset_id" class="col-form-label">Asset ID</label>
                            <input type="text" id="asset_id" name="asset_id" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="company_id" class="col-form-label">Company ID Number</label>
                            <input type="text" id="company_id" name="company_id" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="name" class="col-form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="col-form-label">Category</label>
                            <input type="text" id="category" name="category" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="col-form-label">Desctiption:</label>
                            <textarea class="form-control"  id="description" name="description" ></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="manufacturer" class="col-form-label">Manufacturer</label>
                            <input type="text" id="manufacturer" name="manufacturer" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="model" class="col-form-label">Model</label>
                            <input type="text" id="model" name="model" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="col-form-label">Brand</label>
                            <input type="text" id="brand" name="brand" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="vendor" class="col-form-label">Vendor</label>
                            <input type="text" id="vendor" name="vendor" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="serial_no" class="col-form-label">Serial Number: </label>
                            <input type="text" id="serial_no" name="serial_no" class="form-control">
                        </div>

                        <div class="mb-3 d-flex align-items-center">
                            <label for="warranty" class="col-form-label">Warranty: </label>
                            <div class="ms-3 d-flex">
                                <div class="me-2"> Yes <input type="radio" name="warranty" id="warranty" class=""></div>
                                <div class="me-2"> No <input type="radio" name="warranty" id="warranty" class=""></div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="notes" class="col-form-label">Notes:</label>
                            <textarea class="form-control"  id="notes" name="notes" ></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="asset_manager" class="col-form-label">Asset Manager</label>
                            <input type="text" id="asset_manager" name="asset_manager" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="department" class="col-form-label">Department</label>
                            <input type="text" id="department" name="department" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="location" class="col-form-label">Location</label>
                            <input type="text" id="location" name="location" class="form-control">
                        </div>
                        <div class="mb-3">


                        </div>
                        <div class="form-check form-switch d-flex align-items-center">
                            <input class="form-check-input" type="checkbox" role="switch" id="checkout" name="checkout">
                            <label for="checkout" class="col-form-label ms-2">Eligible for check-out </label>
                        </div>
                        <div class="mb-3 d-flex flex-column  ">
                            <label for="status" class="col-form-label">Status: </label>
                            <div class=" d-flex">
                                <div class="me-2"><input type="radio" name='status' id="status" value="0" class=""> Available </div>
                                <div class="me-2"><input type="radio" name='status' value="1" id="status" class=""> Checked out</div>
                            </div>
                        </div>

                    </form>

                </div>
                <div class="modal-footer">
                    <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                    {{-- <button type="button" class="btn btn-submit py-2 me-3">Add Asset</button> --}}
                    <input type="button" id="addBtn" value="Add Asset" class="btn btn-submit py-2 me-3">
                </div>
            </div>
        </div>
    </div>
    {{-- user form modal here  --}}
    <script src="{{ asset('admin/js/bootstrap@5.1.3bundle.min.js')}}"></script>
    <script src="{{ asset('admin/js/iconify.min.js')}}"></script>

    <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <!-- <script src="./js/slick.min.js" type="text/javascript"></script> -->

    <script type="text/javascript">

 

        // function activeMenu() {
        //     let t = document.querySelectorAll(".items");
        //     for (let i = 0; i < t.length; i++) {
                
        //         t[i].addEventListener("click", function (event) {
        //         //  event.preventDefault();


        //         if( event.target.parentNode.classList.contains('active-link')){
        //             event.target.parentNode.classList.remove('active-link')
        //         }else{
        //              event.target.parentNode.classList.add('active-link');
        //         }
                
        //         });
        //     }
        // }

        // window.onload = activeMenu;



    </script>
    <script src="{{ asset('admin/js/app.js')}}"></script>


    

   <script>
    function success(msg){
             $.notify({
                     // title: "Update Complete : ",
                     message: msg,
                     // icon: 'fa fa-check'
                 },{
                     type: "info"
                 });

         }
   </script>

   
 <script type="text/javascript" src="{{asset('admin/js/plugins/bootstrap-notify.min.js')}}"></script>
 <script type="text/javascript" src="{{asset('admin/js/plugins/sweetalert.min.js')}}"></script>

 <script>
    $(document).ready(function () {

       

//header for csrf-token is must in laravel
$.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

           //  add asset start
           var url = "{{URL::to('/admin/assetmanager')}}";
           $("#addBtn").click(function(){
            // alert('add btn');
            var file_data = $('#image').prop('files')[0];
                if(typeof file_data === 'undefined'){
                    file_data = 'null';
                }

                
                var form_data = new FormData();
                form_data.append('image', file_data);
                form_data.append("asset_id", $("#asset_id").val());
                form_data.append("company_id", $("#company_id").val());
                form_data.append("name", $("#name").val());
                form_data.append("category", $("#category").val());
                form_data.append("description", $("#description").val());
                form_data.append("manufacturer", $("#manufacturer").val());
                form_data.append("model", $("#model").val());
                form_data.append("brand", $("#brand").val());
                form_data.append("vendor", $("#vendor").val());
                form_data.append("serial_no", $("#serial_no").val());
                form_data.append("notes", $("#notes").val());
                form_data.append("asset_manager", $("#asset_manager").val());
                form_data.append("department", $("#department").val());
                form_data.append("location", $("#location").val());

                  
                form_data.append("warranty", $("#warranty").prop('checked'));
                form_data.append("checkout", $("#checkout").prop('checked'));
                form_data.append("status", $("#status").prop('checked'));

                $.ajax({
                  url: url,
                  method: "POST",
                  contentType: false,
                  processData: false,
                  data:form_data,
                  success: function (d) {
                      if (d.status == 303) {
                          $(".ermsg").html(d.message);
                      }else if(d.status == 300){
                        $(".ermsg").html(d.message);
                        window.setTimeout(function(){location.reload()},2000)
                      }
                  },
                  error: function (d) {
                      console.log(d);
                  }
              });                

           });
           // asset add end 





           //  add user start
           var adduserurl = "{{URL::to('/admin/user-register')}}";
           $("#addUser").click(function(){
            // alert('add btn');
        
            
                var form_data = new FormData();
                form_data.append("user_name", $("#user_name").val());
                form_data.append("user_company_id", $("#user_company_id").val());
                form_data.append("email", $("#email").val());
                form_data.append("user_phone", $("#user_phone").val());
                form_data.append("user_position", $("#user_position").val());
                form_data.append("building", $("#building").val());
                form_data.append("permission", $("#permission").val());
                form_data.append("room", $("#room").val());
                form_data.append("user_department", $("#user_department").val());

                $.ajax({
                  url: adduserurl,
                  method: "POST",
                  contentType: false,
                  processData: false,
                  data:form_data,
                  success: function (d) {
                      if (d.status == 303) {
                          $(".ermsg").html(d.message);
                      }else if(d.status == 300){
                        $(".ermsg").html(d.message);
                        window.setTimeout(function(){location.reload()},2000)
                      }
                  },
                  error: function (d) {
                      console.log(d);
                  }
              });                

           });
           // user add end 


});
</script>
@yield('scripts')
</body>

</html>