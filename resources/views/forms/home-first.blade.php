<div class="col-sm-4 col-xs-12">
    <div class="mf-contact-form-7 form-light sidebarform">
        <div class="mf-section-title text-left dark medium-size ">
            <h2>Request a Quote</h2>
        </div>
        <form id="contact-form" method="post" action="/mail" role="form" class="wpcf7-form" novalidate="true">
            <div class="messages"></div>
            <div class="controls mf-form mf-form-5">
                @csrf
                <div class="form-group">
                    <input id="name3" name="name" type="text" placeholder="Your Name" required="">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <input id="name3" name="email" type="email" placeholder="Email Address" required="">
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <textarea name="message" cols="40" rows="10" placeholder="Your Message"></textarea>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <button type="submit" class="wpcf7-form-control wpcf7-submit disabled" style="pointer-events: all; cursor: pointer;">Get a Quote</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>

</script>
