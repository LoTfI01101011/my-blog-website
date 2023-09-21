<x-layout>
    <x-setting header="Publish New Post">
        <form method="POST" action="/admin/posts" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" />

            <x-form.input name="slug" />

            <x-form.input name="thumbnail" type="file" />

            <x-form.textarea name="excerpt" />

            <x-form.textarea name="body" />

            <div class="mb-6">
                <x-form.lable name="category" />

                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}</option>
                    @endforeach
                </select>

                <x-form.error name="category" />

            </div>

            <x-submit-button>Publish</x-submit-button>
        </form>
    </x-setting>
</x-layout>
