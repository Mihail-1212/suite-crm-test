<?php
/** @var array $dictionary  */

$dictionary['Account']['fields']['source'] = [
    'name' => 'source',
    'vname' => 'LBL_SOURCE',
    'type' => 'enum',
    'required' => true,
    'audited' => true,
    'comment' => 'Record source',
    'options' => 'account_source_options',
];

$dictionary['Account']['fields']['source_another'] = [
    'name' => 'source_another',
    'vname' => 'LBL_SOURCE_ANOTHER',
    'type' => 'text',
    'required' => false,
    'audited' => true,
    'comment' => 'Record source comment',
];