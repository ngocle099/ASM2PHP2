<?php
namespace App\Models;
class Student extends BaseModel{
    public function loadAllDataStudent()
    {
        $sql = "SELECT * FROM `sinh_vien`";
        $this->setQuery($sql);
        return $this->loadAllRows();
    }
    public function insertDataStudent($id, $name,$year_of_bỉth, $phone_number){
        $sql = "INSERT INTO `sinh_vien` VALUES (?, ?, ? ,?)";
        $this->setQuery($sql);
        return $this->execute([$id, $name,$year_of_bỉth, $phone_number]);
    }
    public function getDataStudentById($id)
    {
        $sql = "SELECT * FROM `sinh_vien` WHERE `id` = ?";
        $this->setQuery($sql);
        return $this->loadRow([$id]);
    }

    public function updateDataStudent($id, $name, $year_of_birth, $phone_number)
    {
        $sql = "UPDATE `sinh_vien` SET `name` = ?, `year_of_birth` = ?, `phone_number` = ? WHERE `id` = ?";
        $this->setQuery($sql);
        return $this->execute([$name, $year_of_birth, $phone_number, $id]);
    }

    public function deleteDataStudent($id)
    {
        $sql = "DELETE FROM `sinh_vien` WHERE `id` = ?";
        $this->setQuery($sql);
        return $this->execute([$id]);
    }
}
?>