<?php 
session_start();

$_db_host       =   "localhost";
$_db_username   =   "root";
$_db_password   =   "";
$_db_name       =   "attendance";

$GLOBALS['config'] = [
    'mysql' => mysqli_connect($_db_host, $_db_username, $_db_password, $_db_name)
];

spl_autoload_register(function ($class) {
    include "../../classes/$class.php";
});

$SubjectCls         = new SubjectCls;
$ProfessorCls       = new ProfessorCls;
$CourseCls          = new CourseCls;
$SemesterCls        = new SemesterCls;
$StudentCls         = new StudentCls;
$SectionCls         = new SectionCls;
$FinalScheduleCls   = new FinalScheduleCls;
$SubjectSchedCls    = new SubjectSchedCls;
?>