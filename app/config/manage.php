<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config['role'] = array(
  0 => '普通用户',
  1 => '初级管理员',
  2 => '高级管理员',
  3 => '超级管理员'
);

$config['status'] = array(
  1 => '公开课',
  2 => '企业内训'
);

$config['gender'] = array(
  0 => '女',
  1 => '男'
);

$config['nav'] = array(
  array(
    'name' => '课程管理',
    'seq'  => 1,
    'item' => 'course',
    'sub'  => array(
      array(
        'name' => '查看课程',
        'seq'  => 1,
        'act'  => 'list'
      ),
      array(
        'name' => '添加课程',
        'seq'  => 2,
        'act'  => 'add'
      )
    )
  ),
  array(
    'name' => '讲师管理',
    'seq'  => 2,
    'item' => 'trainer',
    'sub'  => array(
      array(
        'name' => '查看讲师',
        'seq'  => 1,
        'act'  => 'list'
      ),
      array(
        'name' => '添加讲师',
        'seq'  => 2,
        'act'  => 'add'
      )
    )
  ),
  array(
    'name' => '客户管理',
    'seq'  => 3,
    'item' => 'client',
    'sub'  => array(
      array(
        'name' => '查看客户',
        'seq'  => 1,
        'act'  => 'list'
      ),
      array(
        'name' => '添加客户',
        'seq'  => 2,
        'act'  => 'add'
      )
    )
  ),
  array(
    'name' => '用户管理',
    'seq'  => 4,
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
  ),
);