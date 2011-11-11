<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config['role'] = array(
  0 => '普通用户',
  1 => '初级管理员',
  2 => '高级管理员',
  3 => '超级管理员'
);

$config['nav'] = array(
  array(
    'name' => '用户管理',
    'seq'  => 1,
    'item' => 'user',
    'sub'  => array(
      array(
        'name' => '查看用户',
        'seq'  => 1,
        'act'  => 'list'
      ),
      array(
        'name' => '添加用户',
        'seq'  => 2,
        'act'  => 'add'
      )
    )
  )
);