<ul>
   @foreach($children as $child)
   <li>
      <input type="radio"  id="parent_id_{{ $child->id }}" name="parent_id" value="{{ $child->id }} wire:model="selectedCategory" wire:click="categorySelected({{ $child->id }})">
      <label for="vehicle1"> {{ $child->name }}</label><br>
      @if(count($child->children))
      @include('manageChildCheckbox',['children' => $child->children])
      @endif
   </li>
   @endforeach
</ul>

