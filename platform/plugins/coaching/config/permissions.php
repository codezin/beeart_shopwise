<?php

return [
    [
        'name' => 'Coaching',
        'flag' => 'coachings.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'coaching.edit',
        'parent_flag' => 'coachings.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'coaching.destroy',
        'parent_flag' => 'coachings.index',
    ],
];
