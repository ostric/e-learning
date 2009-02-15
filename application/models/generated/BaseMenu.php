<?php

/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
abstract class BaseMenu extends Doctrine_Record
{
  public function setTableDefinition()
  {
    $this->setTableName('sys_menu');
    $this->hasColumn('title', 'string', 64, array('type' => 'string', 'length' => '64'));
    $this->hasColumn('description', 'string', 255, array('type' => 'string', 'length' => '255'));
    $this->hasColumn('parent_id', 'integer', null, array('type' => 'integer'));
    $this->hasColumn('url', 'string', 255, array('type' => 'string', 'length' => '255'));
  }

  public function setUp()
  {
    $this->hasMany('RoleMenu', array('local' => 'id',
                                     'foreign' => 'menu_id'));

    $timestampable0 = new Doctrine_Template_Timestampable();
    $this->actAs($timestampable0);
  }
}