<?php

use Illuminate\Support\Facades\Route;
use App\Models\{HomePageCarousel, Setting, SocialMediaLink};

if (!function_exists('getSettings')) {
    function getSettings()
    {
        return Setting::first();
    }
}

if (!function_exists('getSocialMediaLink')) {
    function getSocialMediaLink()
    {
        return SocialMediaLink::first();
    }
}

if (!function_exists('getAllSlider')) {
    function getAllSlider($param = 'all')
    {
        if ($param == 1) {
            return HomePageCarousel::where('status', 1)->orderBy('created_at', 'DESC')->get();
        } elseif ($param == 0) {
            return HomePageCarousel::where('status', 0)->orderBy('created_at', 'ASC')->get();
        } elseif ($param == 'all') {
            return HomePageCarousel::orderBy('id', 'DESC')->get();
        } else {
            return collect([]);
        }
    }
}

if (!function_exists('deletePublicPathFiles')) {
    function deletePublicPathFiles($path)
    {
        // Delete the image file from the public/uploads directory
        if (file_exists($path)) {
            unlink($path);
        }
    }
}

if (!function_exists('public_asset')) {
    function public_asset($path = '')
    {
        // dd(url($path));
        return url('public/' . $path);
    }
}

function isActiveRoute($route, $output = 'active')
{
    if (is_array($route)) {
        if (in_array(Route::currentRouteName(), $route)) {
            return $output;
        }
    } else {
        if (Route::currentRouteName() == $route) {
            return $output;
        }
    }
}


if (!function_exists('printArray')) {
    function printArray()
    {
        $params = func_get_args();

        echo "<pre>";
        foreach ($params as $p) {
            print_r($p);
        }
        echo "</pre>";
        die;
    }
}

if (!function_exists('returnWebResponse')) {
    function returnWebResponse($status = 'error', $message = null, $data = null)
    {
        return array(
            'status' => $status,
            'message' => $message,
            'data' => $data
        );
    }
}

if (!function_exists('returnWebJsonResponse')) {
    function returnWebJsonResponse($message = null, $status = 'error',  $data = [])
    {
        return response()->json(array(
            'status' => $status,
            'message' => $message,
            'data' => $data
        ));
    }
}

if (!function_exists('explodeEmail')) {
    function explodeEmail($all_email = null)
    {
        if(!empty($all_email)){
            $emails = explode(',', $all_email);
            if(count($emails) > 0){
                foreach($emails as $key => $email){
                    echo "<a href='mailto:".$email."'>".$email."</a> <br>";
                }
            }
            return false;
        }
        return false;
    }
}

// $settings = getSettings();
// $social = getSocialMediaLink();
