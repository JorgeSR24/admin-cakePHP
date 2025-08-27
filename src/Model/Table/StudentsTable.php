<?php

namespace App\Model\Table;
use Cake\ORM\Table;

class StudentsTable extends Table{
    public function initialize(array $config): void
    {
        //tbl_student
        $this->setTable("tbl_students");

        //college
        $this->belongsTo("studentCollege", [
            "className" => "Colleges",
            "foreignKey" => "college_id"
        ]);

        //branch
        $this->belongsTo("studentBranch", [
            "className" => "Branches",
            "foreignKey" => "branch_id"
        ]);
    }
}


?>