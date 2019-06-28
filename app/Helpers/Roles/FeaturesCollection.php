<?php


namespace App\Helpers\Roles;


use App\Helpers\Lang\Lang;
use Illuminate\Support\Arr;
use Zend\Xml2Json\Xml2Json;

class FeaturesCollection
{
    private static $sources = [
        Lang::EN => 'features_en.xml',
        Lang::VI => 'features_vi.xml',
    ];

    public static function parser(string $locate)
    {
        $file     = file_get_contents(__DIR__ . '/../../../' . self::$sources[$locate]);
        $xml2Json = json_decode(Xml2Json::fromXml($file));
        $features = Arr::pluck($xml2Json, 'feature');
        return reset($features);
    }
}
