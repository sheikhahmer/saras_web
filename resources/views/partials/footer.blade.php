<footer style="background:#111110; color:#FAF6F1; position:relative; overflow:hidden;">

    <div style="position:absolute; top:-80px; right:-80px; width:300px; height:300px; border-radius:50%; border:1px solid rgba(217,79,79,0.08); pointer-events:none;"></div>
    <div style="position:absolute; top:-40px; right:-40px; width:180px; height:180px; border-radius:50%; border:1px solid rgba(217,79,79,0.12); pointer-events:none;"></div>
    <div style="position:absolute; bottom:60px; left:-60px; width:220px; height:220px; border-radius:50%; border:1px solid rgba(250,246,241,0.04); pointer-events:none;"></div>

    <div style="height:3px; background:linear-gradient(90deg, #d94f4f 0%, #E8C9B8 40%, #C9B49A 70%, #d94f4f 100%);"></div>

    <div style="max-width:1200px; margin:0 auto; padding:64px 32px 40px;">
        <div class="footer-section" style="text-align:center; margin-bottom:56px;">
            <div style="font-family:'Cormorant Garamond', serif; font-size:3.5rem; font-weight:700; letter-spacing:-0.02em; margin-bottom:12px;">
                Sara's<span style="color:#d94f4f;">.</span>
            </div>
            <p style="color:rgba(250,246,241,0.4); font-size:0.6rem; font-weight:700; letter-spacing:0.35em; text-transform:uppercase; margin-bottom:20px;">
                Handcrafted with love • Macrame &amp; Cotton Arts
            </p>
            <div style="display:flex; justify-content:center; gap:8px; margin-bottom:0;">
                <span class="footer-dot" style="width:6px; height:6px; border-radius:50%; background:#d94f4f; display:inline-block;"></span>
                <span class="footer-dot" style="width:6px; height:6px; border-radius:50%; background:#C9B49A; display:inline-block;"></span>
                <span class="footer-dot" style="width:6px; height:6px; border-radius:50%; background:#E8C9B8; display:inline-block;"></span>
            </div>
        </div>

        <div class="footer-divider" style="margin-bottom:56px;"></div>

        <div style="display:grid; gap:40px; grid-template-columns:1fr;" id="footerGrid">
            <div class="footer-section" style="transition-delay:0.1s;">
                <p style="font-size:0.55rem; font-weight:700; letter-spacing:0.35em; text-transform:uppercase; color:#d94f4f; margin-bottom:20px;">Quick Links</p>
                <div style="display:flex; flex-direction:column; gap:12px;">
                    <a href="{{ route('home') }}" class="footer-link">Home</a>
                    <a href="{{ url('/category') }}" class="footer-link">Shop Collection</a>
                    <a href="#" class="footer-link">Our Story</a>
                    <a href="#" class="footer-link">Blog</a>
                    <a href="#" class="footer-link">Contact Us</a>
                </div>
            </div>

            <div class="footer-section" style="transition-delay:0.2s;">
                <p style="font-size:0.55rem; font-weight:700; letter-spacing:0.35em; text-transform:uppercase; color:#d94f4f; margin-bottom:20px;">Categories</p>
                <div style="display:flex; flex-direction:column; gap:12px;">
                    <a href="#" class="footer-link">Wall Hangings</a>
                    <a href="#" class="footer-link">Plant Hangers</a>
                    <a href="#" class="footer-link">Cotton Cords</a>
                    <a href="#" class="footer-link">Boho Decor</a>
                    <a href="#" class="footer-link">Gift Sets</a>
                </div>
            </div>

            <div class="footer-section" style="transition-delay:0.3s;">
                <p style="font-size:0.55rem; font-weight:700; letter-spacing:0.35em; text-transform:uppercase; color:#d94f4f; margin-bottom:20px;">Stay in Touch</p>
                <p style="color:rgba(250,246,241,0.4); font-size:0.8rem; line-height:1.7; margin-bottom:24px;">Get the latest arrivals, exclusive offers and artisan stories straight to your inbox.</p>
                <div style="display:flex; flex-direction:column; gap:10px;">
                    <input type="email" placeholder="Your email address" class="newsletter-input" style="padding:12px 16px; font-family:Raleway,sans-serif; font-size:0.7rem; letter-spacing:0.1em; border-radius:0;"/>
                    <button onclick="handleSubscribe(this)" style="background:#d94f4f; color:#FAF6F1; border:none; padding:12px 24px; font-family:Raleway,sans-serif; font-size:0.6rem; font-weight:700; letter-spacing:0.25em; text-transform:uppercase; cursor:pointer; transition:background 0.3s ease; position:relative; overflow:hidden;" onmouseover="this.style.background='#c04040'" onmouseout="this.style.background='#d94f4f'">
                        Subscribe &nbsp;<i class="fas fa-arrow-right"></i>
                    </button>
                </div>
                <p id="subMsg" style="display:none; color:#C9B49A; font-size:0.65rem; margin-top:10px; letter-spacing:0.1em;">✓ Thank you for subscribing!</p>
            </div>

            <div class="footer-section" style="transition-delay:0.4s;">
                <p style="font-size:0.55rem; font-weight:700; letter-spacing:0.35em; text-transform:uppercase; color:#d94f4f; margin-bottom:20px;">Contact</p>
                <div style="display:flex; flex-direction:column; gap:14px;">
                    <div style="display:flex; align-items:flex-start; gap:12px;">
                        <i class="fas fa-map-marker-alt" style="color:#d94f4f; font-size:0.75rem; margin-top:3px; flex-shrink:0;"></i>
                        <span style="color:rgba(250,246,241,0.45); font-size:0.75rem; line-height:1.6;">123 Artisan Lane, Craft District, City 10001</span>
                    </div>
                    <div style="display:flex; align-items:center; gap:12px;">
                        <i class="fas fa-envelope" style="color:#d94f4f; font-size:0.75rem; flex-shrink:0;"></i>
                        <a href="mailto:hello@sarascreations.com" style="color:rgba(250,246,241,0.45); font-size:0.75rem; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='rgba(250,246,241,0.85)'" onmouseout="this.style.color='rgba(250,246,241,0.45)'">hello@sarascreations.com</a>
                    </div>
                    <div style="display:flex; align-items:center; gap:12px;">
                        <i class="fas fa-phone" style="color:#d94f4f; font-size:0.75rem; flex-shrink:0;"></i>
                        <span style="color:rgba(250,246,241,0.45); font-size:0.75rem;">+1 (555) 234-5678</span>
                    </div>
                </div>
                <div style="display:flex; gap:10px; margin-top:28px;">
                    <a href="#" class="footer-social-btn" title="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="footer-social-btn" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="footer-social-btn" title="Pinterest"><i class="fab fa-pinterest-p"></i></a>
                    <a href="#" class="footer-social-btn" title="YouTube"><i class="fab fa-youtube"></i></a>
                    <a href="#" class="footer-social-btn" title="Twitter"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </div>

        <div style="height:1px; background:rgba(250,246,241,0.08); margin:48px 0 24px;"></div>

        <div class="footer-section" style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:16px; transition-delay:0.5s;">
            <p style="color:rgba(250,246,241,0.25); font-size:0.6rem; font-weight:600; letter-spacing:0.15em; text-transform:uppercase;">
                © 2026 Sara's Creations. All Rights Reserved.
            </p>
            <div style="display:flex; gap:20px;">
                <a href="#" style="color:rgba(250,246,241,0.25); font-size:0.6rem; font-weight:600; letter-spacing:0.12em; text-transform:uppercase; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='#d94f4f'" onmouseout="this.style.color='rgba(250,246,241,0.25)'">Privacy</a>
                <a href="#" style="color:rgba(250,246,241,0.25); font-size:0.6rem; font-weight:600; letter-spacing:0.12em; text-transform:uppercase; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='#d94f4f'" onmouseout="this.style.color='rgba(250,246,241,0.25)'">Terms</a>
                <a href="#" style="color:rgba(250,246,241,0.25); font-size:0.6rem; font-weight:600; letter-spacing:0.12em; text-transform:uppercase; text-decoration:none; transition:color 0.3s;" onmouseover="this.style.color='#d94f4f'" onmouseout="this.style.color='rgba(250,246,241,0.25)'">Cookies</a>
            </div>
        </div>
    </div>
</footer>

