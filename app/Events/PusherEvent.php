<?php
namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PusherEvent implements ShouldBroadcast
{
  use Dispatchable, InteractsWithSockets, SerializesModels;

  public $message;
  public CONST CHANNEL_NEW_VISITORS = 'new-visitors-channel';
  public CONST EVENT_NEW_VISITORS = 'new-visitors-event';
  public function __construct($message)
  {
      $this->message = $message;
  }

  public function broadcastOn()
  {
      return [self::CHANNEL_NEW_VISITORS];
  }

  public function broadcastAs()
  {
      return self::EVENT_NEW_VISITORS;
  }
}


 