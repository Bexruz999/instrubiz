<div class="contactform" style="background: #ffffff">
    <div class="container">
        <div class="mf-section-title text-center dark large-size margbtm20">
            <h2>Contact Us</h2>
        </div>
        <div class="text-center margbtm40">Don’t hestiate to ask us something, Our customer support team always ready to help
            <br>you,they will support you 24/7.</div>
        <div class="contact-form mf-contact-form-7 form-light">

            <form id="contact-form" method="post" action="/mail" role="form" class="wpcf7-form" novalidate="true">
                <div class="messages"></div>
                <div class="controls mf-form mf-form-2">
                    <div class="row">
                        @csrf
                        <div class="col-md-6 col-xs-12 col-sm-12 mf-input-field">
                            <div class="form-group">
                                <input type="text" name="name" size="40" placeholder="Your Name*" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" size="40" placeholder="Email Address*" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" size="40" placeholder="Phone Number" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xs-12 col-sm-12 mf-textarea-field">
                            <div class="form-group">
                                <textarea name="message" cols="40" rows="10" placeholder="Enter Your Message..."></textarea>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="text-center mf-submit col-md-12 col-xs-12 col-sm-12">
                            <div class="form-group">
                                <button type="submit" class="btn-style-two disabled" style="pointer-events: all; cursor: pointer;">SEND</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>
