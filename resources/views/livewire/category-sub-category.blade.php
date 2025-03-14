<div>
    <label for="category_id" class="fw-bold mb-2">Select Category</label>
    <select class="form-control mb-2" name="category_id" wire:model.live="selectedCategory">
        <option>Select a Category</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}">{{ $category->category_name }}</option>
        @endforeach
    </select>

    <label for="sub_category_id" class="fw-bold mb-2">Select Sub Category</label>
    <select class="form-control mb-2" name="sub_category_id">
        <option>Select a Sub Category</option>
        @foreach ($subCategories as $subCategory)
            <option value="{{ $subCategory->id }}">{{ $subCategory->sub_category_name }}</option>
        @endforeach
    </select>
</div>
