<?php 
    require_once '../../core/init_ajax.php'; 
?>
<!-- <h1><?php //echo $row['subject_name'] ?></h1> -->
<table class="table table-hover" id="tblSubject">
    <thead>
        <tr>
            <th>Subject Name</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($SubjectCls->query_generator('SELECT', 'tblAllSubjectsList', [NULL], ['is_active' => 1, 'is_deleted' => 0]) as $row){ 
        ?>
        <tr>
            <td><?php echo $row['subject_name'] ?></td>
            <td>
                <a href="UpdateSubjectPage.php" class="btn btn-warning">Update Subject</a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>