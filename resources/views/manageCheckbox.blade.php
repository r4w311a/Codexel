<ul>
    @foreach($children as $child)
    <li>
      

       <input type="radio"  id="parent_id_{{ $child->id }}" name="parent_id" value="{{ $child->id }} wire:model="selectedCategory" wire:click="categorySelected({{ $child->id }})" {{ request()->routeIs('manage-products') && $child->children() ? 'disabled' : '' }} 
       >
       <label for=""> {{ $child->name }}</label><br>
       @if(count($child->children))
       @include('manageChildCheckbox',['children' => $child->children])
       @endif
    </li>
    @endforeach
 </ul>
 
 