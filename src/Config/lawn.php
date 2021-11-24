<?php
/*
|--------------------------------------------------------------------------
| Configuration for the package
|--------------------------------------------------------------------------
|
|
*/
return [
    /*
    |--------------------------------------------------------------------------
    | Entities
    |--------------------------------------------------------------------------
    |
    */
    'entity' => [
        'post',
    ],

    /*
    |--------------------------------------------------------------------------
    | Definitions for each entities
    |--------------------------------------------------------------------------
    | column : name, type, label, nullable, length(string), unsigned(integer)
    | resources : index, create, store, show, edit, update, destroy
    */
    'post' => [
        'column' => [
            'title' => [
                'name' => 'title', // column name *required
                'type' => 'string', // column type *required
                'label' => 'Title', // label to show
                'length' => '255', // length of field
                'nullable' => false, // field is nullable or not
            ],
            'contents' => [
                'name' => 'contents',
                'type' => 'string',
                'length' => '5000',
                'nullable' => true,
            ],
            'like' => [
                'name' => 'like',
                'type' => 'integer',
                'label' => 'Like',
                'unsigned' => true,
            ],
            'published_at' => [
                'name' => 'published_at',
                'type' => 'datetime',
            ],
        ],

        'resource' => [
            'index',
            'create',
            'store',
            'show',
            'edit',
            'update',
            'destroy',
        ],

    ],


];
