<?php

require_once "version1.php";
require_once "version2.php";

use V1\LinkedList as LinkedList1;

echo "<h3> Version 1 </h3>";
$linkedList = new LinkedList1();
$linkedList->enqueue("Data 1");
$linkedList->enqueue("Data 2");
$linkedList->enqueue("Data 3");
$linkedList->enqueue("Data 4");
$linkedList->dequeue(); // data ke 4 akan hilang
$linkedList->enqueue("this is new data"); // tambah data lagi
$linkedList->printData();

// Version 2

use V2\LinkedList as LinkedList2;

echo "<h3> Version 2 </h3>";
$ll = new LinkedList2();
$ll->addFirst('queue 1');
$ll->addFirst('queue 2');
$ll->addFirst('queue 3');

$ll->addLast('last 1');
$ll->addLast('last 2');

$ll->addFirst('queue 4');
$ll->addFirst('queue 5');

$ll->deleteFirst();
$ll->deleteLast();
$ll->deleteByValue('queue 4');
// print_r($ll);

$ll->printList();
$ll->reverseList();
$ll->printCount();