<ul class="nav nav-tabs" role="tablist" style="margin-bottom: 15px;">
    <li class="nav-item">
        <a class="nav-link active" id="tab1" onclick="listInfos()" href="#listInfos" data-toggle="tab">
        {{__('dsdb_audit log bilgileri')}}</a>
    </li>

    
</ul>

<div class="tab-content">
    <div id="listInfos" class="tab-pane active">
    <div class="table-responsive" id="listInfos"></div>
</div>
    
</div>

<script>
    if(location.hash === ""){
        listInfos();
    }
    function listInfos(){
                    showSwal('{{__("Yükleniyor...")}}','info');
                    var form = new FormData();
                    request(API('list_infos'), form, function(response) {
                        $('#listInfos').html(response).find('table').DataTable(dataTablePresets('normal'));
                        Swal.close();
                    }, function(response) {
                        let error = JSON.parse(response);
                        Swal.close();
                        showSwal(error.message, 'error', 3000);
                    });
    }
</script>