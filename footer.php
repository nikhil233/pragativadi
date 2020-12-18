
<footer class="container mt-5  bg-primary">
            <div class="ad">
                <h5>You May Like</h5>
                <div class="row">
                    <div class="col-md-3 col-12">
                    <iframe src="https://picsum.photos/seed/picsum/200/300" frameborder="0" class="iframe"></iframe>
                    </div>
                    <div class="col-md-3 col-12">
                    <iframe src="https://picsum.photos/seed/picsum/200/300" frameborder="0" class="iframe"></iframe>
                    </div>
                    <div class="col-md-3 col-12">
                    <iframe src="https://picsum.photos/seed/picsum/200/300" frameborder="0" class="iframe"></iframe>
                    </div>
                    <div class="col-md-3 col-12">
                    <iframe src="https://picsum.photos/seed/picsum/200/300" frameborder="0" class="iframe"></iframe>
                    </div>
                </div>
            </div>
            <div class="footer_end">
                    <ul class="footer_nav ">
                    <?php 
                        $sql="SELECT * from cities order by id asc LIMIT 4";
                        $result=$crud->getData($sql);
                        $i=1;
                        foreach ($result as $res) {
                            $active='';
                            if($i==1){
                                $active='active';
                            }

                    ?>
                        <li class="nav-item ">
                            <a class="nav-link active" href="./index.php?id=<?php echo $res['id']?>"><?php echo $res['city_name']?></a>
                        </li>
                    <?php
                        $i++;
                        }
                    ?>
                        
                    </ul>
                        
                    <p style="float-right;    display: flex;align-items: center;">© 2020 - Pragativadi: Leading Odia Dailly. All Rights Reserved.  </p>
            </div>
            
               
                
        </footer>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-rwdImageMaps/1.6/jquery.rwdImageMaps.min.js" integrity="sha512-eZB7hQa0bRlrKMQ2njpP0d/Klu6o30Gsr8e5FUCjUT3fSlnVkm/1J14n58BuwgaMuObrGb7SvUfQuF8qFsPU4g==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/maphilight/1.4.0/jquery.maphilight.min.js" integrity="sha512-AXsnvY/qS75ZpZGBz0CkJHMY55DNWyTeXmjZU2W8IZNHcnxSP31UuAaiCWfdajWk+a3kAeSX8VpYLsP635IGuA==" crossorigin="anonymous"></script>

<script>
    
//     $('img[usemap]').rwdImageMaps();
//     // $('.map').maphilight();
//     FRONT_SITE_PATH='http://127.0.0.1/news_manage/';
//   function myFunction(imgs,no,id_map) {
   
//     FRONT_SITE_PATH='http://127.0.0.1/news_manage/';
//     var expandImg = document.getElementById("expandedImg");
//     // var atag = document.getElementById("lar_im");
    
//     var imgText = document.getElementById("imgtext");

//         $('#expandedImg').hide();
//         $('#pleas').append('PLEASE WAIT...');
        
//         setTimeout(function(){
//             //   $('#img2').show();// or slideDown();  or fadeIn();  
//             imgText.innerHTML = imgs.alt;
//             expandImg.src = imgs.src;
//             // atag.href=imgs.src;    
//             $('#expandedImg').show();
//             $('#pleas').html('');
//             $('.map').css('background-image','url('+imgs+')');
            
//             }, 1000);
//             $.ajax({
//                 url: FRONT_SITE_PATH+"get_map.php",
//                 method: "POST",
//                 data: {'id':id_map},
                
//                 success: function (result) {
//                     // var data=jQuery.parseJSON(result);
//                     console.log(result);
//                     $('#maping').html(result);
                    
//                     $('img[usemap]').rwdImageMaps();
                  
//                     // $('.map').maphilight();
//                 }

//             });
           
//     var header = document.querySelector(".pagination");
   
//     var header2 = document.querySelector(".pagination_2");
    
//     var current = header.getElementsByClassName("active");
//     var current2 = header2.getElementsByClassName("active");
//     current[0].className = current[0].className.replace(" active", "");
//     current2[0].className = current2[0].className.replace(" active", "");
//     var page_no = imgText.textContent;
//     let note = header.querySelector('.Page_'+no);
//     let note2 = header2.querySelector('.Page_'+no);
    
//     note.parentNode.classList.add('active');
//     note2.parentNode.classList.add('active');
//     expandImg.parentElement.style.display = "block";
//     }
//     function myFunction2(imgs,page_no,no,id_map) {
      
//         var expandImg = document.getElementById("expandedImg");
//         var imgText = document.getElementById("imgtext");
//         // var atag = document.getElementById("lar_im");
//         imgText.innerHTML = page_no;
//         $('#expandedImg').hide();
//         $('#pleas').append('PLEASE WAIT...');
//         setTimeout(function(){
//         //   $('#img2').show();// or slideDown();  or fadeIn();  
        
//         expandImg.src = imgs;
//         // atag.href=imgs;    
//         $('#expandedImg').show();
//         $('#pleas').html('');
        
       
            

//         }, 1000);
//         $.ajax({
//             url: FRONT_SITE_PATH+"get_map.php",
//             method: "POST",
//             data: {'id':id_map},
         
//             success: function (result) {
//                 // var data=jQuery.parseJSON(result);
//                 console.log(result);
//                 $('#maping').html(result);
//                 $('img[usemap]').rwdImageMaps();
//                 $('.map').css('background-image','url('+imgs+')');
//                 // $('.map').maphilight();
//             }

//         });
//         var header = document.querySelector(".pagination");
   
//         var header2 = document.querySelector(".pagination_2");
        
//         var current = header.getElementsByClassName("active");
//         var current2 = header2.getElementsByClassName("active");
//         current[0].className = current[0].className.replace(" active", "");
//         current2[0].className = current2[0].className.replace(" active", "");
//         var page_no = imgText.textContent;
//         let note = header.querySelector('.Page_'+no);
//         let note2 = header2.querySelector('.Page_'+no);
        
//         note.parentNode.classList.add('active');
//         note2.parentNode.classList.add('active');
//         expandImg.parentElement.style.display = "block";
//     }
    
    
    function change_date(nid){
        var date=$('#dt').val();
        // $.ajax.url('index.php?id='+nid+'&date='+date).load();
        FRONT_SITE_PATH='http://127.0.0.1/news_manage/epaper_news';
        window.location.href = FRONT_SITE_PATH+"/"+nid+"/"+date;
    }
    function change_date2(nid){
        var date=$('#dt').val();
        // $.ajax.url('index.php?id='+nid+'&date='+date).load();
        FRONT_SITE_PATH='http://127.0.0.1/news_manage/avimat';
        window.location.href = FRONT_SITE_PATH+"/"+nid+"/"+date;
    }
    $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            maxDate: '0'
        });
    $('#startdate').click(function () {
        $('.datepicker').datepicker('show');
        
    });
    $('#dp1').change(function(){
        var daate=$('#dp1').val();
        FRONT_SITE_PATH='http://127.0.0.1/news_manage/archive';
        window.location.href = FRONT_SITE_PATH+"/"+daate;
    });
</script>

</body>
</html>
