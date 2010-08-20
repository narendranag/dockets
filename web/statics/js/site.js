var base_uri = "http://cr.epixel.in/";
var index_file = 'index.php';

function base_url() {
    if(index_file == '') {
        return base_uri;
    }
    else {
        return base_uri + index_file + '/';
    }
}