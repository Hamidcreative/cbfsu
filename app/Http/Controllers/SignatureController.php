<?php

namespace App\Http\Controllers;

use App\DataTables\SignatureDataTable;
use App\Models\Bond;
use App\Models\Signature;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    use FileUploadTrait;
    public function index(SignatureDataTable $dataTable){
        return $dataTable->render('signature.index');
    }

    public function create(){
        $bonds = Bond::get();
        return view('signature.create',compact('bonds'));
    }

    public function store(Request $request){
        $request->validate([
            'name'             =>  'required',
            'attachment_type'  =>  'required|gt:0',
            'attachment'       =>  'required',
            'bond_id'          =>  'required|gt:0',
        ],
        [
            'attachment_type'  =>  'The attachment type field is required.',
            'bond_id.gt'       =>  'The Bond field is required.',
        ]);
        $data   =   [
            'name'             =>  $request['name'],
            'bond_id'          =>  $request['bond_id'],
            'attachment_type'  =>  $request['attachment_type'],
        ];
        if($request->has('attachment') && gettype($request->attachment)=="object")
        {
            $fileUploadResponse = $this->uploadFile($request->file('attachment'), 'images/bonds/');
            if (isset($fileUploadResponse['success']) && $fileUploadResponse['success'] == TRUE )
            {
                $data['attachment'] = $fileUploadResponse['filename'];
            }
        }
        Signature::create($data);
        return response()->json([
            'success' => true,
            'message' => 'Seal/Signature Created Successfully!',
            'close_modal' => true,
            'table' => 'signatures'
        ]);
    }
    public function edit($id){
        $d_id       =   mws_encrypt('D',$id);
        $signature  =   Signature::where('id',$d_id)->first();
        $bonds      =   Bond::get();
        return view('signature.edit',compact('signature','bonds'));
    }

    public function update(Request $request){
        $request->validate([
            'name'             =>  'required',
            'attachment_type'  =>  'required|gt:0',
            'attachment'       =>  'required',
            'bond_id'          =>  'required|gt:0',
        ],
        [
            'attachment_type'  =>  'The attachment type field is required.',
            'bond_id.gt'       =>  'The Bond field is required.',
        ]);

        $data   =   [
            'name'             =>  $request['name'],
            'attachment_type'  =>  $request['attachment_type'],
            'bond_id'          =>  $request['bond_id'],
        ];
        if($request->has('attachment') && gettype($request->attachment)=="object")
        {
            $fileUploadResponse = $this->uploadFile($request->file('attachment'), 'images/bonds/');
            if (isset($fileUploadResponse['success']) && $fileUploadResponse['success'] == TRUE )
            {
                $data['attachment'] = $fileUploadResponse['filename'];
            }
        }

        Signature::where('id',$request['id'])->update($data);
        return response()->json([
            'success' => true,
            'message' => 'Seal/Signature updated Successfully!',
            'close_modal' => true,
            'table' => 'signatures'
        ]);
    }

    public function detail($id)
    {
        $d_id       =   mws_encrypt('D',$id);
        $signature  =   Signature::where('id',$d_id)->first();
        $bond       =   Bond::where('id',$signature->bond_id)->first();
        return view('signature.detail',compact('signature','bond'));
    }

    public function destroy($id){
        $d_id   =   mws_encrypt('D',$id);
        $signature = Signature::find($d_id);
        if ($signature) {
            $signature->delete();
        }
        return response()->json([
            'success' => true,
            'message' => "Signature Deleted Successfully!",
            'close_modal' => true,
            'table' => 'signatures'
        ]);
    }

}
