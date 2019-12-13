<div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
    <label for="code" class="control-label">{{ 'Code' }}</label>
    <input class="form-control" name="code" type="text" id="code" size="10" value="{{ isset($coupon->code) ? $coupon->code : ''}}" >
    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('percent_off') ? 'has-error' : ''}}">
    <label for="percent_off" class="control-label">{{ 'Percent Off' }}</label>
    <input class="form-control" name="percent_off" type="number" id="percent_off" value="{{ isset($coupon->percent_off) ? $coupon->percent_off : ''}}" >
    {!! $errors->first('percent_off', '<p class="help-block">:message</p>') !!}
</div>
{{-- <div class="form-group {{ $errors->has('created_by') ? 'has-error' : ''}}">
    <label for="created_by" class="control-label">{{ 'Created By' }}</label>
    <input class="form-control" name="created_by" type="number" id="created_by" value="{{ isset($coupon->created_by) ? $coupon->created_by : ''}}" >
    {!! $errors->first('created_by', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('updated_by') ? 'has-error' : ''}}">
    <label for="updated_by" class="control-label">{{ 'Updated By' }}</label>
    <input class="form-control" name="updated_by" type="number" id="updated_by" value="{{ isset($coupon->updated_by) ? $coupon->updated_by : ''}}" >
    {!! $errors->first('updated_by', '<p class="help-block">:message</p>') !!}
</div> --}}
<div class="form-group {{ $errors->has('no_of_uses') ? 'has-error' : ''}}">
    <label for="no_of_uses" class="control-label">{{ 'No Of Uses' }}</label>
    <input class="form-control" name="no_of_uses" type="number" id="no_of_uses" value="{{ isset($coupon->no_of_uses) ? $coupon->no_of_uses : ''}}" >
    {!! $errors->first('no_of_uses', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
