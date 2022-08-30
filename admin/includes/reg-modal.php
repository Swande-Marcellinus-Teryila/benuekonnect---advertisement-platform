

<h3  style="color:navyblue">Hostel Application Form</h3>
 <form id="regForm"  class="main_form" action="appsuccess.php" method="POST" enctype="multipart/form-data"">

<!-- One "tab" for each step in the form: -->


<div class="tab">
  <p><input id="matno" name="matno" placeholder="Matric/Reg No." oninput="this.className = ''"></p>
  <P class="fa fa-user-o">&nbsp;&nbsp;&nbsp;LEVEL</P>
  <p><select name="level" class="form-control" >
    <option oninput="this.className = ''">100</option>
    <option oninput="this.className = ''">200</option>
     <option oninput="this.className = ''">300</option>
    <option oninput="this.className = ''">400</option>
    <option oninput="this.className = ''">500</option>
    <option oninput="this.className = ''">600</option>
     <option oninput="this.className = ''">700</option>
    <option oninput="this.className = ''">Masters Student</option>      
</select>
<br> <br>
   </p>
    </P>

   </div>

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

                        <div class="tab"> PERSONAL INFO 3
   <br/> 
  

        <P class="fa fa-user-o">&nbsp;&nbsp;&nbsp;State</P>
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



                      <div class="tab"> Health Info
   <br/>

        <P class="fa fa-user-o">&nbsp;&nbsp;&nbsp;</P>
  <p><select id="health" name="health" class="form-control"><br> <br> 
<option value="Physically impared" >Physically impared</option>
<option value="Not Physically impared">Not physically impared</option>
        
</select><br>
   
    </P>
   
</div>





   
<div class="tab">Contact Info:
  <p><input name="email" type="email" placeholder="E-mail..." oninput="this.className = ''"></p>
  <p><input  type="number" name="phone" placeholder="Phone..." max="11" oninput="this.className = ''"></p>
  <P><textarea style="address" placeholder="Address" name="address"></textarea></P>
</div>

<p>

<div class="tab"  id="room">Reserve Room:

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
  <span class="step"></span>
  <span class="step"></span>
</div>

</form> 