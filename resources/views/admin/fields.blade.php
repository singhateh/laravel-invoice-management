<div class="row">
    <div class="row">
        <div class="col-xs-4">
            <input type="text" class="form-control margin-bottom required" name="name" value="{{ isset($user) ? $user->name : ''}}" placeholder="Name">
        </div>
        <div class="col-xs-4">
            <input type="text" class="form-control margin-bottom required" name="username" value="{{ isset($user) ? $user->username : '' }}" placeholder="Enter username">
        </div>
        <div class="col-xs-4">
            <input type="text" class="form-control margin-bottom required" name="email" value="{{ isset($user) ? $user->email : '' }}"
                placeholder="Enter email address">
        </div>
    </div>

    <div class="row">
        <div class="col-xs-4">
            <input type="text" class="form-control" name="phone" value="{{ isset($user) ? $user->phone : '' }}" placeholder="Enter phone number">
        </div>
        <div class="col-xs-4">
            <input type="password" class="form-control required" name="password"  value="{{ isset($user) ? $user->password : '' }}" id="password"
                placeholder="Enter password">
        </div>
        <div class="col-xs-4">
            <input type="password" class="form-control required" name="password"  value="{{ isset($user) ? $user->password : '' }}" id="password"
                placeholder="Re-Enter password">
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 margin-top btn-group">
            <input type="submit" id="action_add_user" class="btn btn-success float-right" value="Add user"
                data-loading-text="Adding...">
        </div>
    </div>

    <div>
