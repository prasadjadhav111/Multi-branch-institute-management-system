   <div class="quck-nav">
            <div class="container">
                <div class="contact-no"><a href="https://www.google.co.in/maps/@21.1701335,72.8220063,15z?hl=en&authuser=0" target="_blank"><i class="fa fa-map-marker"></i>Surat,Gujrat,India</a></div>
                <div class="contact-no"><a href="#"><i class="fa fa-phone"></i>9725832019</a></div>
                <div class="contact-no"><a href="#"><i class="fa fa-globe"></i>academy.com</a></div>
                <div class="quck-right">
                   
                    <div class="right-link"><a href="#" id="sup"><i class="fa fa-headphones"></i>Online Support</a></div>
                    
                    <?php if($this->session->userdata('loggedIn') == true){
                    ?>
                    <div class="right-link user-profileLink">
                        <a href="javascript:void(0);"><i class="fa  fa-user fa-2x"></i> <?php echo '  '.$this->session->userdata('sname'); ?></a>
                        <ul class="accout-link">
                            <li><a href="<?php echo base_url('student/profile');?>">My Account</a></li>
                            <li><a href="<?php echo base_url('student/dashboard');?>">My Dashboard</a></li>
                            <li><a href="<?php echo base_url().'login_c/logout'; ?>">Sign Out</a></li>
                        </ul>
                    </div>
                    <?php } else { ?>
                    <div class="right-link"><a href="<?php echo base_url('student');?>"><i class="fa  fa-user"></i>Login</a></div>
                    <?php } ?>
                </div>
            </div>
        </div>