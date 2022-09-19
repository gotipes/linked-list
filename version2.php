<?php

namespace V2;

// reference: https://stackoverflow.com/questions/3630969/implement-linked-list-in-php
// pengeditan langsung varible hanya berfungsi untuk variable object, tidak berfungsi untuk variable array

class Node {

    public $data;
    public $next;

    function __construct($data)
    {
        $this->data = $data;
        $this->next = NULL;
    }
}

class LinkedList {

    private $headNode;
    private $tailNode;
    private $count;

    function __construct()
    {
        $this->headNode = NULL; //current
        $this->tailNode = NULL;
        $this->count = 0;
    }

    function addFirst($data)
    {
        $newNode = new Node($data);
        $newNode->next = $this->headNode;
        $this->headNode = $newNode;        
        // print_r($newNode);

        if($this->tailNode === NULL) {
            $this->tailNode = $newNode;
        }

        $this->count++;
    }

    function addLast($data)
    {
        $newNode = new Node($data);
        $currentNode = $this->headNode;
        // print_r($currentNode);

        while ($currentNode->next !== NULL) {
            $currentNode = $currentNode->next;
        }

        $currentNode->next = $newNode;
    
        // SET TAIL
        $this->setTail();
        
        $this->count++;
    }

    function deleteLast()
    {
        if ($this->headNode == NULL) return;

        if ($this->headNode->next === NULL) {
            $this->headNode = NULL;
        }
        else {
            $currentNode = $this->headNode;
            // print_r($currentNode);
    
            while ($currentNode->next->next !== null) {
                $currentNode = $currentNode->next;
            }
    
            $currentNode->next = null;
        }        
        
        $this->count--;
    }

    function deleteFirst()
    {
        if ($this->headNode == NULL) return;
        $this->headNode = $this->headNode->next;
        
        $this->count--;
    }

    function deleteByValue($value) 
    {
        if ($this->headNode == NULL) return;
        $currentNode = $previousNode = $this->headNode;
        // print_r($currentNode);

        while ($currentNode->data != $value) {
            $previousNode = $currentNode;
            $currentNode = $currentNode->next;
        }

        // print_r($previousNode);

        // For the first node
        if ($currentNode == $previousNode) {
            $this->headNode = $currentNode->next;
        }

        $previousNode->next = $currentNode->next;
        
        print_r($this->headNode);
    }

    function reverseList()
    {
        if ($this->headNode === NULL) return;

        $currentNode = $this->headNode;        
        // print_r($currentNode);
        $new = [];

        $loop = 0;
        while ($currentNode !== NULL) {
            if ($loop == 0) {
                $new['data'] = $currentNode->data;
                $new['next'] = NULL;
            }
            else {
                $temp = $new;
                $new['data'] = $currentNode->data;
                $new['next'] = $temp;
            }

            $currentNode = $currentNode->next;

            $loop++;
        }

        // PRINT REVERSE
        $currentNode = $new;
        $lists = [];

        while($currentNode !== null) {
            array_push($lists, $currentNode['data']);
            $currentNode = $currentNode['next'];
        }
        echo "<br> Reverse Lists = ". implode(" &rarr; ", $lists);
    }

    function printList()
    {
        $currentNode = $this->headNode;
        $lists = [];

        while($currentNode !== null) {
            array_push($lists, $currentNode->data);
            $currentNode = $currentNode->next;
        }

        echo "Node Lists = ". implode(" &rarr; ", $lists);
    }

    function printCount()
    {        
        echo "<br> Node Count = $this->count";
    }


    // ADDITIONAL
    function setTail()
    {
        $currentNode = $this->headNode;

        while ($currentNode->next !== NULL ) {
            $currentNode = $currentNode->next;
        }

        $this->tailNode = $currentNode;
    }

}

