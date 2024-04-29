<div>
    <button wire:click="openCategoryModal" class="btn btn-primary">Add Category</button>

    @if ($showCategoryModal)
        <div class="modal fade show" style="display: block;" role="dialog" aria-modal="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Category</h5>
                        <button wire:click="closeCategoryModal" type="button" class="close">×</button>
                    </div>
                    <div class="modal-body">
                        <form role="form" id="category" wire:submit.prevent="storeCategory" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                <label>Name:</label>
                                <input type="text" id="name" name="name" value="" class="form-control"
                                wire:model="name" placeholder="Enter Name">
                                @if ($errors->has('name'))
                                    <span class="text-red" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('parent_id') ? 'has-error' : '' }}">
                                <label>Categories:</label>

                                <ul id="tree1">
                                    @foreach ($categories as $category)
                                        @if (!$category->parent_id)
                                            <li> <input type="radio" id="parent_id_{{ $category->id }}" name="parent_id" value="{{ $category->id }}"
                                                wire:model="selectedCategory" wire:click="categorySelected({{ $category->id }})">
                                         <label for="parent_id_{{ $category->id }}">{{ $category->name }}</label><br>
                                         
                                            </li>

                                            @if (count($category->children))
                                                @include('manageCheckbox', [
                                                    'children' => $category->children,
                                                ])
                                            @endif
                                        @endif
                                    @endforeach

                                </ul>
                                @if ($errors->has('parent_id'))
                                    <span class="text-red" role="alert">
                                        <strong>{{ $errors->first('parent_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <input type="hidden" name="parent_id" wire:model="selectedCategory">

                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Add New</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif
</div>
