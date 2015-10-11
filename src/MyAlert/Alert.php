<?php
namespace MyAlert;
use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class Alert implements MessageComponentInterface {
	protected $clients;

	public function __construct() {
		$this -> clients = new \SplObjectStorage;
	}

	public function onOpen(ConnectionInterface $conn) {
		// Store the new connection to send messages to later
		$this -> clients -> attach($conn);
		$conn->send(json_encode(array("id"=>$conn->resourceId)));
		echo "New connection to alert server! ({$conn->resourceId})\n";
	}

	public function onMessage(ConnectionInterface $from, $msgJSON) {
		$msg = json_decode($msgJSON, true);
		
	}

	public function onClose(ConnectionInterface $conn) { 
		// The connection is closed, remove it, as we can no longer send it messages
		$this -> clients -> detach($conn);

		echo "Connection to alert server {$conn->resourceId} has disconnected\n";
	}

	public function onError(ConnectionInterface $conn, \Exception $e) {
		echo "An error has occurred: {$e->getMessage()}\n";

		$conn -> close();
	}

}
