<style>
    .logo> a > img {
       height: 50px;
    }
    .logo > a > img:hover {
     display: inline-block;
     /* animation: rotateIn; */
     animation: flip; 
     animation-duration: 2s; /* don't forget to set a duration! */
   }
   
   .header-right-left {
       margin-top: 10px;
   }
   
   .prfil-img {
       border: 2px solid gray;
       border-radius: 25px;
   }
   
   .fa-user {
       
   }
   </style>
   
   <section class="title-bar">
       <div class="logo">
           <a href="#"><img src="<?php echo e(asset('admin/images/matrix-logo.png')); ?>" alt="" /></a>
       </div>
    
       
       <div class="clearfix"> </div>
   </section><?php /**PATH C:\xampp\htdocs\backupcoveragearea\resources\views/layout/includes/_titlebar.blade.php ENDPATH**/ ?>