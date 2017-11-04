<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Verifies that your task entity accepts property 
 * values that meet the form validation rules, 
 * and rejects ones that don't.
 *
 * @author namblue
 */
 class TaskTest extends PHPUnit_Framework_TestCase
  {
    private $CI;
    public function setUp()
    {
      // Load CI instance normally
      $this->CI = &get_instance();
    }
    public function testGetPost()
    {
      $_SERVER['REQUEST_METHOD'] = 'GET';
      $_GET['foo'] = 'bar';
      $this->assertEquals('bar', $this->CI->input->get_post('foo'));
    }
    
    public function testTaskEntity()
    {
        $taskSet = $this->CI->tasks->setTask('TaskName');
        $sizeSet = $this->CI->tasks->setSize(2);
        $prioritySet = $this->CI->tasks->setPriority(2);
        $groupSet = $this->CI->tasks->setGroup(2);
        
        $this->assertTrue($taskSet);
        $this->assertTrue($sizeSet);
        $this->assertTrue($groupSet);
        $this->assertTrue($prioritySet);
    }
    
    public function testTaskEntityFailure()
    {
        $taskSet = $this->CI->tasks->setTask('');
        $sizeSet = $this->CI->tasks->setSize(5);
        $prioritySet = $this->CI->tasks->setPriority(5);
        $groupSet = $this->CI->tasks->setGroup(6);
        
        $this->assertFalse($taskSet);
        $this->assertFalse($sizeSet);
        $this->assertFalse($groupSet);
        $this->assertFalse($prioritySet);
    }
    
  }
