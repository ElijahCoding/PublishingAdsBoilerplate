<div class="form-group">
  <label for="category" class="label-control">Category</label>

  <select name="category_id" id="category" class="form-control">
    @foreach ($categories as $category)
      <optgroup label="{{ $category->name }}">
        @foreach ($category->children as $child)
          <option value="{{ $child->id }}">{{ $child->name }} (${{ $child->price }})</option>
        @endforeach
      </optgroup>
    @endforeach
  </select>
</div>
