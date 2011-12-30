<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config['role'] = array(
  0 => '普通用户',
  1 => '初级管理员',
  2 => '高级管理员',
  3 => '超级管理员'
);
$config['type'] = array(
  0 => '未分类',
  1 => '人力资源',
  2 => '综合管理',
  3 => '生产管理',
  4 => '营销管理',
  5 => '财务管理',
  6 => '物流采购'
);

$config['recommend'] = array(
  0 => '否',
  1 => '是'
);

$config['status'] = array(
  0 => '未分类',
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
    'item' => 'history',
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
    'name' => '课程资源',
    'seq'  => 2,
    'item' => 'course_resource',
    'sub'  => array(
      array(
        'name' => '查看课程资源',
        'seq'  => 1,
        'act'  => 'list'
      ),
      array(
        'name' => '添加课程资源',
        'seq'  => 2,
        'act'  => 'add'
      )
    )
  ),
  array(
    'name' => '讲师资源',
    'seq'  => 3,
    'item' => 'trainer_resource',
    'sub'  => array(
      array(
        'name' => '查看讲师资源',
        'seq'  => 1,
        'act'  => 'list'
      ),
      array(
        'name' => '添加讲师资源',
        'seq'  => 2,
        'act'  => 'add'
      )
    )
  ),
  array(
    'name' => '客户资源',
    'seq'  => 4,
    'item' => 'client_resource',
    'sub'  => array(
      array(
        'name' => '查看客户资源',
        'seq'  => 1,
        'act'  => 'list'
      ),
      array(
        'name' => '添加客户资源',
        'seq'  => 2,
        'act'  => 'add'
      )
    )
  ),
  array(
    'name' => '用户管理',
    'seq'  => 5,
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