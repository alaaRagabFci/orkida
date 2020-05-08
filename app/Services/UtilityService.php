<?php

namespace App\Services;
use Illuminate\Http\Request;


class UtilityService
{
    private $request, $validExtensions;
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->validExtensions = array("jpg", "JPG", "png","PNG", "jpeg", "JPEG", "GIF","gif", "webp"," WEBP", "svg","SVG", "txt", "bin");
    }

    /**
     * upload image.
     * @param $image
     * @author Alaa <alaaragab34@gmail.com>
     */
    public function uploadImage($image, $type)
    {
        $file = $image;
        $errors = [];
        // Check file size
        if ($file->getSize() > 5000000 ) {
            $errors[] = "Sorry, your file is too large.";
        }

        $extension = $file->guessExtension();

        // Allow certain file formats
        if(!in_array($extension, $this->validExtensions)) {
            $errors[] = $file->guessExtension() . " extension not allowed, only JPG, JPEG, PNG, GIF, SVG, WEBP files are allowed.";
        }

        // Check if erros is greater than 0
        if (count($errors) > 0) {
            return array('status' => false, 'errors' => $errors);
        } else {
            if($extension == 'txt' || $extension == 'svg')
                $filename=time().md5(uniqid(rand(), true))."svg" .".svg";
            else if($extension == 'bin' || $extension == 'webp')    
                $filename=time().md5(uniqid(rand(), true))."webp" .".webp";
            else    
                $filename=time().md5(uniqid(rand(), true))."image" .".png";
            $file->move('uploads/'.$type.'/', $filename);
//            $this->request->getSchemeAndHttpHost(). $this->request->getBasePath() .
            $fullPath = 'uploads/'.$type. '/' .$filename;
            return array('status' => true, 'image' => $fullPath);
        }

    }

}
