<?php
namespace App\Helpers;

use Illuminate\Support\Facades\Storage;

class Helper
{
    public static function get_lampiran($file)
    {
        $theFile = explode('.', $file);
        $ext = end($theFile);
        switch ($ext) {
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'bmp':
                $file = '<img src="' . url(Storage::url($file)) . '" alt="" width="120" class="p-2">';
                break;
            case 'pdf':
                $file = '<div class="demo-icon">
                            <div class="icon-preview">
                                <img src="'. asset('images/default_pdf.png') .'" width="100">
                            </div>
                            <a href='. url(Storage::url($file)) .' target="_blank" class="btn btn-xs btn-secondary">Download PDF</a>
                        </div>';
                break;
            case 'doc':
            case 'docx':
                $file = '<div class="demo-icon">
                            <div class="icon-preview">
                                <img src="'. asset('images/default_doc.png') .'" width="100">
                            </div>
                            <a href='. url(Storage::url($file)) .' target="_blank" class="btn btn-xs btn-secondary">Download Word</a>
                        </div>';
                break;

            default:
                $file = '-';
                break;
        }
        return $file;
    }
}

?>
