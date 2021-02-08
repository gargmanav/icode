

<div class="web" style="position: sticky;z-index: 100; top: 0; ">

  <div class="container-fluid">
    <div class="row" >
      <div class="col-md-2 offset-md-1 " style="justify-content: right"><img src="<?php echo base_url('assets/images/logo1.png')?>" style="height: 5rem;margin-top: 5px;margin-bottom: 5px;"></div>
      <div class="col-md-6 " style="text-align: right; margin-top: 50px">
        <a href="<?php echo base_url('index.php/welcome/index') ?>" class="menu">HOME</a>
        <a href="<?php echo base_url('index.php/welcome/hotels') ?>" class="menu">HOTELS</a>
        <a class="menu">RENT</a>
        <a class="menu">BUY PROPERTY</a>
      </div>
      <div class="col-md-3">
        
      </div>
    </div>
  </div>

</div> <!--2web end-->

<div class="mobile" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);position: sticky;top: 0; z-index: 100">

  <div class="container">
  
  <div class="row" style="background-color: white">
      <div class="col-2" style="text-align: left;margin-left: 0px;font-size: x-large;background-color: white; border:none">
        <i class="fa fa-bars" id="open1" onclick="openNav()" style="color: black;margin-top: 35px;"></i>
        <i class="fa fa-bars" id="close1" onclick="closeNav()" style="color: black;margin-top: 35px;display: none"></i>
      </div>
      <div class="col-10"><p style="text-align: center;"><img src="<?php echo base_url('assets/images/logo1.png') ?>" style="width: 101px; height: 61px; margin-top: 10px;margin-right:55px;"></p></div>
       
        
      </div>
      
  </div>


  <div id="myNav" class="overlay">
  
  <div class="overlay-content">
    <a href="<?php echo base_url('index.php/welcome/index') ?>">Home</a>
    <a href="<?php echo base_url('index.php/welcome/hotels') ?>" onclick="closeNav()">Book Hotels</a>
    <a href="#" onclick="closeNav()">Rent Property</a> 
    <a href="#" onclick="closeNav()">Buy Property</a>
    <a href="#" onclick="closeNav()">Contact</a>
  </div>


</div><!--row-->

  
  </div><!--container-->
  
</div><!--mobile end-->

<script type="text/javascript">
   function openNav() {
  document.getElementById("myNav").style.width = "60%";
  document.getElementById("main").style.marginLeft = "50%";
  document.getElementById("open1").style.display = "none";
  document.getElementById("close1").style.display = "block";
  
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
  document.getElementById("main").style.marginLeft = "0%";
    document.getElementById("open1").style.display = "block";
  document.getElementById("close1").style.display = "none";
}
</script>