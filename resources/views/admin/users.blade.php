@extends('layouts.admin')

@section('css')
@endsection

@section('content')

<div class="page-content">
         
    <div class="content">
        <!-- breadcrumb -->
        <div class="breadcrumb  py-2">
            Asset
        </div>
        <!-- top menu -->
        <div class="topMenuBar">
            <div class="leftItems">
                <form class="ps-2">
                    <input type="search" class="search">
                    <button class="src-btn">Search</button>
                </form>
            </div>
            <div class="rightItems">
                <a href="#" data-bs-toggle="modal" data-bs-target="#addNewUser" class="btn-theme">
                    <span class="iconify" data-icon="bxs:book-add"></span> Add New User
                </a>
                <a href="" class="btn-theme">
                    <span class="iconify" data-icon="dashicons:database-import"></span> Import Asset
                </a>
                <a href="" class="btn-theme bg-danger">
                    <span class="iconify" data-icon="ant-design:delete-filled"></span> Delete Asset
                </a>
            </div>
        </div>
        <!-- data table -->

        <div class="data-container" id="contentContainer">
            <table class="  table-custom shadow-sm bg-white" style="width:100%">
                <thead>
                    <tr>
                        <th style="width: 15%;">Name</th>
                        <th>Company Id</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Position</th>
                        <th>Room</th>
                        <th>Role</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach (\App\Models\User::orderby('id','DESC')->get() as $data)
                    <tr>
                        <td style="width: 15%;">{{ $data->name }}</td>
                        <td>{{ $data->user_company_id }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->phone }}</td>
                        <td>{{ $data->user_position }}</td>
                        <td>{{ $data->room }}</td>
                        <td>
                            @foreach (explode(',', $data->permission) as $permission)
                                @if (trim($permission)==1)
                                    Admin,
                                @endif
                                @if (trim($permission)==2)
                                    Asset Manager,
                                @endif
                                @if (trim($permission)==3)
                                    User
                                @endif
                            @endforeach 

                        </td>
                        <td>{{  \Carbon\Carbon::parse($data->created_at)->format('d-M-Y')  }}</td>
                        
                        <td>
                            Active
                        </td>
                        <td>
                            <a href=""><span class="iconify txt-secondary" data-icon="ant-design:eye-filled"></span></a>
                            {{-- <a href=""><span class="iconify txt-secondary" data-icon="ant-design:edit-filled"></span></a> --}}

                            <a href="#" data-id="{{$data->id}}"  data-bs-toggle="modal" data-bs-target="#editUser{{$data->id}}">
                                <span class="iconify txt-secondary" data-icon="ant-design:edit-filled"></span>
                            </a>

                            <a  id="deleteBtn" rid="{{$data->id}}"> <span class="iconify txt-primary" data-icon="bi:trash-fill"></span> </a>
                        </td>
                    </tr>


                    {{-- edit asset modal start  --}}

                    <!-- add new asset -->
                    <div class="modal fade" id="editUser{{$data->id}}" tabindex="-1" aria-labelledby="editUserLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title text-center" id="editUserLabel">Edit Asset</h6>
                                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="ermsg"></div>
                                <div class="modal-body">

                                    <form action="{{route('user.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="up_user_name" class="col-form-label">User Full Name</label>
                                            <input type="text" id="up_user_name" name="up_user_name" value="{{$data->name}}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="up_user_company_id" class="col-form-label">Company ID</label>
                                            <input type="text" id="up_user_company_id" value="{{$data->user_company_id}}" name="up_user_company_id" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="up_email" class="col-form-label">Email</label>
                                            <input type="email" id="up_email" value="{{$data->email}}" name="up_email" class="form-control">
                                        </div>
                                       
                                        <div class="mb-3">
                                            <label for="up_user_phone" class="col-form-label">Phone</label>
                                            <input type="text" id="up_user_phone" value="{{$data->phone}}" name="up_user_phone" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="up_user_position" class="col-form-label">Position:</label>
                                            <input type="text" id="up_user_position" value="{{$data->user_position}}" name="up_user_position" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="up_user_department" class="col-form-label">Department</label>
                                            <select name="up_user_department" id="up_user_department" class="form-control">
                                                <option value="dsfdsf" @if ($data->user_department == "dsfdsf") Selected @endif>dsfdsf</option>
                                                <option value="dsfdsf2" @if ($data->user_department == "dsfdsf2") Selected @endif>dsfdsf2</option>
                                                <option value="dsfdsf3" @if ($data->user_department == "dsfdsf3") Selected @endif>dsfdsf3</option>
                                                <option value="dsfdsf4" @if ($data->user_department == "dsfdsf4") Selected @endif>dsfdsf4</option>
                                            </select>
                                        </div>
                
                                        <div class="mb-3">
                                            <label for="up_permission" class="col-form-label">Permission</label>
                                            <select name="up_permission" id="up_permission" class="form-control" multiple>
                                                <option value="">Please Select</option>
                                                <option value="1"  @if ((trim($permission)==1)) Selected @endif>Admin</option>
                                                <option value="2"@if ((trim($permission)==2)) Selected @endif>Asset Manager</option>
                                                <option value="3"@if ((trim($permission)==3)) Selected @endif>User</option>
                                            </select>
                                        </div>
                
                                        <div class="mb-3">
                                            <label for="up_room" class="col-form-label">Room</label>
                                            <input type="text" id="up_room" name="up_room" value="{{$data->room}}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="up_building" class="col-form-label">Building</label>
                                            <input type="text" id="up_building" name="up_building" value="{{$data->building}}" class="form-control">
                                        </div>

                                    

                                </div>
                                <div class="modal-footer">
                                    <input type="submit" value="Update" class="btn btn-submit py-2 me-3">
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                    <!-- add new user -->


                    @endforeach
                    
                    
                    

                </tbody>
            </table>
        </div>

    </div>
</div>
	
<!-- add new user -->
<div class="modal fade" id="addNewUser" tabindex="-1" aria-labelledby="addNewUserLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title text-center" id="addNewAssetLabel">Add New User</h6>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="user_name" class="col-form-label">User Full Name</label>
                        <input type="text" id="user_name" name="user_name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="user_company_id" class="col-form-label">Company ID</label>
                        <input type="text" id="user_company_id" name="user_company_id" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="col-form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control">
                    </div>
                   
                    <div class="mb-3">
                        <label for="user_phone" class="col-form-label">Phone</label>
                        <input type="text" id="user_phone" name="user_phone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="user_position" class="col-form-label">Position:</label>
                        <input type="text" id="user_position" name="user_position" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="user_department" class="col-form-label">Department</label>
                        <select name="user_department" id="user_department" class="form-control">
                            <option value="dsfdsf">dsfdsf</option>
                            <option value="dsfdsf2">dsfdsf2</option>
                            <option value="dsfdsf3">dsfdsf3</option>
                            <option value="dsfdsf4">dsfdsf4</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="permission" class="col-form-label">Permission</label>
                        <select name="permission" id="permission" class="form-control" multiple>
                            <option value="">Please Select</option>
                            <option value="1">Admin</option>
                            <option value="2">Asset Manager</option>
                            <option value="3">User</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="room" class="col-form-label">Room</label>
                        <input type="text" id="room" name="room" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="building" class="col-form-label">Building</label>
                        <input type="text" id="building" name="building" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
                {{-- <button type="button" class="btn btn-submit py-2 me-3">Add User</button> --}}
                <input type="button" id="addUser" value="Add user" class="btn btn-submit py-2 me-3">
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>


    $(document).ready(function () {

        //header for csrf-token is must in laravel
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        //

        // asset update start

        var url = "{{URL::to('/admin/user-register')}}";

           $(".updateBtn").click(function(){

            // alert('update btn');
            // var file_data = $('#upimg').prop('files')[0];
            //     if(typeof file_data === 'undefined'){
            //         file_data = 'null';
            //     }

                
                var form_data = new FormData();
                // form_data.append('image', file_data);
                form_data.append("asset_id", $("#up_asset_id").val());
                form_data.append("company_id", $("#up_company_id").val());
                form_data.append("name", $("#up_name").val());
                form_data.append("category", $("#up_category").val());
                form_data.append("description", $("#up_description").val());
                form_data.append("manufacturer", $("#up_manufacturer").val());
                form_data.append("model", $("#up_model").val());
                form_data.append("brand", $("#up_brand").val());
                form_data.append("vendor", $("#up_vendor").val());
                form_data.append("serial_no", $("#up_serial_no").val());
                form_data.append("notes", $("#up_notes").val());
                form_data.append("asset_manager", $("#up_asset_manager").val());
                form_data.append("department", $("#up_department").val());
                form_data.append("location", $("#up_location").val());
                form_data.append("assetupid", $("#assetupid").val());

                  
                form_data.append("warranty", $("#up_warranty").prop('checked'));
                form_data.append("checkout", $("#up_checkout").prop('checked'));
                form_data.append("status", $("#up_status").prop('checked'));


                var assetupid= $("#assetupid").val();
                console.log(assetupid);

                // var c_donation= $('#confirm_donation').prop('checked');

                  form_data.append('_method', 'put');

                $.ajax({
                    url:url+'/'+$("#assetupid").val(),
                    type: "POST",
                    dataType: 'json',
                    contentType: false,
                    processData: false,
                    data:form_data,
                    success: function(d){
                        console.log(d);
                        if (d.status == 303) {
                            $(".ermsg").html(d.message);
                            pagetop();
                        }else if(d.status == 300){
                            success("Data Update Successfully!!");
                            // window.setTimeout(function(){location.reload()},2000)
                        }
                    },
                    
                    error:function(d){
                        console.log(d);
                    }
                });               

           });
        // end

        // console.log(url);
        
        //Delete
        $("#contentContainer").on('click','#deleteBtn', function(){
            if(!confirm('Sure?')) return;
            // $("#loading").show();
             masterid = $(this).attr('rid');
             info_url = url + '/'+masterid;
            console.log(info_url);
            //alert(info_url);
            $.ajax({
                url:info_url,
                method: "GET",
                type: "DELETE",
                data:{
                },
                success: function(d){
                    if(d.success) {
                        alert(d.message);
                        location.reload();
                    }
                },
                error:function(d){
                    console.log(d);
                }
            });
        });
        //Delete

        

        



       
        
    });

    
    
</script>
@endsection