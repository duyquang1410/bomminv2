<style>
    @media (max-width: 768px){
        .ibox-content {
            height: auto !important;
        }
    }
</style>
<script src="{!! URL::asset('public/cms') !!}/js/plugins/dataTables/datatables.min.js"></script>

<!-- Money -->
<script src="{!! URL::asset('public/cms/js/simple.money.format.js') !!}"></script>

<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 25,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]
        });

        /* === Khi Scroll  === */
        $(window).scroll(function(){
            if($(this).scrollTop()){
                $('#menu').addClass('has-fix-menu-default-type');
            }
            else {
                $('#menu').removeClass('has-fix-menu-default-type');
            }
        });

    });
</script>
</body>
</html>