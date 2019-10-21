<?php


namespace model;


class CustomerDB
{
    public $connect;

    public function __construct($connect)
    {
        $this->connect = $connect;
    }

    public function create($customer)
    {
        $sql = "INSERT INTO customers (name, email, address) VALUES (?, ?, ?)";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $customer->name);
        $stmt->bindParam(2, $customer->email);
        $stmt->bindParam(3, $customer->address);
        $stmt->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM customers";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $customers = [];
        foreach ($result as $item) {
            $customer = new Customer($item['name'], $item['email'], $item['address']);
            $customer->id = $item['id'];
            array_push($customers, $customer);
        }
        return $customers;
    }

    public function getCustomerById($id)
    {
        $sql = "SELECT * FROM customers WHERE id=?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        $result = $stmt->fetch();
        $customer = new Customer($result['name'], $result['email'], $result['address']);
        $customer->id = $result['id'];
        return $customer;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM customers WHERE id=?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }

    public function update($id, $customer)
    {
        $sql = "UPDATE customers SET name = ?, email = ?, address = ? WHERE id = ?";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(1, $customer->name);
        $stmt->bindParam(2, $customer->email);
        $stmt->bindParam(3, $customer->address);
        $stmt->bindParam(4, $id);
        $stmt->execute();
    }
}