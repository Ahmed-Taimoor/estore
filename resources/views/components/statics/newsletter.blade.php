<div class="axil-newsletter-area axil-section-gap pt--0" id='newsletter'>
    <div class="container">
        <div class="etrade-newsletter-wrapper bg_image bg_image--12">
            <div class="newsletter-content">
                <span class="title-highlighter highlighter-primary2"><i class="fa fa-envelope-open"></i>Newsletter</span>
                <h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
                <form class="input-group newsletter-form" id="newsletter-form">
                    @csrf
                    <div class="position-relative newsletter-inner mb--15">
                        <input placeholder="example@gmail.com" type="text" name="email">
                    </div>
                    <button type="submit" class="axil-btn mb--15 " id="newsletter-button">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
    <!-- End .container -->
</div>

{{-- subcribe --}}
