<?php

use App\Models\Countrie;
use App\Models\Puja;
use App\Models\Temple;
use Illuminate\Support\Str;
use Intervention\Image\Image;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

if (!function_exists('isSluggable')) {
    function isSluggable($value)
    {
        return Str::slug($value);
    }
}

if (!function_exists('isMobileDevice')) {
    function isMobileDevice()
    {
        return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo
                            |fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i"
            , $_SERVER["HTTP_USER_AGENT"]
        );
    }
}

if (!function_exists('getCountry')) {
    function getCountry($country_id)
    {
        $data = Countrie::all();
        // dd($data);
        foreach ($data as $key => $val) {
            if ($country_id == $val->id) {
                echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
            } else {
                echo "<option value='" . $val->id . "' >" . $val->name . "</option>";
            }

        }
    }
}
if (!function_exists('getTemple')) {
    function getTemple($temple_id)
    {
        $data = Temple::all();
        // dd($data);
        foreach ($data as $key => $val) {
            if ($temple_id == $val->id) {
                echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
            } else {
                echo "<option value='" . $val->id . "' >" . $val->name . "</option>";
            }

        }
    }
}

if (!function_exists('getPuja')) {
    function getPuja($puja_id)
    {
        $data = Puja::all();
        // dd($data);
        foreach ($data as $key => $val) {
            if ($puja_id == $val->id) {
                echo "<option value='" . $val->id . "' selected>" . $val->name . "</option>";
            } else {
                echo "<option value='" . $val->id . "' >" . $val->name . "</option>";
            }

        }
    }
}



//   public function store(Request $request)
//     {
//       $this->validate($request, [
//             'files' => 'required'
//         ]);

//         $files = [];
//         if($request->hasfile('files')){
//           foreach($request->file('files') as $file){
//               $name = time().rand(1,100).'.'.$file->extension();
//               $file->move(public_path('files'), $name);
//               $files[] = $name;
//           }
//       }

//     File::create(['files' => json_encode($files)]);

//         return back()->with('success', 'Files uploaded successfully');
//     }



if (!function_exists('sidebar_open')) {
    function sidebar_open($routes = [])
    {
        $currRoute = Route::currentRouteName();
        $open = false;
        foreach ($routes as $route) {
            if (str_contains($route, '*')) {
                if (str_contains($currRoute, substr($route, 0, strpos($route, '*')))) {
                    $open = true;
                    break;
                }
            } else {
                if ($currRoute === $route) {
                    $open = true;
                    break;
                }
            }
        }

        return $open ? 'active' : '';
    }
}
if (!function_exists('sidebar_menu_open')) {
    function sidebar_menu_open($routes = [])
    {
        $currRoute = Route::currentRouteName();
        $open = false;
        foreach ($routes as $route) {
            if (str_contains($route, '*')) {
                if (str_contains($currRoute, substr($route, 0, strpos($route, '*')))) {
                    $open = true;
                    break;
                }
            } else {
                if ($currRoute === $route) {
                    $open = true;
                    break;
                }
            }
        }

        return $open ? 'menu-is-opening menu-open' : '';
    }
}


if (!function_exists('genrateOtp')) {
    function genrateOtp($digit = 6)
    {
        $generator = "1357902468";
        $result = "";
        for ($i = 1; $i <= $digit; $i++) {
            $result .= substr($generator, (rand() % (strlen($generator))), 1);
        }
        return $result;
    }
}

if (!function_exists('getS3URL')) {
    function getS3URL($filePath, $fileType = '', $fileAccessMode = 'private')
    {
        $storageDisk = Storage::disk('s3');

        if ($storageDisk->exists($filePath)) {
            if ($fileAccessMode == 'public') {
                $url = $storageDisk->url($filePath);
            } else if ($fileAccessMode == 'private') {
                $url = $storageDisk->temporaryUrl(
                    $filePath, now()->addMinutes(10080)
                );
            }

            return $url;
        } else {
            if ($fileType == 'profilePicture') {
                return asset('assets/frontend/images/no-profile-picture.jpeg');
            } else if ($fileType == 'postImage') {
                //return 'https://dummyimage.com/540x400/ffffff/2a3680.png&text=Unable+to+load+this+file';
                return asset('assets/frontend/images/no-image-medium.png');
            } else if ($fileType == 'collectionImage') {
                //return 'https://dummyimage.com/150x150/ffffff/2a3680.png&text=Unable+to+load+this+file';
                return asset('assets/frontend/images/no-image-small.png');
            } else if ($fileType == 'profilePhotoId') {
                return asset('assets/frontend/images/file-not-found.png');
            } else if ($fileType == 'cityImage') {
                return asset('assets/frontend/images/location-placeholder.jpeg');
            } else {
                return false;
            }
        }
    }
}

if (!function_exists('imageResizeAndSave')) {
    function imageResizeAndSave($imageUrl, $type = 'post/image', $filename = null)
    {
        if (!empty($imageUrl)) {
            Storage::disk('public')->makeDirectory($type . '/60x60');
            $path60X60 = storage_path('app/public/' . $type . '/60x60/' . $filename);
            $image = Image::make($imageUrl)->resize(
                null,
                60,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );
            //$canvas->insert($image, 'center');
            $image->save($path60X60, 70);

            //save 350X350 image
            Storage::disk('public')->makeDirectory($type . '/350x350');
            $path350X350 = storage_path('app/public/' . $type . '/350x350/' . $filename);
            $image = Image::make($imageUrl)->resize(
                null,
                350,
                function ($constraint) {
                    $constraint->aspectRatio();
                }
            );

            $image->save($path350X350, 75);

            return $filename;
        } else {
            return false;
        }
    }
}

if (!function_exists('siteSetting')) {
    function siteSetting($key = '')
    {
        return \App\Models\Setting\Setting::where('key', $key)->value('value');
    }
}

if (!function_exists('uuidtoid')) {
    function uuidtoid($uuid, $table)
    {
        $dbDetails = DB::table($table)
            ->select('id')
            ->where('uuid', $uuid)->first();

        if ($dbDetails) {
            return $dbDetails->id;
        } else {
            abort(404);
        }
    }
}
if (!function_exists('slugtoname')) {
    function slugtoname($slug, $table)
    {
        $dbDetails = DB::table($table)
            ->select('name')
            ->where('slug', $slug)->first();

        if ($dbDetails) {
            return $dbDetails->name;
        } else {
            abort(404);
        }
    }
}
if (!function_exists('slugtoid')) {
    function slugtoid($slug, $table)
    {
        $dbDetails = DB::table($table)
            ->select('id')
            ->where('slug', $slug)->first();

        if ($dbDetails) {
            return $dbDetails->id;
        } else {
            abort(404);
        }
    }
}

if (!function_exists('nametoslug')) {
    function nametoslug($name, $table)
    {
        $dbDetails = DB::table($table)
            ->select('slug')
            ->where('name', $name)->first();
        // return $dbDetails;
        if ($dbDetails) {
            return $dbDetails->slug;
        } else {
            abort(404);
        }
    }
}
if (!function_exists('slugtoid')) {
    function slugtoid($slug, $table)
    {
        $dbDetails = DB::table($table)
            ->select('id')
            ->where('slug', $slug)->first();

        if ($dbDetails) {
            return $dbDetails->id;
        } else {
            abort(404);
        }
    }
}

if (!function_exists('customfind')) {
    function customfind($id, $table)
    {
        $dbDetails = DB::table($table)
            ->find($id);
        if ($dbDetails) {
            return $dbDetails;
        } else {
            abort(404);
        }
    }
}

if (!function_exists('safe_b64encode')) {
    function safe_b64encode($string)
    {
        $pretoken = "";
        $posttoken = "";

        $codealphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $codealphabet .= "abcdefghijklmnopqrstuvwxyz";
        $codealphabet .= "0123456789";
        $max = strlen($codealphabet); // edited

        for ($i = 0; $i < 3; $i++) {
            $pretoken .= $codealphabet[rand(0, $max - 1)];
        }

        for ($i = 0; $i < 3; $i++) {
            $posttoken .= $codealphabet[rand(0, $max - 1)];
        }

        $string = $pretoken . $string . $posttoken;
        $data = base64_encode($string);
        $data = str_replace(array('+', '/', '='), array('-', '_', ''), $data);
        return $data;
    }
}

if (!function_exists('safe_b64decode')) {
    function safe_b64decode($string)
    {
        $data = str_replace(array('-', '_'), array('+', '/'), $string);
        $mod4 = strlen($data) % 4;
        if ($mod4) {
            $data .= substr('====', $mod4);
        }

        $data = base64_decode($data);
        $data = substr($data, 3);
        $data = substr($data, 0, -3);

        return $data;
    }
}

if (!function_exists('customEcho')) {
    function customEcho($str, $length)
    {
        if (strlen($str) <= $length)
            return $str;
        else
            return substr($str, 0, $length) . '...';
    }
}

if (!function_exists('trasactionPriceBreakUp')) {
    function trasactionPriceBreakUp($purchaseItemPrice)
    {
        $purchaseItemVatPrice = 0;

        $purchaseItemVatPrice = 0;


        $purchaseItemTotalPrice = ($purchaseItemPrice + $purchaseItemVatPrice);

        return [
            'purchaseItemPrice' => $purchaseItemPrice,
            'purchaseItemVatPrice' => $purchaseItemVatPrice,
            'purchaseItemTotalPrice' => $purchaseItemTotalPrice
        ];
    }
}

if (!function_exists('formatTime')) {
    function formatTime($time)
    {
        return Carbon::parse($time)->format('dS M, Y, \\a\\t\\ g:i A');
    }
}

// if (!function_exists('getSiteSetting')) {
//     function getSiteSetting($key)
//     {
//         return \App\Models\Setting\Setting::where('key', $key)->value('value');
//     }
// }

if (!function_exists('mime_check')) {
    function mime_check($path)
    {
        if ($path) {
            $typeArray = explode('.', $path);
            $fileType = strtolower($typeArray[count($typeArray) - 1]) ?? 'jpg';
            switch ($fileType) {
                case 'png':
                    $image = 'image/png';
                    break;
                case 'jpg':
                    $image = 'image/jpg';
                    break;
                case 'jpeg':
                    $image = 'image/jpg';
                    break;
                case 'webp':
                    $image = 'image/webp';
                    break;
                case 'mp4':
                    $image = 'video/mp4';
                    break;
                case 'webm':
                    $image = 'video/webm';
                    break;
                default:
                    $image = 'image/*';
                    break;
            }
            return $image;
        }
        return 'image/*';
    }
}

if (!function_exists('getVideoCode')) {
    function getVideoCode($url)
    {
        if (str_contains($url, '?v=')) {
            parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
            return $my_array_of_vars['v'];
        } else {
            parse_str(parse_url($url, PHP_URL_PATH), $my_array_of_vars);
            return preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', array_keys($my_array_of_vars)[0]);
        }
    }
}



if (!function_exists('getVideoCode')) {
    function getVideoCode($url)
    {
        if (str_contains($url, '?v=')) {
            parse_str(parse_url($url, PHP_URL_QUERY), $my_array_of_vars);
            return $my_array_of_vars['v'];
        } else {
            parse_str(parse_url($url, PHP_URL_PATH), $my_array_of_vars);
            return preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', array_keys($my_array_of_vars)[0]);
        }
    }
}
if (!function_exists('getSliderImg')) {
    function getSliderImg($files, $pageName, $pageId)
    {
        $temple_img = [];
        foreach ($files as $file) {
            $name = time() . rand(1, 100) . '.' . $file->extension();
            $file->move(public_path('temple_img'), $name);
            $temple_img[] = [
                'uuid' => Str::uuid(),
                'user_id' => auth()->user()->id,
                'file_name' => $name,
                'page_name' => $pageName,
                'media_type' => 'image',
                'media_id' => '',
                'page_id' => $pageId,
                'media_path' => $file
            ];
        }
        return $temple_img;
    }

}

if (!function_exists('getthumbnailImg')) {
    function getthumbnailImg($file)
    {
        $name = time() . rand(1, 100) . '.' . $file->extension();
        $file->move(public_path('thumbnail_img'), $name);
        return $name;
    }
}

if (!function_exists('getImgUpload')) {
    function getImgUpload($file,$location)
    {
        $name = time() . rand(1, 100) . '.' . $file->extension();
        $file->move(public_path($location), $name);
        return $name;
    }
}

