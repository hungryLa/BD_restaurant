<?php 
    header( 'Location: ../querie.php');
    require_once('../config.php');
    if (($_POST['rad']) && ($_POST['do']))
    {
        $query = get_post('query'.$_POST['rad']);
        $par = get_post('par'.$_POST['rad']);

        if ($val)
        {
            switch($_POST['rad'])
            {
                case 1: $query = $query;
                case 2: $query = $query."'".$par."'"; 
            }
        }
    }

?>
