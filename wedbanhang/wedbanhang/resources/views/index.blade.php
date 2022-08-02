<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
</head>

<body>
    <table id="list" border="1" style="width:60%; margin: auto;">
        <tr>
            <td>ID</td>
            <td>Tên</td>
            <td>Thể Loại</td>
            <td>Hành Động</td>
        </tr>
        @foreach ($categories as $key => $category)
            <tr id="cate{{ $category->id }}">
                <td>{{ $key + 1 }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>
                    <a href="" class="sua" data-id="{{ $category->id }}">Sửa</a>
                    <a href="" class="xoa" data-id="{{ $category->id }}"">Xóa</a>
                </td>
            </tr>
        @endforeach
    </table>
    <hr>
    <form action="{{ route('categories.store') }}" method="post" style="width:60%; margin: auto;margin-top: 20px">
        @csrf
        <label for="">Tên</label>
        <input type="text" id="name" name="name">
        <label for="">Thể Loại</label>
        <input type="text" id="slug" name="slug">
        <button id="submit" type="button">Thêm</button>
    </form>


    <script>
        jQuery(document).ready(function() {
            jQuery('#submit').click(function() {
                let name = jQuery('[name="name"]').val();
                let slug = jQuery('[name="slug"]').val();
                // console.log(name);
                // console.log(slug);
                let ajaxSetting = {
                    url: "{{ route('categories.store') }}",
                    type: 'post',
                    dataType: 'json',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        'name': name,
                        'slug': slug
                    },
                    success: function(res) {
                        if (res.status) {
                            alert(res.msg);
                        }
                    }
                };
                jQuery.ajax(ajaxSetting);
                console.log(name);
                console.log(slug);
            });
            $('.xoa').click(function(e) {
                e.preventDefault();
                let id = $(this).attr('data-id');
                if (confirm('Bạn có chắc chắn xóa')) {
                    $.ajax({
                        type: "delete",
                        url: "{{ route('category.destroy') }}",
                        data: {
                            'id': id,
                            "_token": "{{ csrf_token() }}",
                        },
                        dataType: "json",
                        success: function(response) {
                            $('#cate' + id).remove();
                        }
                    });
                }
                // alert(id);

            })

        });
    </script>
</body>

</html>
