@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/authy-form-helpers/2.3/flags.authy.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/authy-form-helpers/2.3/form.authy.css" />
@endsection

    <div class="col-sm-10 col-sm-offset-2">
        <form method="POST" action="{{url('auth/two-factor')}}">
            {{csrf_field()}}
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
                <div class="col-xs-9 col-xs-offset-3">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="send_sms" />
                            Send two-factor token via SMS
                        </label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-9 col-xs-offset-3">
                    <button type="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/authy-form-helpers/2.3/form.authy.js"></script>
@endsection
