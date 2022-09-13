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
                <a href="#" data-bs-toggle="modal" data-bs-target="#addNewAsset" class="btn-theme">
                    <span class="iconify" data-icon="bxs:book-add"></span> Add New Asset
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
                        <th>Brand</th>
                        <th>Asset Id</th>
                        <th>Model</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Document</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach (\App\Models\Asset::orderby('id','DESC')->get() as $data)
                    <tr>
                        <td style="width: 15%;">{{ $data->name }}</td>
                        <td>{{ $data->company_id }}</td>
                        <td>{{ $data->brand }}</td>
                        <td>{{ $data->asset_id }}</td>
                        <td>{{ $data->model }}</td>
                        <td>{{ $data->category }}</td>
                        <td>{{  \Carbon\Carbon::parse($data->created_at)->format('d-M-Y')  }}</td>
                        <td>
                            <a href=""><span class="iconify txt-primary" data-icon="bi:camera-fill"></span></a>
                            <a href=""> <span class="iconify txt-secondary"
                                    data-icon="entypo:text-document-inverted"></span></a>
                        </td>
                        <td>
                            Active
                        </td>
                        <td>
                            <a href=""><span class="iconify txt-secondary" data-icon="ant-design:eye-filled"></span></a>
                            {{-- <a href=""><span class="iconify txt-secondary" data-icon="ant-design:edit-filled"></span></a> --}}

                            <a href="#" data-id="{{$data->id}}"  data-bs-toggle="modal" data-bs-target="#editAsset{{$data->id}}">
                                <span class="iconify txt-secondary" data-icon="ant-design:edit-filled"></span>
                            </a>

                            <a  id="deleteBtn" rid="{{$data->id}}"> <span class="iconify txt-primary" data-icon="bi:trash-fill"></span> </a>
                        </td>
                    </tr>


                    {{-- edit asset modal start  --}}

                    <!-- add new asset -->
                    <div class="modal fade" id="editAsset{{$data->id}}" tabindex="-1" aria-labelledby="editAssetLabel" aria-hidden="true">
                        <div class="modal-dialog  modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title text-center" id="editAssetLabel">Edit Asset</h6>
                                    <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="ermsg"></div>
                                <div class="modal-body">

                                    <form action="{{route('asset.update',$data->id)}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="up_image" class="col-form-label">Photo</label>
                                            <input type="file" id="up_image" name="up_image" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="up_asset_id" class="col-form-label">Asset ID</label>
                                            <input type="number" id="up_asset_id" value="{{$data->asset_id}}" name="up_asset_id" class="form-control">

                                            <input type="hidden" value="{{$data->id}}" id="assetupid" name="assetupid">
                                        </div>
                                        <div class="mb-3">
                                            <label for="up_company_id" class="col-form-label">Company ID Number</label>
                                            <input type="number" id="up_company_id" value="{{$data->company_id}}" name="up_company_id" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="up_name" class="col-form-label">Name</label>
                                            <input type="text" id="up_name" name="up_name" value="{{$data->name}}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="up_category" class="col-form-label">Category</label>
                                            <input type="text" id="up_category" name="up_category" value="{{$data->category}}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="up_description" class="col-form-label">Desctiption:</label>
                                            <textarea class="form-control" id="up_description" name="up_description">{{$data->description}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="up_manufacturer" class="col-form-label">Manufacturer</label>
                                            <input type="text" id="up_manufacturer" name="up_manufacturer"  value="{{$data->manufacturer}}"class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="up_model" class="col-form-label">Model</label>
                                            <input type="text" id="up_model" name="up_model" value="{{$data->model}}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="up_brand" class="col-form-label">Brand</label>
                                            <input type="text" id="up_brand" name="up_brand" value="{{$data->brand}}" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="up_vendor" class="col-form-label">Vendor</label>
                                            <input type="text" id="up_vendor" name="up_vendor" value="{{$data->vendor}}" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="up_serial_no" class="col-form-label">Serial Number: </label>
                                            <input type="number" id="up_serial_no" name="up_serial_no" value="{{$data->serial_no}}" class="form-control">
                                        </div>

                                        <div class="mb-3 d-flex align-items-center">
                                            <label for="up_warranty" class="col-form-label">Warranty: </label>
                                            <div class="ms-3 d-flex">
                                                <div class="me-2"> Yes <input type="radio" name="up_warranty" id="up_warranty" class="" {{ $data->warranty === 1  ? 'checked' : '' }}></div>
                                                <div class="me-2"> No <input type="radio" name="up_warranty" id="up_warranty" class="" {{ $data->warranty === 1  ? '' : 'checked' }}></div>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="notes" class="col-form-label">Notes:</label>
                                            <textarea class="form-control" id="up_notes" name="up_notes" >{{$data->notes}}</textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="up_asset_manager" class="col-form-label">Asset Manager</label>
                                            <input type="text" id="up_asset_manager"  value="{{$data->asset_manager}}" name="up_asset_manager" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="up_department" class="col-form-label">Department</label>
                                            <input type="text" id="up_department" value="{{$data->department}}" name="up_department" class="form-control">
                                        </div>

                                        <div class="mb-3">
                                            <label for="up_location" class="col-form-label">Location</label>
                                            <input type="text" id="up_location"  value="{{$data->location}}" name="up_location" class="form-control">
                                        </div>
                                        <div class="mb-3">


                                        </div>
                                        <div class="form-check form-switch d-flex align-items-center">
                                            <input class="form-check-input" type="checkbox" role="switch" id="up_checkout" name="up_checkout" {{ $data->checkout === "1"  ? 'checked' : '' }} >
                                            <label for="checkout" class="col-form-label ms-2">Eligible for check-out </label>
                                        </div>
                                        <div class="mb-3 d-flex flex-column  ">
                                            <label for="status" class="col-form-label">Status: </label>
                                            <div class=" d-flex">
                                                <div class="me-2"><input type="radio" name='up_status' id="up_status" value="0" class="" {{ $data->status === 1  ? 'checked' : '' }}> Available </div>
                                                <div class="me-2"><input type="radio" name='up_status' value="1" id="status" class="" {{ $data->status === 0  ? 'checked' : '' }}> Checked out</div>
                                            </div>
                                        </div>

                                    

                                </div>
                                <div class="modal-footer">
                                    {{-- <input type="submit" id="updateBtn{{$data->id}}" value="Update" class="btn btn-submit py-2 me-3 updateBtn"> --}}
                                    <input type="submit" value="Update" class="btn btn-submit py-2 me-3">
                                    {{-- <input type="submit" class="btn btn-primary" value="Save changes"> --}}
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
	

@endsection

@section('scripts')

<script>


    $(document).ready(function () {

        //header for csrf-token is must in laravel
        $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });
        //

        // asset update start

        var url = "{{URL::to('/admin/assetmanager')}}";

           $(".updateBtn").click(function(){

            // alert('update btn');
            var file_data = $('#up_image').prop('files')[0];
                if(typeof file_data === 'undefined'){
                    file_data = 'null';
                }

                
                var form_data = new FormData();
                form_data.append('image', file_data);
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