
<div class="col-xs-6">
    <h4>setting Information</h4>
    <div class="clear"></div>
<div class=" form-group form-group-sm">
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <input type="text"  class="form-control margin-bottom copy-input required" name="company_name"
                 value="{{ isset($setting) ? $setting->company_name : ''  }}" id="setting_name" placeholder="Enter Name" tabindex="1">
            </div>
            <div class="form-group">
                <input type="text" class="form-control margin-bottom copy-input required" name="company_address_1"
                 value="{{ isset($setting) ? $setting->company_address_1: ''  }}" id="company_address_1" placeholder="Address 1" tabindex="3">
            </div>
            <div class="form-group">
                <input type="text" class="form-control margin-bottom copy-input required" name="company_city"
                value="{{ isset($setting) ? $setting->company_city : '' }}" id="company_city" placeholder="City" tabindex="5">
            </div>

            <div class="form-group ">
                <input type="text" class="form-control copy-input required" name="company_postcode"
                value="{{ isset($setting) ? $setting->company_postcode : '' }}" id="company_postcode" placeholder="Postcode" tabindex="7">
            </div>

            <div class="form-group ">
                <input type="file" class="form-control copy-input " name="company_logo"
                value="{{ isset($setting) ? $setting->company_logo : '' }}" id="company_logo" placeholder="company_logo" tabindex="7">
            </div>
        </div>
        <div class="col-xs-6">
            <div class="input-group float-right margin-bottom">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" class="form-control copy-input required" name="company_email"
                value="{{ isset($setting) ? $setting->company_email : ''  }}" id="company_email" placeholder="Email" aria-describedby="sizing-addon1" tabindex="2">
            </div>
            <div class="form-group">
                <input type="text" class="form-control margin-bottom copy-input" name="company_address_2"
                value="{{ isset($setting) ? $setting->company_address_2 : '' }}" id="company_address_2" placeholder="Address 2" tabindex="4">
            </div>
            <div class="form-group">
                <input type="text" class="form-control margin-bottom copy-input required" name="company_country"
                value="{{ isset($setting) ? $setting->company_country : '' }}" id="company_country" placeholder="Country" tabindex="6">
            </div>
            <div class="form-group">
                <input type="text" class="form-control required" name="company_phone" id="company_phone"
                value="{{ isset($setting) ? $setting->company_phone : '' }}" placeholder="Phone Number" tabindex="8">
            </div>
            <div class="form-group">
                <img src="{{ isset($setting) ? asset('image/logo', $setting->company_country) : asset('image/logo.png')}}" alt="">
            </div>
        </div>
    </div>

</div>
</div>
<div class="col-xs-6 text-right1">
    <h4>Invoice Settings</h4>
<div class="panel-body1 form-group form-group-sm">
    <div class="row">
        <div class="col-xs-6">
            <div class="form-group">
                <input type="text" class="form-control margin-bottom required" name="invoice_prefix"
                value="{{ isset($setting) ? $setting->invoice_prefix : ''}}" id="invoice_prefix" placeholder="Enter name" tabindex="9">
            </div>
            <div class="form-group">
                <input type="text" class="form-control margin-bottom" name="invoice_initial_value"
                value="{{ isset($setting) ? $setting->invoice_initial_value : ''}}" id="invoice_initial_value" placeholder="Address 2" tabindex="11">
            </div>
            <div class="form-group no-margin-bottom">
                <input type="text" class="form-control required" name="currency"
                value="{{ isset($setting) ? $setting->currency : 'GMD'}}" id="setting_currency" placeholder="Country" tabindex="13">
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <input type="text" class="form-control margin-bottom required" name="enable_tax"
                value="{{ isset($setting) ? $setting->enable_tax : ''}}" id="setting_enable_tax" placeholder="Address 1" tabindex="10">
            </div>
            <div class="form-group">
                <select name="include_tax" id="" class="form-control margin-bottom required">
                    <option value="0"  {{ $setting->include_tax == 0 ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $setting->include_tax == 1 ? 'selected' : '' }}>Yes</option>
                </select>
            </div>
            <div class="form-group no-margin-bottom">
                <input type="text" class="form-control required" name="tax_rate" id="setting_tax_rate"
                  value="{{ isset($setting) ? $setting->tax_rate : ''}}" placeholder="Tax Rate" tabindex="14">
            </div>
            <input type="hidden" name="setting_id" value="{{ isset($setting) ? $setting->id : ''}}" id="">
        </div>
    </div>
</div>
</div>

