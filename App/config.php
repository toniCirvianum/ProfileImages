<?php
$users = [
    [
        'id'=>0,
        'name' => 'Toni F',
        'username'=>'admin',
        'password'=>'123',
        'mail' => "mail@mail.com",
        'admin'=>true,
        'token'=>"",
        'verificat'=> true,
        'img_profile'=>"A.jpg"
    ],
    [
        'id'=>1,
        'name' => 'Raquel F',
        'username'=>'raquel',
        'password'=>'123',
        'mail' => "mail@mail.com",
        'admin'=>false,
        'token'=>"",
        'verificat'=> true,
        'img_profile'=>"C.jpg"

    ]
];

if (!isset($_SESSION['users']))$_SESSION['users']=$users;
