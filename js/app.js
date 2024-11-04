// Remove the defaults
DataTable.defaults.layout = {
    topStart: null,
    topEnd: null,
    bottomStart: null,
    bottomEnd: null
};

$(document).ready(function(){
    $('#table-default').DataTable({
        layout: {
            top: ['pageLength','search'],
            bottom: ['info','buttons','paging']
        },
        scrollY: '45vh', // Set the height for the scrollable area
        scrollX: true, // Enable horizontal scrolling
        fixedHeader: true // Keep header fixed
    });
});

$(document).ready(function(){
    $('#table-edit').DataTable({
        layout: {
            top: ['pageLength','search'],
            bottom: ['info','paging']
        },
        scrollY: '45vh', // Set the height for the scrollable area
        scrollX: true, // Enable horizontal scrolling
        fixedHeader: true // Keep header fixed
    });
});