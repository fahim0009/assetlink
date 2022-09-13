<?php

namespace App\Http\Controllers;

use App\Models\Asset;
Use Image;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Auth;

class AssetManagerController extends Controller
{
    public function assetmanager()
    {
        return view('admin.assetmanager');
    }


    public function assetstore(Request $request)
    {

        // if(empty($request->asset_id)){
        //     $message ="<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please select asset id field.</b></div>";
        //     return response()->json(['status'=> 303,'message'=>$message]);
        //     exit();
        // }

        

        
        // if($request->checkout == "false"){
        //     $message ="<div class='alert alert-danger'>Please accept contidion.</div>";
        //     return response()->json(['status'=> 303,'message'=>$message]);
        //     exit();
        // }
        

        $data = new Asset;
        // intervention
        if ($request->image != 'null') {
            $originalImage= $request->file('image');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/images/thumbnail/';
            $originalPath = public_path().'/images/';
            $time = time();
            $thumbnailImage->save($originalPath.$time.$originalImage->getClientOriginalName());
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$time.$originalImage->getClientOriginalName());
            $data->image= $time.$originalImage->getClientOriginalName();
        }
        $data->asset_id = $request->asset_id;
        $data->company_id = $request->company_id;
        $data->name = $request->name;
        $data->category = $request->category;
        $data->description = $request->description;
        $data->manufacturer = $request->manufacturer;
        $data->model = $request->model;
        $data->brand = $request->brand;
        $data->vendor = $request->vendor;
        $data->serial_no = $request->serial_no;
        $data->notes = $request->notes;
        $data->asset_manager = $request->asset_manager;
        $data->department = $request->department;
        $data->location = $request->location;

        if($request->checkout == "true"){
            $data->checkout = "1";
        }

        if($request->status == "true"){
            $data->status = "1";
        }else{
            $data->status = "0";
        }

        if($request->warranty == "true"){
            $data->warranty = "1";
        }else{
            $data->warranty = "0";
        }

        $data->created_by = Auth::user()->id;

        if($data->save()){

            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Created Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }


    }


    public function update(Request $request, $id)
    {

        
        $data = Asset::find($id);
        // if ($request->up_image != 'null') {


        //     $request->validate([
        //         'up_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        //     ]);
        //     $rand = mt_rand(100000, 999999);
        //     $imageName = time(). $rand .'.'.$request->up_image->extension();
        //     $request->up_image->move(public_path('images'), $imageName);
        //     $data->image= $imageName;
        // }
        $data->asset_id = $request->up_asset_id;
        $data->company_id = $request->up_company_id;
        $data->name = $request->up_name;
        $data->category = $request->up_category;
        $data->description = $request->up_description;
        $data->manufacturer = $request->up_manufacturer;
        $data->model = $request->up_model;
        $data->brand = $request->up_brand;
        $data->vendor = $request->up_vendor;
        $data->serial_no = $request->up_serial_no;
        $data->notes = $request->up_notes;
        $data->asset_manager = $request->up_asset_manager;
        $data->department = $request->up_department;
        $data->location = $request->up_location;

        if($request->up_checkout == "true"){
            $data->checkout = "1";
        }else{
            $data->checkout = "0"; 
        }

        if($request->up_status == "true"){
            $data->status = "1";
        }else{
            $data->status = "0";
        }

        if($request->up_warranty == "true"){
            $data->warranty = "1";
        }else{
            $data->warranty = "0";
        }

        $data->updated_by = Auth::user()->id;

        if($data->save()){

            return redirect()->route('assetmanager');
        }


    }


    public function update2(Request $request, $id)
    {


        
        $data = Asset::find($request->assetupid);
        // intervention
        if ($request->image != 'null') {
            $originalImage= $request->file('image');
            $thumbnailImage = Image::make($originalImage);
            $thumbnailPath = public_path().'/images/thumbnail/';
            $originalPath = public_path().'/images/';
            $time = time();
            $thumbnailImage->save($originalPath.$time.$originalImage->getClientOriginalName());
            $thumbnailImage->resize(150,150);
            $thumbnailImage->save($thumbnailPath.$time.$originalImage->getClientOriginalName());
            $data->image= $time.$originalImage->getClientOriginalName();
        }
        $data->asset_id = $request->asset_id;
        $data->company_id = $request->company_id;
        $data->name = $request->name;
        $data->category = $request->category;
        $data->description = $request->description;
        $data->manufacturer = $request->manufacturer;
        $data->model = $request->model;
        $data->brand = $request->brand;
        $data->vendor = $request->vendor;
        $data->serial_no = $request->serial_no;
        $data->notes = $request->notes;
        $data->asset_manager = $request->asset_manager;
        $data->department = $request->department;
        $data->location = $request->location;

        if($request->checkout == "true"){
            $data->checkout = "1";
        }else{
            $data->checkout = "0"; 
        }

        if($request->status == "true"){
            $data->status = "1";
        }else{
            $data->status = "0";
        }

        if($request->warranty == "true"){
            $data->warranty = "1";
        }else{
            $data->warranty = "0";
        }

        $data->updated_by = Auth::user()->id;

        if($data->save()){

            $message ="<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Data Updated Successfully.</b></div>";
            return response()->json(['status'=> 300,'message'=>$message]);
        }


    }


    public function delete($id)
    {
        
        if(Asset::destroy($id)){
            return response()->json(['success'=>true,'message'=>'Listing Deleted']);
        }
        else{
            return response()->json(['success'=>false,'message'=>'Update Failed']);
        }
    }

}
