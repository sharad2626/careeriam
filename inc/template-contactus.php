<?php
/**
 * Template name: Contact us
 */
get_template_part('header-login');
?>
<div class="company-header sections">
	<div class="container">
		<div class="breadcrumbs-sec">
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">contact us</a></li>
            </ul>
         </div>
         <div class="contact_left_content">
         <h4>Contact Us</h4>
         <p>Use this contact form to send us an email.</p>
         <form>
         <span class="contact_feilds">
                <h3 class="label">Name</h3>
             <span class="input">
                <input name="Name" id="Name" placeholder="please enter your name" type="text">
             </span>
         </span>
         <span class="contact_feilds">
                <h3 class="label">Email</h3>
             <span class="input">
                <input name="email" id="email" placeholder="Please enter your email id" type="email">
             </span>
         </span>
         <span class="contact_feilds">
                <h3 class="label">message</h3>
             <span class="input">
                <input name="teaxtarea" id="teaxtarea" placeholder="" type="textarea">
             </span>
         </span>
         <span class="full submit-row">
               <input class="gradient-btn" value="Send Message" type="submit">
		 </span>	
         </form>
         </div>
         <div class="contact_left_content">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57168.228604998214!2d-81.83509820942356!3d26.42301550056689!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x88db11dab201734d%3A0xb394cd8f1c700fa4!2sEstero%2C+FL%2C+USA!5e0!3m2!1sen!2sin!4v1461154800555" width="500" height="335" frameborder="0" style="border:0" allowfullscreen></iframe>	
         </div>
                                        
         </div>
          
	</div>
</div>

<?php 

//get_footer(); 
get_footer('login');

?>