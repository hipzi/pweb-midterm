var tableElm = $('#listSoftware');

tableElm.DataTable({
	processing: true,
	serverSide: true,
	ajax: tableElm.data('ajaxurl'),
	columns: [
		{
			data: 'id',
			name: null,
			searchable: false,
			visible: false,
		},
		{
			title: 'Name',
			data: 'software_name',
			name: 'software.name',
			searchable: true,
			visible: true,
        },
		{
			title: 'Description',
			data: 'software_description',
			name: 'software.description',
			searchable: true,
			visible: true,
		},
		{
			title: 'Price',
			data: 'software_price',
			name: 'software.price',
			searchable: true,
			visible: true,
		},
		{
			title: 'Type',
			data: 'software_type',
			name: 'software_types.type',
			searchable: true,
			visible: true,
		},
		{
			title: 'Status',
			data: 'software_status',
			name: 'statuses.id',
			searchable: true,
            visible: true,
		},
		{
			title: 'Detail',
			data: 'software_id',
			render: function (data, type, row) {
				return "<a class='btn btn-primary' href=\"/software/detail/" + data + "\">Click</a>";
			}
		},
	],
});