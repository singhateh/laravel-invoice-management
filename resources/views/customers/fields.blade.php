
	<div class="row">
		<div class="col-xs-6">
			<div class="panel panel-default1">
				<div class="panel-heading">
					<h4>Customer Information</h4>
					<div class="clear"></div>
				</div>
				<div class=" form-group form-group-sm">
					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<input type="text"  class="form-control margin-bottom copy-input required" name="name" value="{{ isset($customer) ? $customer->name : '' }}" id="name" placeholder="Enter Name" tabindex="1">
							</div>
							<div class="form-group">
								<input type="text" class="form-control margin-bottom copy-input required" name="address_1" value="{{ isset($customer) ? $customer->address_1: '' }}" id="address_1" placeholder="Address 1" tabindex="3">
							</div>
							<div class="form-group">
								<input type="text" class="form-control margin-bottom copy-input required" name="city" value="{{ isset($customer) ? $customer->city : ''}}" id="city" placeholder="City" tabindex="5">
							</div>
							<div class="form-group no-margin-bottom">
								<input type="text" class="form-control copy-input required" name="postcode" value="{{ isset($customer) ? $customer->post_code : ''}}" id="postcode" placeholder="Postcode" tabindex="7">
							</div>
						</div>
						<div class="col-xs-6">
							<div class="input-group float-right margin-bottom">
								<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
								<input type="email" class="form-control copy-input required" name="email" value="{{ isset($customer) ? $customer->email: '' }}" id="email" placeholder="Email" aria-describedby="sizing-addon1" tabindex="2">
							</div>
						    <div class="form-group">
						    	<input type="text" class="form-control margin-bottom copy-input" name="address_2" value="{{ isset($customer) ? $customer->address_2 : '' }}" id="address_2" placeholder="Address 2" tabindex="4">
						    </div>
						    <div class="form-group">
						    	<input type="text" class="form-control margin-bottom copy-input required" name="country" value="{{ isset($customer) ? $customer->country : '' }}" id="country" placeholder="Country" tabindex="6">
						    </div>
						    <div class="form-group no-margin-bottom">
						    	<input type="text" class="form-control required" name="phone" id="phone" value="{{ isset($customer) ? $customer->phone : ''}}" placeholder="Phone Number" tabindex="8">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xs-6 text-right">
			<div class="panel panel-default1">
				<div class="panel-heading">
					<h4>Shipping Information</h4>
				</div>
				<div class="panel-body1 form-group form-group-sm">
					<div class="row">
						<div class="col-xs-6">
							<div class="form-group">
								<input type="text" class="form-control margin-bottom required" name="ship_name" value="{{ isset($customer) ? $customer->ship_name : ''}}" id="name" placeholder="Enter name" tabindex="9">
							</div>
							<div class="form-group">
								<input type="text" class="form-control margin-bottom" name="ship_address_2" value="{{ isset($customer) ? $customer->ship_address_2 : ''}}" id="address_2" placeholder="Address 2" tabindex="11">
							</div>
							<div class="form-group no-margin-bottom">
								<input type="text" class="form-control required" name="ship_country" value="{{ isset($customer) ? $customer->ship_country : ''}}" id="country" placeholder="Country" tabindex="13">
							</div>
						</div>
						<div class="col-xs-6">
							<div class="form-group">
						    	<input type="text" class="form-control margin-bottom required" name="ship_address_1" value="{{ isset($customer) ? $customer->ship_address_1 : ''}}" id="address_1" placeholder="Address 1" tabindex="10">
							</div>
							<div class="form-group">
								<input type="text" class="form-control margin-bottom required" name="ship_city" value="{{ isset($customer) ? $customer->ship_city : ''}}" id="city" placeholder="City" tabindex="12">
						    </div>
						    <div class="form-group no-margin-bottom">
						    	<input type="text" class="form-control required" name="ship_postcode" id="ship_postcode"  value="{{ isset($customer) ? $customer->ship_post_code : ''}}" placeholder="Postcode" tabindex="14">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12 margin-top btn-group">
			<input type="submit" id="action_create_customer" class="btn btn-success float-right" value="Save Customer" data-loading-text="Creating...">
		</div>
	</div>
