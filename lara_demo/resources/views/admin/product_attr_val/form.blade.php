
<div class="form-group {{ $errors->has('product_attributes_id') ? 'has-error' : ''}}">
    <label for="product_attributes_id" class="control-label">{{ 'Select Attribute' }}</label>
    <select name="product_attributes_id" class="form-control" id="product_attributes_id" >
            <option></option>
    @foreach ($attribute as $Value)
        <option value="{{ $Value->id }}" {{ (isset($product_attr_val->product_attributes_id) && $product_attr_val->product_attributes_id == $Value->id) ? 'selected' : ''}}>{{ $Value->name }}</option>
    @endforeach
</select>
    {!! $errors->first('product_attributes_id', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('value') ? 'has-error' : ''}}">
        <label for="value" class="control-label">{{ 'Value' }}</label>
        <input class="form-control" name="value" type="text" id="value" value="{{ isset($product_attr_val->value) ? $product_attr_val->value : ''}}" >
        {!! $errors->first('value', '<p class="help-block">:message</p>') !!}
    </div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>




