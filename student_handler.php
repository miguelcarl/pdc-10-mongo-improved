<?php
include "init.php";
require_once __DIR__ . '/vendor/autoload.php';

class StudentHandler{

    public function insert()
    {
        $client = new MongoDB\Client("mongodb://localhost:27017");

        $collection = $client->local->students;

        $insertOneResult = $collection->insertOne([
            'studentId' => $_POST['studentId'],
            'firstName' => $_POST['firstName'],
            'lastName' => $_POST['lastName'],
            'birthdate' => $_POST['birthdate'],
            'address' => $_POST['address'],
            'program' => $_POST['program'],
            'contactNumber' => $_POST['contactNumber'],
            'emergencyContact' => $_POST['emergencyContact']
        ]);


        // var_dump($insertOneResult->getInsertedId());

        header('Location: index.php');
    }

    public function update()
    {
        $client = new MongoDB\Client("mongodb://localhost:27017");

        $collection = $client->local->students;
        $updateResult = $collection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($_POST['id'])],
            ['$set' => [
                'studentId' => $_POST['studentId'],
                'firstName' => $_POST['firstName'],
                'lastName' => $_POST['lastName'],
                'birthdate' => $_POST['birthdate'],
                'address' => $_POST['address'],
                'program' => $_POST['program'],
                'contactNumber' => $_POST['contactNumber'],
                'emergencyContact' => $_POST['emergencyContact']
                ]
            ]
        );

        printf("Matched %d document(s)\n", $updateResult->getMatchedCount());
        printf("Modified %d document(s)\n", $updateResult->getModifiedCount());

        header('Location: index.php');
    }

    public function delete()
    {
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $collection = $client->local->students;
        $deleteStudent = $collection->deleteOne(
            ['_id' => new MongoDB\BSON\ObjectId($_GET['id'])]
        );

        header('Location: index.php');
    }

    public function list()
    {
        $client = new MongoDB\Client("mongodb://localhost:27017");
        $collection = $client->local->students;
        $result = $collection->find();
    }

}   