///
// IMAGE MANAGER
///

function LoadImageManager(attr, farmerId = null) {
    if (farmerId) {
        $('#ImageManagerModal').load('/image/list-modal?farmer_id=' + farmerId);
    } else {
        $('#ImageManagerModal').load('/image/list-modal');
    }
    $('#ImageManagerModal').attr('data-input-id', attr);
}

function ChooseImage(name, farmerId) {
    $('#' + $('#ImageManagerModal').attr('data-input-id')).val(name);
    $('#ImageManagerImgPreview').attr('src', '/web/image-manager/' + farmerId + '/' + name);
    $('#ImageManagerModal').modal('hide');
}