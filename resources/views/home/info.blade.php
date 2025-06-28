<section class="info_section">
    <div class="container-fluid no-gutters">
        <div class="footer-content">
            <!-- Brand and social media -->
            <div class="footer-brand">
                <h4>Clutch.gg</h4>
                <div class="social-icons">
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            
            <!-- Footer columns -->
            <div class="footer-columns">
                <!-- About column -->
                <div class="footer-column">
                    <h5>About</h5>
                    <p>We provide high-quality gaming accessories with sleek design and premium performance for gamers who demand the best.</p>
                </div>
                
                <!-- Quick links -->
                <div class="footer-column">
                    <h5>Quick Links</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">Categories</a></li>
                        <li><a href="#">My Account</a></li>
                    </ul>
                </div>
                
                <!-- Contact info -->
                <div class="footer-column">
                    <h5>Contact</h5>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Dhaka, Bangladesh</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone-alt"></i>
                            <span>+880 151 654 7422</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>support@clutch.gg</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
.info_section {
    background-color: #1F2937;
    padding: 60px 0 20px;
    color: #f5f5f5;
    font-family: 'Poppins', sans-serif;
    width: 100vw;
    max-width: 100vw;
    overflow: hidden;
    margin: 0;
    position: relative;
    left: 50%;
    right: 50%;
    margin-left: -50vw;
    margin-right: -50vw;
}

.container-fluid.no-gutters {
    width: 100%;
    max-width: 100%;
    padding-right: 0;
    padding-left: 0;
    margin-right: auto;
    margin-left: auto;
}

.footer-content {
    display: grid;
    grid-template-columns: 1fr;
    gap: 40px;
    margin-bottom: 40px;
    width: 100%;
    padding: 0 15px;
    box-sizing: border-box;
}

.footer-brand {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;
    width: 100%;
}

.footer-brand h4 {
    font-size: 24px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #f05454;
    letter-spacing: 1px;
}

.social-icons {
    display: flex;
    gap: 15px;
}

.social-icons a {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: rgba(255, 255, 255, 0.1);
    color: #f5f5f5;
    transition: all 0.3s ease;
}

.social-icons a:hover {
    background-color: #f05454;
    transform: translateY(-3px);
}

.footer-columns {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 30px;
    width: 100%;
    padding: 0;
}

.footer-column {
    width: 100%;
}

.footer-column h5 {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 20px;
    position: relative;
    padding-bottom: 10px;
}

.footer-column h5::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 30px;
    height: 2px;
    background-color: #f05454;
}

.footer-column p {
    font-size: 14px;
    line-height: 1.6;
    color: #aaa;
    margin-bottom: 20px;
}

.footer-column ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-column ul li {
    margin-bottom: 10px;
}

.footer-column ul li a {
    color: #aaa;
    text-decoration: none;
    transition: color 0.3s ease;
    font-size: 14px;
    display: inline-block;
}

.footer-column ul li a:hover {
    color: #f05454;
    transform: translateX(3px);
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.contact-item {
    display: flex;
    align-items: flex-start;
    gap: 10px;
}

.contact-item i {
    color: #f05454;
    font-size: 16px;
    margin-top: 3px;
}

.contact-item span {
    font-size: 14px;
    color: #aaa;
    line-height: 1.4;
}

.copyright {
    display: flex;
    justify-content: center;
    align-items: center;
    padding-top: 20px;
    padding-bottom: 10px;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    width: 100%;
}

.payment-methods {
    display: flex;
    gap: 10px;
}

.payment-methods i {
    font-size: 24px;
    color: #888;
}

/* Extra Small devices (phones, 576px and down) */
@media (max-width: 576px) {
    .info_section {
        padding: 40px 0 15px;
    }
    
    .footer-columns {
        grid-template-columns: 1fr;
        gap: 25px;
    }
    
    .footer-column h5 {
        font-size: 16px;
    }
    
    .footer-column p, 
    .footer-column ul li a, 
    .contact-item span {
        font-size: 13px;
    }
    
    .social-icons a {
        width: 35px;
        height: 35px;
    }
    
    .payment-methods i {
        font-size: 20px;
    }
}

/* Small devices (landscape phones, 576px to 767px) */
@media (min-width: 576px) and (max-width: 767px) {
    .footer-columns {
        grid-template-columns: repeat(2, 1fr);
    }
}

/* Medium devices (tablets, 768px to 991px) */
@media (min-width: 768px) and (max-width: 991px) {
    .footer-columns {
        grid-template-columns: repeat(3, 1fr);
    }
}

/* Large devices (desktops, 992px and up) */
@media (min-width: 992px) {
    .footer-content {
        padding: 0 30px;
    }
    
    .footer-columns {
        grid-template-columns: repeat(3, 1fr);
    }
}
</style>