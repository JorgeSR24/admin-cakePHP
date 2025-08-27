<?php

namespace App\Model\Table;
use Cake\ORM\Table;

class StaffsTable extends Table{
    public function initialize(array $config): void
    {
        //tbl_staff
        $this->setTable("tbl_staffs");

        //college
        $this->belongsTo("staffCollege", [
            "className" => "Colleges",
            "foreignKey" => "college_id"
        ]);

        //branch
        $this->belongsTo("staffBranch", [
            "className" => "Branches",
            "foreignKey" => "branch_id"
        ]);
    }
}


?>
