<?php
namespace App\Controllers;

use App\Models\Student;

class StudentController extends BaseController
{
    protected $category;

    public function __construct()
    {
        $this->category = new Student();
    }

    // Hiển thị danh mục sinh viên
    public function index()
    {
        $data = $this->category->loadAllDataStudent();
        return $this->render('student.index', compact('data'));
    }

    // Hiển thị form tạo mới sinh viên
    public function create()
    {
        return $this->render('student.create');
    }

    // Lưu dữ liệu sinh viên mới
    public function store()
    {
        if (isset($_POST['btn-submit'])) {
            // validate
            $error = []; // chứa lỗi
            if (empty($_POST['name'])) {
                $error[] = "Bạn phải nhập tên";
            }
            if (empty($_POST['year_of_birth'])) {
                $error[] = "Bạn phải nhập ngày sinh";
            }
            if (empty($_POST['phone_number'])) {
                $error[] = "Bạn phải nhập số điện thoại";
            }
            if (count($error)) {
                flash('errors', $error, 'create');
            } else {
                $check = $this->category->insertDataStudent(null, $_POST['name'], $_POST['year_of_birth'], $_POST['phone_number']);
                if ($check) {
                    flash('success', 'Thêm thành công', 'create');
                } else {
                    flash('errors', 'Thêm thất bại', 'create');
                }
            }
        }
    }

    // Hiển thị form sửa sinh viên
    public function edit($id)
    {
        $student = $this->category->getDataStudentById($id);
        if (!$student) {
            flash('errors', 'Sinh viên không tồn tại', 'index');
        }
        return $this->render('student.edit', compact('student'));
    }

    // Cập nhật dữ liệu sinh viên
    public function update($id)
    {
        if (isset($_POST['btn-submit'])) {
            // validate
            $error = []; // chứa lỗi
            if (empty($_POST['name'])) {
                $error[] = "Bạn phải nhập tên";
            }
            if (empty($_POST['year_of_birth'])) {
                $error[] = "Bạn phải nhập ngày sinh";
            }
            if (empty($_POST['phone_number'])) {
                $error[] = "Bạn phải nhập số điện thoại";
            }
            if (count($error)) {
                flash('errors', $error, 'edit');
            } else {
                $check = $this->category->updateDataStudent($id, $_POST['name'], $_POST['year_of_birth'], $_POST['phone_number']);
                if ($check) {
                    flash('success', 'Cập nhật thành công', 'edit');
                } else {
                    flash('errors', 'Cập nhật thất bại', 'edit');
                }
            }
        }
    }

    // Xóa sinh viên
    public function destroy($id)
    {
        $check = $this->category->deleteDataStudent($id);
        if ($check) {
            flash('success', 'Xóa thành công', 'index');
        } else {
            flash('errors', 'Xóa thất bại', 'index');
        }
    }
}
