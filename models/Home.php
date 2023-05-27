<?php
    require_once('models/Model.php');
    class Home extends Model {
        var $table = 'jobs';
        var $primary_key = 'code';   
    }
?>