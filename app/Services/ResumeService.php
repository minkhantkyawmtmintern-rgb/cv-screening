<?php

namespace App\Services;

use App\Models\Resume;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ResumeService
{
    public function upload(
        UploadedFile $file,
        int $userId
    ): Resume {
        return DB::transaction(function () use ($file, $userId) {
            $path = $file->store(
                'resumes',
                'public'
            );

            return Resume::create([

                'user_id' => $userId,

                'file_name' => $file->getClientOriginalName(),

                'file_path' => $path,

                'file_type' => $file->extension(),

            ]);
        });
    }

    public function getUserResumes(int $userId)
    {
        return Resume::where('user_id', $userId)->latest()->get();
    }

    public function delete(Resume $resume)
    {
        return DB::transaction(function() use($resume){
            if(Storage::disk('public')
                ->exists($resume->file_path))
            {
                Storage::disk('public')->delete($resume->file_path);
            }
            return $resume->delete();
        });
    }
}
