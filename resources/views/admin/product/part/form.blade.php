@csrf
<div class="form-group">
    <input type="text" class="form-control" name="name" placeholder="Name"
           required maxlength="100" value="{{ old('name') ?? $product->name ?? '' }}">
</div>
<div class="form-group">
    <input type="text" class="form-control" name="slug" placeholder="id"
           required maxlength="100" value="{{ old('id') ?? $product->id ?? '' }}">
</div>

<div class="form-group">
    <input type="text" class="form-control" name="slug" placeholder="descr"
           required maxlength="100" value="{{ old('slug') ?? $product->slug ?? '' }}">
</div>
<div class="form-group">
        <input type="text" class="form-control w-25 d-inline mr-4" placeholder="Price"
           name="price" required value="{{ old('price') ?? $product->price ?? '' }}">

    <div class="form-check form-check-inline">
        @php
            $checked = false;
            if (isset($product)) $checked = $product->new;
            if (old('new')) $checked = true;
        @endphp
        <input type="checkbox" name="new" class="form-check-input" id="new-product"
               @if($checked) checked @endif value="1">
        <label class="form-check-label" for="new-product">New</label>
    </div>
    <div class="form-check form-check-inline">
        @php
            $checked = false;
            if (isset($product)) $checked = $product->hit;
            if (old('hit')) $checked = true;
        @endphp
        <input type="checkbox" name="hit" class="form-check-input" id="hit-product"
               @if($checked) checked @endif value="1">
        <label class="form-check-label" for="hit-product">Hit!</label>
    </div>

    <div class="form-check form-check-inline ">
        @php
            $checked = false; // создание нового товара
            if (isset($product)) $checked = $product->sale;
            if (old('sale')) $checked = true;
        @endphp
        <input type="checkbox" name="sale" class="form-check-input" id="sale-product"
               @if($checked) checked @endif value="1">
        <label class="form-check-label" for="sale-product">Last item</label>
    </div>
</div>
<div class="form-group">
    @php
        $brand_id = old('brand_id') ?? $product->brand_id ?? 0;
    @endphp
    <select name="brand_id" class="form-control" title="Brand" required>
        <option value="0">Select</option>
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}" @if ($brand->id == $brand_id) selected @endif>
                {{ $brand->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <textarea class="form-control" name="content" placeholder="Describe"
              rows="4">{{ old('content') ?? $product->content ?? '' }}</textarea>
</div>
<div class="form-group">
    <input type="file" class="form-control-file" name="image" accept="image/png, image/jpeg">
</div>
@isset($product->image)
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="remove" id="remove">
        <label class="form-check-label" for="remove">
            Delete image
        </label>
    </div>
@endisset
<div class="form-group">
    <button type="submit" class="btn btn-primary">Save</button>
</div>
