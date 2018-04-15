@extends('base')

@section('style')
    <style>
        .add_margin_bottom {
            margin-bottom: 15px;
        }
    </style>
@endsection

@section('content')
    <div class="row add_margin_bottom">
        <div class="text-center">
            <h1>Welcome to my datatable!</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table id="myTable" class="display">
                <thead>
                    <tr>
                        <td width="20%">Name</td>
                        <td width="15%">Email</td>
                        <td width="5%">Gender</td>
                        <td width="10%">Birthday</td>
                        <td width="20%">Location</td>
                    </tr>
                </thead>
                <tfoot>
                <tr>
                    <th width="20%">Name</th>
                    <th width="15%">Email</th>
                    <th width="5%">Gender</th>
                    <th width="10%">Birthday</th>
                    <th width="20%">Location</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $table = $('#myTable').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": 'http://test-api.local/api/users'
        });
        $(document).ready(function() {
            $('tfoot th').each(function(i) {
                var title =  $('tfoot th').eq(i).text();
                $('tfoot th').eq(i).html(
                        '<input type="text" placeholder="'+title+'" data-index="'+i+'" >'
                );
            }); //End of changing tfoot into inputs
            $('tfoot input').on('keyup', function() {
                $table
                        .column( $(this).attr('data-index') )
                        .search( $(this).val() )
                        .draw();
            });
        })

    </script>

@endsection