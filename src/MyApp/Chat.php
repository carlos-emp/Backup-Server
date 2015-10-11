<?php
namespace MyApp;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Chat implements MessageComponentInterface {
	protected $clients;

	public function __construct() {
		$this -> clients = new \SplObjectStorage;
	}

	public function onOpen(ConnectionInterface $conn) {
		// Store the new connection to send messages to later
		$this -> clients -> attach($conn);
		$conn->send(json_encode(array("id"=>$conn->resourceId)));
		echo "New connection! ({$conn->resourceId})\n";
	}

	public function onMessage(ConnectionInterface $from, $msgJSON) {
		$msg = json_decode($msgJSON, true);
		if ($msg["type"] === "send") {
			$me = $msg["chatTarget"];
			$numRecv = count($this -> clients) - 1;
			echo sprintf('Connection %d sending message "%s" to %d other connection%s' . "\n", $from -> resourceId, $msg["message"], $numRecv, $numRecv == 1 ? '' : 's');

			include "/home/rockanalex/web/chat/send.php";
			foreach ($this->clients as $client) {
				//if ($from !== $client) {
				// The sender is not the receiver, send to each client connected
				include "/home/rockanalex/web/chat/getChat.php";
				$client -> send(json_encode(array("type"=>"send" ,"mensaje" => $msg["message"], "chats" => $chat, "sent" => $sent,"target"=>$me)));
				//}
			}
		} else {
			if ($msg["type"] === "getChats") {
				$me = $msg["who"];
				foreach ($this->clients as $client) {
					if ($from === $client) {
						include "/home/rockanalex/web/chat/myChats.php";
						$client -> send(json_encode(array("type"=>"getChats","chats" => $json)));
					}
				}
			}
			else{
			if ($msg["type"] === "getConver") {
				$me = $msg["chatTarget"];
				foreach ($this->clients as $client) {
					if ($from === $client) {
						include "/home/rockanalex/web/chat/getChat.php";
						$client -> send(json_encode(array("client"=>$from->resourceId, "chats" => $chat,"type" => "getConver","target"=>$me)));
					}
				}
			}
				
			}
		}

	}

	public function onClose(ConnectionInterface $conn) { 
		// The connection is closed, remove it, as we can no longer send it messages
		$this -> clients -> detach($conn);

		echo "Connection {$conn->resourceId} has disconnected\n";
	}

	public function onError(ConnectionInterface $conn, \Exception $e) {
		echo "An error has occurred: {$e->getMessage()}\n";

		$conn -> close();
	}

}
