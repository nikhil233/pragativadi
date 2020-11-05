<?php
require('top.php');

    if(isset($_GET['id'])){
        $id =   $crud->escape_string($_GET['id']);
        $sql="SELECT page_image from news_posts_image where id=$id";
        $result=$crud->getData($sql);
    }
}
?>
<?php
require('footer.php');
?>