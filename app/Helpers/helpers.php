<?php
use Illuminate\Database\Eloquent\Model;
if (!function_exists('make_persian_slug')) {
    function make_persian_slug(string $text): string
    {
        $text = trim($text);
        $text = preg_replace('/\s+/u', '-', $text);
        $text = preg_replace('/[^\p{L}\p{N}\-_]+/u', '', $text);
        $text = preg_replace('/-+/u', '-', $text);
        return trim($text, '-');
    }
}
if (!function_exists('make_unique_persian_slug')) {
    function make_unique_persian_slug(string $text, string $modelClass, string $column = 'slug'): string
    {
        $slug = make_persian_slug($text);
        if (empty($slug)) {
            $slug = 'item';
        }
        $originalSlug = $slug;
        $counter = 2;
        while ($modelClass::where($column, $slug)->exists()) {
            $slug = $originalSlug . '-' . $counter;
            $counter++;
        }
        return $slug;
    }
    if(!function_exists('calcDiscount')){
        /**
         * @param int $price قیمت اصلی
         * @param int $discount درصد تخفیف
         * @return int قیمت بعد از تخفیف
         */
        function calcDiscount($price,$discount){
            $price = (int)$price;
            $discount = (int)$discount;
            return $price - ($price * $discount / 100);
        }
    }
}
