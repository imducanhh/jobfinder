<?php
    require_once('models/Model.php');
    class Job extends Model {
        var $table = 'jobs';
        var $primary_key = 'code';   
    }
?>