<div>
    <select class="form-control" wire:model.live="selectedCategory">
        <option value="">Select a Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
    </select>

    <select class="form-control mt-2">
        <option value="">Select a Sub Category</option>
        @foreach ($subCategories as $subCategory)
            <option value="{{ $subCategory->id }}">{{ $subCategory->sub_category_name }}</option>
        @endforeach
    </select>
</div>
