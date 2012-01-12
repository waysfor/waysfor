<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config['index_nav'] = array(
  array(
    'name' => '首页',
    'seq'  => 1,
    'item' => '',
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