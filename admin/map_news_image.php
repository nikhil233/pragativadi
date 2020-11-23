
<?php
require('top.php');

    if(isset($_GET['id']) && isset($_GET['city_name'])){
        
        $id =   $crud->escape_string($_GET['id']);
        $city_name =   $crud->escape_string($_GET['city_name']);
        //echo $city_name;
        $sql=  "SELECT news_posts_image.*,news_posts.news_date from news_posts_image,news_posts where   news_posts.id=news_posts_image.post_id and news_posts_image.id=$id ";
        $result=$crud->getData($sql);
    }
    else{
        redirect('post_list.php');
    }
?>

<style>
	.cropper-crop {
		display: none;
	}
	.cropper-bg {
		background: none;
	}
</style>
 <div class="row">
			<h1 class="card-title ml10">Map Image for Page <?php echo $result[0]['page_no'] ?></h1>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">

              <img src="<?php echo SITE_NEWS_IMAGE.$result[0]['page_image'] ?>" alt="" width="100%" id="image">
                <div class="card-body">
                <?php
                // echo '<pre>';
                // print_r($result);
                ?> 
                 <button type="button" class="btn btn-primary" onclick="crop();">
                    Save
                </button>
                <input type="hidden" id="n_id" value="<?php echo $id ?>">
                <input type="hidden" id="x">
                <input type="hidden" id="y">
                <input type="hidden" id="width">
                <input type="hidden" id="height">

                <br>
                <div class="row mt-2">

                
                <?php

                $sqli=  "SELECT * from news_map where news_im_id=$id ";
                $resulti=$crud->getData($sqli);
                
                // echo '<pre>';
                // print_r($result);
                
                if(count($resulti)>0){
                    foreach ((array)$resulti as $res) {
                        ?>
                        <div class="col-md-4 col-12 mt-3">
                        <img src="<?php echo SITE_NEWSMAP_IMAGE.$res['image'] ?>" style="width:100%" alt="">
                        <button class="btn btn-danger mt-3" onclick="delete_image('<?php echo $res['id']?>');">Delete</button>
                        </div>
                    <?php
                    }
                }
                ?>
                </div>
                
        </div>
        </div>
        </div>
        </div>
                

<?php
require('footer.php');
?>
<script>
	$(function () {
		$("#image").cropper({
			zoomable: false,
			crop: function(event) {
				// console.log(event.detail.x);
				// console.log(event.detail.y);
				// console.log(event.detail.width);
				// console.log(event.detail.height);
				$('#x').val(event.detail.x);
				$('#y').val(event.detail.y);
				$('#width').val(event.detail.width);
				$('#height').val(event.detail.height);
			}
		});
	});
    function crop() {
		$("#image").cropper("getCroppedCanvas").toBlob(function (blob) {
			var formData = new FormData();
			formData.append("croppedImage", blob);
            var x=$('#x').val();
            var y=$('#y').val();
            var w=$('#width').val();
            var h=$('#height').val();
            var id=$('#n_id').val();
            formData.append("x",x);
            formData.append("y",y);
            formData.append("width",w);
            formData.append("height",h);
            formData.append("id",id);
            // alert($('#x').val());
            // alert($('#y').val());
            // alert($('#width').val());
            // alert($('#height').val());
            // console.log(formData);

			$.ajax({
				url: "map_news.php",
				method: "POST",
				data: formData,
				processData: false,
				contentType: false,
				success: function (response) {
					alert(response);
                    location.reload();
					// alert($('#x').val());
					// alert($('#y').val());
					// alert($('#width').val());
					// alert($('#height').val());
				}, error: function (xhr, status, error) {
					console.log(status, error);
				}
			});
		});
    }
    function delete_image(id){
        $.ajax({
				url: "delete_map_news.php",
				method: "POST",
				data: {'id':id},
				success: function (response) {
					alert(response);
                    location.reload();
				
				}, error: function (xhr, status, error) {
					console.log(status, error);
				}
			});
    }
</script>