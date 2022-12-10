<?php

$client = new MongoDB\Client(
   'mongodb+srv://<username>:<password>@<cluster-address>/test?w=majority'
);
$db = $client->local->students;