<div class="form-group {{ $errors->has('product_image') ? 'has-error' : ''}}">
        <label for="product_image" class="control-label">{{ 'Short Description' }}</label>
        <input class="form-control" name="product_image[]" type="text" id="product_image" value="{{ isset($product->product_image) ? $product->product_image : ''}}" >
        {!! $errors->first('product_image', '<p class="help-block">:message</p>') !!}
    </div>
    <div class="form-group {{ $errors->has('product_image') ? 'has-error' : ''}}">
            <label for="product_image" class="control-label">{{ 'Short Description' }}</label>
            <input class="form-control" name="product_image[]" type="text" id="product_image" value="{{ isset($product->product_image) ? $product->product_image : ''}}" >
            {!! $errors->first('product_image', '<p class="help-block">:message</p>') !!}
        </div>
        <div class="form-group {{ $errors->has('product_image') ? 'has-error' : ''}}">
                <label for="product_image" class="control-label">{{ 'Short Description' }}</label>
                <input class="form-control" name="product_image[]" type="text" id="product_image" value="{{ isset($product->product_image) ? $product->product_image : ''}}" >
                {!! $errors->first('product_image', '<p class="help-block">:message</p>') !!}
            </div>
            <div class="form-group {{ $errors->has('product_image') ? 'has-error' : ''}}">
                    <label for="product_image" class="control-label">{{ 'Short Description' }}</label>
                    <input class="form-control" name="product_image[]" type="text" id="product_image" value="{{ isset($product->product_image) ? $product->product_image : ''}}" >
                    {!! $errors->first('product_image', '<p class="help-block">:message</p>') !!}
                </div>