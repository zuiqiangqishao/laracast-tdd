<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReplyTest extends TestCase
{

    protected $thread;

    public function setUp()
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->thread = factory('App\Models\Thread')->create();
    }

    //测试模型中的关联关系
    public function testReplyHasAnOwner()
    {
        $reply = factory('App\Models\Reply')->create();

        $this->assertInstanceOf('App\Models\User',$reply->owner);
    }

    //给store方法增加测试
    public function testThreadCanAddReply()
    {
        $this->thread->replies()->create([
            'user_id'=>1,
            'body'=>'king'
        ]);
        $this->assertCount(1, $this->thread->replies);
    }



}
