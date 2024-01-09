<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PropertyType;
use App\Models\Amenities;

use Illuminate\Support\Facades\Auth;

class PropertyTypeController extends Controller
{
    //
    public function AllType()
    {
        $types = PropertyType::latest()->get();
        return view('backend/type/allType', compact('types'));
    }

    public function addType()
    {
        return view('backend/type/addType');
    }

    public function storeType(Request $request)
    {
        $request->validate([
            'type_name' => 'required|unique:property_types|max:200',
            'type_icon' => 'required',

        ]);

        PropertyType::insert([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,

        ]);

        $notification = array('message' => 'property type addedd successfullly', 'alert-type' => 'success');
        return redirect()->route('allType')->with($notification);
    }

    public function  edit_type($id)
    {
        $type = PropertyType::findOrFail($id);
        return view('backend/type/editType', compact('type'));
    }


    public function updateType(Request $request)
    {

        $pid = $request->id;


        PropertyType::findOrFail($pid)->update([
            'type_name' => $request->type_name,
            'type_icon' => $request->type_icon,

        ]);

        $notification = array('message' => 'property type updated successfullly', 'alert-type' => 'success');
        return redirect()->route('allType')->with($notification);
    }


    public function  delete_type($id)
    {
        $type = PropertyType::findOrFail($id)->delete();
        $notification = array('message' => 'property type deleted successfullly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }



    public function allAmenitie()
    {
        $amenities = Amenities::latest()->get();
        return view('backend/amenities/allAmenities', compact('amenities'));
    }


    public function addAmenities()
    {
        return view('backend/amenities/addAmenities');
    }


    public function storeAmenities(Request $request)
    {


        Amenities::insert([
            'amenities_name' => $request->Amenities_name,

        ]);

        $notification = array('message' => 'Amenities created successfullly', 'alert-type' => 'success');
        return redirect()->route('allAmenitie')->with($notification);
    }


    public function  edit_amenities($id)
    {
        $amenities = Amenities::findOrFail($id);
        return view('backend/amenities/editAmenities', compact('amenities'));
    }

    public function updateAmenities(Request $request)
    {

        $pid = $request->id;
        echo $pid;


        Amenities::findOrFail($pid)->update([
            'amenities_name' => $request->Amenities_name,

        ]);

        $notification = array('message' => 'Amenities updated successfullly', 'alert-type' => 'success');
        return redirect()->route('allAmenitie')->with($notification);
    }


    public function  delete_amenities($id)
    {
        $Amenities = Amenities::findOrFail($id)->delete();
        $notification = array('message' => 'Amenities deleted successfullly', 'alert-type' => 'success');

        return redirect()->back()->with($notification);
    }
}
