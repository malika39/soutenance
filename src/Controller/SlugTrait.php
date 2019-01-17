<?php
/**
 * Created by PhpStorm.
 * User: PC6
 * Date: 17/01/2019
 * Time: 16:45
 */

namespace App\Controller;


trait SlugTrait
{
    /**
     * Permet de générer un Slug à partir d'un string
     * @param $text
     * @return false|string|string[]|null
     */
    public function slugifyArticle($text)
    {
        // replace non letter or digits by -
        $text = preg_replace('~[^\pL\d]+~u', '-', $text);

        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);

        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);

        // trim
        $text = trim($text, '-');

        // remove duplicate -
        $text = preg_replace('~-+~', '-', $text);

        // lowercase
        $text = strtolower($text);

        if (empty($text)) {
            return 'n-a';
        }

        return $text;
    }
}