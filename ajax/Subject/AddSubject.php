<?php 
    require_once '../../core/init_ajax.php';
    $txtSubject =  $_GET['txtSubject'];

    $SubjectCls->query_generator('INSERT', 'tbl_subjects', ['subject_name' => $txtSubject]);

    echo "add success";
?>