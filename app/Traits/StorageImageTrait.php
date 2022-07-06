<?php
namespace App\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait {

    public function storageTraitUpload($request, $fieldName , $forderName)
    {
        if($request->hasFile($fieldName)){
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileName = Str::slug($request->name).'.'.$file->getClientOriginalExtension();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/'.$forderName.'/'.auth()->id(), $fileName);
            if (file_exists($filePath)) {
                return null;
            }else{
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;
        }
        }
        return null;
        //if
    }

    public function storageTraitUploadSlide($request, $fieldName , $forderName)
    {
        if($request->hasFile($fieldName)){
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileName = Str::slug($request->title).'.'.$file->getClientOriginalExtension();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/'.$forderName.'/'.auth()->id(), $fileName);
            if (file_exists($filePath)) {
                return null;
            }else{
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;
        }
        }
        return null;
        //if
    }

    public function storageTraitUploadultipe($request,$file , $forderName)
    {
            $fileNameOrigin = $file->getClientOriginalName();
            $fileName =  Str::random(4) .'.'.$file->getClientOriginalExtension();
            $fileNameHash = Str::random(20) . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/'.$forderName.'/'.auth()->id(), $fileName);
            
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin,
                'file_path' => Storage::url($filePath)
            ];
            return $dataUploadTrait;
        
    }
}