<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Marker;
use Validator;

class MarkerController extends Controller
{
    /**
     * methode : get
     * return @value : all object Marker
     */
    public function listMarker()
    {
        $marker = Marker::all();
        if($marker->count() == 0){
            return [
                'msg'=>'no marker added yet'
            ];
        }
        return $marker;
    }

    /**
     * methode : post
     * return response status, object request
     */
    public function addMarker(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'          => 'required|string|min:3|max:255',
            'description'   => 'required|max:200',
            'latitude'      => 'required|string|min:6',
            'longitude'     => 'required|string|min:6'
        ]);

        if($validator->fails()){
            return [
                'response'=>$validator->errors()
            ];
        }

        $marker = new Marker;
        $marker->name           = $request->name;
        $marker->description    = $request->description;
        $marker->latitude       = $request->latitude;
        $marker->longitude      = $request->longitude;

        if($marker->save()){
            return [
                'status'    => 'success',
                'object'    => $marker
            ];
        }
        return [
            'status'    => 'failed',
            'object'    => null
        ];
    }

    /**
     * methode : put
     * return status
     */
    public function deleteMarker(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id'    => 'required|min:1|integer'
        ]);

        if($validator->fails()){
            return [
                'status'=>'warning',
                'msg'=>$validator->errors()
            ];
        }

        $marker = Marker::find($request->id);
        if($marker == null){
            return [
                'msg'=>'object id not found'
            ];
        }
        if($marker->delete()){
            return [
                'status'=>'success',
                'msg'=>'marker has been deleted'
            ];
        }return [
            'status'=>'warning',
            'msg'=>'failed to delete marker'
        ];
    }

    /**
     * methode : put
     * return obj update
     */
    public function updateMarker(Request $request, $id)
    {
        $marker = Marker::checkMarkerHasID($id);
        // dd($marker);
        if($marker["has"] == false){
            return [
                'msg'=>'no marker id'
            ];
        }
        // return $marker;

        $validator = Validator::make($request->all(),[
            'name'          => 'required',
            'description'   => 'required',
            'latitude'      => 'required',
            'longitude'     => 'required'
        ]);
        
        if($validator->fails()){
            return [
                'status'=>'warning',
                'msg'=>$validator->errors()
            ];
        }

        $markerUpdate = $marker['object'];
        $markerUpdate->name = $request->name;
        $markerUpdate->description = $request->description;
        $markerUpdate->latitude = $request->latitude;
        $markerUpdate->longitude = $request->longitude;
        
        if($markerUpdate->update()){
            return [
                'status'=>'success',
                'msg'=>'success update'
            ];
        }
        return [
            'status'=>'error',
            'msg'=>'failed to update'
        ];
    }

    /**
     * methode : post
     * return value object marker by requrest id
     */
    public function markerID(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'id'    => 'required|min:1|integer'
        ]);

        if($validator->fails()){
            return [
                'status'=>'warning',
                'msg'=>$validator->errors()
            ];
        }
        
        $marker = Marker::checkMarkerHasID($request->id);
        return $marker;
    }
}
