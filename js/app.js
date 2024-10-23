$(document).ready(function(){
    $('#table-default').DataTable({
        layout: {
            topStart: 'pageLength',
            topEnd: 'search',
            bottomStart: 'info'
        },
        scrollY: '45vh', // Set the height for the scrollable area
        scrollX: true, // Enable horizontal scrolling
        fixedHeader: true // Keep header fixed
    });
});