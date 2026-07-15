<?php

namespace App\Services;

use App\Models\Resume;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser;

class ResumeService
{
    private Parser $parser;

    public function __construct()
    {
        $this->parser = new Parser();
    }

    public function upload(
        UploadedFile $file,
        int $userId
    ): Resume {
        return DB::transaction(function () use ($file, $userId) {
            $path = $file->store(
                'resumes',
                'public'
            );
            $extractedText = null;
            if ($file->extension() === 'pdf') {
                $pdf = $this->parser
                    ->parseFile(storage_path('app/public/' . $path));
                $extractedText = $pdf->getText();
            }

            return Resume::create([

                'user_id' => $userId,

                'file_name' => $file->getClientOriginalName(),

                'file_path' => $path,

                'file_type' => $file->extension(),

                'extracted_text' => $extractedText,
            ]);
        });
    }

    public function getUserResumes(int $userId)
    {
        return Resume::where('user_id', $userId)->latest()->get();
    }

    public function delete(Resume $resume)
    {
        return DB::transaction(function () use ($resume) {
            if (Storage::disk('public')
                ->exists($resume->file_path)
            ) {
                Storage::disk('public')->delete($resume->file_path);
            }
            return $resume->delete();
        });
    }
}
