<?php

$sub_links = [
    'pages_sub_nemu' => [
        [ 'name'=>'Categories', 'link'=>"#", 'icon_class'=>'fe-user', 'sub_menu'=>[] ],
        [ 'name'=>'Categories add', 'link'=>"#", 'icon_class'=>'fe-settings', 'sub_menu'=>[] ],
    ],
];
return [

    /*
    |--------------------------------------------------------------------------
    | Theme Container
    |--------------------------------------------------------------------------
    |
    |
    |
    */
    'links' => [
        'footer_copyright_links' => [
            [ 'name'=>'Documentation', 'link'=>'#', 'icon_class'=>'', 'sub_menu'=>[] ],
            [ 'name'=>'FAQ', 'link'=>'#', 'icon_class'=>'', 'sub_menu'=>[] ],
        ],
        'footer_menu_links' => [
            [ 'name'=>'Categories', 'link'=>'/categories', 'icon_class'=>'', 'sub_menu'=>[] ],
            [ 'name'=>'Add category', 'link'=>'/categories/create', 'icon_class'=>'', 'sub_menu'=>[] ],
            [ 'name'=>'Link 3', 'link'=>'#', 'icon_class'=>'', 'sub_menu'=>[] ],
            [ 'name'=>'Link 4', 'link'=>'#', 'icon_class'=>'', 'sub_menu'=>[] ],
            [ 'name'=>'Link 5', 'link'=>'#', 'icon_class'=>'', 'sub_menu'=>[] ],
            [ 'name'=>'Link 6', 'link'=>'#', 'icon_class'=>'', 'sub_menu'=>[] ],
            [ 'name'=>'Link 7', 'link'=>'#', 'icon_class'=>'', 'sub_menu'=>[] ],
            [ 'name'=>'Link 8', 'link'=>'#', 'icon_class'=>'', 'sub_menu'=>[] ],
        ],
        'main_menu_links' => [
            [ 'name'=>'Home', 'link'=>'#','icon_class'=>'fe-home', 'sub_menu'=> [] ],
            [ 'name'=>'Interface', 'link'=>'#', 'icon_class'=>'fe-box' , 'sub_menu'=> [] ],
            [ 'name'=>'Components', 'link'=>'#', 'icon_class'=>'fe-calendar', 'sub_menu'=> [] ],
            [ 'name'=>'Pages', 'link'=>'#', 'icon_class'=>'fe-file', 'sub_menu'=> [] ],
            [ 'name'=>'Forms', 'link'=>'#', 'icon_class'=>'fe-square', 'sub_menu'=> [] ],
        ],
        'user_menu_links' => [
            [ 'name'=>'Profile', 'link'=>'#', 'icon_class'=>'fe-user', 'sub_menu'=>[] ],
            [ 'name'=>'Settings', 'link'=>'#', 'icon_class'=>'fe-settings', 'sub_menu'=>[] ],
            [ 'name'=>'Message', 'link'=>'#', 'icon_class'=>'fe-send', 'sub_menu'=>[] ],
            [ 'name'=>'Sign out', 'link'=>'#', 'icon_class'=>'fe-log-out', 'sub_menu'=>[] ],
        ],

    ],

    'sub_links'=> $sub_links,
];
