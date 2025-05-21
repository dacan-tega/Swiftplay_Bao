<?php

namespace Slotgen\SlotgenGatesOfOlympus\Helpers;

use Intervention\Image\ImageManagerStatic as Image;

class Common
{
    public static function placeHolderStaticImage()
    {
        $image_url = '';
        $image_url .= 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACWCAYAAABkW7XSAAAMK0lEQVR4Xu2aPWtUTRSAJ8QiIdWiEIyNaKFg4Q9QGxvFP2ChVoIiiiBYKX5/lYr4gYKVWoj/wUatBMGAhY1dAkFEEEJSKHmZ63uXzWaTO3fufJyZeVK';
        $image_url .= 'Z7MyZM88552HvumOzs7MrSik1NTWlJiYm9D/5gQAEICCGwPLyslpcXKzyGZubm1uZnJxUCwsL1R+mp6dVr9cTkyyJQAACZRL49evXKi8tLS39E9bMzExFZHgB4iqzUbg1BGISWM9D8/Pzq4VVJ4m4YpaLsyFQJoEm76wrLMRVZsNwawjEINAkqjqn';
        $image_url .= 'RmEhrhjl40wIlEHAVFSthYW4ymggbgmBEATaispaWIgrRDk5AwJ5ErAVVWdhIa48G4pbQcAHga6iciYsxOWjvMSEQB4EXInKubAQVx4Nxi0g4IKAa1F5ExbiclFuYkAgTQK+ROVdWIgrzYYjawjYEPAtqmDCQlw25WcPBNIgEEpUwYWFuNJoQLKEg';
        $image_url .= 'AmB0KKKJizEZdIOrIGATAKxRBVdWIhLZkOSFQRGEYgtKjHCQlwMCATkEpAiKnHCQlxym5bMyiMgTVRihYW4yhsObiyHgFRRiRcW4pLTxGSSPwHpokpGWIgr/2HhhvEIpCKq5ISFuOI1NSfnRyA1USUrLMSV3/Bwo3AEUhVV8sJCXOGanJPSJ5C6qL';
        $image_url .= 'IRFuJKf5i4gT8CuYgqO2EhLn9NT+T0COQmqmyFhbjSGy4ydkcgV1FlLyzE5W4IiCSfQO6iKkZYiEv+sJGhPYFSRFWcsBCX/VCwUx6B0kRVrLAQl7zhIyNzAqWKqnhhIS7zIWFlfAKliwphDfUgDRF/KMlgLQH6cjWT+fl5NTY3N7cyMzNDvyilaBD';
        $image_url .= 'aQAIB+nB0FRDWOt1Jw0gY2/JyoO82rjnCapgJGqg8acS4MX1mRh1hmXHiUdGQE8vaEUBU7XghrHa8EFdLXiwfTQBR2XUGwrLjhrgsuZW+DVF16wCE1Y0f4urIr5TtiMpNpRGWG46IyxHH3MIgKrcVRVhueSIuxzxTDYeo/FQOYfnhirg8cZUeFlH5';
        $image_url .= 'rRDC8ssXcXnmKyU8ogpTCYQVhjPiCsQ59DGIKixxhBWWN+IKzNvXcYjKF9mN4yKsONwRVyTuXY9FVF0JdtuPsLrx67ybAeiMMEgA6hQEc+MhCKsRUZgFDEQYzm1PoS5tifldj7D88m0dnQFpjczLBurgBWvnoAirM0I/ARgYP1ybosK9iVDc1xFWX';
        $image_url .= 'P6NpzNAjYicLICzE4zegyAs74jdHMBAueE4HAWufrj6ioqwfJH1FJcBcwMWjm44ho6CsEITd3QeA2cHEm523KTsQlhSKmGZBwNoBg5OZpykr0JY0itkmB8DORoUXAwbKJFlCCuRQpmmyYD+IwUH045Jax3CSqtextmWOrCl3tu4MRJfiLASL2BT+q';
        $image_url .= 'UMcCn3bKp37q8jrNwr/P/9ch3oXO9VSFu2vibCao0s7Q25DHgu90i7m8Jnj7DCMxdxYqoDn2reIoqeQRIIK4MidrlCKgJIJc8utWBvMwGE1cyoiBVShSA1ryKaQuAlEZbAosRMSYogpOQRsxacvZYAwqIrRhKIJYxY59IGaRBAWGnUKVqWoQQS6px';
        $image_url .= 'oIDnYCQGE5QRj/kF8CcVX3PwrUuYNEVaZdbe+tSvBuIpjfRE2JkkAYSVZtvhJ2wrHdl/8G5OBBAIIS0IVEs7BVECm6xJGQeoBCCCsAJBLOGI9ISGqEqof7o4IKxzrIk6qBfXnzx81NjamxsfH1fT0tOr1ekXcn0v6JYCw/PItLnotrL9//6qVlRW1';
        $image_url .= 'adMmhFVcF/i7MMLyx7aoyDwSFlXuaJdFWNHQ53Gw6WdUpuvyoMItfBFAWL7IZh7XVkC2+zLHyfUMCSAsQ1As+0fAlXBcxaEuZRFAWGXV2/q2vgTjK671RdkomgDCEl2e+MmFEkqoc+ITJYMuBBBWF3oZ740lkFjnZlzKrK6GsLIqZ/fLSBGGlDy6E';
        $image_url .= 'yWCSwIIyyXNhGNJFYTUvBIuddKpI6yky9c9+VSEkEqe3StChI0IIKxC+yNVAaSad6Ft5vzaCMs5UtkBcxn4XO4hu1vkZYew5NXES0a5Dniu9/LSBBkERVgZFHGjK5Qy0KXcM/N2bbwewmpElOaCUge41Hun2aXts0ZY7ZmJ3sHA/isPHES3qXVyCM';
        $image_url .= 'sanayNDOjoesBFVp92zQZhdSUYeT8DaVYAOJlxkr4KYUmv0Dr5MYB2hYObHTcpuxCWlEoY5sHAGYJqWAZHNxxDR0FYoYlbnseAWYJDXH7ARYqKsCKBNz0WUZmS6rYOzt34hdqNsEKRbnkOA9QSmKPlcHcE0lMYhOUJrG1YBsaWnNt91MEtT1fREJY';
        $image_url .= 'rkh3jMCAdAXraTl08gbUMi7AswbnaxkC4Iuk3DnXyy9c0OsIyJeV4HQPgGGigcNQtEOh1jkFYgfnT8IGBezqOOnoC2xAWYQXiToMHAh34GOoaFjjC8sybhvYMWEh46hymEAjLE2ca2BNY4WGpu98CISzHfGlYx0ATDUcf+CkcwnLElQZ1BDKzMPSF';
        $image_url .= '24IirI48aciOAAvZTp+4KTTCsuRIA1qCK3wbfdOtARBWS340XEtgLB9JgD6yawyEZciNBjMExbJWBOirVrgUwmrgRUO1ayhW2xGgz8y4Iax1ONFAZg3EKrcE6LuNeSKsIT40jNsBJJodAfpwNDeE9T8XGsRusNjllwB9uZpv8cKiIfwOHNHdEKBP/';
        $image_url .= '3EsVlg0gJtBIkpYAqX3bXHCKr3gYceL03wRKLWPixFWqQX2NTDElUGgtL7OXlilFVTGGJFFaAKl9Hm2wiqlgKEHg/NkE8i977MTVu4Fkz0uZCeFQK5zkI2wci2QlAEgjzQJ5DYXyQsrt4KkORZkLZ1ALnOSrLByKYD0Rie/vAikPjfJCSt14Hm1P7';
        $image_url .= 'dJlUCqc5SMsFIFnGpDk3cZBFKbK/HCSg1oGW3OLXMjkMqciRVWKgBza1zuUzYB6XMnTljSgZXdzty+FAJS51CMsKQCKqVBuScERhGQNpfRhSUNCG0LAQisJSBlTqMJSwoAmhMCEDAnEHtugwsr9oXNS8NKCEBgPQKx5jiYsGJdkJaDAAT8EQg9196';
        $image_url .= 'FFfpC/kpDZAhAIPY7Lm/CQlQ0NwTKI+B77p0Ly3fC5bUAN4aAOYFv376po0ePqi9fvvQ3ffjwQe3bt6//+8ePH9X+/futXzfJ5vnz5+rr16/qzJkzanp6WvV6vWrbrVu31NWrV1eFOHTokHr9+rXavHmzWlpaUhcuXFDPnj2r1pw+fVrdv39fTU5O';
        $image_url .= 'Vr87ExaiMikjayDgl4Ae/O3bt/cFpQV2/vx59fDhQ7Vr1y7V9fem7PX5x48fr5bdvHlTnTt3Ti0sLFS/a3E9evRI7dixQx07dmxkKC00/XPlypW+4AZ/7ywsRNVUQl6HQDwC9TuWEydOVBLTQtE/g8IY/NtGrx8+fLjap2PV++t3dI8fP171Lk7H+';
        $image_url .= 'f79e188tSeePn2q9uzZo06dOrUGys+fP9Xly5fVnTt3qndb+mf4b9bCQlTxmpCTIWBKQD/+vXz5sv9Ypd/BHDx4cM0j4rt37yq5NL2uBaJlpdfu3r27/+/BR06d27Cw6nwvXbqk7t27109/8JFPy+/Fixfqxo0b/UdALdxr166pkydPVu8QWwsLUZ';
        $image_url .= 'm2CusgEI9A/WimH8vqx6vhd1t1drXU7t69q7RQ6ndjw6/XnyXp9Vps+tHzwIEDIx/v1hNWHXPwHdfv37/VkydP1OfPn1fJVa8dztlYWIgqXvNxMgRsCWi5nD17Vr1586Z6h9L0Dqrp9ToPLaT379+v+kB8MMcmYdVrP336pK5fv15JdXx8XL19+7b';
        $image_url .= 'bOyxEZdsq7IOADAJaQvUH3V0+w6o/t3LxDqsmox8DtbBu376tfvz4oR48eFB9hrVz5852n2EhKhnNRhYQaENAP7YdOXKkejelf7r+r+Dwfv0Zlv6fPy2ZLVu2tPoMS+/Vj34XL16sPqOqH/e2bdvWf2zVj6SLi4v9r0Po/1XUP/Vj7ZpHQkTVpj1Y';
        $image_url .= 'CwFZBIa/Y7V3797+4+DgZ1I238Ma9T+Cw38b/FpDfV79Odrwd6z0669evVr1GdjwGv2dMi3hrVu3VuH6wtLGG/y+RP1FL1nlIBsIQKAkAsNvoLTQxmZnZ1c0hKmpKTUxMVESD+4KAQgkQGB5ebl6VNQ//wELQofNY8KOHgAAAABJRU5ErkJggg==';

        return $image_url;
    }

    public static function thumbImage($sourcePath, $destPath, $size)
    {
        $thumb = Image::make($sourcePath);
        Common::resizeImage($thumb, $size)->save($destPath);
    }

    public static function resizeImage($image, $requiredSize)
    {
        $width = $image->width();
        $height = $image->height();
        if ($requiredSize >= $width && $requiredSize >= $height) {
            return $image;
        }

        $aspectRatio = $width / $height;
        if ($aspectRatio >= 1.0) {
            $newWidth = $requiredSize;
            $newHeight = $requiredSize / $aspectRatio;
        } else {
            $newWidth = $requiredSize * $aspectRatio;
            $newHeight = $requiredSize;
        }
        $image->resize($newWidth, $newHeight);

        return $image;
    }

    public static function formatBytes($size, $precision = 2)
    {
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = [' bytes', ' KB', ' MB', ' GB', ' TB'];

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }

    public static function formatTitle($title)
    {
        $strRes = '';
        if (! empty($title)) {
            $strRes = str_replace('-', ' ', $title);
            $strRes = ucwords($strRes);
        }

        return $strRes;
    }

    public static function getIp($request)
    {
        foreach (['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR'] as $key) {
            if (array_key_exists($key, $_SERVER) === true) {
                foreach (explode(',', $_SERVER[$key]) as $ip) {
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false) {
                        return $ip;
                    }
                }
            }
        }

        return $request->ip(); // it will return server ip when no client ip found
    }

    public static function randomDevide($max, $count)
    {
        $numbers = [];
        for ($i = 1; $i < $count; $i++) {
            $random = mt_rand(0, $max / ($count - $i));
            $numbers[] = $random;
            $max -= $random;
        }
        $numbers[] = $max;
        shuffle($numbers);

        return $numbers;
    }

    public static function loadLanguage($lang = 'en')
    {
        $langSelect = $lang;
        $siteConfigPath = config_path('slotgen-laracore/languages/' . $langSelect . '.json');
        $jsonPath = file_exists($siteConfigPath) ? $siteConfigPath : __DIR__ . '/../../resources/games/languages/' . $langSelect . '.json';
        if (! file_exists($jsonPath)) {
            $langSelect = 'en';
            $siteConfigPath = config_path('slotgen-laracore/languages/' . $langSelect . '.json');
            $jsonPath = file_exists($siteConfigPath) ? $siteConfigPath : __DIR__ . '/../../resources/games/languages/' . $langSelect . '.json';
        }
        $json = [];
        if (file_exists($jsonPath)) {
            $string = file_get_contents($jsonPath);
            $json = json_decode($string, true);
        }

        return $json;
    }

    public static function trans($key, $lang = 'en')
    {
        $langSelect = $lang;
        $siteConfigPath = config_path('slotgen-laracore/languages/' . $langSelect . '.json');
        $jsonPath = file_exists($siteConfigPath) ? $siteConfigPath : __DIR__ . '/../../resources/games/languages/' . $langSelect . '.json';
        if (! file_exists($jsonPath)) {
            $langSelect = 'en';
            $siteConfigPath = config_path('slotgen-laracore/languages/' . $langSelect . '.json');
            $jsonPath = file_exists($siteConfigPath) ? $siteConfigPath : __DIR__ . '/../../resources/games/languages/' . $langSelect . '.json';
        }
        $res = false;
        if (file_exists($jsonPath)) {
            $string = file_get_contents($jsonPath);
            $json = json_decode($string, true);
            $keyArr = [];
            if (strpos($key, '.') !== false) {
                $keyArr = explode('.', $key);
            } else {
                $keyArr = $key;
            }
            $findVal = $json;
            $isGood = true;
            foreach ($keyArr as $k) {
                if (isset($findVal[$k])) {
                    $findVal = $findVal[$k];
                } else {
                    $isGood = false;

                    break;
                }
            }
            if ($isGood) {
                $res = $findVal;
            }
        }

        return $res;
    }
}
