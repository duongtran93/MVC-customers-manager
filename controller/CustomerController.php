<?php

namespace controller;

use model\Customer;
use model\CustomerDB;
use model\DBConnect;

class CustomerController
{
    public $customerDB;

    public function __construct()
    {
        $db = new DBConnect("mysql:host=localhost;dbname=student_manager", "root", "ngocduong93");
        $this->customerDB = new CustomerDB($db->connect());
    }

    public function add()
    {
        include 'view/add.php';
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $customer = new Customer($name, $email, $address);
            $this->customerDB->create($customer);
            $message = 'Customer created';
            header("Location: index.php");
        }

    }

    public function index()
    {
        $customers = $this->customerDB->getAll();
        include 'view/list.php';
    }

    public function delete()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_GET['id'];
            $customer = $this->customerDB->getCustomerById($id);
            include 'view/delete.php';
        } else {
            $id = $_POST['id'];
            $this->customerDB->delete($id);
            header("Location: index.php");
        }
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_GET['id'];
            $customer = $this->customerDB->getCustomerById($id);
            include 'view/edit.php';
        } else {
            $id = $_POST['id'];
            $customer = new Customer($_POST['name'], $_POST['email'], $_POST['address']);
            $this->customerDB->update($id, $customer);
            header("Location: index.php");
        }
    }
}