<div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
    <label for="name" class="control-label">{{ 'Name' }}</label>
    <input class="form-control" name="name" type="text" id="name" value="{{ isset($category->name) ? $category->name : ''}}" >
    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group {{ $errors->has('parent_id') ? 'has-error' : ''}}">
    <label for="parent_id" class="control-label">{{ 'Parent Id' }}</label>
    <select name="parent_id" class="form-control" id="parent_id" >
        <option value="0">Parent Category</option>
    @foreach ($parent as $Value)
        {{-- @if($formMode === 'edit') --}}
        <option value="{{ $Value->id }}"   {{ (isset($category->parent_id) && $category->parent_id == $Value->id) ? 'selected' : ''}}
                >{{ $Value->name }}</option>
        {{-- @else
        <option value="{{ $Value->id }}" >{{ $Value->name }}</option>
        @endif --}}

    @endforeach
</select>
    {!! $errors->first('parent_id', '<p class="help-block">:message</p>') !!}
</div>


<div class="form-group">
    <input class="btn btn-primary" type="submit" value="{{ $formMode === 'edit' ? 'Update' : 'Create' }}">
</div>
