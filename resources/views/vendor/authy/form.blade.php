@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/authy-forms.css/2.2/flags.authy.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/authy-forms.css/2.2/form.authy.css" />
@append

<div class="login-form">
    <form method="POST" action="{{url('auth/twofactor/enable')}}">
        {{csrf_field()}}
        <h3>Enable 2-Factor Authentication</h3>
        <div class="row">
            <div class="col-xs-3">Country:</div>
            <div class="col-xs-9">
                <select id="authy-countries" name="country-code"></select>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3">Cellphone:</div>
            <div class="col-xs-9">
                <input id="authy-cellphone" type="text" value="" name="authy-cellphone" />
            </div>
        </div>
        <div class="row">
            <div class="col-xs-9 col-xs-offset-2">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="send_sms" />
                        Send token via SMS
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-3"></div>
            <div class="col-xs-6"><br>
                <button type="submit" class="btn btn-primary btn-block btn-flat">Enable 2-factor Auth</button>
            </div>
            <div class="col-xs-3"></div>
        </div>
    </form>
</div>

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/authy-forms.js/2.2/form.authy.js"></script>
@append
