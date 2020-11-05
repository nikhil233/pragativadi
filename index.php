<?php
require('top.php');
?>
<h1 class="text-primary" style="text-align:center;">LATEST-Epaper</h1>
    <div class="container">
        <div class="row posts">
        <!-- SHOW DATA -->
        <!-- </div> -->
    </div> 
    
   
<?php
    require('footer.php');
?>
 <script>
        $(function(){
            
            // function for getting posts from posts.php
            function getPosts(pageNum){
                var pageNum = pageNum;
                $.ajax({
                    type:'POST',
                    url:'epaper_posts.php',
                    data:{page:pageNum},
                    success:function(data){
                        $('.posts').html(data);
                    },
                    error:function(error){
                        console.log(error);
                    }
                });

            }
            // call the getPosts function
            // here 1 is default page number
            getPosts(1);
            
            // when click pagination button
            $('.posts').on('click','.page-link',function(e){
                e.preventDefault();
                var page_num = $(this).attr('href');
                getPosts(page_num);
            });

        });
    </script>