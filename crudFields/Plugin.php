<?php
/**
 */

namespace execut\files\crudFields;

use execut\crudFields\fields\HasOneSelect2;
use execut\files\models\File;

class Plugin extends AttachedPlugin
{
    public function getFields() {
        return [
            [
                'class' => HasOneSelect2::class,
                'attribute' => 'files_file_id',
                'relation' => 'filesFile',
                'module' => 'files',
                'nameParam' => 'FileBackend[name]',
                'nameAttribute' => 'fullName',
                'url' => [
                    '/files/backend'
                ],
            ],
        ];
    }

    public function getRelations()
    {
        return [
            'filesFile' => [
                'class' => File::class,
                'link' => [
                    'id' => 'files_file_id',
                ],
                'multiple' => false
            ],
        ];
    }
}