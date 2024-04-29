<div>
    @foreach($subcategories as $subcategory)
    <option value="{{ $subcategory->id }}" style="padding-left: {{ $level * 20 }}px"> 
        {{ $subcategory->name }}
    </option>
    @endforeach
</div>