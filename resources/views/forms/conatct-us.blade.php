<form id="contact-form" method="post" action="/mail" role="form" class="wpcf7-form" novalidate="novalidate">
    <div class="messages"></div>
    <div class="controls mf-form mf-form-2">
        <div class="row">
            @csrf
            <div class="col-md-6 col-xs-12 col-sm-12 mf-input-field">
                <div class="form-group">
                    <input id="name1" type="text" name="name" size="40" placeholder="Your Name*" required="">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <input id="email1" type="email" name="email" size="40" placeholder="Email Address*" required="">
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="col-md-6 col-xs-12 col-sm-12 mf-textarea-field">
                <div class="form-group">
                    <textarea id="message1" name="message" cols="40" rows="10" placeholder="Enter Your Message..."></textarea>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <div class="text-center mf-submit col-md-12 col-xs-12 col-sm-12">
                <div class="form-group">
                    <button type="submit" id="send" class="btn-style-two">SEND</button>
                </div>
            </div>
        </div>
    </div>

</form>
