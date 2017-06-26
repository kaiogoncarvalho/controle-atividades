<?php

function collectForm($data, $field = 'name', $id = 'id')
{
    return collect($data)
        ->mapWithKeys( function($item) use($id, $field) {
            return [$item[$id] => $item[$field]];
        });
}

function collectId($datas, $id = 'id') {

    $ids = [];

    foreach($datas as $data) {
        $ids[] = $data->$id;
    }

    return $ids;
}