<div class="social-media">
    <i class="fab fa-facebook fa-3x"></i>
    <i class="fab fa-twitter-square fa-3x"></i>
    <i class="fab fa-instagram fa-3x"></i>
</div>

<div class="headline">
    <h3>
        <a href="{{ route('welcome') }}">
            flat42
        </a>
    </h3>
</div>

<div class="fancy-form">
    <form class="form-card" action="#" method="post">
        <fieldset class="form-fieldset">
            <div class="form-element form-input">
                <input id="news-email" class="form-element-field" placeholder=" " type="email" required/>
                <div class="form-element-bar"></div>
                <label class="form-element-label" for="news-email">Email</label>
                <small class="form-element-hint">We will never spam you!</small>
            </div>
        </fieldset>
        <div class="container">
            <button type="submit" id="new-button">Submit</button>
        </div>
    </form>

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>


