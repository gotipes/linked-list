<?php

namespace V1;
    
class Node {

    public  $data,
            $next;

    public function __construct($data)
    {
        $this->data = $data;
        $this->next = null;
    }

    public function getData()
    {
        return $this->data;
    }
}

class LinkedList {

    private $headNode,
            $tailNode;

    public function __construct()
    {
        $this->headNode = NULL;
        $this->tailNode = NULL;
    }

    public function enqueue($data)
    {
        $newNode = new Node($data);
        $newNode->next = $this->headNode;
        // print_r($newNode);
        $this->headNode = $newNode;

        // buat validasi ketika kosong maka diisi node yg ditambahkan
        if($this->tailNode === NULL) {
            $this->tailNode = $newNode;
        }
    }

    public function dequeue()
    {
        // validasi data kosong
        if($this->headNode === NULL) {
            return;
        }
        // inisialisasi node yg akan dihapus
        $deletedNode = $this->headNode;
        // masukan tail dari next menjadi head
        $this->headNode = $this->headNode->next;
        // validasi jika head kosong
        if($this->headNode == NULL) {
            $this->tailNode = NULL;
        }
    }

    public function printData()
    {
        // ambil head sebagai node awal
        $currentNode = $this->headNode;
        // insialisasi variable untuk menampung data yang akan di tampilkan
        $list = [];

        while($currentNode != NULL) {
            // $print .= " &rarr; ".$currentNode->getData();
            array_push($list, $currentNode->getData());
            $currentNode = $currentNode->next;
        }

        // echo "\n". substr($print, 1);
        echo "\n". implode(" &rarr; ", $list);
    }
}
