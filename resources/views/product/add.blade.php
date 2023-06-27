<div class="col-md-6 mb-4">
    <div class="card">
    <form method="post" action="{{ route('product.add') }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Название продукта</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="body">Цена</label>
                <input type="number" step="0.01" class="form-control" id="price"  name="price"></input>
            </div>
            <div class="form-group">
                <label for="image">Картинка для продукта</label>
                <input type="file" class="form-control-file" id="image" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>
    </div>
</div>