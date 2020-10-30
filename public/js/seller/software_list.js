var tableElm = $('#listSoftware');

tableElm.DataTable({
	processing: true,
	serverSide: true,
	ajax: tableElm.data('ajaxurl'),
	columns: [
        {
			title: 'Date',
			data: 'updated_at',
			name: 'software.updated_at',
			searchable: true,
			visible: true,
		},
		{
			title: 'Name',
			data: 'name',
			name: 'software.name',
			searchable: true,
			visible: true,
        },
		{
			title: 'Price',
			data: 'price',
			name: 'software.price',
			searchable: true,
			visible: true,
		},
		{
			title: 'Type',
			data: 'type',
			name: 'software.type_id',
			searchable: true,
			visible: true,
		},
		{
			title: 'Edit',
			data: 'id',
			render: function (data, type, row) {
				return "<a style='font-size:20px' href=\"/seller/edit-software/" + data + "\"><i class=\"fa fa-edit\"></i></a>";
			}
		},
		{
			title: 'Delete',
			data: 'id',
			render: function (data, type, row) {
				return "<a type=\"submit\" class=\"dangerous_icon\" style='font-size:20px;' href=\"/seller/delete-software/" + data + "\"><i class=\"fa fa-trash\"></a>";
			}
		},
	],
});
$('.dangerous_icon').on('click', function(){
    return confirm("Are you sure?");
});