<?php
/**
 * @see https://github.com/artesaos/seotools
 */

return [
    'meta' => [
        /*
         * The default configurations to be used by the meta generator.
         */
        'defaults' => [
            'title' => "Tiếng Anh Thầy Thắng", // set false to total remove
            'titleBefore' => false, // Put defaults.title before page title, like 'Tiếng Anh Thầy Thắng - Dashboard'
            'description' => 'Biên soạn và cập nhật liên tục đề kiểm tra tiếng anh cấp 1, 2, 3  theo chương trình mới', // set false to total remove
            'separator' => ' - ',
            'keywords' => ['đề thi tiếng anh lớp 6 học kì 1', 'đề thi tiếng anh vào 10 đà nẵng', 'đề thi tiếng anh 15 phút lớp 6'],
            'canonical' => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'robots' => false, // Set to 'all', 'none' or any combination of index/noindex and follow/nofollow
        ],
        /*
         * Webmaster tags are always added.
         */
        'webmaster_tags' => [
            'google' => null,
            'bing' => null,
            'alexa' => null,
            'pinterest' => null,
            'yandex' => null,
            'norton' => null,
        ],

        'add_notranslate_class' => false,
    ],
    'opengraph' => [
        /*
         * The default configurations to be used by the opengraph generator.
         */
        'defaults' => [
            'title' => 'Tiếng Anh Thầy Thắng', // set false to total remove
            'description' => 'Biên soạn và cập nhật liên tục đề kiểm tra tiếng anh cấp 1, 2, 3  theo chương trình mới', // set false to total remove
            'url' => false, // Set null for using Url::current(), set false to total remove
            'type' => false,
            'site_name' => false,
            'images' => [],
        ],
    ],
    'twitter' => [
        /*
         * The default values to be used by the twitter cards generator.
         */
        'defaults' => [
            //'card'        => 'summary',
            //'site'        => '@LuizVinicius73',
        ],
    ],
    'json-ld' => [
        /*
         * The default configurations to be used by the json-ld generator.
         */
        'defaults' => [
            'title' => 'Tiếng Anh Thầy Thắng', // set false to total remove
            'description' => 'Biên soạn và cập nhật liên tục đề kiểm tra tiếng anh cấp 1, 2, 3  theo chương trình mới', // set false to total remove
            'url' => false, // Set to null or 'full' to use Url::full(), set to 'current' to use Url::current(), set false to total remove
            'type' => 'WebPage',
            'images' => [],
        ],
    ],
];
