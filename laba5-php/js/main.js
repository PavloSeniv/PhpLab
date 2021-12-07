function check_file() {
    var file_d = document.getElementById("file").value;
    var ext_arr = file_d.split('.');
    var ext = ext_arr[ext_arr.length - 1];

    if (file_d == '') {
        alert("Файлу немає");
        return false;
    } else if (ext != "kml" && ext != "gpx") {
        alert("Невірне розширення.\nВиберіть інший файл.");
        return false;
    }
}