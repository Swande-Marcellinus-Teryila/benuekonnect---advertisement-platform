



  <!-- product section -->
<?php include('includes/header.php') ?>

 

  

  <!-- why us section -->

  <section class="why_us_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-3 col-lg-3">
          
        </div>
        <div class="col-md-6  bg bg-dark">
          <div class="box ">
            <div class="img-box">
            </div>
            <div class="detail-box ">
              <h3  style="color:white">CUSTOMER REGISTRATION</h3>
 <form id="regForm"  class="main_form" action=".php" method="POST" enctype="multipart/form-data"">

<!-- One "tab" for each step in the form: -->

<div class="tab">PERSONAL INFO
  <p><input  id="surname" name="surname" placeholder="Surname" oninput="this.className = ''"></p>
  <p><input name="fname" placeholder="First Name." oninput="this.className = ''"></p>
  <p><input name="othernames" placeholder="Othernames.." oninput="this.className = ''"></p>
  <p>Date of birth</p>
  <p><input  name="dob" type="date" placeholder="Date of Birth" oninput="this.className = ''"></p>
  <P class="fa fa-user-o">&nbsp;&nbsp;&nbsp;Sex</P>
  <p><select id="sex" name="sex" class="form-control">
<option value="Male" >Male</option>
<option value="Female">Female</option>
        
</select><br>
   
    </P>
  
</div>

   <div class="tab">PROFILE PICTURE
    <p>
    <div class="form-group">
                              
                              <img id="list1" height="100" width="100" class="img-rounded"/>
                            
                              <input type="file" name="photo" id="upfile1" accept="image/jpeg, image/png, image/jpg, image/gif" class=" form-control input-rounded"  placeholder="upload" oninput="this.className = ''" >
                          </div> </p>

</div>

                        <div class="tab fa fa-bars"> STATE
   <br/> 
  

  <p><select id="select" name="state" class="form-control"><br> <br> 
<option value="outside">Outside Nigeria</option>
<option value="ABUJA FCT">ABUJA FCT</option>
<option value="ABIA">ABIA</option>
<option value="ADAMAWA">ADAMAWA</option>
<option value="AKWA IBOM">AKWA IBOM</option>
<option value="ANAMBRA">ANAMBRA</option>
<option  value="BAUCHI">BAUCHI</option>
<option value="BAYELSA">BAYELSA</option>
<option value="BENUE" >BENUE</option>
<option  value="BORNO">BORNO</option>
<option  value="CROSS RIVER">CROSS RIVER</option>
<option   value="DELTA" >DELTA</option>
<option value="EBONYI">EBONYI</option>
<option value=">EDO">EDO</option>
<option value="EKITI">EKITI</option>
<option  value="ENUGU" >ENUGU</option>
<option value="GOMBE">GOMBE</option>  
<option value="IMO">IMO</option>
<option value="JIGAWA">JIGAWA</option>
<option  value="KADUNA">KADUNA</option>
<option value="KANO">KANO</option>
<option value="KATSINA">KATSINA</option>
<option  value="KEBBI">KEBBI</option>
<option value="KOGI">KOGI</option>
<option value="KWARA">KWARA</option>
<option value="LAGOS">LAGOS</option>
<option  value="NASSARAWA">NASSARAWA</option>
<option value="NIGER">NIGER</option>
<option value="OGUN">OGUN</option>
<option value="ONDO">ONDO</option> 
<option value="OSUN">OSUN</option>
<option value="OYO" >OYO</option>
<option value="PLATEAU">PLATEAU</option>
<option value="RIVERS">RIVERS</option>
<option value="SOKOTO">SOKOTO</option>
<option value="TARABA">TARABA</option>
<option value="YOBE">YOBE</option>
<option value="ZAMFARA">ZAMFARA</option>
</select>
<br>
    </P>
</div>



   
<div class="tab">Contact Info:
  <p><input type="email" name="email" type="email" placeholder="E-mail..." oninput="this.className = ''"></p>
  <p><input  type="number" name="phone" placeholder="Phone..." max="11" oninput="this.className = ''"></p>
  <P class=""><textarea style="address" placeholder="Address" name="address" cols="15" rows="3"></textarea></P>
</div>

<p>

<div class="tab"  id="room"> <i class="fa fa-keys"></i> Security
  <p><input type="password" name="password" placeholder="password" oninput="this.className = ''"></p>
   <p><input type="password" name="password" placeholder="confirm password" oninput="this.className = ''"></p>
</div>

<!--div class="tab">Login Info:
  <p><input placeholder="Password" oninput="this.className = ''"></p>
  <p><input placeholder="Confirm_Password" oninput="this.className = ''"></p>
</div-->

<div style="overflow:auto;">
  <div style="float:right;">
    <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn btn-primary">Previous</button> 
    &nbsp;&nbsp;&nbsp;
    <button type="button" id="nextBtn" onclick="nextPrev(1)" class="btn btn-primary">Next</button>
  </div>
</div>

<!-- Circles which indicates the steps of the form: -->
<div style="text-align:center;margin-top:40px;">
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
  <span class="step"></span>
 
</div>

</form> 
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="box ">
            <div class="img-box">
              <img src="images/w3.png" alt="">
            </div>
            <div class="detail-box">
              <h5>
                Best Quality
              </h5>
              <p>
                variations of passages of Lorem Ipsum available
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end why us section -->


  <!-- client section -->

  <section class="client_section layout_padding-bottom">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          What Says Our Customers
        </h2>
      </div>
    </div>
    <div class="client_container ">
      <div id="carouselExample2Controls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="container">
              <div class="box">
                <div class="detail-box">
                  <p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </p>
                  <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it lookIt is a
                    long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it look
                  </p>
                </div>
                <div class="client-id">
                  <div class="img-box">
                    <img src="images/client.jpg" alt="">
                  </div>
                  <div class="name">
                    <h5>
                      James Dew
                    </h5>
                    <h6>
                      Photographer
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="box">
                <div class="detail-box">
                  <p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </p>
                  <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it lookIt is a
                    long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it look
                  </p>
                </div>
                <div class="client-id">
                  <div class="img-box">
                    <img src="images/client.jpg" alt="">
                  </div>
                  <div class="name">
                    <h5>
                      James Dew
                    </h5>
                    <h6>
                      Photographer
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <div class="container">
              <div class="box">
                <div class="detail-box">
                  <p>
                    <i class="fa fa-quote-left" aria-hidden="true"></i>
                  </p>
                  <p>
                    It is a long established fact that a reader will be distracted by the readable content of a page
                    when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it lookIt is a
                    long established fact that a reader will be distracted by the readable content of a page when
                    looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal
                    distribution of letters, as opposed to using 'Content here, content here', making it look
                  </p>
                </div>
                <div class="client-id">
                  <div class="img-box">
                    <img src="images/client.jpg" alt="">
                  </div>
                  <div class="name">
                    <h5>
                      James Dew
                    </h5>
                    <h6>
                      Photographer
                    </h6>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="carousel_btn-box">
          <a class="carousel-control-prev" href="#carouselExample2Controls" role="button" data-slide="prev">
            <span>
              <i class="fa fa-angle-left" aria-hidden="true"></i>
            </span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExample2Controls" role="button" data-slide="next">
            <span>
              <i class="fa fa-angle-right" aria-hidden="true"></i>
            </span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>
  </section>
  <?php  include('includes/reg-modal.php');?>
  <!-- end client section -->


  <!-- end info_section -->
  <?php include('includes/footer.php'); ?>
ss

  




















































